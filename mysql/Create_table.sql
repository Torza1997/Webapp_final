
CREATE DATABASE Coffee_Shop_tortair CHARACTER SET utf8 COLLATE utf8_unicode_ci;


CREATE TABLE Product (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, Pd_name  TEXT NOT NULL, Type INT(1) NOT NULL,Price INT(4) NOT NULL,image TEXT NOT NULL);
#examble
insert into Product(Pd_name,Type,Price,image) Value ('Cappuccino',0,60,'coffee0.jpg');
insert into Product(Pd_name,Type,Price,image) Value ('Chocolate Cake ',1,200,'cake0.jpg');


CREATE TABLE user_all (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, F_name  TEXT NOT NULL, L_name  TEXT NOT NULL,Username TINYTEXT NOT NULL,Password LONGTEXT NOT NULL,Email TEXT NOT NULL,Phone TEXT NOT NULL,Adddress LONGTEXT NOT NULL ,Date_regis DATETIME NOT NULL);


CREATE TABLE admin_S (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, username_admin  TEXT NOT NULL, password_admin  TEXT NOT NULL,Status_admin INT(1) NOT NULL);
insert into admin_S(username_admin,password_admin,Status_admin) Value ('torza_18847',md5('torza_18847'),9);


CREATE TABLE Order_list (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, User_ID  TINYTEXT NOT NULL,Status INT(1) NOT NULL,Date_ DATETIME NOT NULL);


CREATE TABLE Menu_list (id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, User_ID  TINYTEXT NOT NULL,Menu_ID  TINYTEXT NOT NULL,Quantity INT(3) NOT NULL,_Status INT(1) NOT NULL,_Date DATETIME NOT NULL);








