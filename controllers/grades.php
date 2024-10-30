<?php

namespace Makkari\Controllers;

use Makkari\Config\Redirect;
use Makkari\Config\Validations;
use Makkari\Controllers\Controller;
use Makkari\Models\Curriculum;
use Makkari\Models\Curriculumdetail;
use Makkari\Models\Grade;
use Makkari\Models\Graderange;
use Makkari\Models\Schoolyear;
use Makkari\Models\Semester;
use Makkari\Models\Student;
use Makkari\Models\Yearlevel;

class Grades extends Controller
{
    public static function create($grades_id, $student = null)
    {
        self::checkAuth();
        self::csrfToken();
        if (self::get()) {
            $view = new View(PAGES_PATH . "/std");
            if ($_SESSION['user_type'] != "Student") {
                $student = Student::getById($student);
            } else {
                $student = Student::getById($_SESSION['user_id']);
            }
            $data = array(
                "id" => $id,
                "studentid" => $student->getId(),
                "semesters" => Semester::getAll(),
                "schoolyear" => Schoolyear::getAll(),
                "graderange" => Graderange::getAll()
            );
            $view->render("addGrade", $data);
        }
    }

    public static function viewGrades($curdetid)
    {
        if (self::get()) {
            $userdata = self::usersData($_SESSION['user_id']);

            $curriculum = Curriculum::getById($userdata->getCurrId());
            $levels = Yearlevel::getAll();
            $lvls = [];
            foreach ($levels as $level) {
                $subs = Curriculumdetail::getByCurrIdLevel($userdata->getCurrId(), $level->getId());
                array_push($lvls, array("yearlevels" => $level, "subjects" => $subs));
            }
            $currDetails = Curriculumdetail::getById($curdetid);

            $view = new View(PAGES_PATH . "/grades");
            $data = array(
                "pageTitle" => "My Curriculum / Grades",
                "pageDesc" => "View curriculum and add grades",
                "userdata" => $userdata,
                "semesters" => Semester::getAll(),
                "schoolyear" => Schoolyear::getAll(),
                "curriculum" => $curriculum,
                "yearlevels" => $lvls,
                "subject" => $currDetails
            );
            $view->render("viewgrades", $data);
        }
    }

    public static function edit($id)
    {
        if (self::get()) {
            self::csrfToken();

            $grade = Grade::getById($id);
            $view = new View(PAGES_PATH . "/grades");

            $data = array(
                "grade" => $grade,
                "semesters" => Semester::getAll(),
                "schoolyear" => Schoolyear::getAll(),
                "graderange" => Graderange::getAll()
            );
            $view->render("editGrade", $data);
        }
    }

    public static function update()
    {
        $curdet = 0;
        $st = 0;
        if (self::post() and self::verifyRequest()) {
            $data = array(
                "grades_id" => $_POST['id'], // Updated field name
                "grade" => $_POST['grade'],
                "semesters" => $_POST['semester'], // Updated field name
                "school_year" => $_POST['sy'], // Updated field name
                "confirmations" => 0, // Updated field name
            );
            $ruleset = array(
                "grade" => ['required'],
                "semesters" => ['required'], // Updated field name
                "school_year" => ['required'], // Updated field name
            );
            $validate = Validations::validateData($data, $ruleset);
            if (empty($validate->errors)) {
                $grade = Grade::getById($data['grades_id']);
                $grade->setGrade($data['grade']);
                $grade->setSemesters($data['semesters']); // Updated field name
                $grade->setSchoolYear($data['school_year']); // Updated field name
                $curdet = $grade->getCurrDetailsId();
                $st = $grade->getStudId();
                if ($grade->save()) {
                    self::createNotif("Your grade is updated", 1);
                } else {
                    self::createNotif("Something went wrong. Please try again", 0);
                }
            } else {
                self::createNotif($validate->showErrors, 0);
            }
        }
        if ($_SESSION['user_type'] != 'Student') {
            Redirect::to("/studentgrades/viewgrades/{$st}/{$curdet}");
        } else {
            Redirect::to("/grades/viewgrades/{$curdet}");
        }
    }

    public static function save()
    {
        $student = Student::getById($_POST['studid'] ?? $_SESSION['user_id']);
        if (self::post() and self::verifyRequest()) {
            $data = array(
                "grades_id" => NULL, // Updated field name
                "student_id" => $student->getId(), // Updated field name
                "currdetails_id" => $_POST['id'], // Updated field name
                "grade" => $_POST['grade'],
                "semesters" => $_POST['semester'], // Updated field name
                "school_year" => $_POST['sy'], // Updated field name
                "confirmations" => 0, // Updated field name
            );
            $ruleset = array(
                "student_id" => ['required'], // Updated field name
                "currdetails_id" => ['required'], // Updated field name
                "grade" => ['required'],
                "semesters" => ['required'], // Updated field name
                "school_year" => ['required'], // Updated field name
            );

            $validate = Validations::validateData($data, $ruleset);

            if (empty($validate->errors)) {
                $grade = new Grade(...$data);
                if ($grade->save()) {
                    self::createNotif("Your grade is saved", 1);
                } else {
                    self::createNotif("Something went wrong. Please try again", 0);
                }
            } else {
                self::createNotif($validate->showErrors, 0);
            }
        }

        if ($_SESSION['user_type'] != 'Student') {
            $student = Student::getById($_POST['studid']);
            Redirect::to("/studentgrades//{$student->getStudNo()}");
        } else {
            Redirect::to("/MyCurriculums");
        }
    }

    public static function accept($studid, $id)
    {
        self::csrfToken();
        $msgbox = new Msgbox("Confirm Grade", "Are you sure you want to confirm this grade?", "grades/msgaccept/" . $studid, $id);
        $msgbox->render();
    }

    public static function msgaccept($studid)
    {
        if (self::post() and self::verifyRequest()) {
            $student = Student::getById($studid);
            $data = array(
                "grades_id" => $_POST['id'] // Updated field name
            );
            $grades = Grade::getGradeByStudentAndSubject($studid, $data['grades_id']); // Updated field name
            foreach ($grades as $grade) {
                $grade->setConfirmations(1); // Updated field name
                $grade->save();
            }
        }
        Redirect::to("/studentgrades//{$student->getStudNo()}");
    }

    public static function confirm($grades_id) // Updated parameter name
    {
        if (self::get()) {
            self::csrfToken();
            $view = new View(PAGES_PATH . "/confirm");
            $data = array(
                "target" => "grades",
                "id" => $grades_id, // Updated parameter name
            );
            $view->render("confirm", $data);
        }
    }

    public static function remove()
    {
        $curdet = 0;
        $st = 0;
        if (self::post() and self::verifyRequest()) {
            $grades = Grade::getById($_POST['grades_id']); // Updated field name
            $st = $grades->getStudId();
            $curdet = $grades->getCurrDetailsId();
            if ($grades != NULL) {
                if ($grades->remove()) {
                    self::createNotif("Grade has been deleted", 1);
                } else {
                    self::createNotif("Something went wrong. Please try again", 0);
                }
            } else {
                self::createNotif("Something went wrong. Please try again", 0);
            }
        } else {
            self::createNotif("Something went wrong. Please try again", 0);
        }
        if ($_SESSION['user_type'] != 'Student') {
            Redirect::to("/studentgrades/viewgrades/{$st}/{$curdet}");
        } else {
            Redirect::to("/grades/viewgrades/{$curdet}");
        }
    }
}
