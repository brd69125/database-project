ALTER TABLE `service_ticket` ADD FOREIGN KEY (`customer`) REFERENCES `dealership`.`customer`(`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;