
DROP DATABASE IF EXISTS task_force_db;

CREATE DATABASE task_force_db 
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

USE task_force_db;


CREATE TABLE task_force_db.roles (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  role_name VARCHAR(128) NOT NULL
);

CREATE TABLE task_force_db.cities (
  id INt NOT NULL AUTO_INCREMENT PRIMARY KEY,
  city_name VARCHAR(128) NOT NULL,
  city_coordinates VARCHAR(128) NOT NULL
);

CREATE TABLE task_force_db.users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  user_name VARCHAR(128) NOT NULL,
  user_password VARCHAR(256) NOT NULL,
  user_avatar VARCHAR(128) NULL,
  user_birthday DATETIME NULL,
  user_email VARCHAR(128) NOT NULL,
  user_phone VARCHAR(128) NOT NULL,
  user_telegramm VARCHAR(128) NULL,
  user_info VARCHAR(128) NULL,
  user_role_id INT DEFAULT 1,
  user_city_id INT NOT NULL, 
  FOREIGN KEY (user_role_id) REFERENCES roles(id),
  FOREIGN KEY (user_city_id) REFERENCES cities(id)
);

CREATE TABLE task_force_db.categories (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  category_name VARCHAR(128) NOT NULL,
  category_icon VARCHAR(128) NULL
);

CREATE TABLE task_force_db.specialization (
  id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  specialization_name VARCHAR(128) NOT NULL
);

CREATE TABLE task_force_db.statuses (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  status_name VARCHAR(128)
);

CREATE TABLE task_force_db.tasks (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  task_register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  task_title VARCHAR(128) NOT NULL, 
  task_details VARCHAR(256) NOT NULL,
  task_budget VARCHAR(128) NOT NULL,
  task_limit_date DATETIME NOT NULL,
  task_files VARCHAR(256) NULL,
  task_status_id INT NOT NULL DEFAULT 1,
  task_category_id INT,
  task_user_id INT,
  task_locale_id INT,
  FOREIGN KEY (task_user_id) REFERENCES users(id),
  FOREIGN KEY (task_category_id) REFERENCES categories(id),
  FOREIGN KEY (task_status_id) REFERENCES statuses(id),
  FOREIGN KEY (task_locale_id) REFERENCES cities(id)

);

CREATE TABLE task_force_db.users_specialization(
  user_id INT NOT NULL,
  specialization_id INT NOT NULL,
  PRIMARY KEY (user_id, specialization_id),
  FOREIGN KEY (user_id) REFERENCES users(id),
  FOREIGN KEY (specialization_id) REFERENCES specialization(id)
);






