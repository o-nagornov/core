SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `core` ;
CREATE SCHEMA IF NOT EXISTS `core` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `core` ;

-- -----------------------------------------------------
-- Table `core`.`tbl_tariff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core`.`tbl_tariff` ;

CREATE  TABLE IF NOT EXISTS `core`.`tbl_tariff` (
  `id_tariff` INT NOT NULL AUTO_INCREMENT ,
  `users_limit` INT NOT NULL ,
  `books_limit` INT NOT NULL ,
  `day_cost` DECIMAL(10,2) NOT NULL ,
  `title` VARCHAR(100) NOT NULL ,
  `description` TEXT NULL ,
  PRIMARY KEY (`id_tariff`) )
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE UNIQUE INDEX `title_UNIQUE` ON `core`.`tbl_tariff` (`title` ASC) ;

CREATE UNIQUE INDEX `id_tariff_UNIQUE` ON `core`.`tbl_tariff` (`id_tariff` ASC) ;


-- -----------------------------------------------------
-- Table `core`.`tbl_account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core`.`tbl_account` ;

CREATE  TABLE IF NOT EXISTS `core`.`tbl_account` (
  `id_account` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `email` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NOT NULL ,
  `creation_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `tbl_prefix` VARCHAR(45) NULL ,
  `status` VARCHAR(45) NOT NULL DEFAULT 'new' ,
  `role` VARCHAR(45) NOT NULL DEFAULT 'guest' ,
  `check_hash` VARCHAR(45) NULL ,
  `account` DECIMAL(10,2) NOT NULL DEFAULT 0.0 ,
  `tariff_id` INT NOT NULL ,
  PRIMARY KEY (`id_account`) ,
  CONSTRAINT `fk_tbl_account_tbl_tariff`
    FOREIGN KEY (`tariff_id` )
    REFERENCES `core`.`tbl_tariff` (`id_tariff` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE UNIQUE INDEX `id_account_UNIQUE` ON `core`.`tbl_account` (`id_account` ASC) ;

CREATE UNIQUE INDEX `login_UNIQUE` ON `core`.`tbl_account` (`login` ASC) ;

CREATE INDEX `fk_tbl_account_tbl_tariff1` ON `core`.`tbl_account` (`tariff_id` ASC) ;

CREATE UNIQUE INDEX `email_UNIQUE` ON `core`.`tbl_account` (`email` ASC) ;


-- -----------------------------------------------------
-- Table `core`.`tbl_payment`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core`.`tbl_payment` ;

CREATE  TABLE IF NOT EXISTS `core`.`tbl_payment` (
  `id_payment` INT NOT NULL AUTO_INCREMENT ,
  `payment_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `summ` DECIMAL(10,2) NULL ,
  `account_id` INT UNSIGNED NOT NULL ,
  PRIMARY KEY (`id_payment`) ,
  CONSTRAINT `fk_tbl_payment_tbl_account`
    FOREIGN KEY (`account_id` )
    REFERENCES `core`.`tbl_account` (`id_account` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;

CREATE UNIQUE INDEX `id_payment_UNIQUE` ON `core`.`tbl_payment` (`id_payment` ASC) ;

CREATE INDEX `fk_tbl_payment_tbl_account1` ON `core`.`tbl_payment` (`account_id` ASC) ;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
