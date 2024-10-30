<?php

namespace Controllers;

use Controllers\Controller;
use Models\Curriculum;
use Models\Curriculumdetail;
use Models\Semester;
use Models\Yearlevel;

class MyCurriculums extends Controller
{
    public static function index()
    {
        self::checkAuth();

        if (self::get()) {
            // Initialize view with path to student pages
            $view = new View(PAGES_PATH . "/std");
            
            // Retrieve user data
            $userdata = self::usersData($_SESSION['user_id']);
            $curriculum = Curriculum::getById($userdata->getCurrId());
            $levels = Yearlevel::getAll();
            
            // Prepare year levels with their respective subjects
            $lvls = [];
            foreach ($levels as $level) {
                $subs = Curriculumdetail::getByCurrIdLevel($userdata->getCurrId(), $level->getId());
                $lvls[] = array(
                    "yearlevels" => $level,
                    "subjects" => $subs
                );
            }
            
            // Prepare data to pass to the view
            $data = array(
                "pageTitle"   => "My Curriculum / Grades",
                "pageDesc"    => "View curriculum and add grades",
                "userdata"    => $userdata,
                "curriculum"  => $curriculum,
                "yearlevels"  => $lvls,
                "semesters"   => Semester::getAll()
            );
            
            // Render the view with the data
            $view->render("checklists", $data);
        }
    }
}
