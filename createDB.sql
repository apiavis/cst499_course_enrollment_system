CREATE DATABASE `course_enrollment_system`;

USE `course_enrollment_system`;
CREATE TABLE `student` ( 
    `student_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(50) NOT NULL , 
    `password` VARCHAR(20) NOT NULL , 
    `firstName` VARCHAR(50) NOT NULL , 
    `lastName` VARCHAR(50) NOT NULL , 
    `address` VARCHAR(250) NULL DEFAULT NULL , 
    `phone` VARCHAR(13) NULL DEFAULT NULL , 
    `degree` VARCHAR(250) NULL DEFAULT NULL, 
    PRIMARY KEY (`student_id`)
) ENGINE = InnoDB;

CREATE TABLE `course` ( 
    `course_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `courseName` VARCHAR(250) NOT NULL , 
    `maxStudents` INT NOT NULL, 
    PRIMARY KEY (`course_id`)
) ENGINE = InnoDB;

CREATE TABLE `offering` ( 
    `offering_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `course_id` INT(10) NOT NULL , 
    `year` YEAR NOT NULL , 
    `semester` VARCHAR(250) NOT NULL, 
    PRIMARY KEY (`offering_id`),
    FOREIGN KEY (`course_id`) REFERENCES `course`(`course_id`)
) ENGINE = InnoDB;

CREATE TABLE `waitlist` ( 
    `waitlist_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `student_id` INT(10) NOT NULL , 
    `offering_id` INT(10) NOT NULL , 
    `dateTimeAdded` DATETIME NOT NULL, 
    PRIMARY KEY (`waitlist_id`),
    FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`),
    FOREIGN KEY (`offering_id`) REFERENCES `offering`(`offering_id`)
) ENGINE = InnoDB;

CREATE TABLE `enrollment` ( 
    `enrollment_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `student_id` INT(10) NOT NULL , 
    `offering_id` INT(10) NOT NULL, 
    PRIMARY KEY (`enrollment_id`),
    FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`),
    FOREIGN KEY (`offering_id`) REFERENCES `offering`(`offering_id`)
) ENGINE = InnoDB;

CREATE TABLE `notification` ( 
    `notification_id` INT(10) NOT NULL AUTO_INCREMENT , 
    `student_id` INT(10) NOT NULL , 
    `offering_id` INT(10) NOT NULL, 
    PRIMARY KEY (`notification_id`),
    FOREIGN KEY (`student_id`) REFERENCES `student`(`student_id`),
    FOREIGN KEY (`offering_id`) REFERENCES `offering`(`offering_id`)
) ENGINE = InnoDB;