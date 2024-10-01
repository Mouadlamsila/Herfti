CREATE DATABASE hrafti;
USE hrafti;

CREATE TABLE `employe` (
    `employe_id` INT NOT NULL AUTO_INCREMENT,
    `nom_complete` VARCHAR(255) NOT NULL,
    `CIN` VARCHAR(100) NOT NULL UNIQUE,
    `date_naissance` DATE NOT NULL,
    `age` INT NOT NULL,
    `photo` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(15) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `mot_pass` VARCHAR(255) NOT NULL,
    `profession` VARCHAR(100) NOT NULL,
    `genre` ENUM('رجل', 'مرأة') NOT NULL,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`employe_id`)
) 
ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE projets(
    projet_id int(3) AUTO_INCREMENT PRIMARY KEY,
    nom_projet varchar(100) NOT null,
    projet_photo varchar(100) NOT null,
    prix int(3) NOT null,
    description varchar(100) NOT null,
    employe_id int(3) NOT null,
    CONSTRAINT fk FOREIGN KEY(employe_id) REFERENCES employe(employe_id)
    );


CREATE TABLE `user` (
    `user_id` INT NOT NULL AUTO_INCREMENT,
    `nom_complete` VARCHAR(255) NOT NULL,
    `CIN` VARCHAR(100) NOT NULL UNIQUE,
    `date_naissance` DATE NOT NULL,
    `age` INT NOT NULL,
    `photo` VARCHAR(255) NOT NULL,
    `telephone` VARCHAR(15) NOT NULL UNIQUE,
    `email` VARCHAR(255) NOT NULL UNIQUE,
    `mot_pass` VARCHAR(255) NOT NULL,
    `genre` ENUM('رجل', 'مرأة') NOT NULL,
    `date_creation` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`user_id`)
) ;


CREATE TABLE entreprise(
    entreprise_id int(3) AUTO_INCREMENT PRIMARY KEY,
    nom_entreprise varchar(200),
    adresse varchar(200),
    numero VARCHAR(15) ,
    photo VARCHAR(255) NOT NULL,
    email varchar(100) NOT NULL UNIQUE,
    mot_pass VARCHAR(255) NOT NULL,
    entreprise_ty varchar(50) NOT NULL,
    entreprise_service varchar(50) NOT null,
    date_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP);

CREATE TABLE offre(
    offre_id int(3) AUTO_INCREMENT PRIMARY KEY,
    post varchar(50),
    adresse varchar(200),
    numero int(15) ,
    email varchar(100) ,
    descreption varchar(250),
    prix int(9),
    langue varchar(50),
    skills varchar(50),
    entreprise_id int(3) NOT null,
    CONSTRAINT fk3 FOREIGN KEY(entreprise_id) REFERENCES entreprise(entreprise_id)
);