ALTER TABLE `xikang365`.`foodstore_dish_food`     ADD COLUMN `app` VARCHAR(20) CHARSET utf8 DEFAULT '' NOT NULL COMMENT '应用' AFTER `i`;
ALTER TABLE `xikang365`.`foodstore_food`  ENGINE=INNODB AUTO_INCREMENT=18000 COMMENT='将所有的食物都存这个表里包括 食材和菜肴和即时食物' ROW_FORMAT=DEFAULT CHARSET=utf8 COLLATE=utf8_bin ;