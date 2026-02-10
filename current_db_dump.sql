-- Adminer 4.8.4 MySQL 10.11.8-MariaDB dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `a_propos`;
CREATE TABLE `a_propos` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `title` varchar(255) NOT NULL,
                            `description` text NOT NULL,
                            `sentences` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`sentences`)),
                            `image_1` varchar(255) NOT NULL,
                            `image_2` varchar(255) NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `blogs`;
CREATE TABLE `blogs` (
                         `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                         `title` varchar(255) NOT NULL,
                         `category` varchar(255) NOT NULL,
                         `image` varchar(255) NOT NULL,
                         `date` date NOT NULL,
                         `user_name` varchar(255) NOT NULL,
                         `user_firstname` varchar(255) NOT NULL,
                         `content` text NOT NULL,
                         `slug` varchar(255) NOT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `blogs_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache`;
CREATE TABLE `cache` (
                         `key` varchar(255) NOT NULL,
                         `value` mediumtext NOT NULL,
                         `expiration` int(11) NOT NULL,
                         PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE `cache_locks` (
                               `key` varchar(255) NOT NULL,
                               `owner` varchar(255) NOT NULL,
                               `expiration` int(11) NOT NULL,
                               PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `name` varchar(255) NOT NULL,
                            `email` varchar(255) NOT NULL,
                            `subject` varchar(255) NOT NULL,
                            `phone` varchar(255) DEFAULT NULL,
                            `message` text NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `deroulants`;
CREATE TABLE `deroulants` (
                              `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                              `title` varchar(255) NOT NULL,
                              `created_at` timestamp NULL DEFAULT NULL,
                              `updated_at` timestamp NULL DEFAULT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
                               `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                               `uuid` varchar(255) NOT NULL,
                               `connection` text NOT NULL,
                               `queue` text NOT NULL,
                               `payload` longtext NOT NULL,
                               `exception` longtext NOT NULL,
                               `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
                               PRIMARY KEY (`id`),
                               UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `jobs`;
CREATE TABLE `jobs` (
                        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                        `queue` varchar(255) NOT NULL,
                        `payload` longtext NOT NULL,
                        `attempts` tinyint(3) unsigned NOT NULL,
                        `reserved_at` int(10) unsigned DEFAULT NULL,
                        `available_at` int(10) unsigned NOT NULL,
                        `created_at` int(10) unsigned NOT NULL,
                        PRIMARY KEY (`id`),
                        KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE `job_batches` (
                               `id` varchar(255) NOT NULL,
                               `name` varchar(255) NOT NULL,
                               `total_jobs` int(11) NOT NULL,
                               `pending_jobs` int(11) NOT NULL,
                               `failed_jobs` int(11) NOT NULL,
                               `failed_job_ids` longtext NOT NULL,
                               `options` mediumtext DEFAULT NULL,
                               `cancelled_at` int(11) DEFAULT NULL,
                               `created_at` int(11) NOT NULL,
                               `finished_at` int(11) DEFAULT NULL,
                               PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
                              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
                              `migration` varchar(255) NOT NULL,
                              `batch` int(11) NOT NULL,
                              PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE `password_reset_tokens` (
                                         `email` varchar(255) NOT NULL,
                                         `token` varchar(255) NOT NULL,
                                         `created_at` timestamp NULL DEFAULT NULL,
                                         PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `product_category_id` bigint(20) unsigned NOT NULL,
                            `picture` varchar(255) NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `slug` varchar(255) NOT NULL,
                            `description` text NOT NULL,
                            `mettre_en_avant` tinyint(1) NOT NULL DEFAULT 0,
                            `afficher` tinyint(1) NOT NULL DEFAULT 1,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            KEY `products_product_category_id_foreign` (`product_category_id`),
                            CONSTRAINT `products_product_category_id_foreign` FOREIGN KEY (`product_category_id`) REFERENCES `product_categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
                                      `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                                      `title` varchar(255) NOT NULL,
                                      `slug` varchar(255) NOT NULL,
                                      `picture` varchar(255) NOT NULL,
                                      `description` text NOT NULL,
                                      `created_at` timestamp NULL DEFAULT NULL,
                                      `updated_at` timestamp NULL DEFAULT NULL,
                                      PRIMARY KEY (`id`),
                                      UNIQUE KEY `product_categories_title_unique` (`title`),
                                      UNIQUE KEY `product_categories_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `pros`;
CREATE TABLE `pros` (
                        `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                        `title` varchar(255) NOT NULL,
                        `description` text NOT NULL,
                        `category` varchar(255) NOT NULL,
                        `subtitle` varchar(255) DEFAULT NULL,
                        `file_1` varchar(255) DEFAULT NULL,
                        `file_2` varchar(255) DEFAULT NULL,
                        `external_link` varchar(255) DEFAULT NULL,
                        `image` varchar(255) DEFAULT NULL,
                        `created_at` timestamp NULL DEFAULT NULL,
                        `updated_at` timestamp NULL DEFAULT NULL,
                        PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `section1`;
CREATE TABLE `section1` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `title` varchar(255) NOT NULL,
                            `description` text NOT NULL,
                            `svg` text NOT NULL,
                            `link` varchar(255) DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `section2`;
CREATE TABLE `section2` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `title` varchar(255) NOT NULL,
                            `description` text NOT NULL,
                            `svg` text NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `section3`;
CREATE TABLE `section3` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `image` varchar(255) NOT NULL,
                            `category` varchar(255) NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `description` text NOT NULL,
                            `ul_li_list` text NOT NULL,
                            `ul_li_list_2` text NOT NULL,
                            `link` varchar(255) DEFAULT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `section4`;
CREATE TABLE `section4` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `text` text NOT NULL,
                            `note` double NOT NULL,
                            `category` varchar(255) NOT NULL,
                            `image` varchar(255) NOT NULL,
                            `title` varchar(255) NOT NULL,
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `sessions`;
CREATE TABLE `sessions` (
                            `id` varchar(255) NOT NULL,
                            `user_id` bigint(20) unsigned DEFAULT NULL,
                            `ip_address` varchar(45) DEFAULT NULL,
                            `user_agent` text DEFAULT NULL,
                            `payload` longtext NOT NULL,
                            `last_activity` int(11) NOT NULL,
                            PRIMARY KEY (`id`),
                            KEY `sessions_user_id_index` (`user_id`),
                            KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
                            `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                            `key` varchar(255) NOT NULL,
                            `value` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`value`)),
                            `created_at` timestamp NULL DEFAULT NULL,
                            `updated_at` timestamp NULL DEFAULT NULL,
                            PRIMARY KEY (`id`),
                            UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `slides`;
CREATE TABLE `slides` (
                          `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                          `title` varchar(255) NOT NULL,
                          `category` varchar(255) NOT NULL,
                          `short_description` text NOT NULL,
                          `image` varchar(255) NOT NULL,
                          `created_at` timestamp NULL DEFAULT NULL,
                          `updated_at` timestamp NULL DEFAULT NULL,
                          PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `specialistes`;
CREATE TABLE `specialistes` (
                                `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                                `uuid` char(36) NOT NULL,
                                `slug` varchar(255) NOT NULL,
                                `short_description` varchar(255) NOT NULL,
                                `name` varchar(255) NOT NULL,
                                `firstname` varchar(255) NOT NULL,
                                `picture` varchar(255) NOT NULL,
                                `job` varchar(255) NOT NULL,
                                `created_at` timestamp NULL DEFAULT NULL,
                                `updated_at` timestamp NULL DEFAULT NULL,
                                PRIMARY KEY (`id`),
                                UNIQUE KEY `specialistes_uuid_unique` (`uuid`),
                                UNIQUE KEY `specialistes_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `specialites`;
CREATE TABLE `specialites` (
                               `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                               `uuid` char(36) NOT NULL,
                               `title` varchar(255) NOT NULL,
                               `slug` varchar(255) NOT NULL,
                               `created_at` timestamp NULL DEFAULT NULL,
                               `updated_at` timestamp NULL DEFAULT NULL,
                               PRIMARY KEY (`id`),
                               UNIQUE KEY `specialites_uuid_unique` (`uuid`),
                               UNIQUE KEY `specialites_slug_unique` (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
                         `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
                         `name` varchar(255) NOT NULL,
                         `email` varchar(255) NOT NULL,
                         `email_verified_at` timestamp NULL DEFAULT NULL,
                         `password` varchar(255) NOT NULL,
                         `remember_token` varchar(100) DEFAULT NULL,
                         `created_at` timestamp NULL DEFAULT NULL,
                         `updated_at` timestamp NULL DEFAULT NULL,
                         PRIMARY KEY (`id`),
                         UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- 2026-02-10 08:41:50
