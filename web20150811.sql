/*
Navicat MySQL Data Transfer

Source Server         : localhost_80
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-08-25 19:01:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bill`
-- ----------------------------
DROP TABLE IF EXISTS `bill`;
CREATE TABLE `bill` (
  `billID` bigint(20) NOT NULL,
  `seatID` bigint(20) NOT NULL,
  `allPrice` float(20,2) NOT NULL,
  `date` date NOT NULL,
  `dealTF` int(1) NOT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY  (`billID`),
  KEY `FK_Reference_8` (`seatID`),
  KEY `FK_Reference_9` (`staffID`),
  CONSTRAINT `FK_Reference_8` FOREIGN KEY (`seatID`) REFERENCES `seat` (`seatID`),
  CONSTRAINT `FK_Reference_9` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bill
-- ----------------------------
INSERT INTO `bill` VALUES ('1', '1', '200.00', '2015-05-25', '1', '1');

-- ----------------------------
-- Table structure for `billfood`
-- ----------------------------
DROP TABLE IF EXISTS `billfood`;
CREATE TABLE `billfood` (
  `billID` bigint(20) NOT NULL,
  `foodID` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `price` float(20,2) NOT NULL,
  PRIMARY KEY  (`billID`,`foodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of billfood
-- ----------------------------
INSERT INTO `billfood` VALUES ('1', '1', '1', '10.00');
INSERT INTO `billfood` VALUES ('1', '2', '1', '11.00');
INSERT INTO `billfood` VALUES ('1', '3', '1', '2.00');
INSERT INTO `billfood` VALUES ('1', '4', '2', '36.00');
INSERT INTO `billfood` VALUES ('1', '5', '1', '17.00');
INSERT INTO `billfood` VALUES ('1', '6', '1', '15.00');

-- ----------------------------
-- Table structure for `checkwork`
-- ----------------------------
DROP TABLE IF EXISTS `checkwork`;
CREATE TABLE `checkwork` (
  `date` date NOT NULL,
  `staffID` bigint(20) NOT NULL,
  `workPercentage` float NOT NULL,
  PRIMARY KEY  (`date`,`staffID`),
  KEY `FK_Reference_1` (`staffID`),
  CONSTRAINT `FK_Reference_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of checkwork
-- ----------------------------

-- ----------------------------
-- Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `foodID` bigint(20) NOT NULL,
  `foodName` varchar(50) NOT NULL,
  `price` float(20,2) NOT NULL,
  `foodType` varchar(50) NOT NULL,
  `description` varchar(200) default NULL,
  `imageLocation` varchar(200) default NULL,
  PRIMARY KEY  (`foodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('1', '酸辣土豆丝', '10.00', '川菜', '辣', 'images/food/tudousi.jpg');
INSERT INTO `food` VALUES ('2', '炒牛肉', '11.00', '川菜', '辣', 'images/food/chaoniurou.jpg');
INSERT INTO `food` VALUES ('3', '炒青菜', '2.00', '川菜', '不辣', 'images/food/qingcai.jpg');
INSERT INTO `food` VALUES ('4', '酸辣鲤鱼', '18.00', '川菜', '微辣', 'images/food/liyu.jpg');
INSERT INTO `food` VALUES ('5', '酸辣鲫鱼', '17.00', '川菜', '微辣', 'images/food/jiyu.jpg');
INSERT INTO `food` VALUES ('6', '酸辣草鱼', '15.00', ' 川菜', '微辣', 'images/food/caoyu.jpg');

-- ----------------------------
-- Table structure for `foodingredients`
-- ----------------------------
DROP TABLE IF EXISTS `foodingredients`;
CREATE TABLE `foodingredients` (
  `id` bigint(20) NOT NULL,
  `foodID` bigint(20) NOT NULL,
  `ingredientsID` bigint(20) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `FK_Reference_10` (`foodID`),
  KEY `FK_Reference_13` (`ingredientsID`),
  CONSTRAINT `FK_Reference_10` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`),
  CONSTRAINT `FK_Reference_13` FOREIGN KEY (`ingredientsID`) REFERENCES `ingredients` (`ingredientsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foodingredients
-- ----------------------------
INSERT INTO `foodingredients` VALUES ('1', '1', '1');
INSERT INTO `foodingredients` VALUES ('2', '1', '2');
INSERT INTO `foodingredients` VALUES ('3', '2', '2');
INSERT INTO `foodingredients` VALUES ('4', '3', '3');
INSERT INTO `foodingredients` VALUES ('5', '4', '2');
INSERT INTO `foodingredients` VALUES ('6', '4', '4');
INSERT INTO `foodingredients` VALUES ('7', '5', '2');
INSERT INTO `foodingredients` VALUES ('8', '5', '5');
INSERT INTO `foodingredients` VALUES ('9', '6', '2');
INSERT INTO `foodingredients` VALUES ('10', '6', '6');

-- ----------------------------
-- Table structure for `ingredientpurchase`
-- ----------------------------
DROP TABLE IF EXISTS `ingredientpurchase`;
CREATE TABLE `ingredientpurchase` (
  `ingredientsID` bigint(20) NOT NULL,
  `purchaseID` bigint(20) NOT NULL,
  `number` float NOT NULL,
  `price` float default NULL,
  PRIMARY KEY  (`ingredientsID`,`purchaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredientpurchase
-- ----------------------------
INSERT INTO `ingredientpurchase` VALUES ('1', '1', '10', '3');
INSERT INTO `ingredientpurchase` VALUES ('1', '123', '234', '3');
INSERT INTO `ingredientpurchase` VALUES ('1', '1234', '10', '3');
INSERT INTO `ingredientpurchase` VALUES ('2', '1', '10', '10');
INSERT INTO `ingredientpurchase` VALUES ('3', '1', '10', '1');
INSERT INTO `ingredientpurchase` VALUES ('4', '1', '10', '15');
INSERT INTO `ingredientpurchase` VALUES ('5', '1', '10', '18');
INSERT INTO `ingredientpurchase` VALUES ('6', '1', '10', '7');
INSERT INTO `ingredientpurchase` VALUES ('7', '1', '10', '2');
INSERT INTO `ingredientpurchase` VALUES ('8', '1', '10', '1');
INSERT INTO `ingredientpurchase` VALUES ('9', '1', '10', '100');
INSERT INTO `ingredientpurchase` VALUES ('10', '1', '10', '30');

-- ----------------------------
-- Table structure for `ingredientpurchasetemp`
-- ----------------------------
DROP TABLE IF EXISTS `ingredientpurchasetemp`;
CREATE TABLE `ingredientpurchasetemp` (
  `ingredientIDtemp` bigint(20) NOT NULL,
  `purchaseIDtemp` bigint(20) NOT NULL,
  `numbertemp` float NOT NULL,
  `pricetemp` float default NULL,
  PRIMARY KEY  (`ingredientIDtemp`,`purchaseIDtemp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredientpurchasetemp
-- ----------------------------
INSERT INTO `ingredientpurchasetemp` VALUES ('1', '1234', '10', '3');

-- ----------------------------
-- Table structure for `ingredientrepertory`
-- ----------------------------
DROP TABLE IF EXISTS `ingredientrepertory`;
CREATE TABLE `ingredientrepertory` (
  `ingredientsID` bigint(20) NOT NULL,
  `repertoryID` bigint(20) NOT NULL,
  `number` float NOT NULL,
  PRIMARY KEY  (`ingredientsID`,`repertoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredientrepertory
-- ----------------------------
INSERT INTO `ingredientrepertory` VALUES ('1', '1', '20');
INSERT INTO `ingredientrepertory` VALUES ('2', '1', '10');
INSERT INTO `ingredientrepertory` VALUES ('2', '2', '10');
INSERT INTO `ingredientrepertory` VALUES ('4', '2', '20');
INSERT INTO `ingredientrepertory` VALUES ('5', '2', '30');
INSERT INTO `ingredientrepertory` VALUES ('6', '3', '10');
INSERT INTO `ingredientrepertory` VALUES ('7', '3', '100');
INSERT INTO `ingredientrepertory` VALUES ('8', '4', '11');
INSERT INTO `ingredientrepertory` VALUES ('9', '5', '12');
INSERT INTO `ingredientrepertory` VALUES ('10', '1', '10');

-- ----------------------------
-- Table structure for `ingredients`
-- ----------------------------
DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `ingredientsID` bigint(20) NOT NULL,
  `ingredientName` varchar(50) NOT NULL,
  `price` float(20,2) NOT NULL,
  `number` float(20,2) NOT NULL,
  `description` varchar(100) default NULL,
  PRIMARY KEY  (`ingredientsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredients
-- ----------------------------
INSERT INTO `ingredients` VALUES ('1', '土豆丝', '3.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('2', '辣椒', '10.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('3', '青菜', '1.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('4', '鲤鱼', '15.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('5', '鲫鱼', '18.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('6', '草鱼', '7.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('7', '芹菜', '2.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('8', '韭菜', '1.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('9', '鲍鱼', '100.00', '0.00', null);
INSERT INTO `ingredients` VALUES ('10', '海参', '30.00', '0.00', null);

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menuID` bigint(20) NOT NULL,
  `foodID` bigint(20) NOT NULL,
  `state` int(1) NOT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY  (`menuID`),
  KEY `FK_Reference_7` (`staffID`),
  CONSTRAINT `FK_Reference_7` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '1', '1', '1');
INSERT INTO `menu` VALUES ('2', '2', '1', '1');
INSERT INTO `menu` VALUES ('3', '3', '1', '1');
INSERT INTO `menu` VALUES ('4', '4', '1', '1');
INSERT INTO `menu` VALUES ('5', '5', '1', '1');
INSERT INTO `menu` VALUES ('6', '6', '1', '1');

-- ----------------------------
-- Table structure for `purchase`
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchaseID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY  (`purchaseID`),
  KEY `FK_Reference_11` (`staffID`),
  CONSTRAINT `FK_Reference_11` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of purchase
-- ----------------------------

-- ----------------------------
-- Table structure for `repair`
-- ----------------------------
DROP TABLE IF EXISTS `repair`;
CREATE TABLE `repair` (
  `repairID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `dealMoney` float default NULL,
  `eventDescription` varchar(500) default NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY  (`repairID`),
  KEY `FK_Reference_3` (`staffID`),
  CONSTRAINT `FK_Reference_3` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repair
-- ----------------------------

-- ----------------------------
-- Table structure for `repertory`
-- ----------------------------
DROP TABLE IF EXISTS `repertory`;
CREATE TABLE `repertory` (
  `repertoryID` bigint(20) NOT NULL,
  `capacity` float default NULL,
  `area` float default NULL,
  `position` varchar(100) NOT NULL,
  `staffID` bigint(20) default NULL,
  PRIMARY KEY  (`repertoryID`),
  KEY `FK_Reference_12` (`staffID`),
  CONSTRAINT `FK_Reference_12` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repertory
-- ----------------------------
INSERT INTO `repertory` VALUES ('1', '123', '10000', '北京', '1');
INSERT INTO `repertory` VALUES ('2', '1000', '10000', '南京', '2');
INSERT INTO `repertory` VALUES ('3', '1000', '10000', '天津', '1');
INSERT INTO `repertory` VALUES ('4', '1000', '10000', '南极', '2');
INSERT INTO `repertory` VALUES ('5', '1000', '10000', '东京', '1');
INSERT INTO `repertory` VALUES ('6', '1000', '10000', '山东', '2');

-- ----------------------------
-- Table structure for `sale`
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale` (
  `saleID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `profitMoney` float NOT NULL,
  `lossMoney` float NOT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY  (`saleID`),
  KEY `FK_Reference_2` (`staffID`),
  CONSTRAINT `FK_Reference_2` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sale
-- ----------------------------

-- ----------------------------
-- Table structure for `seat`
-- ----------------------------
DROP TABLE IF EXISTS `seat`;
CREATE TABLE `seat` (
  `seatID` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `seatState` int(2) NOT NULL,
  `capacity` int(2) NOT NULL,
  `seatDirection` varchar(30) default NULL,
  PRIMARY KEY  (`seatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seat
-- ----------------------------
INSERT INTO `seat` VALUES ('1', '1', '0', '4', '一楼');
INSERT INTO `seat` VALUES ('2', '2', '0', '4', '一楼');
INSERT INTO `seat` VALUES ('3', '3', '0', '4', '一楼');
INSERT INTO `seat` VALUES ('4', '4', '1', '4', '二楼');
INSERT INTO `seat` VALUES ('5', '5', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('6', '6', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('7', '7', '0', '4', '三楼');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staffID` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(2) default NULL,
  `age` int(11) default NULL,
  `identityCardID` varchar(50) NOT NULL,
  `position` varchar(100) default NULL,
  `phone` varchar(20) NOT NULL,
  `wage` int(11) default NULL,
  `startWorkTime` date NOT NULL,
  `endWorkTime` date default NULL,
  PRIMARY KEY  (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', '张三', '男', '25', '6115221990', null, '15611114444', null, '2015-04-15', null);
INSERT INTO `staff` VALUES ('2', '李四', '男', '30', '32128319950629181X', null, '13263138306', null, '2015-10-19', null);

-- ----------------------------
-- Table structure for `usersystem`
-- ----------------------------
DROP TABLE IF EXISTS `usersystem`;
CREATE TABLE `usersystem` (
  `userID` bigint(20) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `email` varchar(50) default NULL,
  PRIMARY KEY  (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usersystem
-- ----------------------------
INSERT INTO `usersystem` VALUES ('1', 'admin', 'admin', '0', 'temp@gmail.com');

-- ----------------------------
-- View structure for `tadaymenu`
-- ----------------------------
DROP VIEW IF EXISTS `tadaymenu`;
CREATE ALGORITHM=UNDEFINED DEFINER=`web`@`localhost` SQL SECURITY DEFINER VIEW `tadaymenu` AS select `web`.`food`.`foodName` AS `foodName`,`web`.`food`.`price` AS `price`,`web`.`food`.`foodType` AS `foodType`,`web`.`food`.`description` AS `description`,`web`.`menu`.`state` AS `state`,`web`.`food`.`imageLocation` AS `image` from (`menu` join `food`) where (`web`.`menu`.`foodID` = `web`.`food`.`foodID`) ;
