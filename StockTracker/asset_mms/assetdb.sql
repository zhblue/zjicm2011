/*
MySQL Data Transfer
Source Host: localhost
Source Database: assetdb
Target Host: localhost
Target Database: assetdb
Date: 2010-3-31 13:54:55
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
-- Table structure for asset_type
-- ----------------------------
CREATE TABLE `asset_type` (
  `asset_type_id` int(4) NOT NULL AUTO_INCREMENT,
  `asset_type_number` varchar(10) NOT NULL,
  `asset_type_name` varchar(20) NOT NULL,
  `asset_type_decp` varchar(225) NOT NULL DEFAULT '',
  PRIMARY KEY (`asset_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for borrow
-- ----------------------------
CREATE TABLE `borrow` (
  `borrow_id` int(4) NOT NULL AUTO_INCREMENT,
  `borrow_state` varchar(10) NOT NULL,
  `borrow_time` date NOT NULL,
  `borrow_return_time_ap` date NOT NULL DEFAULT '2999-12-31',
  `borrow_return_time` date NOT NULL DEFAULT '2999-12-31',
  `borrow_borrowed_time` date NOT NULL DEFAULT '2999-12-31',
  `asset_id` int(4) DEFAULT NULL,
  `borrow_admin_check` int(4) DEFAULT NULL,
  `user_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`borrow_id`),
  KEY `asset_id` (`asset_id`),
  KEY `user_id` (`user_id`),
  KEY `borrow_admin_check` (`borrow_admin_check`),
  CONSTRAINT `borrow_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`asset_id`),
  CONSTRAINT `borrow_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `borrow_ibfk_3` FOREIGN KEY (`borrow_admin_check`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for employee
-- ----------------------------
CREATE TABLE `employee` (
  `emp_id` int(4) NOT NULL AUTO_INCREMENT,
  `emp_num` varchar(10) NOT NULL,
  `emp_name` varchar(10) NOT NULL,
  `emp_manid` varchar(20) NOT NULL,
  `emp_telnum` varchar(15) NOT NULL DEFAULT '',
  `emp_sex` char(1) NOT NULL DEFAULT '0',
  `emp_email` varchar(20) NOT NULL DEFAULT '',
  `emp_address` varchar(255) NOT NULL DEFAULT '',
  `user_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`emp_id`),
  UNIQUE KEY `user_id` (`user_id`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `t_user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for fix
-- ----------------------------
CREATE TABLE `fix` (
  `fix_id` int(4) NOT NULL AUTO_INCREMENT,
  `fix_state` varchar(10) NOT NULL,
  `fix_report_time` date NOT NULL,
  `fix_time_pre` date NOT NULL DEFAULT '2999-12-31',
  `fix_time_return` date NOT NULL DEFAULT '2999-12-31',
  `fix_time_check` date NOT NULL DEFAULT '2999-12-31',
  `fix_price` double(10,2) NOT NULL DEFAULT '0.00',
  `fix_check_factory` varchar(255) NOT NULL DEFAULT '',
  `fix_reason` varchar(255) NOT NULL DEFAULT '',
  `fix_report_id` int(4) DEFAULT NULL,
  `asset_id` int(4) DEFAULT NULL,
  `fix_check_admin` int(4) DEFAULT NULL,
  PRIMARY KEY (`fix_id`),
  KEY `asset_id` (`asset_id`),
  KEY `fix_report_id` (`fix_report_id`),
  KEY `fix_check_admin` (`fix_check_admin`),
  CONSTRAINT `fix_ibfk_1` FOREIGN KEY (`asset_id`) REFERENCES `asset` (`asset_id`),
  CONSTRAINT `fix_ibfk_2` FOREIGN KEY (`fix_report_id`) REFERENCES `employee` (`emp_id`),
  CONSTRAINT `fix_ibfk_3` FOREIGN KEY (`fix_check_admin`) REFERENCES `employee` (`emp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for popedom
-- ----------------------------
CREATE TABLE `popedom` (
  `popedom_id` int(4) NOT NULL AUTO_INCREMENT,
  `popedom_name` varchar(10) NOT NULL,
  `popedom_path` varchar(80) NOT NULL,
  `popedom_pam` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`popedom_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for role
-- ----------------------------
CREATE TABLE `role` (
  `role_id` int(4) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(20) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for role_popedom
-- ----------------------------
CREATE TABLE `role_popedom` (
  `role_id` int(4) DEFAULT NULL,
  `popedom_id` int(4) DEFAULT NULL,
  KEY `role_id` (`role_id`),
  KEY `popedom_id` (`popedom_id`),
  CONSTRAINT `role_popedom_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`),
  CONSTRAINT `role_popedom_ibfk_2` FOREIGN KEY (`popedom_id`) REFERENCES `popedom` (`popedom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
CREATE TABLE `t_user` (
  `user_id` int(4) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `role_id` int(4) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `t_user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `asset` VALUES ('2', '7678', '8768', '0', '0', '2020-11-18', '0', '2009-11-01', '876', '876', '786.00', null, null);
INSERT INTO `asset` VALUES ('4', '786', '876876', '1', '0', '2022-11-15', '0', '2009-11-01', '786786', '87678', '876876.00', null, null);
INSERT INTO `asset` VALUES ('5', '786', '876', '0', '0', '2021-11-23', '0', '2009-11-02', '786', '786', '786.00', null, null);
INSERT INTO `asset` VALUES ('6', '876', '876', '1', '0', '2022-11-23', '0', '2009-11-02', '876', '786', '87687.00', null, null);
INSERT INTO `asset` VALUES ('7', '22222', '11111', '0', '0', '2023-11-27', '0', '2009-11-01', '543', '145345', '45354.00', null, null);
INSERT INTO `asset` VALUES ('9', '11', '111', '0', '0', '2010-03-31', '0', '2010-03-03', '111', '111', '11.00', '2', '1');
INSERT INTO `asset_type` VALUES ('2', '786', '日用类', '65\r\n');
INSERT INTO `asset_type` VALUES ('3', '461', '工具类', '86765');
INSERT INTO `asset_type` VALUES ('4', 'no123', '食品类', '好吃~~~');
INSERT INTO `employee` VALUES ('1', '786', '878', '6776', '87687', '0', '68768', '87687', null);
INSERT INTO `employee` VALUES ('3', 'no1', '丽丽', '230988857484738444', '13984758494', '1', 'jjj@163.com', '哈尔滨', '13');
INSERT INTO `employee` VALUES ('4', 'no2', '看看', '230811198706092624', '13984758494', '0', 'mm@126.com', '佳木斯', '14');
INSERT INTO `popedom` VALUES ('1', '资产类型管理', 'http://localhost:8080/asset_mms/action/assetType.do', '?method=list');
INSERT INTO `popedom` VALUES ('2', '用户管理?', 'http://localhost:8080/asset_mms/action/employee.do', '?method=list');
INSERT INTO `popedom` VALUES ('3', '添置资产', 'http://localhost:8080/asset_mms/action/asset.do', '?method=addlist');
INSERT INTO `popedom` VALUES ('4', '报修资产', 'http://localhost:8080/asset_mms/action/asset.do', '?method=fixlist');
INSERT INTO `popedom` VALUES ('5', '报废资产', 'http://localhost:8080/asset_mms/action/asset.do', '?method=rejectlist');
INSERT INTO `popedom` VALUES ('6', '资产归还', 'http://localhost:8080/asset_mms/action/borrow.do', '?method=lendedlist');
INSERT INTO `popedom` VALUES ('7', '资产修缮', 'http://localhost:8080/asset_mms/action/fix.do', '?method=fixedlist');
INSERT INTO `popedom` VALUES ('8', '申借资产', 'http://localhost:8080/asset_mms/action/asset.do', '?method=lendlist');
INSERT INTO `popedom` VALUES ('9', '检索资产', 'http://localhost:8080/asset_mms/action/asset.do', '?method=checklist');
INSERT INTO `popedom` VALUES ('10', '申借审批', 'http://localhost:8080/asset_mms/action/borrow.do', '?method=lendinglist');
INSERT INTO `popedom` VALUES ('11', '添置审批', 'http://localhost:8080/asset_mms/action/borrow.do', '?method=addinglist');
INSERT INTO `popedom` VALUES ('12', '报废审批', 'http://localhost:8080/asset_mms/action/borrow.do', '?method=deletelist');
INSERT INTO `popedom` VALUES ('13', '报修审批', 'http://localhost:8080/asset_mms/action/borrow.do', '?method=fixinglist');
INSERT INTO `role` VALUES ('1', '系统管理员');
INSERT INTO `role` VALUES ('2', '普通员工');
INSERT INTO `role` VALUES ('3', '设备科长');
INSERT INTO `role` VALUES ('4', '院长');
INSERT INTO `role` VALUES ('5', '副院长');
INSERT INTO `role_popedom` VALUES ('3', '1');
INSERT INTO `role_popedom` VALUES ('3', '3');
INSERT INTO `role_popedom` VALUES ('3', '4');
INSERT INTO `role_popedom` VALUES ('3', '5');
INSERT INTO `role_popedom` VALUES ('2', '6');
INSERT INTO `role_popedom` VALUES ('3', '7');
INSERT INTO `role_popedom` VALUES ('2', '8');
INSERT INTO `role_popedom` VALUES ('3', '10');
INSERT INTO `role_popedom` VALUES ('4', '11');
INSERT INTO `role_popedom` VALUES ('4', '12');
INSERT INTO `role_popedom` VALUES ('5', '13');
INSERT INTO `t_user` VALUES ('1', 'ss', 'ss', '1');
INSERT INTO `t_user` VALUES ('2', 'aa', 'aa', '2');
INSERT INTO `t_user` VALUES ('3', 'dd', 'dd', '3');
INSERT INTO `t_user` VALUES ('4', 'ff', 'ff', '4');
INSERT INTO `t_user` VALUES ('13', 'qq', 'qq', '1');
INSERT INTO `t_user` VALUES ('14', 'ww', 'ww', '2');
