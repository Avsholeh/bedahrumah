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

 Date: 05/01/2022 21:27:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data_gambar
-- ----------------------------
DROP TABLE IF EXISTS `data_gambar`;
CREATE TABLE `data_gambar`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int(11) UNSIGNED NULL DEFAULT NULL,
  `jenis` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `file` longblob NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_rumah_gambar`(`id_pengajuan`) USING BTREE,
  CONSTRAINT `fk_gambar_pengajuan` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 34 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_gambar
-- ----------------------------
INSERT INTO `data_gambar` VALUES (30, 20, 'BAGIAN DEPAN', '');
INSERT INTO `data_gambar` VALUES (31, 20, 'BAGIAN SAMPING', '');
INSERT INTO `data_gambar` VALUES (32, 20, 'BAGIAN BELAKANG', '');
INSERT INTO `data_gambar` VALUES (33, 20, 'BAGIAN DALAM', '');

-- ----------------------------
-- Table structure for data_pengaju
-- ----------------------------
DROP TABLE IF EXISTS `data_pengaju`;
CREATE TABLE `data_pengaju`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int(10) UNSIGNED NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_ktp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_kk` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tempat_lahir` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
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
  INDEX `fk_pengaju_pengajuan`(`id_pengajuan`) USING BTREE,
  CONSTRAINT `fk_pengaju_pengajuan` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_pengaju
-- ----------------------------
INSERT INTO `data_pengaju` VALUES (19, 20, 'In minus vitae eum c', '37', '27', 'Perempuan', 'Ut ipsum sed irure ', '1981-05-20', 'Impedit beatae aliq', 'BUMN', '2,1 juta - 2,6 juta', '< 1,2 juta', 'Milik Sendiri', 'Surat Keterangan Lainnya', 'Bukan Milik Sendiri', 'Ada', 'Tidak Ada');

-- ----------------------------
-- Table structure for data_rumah
-- ----------------------------
DROP TABLE IF EXISTS `data_rumah`;
CREATE TABLE `data_rumah`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int(11) UNSIGNED NOT NULL,
  `pondasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kolom_balok` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `konstruksi_atap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pencahayaan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ventilasi` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `mck` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_mck` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pembuangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_pembuangan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sumber_air_minum` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `sumber_listrik` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `luas_rumah` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah_penghuni` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tinggi_bangunan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ruangan_lainnya` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material_atap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_atap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material_dinding` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_dinding` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material_lantai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kondisi_lantai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `luas_lantai` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_pengaju_rumah`(`id_pengajuan`) USING BTREE,
  CONSTRAINT `fk_rumah_pengajuan` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_rumah
-- ----------------------------
INSERT INTO `data_rumah` VALUES (19, 20, 'Layak', 'Tidak Layak', 'Tidak Layak', 'Tidak Ada', '5% > dari luas lantai', 'Tidak Ada', 'Tidak Berfungsi', 'Tidak Ada', 'Berfungsi', 'Sungai', 'PLN', '4', '40', '> 2,4 M2', 'Ruang Tidur', 'Genteng', 'Bocor Berat', 'Bilik/Bambu', 'Rusak Sedang', 'Ubin', 'Tidak Rusak', '>= 9 M2');

-- ----------------------------
-- Table structure for pengajuan
-- ----------------------------
DROP TABLE IF EXISTS `pengajuan`;
CREATE TABLE `pengajuan`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(20) UNSIGNED NOT NULL,
  `tanggal` datetime(0) NOT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_pengajuan`(`id_user`) USING BTREE,
  CONSTRAINT `fk_pengajuan` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pengajuan
-- ----------------------------
INSERT INTO `pengajuan` VALUES (20, 1, '2021-12-19 16:12:10', 'BELUM DIPROSES');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `aktif` int(10) NULL DEFAULT NULL,
  `jenis` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Mita', 'admin@admin.com', '$2y$10$LRlTCz9fdw83JMExsFybnOU/ZItdKfVOoJFRMQgUUQJgNYzc6nGei', 1, 'Admin');
INSERT INTO `users` VALUES (2, 'Aliquip pariatur Re', 'welova@mailinator.com', '$2y$10$DzwO1i55/CTX6YPcHBxVk.lho8AmznS/bSLnd0VUHROsIss5te7Xi', 1, 'User');

SET FOREIGN_KEY_CHECKS = 1;
