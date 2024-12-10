ALTER TABLE `coursesystem`.`student_subjects_tbl` 
ADD COLUMN `saved` INT NULL DEFAULT 0 AFTER `grade_id`;
