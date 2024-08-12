-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2023 at 07:13 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rimpsa`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_as`, `created_at`, `updated_at`) VALUES
(10, 'Admin', 'rimpsa@admin.com', '$2y$12$TvaAvTEhAAWU9XbrCdIs5uAqmwN5m79FGTuldV58Wni91OwkNjENq', 1,  '2023-05-18 16:40:31', '2023-05-18 16:40:31');


INSERT INTO `brands` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'CAT', 'a-long-slug',  '2023-05-18 16:40:31', '2023-05-18 16:40:31'),
(2, 'CASE', 'a-short-slug', '2023-05-18 16:45:32', '2023-05-18 16:45:32'),
(3, 'JCB', 'a-random-slug', '2023-05-18 19:05:07', '2023-05-18 19:05:07');

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'CASE RETROEXCAVADORA', 'A short description', 0, '2023-05-18 16:40:31', '2023-05-18 16:40:31'),
(2, 'RETROEXCAVADORA', 'A long description', 0, '2023-05-18 16:45:32', '2023-05-18 16:45:32'),
(3, 'KIT DE SELLOS', 'A random description', 0, '2023-05-18 19:05:07', '2023-05-18 19:05:07');



INSERT INTO `products` (`id`, `category_id`, `name`, `slug`, `brand`, `description`, `price`, `image`, `status`, `stock`, `created_at`, `updated_at`) VALUES
(1, 1, 'CASE Retroexcavadora 580N', 'case-retroexcavadora-580n', 'CASE', 'Retroexcavadora 580N con excelente rendimiento y versatilidad.', 17000.00, 'https://rimpsa.com/wp-content/uploads/2022/11/kit-sellos-estabilizador-para-case.jpg', 1, 5, NOW(), NOW()),
(2, 1, 'CASE Retroexcavadora 590SN', 'case-retroexcavadora-590sn', 'CASE', 'Retroexcavadora 590SN con mayor potencia y capacidad de carga.', 85000.00, 'https://rimpsa.com/wp-content/uploads/2022/11/1-1-300x300.jpg', 0, 3, NOW(), NOW()),
(3, 2, 'Retroexcavadora JCB 3CX', 'retroexcavadora-jcb-3cx', 'JCB', 'Retroexcavadora JCB 3CX con diseño ergonómico y eficiencia energética.', 6000.00, 'https://rimpsa.com/wp-content/uploads/2022/11/4-300x300.jpg', 0, 7, NOW(), NOW()),
(4, 2, 'Retroexcavadora CAT 420F2', 'retroexcavadora-cat-420f2', 'CAT', 'Retroexcavadora CAT 420F2, ideal para diversas aplicaciones de construcción.', 90000.00, 'https://rimpsa.com/wp-content/uploads/2024/07/2830266-300x300.jpg', 1, 4, NOW(), NOW()),
(5, 3, 'Kit de Sellos para Excavadora Komatsu', 'kit-sellos-excavadora-komatsu', 'Komatsu', 'Kit de sellos de alta calidad para excavadoras Komatsu.', 500.00, 'https://rimpsa.com/wp-content/uploads/2022/12/BOMBA-300x300.jpg', 0, 20, NOW(), NOW());