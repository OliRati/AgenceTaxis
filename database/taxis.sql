CREATE DATABASE IF NOT EXISTS `taxis` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `taxis`;

DROP TABLE IF EXISTS `association_vehicule_conducteur`;
DROP TABLE IF EXISTS `vehicule`;
DROP TABLE IF EXISTS `conducteur`;

CREATE TABLE `conducteur` (
  `id_conducteur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  PRIMARY KEY (`id_conducteur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `vehicule` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `marque` varchar(30) NOT NULL,
  `modele` varchar(50) NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `immatriculation` varchar(15) NOT NULL,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `association_vehicule_conducteur` (
  `id_association` int(11) NOT NULL AUTO_INCREMENT,
  `id_conducteur` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  PRIMARY KEY (`id_association`),
  KEY `id_conducteur` (`id_conducteur`),
  KEY `id_vehicule` (`id_vehicule`),
  CONSTRAINT `association_vehicule_conducteur_ibfk_1` FOREIGN KEY (`id_conducteur`) REFERENCES `conducteur` (`id_conducteur`) ON DELETE CASCADE,
  CONSTRAINT `association_vehicule_conducteur_ibfk_2` FOREIGN KEY (`id_vehicule`) REFERENCES `vehicule` (`id_vehicule`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `conducteur` (`nom`, `prenom`) VALUES
('Martin', 'Sophie'),
('Pandre', 'Philippe'),
('Avigny', 'Julien'),
('Dupont', 'Alexandre'),
('Bernard', 'Marie'),
('Lefevre', 'Pierre'),
('Roux', 'Julie'),
('Moreau', 'Thomas'),
('Simon', 'Laura'),
('Durand', 'Nicolas');

INSERT INTO `vehicule` (`marque`, `modele`, `couleur`, `immatriculation`) VALUES
('Renault', 'Scenic', 'rouge', 'DD-456-ZZ'),
('Citroën', 'C8', 'bleu', 'AB-123-CD'),
('Mercedes', 'CLS', 'noir', 'EF-789-GH'),
('Peugeot', '308', 'gris', 'IJ-456-KL'),
('Peugeot', '2008', 'noir', 'MN-123-OP'),
('Volkswagen', 'Golf', 'blanc', 'QR-456-ST'),
('Renault', 'Clio', 'noir', 'UV-789-WX'),
('Citroën', 'C3', 'rouge', 'YZ-123-AB'),
('Mercedes', 'Classe A', 'noir', 'CD-456-EF'),
('Volkswagen', 'Passat', 'bleu', 'GH-789-IJ');

INSERT INTO `association_vehicule_conducteur` (`id_conducteur`, `id_vehicule`) VALUES
(1, 2), 
(2, 3), 
(3, 4), 
(4, 5),
(5, 3), 
(6, 1), 
(7, 6), 
(8, 7), 
(9, 2), 
(2, 9), 
(10, 10), 
(4, 4); 