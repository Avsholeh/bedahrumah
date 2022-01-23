/*
 Navicat Premium Data Transfer

 Source Server         : laragon
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : bedahrumah

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 23/01/2022 21:49:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_gambar
-- ----------------------------
DROP TABLE IF EXISTS `data_gambar`;
CREATE TABLE `data_gambar`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(11) UNSIGNED NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file` longblob NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_rumah_gambar`(`id_permohonan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_gambar
-- ----------------------------

-- ----------------------------
-- Table structure for data_pengaju
-- ----------------------------
DROP TABLE IF EXISTS `data_pengaju`;
CREATE TABLE `data_pengaju`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(10) UNSIGNED NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_ktp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_kk` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `status_keluarga` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `sektor_pekerjaan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `penghasilan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pengeluaran` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_pemilik_tanah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `bukti_pemilik_tanah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status_pemilik_rumah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `aset_rumah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `aset_tanah` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_pengaju_pengajuan`(`id_permohonan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_pengaju
-- ----------------------------

-- ----------------------------
-- Table structure for data_rumah
-- ----------------------------
DROP TABLE IF EXISTS `data_rumah`;
CREATE TABLE `data_rumah`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(11) UNSIGNED NOT NULL,
  `pencahayaan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_atap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_atap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_dinding` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_dinding` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_lantai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `skor` double NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_pengaju_rumah`(`id_permohonan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of data_rumah
-- ----------------------------

-- ----------------------------
-- Table structure for permohonan
-- ----------------------------
DROP TABLE IF EXISTS `permohonan`;
CREATE TABLE `permohonan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(20) UNSIGNED NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_pengajuan`(`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of permohonan
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` int(10) NULL DEFAULT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mita', 'admin@admin.com', '$2y$10$LRlTCz9fdw83JMExsFybnOU/ZItdKfVOoJFRMQgUUQJgNYzc6nGei', 1, 'Admin');

SET FOREIGN_KEY_CHECKS = 1;
