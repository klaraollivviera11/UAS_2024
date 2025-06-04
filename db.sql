/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : dbbaksos

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2025-06-04 15:00:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `trencanabaksos`
-- ----------------------------
DROP TABLE IF EXISTS `trencanabaksos`;
CREATE TABLE `trencanabaksos` (
  `idbaksos` INT(5) NOT NULL AUTO_INCREMENT,
  `namabaksos` VARCHAR(100) NOT NULL,
  `tanggalbaksos` DATE NOT NULL,
  `deskripsibaksos` TEXT,
  `lokasibaksos` VARCHAR(100),
  `timpelaksana` VARCHAR(100),
  PRIMARY KEY (`idbaksos`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- ----------------------------
-- Records of trencanabaksos
-- ----------------------------
INSERT INTO `trencanabaksos` VALUES (1, 'Baksos Ramadhan', '2025-03-28', 'Pembagian sembako untuk warga kurang mampu', 'Kelurahan Sukamaju', 'Tim Baksos A');
INSERT INTO `trencanabaksos` VALUES (2, 'Baksos Kesehatan', '2025-05-01', 'Cek kesehatan gratis dan penyuluhan gizi', 'RW 05 Cibadak', 'Tim Medis Baksos');

-- ----------------------------
-- Table structure for `tbaksos`
-- ----------------------------
DROP TABLE IF EXISTS `tbaksos`;
CREATE TABLE `tbaksos` (
  `idbaksos` INT(5) NOT NULL AUTO_INCREMENT,
  `namabaksos` VARCHAR(100) NOT NULL,
  `tanggalbaksos` DATE NOT NULL,
  `deskripsibaksos` TEXT,
  `lokasibaksos` VARCHAR(100),
  `timpelaksana` VARCHAR(100),
  PRIMARY KEY (`idbaksos`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


SET FOREIGN_KEY_CHECKS=1;
