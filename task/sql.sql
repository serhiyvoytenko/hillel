CREATE DATABASE `hillel_db`;
USE hillel_db;

CREATE TABLE `parks`
(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `serial_number` VARCHAR(255) NOT NULL,
    `address` VARCHAR(255) NOT NULL

);

CREATE TABLE `cars`
(
    `id`  INT PRIMARY KEY AUTO_INCREMENT,
    `park_id` INT,
    `model`   VARCHAR(255) NOT NULL,
    `year`    DATE NOT NULL,
    `price`   FLOAT NOT NULL
);

CREATE TABLE `drivers`
(
    `id`  INT PRIMARY KEY AUTO_INCREMENT,
    `full_name`   VARCHAR(255) NOT NULL ,
    `license_ID`  VARCHAR(255) NOT NULL ,
    `birthdate`   DATETIME NOT NULL ,
    `car_id`  INT
);

CREATE TABLE `orders`
(
    `id`    INT PRIMARY KEY AUTO_INCREMENT,
    `customer_id`   INT,
    `driver_id`   INT,
    `first_address` VARCHAR(255) NOT NULL ,
    `destination_address`   VARCHAR(255) NOT NULL
);

CREATE TABLE `customers`
(
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `name` VARCHAR(255) NOT NULL ,
    `surname`   VARCHAR(255) NOT NULL ,
    `birthday`  DATETIME NOT NULL
);

ALTER TABLE `cars` ADD FOREIGN KEY (`park_id`) REFERENCES `parks` (`id`);
ALTER TABLE `drivers` ADD FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`);
ALTER TABLE `orders` ADD FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);
ALTER TABLE `orders` ADD FOREIGN KEY (`driver_id`) REFERENCES `drivers` (`id`);

ALTER TABLE `cars` MODIFY `model` VARCHAR(200);
ALTER TABLE `cars` RENAME COLUMN `model` TO `models`;
ALTER TABLE `cars` RENAME COLUMN `models` TO `model`;

INSERT INTO
    `parks` (serial_number, address)
VALUES
    ('serial_number1', 'address1'),
    ('serial_number2', 'address2'),
    ('serial_number3', 'address3');

INSERT INTO
    `customers` (name, surname, birthday)
VALUES
    ('name1', 'surname1', '1970-10-10'),
    ('name2', 'surname2', '1971-11-11'),
    ('name3', 'surname3', '1972-12-12');

INSERT INTO
    `cars` (park_id, model, year, price)
VALUES
    ('1', 'model1', '1981-10-10', '12345.34'),
    ('2', 'model2', '1982-11-11', '22345.34'),
    ('3', 'model3', '1983-12-12', '32345.34');

INSERT INTO
    `drivers` (full_name, license_ID, birthdate, car_id)
VALUES
    ('full_name1', 'license_id1', '1970-05-05', '4'),
    ('full_name2', 'license_id2', '1970-05-05', '5'),
    ('full_name3', 'license_id3', '1970-05-05', '6');

INSERT INTO
    `orders` (customer_id, driver_id, first_address, destination_address)
VALUES
    ('4', '4', 'first_address1', 'destination1'),
    ('5', '5', 'first_address2', 'destination2'),
    ('6', '6', 'first_address3', 'destination3');

UPDATE `parks` SET `serial_number` = 'serial_number31' WHERE `parks`.`id` = 3;

DELETE FROM `orders` WHERE `id` = 3;

SELECT * FROM `orders`;
SELECT `driver_id` FROM `orders` WHERE id = 2;


DROP TABLE `orders`;
DROP TABLE `drivers`;
DROP TABLE `cars`;
DROP TABLE `parks`;
DROP TABLE `customers`;

