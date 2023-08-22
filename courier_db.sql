SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS,
  UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS,
  FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE,
  SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-- -----------------------------------------------------
-- Schema courier_schedule
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema courier_schedule
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `courier_schedule` DEFAULT CHARACTER SET utf8;
USE `courier_schedule`;
-- -----------------------------------------------------
-- Table `courier_schedule`.`courier`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `courier_schedule`.`courier` (
  `id` INT UNSIGNED NOT NULL,
  `courier_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`, `courier_name`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `courier_schedule`.`region`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `courier_schedule`.`region` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` VARCHAR(150) NOT NULL,
  `travel_time` INT UNSIGNED NULL,
  PRIMARY KEY (`id`, `city`)
) ENGINE = InnoDB;
-- -----------------------------------------------------
-- Table `courier_schedule`.`travel_data`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `courier_schedule`.`travel_data` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `courier_id` INT UNSIGNED NOT NULL,
  `region_id` INT UNSIGNED NOT NULL,
  `date_start` DATETIME NOT NULL,
  `date_finish` DATETIME NOT NULL,
  PRIMARY KEY (
    `id`,
    `courier_id`,
    `region_id`,
    `date_start`,
    `date_finish`
  )
) ENGINE = InnoDB;
SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;