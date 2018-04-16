#<----------Create Database-------------> 
CREATE DATABASE IF NOT EXISTS kajukart CHARACTER SET latin1 COLLATE latin1_swedish_ci;
#<------------end query----------------->
#<-----------Create category_tbl-------->
CREATE  TABLE IF NOT EXISTS `dbname`.`tbl_category` (
  `category_id` INT(10) PRIMARY KEY NOT NULL ,`category_name` VARCHAR(150) NOT NULL ,`status` TINYINT(1) ,`position` INT(5),
  `add_ip` VARCHAR(50),`add_by` VARCHAR(100),`add_time` DATETIME,`update_ip` VARCHAR(50),`update_by` VARCHAR(100),`update_time` DATETIME,
  `url_key` VARCHAR(100)  ,`meta_title` VARCHAR(200) ,`meta_keyword` VARCHAR(150) ,`meta_description` VARCHAR(150) ) ENGINE = INNODB; 
#<---------end of query-------------->
#<-------create subcategory tbl------>
CREATE  TABLE IF NOT EXISTS `dbname`.`tbl_sub_category` (
  `sub_category_id` INT(10) PRIMARY KEY NOT NULL ,`category_id` INT(10) NOT NULL ,`sub_category_name` VARCHAR(150) NOT NULL ,`status` TINYINT(1) ,`position` INT(5),
  `add_ip` VARCHAR(50),`add_by` VARCHAR(100),`add_time` DATETIME,`update_ip` VARCHAR(50),`update_by` VARCHAR(100),`update_time` DATETIME,
  `url_key` VARCHAR(100)  ,`meta_title` VARCHAR(200) ,`meta_keyword` VARCHAR(150) ,`meta_description` VARCHAR(150) ) ENGINE = INNODB; 
#<-----end of query----->
#<-------create product_type tbl----->
CREATE  TABLE IF NOT EXISTS `dbname`.`tbl_product_type` (
  `product_type_id` INT(10) PRIMARY KEY NOT NULL ,`category_id` INT(10) NOT NULL ,`sub_category_id` INT(10) NOT NULL,`product_type_name` VARCHAR(150) NOT NULL ,`status` TINYINT(1) ,`position` INT(5),
  `add_ip` VARCHAR(50),`add_by` VARCHAR(100),`add_time` DATETIME,`update_ip` VARCHAR(50),`update_by` VARCHAR(100),`update_time` DATETIME,
  `url_key` VARCHAR(100)  ,`meta_title` VARCHAR(200) ,`meta_keyword` VARCHAR(150) ,`meta_description` VARCHAR(150) ) ENGINE = INNODB;
#<-----end of query----->
#<----create product tbl----->
CREATE  TABLE IF NOT EXISTS `dbname`.`tbl_product` (
  `product_id` INT(10) PRIMARY KEY NOT NULL ,`product_name` VARCHAR(255) ,`category_id` INT(10) NOT NULL ,`category_name` VARCHAR(200),
  `sub_category_id` INT(10) NOT NULL,`sub_category_name` VARCHAR(200),`product_type_id` INT(10),`product_type_name` VARCHAR(150) NOT NULL ,
  `product_code` VARCHAR(255),`product_description` TEXT,`status` TINYINT(1) ,`position` INT(5),
  `add_ip` VARCHAR(50),`add_by` VARCHAR(100),`add_time` DATETIME,`update_ip` VARCHAR(50),`update_by` VARCHAR(100),`update_time` DATETIME,
  `url_key` VARCHAR(100)  ,`meta_title` VARCHAR(200) ,`meta_keyword` VARCHAR(150) ,`meta_description` VARCHAR(150) ) ENGINE = INNODB;
#<------end of query------>
