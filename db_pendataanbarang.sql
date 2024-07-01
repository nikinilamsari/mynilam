/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MariaDB
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_pendataan

 Target Server Type    : MariaDB
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 20/06/2021 22:54:34
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_barang
-- ----------------------------
DROP TABLE IF EXISTS `tb_barang`;
CREATE TABLE `tb_barang`  (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_barang` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_supplier` int(11) NULL DEFAULT NULL,
  `harga_barang` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_barang
-- ----------------------------
INSERT INTO `tb_barang` VALUES (2, 'T0001', 'Tas Import', '', 2, 2000000);
INSERT INTO `tb_barang` VALUES (4, 'B-005', 'Sepatu Kulit', 'kulit boyooo', 1, 3400000);
INSERT INTO `tb_barang` VALUES (5, 'T084', 'Jaket ', '', 3, 340000);
INSERT INTO `tb_barang` VALUES (6, 'A009', 'Hijab', '', 3, 20099);

-- ----------------------------
-- Table structure for tb_barangkeluar
-- ----------------------------
DROP TABLE IF EXISTS `tb_barangkeluar`;
CREATE TABLE `tb_barangkeluar`  (
  `id_barangkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_barangkeluar` date NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `kode_barangkeluar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_barangkeluar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_barangkeluar
-- ----------------------------
INSERT INTO `tb_barangkeluar` VALUES (3, '2021-06-20', '', 'AA/HH/2020/12');

-- ----------------------------
-- Table structure for tb_barangmasuk
-- ----------------------------
DROP TABLE IF EXISTS `tb_barangmasuk`;
CREATE TABLE `tb_barangmasuk`  (
  `id_barangmasuk` int(255) NOT NULL AUTO_INCREMENT,
  `tgl_barangmasuk` date NULL DEFAULT NULL,
  `terimadari` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_supplier` int(11) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kode_barangmasuk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_barangmasuk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 38 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_barangmasuk
-- ----------------------------
INSERT INTO `tb_barangmasuk` VALUES (21, '2021-06-18', 'Rizki', 1, '', '1/I/STA/A');
INSERT INTO `tb_barangmasuk` VALUES (37, '2021-06-19', 'NILAM CANTEKK', 3, 'Masuk tgl 19', 'IB/VVA/33/2021');

-- ----------------------------
-- Table structure for tb_detkeluar
-- ----------------------------
DROP TABLE IF EXISTS `tb_detkeluar`;
CREATE TABLE `tb_detkeluar`  (
  `id_detailkeluar` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barangkeluar` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_detailkeluar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_detkeluar
-- ----------------------------
INSERT INTO `tb_detkeluar` VALUES (2, 'AA/HH/2020/12', 2, 21, '');
INSERT INTO `tb_detkeluar` VALUES (3, 'AA/HH/2020/12', 4, 12, '');

-- ----------------------------
-- Table structure for tb_detmasuk
-- ----------------------------
DROP TABLE IF EXISTS `tb_detmasuk`;
CREATE TABLE `tb_detmasuk`  (
  `id_detailmasuk` int(11) NOT NULL AUTO_INCREMENT,
  `kode_barangmasuk` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Id_barang` int(11) NULL DEFAULT NULL,
  `jumlah_masuk` int(11) NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_detailmasuk`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_detmasuk
-- ----------------------------
INSERT INTO `tb_detmasuk` VALUES (9, '1/I/STA/A', 4, 1, '');
INSERT INTO `tb_detmasuk` VALUES (11, 'IB/VVA/33/2021', 5, 12, '');
INSERT INTO `tb_detmasuk` VALUES (12, 'IB/VVA/33/2021', 6, 33, '');

-- ----------------------------
-- Table structure for tb_supplier
-- ----------------------------
DROP TABLE IF EXISTS `tb_supplier`;
CREATE TABLE `tb_supplier`  (
  `id_supplier` int(11) NOT NULL AUTO_INCREMENT,
  `kode_supplier` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama_supplier` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat_supplier` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_supplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_supplier
-- ----------------------------
INSERT INTO `tb_supplier` VALUES (1, 'S-001', 'RIZKI', 'KUDUS');
INSERT INTO `tb_supplier` VALUES (2, 'S-002', 'NIKI', 'KUDUS REGENCY');
INSERT INTO `tb_supplier` VALUES (3, 'S-004', 'NILAM', 'GEBOG');
INSERT INTO `tb_supplier` VALUES (4, 'S-005', 'SARI', 'KARANGMALANG');

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user`  (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 102 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_user
-- ----------------------------
INSERT INTO `tb_user` VALUES (1, 'mynilam', 'rindutt', 'Niki Nilam Sari', 'admin');
INSERT INTO `tb_user` VALUES (101, 'pewee', 'pewe11', 'Rizki Putra Wicaksono', 'owner');

SET FOREIGN_KEY_CHECKS = 1;
