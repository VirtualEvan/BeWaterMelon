-- MySQL Script generated by MySQL Workbench
-- 10/31/17 15:16:33
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema BeWaterMelon
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `BeWaterMelon` ;

-- -----------------------------------------------------
-- Schema BeWaterMelon
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `BeWaterMelon` DEFAULT CHARACTER SET utf8 ;
USE `BeWaterMelon` ;

-- -----------------------------------------------------
-- Table `BeWaterMelon`.`ppl_user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`ppl_users` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`ppl_users` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `rol` ENUM('admin', 'reg') NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(45) NOT NULL,
  `bio` VARCHAR(45) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `fax` VARCHAR(45) NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `email_UNIQUEs` (`email` ASC),
  UNIQUE INDEX `phone_UNIQUEs` (`phone` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`ppl_phd`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`ppl_phds` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`ppl_phds` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `thesis_name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`ppl_postdoc`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`ppl_postdocs` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`ppl_postdocs` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`ppl_visitor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`ppl_visitors` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`ppl_visitors` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  `doctor` BOOLEAN NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`ppl_past_phd`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`ppl_past_phds` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`ppl_past_phds` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `thesis_date` YEAR NOT NULL,
  `thesis_name` VARCHAR(200) NOT NULL,
  `thesis_link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`ppl_collaborator`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`ppl_collaborators` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`ppl_collaborators` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `lastname` VARCHAR(45) NOT NULL,
  `doctor` BOOLEAN NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`pub_journal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`pub_journals` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`pub_journals` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `author` VARCHAR(100) NOT NULL,
  `publication_name` VARCHAR(200) NOT NULL,
  `name` VARCHAR(100) NOT NULL,
  `location` VARCHAR(100) NOT NULL,
  `publication_date` YEAR NOT NULL,
  `online_issn` VARCHAR(9) NOT NULL,
  `link` VARCHAR(500) NULL,
  `print_issn` VARCHAR(9) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`pub_conference`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`pub_conferences` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`pub_conferences` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `author` VARCHAR(100) NOT NULL,
  `name` VARCHAR(200) NOT NULL,
  `date` DATE NOT NULL,
  `city` VARCHAR(45) NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`pub_book`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`pub_books` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`pub_books` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `book_name` VARCHAR(100) NOT NULL,
  `author` VARCHAR(100) NOT NULL,
  `editorial` VARCHAR(100) NOT NULL,
  `year` YEAR NOT NULL,
  `country` VARCHAR(45) NOT NULL,
  `isbn` VARCHAR(17) NOT NULL,
  `link` VARCHAR(500) NULL,
  `physical_identifier` VARCHAR(8) NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `isbn_UNIQUEs` (`isbn` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`act_editorial_board`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`act_editorial_boards` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`act_editorial_boards` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `journal_name` VARCHAR(100) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  `online_issn` VARCHAR(9) NOT NULL,
  `online_issn_year` YEAR NOT NULL,
  `h_index` VARCHAR(45) NOT NULL,
  `sjr` FLOAT(3) NOT NULL,
  `sjr_year` YEAR NOT NULL,
  `sjr_quartile` VARCHAR(2) NOT NULL,
  `print_issn` VARCHAR(9) NULL,
  `impact_factor` FLOAT(3) NULL,
  `impact_factor_quartile` VARCHAR(2) NULL,
  `impact_factor_year` YEAR NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`act_journal`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`act_journals` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`act_journals` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  `online_issn` VARCHAR(9) NOT NULL,
  `online_issn_year` YEAR NOT NULL,
  `impact_factor` FLOAT(3) NOT NULL,
  `impact_factor_quartile` VARCHAR(2) NOT NULL,
  `impact_factor_year` YEAR NOT NULL,
  `print_issn` VARCHAR(9) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`act_conference`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`act_conferences` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`act_conferences` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `acronym` VARCHAR(45) NOT NULL,
  `name` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`res_project`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`res_projects` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`res_projects` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  `scheduling` VARCHAR(45) NOT NULL,
  `sponsor_link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`res_contract`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`res_contracts` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`res_contracts` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  `scheduling` VARCHAR(45) NOT NULL,
  `sponsor_link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`res_patent`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`res_patents` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`res_patents` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NOT NULL,
  `code` VARCHAR(45) NOT NULL,
  `year` YEAR NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`col_member`
-- -----------------------------------------------------

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`col_members` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`col_colleague`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`col_colleagues` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`col_colleagues` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `doctor` VARCHAR(45) BINARY NOT NULL,
  `department` VARCHAR(100) NOT NULL,
  `position` VARCHAR(100) NOT NULL,
  `company` VARCHAR(100) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`col_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`col_groups` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`col_groups` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `department` VARCHAR(100) NOT NULL,
  `company` VARCHAR(100) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`col_institution`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`col_institutions` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`col_institutions` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`col_company`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`col_companies` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`col_companies` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`pro_product`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`pro_products` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`pro_products` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `description` VARCHAR(500) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  `detailed_description` VARCHAR(5000) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`cou_subject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`cou_subjects` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`cou_subjects` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `ppl_user_id` INT(5) NOT NULL,
  `abbreviation` VARCHAR(10) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `id_teacher_idxs` (`ppl_user_id` ASC),
  CONSTRAINT `teacher`
    FOREIGN KEY (`ppl_user_id`)
    REFERENCES `BeWaterMelon`.`ppl_users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`cou_degree`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`cou_degrees` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`cou_degrees` (
  `id` INT(5) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`cou_course_degree_subject`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`cou_course_degree_subjects` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`cou_course_degree_subjects` (
  `cou_degree_id` INT(5) NOT NULL,
  `cou_subject_id` INT(5) NOT NULL,
  `year` YEAR NOT NULL,
  PRIMARY KEY (`cou_degree_id`, `cou_subject_id`, `year`),
  INDEX `degree_idxs` (`cou_degree_id` ASC),
  INDEX `subject_idxs` (`cou_subject_id` ASC),
  CONSTRAINT `degree`
    FOREIGN KEY (`cou_degree_id`)
    REFERENCES `BeWaterMelon`.`cou_degrees` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE,
  CONSTRAINT `subject`
    FOREIGN KEY (`cou_subject_id`)
    REFERENCES `BeWaterMelon`.`cou_subjects` (`id`)
    ON DELETE NO ACTION
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`res_project_participant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`res_project_participants` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`res_project_participants` (
  `res_project_id` INT(5) NOT NULL,
  `participant` VARCHAR(200) NOT NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`res_project_id`, `participant`),
  CONSTRAINT `project_participant`
    FOREIGN KEY (`res_project_id`)
    REFERENCES `BeWaterMelon`.`res_projects` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`act_conference_year`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`act_conference_years` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`act_conference_years` (
  `act_conference_id` INT(5) NOT NULL,
  `year` YEAR NOT NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`act_conference_id`, `year`),
  CONSTRAINT `conference_year`
    FOREIGN KEY (`act_conference_id`)
    REFERENCES `BeWaterMelon`.`act_conferences` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`res_contract_participant`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`res_contract_participants` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`res_contract_participants` (
  `res_contract_id` INT(5) NOT NULL,
  `participant` VARCHAR(200) NOT NULL,
  `link` VARCHAR(500) NULL,
  PRIMARY KEY (`res_contract_id`, `participant`),
  CONSTRAINT `contract_participant`
    FOREIGN KEY (`res_contract_id`)
    REFERENCES `BeWaterMelon`.`res_contracts` (`id`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `BeWaterMelon`.`pre_press`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `BeWaterMelon`.`pre_presses` ;

CREATE TABLE IF NOT EXISTS `BeWaterMelon`.`pre_presses` (
  `id` INT(5) NOT NULL,
  `name` VARCHAR(200) NOT NULL,
  `date` DATE NOT NULL,
  `source` VARCHAR(100) NOT NULL,
  `link` VARCHAR(500) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;

INSERT INTO `BeWaterMelon`.`ppl_users` (`name`,`lastname`,`rol`,`email`,`phone`,`bio`,`password`,`fax`,`link`)
VALUES ('Javier','Rodeiro','admin','admin@admin.com','654456645','Soy el profesor','$2y$10$6mqUPDGs1jBdJeFrEPRPiOldP4.nC4.zdqC6caSHcHkfx2QkzRT5i','654456645','link');



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
