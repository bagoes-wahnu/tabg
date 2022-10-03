/*
 Navicat Premium Data Transfer

 Source Server         : new_local
 Source Server Type    : PostgreSQL
 Source Server Version : 100022
 Source Host           : localhost:5433
 Source Catalog        : slf_tabg_pertelaan
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100022
 File Encoding         : 65001

 Date: 03/10/2022 13:04:09
*/


-- ----------------------------
-- Table structure for tabg
-- ----------------------------
DROP TABLE IF EXISTS "public"."tabg";
CREATE TABLE "public"."tabg" (
  "gid" int4 NOT NULL,
  "tgl_tabg" date,
  "no_telp_pemohon" int8,
  "nama_kuasa" varchar(255) COLLATE "pg_catalog"."default",
  "no_telp_kuasa" int8,
  "kode_verifikasi" varchar(255) COLLATE "pg_catalog"."default",
  "nama_proyek" varchar(255) COLLATE "pg_catalog"."default",
  "penggunaan_bangunan" varchar(255) COLLATE "pg_catalog"."default",
  "alamat_persil" varchar(255) COLLATE "pg_catalog"."default",
  "kelurahan" varchar(255) COLLATE "pg_catalog"."default",
  "kecamatan" varchar(255) COLLATE "pg_catalog"."default",
  "no_imb" varchar(255) COLLATE "pg_catalog"."default",
  "tgl_jam_sidang" timestamp(6),
  "tempat_sidang" varchar(255) COLLATE "pg_catalog"."default",
  "file_gambar_ars" varchar(255) COLLATE "pg_catalog"."default",
  "file_gambar_str" varchar(255) COLLATE "pg_catalog"."default",
  "file_gambar_mep" varchar(255) COLLATE "pg_catalog"."default",
  "file_laporan_struktur" varchar(255) COLLATE "pg_catalog"."default",
  "nama_pemohon" varchar(255) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of tabg
-- ----------------------------
INSERT INTO "public"."tabg" VALUES (1, '2022-10-03', 8123123123, 'tes', 8123123123, '123', 'tes', 'tes', 'tes', 'tes', 'tes', 'tes', '2022-10-03 09:51:43', 'tes', 'tes.jpg', 'tes.jpg', 'tes.jpg', 'tes.pdf', 'tes');

-- ----------------------------
-- Primary Key structure for table tabg
-- ----------------------------
ALTER TABLE "public"."tabg" ADD CONSTRAINT "tabg_pkey" PRIMARY KEY ("gid");
