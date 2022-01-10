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

 Date: 10/01/2022 22:29:21
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
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_gambar
-- ----------------------------
INSERT INTO `data_gambar` VALUES (30, 20, 'BAGIAN DEPAN', '');
INSERT INTO `data_gambar` VALUES (31, 20, 'BAGIAN SAMPING', '');
INSERT INTO `data_gambar` VALUES (32, 20, 'BAGIAN BELAKANG', '');
INSERT INTO `data_gambar` VALUES (33, 20, 'BAGIAN DALAM', '');
INSERT INTO `data_gambar` VALUES (34, 21, 'BAGIAN DEPAN', '');
INSERT INTO `data_gambar` VALUES (35, 21, 'BAGIAN SAMPING', '');
INSERT INTO `data_gambar` VALUES (36, 21, 'BAGIAN BELAKANG', '');
INSERT INTO `data_gambar` VALUES (37, 21, 'BAGIAN DALAM', '');
INSERT INTO `data_gambar` VALUES (38, 22, 'BAGIAN DEPAN', '');
INSERT INTO `data_gambar` VALUES (39, 22, 'BAGIAN SAMPING', '');
INSERT INTO `data_gambar` VALUES (40, 22, 'BAGIAN BELAKANG', '');
INSERT INTO `data_gambar` VALUES (41, 22, 'BAGIAN DALAM', '');
INSERT INTO `data_gambar` VALUES (42, 23, 'BAGIAN DEPAN', '');
INSERT INTO `data_gambar` VALUES (43, 23, 'BAGIAN SAMPING', '');
INSERT INTO `data_gambar` VALUES (44, 23, 'BAGIAN BELAKANG', '');
INSERT INTO `data_gambar` VALUES (45, 23, 'BAGIAN DALAM', '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_pengaju
-- ----------------------------
INSERT INTO `data_pengaju` VALUES (19, 20, 'ABDULLAH', '37', '27', 'Perempuan', 'Ut ipsum sed irure ', '1981-05-20', 'Impedit beatae aliq', 'BUMN', '2,1 juta - 2,6 juta', '< 1,2 juta', 'Milik Sendiri', 'Surat Keterangan Lainnya', 'Bukan Milik Sendiri', 'Ada', 'Tidak Ada');
INSERT INTO `data_pengaju` VALUES (20, 21, 'SARASVATI', '4', '93', 'Perempuan', 'Id corporis odio es', '2001-06-28', 'Culpa velit quidem ', 'Wiraswasta', '2,1 juta - 2,6 juta', '1,8 juta - 2,1 juta', 'Milik Sendiri', 'Girik / Letter C', 'Bukan Milik Sendiri', 'Ada', 'Tidak Ada');
INSERT INTO `data_pengaju` VALUES (21, 22, 'DONA', '71', '45', 'Laki-laki', 'Sit iste voluptate ', '1976-12-06', 'Doloribus enim magna', 'Wiraswasta', '1,8 juta - 2,1 juta', '>2,6jt', 'Bukan Milik Sendiri', 'Hak Milik', 'Bukan Milik Sendiri', 'Ada', 'Ada');
INSERT INTO `data_pengaju` VALUES (22, 23, 'DONATELO', '71', '45', 'Laki-laki', 'Sit iste voluptate ', '1976-12-06', 'Doloribus enim magna', 'Wiraswasta', '1,8 juta - 2,1 juta', '>2,6jt', 'Bukan Milik Sendiri', 'Hak Milik', 'Bukan Milik Sendiri', 'Ada', 'Ada');

-- ----------------------------
-- Table structure for data_rumah
-- ----------------------------
DROP TABLE IF EXISTS `data_rumah`;
CREATE TABLE `data_rumah`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_permohonan` int(11) UNSIGNED NOT NULL,
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
  INDEX `fk_pengaju_rumah`(`id_permohonan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_rumah
-- ----------------------------
INSERT INTO `data_rumah` VALUES (19, 20, 'Layak', 'Tidak Layak', 'Tidak Layak', 'Tidak Ada', '5% > dari luas lantai', 'Tidak Ada', 'Tidak Berfungsi', 'Tidak Ada', 'Berfungsi', 'Sungai', 'PLN', '4', '40', '> 2,4 M2', 'Ruang Tidur', 'Genteng', 'Bocor Berat', 'Bilik/Bambu', 'Rusak Sedang', 'Ubin', 'Tidak Rusak', '>= 9 M2');
INSERT INTO `data_rumah` VALUES (20, 21, 'Tidak Layak', 'Tidak Layak', 'Tidak Layak', 'Ada', '5% < dari luas lantai', 'Umum', 'Tidak Berfungsi', 'Tidak Ada', 'Berfungsi', 'Mata Air', 'PLN Menumpang', '37', '13', '> 2,4 M2', 'Ruang Keluarga', 'Beton', 'Bocor Sedang', 'Bata/Batako Ekspose', 'Rusak Berat', 'Tanah', 'Tidak Rusak', '< 4 M2');
INSERT INTO `data_rumah` VALUES (21, 22, 'Layak', 'Layak', 'Layak', 'Ada', '5% > dari luas lantai', 'Sendiri', 'Berfungsi', 'Ada', 'Berfungsi', 'PDAM', 'PLN', '46', '2', '> 2,4 M2', 'Ruang Keluarga', 'Beton', 'Tidak Bocor', 'Bata/Batako Plester', 'Tidak Rusak', 'Keramik/Marmer', 'Tidak Rusak', '>= 10 M2');
INSERT INTO `data_rumah` VALUES (22, 23, 'Layak', 'Layak', 'Layak', 'Ada', '5% > dari luas lantai', 'Sendiri', 'Berfungsi', 'Ada', 'Berfungsi', 'PDAM', 'PLN', '46', '2', '> 2,4 M2', 'Ruang Keluarga', 'Beton', 'Tidak Bocor', 'Bata/Batako Plester', 'Tidak Rusak', 'Keramik/Marmer', 'Tidak Rusak', '>= 10 M2');

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
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permohonan
-- ----------------------------
INSERT INTO `permohonan` VALUES (20, 1, '2021-12-19 16:12:10', 'PRIORITAS 3');
INSERT INTO `permohonan` VALUES (21, 1, '2022-01-08 09:01:32', 'PRIORITAS 3');
INSERT INTO `permohonan` VALUES (22, 1, '2022-01-10 22:01:57', 'BELUM DIPROSES');
INSERT INTO `permohonan` VALUES (23, 1, '2022-01-10 22:01:18', 'BELUM DIPROSES');

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
