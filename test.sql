    -- phpMyAdmin SQL Dump
    -- version 5.2.0
    -- https://www.phpmyadmin.net/
    --
    -- Host: 127.0.0.1
    -- Generation Time: May 19, 2023 at 07:13 AM
    -- Server version: 10.4.27-MariaDB
    -- PHP Version: 8.0.25
    USE rimpsa;
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

    -- password for all users is password

   INSERT INTO `users` (`id`, `name`, `email`, `password`, `role_as`, `created_at`, `updated_at`) VALUES
    (10, 'Admin Juan', 'rimpsa@admin.com', '$2y$12$HuTtTBJ5Nz.Ued4b37zuB.kKxRe0ew3K6pgjGX.XCxOvehSJS1bem', 1,  '2023-05-18 16:40:31', '2023-05-18 16:40:31');


    INSERT INTO `brands` (`id`, `name`, `slug`, `contact`,`created_at`, `updated_at`) VALUES
    (1, 'CAT', 'a-long-slug', 'cat@company.net' ,'2023-05-18 16:40:31', '2023-05-18 16:40:31'),
    (2, 'CASE', 'a-short-slug', 'case@test.com', '2023-05-18 16:45:32', '2023-05-18 16:45:32'),
    (3, 'JCB', 'a-random-slug', '+52 3435124216','2023-05-18 19:05:07', '2023-05-18 19:05:07');

    INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
    (1, 'CASE RETROEXCAVADORA', 'A short description', 0, '2023-05-18 16:40:31', '2023-05-18 16:40:31'),
    (2, 'RETROEXCAVADORA CATERPILLAR', 'A long description', 0, '2023-05-18 16:45:32', '2023-05-18 16:45:32'),
    (3, 'Sin categorizar', 'A random description', 0, '2023-05-18 19:05:07', '2023-05-18 19:05:07');

  INSERT INTO `subcategories` (`id`, `name`, `description`, `status`, `category_id`,`created_at`, `updated_at`) VALUES
  (1, 'EJE', 'Descripción actualizada para EJE', 0, 1,'2024-11-20 10:00:00', '2024-11-20 10:00:00'),
  (2, 'FRENOS', 'Descripción actualizada para FRENOS', 0, 1,'2024-12-20 10:10:00', '2024-11-20 10:10:00'),
  (3, 'HIDRÁULICO', 'Descripción actualizada para HIDRÁULICO', 0, 1,'2024-08-20 10:20:00', '2024-11-20 10:20:00'),
  (4, 'KIT DE SELLOS', 'Descripción actualizada para KIT DE SELLOS', 0, 1,'2022-11-20 10:30:00', '2024-11-20 10:30:00'),
  (5, 'TRANSMISION', 'Descripción actualizada para TRANSMISION', 0, 1,'2023-11-20 10:40:00', '2024-11-20 10:40:00'),
  (6, 'EJE', 'Descripción actualizada para EJE', 0, 2,'2024-11-20 10:00:00', '2024-11-20 10:00:00'),
  (7, 'FRENOS', 'Descripción actualizada para FRENOS', 0, 2,'2024-12-20 10:10:00', '2024-11-20 10:10:00'),
  (8, 'HIDRÁULICO', 'Descripción actualizada para HIDRÁULICO', 0, 2,'2024-08-20 10:20:00', '2024-11-20 10:20:00'),
  (9, 'KIT DE SELLOS', 'Descripción actualizada para KIT DE SELLOS', 0, 2,'2022-11-20 10:30:00', '2024-11-20 10:30:00'),
  (10, 'no_category', 'No tiene categoria', 0, 3,'2022-11-20 10:30:00', '2024-11-20 10:30:00');
 
    INSERT INTO `products` (`id`, `subcategory_id`, `name`, `slug`, `brand`, `description`, `price`, `image`, `status`, `stock`, `created_at`, `updated_at`) VALUES
    (1, 1,  'CASE Retroexcavadora 580N', 'case-retroexcavadora-580n', 'CASE', 'Retroexcavadora 580N con excelente rendimiento y versatilidad.', 17000.00, 'https://rimpsa.com/wp-content/uploads/2022/11/kit-sellos-estabilizador-para-case.jpg', 1, 5, '2022-02-20 10:40:00', NOW()),
    (2, 2,  'CASE Retroexcavadora 590SN', 'case-retroexcavadora-590sn', 'CASE', 'Retroexcavadora 590SN con mayor potencia y capacidad de carga.', 85000.00, 'https://rimpsa.com/wp-content/uploads/2022/11/1-1-300x300.jpg', 0, 3, '2024-05-20 10:40:00', NOW()),
    (3, 7,  'Retroexcavadora JCB 3CX', 'retroexcavadora-jcb-3cx', 'JCB', 'Retroexcavadora JCB 3CX con diseño ergonómico y eficiencia energética.', 6000.00, 'https://rimpsa.com/wp-content/uploads/2022/11/4-300x300.jpg', 0, 7, '2019-11-20 10:40:00', NOW()),
    (4, 6,  'Retroexcavadora CAT 420F2', 'retroexcavadora-cat-420f2', 'CAT', 'Retroexcavadora CAT 420F2, ideal para diversas aplicaciones de construcción.', 90000.00, 'https://rimpsa.com/wp-content/uploads/2024/07/2830266-300x300.jpg', 1, 4, '2024-11-20 10:40:00', NOW()),
    (5, 3,  'Kit de Sellos para Excavadora Komatsu', 'kit-sellos-excavadora-komatsu', 'Komatsu', 'Kit de sellos de alta calidad para excavadoras Komatsu.', 500.00, 'https://rimpsa.com/wp-content/uploads/2022/12/BOMBA-300x300.jpg', 0, 20, '2023-11-20 10:40:00', NOW());