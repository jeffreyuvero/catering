CREATE TABLE `catering`.`records` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `idtrans` INT NULL,
  `total_amount` VARCHAR(45) NULL,
  `transaction_date` DATE NULL,
  PRIMARY KEY (`id`))
COMMENT = 'the date will save in this table after the transaction is confirm (finish)';
