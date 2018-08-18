CREATE TABLE `catering`.`new_table` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `menu` VARCHAR(45) NULL,
  `idpackage_list` INT NULL,
  PRIMARY KEY (`id`));

ALTER TABLE `catering`.`new_table` 
RENAME TO  `catering`.`menu` ;
