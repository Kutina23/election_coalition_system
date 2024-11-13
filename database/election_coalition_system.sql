CREATE TABLE `admins` (
    `admin_id` varchar(10) PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` VARCHAR(25) NOT NULL
);

CREATE TABLE `agents` (
    `agent_id` varchar(10)PRIMARY KEY,
    `name` VARCHAR(50) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` VARCHAR(10),
    `address` varchar(100),
    `gps` VARCHAR(20),
    `occupation` VARCHAR(60),
    `password` VARCHAR(25) NOT NULL
);

CREATE TABLE `polling_center_results` (
    `id` VARCHAR(10) PRIMARY KEY,
    `agent_name` VARCHAR(50) NOT NULL,
    `center_code` VARCHAR(50) NOT NULL,
    `center_name` VARCHAR(60) NOT NULL,
    `pres_provisional_results` INT NOT NULL
);

CREATE TABLE `district_coalition_results` (
    `id` VARCHAR(10) PRIMARY KEY,
    `d_agent_name` VARCHAR(50) NOT NULL,
    `dcc_code` VARCHAR(50) NOT NULL,
    `district_name` VARCHAR(60) NOT NULL,
    `pres_provisional_results` INT NOT NULL
);
