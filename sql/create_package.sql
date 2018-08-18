CREATE TABLE `catering`.`package` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idtrans` INT NULL COMMENT 'id of transaction ( if null the user are used catering only)',
  `idpackage_list` INT NULL COMMENT 'id of the package came from package list',
  PRIMARY KEY (`id`))
COMMENT = 'package transaction';

ALTER TABLE `catering`.`package` 
ADD COLUMN `iduser` INT NULL AFTER `id`;
