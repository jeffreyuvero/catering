ALTER TABLE `catering`.`menu` 
CHANGE COLUMN `menu` `name` VARCHAR(45) NULL DEFAULT NULL , RENAME TO  `catering`.`dishes` ;


ALTER TABLE `catering`.`menu` 
CHANGE COLUMN `idpackage_list` `description` VARCHAR(45) NULL DEFAULT NULL ;


ALTER TABLE `catering`.`menu` 
ADD COLUMN `price` VARCHAR(45) NULL AFTER `description`;


