-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 02 sep. 2021 à 17:27
-- Version du serveur : 10.4.20-MariaDB
-- Version de PHP : 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pct`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

CREATE TABLE `administrateur` (
  `matricule` varchar(100) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telephone` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`matricule`, `nom`, `prenoms`, `adresse`, `mail`, `telephone`) VALUES
('12', 'SILUE', 'DAVID', 'Ferke', 'david.silue@uvci.edu.ci', 47474747),
('123', 'OUATTARA', 'KOUNAPETRI', 'Yop', 'kounapetri.ouattara@uvci.edu.ci', 141366353);

-- --------------------------------------------------------

--
-- Structure de la table `avis_permutat`
--

CREATE TABLE `avis_permutat` (
  `Id_permut` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `telephone` varchar(50) NOT NULL,
  `localite` varchar(15) NOT NULL,
  `zone` varchar(100) DEFAULT NULL,
  `dren_souh` varchar(100) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `date_avis` datetime NOT NULL DEFAULT current_timestamp(),
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `avis_permutat`
--

INSERT INTO `avis_permutat` (`Id_permut`, `nom`, `prenoms`, `mail`, `telephone`, `localite`, `zone`, `dren_souh`, `matricule`, `date_avis`, `annee`) VALUES
(1, 'OUATTARA', 'Kounapetri Aboulaye', 'kounapetri.ouattara@uvci.edu.ci', '45464534', 'Plateau', 'Urbaine', 'Soubre', '123A', '2021-08-18 10:07:11', 2021),
(2, 'GUIRIEKPE', 'Josue', 'josue.guiriekpe@uvci.edu.ci', '75758496', 'Katiola', 'Rurale', 'DrenAbidjan 3', '123B', '2021-08-19 10:10:53', 2021),
(3, 'KONATE', 'Aissata', 'aissata.konate@uvci.edu.ci', '67654534', 'BouakeAirFrance', 'Urbaine', 'Dren Abidjan 2', '123C', '2021-08-18 10:10:53', 2021),
(4, 'SANOGO', 'Sory', 'sory.sanogo@uvci.edu.ci', '54675876', 'Bondoukou', 'Rurale', 'Dren Korhogo', '123D', '2021-08-17 10:14:47', 2021),
(5, 'TRAORE', 'Bamoussa', 'bamoussa.traore@uvci.edu.ci', '45456576', 'FERKE Douanes', 'Rurale', 'Dren Man', '123E', '2021-08-17 10:14:47', 2021),
(6, 'DADIE', 'uberson jean', 'ubersonjean@gmail.com', '09087867', 'Aboisso', 'Rurale', 'Dren Fresco', '123U', '2021-08-20 10:24:16', 2021),
(7, 'KAKOU', 'Maurice', 'mauricekakou@gmail.com', '45768798', 'Yamoussoukro', 'Urbaine', 'Dren Mankono', '123H', '2021-08-24 10:24:16', 2021),
(8, 'TANOH', 'Celestine', 'celestinetanoh@gmail.com', '45098978', 'TOUMODI', 'Rurale', 'Dren Adzopé', '123J', '2021-08-19 10:27:38', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `dossier`
--

CREATE TABLE `dossier` (
  `id_dossier` varchar(100) NOT NULL,
  `statut_iep1` enum('Accepter','Refuser') DEFAULT NULL,
  `statut_iep2` enum('Accepter','Refuser') DEFAULT NULL,
  `statut_dren1` enum('Accepter','Refuser') DEFAULT NULL,
  `statut_dren2` enum('Accepter','Refuser') DEFAULT NULL,
  `statut_drh` enum('Accepter','Refuser') DEFAULT NULL,
  `date_arrive_dren1` date DEFAULT NULL,
  `date_arrive_dren2` date DEFAULT NULL,
  `Id_Statut` int(11) DEFAULT NULL,
  `Id_drh` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier`
--

INSERT INTO `dossier` (`id_dossier`, `statut_iep1`, `statut_iep2`, `statut_dren1`, `statut_dren2`, `statut_drh`, `date_arrive_dren1`, `date_arrive_dren2`, `Id_Statut`, `Id_drh`) VALUES
('dos1', 'Accepter', 'Accepter', 'Accepter', 'Accepter', 'Accepter', '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos2', 'Accepter', 'Accepter', 'Accepter', 'Accepter', 'Refuser', '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos3', 'Accepter', 'Accepter', 'Refuser', 'Accepter', NULL, '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos4', 'Accepter', 'Refuser', 'Accepter', NULL, NULL, '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos5', 'Accepter', 'Accepter', 'Accepter', 'Accepter', 'Accepter', '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos6', 'Accepter', 'Refuser', 'Accepter', NULL, NULL, '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos7', 'Accepter', 'Refuser', 'Accepter', NULL, NULL, '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos8', 'Accepter', 'Accepter', 'Accepter', 'Accepter', 'Accepter', '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('dos9', 'Accepter', 'Accepter', 'Accepter', 'Accepter', 'Accepter', '2021-08-25', '2021-08-26', 4, 'DRH2021MEN'),
('PERMUTE1630099613', 'Accepter', 'Accepter', NULL, 'Accepter', NULL, NULL, NULL, 4, 'DRH2021MEN'),
('PERMUTE1630529070', 'Accepter', NULL, 'Accepter', NULL, NULL, NULL, NULL, 4, 'DRH2021MEN'),
('PERMUTE1630529259', 'Accepter', NULL, NULL, NULL, NULL, NULL, NULL, 4, 'DRH2021MEN');

-- --------------------------------------------------------

--
-- Structure de la table `dossier_deman`
--

CREATE TABLE `dossier_deman` (
  `Id_DosDem` int(11) UNSIGNED NOT NULL,
  `dren_souh` varchar(100) NOT NULL,
  `iep_souh` varchar(100) NOT NULL,
  `date_Dem` datetime NOT NULL DEFAULT current_timestamp(),
  `Id_iep` varchar(100) NOT NULL,
  `Id_dren` varchar(50) NOT NULL,
  `id_ensei_deman` int(10) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `id_dossier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier_deman`
--

INSERT INTO `dossier_deman` (`Id_DosDem`, `dren_souh`, `iep_souh`, `date_Dem`, `Id_iep`, `Id_dren`, `id_ensei_deman`, `matricule`, `id_dossier`) VALUES
(1, ' DREN SOUBRE', 'IEP Soubre', '2021-08-20 10:45:13', 'IEP2021plateau', 'DREN2021ABIDJAN1', 1, '123A', 'dos1'),
(2, 'DREN ABIDJAN 2', 'IEP BAD GESCO', '2021-08-20 10:59:05', 'IEP2021katiola', 'DREN2021KATIOLA', 2, '123B', 'dos5'),
(3, 'DREN ABIDJAN 2', 'IEP Koumassi', '2021-08-20 11:00:23', 'IEP2021bouakeAirFrance', 'DREN2021BOUAKE', 3, '123C', 'dos2'),
(4, 'DREN KORHOGO Nord', ' IEP Gbonzoro', '2021-08-20 11:03:39', 'IEP2021bondoukou', 'DREN2021BONDOUKOU', 4, '123D', 'dos8'),
(5, 'DREN MAN', 'IEP Man Libreville', '2021-08-20 11:06:30', 'IEP2021ferkeDouanes', 'DREN2021FERKE', 5, '123E', 'dos9'),
(6, 'DREN FRESCO', 'IEP KANI 1', '2021-08-20 11:08:50', 'IEP2021aboisso', 'DREN2021ABOISSO', 6, '123U', 'dos3'),
(7, 'DREN MANKONO', 'IEP MANKONO 1', '2021-08-20 11:08:50', 'IEP2021yamoussoukro', 'DREN2021YAMOUSSOUKRO', 7, '123H', 'dos4'),
(8, 'DREN ADZOPE', 'IEP Habitat 1 et 2', '2021-08-20 11:12:22', 'IEP2021toumodi', 'DREN2021TOUMODI', 8, '123J', 'dos7'),
(9, ' DREN2021SOUBRE', 'EPP SOUBRE', '2021-08-27 23:08:53', 'IEP2021plateau', 'DREN2021ABIDJAN1', 22, '123', 'PERMUTE1630099613'),
(10, 'DREN GRAND BASSAM', 'EPP Obrou Kouassi', '2021-09-01 22:09:30', 'IEP2021soubre', 'DREN2021SOUBRE', 23, '456 A', 'PERMUTE1630529070'),
(11, 'DREN BOUAKE', 'EPP Bouake Air France', '2021-09-01 22:09:39', 'IEP2021soubre', 'DREN2021SOUBRE', 24, '456 B', 'PERMUTE1630529259');

-- --------------------------------------------------------

--
-- Structure de la table `dossier_fav`
--

CREATE TABLE `dossier_fav` (
  `Id_DosFav` int(11) UNSIGNED NOT NULL,
  `opinion` enum('Accepter','Refuser') NOT NULL,
  `date_opinion` datetime DEFAULT NULL,
  `Id_iep` varchar(100) NOT NULL,
  `Id_dren` varchar(50) NOT NULL,
  `id_ensei_fav` int(10) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `id_dossier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dossier_fav`
--

INSERT INTO `dossier_fav` (`Id_DosFav`, `opinion`, `date_opinion`, `Id_iep`, `Id_dren`, `id_ensei_fav`, `matricule`, `id_dossier`) VALUES
(1, 'Accepter', '2021-08-24 11:27:02', 'IEP2021adzope', 'DREN2021ADZOPE', 8, '234D', 'dos7'),
(2, 'Accepter', '2021-08-24 11:21:59', 'IEP2021yopougonGesco', 'DREN2021ABIDJAN3', 2, '123Z', 'dos5'),
(3, 'Accepter', '2021-08-24 11:24:57', 'IEP2021koumassi', 'DREN2021ABIDJAN2', 3, '123Q', 'dos2'),
(4, 'Accepter', '2021-08-24 11:24:57', 'IEP2021korhogoNord', 'DREN2021KORHOGO', 1, '123N', 'dos6'),
(5, 'Accepter', '2021-08-24 11:27:02', 'IEP2021man', 'DREN2021MAN', 5, '123O', 'dos9'),
(6, 'Refuser', '2021-08-24 11:27:02', 'IEP2021fresco', 'DREN2021FRESCO', 6, '234B', 'dos3'),
(7, 'Accepter', '2021-08-24 11:27:02', 'IEP2021mankono', 'DREN2021MANKONO', 7, '234C', 'dos4'),
(19, 'Accepter', '2021-08-29 02:08:27', 'IEP2021soubre', 'DREN2021SOUBRE', 16, '12', 'dos1'),
(20, 'Accepter', '2021-08-29 02:08:34', 'IEP2021soubre', 'DREN2021SOUBRE', 17, '123Y', 'PERMUTE1630099613');

-- --------------------------------------------------------

--
-- Structure de la table `dren`
--

CREATE TABLE `dren` (
  `Id_dren` varchar(50) NOT NULL,
  `nom_dren` varchar(100) NOT NULL,
  `mail_dren` varchar(100) NOT NULL,
  `contact_dren` varchar(10) NOT NULL,
  `Id_drh` varchar(100) NOT NULL,
  `Id_localite` int(11) NOT NULL,
  `matricule_respo` varchar(100) DEFAULT NULL,
  `nom_respo` varchar(50) NOT NULL,
  `prenoms_respo` varchar(100) NOT NULL,
  `mails_respo` varchar(100) NOT NULL,
  `tel_respo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `dren`
--

INSERT INTO `dren` (`Id_dren`, `nom_dren`, `mail_dren`, `contact_dren`, `Id_drh`, `Id_localite`, `matricule_respo`, `nom_respo`, `prenoms_respo`, `mails_respo`, `tel_respo`) VALUES
('DREN2021ABIDJAN1', 'DREN ABIDJAN 1', 'drenabidjan1@yahoo.com', '22323821', 'DRH2021MEN', 20, '987I', 'AKE', 'GERMAIN', 'akegermain@gmail.com', 5565423),
('DREN2021ABIDJAN2', 'DREN ABIDJAN 2', 'drenabidjan2@yahoo.com', '22328724', 'DRH2021MEN', 48, NULL, 'Tanoh', 'Joachin', 'tanohjoachin@gmail.com', 9080705),
('DREN2021ABIDJAN3', 'DREN ABIDJAN 3', 'drenabidjan3@yahoo.com', '23462455', 'DRH2021MEN', 51, '987F', 'KONE', 'LOTTO CECILE', 'konelotto@gmail.com', 9897867),
('DREN2021ABIDJAN4', 'DREN ABIDJAN 4', 'drenabijan4@yahoo.com', '22123234', 'DRH2021MEN', 41, '987Y', 'KONE', 'NABATCHE', 'konenabatche@gmail.com', 9876542),
('DREN2021ABOISSO', 'DREN ABOISSO', 'drenaboisso@yahoo.com', '21212324', 'DRH2021MEN', 60, '987A', 'KAKOU', 'Marie ngoran espe Kamenan', 'kakoumarie@gmail.com', 45657687),
('DREN2021ADZOPE', 'DREN ADZOPE', 'drenadzope@yahoo.com', '21212324', 'DRH2021MEN', 62, '345M', 'KANGA', 'Afoue valerine', 'kangaaffoue@gmail.com', 43454676),
('DREN2021BONDOUKOU', 'DREN BONDOUKOU', 'drenbondoukou@yahoo.com', '22321234', 'DRH2021MEN', 59, '987B', 'BOTTY', 'Bi tresor', 'bottybi@gmail.com', 56543423),
('DREN2021BOUAKE', 'DREN BOUAKE', 'drenbouake@yahoo.com', '21345676', 'DRH2021MEN', 35, '900A', 'BENIE', 'Aristide', 'beniearistide@gmail.com', 8786745),
('DREN2021FERKE', 'DREN FERKESSEDOUGOU', 'drenferke@yahoo.com', '22324526', 'DRH2021MEN', 1, NULL, 'SORO', 'Gnevouyouguy', 'sorogne@gmail.com', 9897867),
('DREN2021FRESCO', 'DREN FRESCO', 'drenfresco@yahoo.com', '21212345', 'DRH2021MEN', 57, '987K', 'AKA', 'Caleb ', 'akacaleb@gmail.com', 55676545),
('DREN2021GRANDBASSAM', 'DREN GRAND BASSAM', 'drengrandbassam@yahoo.com', '21212334', 'DRH2021MEN', 53, '987L', 'ATSE', 'Tchekoura armele', 'astetche@gmail.com', 7675645),
('DREN2021KATIOLA', 'DREN KATIOLA', 'drenkatiola@yahoo.com', '22002221', 'DRH2021MEN', 54, '987Z', 'MAKA', 'Gabin yapeu', 'makayapeu@gmail.coom', 4565432),
('DREN2021KORHOGO', 'DREN KORHOGO', 'drenkorhogo@yahoo.com', '21234565', 'DRH2021MEN', 10, '987J', 'KONE', 'Fousseni', 'konefousseni@gmail.com', 4565423),
('DREN2021MAN', 'DREN MAN', 'drenman@yahoo.com', '21098978', 'DRH2021MEN', 56, '987T', 'OUEDRAOGO', 'Salifou ahmed', 'ouedraogoahmed@gmail.com', 7675645),
('DREN2021MANKONO', 'DREN MANKONO', 'drenmankono@yahoo.com', '21456787', 'DRH2021MEN', 58, '987E', 'ADINGRA', 'Mermose alphonse', 'adingramermose@gmail.com', 44543423),
('DREN2021SOUBRE', 'DREN SOUBRE', 'drensoubre@yahoo.com', '21212134', 'DRH2021MEN', 61, '987R', 'OURAGA', 'Zacharie', 'ouragazacharie@gmail.com', 78765645),
('DREN2021TAFIRE', 'DREN TAFIRE', 'drentafire@yahoo.com', '21212345', 'DRH2021MEN', 55, NULL, 'KABENAN', 'Ebenezer', 'kabenanebenezer@gmail.com', 9786756),
('DREN2021TOUMODI', 'DREN TOUMODI', 'drentoumodi@yahoo.com', '21234565', 'DRH2021MEN', 66, '986P', 'SERY', 'Digbeu gnaly', 'serydigbeu@gmail.com', 67654534),
('DREN2021YAMOUSSOUKRO', 'DREN YAMOUSSOuKRO', 'drenyamoussoukro@yahoo.com', '21566787', 'DRH2021MEN', 68, '987R', 'ASSINOU', 'Gilchrist stephane', 'assinouchrist@gmail.com', 56453423);

-- --------------------------------------------------------

--
-- Structure de la table `drh_men`
--

CREATE TABLE `drh_men` (
  `Id_drh` varchar(100) NOT NULL,
  `nom_drh` varchar(100) NOT NULL,
  `mail_drh` varchar(100) NOT NULL,
  `contact_drh` varchar(10) NOT NULL,
  `Id_localite` int(11) NOT NULL,
  `matricule_respo` varchar(100) NOT NULL,
  `nom_respo` varchar(50) NOT NULL,
  `prenoms_respo` varchar(100) NOT NULL,
  `mails_respo` varchar(100) NOT NULL,
  `tel_respo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `drh_men`
--

INSERT INTO `drh_men` (`Id_drh`, `nom_drh`, `mail_drh`, `contact_drh`, `Id_localite`, `matricule_respo`, `nom_respo`, `prenoms_respo`, `mails_respo`, `tel_respo`) VALUES
('DRH2021MEN', 'Direction des ressources humaines (DRH)', 'mendrh@MEN.edu.ci', '27210000', 20, '123', 'OUATTARA', 'KOUNAPETRI ABDOULAYE', 'kounapetri.ouattara@uvci.edu.ci', 747963654);

-- --------------------------------------------------------

--
-- Structure de la table `ecole`
--

CREATE TABLE `ecole` (
  `Id_ecole` varchar(100) NOT NULL,
  `nom_ecole` varchar(100) NOT NULL,
  `Type_ecole` enum('Pre-scolaire','Primaire') NOT NULL DEFAULT 'Primaire',
  `mail_ecole` varchar(100) NOT NULL,
  `contact_ecole` int(10) NOT NULL,
  `Id_localite` int(11) NOT NULL,
  `Id_iep` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `ecole`
--

INSERT INTO `ecole` (`Id_ecole`, `nom_ecole`, `Type_ecole`, `mail_ecole`, `contact_ecole`, `Id_localite`, `Id_iep`) VALUES
('eco1', 'EPP PILOTE', 'Primaire', 'ecopilote@yahoo.com', 56567656, 20, 'IEP2021plateau'),
('eco10', 'EPP Lagunes de Koumassi', 'Primaire', 'ecolaguneskoumassi@yahoo.com', 21212343, 26, 'IEP2021marcory'),
('eco11', 'EPP Sicogi 1', 'Primaire', 'ecosicogi1@yahoo.com', 98786753, 26, 'IEP2021marcory'),
('eco12', 'EPP BAD Gesco', 'Pre-scolaire', 'ecobadgesco@yahoo.com', 67564534, 51, 'IEP2021yopougonGesco'),
('eco13', 'EPP DOMINIQUE OUATTARA micao', 'Primaire', 'ecodominique@yahoo.com', 34323123, 51, 'IEP2021yopougonGesco'),
('eco14', 'EPP BAD Niangon nord ', 'Pre-scolaire', 'ecobadniangon@yahoo.com', 67654534, 15, 'IEP2021yopougonNiangon'),
('eco15', 'EPP IPS Siporex', 'Primaire', 'ecoips@yahoo.com', 21212343, 13, 'IEP2021yopougonToitRouge'),
('eco16', 'EPP Gendarmerie abobo', 'Primaire', 'ecogendarleirieabobo@yahoo.com', 90987867, 40, 'IEP2021aboboAvocatier'),
('eco17', 'EPP Le Banco Japonnais', 'Primaire', 'ecoabobobanco@yahoo.com', 9896875, 41, 'IEP2021aboboBanco'),
('eco18', 'EPP BAD Plateau Dokui', 'Pre-scolaire', 'ecobadplateaudokui@yahoo.com', 87674565, 39, 'IEP2021aboboPlateauDokui'),
('eco19', 'EPP Nouhon Diallo', 'Primaire', 'econouhondiallo@yahoo.com', 9896756, 3, 'IEP2021ferkeDouanes'),
('eco2', 'EPP Château cocody', 'Primaire', 'cocodychateau@yahoo.com', 45656787, 23, 'IEP2021plateau'),
('eco20', 'EPP Walia', 'Primaire', 'ecowalia@yahoo.com', 78765645, 4, 'IEP2021ferkeDiwala'),
('eco21', 'EPP Lougnoble', 'Pre-scolaire', 'ecolougonble@yahoo.com', 90989878, 10, 'IEP2021korhogoMbengue'),
('eco22', 'EPP Gbonzoro', 'Primaire', 'ecogbonzoro@yahoo.com', 34321234, 11, 'IEP2021korhogoNord'),
('eco23', 'EPP Gonfreville', 'Primaire', 'ecogonfreville@yahoo.com', 78765434, 35, 'IEP2021bouake1'),
('eco24', 'EPP Bouake Air France', 'Primaire', 'ecobouakeairfrance@yahoo.com', 23434565, 64, 'IEP2021bouakeAirFrance'),
('eco25', 'EPP Obrou Kouassi', 'Primaire', 'ecoobroukouassi@yahoo.com', 45434232, 53, 'IEP2021bonoua'),
('eco26', 'EPP Fronan', 'Pre-scolaire', 'ecofronan@yahoo.com', 34321232, 54, 'IEP2021katiola'),
('eco27', 'EPP Kouroukouman', 'Primaire', 'ecokouroukouman@yahoo.com', 76564534, 55, 'IEP2021tafire'),
('eco28', 'EPP MANLibreville', 'Primaire', 'ecomanlibreville@yahoo.com', 21212343, 56, 'IEP2021man'),
('eco29', 'EPP Laleraba', 'Pre-scolaire', 'ecolaleraba@yahoo.com', 898767, 1, 'IEP2021ferkeKouara'),
('eco3', 'EPP Ponon', 'Primaire', 'epppono@yahoo.com', 34322123, 24, 'IEP2021plateau'),
('eco30', 'EPP Kani 1', 'Primaire', 'ecokani@yahoo.com', 87675645, 57, 'IEP2021fresco'),
('eco31', 'EPP Mankono 1', 'Primaire', 'ecomankono@yahoo.com', 89765456, 58, 'IEP2021mankono'),
('eco32', 'EPP Municipalite de Bondoukou', 'Pre-scolaire', 'ecomunibondoukou@yahoo.com', 43456567, 59, 'IEP2021bondoukou'),
('eco33', 'EPP BAD Bois Blanc', 'Pre-scolaire', 'ecobadboisblanc@yahoo.com', 56786576, 60, 'IEP2021aboisso'),
('eco34', 'EPP Soubre', 'Primaire', 'ecosoubre@yahoo.com', 56543423, 61, 'IEP2021soubre'),
('eco35', 'EPP Habitat 1 et 2', 'Primaire', 'ecohabitat@yahoo.com', 56543423, 62, 'IEP2021adzope'),
('eco36', 'EPP Toumodi Paix', 'Primaire', 'ecotoumodipaix@yahoo.com', 65457678, 66, 'IEP2021toumodi'),
('eco37', 'EPP NANAN', 'Pre-scolaire', 'econanan@yahoo.com', 44545676, 68, 'IEP2021yamoussoukro'),
('eco4', 'EPP Agriculture', 'Primaire', 'eppagriculture@yaahoo.com', 78675645, 29, 'IEP2021plateau'),
('eco5', 'EPP Adjame 220Logements', 'Pre-scolaire', 'ecoadjame220@yahoo.com', 45675487, 42, 'IEP2021plateau'),
('eco6', 'EPP PONT', 'Primaire', 'ecopont@yahoo.com', 89876756, 16, 'IEP2021marcory'),
('eco7', 'EPP GABRIEL DADIE', 'Primaire', 'ecogabrieldadie@yahoo.com', 23432123, 48, 'IEP2021marcory'),
('eco8', 'EPP Avenue 8', 'Pre-scolaire', 'ecoavenue8@yahoo.com', 98786756, 48, 'IEP2021marcory');

-- --------------------------------------------------------

--
-- Structure de la table `enseig_demandeur`
--

CREATE TABLE `enseig_demandeur` (
  `id_ensei_deman` int(1) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `date_deman` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `annee` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseig_demandeur`
--

INSERT INTO `enseig_demandeur` (`id_ensei_deman`, `matricule`, `date_deman`, `annee`) VALUES
(1, '123A', '2021-08-18 10:31:57', 2021),
(2, '123B', '2021-08-19 10:31:57', 2021),
(3, '123C', '2021-08-18 10:31:57', 2021),
(4, '123D', '2021-08-17 10:31:57', 2021),
(5, '123E', '2021-08-17 10:31:57', 2021),
(6, '123H', '2021-08-24 10:31:57', 2021),
(7, '123J', '2021-08-19 10:31:57', 2021),
(8, '123U', '2021-08-20 10:31:57', 2021),
(22, '123', '2021-08-27 23:08:53', 2021),
(23, '456 A', '2021-09-01 22:09:30', 2021),
(24, '456 B', '2021-09-01 22:09:39', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `enseig_favorable`
--

CREATE TABLE `enseig_favorable` (
  `id_ensei_fav` int(11) NOT NULL,
  `matricule` varchar(30) NOT NULL,
  `date_valide` datetime NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `enseig_favorable`
--

INSERT INTO `enseig_favorable` (`id_ensei_fav`, `matricule`, `date_valide`, `annee`) VALUES
(1, '123U', '2021-08-24 11:18:26', 2021),
(2, '123O', '2021-08-24 11:18:26', 2021),
(3, '123Q', '2021-08-24 11:18:26', 2021),
(5, '123Z', '2021-08-24 11:18:26', 2021),
(6, '234B', '2021-08-24 11:18:26', 2021),
(7, '234C', '2021-08-24 11:18:26', 2021),
(8, '234D', '2021-08-24 11:18:26', 2021),
(16, '12', '2021-08-29 02:08:27', 2021),
(17, '123Y', '2021-08-29 02:08:34', 2021);

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE `fonction` (
  `Id_fonct` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `Emploi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fonction`
--

INSERT INTO `fonction` (`Id_fonct`, `nom`, `Emploi`) VALUES
(1, 'INSPECTEUR', 'IO'),
(2, 'INSPECTEUR(e)', 'IA'),
(3, 'CONSEILLER ORIENTATION', 'IO'),
(4, 'CONSEILLER ORIENTATION', 'IA'),
(5, 'DIRECTEUR(e)', 'IO'),
(6, 'DIRECTEUR(e)', 'IA'),
(7, 'Instituteur Ordinaire', 'IO'),
(8, 'Instituteur Adjoint', 'IA'),
(9, 'Educatrice Spécialisée', 'IO'),
(10, 'Educatrice Spécialisée', 'IA');

-- --------------------------------------------------------

--
-- Structure de la table `iep`
--

CREATE TABLE `iep` (
  `Id_iep` varchar(100) NOT NULL,
  `nom_iep` varchar(100) NOT NULL,
  `mail_iep` varchar(100) NOT NULL,
  `contact_iep` int(11) NOT NULL,
  `Id_dren` varchar(50) NOT NULL,
  `Id_localite` int(11) NOT NULL,
  `matricule_respo` varchar(100) DEFAULT NULL,
  `nom_respo` varchar(50) NOT NULL,
  `prenoms_respo` varchar(100) NOT NULL,
  `mails_respo` varchar(100) NOT NULL,
  `tel_respo` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `iep`
--

INSERT INTO `iep` (`Id_iep`, `nom_iep`, `mail_iep`, `contact_iep`, `Id_dren`, `Id_localite`, `matricule_respo`, `nom_respo`, `prenoms_respo`, `mails_respo`, `tel_respo`) VALUES
('IEP2021aboboAvocatier', 'EPP Gendarmerie Abobo', 'eppgendamerieabobo@yahoo.com', 21564587, 'DREN2021ABIDJAN4', 40, 'A12', 'SATTIE', 'Eliakim medare', 'sattieeliakim@gmail.com', 44656789),
('IEP2021aboboBanco', 'EPP Le Banco Japonnais', 'eppbancojaponnais@yahoo.com', 212134454, 'DREN2021ABIDJAN4', 41, 'A13', 'KONE', 'Kafinin salimata', 'konesalimata@gmail.com', 77875645),
('IEP2021aboboPlateauDokui', 'EPP Plateau bDokui BAD', 'eppdokuibad@yahoo.com', 21236567, 'DREN2021ABIDJAN4', 39, 'A14', 'GUIRIEKPE', 'JOSUE', 'guiriekpe@uvci.edu.ci', 75758496),
('IEP2021aboisso', 'EPP BAD Bois Blanc  ', 'eppbadboisblanc@yahoo.com', 22212324, 'DREN2021ABOISSO', 60, 'A30', 'VANIE', 'Bi tra bertin', 'vaniebitra@gmail.com', 45657687),
('IEP2021adjame', 'EPP Adjame 220 Logements', 'eppadjame220@yahoo.com', 22212223, 'DREN2021ABIDJAN1', 41, 'A05', 'KONAN', 'Celine espe AKA', 'konanceline@yahoo.com', 56567687),
('IEP2021adzope', 'EPP  HABITAT 1 et 2', 'epphabitat@yahoo.com', 45656787, 'DREN2021ADZOPE', 62, 'A32', 'GUIRIEKPE', 'HENRIETTE Epse AKHACK', 'guiriekpehenriette@gmail.com', 5535972),
('IEP2021bingerville', 'EPP Agriculture', 'eppagriculture@yahoo.com', 23345456, 'DREN2021ABIDJAN1', 29, 'A03', 'TANGUY', 'alphonse', 'tanguyalphonse@yahoo.com', 56542312),
('IEP2021bondoukou', 'EPP Municipalite de bondoukou', 'eppmunicipalitebondoukou@yahoo.com', 21232425, 'DREN2021BONDOUKOU', 59, 'A29', 'SATTIE', 'donacien ', 'sattiedonacien@gmail.com', 75755645),
('IEP2021bonoua', 'EPP Obrou Kouassi', 'eppobroukouassi@yaho.com', 21234354, 'DREN2021GRANDBASSAM', 53, 'A22', 'MIEZAN', 'Herman', 'miezanherman@gmail.com', 9786756),
('IEP2021bouake1', 'EPP Gonfreville', 'eppgonfreville@gmail.com', 21234354, 'DREN2021BOUAKE', 35, 'A20', 'GUIRIEKPE', 'Anderson', 'guiriekpeanderson@gmail.com', 56453423),
('IEP2021bouakeAirFrance', 'EPP Bouake Air France', 'eppbouakeairfrance@gmail.com', 21324345, 'DREN2021BOUAKE', 64, 'A21', 'ATTE', 'OLIA VALERINE', 'olia@gmail.com', 67567898),
('IEP2021cocody', 'EPP Château cocody', 'eppchateaucocody@yahoo.com', 21324565, 'DREN2021ABIDJAN1', 23, 'A02', 'BLEDOU', 'maguerite justine', 'justinebledou@gmail.com', 45453768),
('IEP2021ferkeDiwala', 'EPP Walia', 'eppwalia@yahoo.com', 21218978, 'DREN2021FERKE', 4, 'A17', 'KONATE', 'AISSATA EDWIGE Epse Bamba', 'konateaissata@gmail.com', 45654534),
('IEP2021ferkeDouanes', 'EPP Nouhon Diallo', 'eppnouhondiallo@yahoo.com', 22234567, 'DREN2021FERKE', 3, 'A15', 'SORY', 'Ali Ahmed', 'soryahmed@gmail.com', 67564534),
('IEP2021ferkeKouara', 'EPP Laleraba', 'epplaleraba@yahoo.com', 22216756, 'DREN2021FERKE', 6, 'A16', 'KANATE', 'Diallo sory', 'kanatesory@gmail.com', 89786756),
('IEP2021fresco', 'EPP Kani 1', 'eppkani@yahoo.com', 21232435, 'DREN2021FRESCO', 57, 'A27', 'ASSOUMAN', 'Fabrice', 'assoumanfabrice@gmail.com', 45342321),
('IEP2021katiola', 'EPP Fronan', 'eppfronan@yahoo.com', 21212134, 'DREN2021KATIOLA', 54, 'A23', 'KEKE', 'ALAIN ALBERT', 'kekelabert@gmail.com', 45456576),
('IEP2021korhogoMbengue', 'EPP Lougnouble', 'epplougnouble@yahoo.com', 21287867, 'DREN2021KORHOGO', 10, 'A18', 'BOLY', 'Bi cedric kader', 'bolybi@gmail.com', 78786756),
('IEP2021korhogoNord', 'EPP Gbonzoro', 'eppgbonzoro@yahoo.com', 21765645, 'DREN2021KORHOGO', 11, 'A19', 'TRAORE', 'SALIFOU', 'traoresalifou@gmail.com', 45432312),
('IEP2021koumassi', 'EPP Lagunes de Koumassi', 'epplaguneskoumassi@yahoo.com', 22342134, 'DREN2021ABIDJAN2', 26, 'A08', 'PARLE', 'Bazile', 'parlebasile@gmail.com', 56879878),
('IEP2021man', 'EPP MAN Libreville', 'eppmanlibreville@yahoo.com', 56475423, 'DREN2021MAN', 56, 'A26', 'BILL', 'Ewane theodore', 'billewane@gmail.com', 56454323),
('IEP2021mankono', 'EPP Mankono 1', 'eppmankono@yahoo.com', 21265765, 'DREN2021MANKONO', 58, 'A28', 'DODO', 'Eliane epse Botty', 'dodoeliane@gmail.com', 67654534),
('IEP2021marcory', 'EPP GABRIEL DADIE', 'eppgabrieldadie@yahoo.com', 21897867, 'DREN2021ABIDJAN2', 48, 'A07', 'KADJO', 'Adeline espe MONSIA', 'kadjoadeline@gmail.com', 78675645),
('IEP2021plateau', 'EPP Pilote', 'epppilote@gmail.com', 21234565, 'DREN2021ABIDJAN1', 20, 'A01', 'Koffi', 'Cesar alex', 'kofficesar@gmail.com', 67453423),
('IEP2021soubre', 'EPP SOUBRE', 'eppsoubre@yahoo.com', 21212121, 'DREN2021SOUBRE', 61, 'A31', 'SERY', 'Anicet constant', 'seryanicet@gmail.com', 45434565),
('IEP2021tafire', 'EPP Krouroukouman', 'eppkrouroukouman@yahoo.com', 21234567, 'DREN2021TAFIRE', 55, 'A24', 'GUEDE', 'Apolinaire', 'guedeapo@gmail.com', 45654534),
('IEP2021toumodi', 'EPP Toumodi Paix', 'epptoumodipaix@yahoo.com', 34321223, 'DREN2021TOUMODI', 66, 'A33', 'GUIGBE', 'Rodriguaise yan', 'guigberodrigue@gmail.com', 898767),
('IEP2021treichville', 'EPP PONT', 'epppont@yahoo.com', 21786756, 'DREN2021ABIDJAN2', 16, 'A06', 'BIOLE', 'Assamoi rodrigue', 'bioleassamoi@yahoo.com', 67564534),
('IEP2021yamoussoukro', 'EPP NANAN', 'eppnanan@yahoo.com', 34322123, 'DREN2021YAMOUSSOUKRO', 68, 'A34', 'AZIER', 'Benedicte yowle', 'azierbenedicte@gmail.com', 45456576),
('IEP2021yopougonGesco', 'EPP BAD GESCO', 'eppbadgesco@yahoo.com', 21985645, 'DREN2021ABIDJAN3', 51, 'A09', 'OUATTARA', 'Kounapettri', 'kounapetri@gmail.com', 76754534),
('IEP2021yopougonNiangon', 'EPP BAD Niangin Nord', 'badniangon@yahoo.com', 21343676, 'DREN2021ABIDJAN3', 15, 'A10', 'SERY', 'Digbeu', 'serydigbeu@gmail.com', 56457867),
('IEP2021yopougonToitRouge', 'EPP SIPOREX 4', 'eppsiporex@yahoo.com', 21233454, 'DREN2021ABIDJAN3', 13, 'A11', 'ATSE', 'KIEKIE RODRIGUE', 'atsekiekie@gmail.com', 88765645);

-- --------------------------------------------------------

--
-- Structure de la table `localite`
--

CREATE TABLE `localite` (
  `Id_localite` int(11) NOT NULL,
  `nom_localite` varchar(100) NOT NULL,
  `Chef_Lieux` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `localite`
--

INSERT INTO `localite` (`Id_localite`, `nom_localite`, `Chef_Lieux`) VALUES
(1, 'Ferke-Kouara', 'Ferkessedougou '),
(2, 'Ferke-Nielle Toumoukoro', 'Ferkessedougou'),
(3, 'Ferke-Douane', 'Ferkessedougou '),
(4, 'Ferke-Diawala', 'Ferkessedougou '),
(5, 'Ferke-Kong Nafolo-sokolo', 'Ferkessedougou'),
(6, 'Ferke-Koumbala', 'Ferkessédougou '),
(7, 'Ferke-Sokoro', 'Ferkessedougou '),
(8, 'Ferke-Zindel', 'Ferkessédougou '),
(9, 'Ferke-Sokoro', 'Ferkessedougou '),
(10, 'Korhogo-Mbengue', 'Korhogo'),
(11, 'Korhogo-nord', 'Korhogo'),
(12, 'Korhogo-centre', 'Korhogo'),
(13, 'Yopougnon Toit rouge', 'Abidjan'),
(14, 'Yopougnon Niangnon Sud', 'Abidjan'),
(15, 'Yopougnon Niangon Nord', 'Abidjan'),
(16, 'Treicheville Zone 4', 'Abidjan'),
(17, 'Treicheville Zone 1', 'Abidjan'),
(18, 'Treicheville Zone 2', 'Abidjan'),
(19, 'Treicheville Zone 3', 'Abidjan'),
(20, ' Plateau Zone 1', 'Abidjan'),
(21, ' Plateau Zone 2', 'Abidjan'),
(22, ' Plateau Zone 3', 'Abidjan'),
(23, ' Cocody Zone 1', 'Abidjan'),
(24, ' Cocody Zone 2', 'Abidjan'),
(25, ' Cocody Zone 3', 'Abidjan'),
(26, ' Koumassi Zone 1', 'Abidjan'),
(27, ' Koumassi Zone 2', 'Abidjan'),
(28, ' Koumassi Zone 3', 'Abidjan'),
(29, ' Bingerville Zone 1', 'Abidjan'),
(30, ' Bingerville Zone 2', 'Abidjan'),
(31, ' Bingerville Zone 3', 'Abidjan'),
(34, ' Bingerville Zone 4', 'Abidjan'),
(35, 'Bouake Zone 1', 'Bouake'),
(36, 'Bouake Zone 2', 'Bouake'),
(37, 'Bouake Zone 1', 'Bouake'),
(38, 'Bouake Zone 1', 'Bouake'),
(39, 'Abobo_Plateau-Dokui', 'Abidjan'),
(40, 'Abobo_Avocatier', 'Abidjan '),
(41, 'Abobo Banco', 'Abidjan'),
(42, 'Adjame zone 1', 'Abidjan '),
(43, 'Adjame zone 2', 'Abidjan '),
(44, 'Adjame zone 1', 'Abidjan '),
(45, 'Cocody Blockhauss', 'Abidjan'),
(46, 'Koumassi_Sicogi', 'Abidjan '),
(47, 'Cocody Attoban', 'Abidjan'),
(48, 'Marcory', 'Abidjan '),
(49, 'Yopougon Siporex', 'Abidjan'),
(50, 'Koumassi Promodo', 'Abidjan '),
(51, 'Yopougon_Gesco', 'Abidjan'),
(52, 'Abobo_Pk18', 'Abidjan '),
(53, 'Bonoua', 'GRAND_BASSAM'),
(54, 'Dabakala ', 'KATIOLA'),
(55, 'Tafiré zone 1', 'TAFIRE'),
(56, 'Biankouman', 'Man'),
(57, 'Kani', 'FRESCO'),
(58, 'Dianra', 'Mankono'),
(59, 'Kun_Fao', 'BONDOUKOU'),
(60, 'Adiake', 'Aboisso'),
(61, 'Méagui', 'SOUBRE'),
(62, 'Alépé', 'ADZOPE'),
(63, 'Djébonoua', 'BOUAKE'),
(64, 'Bouake_AIR_France', 'BOUAKE'),
(65, 'Tiébissou', 'YAMOUSSOUKRO'),
(66, 'Toumodi zone 1', 'Toumodi'),
(67, 'Toumodi zone 2', 'Toumodi'),
(68, 'YAMOUSSSOUKRO zone 1', 'YAMOUSSSOUKRO'),
(69, 'YAMOUSSSOUKRO zone 2', 'YAMOUSSSOUKRO'),
(70, 'YAMOUSSSOUKRO zone 3', 'YAMOUSSSOUKRO');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE `personnel` (
  `matricule` varchar(30) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenoms` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `telephone` int(11) NOT NULL,
  `date_pri_serv` date NOT NULL,
  `Id_iep` varchar(100) NOT NULL,
  `Id_fonct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `personnel`
--

INSERT INTO `personnel` (`matricule`, `nom`, `prenoms`, `mail`, `telephone`, `date_pri_serv`, `Id_iep`, `Id_fonct`) VALUES
('12', 'SILUE', 'DAVID', 'david@gmail.com', 1020909, '2011-09-12', 'IEP2021soubre', 7),
('123', 'KONE', 'ALI', 'razack@uvci.edu.ci', 78765645, '2020-08-19', 'IEP2021plateau', 1),
('123A', 'OUATTARA', 'Kounapetri Aboulaye ', 'kounapetri.aboulaye@uvci.edu.ci', 747963654, '2019-08-23', 'IEP2021plateau', 1),
('123B', 'GUIRIEKPE', 'Josue', 'josue.guiriepke@uvci.edu.ci', 75758496, '2019-08-20', 'IEP2021katiola', 3),
('123C', 'KONATE', 'Aissata', 'aissata.konate@uvci.edu.ci', 45456556, '2020-08-20', 'IEP2021bouakeAirFrance', 7),
('123D', 'SANOGO', 'Sory', 'sory.sanogo@uvci.edu.ci', 65475687, '2018-08-19', 'IEP2021bondoukou', 5),
('123E', 'TRAORE', 'Bamoussa', 'bamoussa.traore@uvci.edu.ci', 78765645, '2019-08-17', 'IEP2021ferkeDouanes', 7),
('123F', 'AKA', 'Caleb', 'calebaka@gmail.com', 56543432, '2019-08-20', 'IEP2021aboboAvocatier', 1),
('123G', 'GOULEI', 'Brice', 'bricegoulei@gmail.com', 56543432, '2017-02-12', 'IEP2021aboboAvocatier', 5),
('123H', 'KAKOU', 'Maurice', 'mauricekakou@gmail.com', 67654534, '2019-04-12', 'IEP2021yamoussoukro', 7),
('123I', 'OUATTARA', 'Moussa', 'moussaouattara@gmail.com', 67876545, '2019-09-09', 'IEP2021aboboAvocatier', 7),
('123J', 'TANOH', 'Celestine', 'celestinetanoh@gmail.com', 676545423, '2020-03-12', 'IEP2021toumodi', 9),
('123K', 'SORY', 'Mohamed', 'mohamedsory@gmail.com', 67654534, '2019-03-24', 'IEP2021aboboBanco', 5),
('123L', 'ADINGRA', 'Carine espe YEO', 'carineadingra@gmail.com', 78676534, '2019-04-12', 'IEP2021aboboBanco', 7),
('123M', 'YEO', 'Coulibay', 'coulibalyyeo@gmail.com', 78765643, '2019-03-25', 'IEP2021aboboBanco', 8),
('123N', 'KOLEA', 'Yapeu jean', 'jeanyapeu@gmail.com', 78765634, '2018-05-05', 'IEP2021korhogoNord', 5),
('123O', 'BAMBA', 'Salif abib', 'salifabib@gmail.com', 87675645, '2019-12-03', 'IEP2021man', 7),
('123P', 'KOFFI', 'Alphonse', 'alphonsekoffi@gmail.com', 87675645, '2020-01-05', 'IEP2021aboboPlateauDokui', 7),
('123Q', 'KRA', 'Jacqueline nadine', 'nadinekra@gmail.com', 67654534, '2019-01-30', 'IEP2021koumassi', 7),
('123R', 'GOGUOA', 'George', 'georgegoguoa@gmail.com', 45456567, '2019-01-31', 'IEP2021aboboPlateauDokui', 8),
('123S', 'SATTIE', 'Eliane brigitte', 'elianesattie@gmail.com', 67546534, '2010-09-12', 'IEP2021aboboPlateauDokui', 10),
('123U', 'DADIE', 'Uberson jean', 'ubersonjean@gmail.', 67654534, '2019-03-02', 'IEP2021aboisso', 1),
('123V', 'VANIE', 'Bi Elisé', 'bielise@gmail.com', 90987867, '2018-01-12', 'IEP2021aboisso', 6),
('123W', 'WANDJA', 'Corine espe Sanogo', 'corinewandja@gmail.com', 56547687, '2017-09-24', 'IEP2021aboisso', 9),
('123Y', 'YEO', 'Fabrice tchenin', 'tcheninfabrice@gmail.com', 76564523, '2019-04-24', 'IEP2021soubre', 1),
('123Z', 'ZAMBLE', 'Felix', 'felixzamble@gmail.com', 65453432, '2020-08-30', 'IEP2021yopougonGesco', 3),
('234A', 'GUIRIEKPE', 'HENRIETTE', 'henrietteguiri@gmail.com', 5067645, '2016-09-04', 'IEP2021adjame', 3),
('234B', 'KPAN', 'Julien', 'julienkpan@gmail.com', 45454323, '2020-08-16', 'IEP2021fresco', 1),
('234C', 'ABOTSI', 'Kouessi marc', 'marcabotsi@gmail/com', 78765645, '2017-08-03', 'IEP2021mankono', 7),
('234D', 'MALAN', 'assiniou ROSINE', 'assinoumaurice@gmail.com', 56543222, '2016-08-11', 'IEP2021adzope', 9),
('456 A', 'COULIBALY', 'MASSA ABDOUL', 'abdoul@gmail.com', 103030405, '2015-09-15', 'IEP2021soubre', 7),
('456 B', 'YEO', 'MARTIN', 'martin.yeo@gmail.com', 103030405, '2015-09-15', 'IEP2021soubre', 7);

-- --------------------------------------------------------

--
-- Structure de la table `statut`
--

CREATE TABLE `statut` (
  `Id_Statut` int(11) NOT NULL,
  `annee` year(4) NOT NULL,
  `statut` enum('Désactiver','Activer') NOT NULL DEFAULT 'Désactiver',
  `debut_ensei` date DEFAULT current_timestamp(),
  `fin_ensei` date DEFAULT current_timestamp(),
  `debut_iep` date DEFAULT current_timestamp(),
  `fin_iep` date DEFAULT current_timestamp(),
  `debut_dren` date DEFAULT current_timestamp(),
  `fin_dren` date DEFAULT current_timestamp(),
  `debut_drh` date DEFAULT current_timestamp(),
  `fin_drh` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `statut`
--

INSERT INTO `statut` (`Id_Statut`, `annee`, `statut`, `debut_ensei`, `fin_ensei`, `debut_iep`, `fin_iep`, `debut_dren`, `fin_dren`, `debut_drh`, `fin_drh`) VALUES
(4, 2021, 'Activer', '2021-08-01', '2021-09-30', '2021-08-20', '2021-10-01', '2021-08-01', '2021-10-25', '2021-08-27', '2021-10-30');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `administrateur`
--
ALTER TABLE `administrateur`
  ADD PRIMARY KEY (`matricule`);

--
-- Index pour la table `avis_permutat`
--
ALTER TABLE `avis_permutat`
  ADD PRIMARY KEY (`Id_permut`) USING BTREE,
  ADD KEY `matricule` (`matricule`) USING BTREE;

--
-- Index pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD PRIMARY KEY (`id_dossier`),
  ADD KEY `Id_Statut` (`Id_Statut`),
  ADD KEY `Id_drh` (`Id_drh`);

--
-- Index pour la table `dossier_deman`
--
ALTER TABLE `dossier_deman`
  ADD PRIMARY KEY (`Id_DosDem`),
  ADD KEY `Id_iep` (`Id_iep`),
  ADD KEY `Id_dren` (`Id_dren`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `id_ensei_deman` (`id_ensei_deman`),
  ADD KEY `id_dossier` (`id_dossier`);

--
-- Index pour la table `dossier_fav`
--
ALTER TABLE `dossier_fav`
  ADD PRIMARY KEY (`Id_DosFav`),
  ADD KEY `Id_iep` (`Id_iep`),
  ADD KEY `Id_dren` (`Id_dren`),
  ADD KEY `id_ensei_fav` (`id_ensei_fav`),
  ADD KEY `matricule` (`matricule`),
  ADD KEY `id_dossier` (`id_dossier`);

--
-- Index pour la table `dren`
--
ALTER TABLE `dren`
  ADD PRIMARY KEY (`Id_dren`),
  ADD KEY `Id_drh` (`Id_drh`),
  ADD KEY `Id_localite` (`Id_localite`);

--
-- Index pour la table `drh_men`
--
ALTER TABLE `drh_men`
  ADD PRIMARY KEY (`Id_drh`),
  ADD KEY `Id_localite` (`Id_localite`);

--
-- Index pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD PRIMARY KEY (`Id_ecole`),
  ADD KEY `Id_localite` (`Id_localite`),
  ADD KEY `Id_iep` (`Id_iep`);

--
-- Index pour la table `enseig_demandeur`
--
ALTER TABLE `enseig_demandeur`
  ADD PRIMARY KEY (`id_ensei_deman`),
  ADD KEY `enseig_demandeur_ibfk_1` (`matricule`);

--
-- Index pour la table `enseig_favorable`
--
ALTER TABLE `enseig_favorable`
  ADD PRIMARY KEY (`id_ensei_fav`),
  ADD KEY `enseig_favorable_ibfk_1` (`matricule`);

--
-- Index pour la table `fonction`
--
ALTER TABLE `fonction`
  ADD PRIMARY KEY (`Id_fonct`);

--
-- Index pour la table `iep`
--
ALTER TABLE `iep`
  ADD PRIMARY KEY (`Id_iep`),
  ADD KEY `Id_dren` (`Id_dren`),
  ADD KEY `Id_localite` (`Id_localite`);

--
-- Index pour la table `localite`
--
ALTER TABLE `localite`
  ADD PRIMARY KEY (`Id_localite`);

--
-- Index pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`matricule`),
  ADD KEY `Id_iep` (`Id_iep`),
  ADD KEY `Id_fonct` (`Id_fonct`);

--
-- Index pour la table `statut`
--
ALTER TABLE `statut`
  ADD PRIMARY KEY (`Id_Statut`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `avis_permutat`
--
ALTER TABLE `avis_permutat`
  MODIFY `Id_permut` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `dossier_fav`
--
ALTER TABLE `dossier_fav`
  MODIFY `Id_DosFav` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `enseig_demandeur`
--
ALTER TABLE `enseig_demandeur`
  MODIFY `id_ensei_deman` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `enseig_favorable`
--
ALTER TABLE `enseig_favorable`
  MODIFY `id_ensei_fav` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `fonction`
--
ALTER TABLE `fonction`
  MODIFY `Id_fonct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `localite`
--
ALTER TABLE `localite`
  MODIFY `Id_localite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT pour la table `statut`
--
ALTER TABLE `statut`
  MODIFY `Id_Statut` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `avis_permutat`
--
ALTER TABLE `avis_permutat`
  ADD CONSTRAINT `avis_permutat_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `personnel` (`matricule`);

--
-- Contraintes pour la table `dossier`
--
ALTER TABLE `dossier`
  ADD CONSTRAINT `dossier_ibfk_1` FOREIGN KEY (`Id_Statut`) REFERENCES `statut` (`Id_Statut`),
  ADD CONSTRAINT `dossier_ibfk_2` FOREIGN KEY (`Id_drh`) REFERENCES `drh_men` (`Id_drh`);

--
-- Contraintes pour la table `dossier_deman`
--
ALTER TABLE `dossier_deman`
  ADD CONSTRAINT `dossier_deman_ibfk_1` FOREIGN KEY (`Id_iep`) REFERENCES `iep` (`Id_iep`),
  ADD CONSTRAINT `dossier_deman_ibfk_2` FOREIGN KEY (`Id_dren`) REFERENCES `dren` (`Id_dren`),
  ADD CONSTRAINT `dossier_deman_ibfk_3` FOREIGN KEY (`id_ensei_deman`) REFERENCES `enseig_demandeur` (`id_ensei_deman`),
  ADD CONSTRAINT `dossier_deman_ibfk_4` FOREIGN KEY (`matricule`) REFERENCES `personnel` (`matricule`),
  ADD CONSTRAINT `dossier_deman_ibfk_5` FOREIGN KEY (`id_dossier`) REFERENCES `dossier` (`id_dossier`);

--
-- Contraintes pour la table `dossier_fav`
--
ALTER TABLE `dossier_fav`
  ADD CONSTRAINT `dossier_fav_ibfk_1` FOREIGN KEY (`Id_iep`) REFERENCES `iep` (`Id_iep`),
  ADD CONSTRAINT `dossier_fav_ibfk_2` FOREIGN KEY (`Id_dren`) REFERENCES `dren` (`Id_dren`),
  ADD CONSTRAINT `dossier_fav_ibfk_3` FOREIGN KEY (`id_ensei_fav`) REFERENCES `enseig_favorable` (`id_ensei_fav`),
  ADD CONSTRAINT `dossier_fav_ibfk_4` FOREIGN KEY (`matricule`) REFERENCES `personnel` (`matricule`),
  ADD CONSTRAINT `dossier_fav_ibfk_5` FOREIGN KEY (`id_dossier`) REFERENCES `dossier` (`id_dossier`);

--
-- Contraintes pour la table `dren`
--
ALTER TABLE `dren`
  ADD CONSTRAINT `dren_ibfk_1` FOREIGN KEY (`Id_drh`) REFERENCES `drh_men` (`Id_drh`),
  ADD CONSTRAINT `dren_ibfk_2` FOREIGN KEY (`Id_localite`) REFERENCES `localite` (`Id_localite`);

--
-- Contraintes pour la table `drh_men`
--
ALTER TABLE `drh_men`
  ADD CONSTRAINT `drh_men_ibfk_1` FOREIGN KEY (`Id_localite`) REFERENCES `localite` (`Id_localite`);

--
-- Contraintes pour la table `ecole`
--
ALTER TABLE `ecole`
  ADD CONSTRAINT `ecole_ibfk_1` FOREIGN KEY (`Id_localite`) REFERENCES `localite` (`Id_localite`),
  ADD CONSTRAINT `ecole_ibfk_2` FOREIGN KEY (`Id_iep`) REFERENCES `iep` (`Id_iep`);

--
-- Contraintes pour la table `enseig_demandeur`
--
ALTER TABLE `enseig_demandeur`
  ADD CONSTRAINT `enseig_demandeur_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `personnel` (`matricule`);

--
-- Contraintes pour la table `enseig_favorable`
--
ALTER TABLE `enseig_favorable`
  ADD CONSTRAINT `enseig_favorable_ibfk_1` FOREIGN KEY (`matricule`) REFERENCES `personnel` (`matricule`);

--
-- Contraintes pour la table `iep`
--
ALTER TABLE `iep`
  ADD CONSTRAINT `iep_ibfk_1` FOREIGN KEY (`Id_dren`) REFERENCES `dren` (`Id_dren`),
  ADD CONSTRAINT `iep_ibfk_2` FOREIGN KEY (`Id_localite`) REFERENCES `localite` (`Id_localite`);

--
-- Contraintes pour la table `personnel`
--
ALTER TABLE `personnel`
  ADD CONSTRAINT `personnel_ibfk_1` FOREIGN KEY (`Id_iep`) REFERENCES `iep` (`Id_iep`),
  ADD CONSTRAINT `personnel_ibfk_2` FOREIGN KEY (`Id_fonct`) REFERENCES `fonction` (`Id_fonct`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
