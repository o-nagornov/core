SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `core` ;
CREATE SCHEMA IF NOT EXISTS `core` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `core` ;

-- -----------------------------------------------------
-- Table `core`.`tbl_account`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core`.`tbl_account` ;

CREATE  TABLE IF NOT EXISTS `core`.`tbl_account` (
  `id_account` INT NOT NULL AUTO_INCREMENT ,
  `login` VARCHAR(45) NOT NULL ,
  `password` VARCHAR(45) NULL ,
  `creation_date` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ,
  `stop_date` VARCHAR(45) NULL ,
  `tbl_prefix` VARCHAR(45) NULL ,
  `locked` TINYINT(1) NULL ,
  `status` VARCHAR(45) NULL ,
  PRIMARY KEY (`id_account`) )
ENGINE = InnoDB;

CREATE UNIQUE INDEX `id_account_UNIQUE` ON `core`.`tbl_account` (`id_account` ASC) ;

CREATE UNIQUE INDEX `login_UNIQUE` ON `core`.`tbl_account` (`login` ASC) ;


-- -----------------------------------------------------
-- Table `core`.`tbl_tariff`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `core`.`tbl_tariff` ;

CREATE  TABLE IF NOT EXISTS `core`.`tbl_tariff` (
  `id_tariff` INT NOT NULL ,
  PRIMARY KEY (`id_tariff`) )
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
