CREATE DATABASE DB_PRUEBA;

USE DB_PRUEBA;

CREATE TABLE Users(
	uid INT IDENTITY(1,1) PRIMARY KEY,
	name NVARCHAR(50) NOT NULL,
	last_name NVARCHAR(50) NOT NULL,
	email NVARCHAR(50) NOT NULL,
	phone NVARCHAR(12) NOT NULL,
	gender CHAR(1) NOT NULL);

SELECT * FROM Users;

INSERT INTO users ( name, last_name, email, phone, gender ) 
VALUES ('ERICK','ALVA','AALVA833@GMAIL.COM','5551977836','M');