ALTER TABLE `coursesystem`.`admin_tbl` 
ADD COLUMN `department_id` INT NULL AFTER `admin_username`;
ALTER TABLE `coursesystem`.`admin_tbl` 
CHANGE COLUMN `department_id` `department_id` INT(11) NULL DEFAULT 1 ;
UPDATE coursesystem.admin_tbl set department_id = 4;