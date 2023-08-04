USE aplikasi_kasir;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+07:00";

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `shift` tinyint UNSIGNED NOT NULL,
  `image_in` varchar(255) NOT NULL,
  `image_out` varchar(255) NOT NULL,
  `lat_in` double NOT NULL,
  `lat_out` double NOT NULL,
  `lon_in` double NOT NULL,
  `lon_out` double NOT NULL,
  `addr_in` longtext NOT NULL,
  `addr_out` longtext NOT NULL,
  `range_in` INT NOT NULL,
  `range_out` INT NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `attendances` ( `id`, `pegawai_id`, `store_id`, `shift`, `image_in`, `image_out`, `lat_in`, `lat_out`, `lon_in`, `lon_out`, `addr_in`, `addr_out`, `range_in`, `range_out`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 1, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
(NULL, 1, 1, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
(NULL, 1, 1, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
(NULL, 1, 1, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
(NULL, 1, 1, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
(NULL, 1, 1, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' );
-- (NULL, 2, 2, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 2, 2, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 2, 2, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 2, 2, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 2, 2, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 3, 3, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 3, 3, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 3, 3, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 3, 3, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 3, 3, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 4, 4, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 4, 4, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 4, 4, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 4, 4, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' ),
-- (NULL, 4, 4, 1, 'picsum.photos/200/300', 'picsum.photos/200/300', -7.304827578360518, -7.304827578360518, 112.73050901179802,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 3, 4, 1, '2023-07-14 07:00:00', '2023-07-14 12:00:00' );

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `cities` ( `id`, `admin_id`, `name`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 'Surabaya', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'Gresik', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'Sidoarjo', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00');


CREATE TABLE `devices` (
  `id` varchar(255) PRIMARY KEY NOT NULL,
  `name` varchar(255) NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `devices` ( `id`, `name`, `active`, `created_at`, `updated_at` ) VALUES
('DVC20230323234223', 'AI Device SPBU', 0, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20233432342421', 'AI Device SPBU', 0, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20234477955322', 'AI Device SPBU', 0, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20236594094434', 'AI Device SPBU', 0, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20235469504594', 'AI Device SPBU', 0, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20234565945845', 'AI Device SPBU', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20234556849343', 'AI Device SPBU', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20235499802311', 'AI Device SPBU', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20234345945333', 'AI Device SPBU', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20235465945342', 'AI Device SPBU', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
('DVC20235434923234', 'AI Device SPBU', 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00');


CREATE TABLE `shifts` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `time_s1` DATE NOT NULL,
  `time_s2` DATE NOT NULL,
  `time_s3` DATE NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `shifts` ( `id`, `store_id`, `time_s1`, `time_s2`, `time_s3`, `created_at`, `updated_at` ) VALUES
(NULL, 1, '07:00:00', '12:00:00', '18:00:00', '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 2, '07:00:00', '12:00:00', '18:00:00', '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 3, '07:00:00', '12:00:00', '18:00:00', '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 4, '07:00:00', '12:00:00', '18:00:00', '2023-07-14 07:00:00', '2023-07-14 07:00:00');


CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `device_product` tinyint NOT NULL,
  `category` tinyint NOT NULL,
  `icon` tinyint NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `products` ( `id`, `admin_id`, `name`, `device_product`, `category`, `active`, `created_at`, `updated_at`) VALUES
(NULL, 1, 'TAMBAH ANGIN MOTOR', 1, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'TAMBAH ANGIN MOBIL', 2, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'ISI BARU MOTOR', 3, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'ISI BARU MOBIL', 4, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'TAMBAL BAN MOTOR', 5, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'TAMBAL BAN MOBIL', 6, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'PAS MOTOR', 7, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'PAS MOBIL', 8, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'KURANGI MOTOR', 9, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'KURANGI MOBIL', 10, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'PAUSE MOTOR', 11, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'PAUSE MOBIL', 12, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'ERROR MOTOR', 13, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'ERROR MOBIL', 14, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00');

CREATE TABLE `prices` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `device_product` tinyint NOT NULL,
  `category` tinyint NOT NULL,
  `price` INT NOT NULL,
  `price_tambal` INT NOT NULL,
  `hidden` tinyint(1) DEFAULT 0,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




INSERT INTO `prices` ( `id`, `admin_id`, `product_id`, `store_id`, `device_product`, `category`, `price`, `price_tambal`, `hidden`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 1, 1, 1, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 2, 1, 2, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 3, 1, 3, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 4, 1, 4, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 5, 1, 5, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 6, 1, 6, 0, 20000, 20000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 7, 1, 7, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 8, 1, 8, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 9, 1, 9, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 10, 1, 10, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 11, 1, 11, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 12, 1, 12, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 13, 1, 13, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 14, 1, 14, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 1, 2, 1, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 2, 2, 2, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 3, 2, 3, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 4, 2, 4, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 5, 2, 5, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 6, 2, 6, 0, 20000, 20000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 7, 2, 7, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 8, 2, 8, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 9, 2, 9, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 10, 2, 10, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 11, 2, 11, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 12, 2, 12, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 13, 2, 13, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 14, 2, 14, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 1, 3, 1, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 2, 3, 2, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 3, 3, 3, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 4, 3, 4, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 5, 3, 5, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 6, 3, 6, 0, 20000, 20000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 7, 3, 7, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 8, 3, 8, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 9, 3, 9, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 10, 3, 10, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 11, 3, 11, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 12, 3, 12, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 13, 3, 13, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 14, 3, 14, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 1, 4, 1, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 2, 4, 2, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 3, 4, 3, 0, 5000, 5000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 4, 4, 4, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 5, 4, 5, 0, 10000, 10000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 6, 4, 6, 0, 20000, 20000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 7, 4, 7, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 8, 4, 8, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 9, 4, 9, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 10, 4, 10, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 11, 4, 11, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 12, 4, 12, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 13, 4, 13, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 14, 4, 14, 0, 3000, 3000, 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00');

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `report_category_id` tinyint UNSIGNED NOT NULL,
  `shift` tinyint NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `addr` longtext NOT NULL,
  `range` INT NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `reports` ( `id`, `admin_id`, `report_category_id`, `shift`, `description`, `image`, `lat`, `lon`, `addr`, `range`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 1, 1, 'Contoh deskripsi laporan tambahan', 'https://picsum.photos/200/300', -7.304827578360518,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 4, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' );

CREATE TABLE `report_category` (
  `id` tinyint UNSIGNED PRIMARY KEY NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `report_category` ( `id`, `name` ) VALUES
(1, 'TAMBAL DOUBLE'),
(2, 'FREE NITROGEN'),
(3, 'LAIN LAIN');

CREATE TABLE `setorans` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `total_setor` INT NOT NULL,
  `periode_start` DATE NOT NULL,
  `periode_end` DATE NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `setorans` ( `id`, `admin_id`, `pegawai_id`,  `city_id`, `total_setor`, `periode_start`, `periode_end`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 1, 1, 1000000, '2023-07-01', '2023-07-02', '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 1, 1, 1000000, '2023-07-01', '2023-07-02', '2023-07-14 07:00:00', '2023-07-14 07:00:00');


CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `device_id` VARCHAR(255) NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `group` tinyint DEFAULT 0,
  `name` VARCHAR(255) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL,
  `addr` longtext NOT NULL,
  `device_status` tinyint(1) DEFAULT 0,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `stores` ( `id`, `admin_id`, `device_id`, `city_id`, `group`, `name`, `lat`, `lon`, `addr`, `device_status`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 'DVC20230323234223', 1, 0, 'Outlet Surabaya 1', -7.304827578360518,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'DVC20233432342421', 1, 0, 'Outlet Surabaya 2', -7.304827578360518,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'DVC20234477955322', 1, 0, 'Outlet Surabaya 3', -7.304827578360518,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'DVC20236594094434', 1, 0, 'Outlet Surabaya 4', -7.304827578360518,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'DVC20235469504594', 1, 0, 'Outlet Surabaya 5', -7.304827578360518,  112.73050901179802, 'Jl. Gajah Mada I Dalam No.107, Sawunggaling, Kec. Wonokromo, Surabaya, Jawa Timur 60242', 0, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' );

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `trx_id` VARCHAR(255) NOT NULL,
  `store_id` bigint(20) UNSIGNED NOT NULL,
  `shift` tinyint NOT NULL,
  `paid` INT NOT NULL,
  `setor` tinyint(1) DEFAULT 1,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


INSERT INTO `transactions` ( `id`, `pegawai_id`, `trx_id`, `store_id`, `shift`, `paid`, `setor`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 'TRX1230434423234', 1, 1, 3000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'trx9484570993423', 1, 1, 3000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'TRX3453463335454', 1, 1, 3000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00'),
(NULL, 1, 'TRX2342352156452', 1, 1, 3000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00');


CREATE TABLE `trollies` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `trx_id` VARCHAR(255) NOT NULL,
  `price` INT NOT NULL,
  `qty` INT NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `trollies` ( `id`, `price_id`, `trx_id`, `price`, `qty`, `active`, `created_at`, `updated_at` ) VALUES
(NULL, 1, 'TRX1230434423234', 30000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'trx9484570993423', 30000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'TRX3453463335454', 30000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' ),
(NULL, 1, 'TRX2342352156452', 30000, 1, 1, '2023-07-14 07:00:00', '2023-07-14 07:00:00' );

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `receipt_phone` varchar(15) NOT NULL,
  `receipt_brand` varchar(255) NOT NULL,
  `receipt_message` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



INSERT INTO `admins` ( `id`, `name`, `email`, `password`, `phone`, `receipt_phone`, `receipt_brand`, `receipt_message`, `profile_picture`, `created_at`, `updated_at` ) VALUES
(1, 'Administrator', 'admin@mail.com', '$2a$12$RzyQUL7zt.Clp6/T3F51JurjpZWmis/g77SRxVgFQygHiPJRTM5xC', '085215955155', '085215955155', 'NIROGEN OKE', 'Semoga selamat sampai tujuan', 'https://picsum.photos/200/300', '2023-07-14 07:00:00', '2023-07-14 07:00:00');

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `store_active_id` bigint(20) UNSIGNED NOT NULL,
  `shift_active` tinyint NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




INSERT INTO `pegawais` ( `id`, `city_id`, `admin_id`, `store_active_id`, `shift_active`, `name`, `email`, `phone`, `password`, `profile_picture`, `created_at`, `updated_at` ) VALUES
(1, 1, 1, 1, 1, 'Pegawai', 'user@mail.com', '085215955155', '$2a$12$RzyQUL7zt.Clp6/T3F51JurjpZWmis/g77SRxVgFQygHiPJRTM5xC', 'https://picsum.photos/200/300',  '2023-07-14 07:00:00', '2023-07-14 07:00:00');


ALTER TABLE `attendances`
ADD KEY `attendances_pegawai_id_foreign` (`pegawai_id`),
ADD KEY `attendances_store_id_foreign` (`store_id`),
ADD KEY `attendances_created_at` (`created_at`),
ADD CONSTRAINT `attendances_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`),
ADD CONSTRAINT `attendances_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);

ALTER TABLE `cities`
ADD KEY `cities_admin_id_foreign` (`admin_id`),
ADD KEY `cities_created_at` (`created_at`),
ADD CONSTRAINT `cities_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);


ALTER TABLE `shifts`
ADD KEY `shifts_store_id_foreign` (`store_id`),
ADD KEY `shifts_created_at` (`created_at`),
ADD CONSTRAINT `shifts_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);


ALTER TABLE `products`
ADD KEY `products_admin_id_foreign` (`admin_id`),
ADD CONSTRAINT `products_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`);


ALTER TABLE `prices`
ADD KEY `prices_admin_id_foreign` (`admin_id`),
ADD KEY `prices_product_id_foreign` (`product_id`),
ADD KEY `prices_store_id_foreign` (`store_id`),
ADD KEY `prices_created_at` (`created_at`),
ADD CONSTRAINT `prices_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
ADD CONSTRAINT `prices_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
ADD CONSTRAINT `prices_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);


ALTER TABLE `reports`
ADD KEY `reports_admin_id_foreign` (`admin_id`),
ADD KEY `reports_report_category_id_foreign` (`report_category_id`),
ADD KEY `reports_created_at` (`created_at`),
ADD CONSTRAINT `reports_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
ADD CONSTRAINT `reports_report_category_id_foreign` FOREIGN KEY (`report_category_id`) REFERENCES `report_category` (`id`);



ALTER TABLE `setorans`
ADD KEY `setorans_pegawai_id_foreign` (`pegawai_id`),
ADD KEY `setorans_admin_id_foreign` (`admin_id`),
ADD KEY `setorans_city_id_foreign` (`city_id`),
ADD KEY `setorans_created_at` (`created_at`),
ADD CONSTRAINT `setorans_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`),
ADD CONSTRAINT `setorans_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
ADD CONSTRAINT `setorans_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);


ALTER TABLE `stores`
ADD KEY `stores_admin_id_foreign` (`admin_id`),
ADD KEY `stores_device_id_foreign` (`device_id`),
ADD KEY `stores_city_id_foreign` (`city_id`),
ADD KEY `stores_created_at` (`created_at`),
ADD CONSTRAINT `stores_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
ADD CONSTRAINT `stores_device_id_foreign` FOREIGN KEY (`device_id`) REFERENCES `devices` (`id`),
ADD CONSTRAINT `stores_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);



ALTER TABLE `transactions`
ADD UNIQUE KEY `trx_id` (`trx_id`),
ADD KEY `transactions_pegawai_id_foreign` (`pegawai_id`),
ADD KEY `transactions_store_id_foreign` (`store_id`),
ADD KEY `transactions_created_at` (`created_at`),
ADD CONSTRAINT `transactions_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`),
ADD CONSTRAINT `transactions_store_id_foreign` FOREIGN KEY (`store_id`) REFERENCES `stores` (`id`);



ALTER TABLE `trollies`
ADD KEY `trollies_price_id_foreign` (`price_id`),
ADD KEY `trollies_trx_id_foreign` (`trx_id`),
ADD KEY `trollies_created_at` (`created_at`),
ADD CONSTRAINT `trollies_price_id_foreign` FOREIGN KEY (`price_id`) REFERENCES `prices` (`id`),
ADD CONSTRAINT `trollies_trx_id_foreign` FOREIGN KEY (`trx_id`) REFERENCES `transactions` (`trx_id`);


ALTER TABLE `admins`
ADD UNIQUE KEY `admins_email_unique` (`email`);

ALTER TABLE `pegawais`
ADD UNIQUE KEY `pegawais_email_unique` (`email`),
ADD KEY `pegawais_city_id_foreign` (`city_id`),
ADD KEY `pegawais_admin_id_foreign` (`admin_id`),
ADD CONSTRAINT `pegawais_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
ADD CONSTRAINT `pegawais_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`);



COMMIT;
