CREATE DATABASE IF NOT EXISTS logistics_db;
USE logistics_db;

#DROP DATABASE logistics_db;

DELIMITER $$

CREATE TRIGGER before_livraison_insert
BEFORE INSERT ON livraisons
FOR EACH ROW
BEGIN
    DECLARE produit_poids DECIMAL(10,2);
    SELECT poids INTO produit_poids 
    FROM produits 
    WHERE produits.nome = NEW.produits LIMIT 1;
    SET NEW.poids_total = NEW.quantité * IFNULL(produit_poids, 0);
END$$

DELIMITER $$

CREATE TRIGGER before_livraison_update
BEFORE UPDATE ON livraisons
FOR EACH ROW
BEGIN
    DECLARE produit_poids DECIMAL(10,2);
    SELECT poids INTO produit_poids 
    FROM produits 
    WHERE produits.nome = NEW.produits LIMIT 1;
    SET NEW.poids_total = NEW.quantité * IFNULL(produit_poids, 0);
END$$

DELIMITER ;

DELIMITER $$

CREATE TRIGGER before_insert_livraisons
BEFORE INSERT ON livraisons
FOR EACH ROW
BEGIN
    DECLARE total_poids DECIMAL(10, 2);
    DECLARE poids_max_camion DECIMAL(10, 2);
    SELECT poids_max INTO poids_max_camion
    FROM camions
    WHERE matrecul = NEW.Matricule;
    SELECT SUM(poids_total) INTO total_poids
    FROM livraisons
    WHERE Matricule = NEW.Matricule;
    SET total_poids = total_poids + NEW.poids_total;
    IF total_poids > poids_max_camion THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Insertion failed: Total poids_total exceeds poids_max of the camion.';
    END IF;
END$$

DELIMITER ;