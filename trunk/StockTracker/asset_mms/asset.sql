/*
MySQL Data Transfer
Source Host: localhost
Source Database: assetdb
Target Host: localhost
Target Database: assetdb
Date: 2011-5-9 20:41:21
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for asset
-- ----------------------------
CREATE TABLE `asset` (
  `asset_id` int(4) NOT NULL AUTO_INCREMENT,
  `asset_number` varchar(10) NOT NULL,
  `asset_name` varchar(20) NOT NULL,
  `asset_use_type` char(2) NOT NULL DEFAULT '0',
  `asset_state` char(2) NOT NULL DEFAULT '0',
  `asset_use_to_year` date NOT NULL DEFAULT '2999-12-31',
  `asset_use_time` varchar(20) NOT NULL DEFAULT '',
  `asset_buy_time` date NOT NULL DEFAULT '1800-12-31',
  `asset_factory` varchar(20) NOT NULL DEFAULT '',
  `asset_model_type` varchar(20) NOT NULL DEFAULT '',
  `asset_price` double(10,2) NOT NULL DEFAULT '0.00',
  `asset_type_id` int(4) DEFAULT NULL,
  `emp_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`asset_id`),
  KEY `asset_type_id` (`asset_type_id`),
  KEY `emp_ibfk_1` (`emp_id`),
  CONSTRAINT `asset_ibfk_1` FOREIGN KEY (`asset_type_id`) REFERENCES `asset_type` (`asset_type_id`),
  CONSTRAINT `emp_ibfk_1` FOREIGN KEY (`emp_id`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `asset` VALUES ('2', '7678', '8768', '0', '0', '2020-11-18', '0', '2009-11-01', '876', '876', '786.00', null, null);
INSERT INTO `asset` VALUES ('4', '786', '876876', '1', '0', '2022-11-15', '0', '2009-11-01', '786786', '87678', '876876.00', null, null);
INSERT INTO `asset` VALUES ('5', '786', '876', '0', '0', '2021-11-23', '0', '2009-11-02', '786', '786', '786.00', null, null);
INSERT INTO `asset` VALUES ('6', '876', '876', '1', '0', '2022-11-23', '0', '2009-11-02', '876', '786', '87687.00', null, null);
INSERT INTO `asset` VALUES ('7', '22222', '11111', '0', '0', '2023-11-27', '0', '2009-11-01', '543', '145345', '45354.00', null, null);
INSERT INTO `asset` VALUES ('9', '11', '111', '0', '0', '2010-03-31', '0', '2010-03-03', '111', '111', '11.00', '2', '1');
