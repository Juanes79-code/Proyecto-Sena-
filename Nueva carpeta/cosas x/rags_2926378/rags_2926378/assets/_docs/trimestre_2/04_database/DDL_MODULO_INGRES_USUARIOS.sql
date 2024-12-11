-- MySQL Script generated by MySQL Workbench
-- Fri Nov 22 16:26:06 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8 ;
USE `mydb` ;

-- -----------------------------------------------------
-- Table `mydb`.`Equipos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Equipos` (
  `Equipo_id` INT NOT NULL,
  `Usuario_Id` INT NULL,
  `Tipo` VARCHAR(45) NOT NULL,
  `Marca` VARCHAR(45) NOT NULL,
  `numero_serie` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Equipo_id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Registros`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Registros` (
  `Registros_ID` INT NOT NULL,
  `Usuario_Id` INT NULL,
  `fecha` DATE NOT NULL,
  `hora_entrada` TIME NOT NULL,
  `hora_salida` TIME NOT NULL,
  PRIMARY KEY (`Registros_ID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mydb`.`Usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mydb`.`Usuarios` (
  `Usuario_Id` INT NOT NULL,
  `Usuario_Nombre` VARCHAR(45) NOT NULL,
  `Usuario_Cedula` INT(20) NOT NULL,
  `Usuario_tIpo` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`Usuario_Id`),
  INDEX (`Usuario_Id` ASC) VISIBLE,
  CONSTRAINT `Usuario_Id`
    FOREIGN KEY ()
    REFERENCES `mydb`.`Equipos` ()
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `Usuario_Id`
    FOREIGN KEY (`Usuario_Id`)
    REFERENCES `mydb`.`Registros` (`Registros_ID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;