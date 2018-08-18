CREATE TABLE `catering`.`addons_list` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idaddons_list` VARCHAR(45) NULL,
  `price` VARCHAR(45) NULL,
  PRIMARY KEY (`id`))
COMMENT = 'list of addons item';

ALTER TABLE `catering`.`addons_list` 
CHANGE COLUMN `idaddons_list` `addons_list` VARCHAR(45) NULL DEFAULT NULL ;
