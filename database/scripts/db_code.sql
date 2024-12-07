USE internshop;


SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


DROP TABLE IF EXISTS applications;
DROP TABLE IF EXISTS feedbacks;
DROP TABLE IF EXISTS wishlists_has_offers;
DROP TABLE IF EXISTS wishlists;
DROP TABLE IF EXISTS roles;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS promotions;
DROP TABLE IF EXISTS establishments;
DROP TABLE IF EXISTS localisations_has_companies;
DROP TABLE IF EXISTS localisations;
DROP TABLE IF EXISTS offers;
DROP TABLE IF EXISTS advancement;
DROP TABLE IF EXISTS companies;


-- -----------------------------------------------------
-- Table `internshop`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`roles` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`localisations`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`localisations` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `street_number` VARCHAR(10) NOT NULL,
  `street_name` VARCHAR(45) NOT NULL,
  `town` VARCHAR(45) NOT NULL,
  `zip_code` VARCHAR(6) NOT NULL,
  `region` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`establishments`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`establishments` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `phone_number` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `localisations_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_establishments_localisations1_idx` (`localisations_id` ASC) VISIBLE,
  CONSTRAINT `fk_establishments_localisations1`
    FOREIGN KEY (`localisations_id`)
    REFERENCES `internshop`.`localisations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`promotions`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`promotions` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `establishments_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_promotions_establishments1_idx` (`establishments_id` ASC) VISIBLE,
  CONSTRAINT `fk_promotions_establishments1`
    FOREIGN KEY (`establishments_id`)
    REFERENCES `internshop`.`establishments` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`companies` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NOT NULL,
  `students_from_cesi` INT NOT NULL,
  `business_line` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_date` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_companies_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_companies_users1_idx`
    FOREIGN KEY (`users_id`)
    REFERENCES `internshop`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`offers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`offers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detail`VARCHAR(50) NOT NULL,
  `duration` INT NOT NULL,
  `skill` VARCHAR(45) NOT NULL,
  `gratification` FLOAT NOT NULL,
  `number_of_places_available` INT NOT NULL,
  `target_promotion` VARCHAR(45) NOT NULL,
  `offer_date` DATE NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `companies_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_offers_companies1_idx` (`companies_id` ASC) VISIBLE,
  CONSTRAINT `fk_offers_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `internshop`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`advancements`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`advancements` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `steps` VARCHAR(45) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `first_name` VARCHAR(45) NOT NULL,
  `last_name` VARCHAR(45) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `email_verified_at` INT NULL,
  `remember_token` VARCHAR(50),
  `password` VARCHAR(255) NOT NULL,
  `birth_date` DATE NOT NULL,
  `phone_number` VARCHAR(20) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `roles_id` INT NOT NULL,
  `promotions_id` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_users_roles_idx` (`roles_id` ASC) VISIBLE,
  INDEX `fk_users_promotions1_idx` (`promotions_id` ASC) VISIBLE,
  CONSTRAINT `fk_users_roles`
    FOREIGN KEY (`roles_id`)
    REFERENCES `internshop`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_promotions1`
    FOREIGN KEY (`promotions_id`)
    REFERENCES `internshop`.`promotions` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`applications`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`applications` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `synopsis` VARCHAR(100) NOT NULL,
  `application_letter` VARCHAR(100) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `offers_id` INT NOT NULL,
  `users_id` INT NOT NULL,
  `advancements_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_applications_offers1_idx` (`offers_id` ASC) VISIBLE,
  INDEX `fk_applications_users1_idx` (`users_id` ASC) VISIBLE,
  INDEX `fk_applications_advancements1_idx` (`advancements_id` ASC) VISIBLE,
  CONSTRAINT `fk_applications_offers1`
    FOREIGN KEY (`offers_id`)
    REFERENCES `internshop`.`offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_applications_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `internshop`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_applications_advancements1`
    FOREIGN KEY (`advancements_id`)
    REFERENCES `internshop`.`advancements` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`localisations_has_companies`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`localisations_has_companies` (
  `localisations_id` INT NOT NULL,
  `companies_id` INT NOT NULL,
  `is_headquarter` TINYINT NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`localisations_id`, `companies_id`),
  INDEX `fk_localisations_has_companies_companies1_idx` (`companies_id` ASC) VISIBLE,
  INDEX `fk_localisations_has_companies_localisations1_idx` (`localisations_id` ASC) VISIBLE,
  CONSTRAINT `fk_localisations_has_companies_localisations1`
    FOREIGN KEY (`localisations_id`)
    REFERENCES `internshop`.`localisations` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_localisations_has_companies_companies1`
    FOREIGN KEY (`companies_id`)
    REFERENCES `internshop`.`companies` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`feedbacks`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`feedbacks` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `opinion` VARCHAR(255) NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_feedbacks_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_feedbacks_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `internshop`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`Wishlists`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`wishlists` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `users_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_wishlists_users1_idx` (`users_id` ASC) VISIBLE,
  CONSTRAINT `fk_wishlists_users1`
    FOREIGN KEY (`users_id`)
    REFERENCES `internshop`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `internshop`.`wishlists_has_offers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `internshop`.`wishlists_has_offers` (
  `wishlists_id` INT NOT NULL,
  `offers_id` INT NOT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `deleted_at` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wishlists_id`, `offers_id`),
  INDEX `fk_wishlists_has_offers_offers1_idx` (`offers_id` ASC) VISIBLE,
  INDEX `fk_wishlists_has_offers_wishlists1_idx` (`wishlists_id` ASC) VISIBLE,
  CONSTRAINT `fk_wishlists_has_offers_wishlists1`
    FOREIGN KEY (`wishlists_id`)
    REFERENCES `internshop`.`wishlists` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_wishlists_has_offers_offers1`
    FOREIGN KEY (`offers_id`)
    REFERENCES `internshop`.`offers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- Applications values;
INSERT INTO applications (synopsis, application_letter, offers_id, users_id, advancements_id) VALUES 
('C:\Users\Rokhaya NDIAYE\Desktop\CV-ADELINE-PETIT.svg','C:\Users\Rokhaya NDIAYE\Desktop\LTM.Stage .pdf',5,5,1),
('C:\Users\Rokhaya NDIAYE\Desktop\CV-Daniel-Dubois.jpg','C:\Users\Rokhaya NDIAYE\Desktop\LTM.Stage .pdf',4,10,2),
('C:\Users\Rokhaya NDIAYE\Desktop\CV-Julie-duval.png','C:\Users\Rokhaya NDIAYE\Desktop\LTM.Stage .pdf',3,5,2),
('C:\Users\Rokhaya NDIAYE\Desktop\CVQuentin-Durand.svg','C:\Users\Rokhaya NDIAYE\Desktop\LTM.Stage .pdf',5,11,3),
('C:\Users\Rokhaya NDIAYE\Desktop\cvSarah-lufeck.jpg','C:\Users\Rokhaya NDIAYE\Desktop\LTM.Stage .pdf',2,9,1);


-- Feedbacks values;
INSERT INTO feedbacks (opinion, users_id) VALUES 
('Très bonne entreprise ',11),
('Mauvaise expérience. Je ne recommande pas.',9),
('Mitigé, je ne me prononce pas.',5),
('Excellent.Recommande à tous.',15),
('Pas bonne pour une première expérience.',6),
('Bonne opportunité.',8),
('Pire expérience.',5),
('Très très satisfait.',7),
('Ne recommande pas.',15),
('Recommande à tous.',4);


-- Wishlists_has_Offers values;
INSERT INTO wishlists_has_offers (wishlists_id, offers_id) VALUES 
(1,2),
(2,5),
(3,1);


-- Wishlists values;
INSERT INTO wishlists (users_id) VALUES 
(4),	
(9),	
(2);	


-- Users values;
INSERT INTO users (first_name, last_name, email, password, birth_date, phone_number, roles_id, promotions_id) VALUES 
('Drake','Omar','Drake.Omar@hotmail.com','8Ygz4qL6yt4R4A','1991-03-06','+33 6 61 38 87 40',1,NULL),
('Case','Hope','Case.Hope@hotmail.com','7bEye38Wd44fFR','2000-04-19','+33 6 99 84 32 26',2,1),
('Alvarado','Dolan','Alvarado.Dolan@hotmail.com','yz72L7U6pyC8Cs','2001-08-11','+33 7 00 31 27 48',2,5),
('Burris','Jamal','Burris.Jamal@hotmail.com','T7Bqxrc83GXe68','1999-05-29','+33 7 98 60 27 70',2,4),
('Love','Ross','Love.Ross@hotmail.com','948z7Y8beKiLLa','2003-10-29','+33 7 88 49 33 88',2,1),
('Woodward','Daniel','Woodward.Daniel@hotmail.com','LmHf78343vewBN','2003-05-09','+33 6 32 15 45 67',2,1),
('Vang','Sybil','Vang.Sybil@hotmail.com','Kp25g9G3qLfV5n','2002-10-28','+33 7 00 82 35 12',2,2),
('Rosario','Laura','Rosario.Laura@hotmail.com','9AEyB76r5N7pew','1999-07-12','+33 6 19 70 59 07',2,3),
('Conner','Mariam','Conner.Mariam@hotmail.com','j2H9juDVn9Ww38','1999-02-12','+33 6 17 56 33 54',2,5),
('French','Lyle','French.Lyle@hotmail.com','jgVS87e465PuTk','1999-10-01','+33 6 98 27 85 46',2,4),
('Mayo','Shannon','Mayo.Shannon@hotmail.com','gZ45c8xc5UNA9u','2002-10-28','+33 7 96 27 14 39',2,2),
('Stokes','Jillian','Stokes.Jillian@hotmail.com','Fyqgd3TW98Wy87','1985-05-10','+33 7 00 88 24 88',3,3),
('Wheeler','Kasper','Wheeler.Kasper@hotmail.com','G5g78aUNG5k5xk','1976-06-29','+33 7 50 13 20 90',4,1),
('Salazar','Kimberley','Salazar.Kimberley@hotmail.com','Yz7nJfjq942B9H','1988-04-11','+33 7 00 05 86 27',3,2),
('Foreman','Reuben','Foreman.Reuben@hotmail.com','rzVZag33j2RH57','1960-05-07','+33 6 99 11 33 17',3,5);


-- Roles values;
INSERT INTO roles (title) VALUES 
('Admin'),
('Student'),
('Pilot'),
('Companies'); 


-- Promotions values;
INSERT INTO promotions (name, establishments_id) VALUES 
('A1',5),
('A2',4),
('A3',3),
('A4',1),
('A5',3);


-- Establishments values;
INSERT INTO establishments (name, phone_number, localisations_id) VALUES 
('Cesi','+33 7 41 65 47 29',7),
('Polytech','+33 7 85 73 31 17',8),
('Centrale','+33 6 19 37 20 70',9),
('Insa','+33 6 34 28 36 99',10),
('Seatech','+33 6 37 48 49 27',11);


-- Localisations_has_Companies values;
INSERT INTO localisations_has_companies (localisations_id, companies_id, is_headquarter) VALUES 
(1,1,0),
(2,2,0),
(3,3,0),
(4,4,0),
(5,5,0),
(6,5,1);


-- Localisations values;
INSERT INTO localisations (street_number, street_name, town, zip_code, region) VALUES 
(12,'Allée des lylas','Pau','64000','Béarn'),
(4,'Rue des abeilles','Montbazon ','37250','Centre-Val de Loire'),
(5,'Avenue des poètes','Paris','75000','Île de France'),
(8,'Boulevard aquitaine ','Lille ','59000','Haut-de-France'),
(21,'Rue de la liberté','Lyon','69000','Auverngne-Rhône-Alpes'),
(85,'Rue du berger','Toulouse','31000','Haute garonne'),
(5,'Rue des frères Orbigny ','Pau','64000','Béarn'),
(37,'Place plumereau','Tours','37000','Centre-Val de Loire'),
(44,'Avenu du Contexte','Nante','44000','Pays de la Loire'),
(15,'Boulevard Orléan ','Strasbourg','67000','Grand-Est'),
(3,'Avenue de université','Toulon','83130','Province-Alpes-Côte Azur');


-- Offers values;
INSERT INTO offers (detail, duration, skill, gratification, number_of_places_available, target_promotion, offer_date, companies_id) VALUES
('description offre',6,'Data',900,2,'A3','2022-12-12',4),	
('description offre',3,'Quantic computer',600,3,'A1','2022-12-14',3),	
('description offre',4,'Full-stack',615,1,'A2','2023-01-03',1),	
('description offre',5,'BTP',720,2,'A1','2023-01-26',4),	
('description offre',2,'Marketing',675,4,'A2','2023-02-09',5),	
('description offre',10,'IT ',800,5,'A5','2023-02-28',3);	


-- Advancement values;
INSERT INTO advancements (steps) VALUES 
('Envoyer'),
('Entretien'),
('Réponse');


-- Companies values;
INSERT INTO companies (name, students_from_cesi, business_line, users_id) VALUES 
('Safran ',3,'Aéronotique', 13),
('Hermes',0,'Luxe', 13),
('Total',1,'Energie', 13),
('Airbus',0,'Construction spacial', 13),
('Enédis',1,'Réseau électrique', 13);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
