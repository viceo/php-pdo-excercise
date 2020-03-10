DROP USER IF EXISTS 'pdo_user'@'localhost' ;

-- Mysql mayor a  8 
CREATE USER 'pdo_user'@'localhost' identified with mysql_native_password by 'dbmanager';
GRANT ALL PRIVILEGES ON `php-pdo-excercise`.* to 'pdo_user'@'localhost';
FLUSH PRIVILEGES;

--Mysql menor a 8
CREATE USER 'pdo_user'@'localhost' identified with by 'dbmanager';
GRANT ALL PRIVILEGES ON `php-pdo-excercise`.* to 'pdo_user'@'localhost';
FLUSH PRIVILEGES;