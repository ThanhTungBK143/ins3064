-- SQL file for Laptop Shop Management
-- Database: LaptopShop
-- Table: laptops

-- Create database
CREATE DATABASE IF NOT EXISTS `LaptopShop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `LaptopShop`;

-- Create laptops table
CREATE TABLE IF NOT EXISTS `laptops` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `brand` VARCHAR(100) NOT NULL,
  `model` VARCHAR(150) NOT NULL,
  `processor` VARCHAR(150) NOT NULL,
  `ram` VARCHAR(50) NOT NULL,
  `storage` VARCHAR(100) NOT NULL,
  `price` DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample laptops
INSERT INTO `laptops` (`brand`, `model`, `processor`, `ram`, `storage`, `price`) VALUES
('Dell', 'Inspiron 15', 'Intel i5-1135G7', '8GB', '512GB SSD', 650.00),
('HP', 'Pavilion 14', 'Intel i7-1165G7', '16GB', '1TB SSD', 950.00),
('Apple', 'MacBook Air M1', 'Apple M1', '8GB', '256GB SSD', 999.00);