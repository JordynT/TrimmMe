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
    rmr INT NOT NULL,
    remember_token varchar(255),
    created_at DATETIME,
    updated_at DATETIME
);
CREATE TABLE plan (
    plan_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    start_date TIMESTAMP,
    num_days INT NOT NULL,
    start_weight INT NOT NULL,
    lose_weight INT NOT NULL
);
CREATE TABLE check_in (
    check_in_id INT AUTO_INCREMENT PRIMARY KEY,
    plan_id INT NOT NULL,
    checkin_date DATE,
    current_weight INT,
    caloric_intake INT,
    caloric_output INT
    
    
);
CREATE TABLE plan_adjustment (
    plan_adjustment_id INT AUTO_INCREMENT PRIMARY KEY,
    plan_id INT NOT NULL,
    adjustment_date TIMESTAMP,
    end_weight INT NOT NULL,
    end_date DATE 

);


INSERT INTO user (first_name, last_name, user_name, password, email, rmr) VALUES ("Olivia", "Bert", "oliviaB", "$2y$10$IxIPjtgTVoullO2.JZHBHOgFWC9/baQv738XzfNNOjzicSuq8enOG", "j@t.com", "1500");
INSERT INTO plan (user_id, start_date, num_days, start_weight, lose_weight) VALUES ("1", "2015,16,03", "2015,18,04", "160", "140");
INSERT INTO check_in (plan_id, checkin_date, current_weight, caloric_intake, caloric_output) VALUES ("1", "2015-03-14", "160", "1500", "500");
INSERT INTO check_in (plan_id, checkin_date, current_weight, caloric_intake, caloric_output) VALUES ("1","2015-03-15" , "160", "1700", "600");
INSERT INTO check_in (plan_id, checkin_date, current_weight, caloric_intake, caloric_output) VALUES ("1", "2015-03-16", "160", "1500", "100");
INSERT INTO check_in (plan_id, checkin_date, current_weight, caloric_intake, caloric_output) VALUES ("1", "2015-03-17", "160", "2100", "400");