/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50612
Source Host           : localhost:3306
Source Database       : web

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Date: 2016-04-07 19:45:12
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
  `dealTF` int(1) DEFAULT NULL,
  `staffID` bigint(20) DEFAULT NULL,
  `isNew` bigint(1) NOT NULL,
  PRIMARY KEY (`billID`),
  KEY `FK_Reference_8` (`seatID`),
  KEY `FK_Reference_9` (`staffID`),
  CONSTRAINT `FK_Reference_8` FOREIGN KEY (`seatID`) REFERENCES `seat` (`seatID`),
  CONSTRAINT `FK_Reference_9` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bill
-- ----------------------------
INSERT INTO `bill` VALUES ('1', '2', '130.00', '2016-01-11', '1', '150901', '0');
INSERT INTO `bill` VALUES ('2', '3', '40.00', '2016-03-08', '1', '150901', '0');
INSERT INTO `bill` VALUES ('3', '4', '300.00', '2016-04-01', '1', '150902', '0');
INSERT INTO `bill` VALUES ('4', '5', '200.00', '2016-03-30', '1', '150902', '0');
INSERT INTO `bill` VALUES ('5', '1', '400.00', '2016-02-20', '1', '150903', '0');
INSERT INTO `bill` VALUES ('6', '3', '299.00', '2016-02-26', '1', '150904', '0');
INSERT INTO `bill` VALUES ('7', '7', '500.00', '2016-03-03', '1', '150903', '0');
INSERT INTO `bill` VALUES ('8', '1', '20.00', '2016-04-03', null, null, '0');
INSERT INTO `bill` VALUES ('9', '1', '95.00', '2016-02-12', null, null, '0');

-- ----------------------------
-- Table structure for `billfood`
-- ----------------------------
DROP TABLE IF EXISTS `billfood`;
CREATE TABLE `billfood` (
  `billID` bigint(20) NOT NULL,
  `foodID` bigint(20) NOT NULL,
  `number` int(11) NOT NULL,
  `price` float(20,2) NOT NULL,
  PRIMARY KEY (`billID`,`foodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of billfood
-- ----------------------------
INSERT INTO `billfood` VALUES ('1', '1', '2', '20.00');
INSERT INTO `billfood` VALUES ('1', '2', '3', '30.00');
INSERT INTO `billfood` VALUES ('2', '1', '2', '20.00');
INSERT INTO `billfood` VALUES ('3', '4', '2', '15.00');
INSERT INTO `billfood` VALUES ('3', '5', '30', '2.00');
INSERT INTO `billfood` VALUES ('4', '1', '2', '20.00');
INSERT INTO `billfood` VALUES ('4', '3', '1', '30.00');
INSERT INTO `billfood` VALUES ('5', '2', '1', '30.00');
INSERT INTO `billfood` VALUES ('6', '3', '2', '30.00');
INSERT INTO `billfood` VALUES ('6', '4', '2', '15.00');
INSERT INTO `billfood` VALUES ('7', '2', '3', '30.00');
INSERT INTO `billfood` VALUES ('7', '3', '3', '30.00');
INSERT INTO `billfood` VALUES ('8', '1', '1', '20.00');
INSERT INTO `billfood` VALUES ('9', '1', '1', '20.00');
INSERT INTO `billfood` VALUES ('9', '2', '1', '30.00');
INSERT INTO `billfood` VALUES ('9', '3', '1', '30.00');
INSERT INTO `billfood` VALUES ('9', '4', '1', '15.00');

-- ----------------------------
-- Table structure for `checkwork`
-- ----------------------------
DROP TABLE IF EXISTS `checkwork`;
CREATE TABLE `checkwork` (
  `date` date NOT NULL,
  `staffID` bigint(20) NOT NULL,
  `workPercentage` float NOT NULL,
  PRIMARY KEY (`date`,`staffID`),
  KEY `FK_Reference_1` (`staffID`),
  CONSTRAINT `FK_Reference_1` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of checkwork
-- ----------------------------
INSERT INTO `checkwork` VALUES ('2015-08-01', '150901', '10');
INSERT INTO `checkwork` VALUES ('2015-08-01', '150902', '10');
INSERT INTO `checkwork` VALUES ('2015-08-01', '150903', '10');
INSERT INTO `checkwork` VALUES ('2015-08-02', '150904', '30');
INSERT INTO `checkwork` VALUES ('2015-08-03', '150905', '40');
INSERT INTO `checkwork` VALUES ('2015-08-04', '150907', '30');
INSERT INTO `checkwork` VALUES ('2015-08-05', '150901', '40');
INSERT INTO `checkwork` VALUES ('2015-08-23', '150903', '20');
INSERT INTO `checkwork` VALUES ('2015-09-01', '150902', '30');
INSERT INTO `checkwork` VALUES ('2015-09-03', '150904', '30');

-- ----------------------------
-- Table structure for `food`
-- ----------------------------
DROP TABLE IF EXISTS `food`;
CREATE TABLE `food` (
  `foodID` bigint(20) NOT NULL,
  `foodName` varchar(50) NOT NULL,
  `price` float(20,2) NOT NULL,
  `foodType` varchar(50) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `imageLocation` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`foodID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of food
-- ----------------------------
INSERT INTO `food` VALUES ('1', '红烧草鱼', '20.00', '鱼', '红烧草鱼', 'images/food/caoyu.jpg');
INSERT INTO `food` VALUES ('2', '红烧鲤鱼', '30.00', '鲤鱼', '鲤鱼', 'images/food/liyu.jpg');
INSERT INTO `food` VALUES ('3', '小炒牛肉', '30.00', '肉', '牛肉', 'images/food/chaoniurou.jpg');
INSERT INTO `food` VALUES ('4', '红烧鲫鱼', '15.00', '鲫鱼', '鲫鱼', 'images/food/jiyu.jpg');
INSERT INTO `food` VALUES ('5', '炒青菜', '2.00', '青菜', '青菜', 'images/food/qingcai.jpg');

-- ----------------------------
-- Table structure for `foodingredients`
-- ----------------------------
DROP TABLE IF EXISTS `foodingredients`;
CREATE TABLE `foodingredients` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `foodID` bigint(20) NOT NULL,
  `ingredientsID` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_Reference_10` (`foodID`),
  KEY `FK_Reference_13` (`ingredientsID`),
  CONSTRAINT `FK_Reference_10` FOREIGN KEY (`foodID`) REFERENCES `food` (`foodID`),
  CONSTRAINT `FK_Reference_13` FOREIGN KEY (`ingredientsID`) REFERENCES `ingredients` (`ingredientsID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of foodingredients
-- ----------------------------
INSERT INTO `foodingredients` VALUES ('1', '1', '1');
INSERT INTO `foodingredients` VALUES ('2', '2', '3');

-- ----------------------------
-- Table structure for `ingredientpurchase`
-- ----------------------------
DROP TABLE IF EXISTS `ingredientpurchase`;
CREATE TABLE `ingredientpurchase` (
  `ingredientsID` bigint(20) NOT NULL,
  `purchaseID` bigint(20) NOT NULL,
  `number` float NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`ingredientsID`,`purchaseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredientpurchase
-- ----------------------------
INSERT INTO `ingredientpurchase` VALUES ('1', '1', '12', '25');
INSERT INTO `ingredientpurchase` VALUES ('1', '2', '20', '25');
INSERT INTO `ingredientpurchase` VALUES ('2', '1', '10', '80');
INSERT INTO `ingredientpurchase` VALUES ('2', '2', '10', '80');
INSERT INTO `ingredientpurchase` VALUES ('3', '1', '10', '28');
INSERT INTO `ingredientpurchase` VALUES ('3', '2', '20', '28');
INSERT INTO `ingredientpurchase` VALUES ('4', '1', '10', '19');
INSERT INTO `ingredientpurchase` VALUES ('4', '2', '10', '19');

-- ----------------------------
-- Table structure for `ingredientpurchasetemp`
-- ----------------------------
DROP TABLE IF EXISTS `ingredientpurchasetemp`;
CREATE TABLE `ingredientpurchasetemp` (
  `ingredientIDtemp` bigint(20) NOT NULL,
  `purchaseIDtemp` bigint(20) NOT NULL,
  `numbertemp` float NOT NULL,
  `pricetemp` float DEFAULT NULL,
  PRIMARY KEY (`ingredientIDtemp`,`purchaseIDtemp`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredientpurchasetemp
-- ----------------------------

-- ----------------------------
-- Table structure for `ingredientrepertory`
-- ----------------------------
DROP TABLE IF EXISTS `ingredientrepertory`;
CREATE TABLE `ingredientrepertory` (
  `ingredientsID` bigint(20) NOT NULL,
  `repertoryID` bigint(20) NOT NULL,
  `number` float NOT NULL,
  PRIMARY KEY (`ingredientsID`,`repertoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredientrepertory
-- ----------------------------
INSERT INTO `ingredientrepertory` VALUES ('1', '1', '34');
INSERT INTO `ingredientrepertory` VALUES ('1', '2', '0');
INSERT INTO `ingredientrepertory` VALUES ('1', '3', '0');
INSERT INTO `ingredientrepertory` VALUES ('2', '1', '1244');
INSERT INTO `ingredientrepertory` VALUES ('2', '2', '0');
INSERT INTO `ingredientrepertory` VALUES ('2', '3', '0');
INSERT INTO `ingredientrepertory` VALUES ('3', '1', '20');
INSERT INTO `ingredientrepertory` VALUES ('3', '2', '0');
INSERT INTO `ingredientrepertory` VALUES ('3', '3', '0');
INSERT INTO `ingredientrepertory` VALUES ('4', '1', '133');
INSERT INTO `ingredientrepertory` VALUES ('4', '2', '0');
INSERT INTO `ingredientrepertory` VALUES ('4', '3', '0');
INSERT INTO `ingredientrepertory` VALUES ('5', '1', '246');
INSERT INTO `ingredientrepertory` VALUES ('5', '2', '678');
INSERT INTO `ingredientrepertory` VALUES ('5', '3', '0');
INSERT INTO `ingredientrepertory` VALUES ('7', '2', '0');
INSERT INTO `ingredientrepertory` VALUES ('7', '3', '0');

-- ----------------------------
-- Table structure for `ingredients`
-- ----------------------------
DROP TABLE IF EXISTS `ingredients`;
CREATE TABLE `ingredients` (
  `ingredientsID` bigint(20) NOT NULL,
  `ingredientName` varchar(50) NOT NULL,
  `price` float(20,2) NOT NULL,
  `number` float(20,2) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ingredientsID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ingredients
-- ----------------------------
INSERT INTO `ingredients` VALUES ('1', '草鱼', '25.00', '34.00', '草鱼');
INSERT INTO `ingredients` VALUES ('2', '牛肉', '80.00', '1244.00', '牛肉');
INSERT INTO `ingredients` VALUES ('3', '鲤鱼', '28.00', '20.00', '鲤鱼');
INSERT INTO `ingredients` VALUES ('4', '鲫鱼', '19.00', '133.00', '鲫鱼');
INSERT INTO `ingredients` VALUES ('5', '甲鱼', '200.00', '924.00', '甲鱼');
INSERT INTO `ingredients` VALUES ('6', '青菜', '2.00', '0.00', '青菜');

-- ----------------------------
-- Table structure for `menu`
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menuID` bigint(20) NOT NULL AUTO_INCREMENT,
  `foodID` bigint(20) NOT NULL,
  `state` int(1) NOT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY (`menuID`),
  KEY `FK_Reference_7` (`staffID`),
  CONSTRAINT `FK_Reference_7` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('7', '1', '1', '150901');
INSERT INTO `menu` VALUES ('8', '2', '1', '150901');
INSERT INTO `menu` VALUES ('9', '3', '1', '150901');
INSERT INTO `menu` VALUES ('10', '4', '1', '150901');
INSERT INTO `menu` VALUES ('11', '5', '1', '150901');

-- ----------------------------
-- Table structure for `purchase`
-- ----------------------------
DROP TABLE IF EXISTS `purchase`;
CREATE TABLE `purchase` (
  `purchaseID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY (`purchaseID`),
  KEY `FK_Reference_11` (`staffID`),
  CONSTRAINT `FK_Reference_11` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of purchase
-- ----------------------------
INSERT INTO `purchase` VALUES ('1', '2015-09-10', '150901');
INSERT INTO `purchase` VALUES ('2', '2015-09-01', '150902');

-- ----------------------------
-- Table structure for `repair`
-- ----------------------------
DROP TABLE IF EXISTS `repair`;
CREATE TABLE `repair` (
  `repairID` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `dealMoney` float DEFAULT NULL,
  `eventDescription` varchar(500) DEFAULT NULL,
  `staffID` bigint(20) NOT NULL,
  PRIMARY KEY (`repairID`),
  KEY `FK_Reference_3` (`staffID`),
  CONSTRAINT `FK_Reference_3` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repair
-- ----------------------------
INSERT INTO `repair` VALUES ('1', '2015-09-01', '100', '维护', '150901');
INSERT INTO `repair` VALUES ('2', '2015-09-02', '200', '维护', '150901');
INSERT INTO `repair` VALUES ('3', '2015-02-12', '300', '维护', '150902');
INSERT INTO `repair` VALUES ('4', '2015-03-12', '300', '维护', '150901');
INSERT INTO `repair` VALUES ('5', '2015-04-13', '400', '维护', '150902');
INSERT INTO `repair` VALUES ('6', '2015-08-02', '500', '维护', '150903');

-- ----------------------------
-- Table structure for `repertory`
-- ----------------------------
DROP TABLE IF EXISTS `repertory`;
CREATE TABLE `repertory` (
  `repertoryID` bigint(20) NOT NULL,
  `capacity` float DEFAULT NULL,
  `area` float DEFAULT NULL,
  `position` varchar(100) NOT NULL,
  `staffID` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`repertoryID`),
  KEY `FK_Reference_12` (`staffID`),
  CONSTRAINT `FK_Reference_12` FOREIGN KEY (`staffID`) REFERENCES `staff` (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of repertory
-- ----------------------------
INSERT INTO `repertory` VALUES ('1', '10000', '10000', '北京', '150902');
INSERT INTO `repertory` VALUES ('2', '10000', '10000', '南京', '150901');
INSERT INTO `repertory` VALUES ('3', '10000', '10000', '天津', '150902');

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
  PRIMARY KEY (`saleID`),
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
  `seatDirection` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`seatID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of seat
-- ----------------------------
INSERT INTO `seat` VALUES ('1', '1', '1', '4', '一楼');
INSERT INTO `seat` VALUES ('2', '2', '0', '4', '一楼');
INSERT INTO `seat` VALUES ('3', '3', '0', '4', '一楼');
INSERT INTO `seat` VALUES ('4', '4', '1', '4', '二楼');
INSERT INTO `seat` VALUES ('5', '5', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('6', '6', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('7', '7', '0', '4', '三楼');
INSERT INTO `seat` VALUES ('8', '8', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('9', '9', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('10', '10', '0', '4', '二楼');
INSERT INTO `seat` VALUES ('11', '11', '0', '4', '一楼');
INSERT INTO `seat` VALUES ('12', '1', '0', '11', '三楼');
INSERT INTO `seat` VALUES ('13', '1', '0', '1', '二楼');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staffID` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `sex` varchar(2) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `identityCardID` varchar(50) NOT NULL,
  `position` varchar(100) DEFAULT NULL,
  `phone` varchar(20) NOT NULL,
  `wage` int(11) DEFAULT NULL,
  `startWorkTime` date NOT NULL,
  `endWorkTime` date DEFAULT NULL,
  PRIMARY KEY (`staffID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('150901', '张三', '男', '34', '321283199807291987', '员工', '13852673767', '20000', '2015-04-15', '2016-08-12');
INSERT INTO `staff` VALUES ('150902', '李四', '男', '34', '321283199902021815', '经理', '13852673767', '30000', '2015-09-01', '2015-09-17');
INSERT INTO `staff` VALUES ('150903', '王五', '男', '45', '321283199807291987', '员工', '13852673756', '50000', '2015-04-15', '2016-08-16');
INSERT INTO `staff` VALUES ('150904', '周三', '男', '64', '321283199807291567', '经理', '13852673765', '40000', '2015-04-15', '2016-08-19');
INSERT INTO `staff` VALUES ('150905', '和他', '女', '43', '321283199506291814', '金陵', '13852673732', '20000', '2015-04-15', '2016-08-19');
INSERT INTO `staff` VALUES ('150907', '账务', '男', '54', '32128319950829181X', '经理', '13289313767', '2000', '2014-09-01', '2019-08-23');

-- ----------------------------
-- Table structure for `usersystem`
-- ----------------------------
DROP TABLE IF EXISTS `usersystem`;
CREATE TABLE `usersystem` (
  `userID` bigint(20) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of usersystem
-- ----------------------------
INSERT INTO `usersystem` VALUES ('1', 'admin', 'admin', '0', 'temp@gmail.com');
