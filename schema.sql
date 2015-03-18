DROP DATABASE IF EXISTS Trimmme;
CREATE DATABASE Trimmme;
USE Trimmme;
CREATE TABLE user (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    user_name VARCHAR(255) NOT NULL,
    password VARCHAR(64) NOT NULL,
    email VARCHAR(255) NOT NULL,
    zip_code VARCHAR(64) NOT NULL,
    phone_number VARCHAR (64) DEFAULT NULL,
    remember_token varchar(255),
    created_at TIMESTAMP
);
CREATE TABLE plan (
    plan_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    start_date DATE,
    end_date DATE,
    start_weight INT NOT NULL,
    end_weight INT NOT NULL
);
CREATE TABLE check_in (
    check_in_id INT AUTO_INCREMENT PRIMARY KEY,
    plan_id INT NOT NULL,
    checkin_date TIMESTAMP,
    current_weight INT NOT NULL,
    caloric_intake INT NOT NULL,
    caloric_output INT NOT NULL
    
    
);
CREATE TABLE plan_adjustment (
    plan_adjustment_id INT AUTO_INCREMENT PRIMARY KEY,
    plan_id INT NOT NULL,
    adjustment_date TIMESTAMP,
    end_weight INT NOT NULL,
    end_date DATE 

);


INSERT INTO user (first_name, last_name, user_name, password, email, zip_code) VALUES ("Olivia", "Bert", "oliviaB", "password", "olivia@b.com", "85255");
INSERT INTO plan (user_id, start_date, end_date, start_weight, end_weight) VALUES ("1", "2015,16,03", "2015,18,04", "160", "140");
INSERT INTO check_in (plan_id, checkin_date, current_weight, caloric_intake, caloric_output) VALUES ("1", NOW(), "160", "1500", "500");