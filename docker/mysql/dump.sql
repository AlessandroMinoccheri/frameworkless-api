CREATE TABLE `test`.`users` (
                                `id` INT NOT NULL AUTO_INCREMENT,
                                `username` VARCHAR(45) NOT NULL,
                                `role` VARCHAR(45) NOT NULL);
INSERT INTO `test`.`users` (`username`, `role`) VALUES ('Joe', 'admin');
INSERT INTO `test`.`users` (`username`, `role`) VALUES ('Black', 'customer');