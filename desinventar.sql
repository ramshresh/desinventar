-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 06:56 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desinventar`
--
CREATE DATABASE IF NOT EXISTS `desinventar` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `desinventar`;

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('datacard-admin', '2', 1516789939),
('datacard-admin', '9', 1516790041),
('datacard-enumerator', '3', 1516789951),
('datacard-enumerator', '4', 1516789967),
('datacard-enumerator', '5', 1516789982),
('datacard-enumerator', '8', 1516790028),
('datacard-genericUser', '6', 1516790003),
('datacard-moderator', '10', 1516821335);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('create-datacard', 2, '', NULL, NULL, 1516789574, 1516789574),
('datacard-admin', 1, '', NULL, NULL, 1516789888, 1516829193),
('datacard-enumerator', 1, '', NULL, NULL, 1516789821, 1516835455),
('datacard-genericUser', 1, '', NULL, NULL, 1516789766, 1516793784),
('datacard-moderator', 1, '', NULL, NULL, 1516821241, 1516831220),
('delete-datacard', 2, '', NULL, NULL, 1516789625, 1516789625),
('delete-own', 2, '', 'isOwner', NULL, 1516793734, 1516793734),
('delete-ownUnlocked', 2, '', 'isOwnerAndUnlocked', NULL, 1516832880, 1516832957),
('delete-unlocked', 2, '', 'isUnlocked', NULL, 1516830202, 1516830202),
('download-datacard', 2, '', NULL, NULL, 1516789633, 1516789633),
('list-datacard', 2, '', NULL, NULL, 1516789585, 1516789585),
('lock-datacard', 2, '', NULL, NULL, 1516828802, 1516828802),
('manage-datacard', 2, '', NULL, NULL, 1516789660, 1516829268),
('update-datacard', 2, '', NULL, NULL, 1516789540, 1516790922),
('update-own', 2, '', 'isOwner', NULL, 1516789518, 1516791411),
('update-ownUnlocked', 2, '', 'isOwnerAndUnlocked', NULL, 1516832855, 1516832978),
('update-unlocked', 2, '', 'isUnlocked', NULL, 1516830175, 1516830175),
('view-datacard', 2, '', NULL, NULL, 1516789602, 1516789602);

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('datacard-admin', 'create-datacard'),
('datacard-admin', 'delete-datacard'),
('datacard-admin', 'download-datacard'),
('datacard-admin', 'list-datacard'),
('datacard-admin', 'lock-datacard'),
('datacard-admin', 'manage-datacard'),
('datacard-admin', 'update-datacard'),
('datacard-admin', 'view-datacard'),
('datacard-enumerator', 'create-datacard'),
('datacard-enumerator', 'delete-ownUnlocked'),
('datacard-enumerator', 'download-datacard'),
('datacard-enumerator', 'list-datacard'),
('datacard-enumerator', 'manage-datacard'),
('datacard-enumerator', 'update-ownUnlocked'),
('datacard-enumerator', 'view-datacard'),
('datacard-genericUser', 'download-datacard'),
('datacard-genericUser', 'list-datacard'),
('datacard-genericUser', 'view-datacard'),
('datacard-moderator', 'delete-unlocked'),
('datacard-moderator', 'download-datacard'),
('datacard-moderator', 'list-datacard'),
('datacard-moderator', 'manage-datacard'),
('datacard-moderator', 'update-unlocked'),
('datacard-moderator', 'view-datacard'),
('delete-own', 'delete-datacard'),
('delete-ownUnlocked', 'delete-datacard'),
('delete-unlocked', 'delete-datacard'),
('update-own', 'update-datacard'),
('update-ownUnlocked', 'update-datacard'),
('update-unlocked', 'update-datacard');

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `auth_rule`
--

INSERT INTO `auth_rule` (`name`, `data`, `created_at`, `updated_at`) VALUES
('isOwner', 0x4f3a32393a226170705c636f6d706f6e656e74735c726261635c4f776e657252756c65223a333a7b733a343a226e616d65223b733a373a2269734f776e6572223b733a393a22637265617465644174223b693a313531363738393438303b733a393a22757064617465644174223b693a313531363738393438303b7d, 1516789480, 1516789480),
('isOwnerAndUnlocked', 0x4f3a34303a226170705c636f6d706f6e656e74735c726261635c4f776e6572416e64556e6c6f636b656452756c65223a333a7b733a343a226e616d65223b733a31383a2269734f776e6572416e64556e6c6f636b6564223b733a393a22637265617465644174223b693a313531363833323733383b733a393a22757064617465644174223b693a313531363833323733383b7d, 1516832738, 1516832738),
('isUnlocked', 0x4f3a33323a226170705c636f6d706f6e656e74735c726261635c556e6c6f636b656452756c65223a333a7b733a343a226e616d65223b733a31303a226973556e6c6f636b6564223b733a393a22637265617465644174223b693a313531363833303131363b733a393a22757064617465644174223b693a313531363833303131363b7d, 1516830116, 1516830116);

-- --------------------------------------------------------

--
-- Table structure for table `datacards`
--

DROP TABLE IF EXISTS `datacards`;
CREATE TABLE `datacards` (
  `id` int(11) NOT NULL,
  `data_card_no` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `event_magnitude` varchar(255) DEFAULT NULL,
  `event_centre` varchar(255) DEFAULT NULL,
  `event_cause` varchar(255) NOT NULL,
  `event_description` text,
  `event_duration` varchar(255) DEFAULT NULL,
  `location_state` varchar(255) DEFAULT NULL,
  `location_district` varchar(255) NOT NULL,
  `location_localbody` varchar(255) NOT NULL,
  `location_wardno` int(11) DEFAULT NULL,
  `location_placename` varchar(255) DEFAULT NULL,
  `location_region` varchar(255) DEFAULT NULL,
  `location_ecology` varchar(255) DEFAULT NULL,
  `effect_people_dead_m` int(11) DEFAULT NULL,
  `effect_people_dead_f` int(11) DEFAULT NULL,
  `effect_people_dead_t` int(11) DEFAULT NULL,
  `effect_people_injured_m` int(11) DEFAULT NULL,
  `effect_people_injured_f` int(11) DEFAULT NULL,
  `effect_people_injured_t` int(11) DEFAULT NULL,
  `effect_people_missing_m` int(11) DEFAULT NULL,
  `effect_people_missing_f` int(11) DEFAULT NULL,
  `effect_people_missing_t` int(11) DEFAULT NULL,
  `effect_people_affected_m` int(11) DEFAULT NULL,
  `effect_people_affected_f` int(11) DEFAULT NULL,
  `effect_people_affected_t` int(11) DEFAULT NULL,
  `effect_people_rescued_m` int(11) DEFAULT NULL,
  `effect_people_rescued_f` int(11) DEFAULT NULL,
  `effect_people_rescued_t` int(11) DEFAULT NULL,
  `effect_people_relocated_m` int(11) DEFAULT NULL,
  `effect_people_relocated_f` int(11) DEFAULT NULL,
  `effect_people_relocated_t` int(11) DEFAULT NULL,
  `effect_people_relieved_m` int(11) DEFAULT NULL,
  `effect_people_relieved_f` int(11) DEFAULT NULL,
  `effect_people_relieved_t` int(11) DEFAULT NULL,
  `damage_house_building_complete` int(11) DEFAULT NULL,
  `damage_house_building_partial` int(11) DEFAULT NULL,
  `damage_house_building_value` decimal(10,0) DEFAULT NULL,
  `damage_house_shed_complete` int(11) DEFAULT NULL,
  `damage_house_shed_partial` int(11) DEFAULT NULL,
  `damage_house_shed_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_road_type` varchar(255) DEFAULT NULL,
  `damage_infra_road_quantity` int(11) DEFAULT NULL,
  `damage_infra_road_unit` varchar(255) DEFAULT NULL,
  `damage_infra_road_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_bridge_type` varchar(255) DEFAULT NULL,
  `damage_infra_bridge_quantity` int(11) DEFAULT NULL,
  `damage_infra_bridge_unit` varchar(255) DEFAULT NULL,
  `damage_infra_bridge_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_electricity_type` varchar(255) DEFAULT NULL,
  `damage_infra_electricity_quantity` int(11) DEFAULT NULL,
  `damage_infra_electricity_unit` varchar(255) DEFAULT NULL,
  `damage_infra_electricity_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_water_type` varchar(255) DEFAULT NULL,
  `damage_infra_water_quantity` int(11) DEFAULT NULL,
  `damage_infra_water_unit` varchar(255) DEFAULT NULL,
  `damage_infra_water_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_sewage_type` varchar(255) DEFAULT NULL,
  `damage_infra_sewage_quantity` int(11) DEFAULT NULL,
  `damage_infra_sewage_unit` varchar(255) DEFAULT NULL,
  `damage_infra_sewage_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_communication_type` varchar(255) DEFAULT NULL,
  `damage_infra_communication_quantity` int(11) DEFAULT NULL,
  `damage_infra_communication_unit` varchar(255) DEFAULT NULL,
  `damage_infra_communication_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_medical_type` varchar(255) DEFAULT NULL,
  `damage_infra_medical_quantity` int(11) DEFAULT NULL,
  `damage_infra_medical_unit` varchar(255) DEFAULT NULL,
  `damage_infra_medical_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_educational_type` varchar(255) DEFAULT NULL,
  `damage_infra_educational_quantity` int(11) DEFAULT NULL,
  `damage_infra_educational_unit` varchar(255) DEFAULT NULL,
  `damage_infra_educational_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_institutions_type` varchar(255) DEFAULT NULL,
  `damage_infra_institutions_quantity` int(11) DEFAULT NULL,
  `damage_infra_institutions_unit` varchar(255) DEFAULT NULL,
  `damage_infra_institutions_value` decimal(10,0) DEFAULT NULL,
  `damage_infra_industries_type` varchar(255) DEFAULT NULL,
  `damage_infra_industries_quantity` int(11) DEFAULT NULL,
  `damage_infra_industries_unit` varchar(255) DEFAULT NULL,
  `damage_infra_industries_value` decimal(10,0) DEFAULT NULL,
  `total_loss_value_rs` varchar(255) DEFAULT NULL,
  `total_loss_value_usd` varchar(255) DEFAULT NULL,
  `comment` text,
  `metadata_source` text NOT NULL,
  `metadata_source_date` date NOT NULL,
  `metadata_collected_by` varchar(255) NOT NULL,
  `metadata_collected_date` date DEFAULT NULL,
  `metadata_verified_by` varchar(255) DEFAULT NULL,
  `metadata_verified_date` date DEFAULT NULL,
  `effect_loss_land_quantity` int(11) DEFAULT NULL,
  `effect_loss_land_unit` varchar(255) DEFAULT NULL,
  `effect_loss_land_value` decimal(10,0) DEFAULT NULL,
  `effect_loss_agri_quantity` int(11) DEFAULT NULL,
  `effect_loss_agri_unit` varchar(255) DEFAULT NULL,
  `effect_loss_agri_value` decimal(10,0) DEFAULT NULL,
  `effect_loss_livestock_quantity` int(11) DEFAULT NULL,
  `effect_loss_livestock_unit` varchar(255) DEFAULT NULL,
  `effect_loss_livestock_value` decimal(10,0) DEFAULT NULL,
  `created_by` varchar(255) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  `locked_at` datetime DEFAULT NULL,
  `uuid` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datacards`
--

INSERT INTO `datacards` (`id`, `data_card_no`, `event_date`, `event_type`, `event_magnitude`, `event_centre`, `event_cause`, `event_description`, `event_duration`, `location_state`, `location_district`, `location_localbody`, `location_wardno`, `location_placename`, `location_region`, `location_ecology`, `effect_people_dead_m`, `effect_people_dead_f`, `effect_people_dead_t`, `effect_people_injured_m`, `effect_people_injured_f`, `effect_people_injured_t`, `effect_people_missing_m`, `effect_people_missing_f`, `effect_people_missing_t`, `effect_people_affected_m`, `effect_people_affected_f`, `effect_people_affected_t`, `effect_people_rescued_m`, `effect_people_rescued_f`, `effect_people_rescued_t`, `effect_people_relocated_m`, `effect_people_relocated_f`, `effect_people_relocated_t`, `effect_people_relieved_m`, `effect_people_relieved_f`, `effect_people_relieved_t`, `damage_house_building_complete`, `damage_house_building_partial`, `damage_house_building_value`, `damage_house_shed_complete`, `damage_house_shed_partial`, `damage_house_shed_value`, `damage_infra_road_type`, `damage_infra_road_quantity`, `damage_infra_road_unit`, `damage_infra_road_value`, `damage_infra_bridge_type`, `damage_infra_bridge_quantity`, `damage_infra_bridge_unit`, `damage_infra_bridge_value`, `damage_infra_electricity_type`, `damage_infra_electricity_quantity`, `damage_infra_electricity_unit`, `damage_infra_electricity_value`, `damage_infra_water_type`, `damage_infra_water_quantity`, `damage_infra_water_unit`, `damage_infra_water_value`, `damage_infra_sewage_type`, `damage_infra_sewage_quantity`, `damage_infra_sewage_unit`, `damage_infra_sewage_value`, `damage_infra_communication_type`, `damage_infra_communication_quantity`, `damage_infra_communication_unit`, `damage_infra_communication_value`, `damage_infra_medical_type`, `damage_infra_medical_quantity`, `damage_infra_medical_unit`, `damage_infra_medical_value`, `damage_infra_educational_type`, `damage_infra_educational_quantity`, `damage_infra_educational_unit`, `damage_infra_educational_value`, `damage_infra_institutions_type`, `damage_infra_institutions_quantity`, `damage_infra_institutions_unit`, `damage_infra_institutions_value`, `damage_infra_industries_type`, `damage_infra_industries_quantity`, `damage_infra_industries_unit`, `damage_infra_industries_value`, `total_loss_value_rs`, `total_loss_value_usd`, `comment`, `metadata_source`, `metadata_source_date`, `metadata_collected_by`, `metadata_collected_date`, `metadata_verified_by`, `metadata_verified_date`, `effect_loss_land_quantity`, `effect_loss_land_unit`, `effect_loss_land_value`, `effect_loss_agri_quantity`, `effect_loss_agri_unit`, `effect_loss_agri_value`, `effect_loss_livestock_quantity`, `effect_loss_livestock_unit`, `effect_loss_livestock_value`, `created_by`, `updated_by`, `created_at`, `updated_at`, `locked_at`, `uuid`) VALUES
(10, 1111, '2018-01-10', 'accident', '', '', 'flood', '', '', '5', 'BANKE', '57004', NULL, '', 'MidWestern', 'Terai Zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '3', '2018-01-03', '3', '2018-01-18', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, '8', '2', '0000-00-00', '0000-00-00', NULL, NULL),
(12, 2324324, '2018-01-24', 'drought', '', '', 'Design Error', '', '', '7', 'BAITADI', '74004', NULL, '', 'FarWestern', 'Hills Zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', '234', '2018-01-04', '23423', '2018-01-16', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, '3', '3', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', NULL),
(14, 43543545, '2018-01-10', 'biological disaster', '', '', 'flood', 'dp', '', '5', 'ARGHAKHANCHI', '51004', NULL, '', 'Western', 'Hills Zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', 'sadsd', '2018-01-10', 'dsadadd', '2018-01-18', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, '3', '3', '0000-00-00', '0000-00-00', NULL, NULL),
(15, 444, '2018-01-11', 'cold wave', '', '', 'Deforestation', 'dp', '', '5', 'BANKE', '57006', NULL, '', 'MidWestern', 'Terai Zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', 'j', '2018-01-24', 'j', '2018-01-16', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, '3', '3', '0000-00-00', '0000-00-00', '0000-00-00 00:00:00', NULL),
(18, 23243244, '2018-01-16', 'earthquake', '', '', 'Deforestation', '', '', '1', 'BHOJPUR', '10007', NULL, '', 'Eastern', 'Hills Zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', 'd', '2018-01-18', 'd', '2018-01-18', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, '3', '3', '0000-00-00', '0000-00-00', NULL, NULL),
(19, 23243245, '2018-01-16', 'boat capsize', '', '', 'others', '', '', '7', 'BAJHANG', '68007', NULL, '', 'FarWestern', 'Mountains Zone', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', NULL, '', '', '', 'dasd', '2018-01-17', 'asdasd', '2018-01-02', '', NULL, NULL, '', NULL, NULL, '', NULL, NULL, '', NULL, '3', '3', '0000-00-00', '0000-00-00', NULL, '7a91f2df-0ea7-43');

-- --------------------------------------------------------

--
-- Table structure for table `localbodies`
--

DROP TABLE IF EXISTS `localbodies`;
CREATE TABLE `localbodies` (
  `id` int(11) NOT NULL,
  `DDGN` varchar(255) DEFAULT NULL,
  `DCOD` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `local_bodies` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `changed_ga_pa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `localbodies`
--

INSERT INTO `localbodies` (`id`, `DDGN`, `DCOD`, `district`, `local_bodies`, `type`, `state`, `changed_ga_pa`) VALUES
(1, '1001', '1', 'TAPLEJUNG', 'Aathrai Tribeni', 'Gaunpalika', '1', 'Aathrai Tribeni'),
(2, '1002', '1', 'TAPLEJUNG', 'Maiwakhola', 'Gaunpalika', '1', 'Maiwakhola'),
(3, '1003', '1', 'TAPLEJUNG', 'Meringden', 'Gaunpalika', '1', 'Meringden'),
(4, '1004', '1', 'TAPLEJUNG', 'Mikwakhola', 'Gaunpalika', '1', 'Mikwakhola'),
(5, '1005', '1', 'TAPLEJUNG', 'Phaktanglung', 'Gaunpalika', '1', 'Phaktanglung'),
(6, '1006', '1', 'TAPLEJUNG', 'Phungling', 'Nagarpalika', '1', 'Phungling'),
(7, '1007', '1', 'TAPLEJUNG', 'Sidingba', 'Gaunpalika', '1', 'Sidingba'),
(8, '1008', '1', 'TAPLEJUNG', 'Sirijangha', 'Gaunpalika', '1', 'Sirijangha'),
(9, '1009', '1', 'TAPLEJUNG', 'Yangwarak', 'Gaunpalika', '1', 'PathivaraYangwarak'),
(10, '2001', '2', 'PANCHTHAR', 'Falelung', 'Gaunpalika', '1', 'Falelung'),
(11, '2002', '2', 'PANCHTHAR', 'Falgunanda', 'Gaunpalika', '1', 'Falgunanda'),
(12, '2003', '2', 'PANCHTHAR', 'Hilihang', 'Gaunpalika', '1', 'Hilihang'),
(13, '2004', '2', 'PANCHTHAR', 'Kummayak', 'Gaunpalika', '1', 'Kummayak'),
(14, '2005', '2', 'PANCHTHAR', 'Miklajung', 'Gaunpalika', '1', 'Miklajung'),
(15, '2006', '2', 'PANCHTHAR', 'Phidim', 'Nagarpalika', '1', 'Phidim'),
(16, '2007', '2', 'PANCHTHAR', 'Tumbewa', 'Gaunpalika', '1', 'Tumbewa'),
(17, '2008', '2', 'PANCHTHAR', 'Yangwarak', 'Gaunpalika', '1', 'Yangwarak'),
(18, '3001', '3', 'ILAM', 'Chulachuli', 'Gaunpalika', '1', 'Chulachuli'),
(19, '3002', '3', 'ILAM', 'Deumai', 'Nagarpalika', '1', 'Deumai'),
(20, '3003', '3', 'ILAM', 'Fakphokthum', 'Gaunpalika', '1', 'Fakphokthum'),
(21, '3004', '3', 'ILAM', 'Illam', 'Nagarpalika', '1', 'Illam'),
(22, '3005', '3', 'ILAM', 'Mai', 'Nagarpalika', '1', 'Mai'),
(23, '3006', '3', 'ILAM', 'Maijogmai', 'Gaunpalika', '1', 'Maijogmai'),
(24, '3007', '3', 'ILAM', 'Mangsebung', 'Gaunpalika', '1', 'Mangsebung'),
(25, '3008', '3', 'ILAM', 'Rong', 'Gaunpalika', '1', 'Rong'),
(26, '3009', '3', 'ILAM', 'Sandakpur', 'Gaunpalika', '1', 'Sandakpur'),
(27, '3010', '3', 'ILAM', 'Suryodaya', 'Nagarpalika', '1', 'Suryodaya'),
(28, '4001', '4', 'JHAPA', 'Arjundhara', 'Nagarpalika', '1', 'Arjundhara'),
(29, '4002', '4', 'JHAPA', 'Barhadashi', 'Gaunpalika', '1', 'Barhadashi'),
(30, '4003', '4', 'JHAPA', 'Bhadrapur', 'Nagarpalika', '1', 'Bhadrapur'),
(31, '4004', '4', 'JHAPA', 'Birtamod', 'Nagarpalika', '1', 'Birtamod'),
(32, '4005', '4', 'JHAPA', 'Buddhashanti', 'Gaunpalika', '1', 'Buddhashanti'),
(33, '4006', '4', 'JHAPA', 'Damak', 'Nagarpalika', '1', 'Damak'),
(34, '4007', '4', 'JHAPA', 'Gauradhaha', 'Nagarpalika', '1', 'Gauradhaha'),
(35, '4008', '4', 'JHAPA', 'Gauriganj', 'Gaunpalika', '1', 'Gauriganj'),
(36, '4009', '4', 'JHAPA', 'Haldibari', 'Gaunpalika', '1', 'Haldibari'),
(37, '4010', '4', 'JHAPA', 'Jhapa', 'Gaunpalika', '1', 'Jhapa'),
(38, '4011', '4', 'JHAPA', 'Kachankawal', 'Gaunpalika', '1', 'Kachankawal'),
(39, '4012', '4', 'JHAPA', 'Kamal', 'Gaunpalika', '1', 'Kamal'),
(40, '4013', '4', 'JHAPA', 'Kankai', 'Nagarpalika', '1', 'Kankai'),
(41, '4014', '4', 'JHAPA', 'Mechinagar', 'Nagarpalika', '1', 'Mechinagar'),
(42, '4015', '4', 'JHAPA', 'Shivasataxi', 'Nagarpalika', '1', 'Shivasataxi'),
(43, '5001', '5', 'MORANG', 'Belbari', 'Nagarpalika', '1', 'Belbari'),
(44, '5002', '5', 'MORANG', 'Biratnagar', 'Mahanagarpalika', '1', 'Biratnagar'),
(45, '5003', '5', 'MORANG', 'Budhiganga', 'Gaunpalika', '1', 'Budhiganga'),
(46, '5004', '5', 'MORANG', 'Dhanpalthan', 'Gaunpalika', '1', 'Dhanpalthan'),
(47, '5005', '5', 'MORANG', 'Gramthan', 'Gaunpalika', '1', 'Gramthan'),
(48, '5006', '5', 'MORANG', 'Jahada', 'Gaunpalika', '1', 'Jahada'),
(49, '5007', '5', 'MORANG', 'Kanepokhari', 'Gaunpalika', '1', 'Kanepokhari'),
(50, '5008', '5', 'MORANG', 'Katahari', 'Gaunpalika', '1', 'Katahari'),
(51, '5009', '5', 'MORANG', 'Kerabari', 'Gaunpalika', '1', 'Kerabari'),
(52, '5010', '5', 'MORANG', 'Letang', 'Nagarpalika', '1', 'Letang'),
(53, '5011', '5', 'MORANG', 'Miklajung', 'Gaunpalika', '1', 'Miklajung'),
(54, '5012', '5', 'MORANG', 'Patahrishanishchare', 'Nagarpalika', '1', 'Patahrishanishchare'),
(55, '5013', '5', 'MORANG', 'Rangeli', 'Nagarpalika', '1', 'Rangeli'),
(56, '5014', '5', 'MORANG', 'Ratuwamai', 'Nagarpalika', '1', 'Ratuwamai'),
(57, '5015', '5', 'MORANG', 'Sundarharaicha', 'Nagarpalika', '1', 'Sundarharaicha'),
(58, '5016', '5', 'MORANG', 'Sunwarshi', 'Nagarpalika', '1', 'Sunwarshi'),
(59, '5017', '5', 'MORANG', 'Uralabari', 'Nagarpalika', '1', 'Uralabari'),
(60, '6001', '6', 'SUNSARI', 'Barah', 'Nagarpalika', '1', 'Barah'),
(61, '6002', '6', 'SUNSARI', 'Barju', 'Gaunpalika', '1', 'Barju'),
(62, '6003', '6', 'SUNSARI', 'Bhokraha', 'Gaunpalika', '1', 'Bhokraha Narshing'),
(63, '6004', '6', 'SUNSARI', 'Dewanganj', 'Gaunpalika', '1', 'Dewanganj'),
(64, '6005', '6', 'SUNSARI', 'Dharan', 'Upamahanagarpalika', '1', 'Dharan'),
(65, '6006', '6', 'SUNSARI', 'Duhabi', 'Nagarpalika', '1', 'Duhabi'),
(66, '6007', '6', 'SUNSARI', 'Gadhi', 'Gaunpalika', '1', 'Gadhi'),
(67, '6008', '6', 'SUNSARI', 'Harinagara', 'Gaunpalika', '1', 'Harinagar'),
(68, '6009', '6', 'SUNSARI', 'Inaruwa', 'Nagarpalika', '1', 'Inaruwa'),
(69, '6010', '6', 'SUNSARI', 'Itahari', 'Upamahanagarpalika', '1', 'Itahari'),
(70, '6011', '6', 'SUNSARI', 'Koshi', 'Gaunpalika', '1', 'Koshi'),
(71, '6012', '6', 'SUNSARI', 'Ramdhuni', 'Nagarpalika', '1', 'Ramdhuni'),
(72, '6099', '6', 'SUNSARI', 'Koshi Tappu Wildlife Reserve', 'Wildlife Reserve', '1', 'Koshi Tappu Wildlife Reserve'),
(73, '7001', '7', 'DHANKUTA', 'Chaubise', 'Gaunpalika', '1', 'Chaubise'),
(74, '7002', '7', 'DHANKUTA', 'Chhathar Jorpati', 'Gaunpalika', '1', 'Chhathar Jorpati'),
(75, '7003', '7', 'DHANKUTA', 'Dhankuta', 'Nagarpalika', '1', 'Dhankuta'),
(76, '7004', '7', 'DHANKUTA', 'Khalsa Chhintang Shahidbhumi', 'Gaunpalika', '1', 'Shahidbhumi'),
(77, '7005', '7', 'DHANKUTA', 'Mahalaxmi', 'Nagarpalika', '1', 'Mahalaxmi'),
(78, '7006', '7', 'DHANKUTA', 'Pakhribas', 'Nagarpalika', '1', 'Pakhribas'),
(79, '7007', '7', 'DHANKUTA', 'Sangurigadhi', 'Gaunpalika', '1', 'Sangurigadhi'),
(80, '8001', '8', 'TERHATHUM', 'Aathrai', 'Gaunpalika', '1', 'Aathrai'),
(81, '8002', '8', 'TERHATHUM', 'Chhathar', 'Gaunpalika', '1', 'Chhathar'),
(82, '8003', '8', 'TERHATHUM', 'Laligurans', 'Nagarpalika', '1', 'Laligurans'),
(83, '8004', '8', 'TERHATHUM', 'Menchayam', 'Gaunpalika', '1', 'Menchayam'),
(84, '8005', '8', 'TERHATHUM', 'Myanglung', 'Nagarpalika', '1', 'Myanglung'),
(85, '8006', '8', 'TERHATHUM', 'Phedap', 'Gaunpalika', '1', 'Phedap'),
(86, '9001', '9', 'SANKHUWASABHA', 'Bhotkhola', 'Gaunpalika', '1', 'Bhotkhola'),
(87, '9002', '9', 'SANKHUWASABHA', 'Chainpur', 'Nagarpalika', '1', 'Chainpur'),
(88, '9003', '9', 'SANKHUWASABHA', 'Chichila', 'Gaunpalika', '1', 'Chichila'),
(89, '9004', '9', 'SANKHUWASABHA', 'Dharmadevi', 'Nagarpalika', '1', 'Dharmadevi'),
(90, '9005', '9', 'SANKHUWASABHA', 'Khandbari', 'Nagarpalika', '1', 'Khandbari'),
(91, '9006', '9', 'SANKHUWASABHA', 'Madi', 'Nagarpalika', '1', 'Madi'),
(92, '9007', '9', 'SANKHUWASABHA', 'Makalu', 'Gaunpalika', '1', 'Makalu'),
(93, '9008', '9', 'SANKHUWASABHA', 'Panchakhapan', 'Nagarpalika', '1', 'Panchakhapan'),
(94, '9009', '9', 'SANKHUWASABHA', 'Sabhapokhari', 'Gaunpalika', '1', 'Sabhapokhari'),
(95, '9010', '9', 'SANKHUWASABHA', 'Silichong', 'Gaunpalika', '1', 'Silichong'),
(96, '10001', '10', 'BHOJPUR', 'Aamchowk', 'Gaunpalika', '1', 'Aamchowk'),
(97, '10002', '10', 'BHOJPUR', 'Arun', 'Gaunpalika', '1', 'Arun'),
(98, '10003', '10', 'BHOJPUR', 'Bhojpur', 'Nagarpalika', '1', 'Bhojpur'),
(99, '10004', '10', 'BHOJPUR', 'Hatuwagadhi', 'Gaunpalika', '1', 'Hatuwagadhi'),
(100, '10005', '10', 'BHOJPUR', 'Pauwadungma', 'Gaunpalika', '1', 'Pauwadungma'),
(101, '10006', '10', 'BHOJPUR', 'Ramprasad Rai', 'Gaunpalika', '1', 'Ramprasad Rai'),
(102, '10007', '10', 'BHOJPUR', 'Salpasilichho', 'Gaunpalika', '1', 'Salpasilichho'),
(103, '10008', '10', 'BHOJPUR', 'Shadananda', 'Nagarpalika', '1', 'Shadananda'),
(104, '10009', '10', 'BHOJPUR', 'Tyamkemaiyung', 'Gaunpalika', '1', 'Tyamkemaiyung'),
(105, '11001', '11', 'SOLUKHUMBU', 'Dudhkaushika', 'Gaunpalika', '1', 'Dudhkaushika'),
(106, '11002', '11', 'SOLUKHUMBU', 'Dudhkoshi', 'Gaunpalika', '1', 'Thulung Dudhkoshi'),
(107, '11003', '11', 'SOLUKHUMBU', 'Khumbupasanglahmu', 'Gaunpalika', '1', 'Khumbupasanglahmu'),
(108, '11004', '11', 'SOLUKHUMBU', 'Likhupike', 'Gaunpalika', '1', 'Likhupike'),
(109, '11005', '11', 'SOLUKHUMBU', 'Mahakulung', 'Gaunpalika', '1', 'Mahakulung'),
(110, '11006', '11', 'SOLUKHUMBU', 'Nechasalyan', 'Gaunpalika', '1', 'Nechasalyan'),
(111, '11007', '11', 'SOLUKHUMBU', 'Solududhakunda', 'Nagarpalika', '1', 'Solududhakunda'),
(112, '11008', '11', 'SOLUKHUMBU', 'Sotang', 'Gaunpalika', '1', 'Sotang'),
(113, '12001', '12', 'OKHALDHUNGA', 'Champadevi', 'Gaunpalika', '1', 'Champadevi'),
(114, '12002', '12', 'OKHALDHUNGA', 'Chisankhugadhi', 'Gaunpalika', '1', 'Chisankhugadhi'),
(115, '12003', '12', 'OKHALDHUNGA', 'Khijidemba', 'Gaunpalika', '1', 'Khijidemba'),
(116, '12004', '12', 'OKHALDHUNGA', 'Likhu', 'Gaunpalika', '1', 'Likhu'),
(117, '12005', '12', 'OKHALDHUNGA', 'Manebhanjyang', 'Gaunpalika', '1', 'Manebhanjyang'),
(118, '12006', '12', 'OKHALDHUNGA', 'Molung', 'Gaunpalika', '1', 'Molung'),
(119, '12007', '12', 'OKHALDHUNGA', 'Siddhicharan', 'Nagarpalika', '1', 'Siddhicharan'),
(120, '12008', '12', 'OKHALDHUNGA', 'Sunkoshi', 'Gaunpalika', '1', 'Sunkoshi'),
(121, '13001', '13', 'KHOTANG', 'Ainselukhark', 'Gaunpalika', '1', 'Ainselukhark'),
(122, '13002', '13', 'KHOTANG', 'Barahapokhari', 'Gaunpalika', '1', 'Barahapokhari'),
(123, '13003', '13', 'KHOTANG', 'Diprung', 'Gaunpalika', '1', 'Diprung'),
(124, '13004', '13', 'KHOTANG', 'Halesi Tuwachung', 'Nagarpalika', '1', 'Halesi Tuwachung'),
(125, '13005', '13', 'KHOTANG', 'Jantedhunga', 'Gaunpalika', '1', 'Jantedhunga'),
(126, '13006', '13', 'KHOTANG', 'Kepilasagadhi', 'Gaunpalika', '1', 'Kepilasagadhi'),
(127, '13007', '13', 'KHOTANG', 'Khotehang', 'Gaunpalika', '1', 'Khotehang'),
(128, '13008', '13', 'KHOTANG', 'Lamidanda', 'Gaunpalika', '1', 'Rawabesi'),
(129, '13009', '13', 'KHOTANG', 'Rupakot Majhuwagadhi', 'Nagarpalika', '1', 'Rupakot Majhuwagadhi'),
(130, '13010', '13', 'KHOTANG', 'Sakela', 'Gaunpalika', '1', 'Sakela'),
(131, '14001', '14', 'UDAYAPUR', 'Belaka', 'Nagarpalika', '1', 'Belaka'),
(132, '14002', '14', 'UDAYAPUR', 'Chaudandigadhi', 'Nagarpalika', '1', 'Chaudandigadhi'),
(133, '14003', '14', 'UDAYAPUR', 'Katari', 'Nagarpalika', '1', 'Katari'),
(134, '14004', '14', 'UDAYAPUR', 'Rautamai', 'Gaunpalika', '1', 'Rautamai'),
(135, '14005', '14', 'UDAYAPUR', 'Sunkoshi', 'Gaunpalika', '1', 'Sunkoshi'),
(136, '14006', '14', 'UDAYAPUR', 'Tapli', 'Gaunpalika', '1', 'Tapli'),
(137, '14007', '14', 'UDAYAPUR', 'Triyuga', 'Nagarpalika', '1', 'Triyuga'),
(138, '14008', '14', 'UDAYAPUR', 'Udayapurgadhi', 'Gaunpalika', '1', 'Udayapurgadhi'),
(139, '14099', '14', 'UDAYAPUR', 'Koshi Tappu Wildlife Reserve', 'Wildlife Reserve', '1', 'Koshi Tappu Wildlife Reserve'),
(140, '15001', '15', 'SAPTARI', 'Agnisair Krishna Savaran', 'Gaunpalika', '2', 'Agnisair Krishna Savaran'),
(141, '15002', '15', 'SAPTARI', 'Balan Bihul', 'Gaunpalika', '2', 'Balan Bihul'),
(142, '15003', '15', 'SAPTARI', 'Belhi Chapena', 'Gaunpalika', '2', 'Belhi Chapena'),
(143, '15004', '15', 'SAPTARI', 'Bishnupur', 'Gaunpalika', '2', 'Bishnupur'),
(144, '15005', '15', 'SAPTARI', 'Bode Barsain', 'Nagarpalika', '2', 'Bode Barsain'),
(145, '15006', '15', 'SAPTARI', 'Chhinnamasta', 'Gaunpalika', '2', 'Chhinnamasta'),
(146, '15007', '15', 'SAPTARI', 'Dakneshwori', 'Nagarpalika', '2', 'Dakneshwori'),
(147, '15008', '15', 'SAPTARI', 'Hanumannagar Kankalini', 'Nagarpalika', '2', 'Hanumannagar Kankalini'),
(148, '15009', '15', 'SAPTARI', 'Kanchanrup', 'Nagarpalika', '2', 'Kanchanrup'),
(149, '15010', '15', 'SAPTARI', 'Khadak', 'Nagarpalika', '2', 'Khadak'),
(150, '15011', '15', 'SAPTARI', 'Mahadeva', 'Gaunpalika', '2', 'Mahadeva'),
(151, '15012', '15', 'SAPTARI', 'Rajbiraj', 'Nagarpalika', '2', 'Rajbiraj'),
(152, '15013', '15', 'SAPTARI', 'Rupani', 'Gaunpalika', '2', 'Rupani'),
(153, '15014', '15', 'SAPTARI', 'Saptakoshi', 'Gaunpalika', '2', 'Saptakoshi'),
(154, '15015', '15', 'SAPTARI', 'Shambhunath', 'Nagarpalika', '2', 'Shambhunath'),
(155, '15016', '15', 'SAPTARI', 'Surunga', 'Nagarpalika', '2', 'Surunga'),
(156, '15017', '15', 'SAPTARI', 'Tilathi Koiladi', 'Gaunpalika', '2', 'Tilathi Koiladi'),
(157, '15018', '15', 'SAPTARI', 'Tirahut', 'Gaunpalika', '2', 'Tirahut'),
(158, '15099', '15', 'SAPTARI', 'Koshi Tappu Wildlife Reserve', 'Wildlife Reserve', '2', 'Koshi Tappu Wildlife Reserve'),
(159, '16001', '16', 'SIRAHA', 'Arnama', 'Gaunpalika', '2', 'Arnama'),
(160, '16002', '16', 'SIRAHA', 'Aurahi', 'Gaunpalika', '2', 'Aurahi'),
(161, '16003', '16', 'SIRAHA', 'Bariyarpatti', 'Gaunpalika', '2', 'Bariyarpatti'),
(162, '16004', '16', 'SIRAHA', 'Bhagawanpur', 'Gaunpalika', '2', 'Bhagawanpur'),
(163, '16005', '16', 'SIRAHA', 'Bishnupur', 'Gaunpalika', '2', 'Bishnupur'),
(164, '16006', '16', 'SIRAHA', 'Dhangadhimai', 'Nagarpalika', '2', 'Dhangadhimai'),
(165, '16007', '16', 'SIRAHA', 'Golbazar', 'Nagarpalika', '2', 'Golbazar'),
(166, '16008', '16', 'SIRAHA', 'Kalyanpur', 'Nagarpalika', '2', 'Kalyanpur'),
(167, '16009', '16', 'SIRAHA', 'Karjanha', 'Nagarpalika', '2', 'Karjanha'),
(168, '16010', '16', 'SIRAHA', 'Lahan', 'Nagarpalika', '2', 'Lahan'),
(169, '16011', '16', 'SIRAHA', 'Laxmipur Patari', 'Gaunpalika', '2', 'Laxmipur Patari'),
(170, '16012', '16', 'SIRAHA', 'Mirchaiya', 'Nagarpalika', '2', 'Mirchaiya'),
(171, '16013', '16', 'SIRAHA', 'Naraha', 'Gaunpalika', '2', 'Naraha'),
(172, '16014', '16', 'SIRAHA', 'Nawarajpur', 'Gaunpalika', '2', 'Nawarajpur'),
(173, '16015', '16', 'SIRAHA', 'Sakhuwanankarkatti', 'Gaunpalika', '2', 'Sakhuwanankarkatti'),
(174, '16016', '16', 'SIRAHA', 'Siraha', 'Nagarpalika', '2', 'Siraha'),
(175, '16017', '16', 'SIRAHA', 'Sukhipur', 'Nagarpalika', '2', 'Sukhipur'),
(176, '17001', '17', 'DHANUSHA', 'Aaurahi', 'Gaunpalika', '2', 'Aaurahi'),
(177, '17002', '17', 'DHANUSHA', 'Bateshwor', 'Gaunpalika', '2', 'Bateshwor'),
(178, '17003', '17', 'DHANUSHA', 'Bideha', 'Nagarpalika', '2', 'Bideha'),
(179, '17004', '17', 'DHANUSHA', 'Chhireshwornath', 'Nagarpalika', '2', 'Chhireshwornath'),
(180, '17005', '17', 'DHANUSHA', 'Dhanauji', 'Gaunpalika', '2', 'Dhanauji'),
(181, '17006', '17', 'DHANUSHA', 'Dhanusadham', 'Nagarpalika', '2', 'Dhanusadham'),
(182, '17007', '17', 'DHANUSHA', 'Ganeshman Charnath', 'Nagarpalika', '2', 'Ganeshman Charnath'),
(183, '17008', '17', 'DHANUSHA', 'Hansapur', 'Nagarpalika', '2', 'Hansapur'),
(184, '17009', '17', 'DHANUSHA', 'Janaknandani', 'Gaunpalika', '2', 'Janaknandani'),
(185, '17010', '17', 'DHANUSHA', 'Janakpur', 'Upamahanagarpalika', '2', 'Janakpur'),
(186, '17011', '17', 'DHANUSHA', 'Kamala', 'Nagarpalika', '2', 'Kamala'),
(187, '17012', '17', 'DHANUSHA', 'Lakshminiya', 'Gaunpalika', '2', 'Lakshminiya'),
(188, '17013', '17', 'DHANUSHA', 'Mithila', 'Nagarpalika', '2', 'Mithila'),
(189, '17014', '17', 'DHANUSHA', 'Mithila Bihari', 'Nagarpalika', '2', 'Mithila Bihari'),
(190, '17015', '17', 'DHANUSHA', 'Mukhiyapatti Musarmiya', 'Gaunpalika', '2', 'Mukhiyapatti Musarmiya'),
(191, '17016', '17', 'DHANUSHA', 'Nagarain', 'Nagarpalika', '2', 'Nagarain'),
(192, '17017', '17', 'DHANUSHA', 'Sabaila', 'Nagarpalika', '2', 'Sabaila'),
(193, '17018', '17', 'DHANUSHA', 'Sahidnagar', 'Nagarpalika', '2', 'Sahidnagar'),
(194, '18001', '18', 'MAHOTTARI', 'Aurahi', 'Nagarpalika', '2', 'Aurahi'),
(195, '18002', '18', 'MAHOTTARI', 'Balwa', 'Nagarpalika', '2', 'Balwa'),
(196, '18003', '18', 'MAHOTTARI', 'Bardibas', 'Nagarpalika', '2', 'Bardibas'),
(197, '18004', '18', 'MAHOTTARI', 'Bhangaha', 'Nagarpalika', '2', 'Bhangaha'),
(198, '18005', '18', 'MAHOTTARI', 'Ekdanra', 'Gaunpalika', '2', 'Ekdanra'),
(199, '18006', '18', 'MAHOTTARI', 'Gaushala', 'Nagarpalika', '2', 'Gaushala'),
(200, '18007', '18', 'MAHOTTARI', 'Jaleswor', 'Nagarpalika', '2', 'Jaleswor'),
(201, '18008', '18', 'MAHOTTARI', 'Loharpatti', 'Nagarpalika', '2', 'Loharpatti'),
(202, '18009', '18', 'MAHOTTARI', 'Mahottari', 'Gaunpalika', '2', 'Mahottari'),
(203, '18010', '18', 'MAHOTTARI', 'Manra Siswa', 'Nagarpalika', '2', 'Manra Siswa'),
(204, '18011', '18', 'MAHOTTARI', 'Matihani', 'Nagarpalika', '2', 'Matihani'),
(205, '18012', '18', 'MAHOTTARI', 'Pipra', 'Gaunpalika', '2', 'Pipra'),
(206, '18013', '18', 'MAHOTTARI', 'Ramgopalpur', 'Nagarpalika', '2', 'Ramgopalpur'),
(207, '18014', '18', 'MAHOTTARI', 'Samsi', 'Gaunpalika', '2', 'Samsi'),
(208, '18015', '18', 'MAHOTTARI', 'Sonama', 'Gaunpalika', '2', 'Sonama'),
(209, '19001', '19', 'SARLAHI', 'Bagmati', 'Nagarpalika', '2', 'Bagmati'),
(210, '19002', '19', 'SARLAHI', 'Balara', 'Nagarpalika', '2', 'Balara'),
(211, '19003', '19', 'SARLAHI', 'Barahathawa', 'Nagarpalika', '2', 'Barahathawa'),
(212, '19004', '19', 'SARLAHI', 'Basbariya', 'Gaunpalika', '2', 'Basbariya'),
(213, '19005', '19', 'SARLAHI', 'Bishnu', 'Gaunpalika', '2', 'Bishnu'),
(214, '19006', '19', 'SARLAHI', 'Bramhapuri', 'Gaunpalika', '2', 'Bramhapuri'),
(215, '19007', '19', 'SARLAHI', 'Chakraghatta', 'Gaunpalika', '2', 'Chakraghatta'),
(216, '19008', '19', 'SARLAHI', 'Chandranagar', 'Gaunpalika', '2', 'Chandranagar'),
(217, '19009', '19', 'SARLAHI', 'Dhankaul', 'Gaunpalika', '2', 'Dhankaul'),
(218, '19010', '19', 'SARLAHI', 'Godaita', 'Nagarpalika', '2', 'Godaita'),
(219, '19011', '19', 'SARLAHI', 'Haripur', 'Nagarpalika', '2', 'Haripur'),
(220, '19012', '19', 'SARLAHI', 'Haripurwa', 'Nagarpalika', '2', 'Haripurwa'),
(221, '19013', '19', 'SARLAHI', 'Hariwan', 'Nagarpalika', '2', 'Hariwan'),
(222, '19014', '19', 'SARLAHI', 'Ishworpur', 'Nagarpalika', '2', 'Ishworpur'),
(223, '19015', '19', 'SARLAHI', 'Kabilasi', 'Nagarpalika', '2', 'Kabilasi'),
(224, '19016', '19', 'SARLAHI', 'Kaudena', 'Gaunpalika', '2', 'Kaudena'),
(225, '19017', '19', 'SARLAHI', 'Lalbandi', 'Nagarpalika', '2', 'Lalbandi'),
(226, '19018', '19', 'SARLAHI', 'Malangawa', 'Nagarpalika', '2', 'Malangawa'),
(227, '19019', '19', 'SARLAHI', 'Parsa', 'Gaunpalika', '2', 'Parsa'),
(228, '19020', '19', 'SARLAHI', 'Ramnagar', 'Gaunpalika', '2', 'Ramnagar'),
(229, '20001', '20', 'SINDHULI', 'Dudhouli', 'Nagarpalika', '3', 'Dudhouli'),
(230, '20002', '20', 'SINDHULI', 'Ghanglekh', 'Gaunpalika', '3', 'Ghanglekh'),
(231, '20003', '20', 'SINDHULI', 'Golanjor', 'Gaunpalika', '3', 'Golanjor'),
(232, '20004', '20', 'SINDHULI', 'Hariharpurgadhi', 'Gaunpalika', '3', 'Hariharpurgadhi'),
(233, '20005', '20', 'SINDHULI', 'Kamalamai', 'Nagarpalika', '3', 'Kamalamai'),
(234, '20006', '20', 'SINDHULI', 'Marin', 'Gaunpalika', '3', 'Marin'),
(235, '20007', '20', 'SINDHULI', 'Phikkal', 'Gaunpalika', '3', 'Phikkal'),
(236, '20008', '20', 'SINDHULI', 'Sunkoshi', 'Gaunpalika', '3', 'Sunkoshi'),
(237, '20009', '20', 'SINDHULI', 'Tinpatan', 'Gaunpalika', '3', 'Tinpatan'),
(238, '21001', '21', 'RAMECHHAP', 'Doramba', 'Gaunpalika', '3', 'Doramba'),
(239, '21002', '21', 'RAMECHHAP', 'Gokulganga', 'Gaunpalika', '3', 'Gokulganga'),
(240, '21003', '21', 'RAMECHHAP', 'Khadadevi', 'Gaunpalika', '3', 'Khadadevi'),
(241, '21004', '21', 'RAMECHHAP', 'Likhu', 'Gaunpalika', '3', 'LikhuTamakoshi'),
(242, '21005', '21', 'RAMECHHAP', 'Manthali', 'Nagarpalika', '3', 'Manthali'),
(243, '21006', '21', 'RAMECHHAP', 'Ramechhap', 'Nagarpalika', '3', 'Ramechhap'),
(244, '21007', '21', 'RAMECHHAP', 'Sunapati', 'Gaunpalika', '3', 'Sunapati'),
(245, '21008', '21', 'RAMECHHAP', 'Umakunda', 'Gaunpalika', '3', 'Umakunda'),
(246, '22001', '22', 'DOLAKHA', 'Baiteshwor', 'Gaunpalika', '3', 'Baiteshwor'),
(247, '22002', '22', 'DOLAKHA', 'Bhimeshwor', 'Nagarpalika', '3', 'Bhimeshwor'),
(248, '22003', '22', 'DOLAKHA', 'Bigu', 'Gaunpalika', '3', 'Bigu'),
(249, '22004', '22', 'DOLAKHA', 'Gaurishankar', 'Gaunpalika', '3', 'Gaurishankar'),
(250, '22005', '22', 'DOLAKHA', 'Jiri', 'Nagarpalika', '3', 'Jiri'),
(251, '22006', '22', 'DOLAKHA', 'Kalinchok', 'Gaunpalika', '3', 'Kalinchok'),
(252, '22007', '22', 'DOLAKHA', 'Melung', 'Gaunpalika', '3', 'Melung'),
(253, '22008', '22', 'DOLAKHA', 'Sailung', 'Gaunpalika', '3', 'Sailung'),
(254, '22009', '22', 'DOLAKHA', 'Tamakoshi', 'Gaunpalika', '3', 'Tamakoshi'),
(255, '23001', '23', 'SINDHUPALCHOK', 'Balefi', 'Gaunpalika', '3', 'Balefi'),
(256, '23002', '23', 'SINDHUPALCHOK', 'Barhabise', 'Nagarpalika', '3', 'Barhabise'),
(257, '23003', '23', 'SINDHUPALCHOK', 'Bhotekoshi', 'Gaunpalika', '3', 'Bhotekoshi'),
(258, '23004', '23', 'SINDHUPALCHOK', 'Chautara SangachokGadhi', 'Nagarpalika', '3', 'Chautara SangachokGadhi'),
(259, '23005', '23', 'SINDHUPALCHOK', 'Helambu', 'Gaunpalika', '3', 'Helambu'),
(260, '23006', '23', 'SINDHUPALCHOK', 'Indrawati', 'Gaunpalika', '3', 'Indrawati'),
(261, '23007', '23', 'SINDHUPALCHOK', 'Jugal', 'Gaunpalika', '3', 'Jugal'),
(262, '23008', '23', 'SINDHUPALCHOK', 'Lisangkhu Pakhar', 'Gaunpalika', '3', 'Lisangkhu Pakhar'),
(263, '23009', '23', 'SINDHUPALCHOK', 'Melamchi', 'Nagarpalika', '3', 'Melamchi'),
(264, '23010', '23', 'SINDHUPALCHOK', 'Panchpokhari Thangpal', 'Gaunpalika', '3', 'Panchpokhari Thangpal'),
(265, '23011', '23', 'SINDHUPALCHOK', 'Sunkoshi', 'Gaunpalika', '3', 'Sunkoshi'),
(266, '23012', '23', 'SINDHUPALCHOK', 'Tripurasundari', 'Gaunpalika', '3', 'Tripurasundari'),
(267, '24001', '24', 'KABHREPALANCHOK', 'Banepa', 'Nagarpalika', '3', 'Banepa'),
(268, '24002', '24', 'KABHREPALANCHOK', 'Bethanchowk', 'Gaunpalika', '3', 'Bethanchowk'),
(269, '24003', '24', 'KABHREPALANCHOK', 'Bhumlu', 'Gaunpalika', '3', 'Bhumlu'),
(270, '24004', '24', 'KABHREPALANCHOK', 'Chaurideurali', 'Gaunpalika', '3', 'Chaurideurali'),
(271, '24005', '24', 'KABHREPALANCHOK', 'Dhulikhel', 'Nagarpalika', '3', 'Dhulikhel'),
(272, '24006', '24', 'KABHREPALANCHOK', 'Khanikhola', 'Gaunpalika', '3', 'Khanikhola'),
(273, '24007', '24', 'KABHREPALANCHOK', 'Mahabharat', 'Gaunpalika', '3', 'Mahabharat'),
(274, '24008', '24', 'KABHREPALANCHOK', 'Mandandeupur', 'Nagarpalika', '3', 'Mandandeupur'),
(275, '24009', '24', 'KABHREPALANCHOK', 'Namobuddha', 'Nagarpalika', '3', 'Namobuddha'),
(276, '24010', '24', 'KABHREPALANCHOK', 'Panauti', 'Nagarpalika', '3', 'Panauti'),
(277, '24011', '24', 'KABHREPALANCHOK', 'Panchkhal', 'Nagarpalika', '3', 'Panchkhal'),
(278, '24012', '24', 'KABHREPALANCHOK', 'Roshi', 'Gaunpalika', '3', 'Roshi'),
(279, '24013', '24', 'KABHREPALANCHOK', 'Temal', 'Gaunpalika', '3', 'Temal'),
(280, '25001', '25', 'LALITPUR', 'Bagmati', 'Gaunpalika', '3', 'Bagmati'),
(281, '25002', '25', 'LALITPUR', 'Godawari', 'Nagarpalika', '3', 'Godawari'),
(282, '25003', '25', 'LALITPUR', 'Konjyosom', 'Gaunpalika', '3', 'Konjyosom'),
(283, '25004', '25', 'LALITPUR', 'Lalitpur', 'Mahanagarpalika', '3', 'Lalitpur'),
(284, '25005', '25', 'LALITPUR', 'Mahalaxmi', 'Nagarpalika', '3', 'Mahalaxmi'),
(285, '25006', '25', 'LALITPUR', 'Mahankal', 'Gaunpalika', '3', 'Mahankal'),
(286, '26001', '26', 'BHAKTAPUR', 'Bhaktapur', 'Nagarpalika', '3', 'Bhaktapur'),
(287, '26002', '26', 'BHAKTAPUR', 'Changunarayan', 'Nagarpalika', '3', 'Changunarayan'),
(288, '26003', '26', 'BHAKTAPUR', 'Madhyapur Thimi', 'Nagarpalika', '3', 'Madhyapur Thimi'),
(289, '26004', '26', 'BHAKTAPUR', 'Suryabinayak', 'Nagarpalika', '3', 'Suryabinayak'),
(290, '27001', '27', 'KATHMANDU', 'Budhanilakantha', 'Nagarpalika', '3', 'Budhanilakantha'),
(291, '27002', '27', 'KATHMANDU', 'Chandragiri', 'Nagarpalika', '3', 'Chandragiri'),
(292, '27003', '27', 'KATHMANDU', 'Dakshinkali', 'Nagarpalika', '3', 'Dakshinkali'),
(293, '27004', '27', 'KATHMANDU', 'Gokarneshwor', 'Nagarpalika', '3', 'Gokarneshwor'),
(294, '27005', '27', 'KATHMANDU', 'Kageshwori Manahora', 'Nagarpalika', '3', 'Kageshwori Manahora'),
(295, '27006', '27', 'KATHMANDU', 'Kathmandu', 'Mahanagarpalika', '3', 'Kathmandu'),
(296, '27007', '27', 'KATHMANDU', 'Kirtipur', 'Nagarpalika', '3', 'Kirtipur'),
(297, '27008', '27', 'KATHMANDU', 'Nagarjun', 'Nagarpalika', '3', 'Nagarjun'),
(298, '27009', '27', 'KATHMANDU', 'Shankharapur', 'Nagarpalika', '3', 'Shankharapur'),
(299, '27010', '27', 'KATHMANDU', 'Tarakeshwor', 'Nagarpalika', '3', 'Tarakeshwor'),
(300, '27011', '27', 'KATHMANDU', 'Tokha', 'Nagarpalika', '3', 'Tokha'),
(301, '28001', '28', 'NUWAKOT', 'Belkotgadhi', 'Nagarpalika', '3', 'Belkotgadhi'),
(302, '28002', '28', 'NUWAKOT', 'Bidur', 'Nagarpalika', '3', 'Bidur'),
(303, '28003', '28', 'NUWAKOT', 'Dupcheshwar', 'Gaunpalika', '3', 'Dupcheshwar'),
(304, '28004', '28', 'NUWAKOT', 'Kakani', 'Gaunpalika', '3', 'Kakani'),
(305, '28005', '28', 'NUWAKOT', 'Kispang', 'Gaunpalika', '3', 'Kispang'),
(306, '28006', '28', 'NUWAKOT', 'Likhu', 'Gaunpalika', '3', 'Likhu'),
(307, '28007', '28', 'NUWAKOT', 'Meghang', 'Gaunpalika', '3', 'Mamgang'),
(308, '28008', '28', 'NUWAKOT', 'Panchakanya', 'Gaunpalika', '3', 'Panchakanya'),
(309, '28009', '28', 'NUWAKOT', 'Shivapuri', 'Gaunpalika', '3', 'Shivapuri'),
(310, '28010', '28', 'NUWAKOT', 'Suryagadhi', 'Gaunpalika', '3', 'Suryagadhi'),
(311, '28011', '28', 'NUWAKOT', 'Tadi', 'Gaunpalika', '3', 'Tadi'),
(312, '28012', '28', 'NUWAKOT', 'Tarkeshwar', 'Gaunpalika', '3', 'Tarkeshwar'),
(313, '28088', '28', 'NUWAKOT', 'Shivapuri Watershed and Wildlife Reserve', 'Watershed and Wildlife Reserve', '3', 'Shivapuri Watershed and Wildlife Reserve'),
(314, '28099', '28', 'NUWAKOT', 'Langtang National Park', 'National Park', '3', 'Langtang National Park'),
(315, '29001', '29', 'RASUWA', 'Gosaikunda', 'Gaunpalika', '3', 'Gosaikunda'),
(316, '29002', '29', 'RASUWA', 'Kalika', 'Gaunpalika', '3', 'Kalika'),
(317, '29003', '29', 'RASUWA', 'Naukunda', 'Gaunpalika', '3', 'Naukunda'),
(318, '29004', '29', 'RASUWA', 'Parbati Kunda', 'Gaunpalika', '3', 'Aamachowdingmo'),
(319, '29005', '29', 'RASUWA', 'Uttargaya', 'Gaunpalika', '3', 'Uttargaya'),
(320, '30001', '30', 'DHADING', 'Benighat Rorang', 'Gaunpalika', '3', 'Benighat Rorang'),
(321, '30002', '30', 'DHADING', 'Dhunibesi', 'Nagarpalika', '3', 'Dhunibesi'),
(322, '30003', '30', 'DHADING', 'Gajuri', 'Gaunpalika', '3', 'Gajuri'),
(323, '30004', '30', 'DHADING', 'Galchi', 'Gaunpalika', '3', 'Galchi'),
(324, '30005', '30', 'DHADING', 'Gangajamuna', 'Gaunpalika', '3', 'Gangajamuna'),
(325, '30006', '30', 'DHADING', 'Jwalamukhi', 'Gaunpalika', '3', 'Jwalamukhi'),
(326, '30007', '30', 'DHADING', 'Khaniyabash', 'Gaunpalika', '3', 'Khaniyabash'),
(327, '30008', '30', 'DHADING', 'Netrawati', 'Gaunpalika', '3', 'NetrawatiDabjong'),
(328, '30009', '30', 'DHADING', 'Nilakantha', 'Nagarpalika', '3', 'Nilakantha'),
(329, '30010', '30', 'DHADING', 'Rubi Valley', 'Gaunpalika', '3', 'Rubi Valley'),
(330, '30011', '30', 'DHADING', 'Siddhalek', 'Gaunpalika', '3', 'Siddhalek'),
(331, '30012', '30', 'DHADING', 'Thakre', 'Gaunpalika', '3', 'Thakre'),
(332, '30013', '30', 'DHADING', 'Tripura Sundari', 'Gaunpalika', '3', 'Tripura Sundari'),
(333, '31001', '31', 'MAKAWANPUR', 'Bagmati', 'Gaunpalika', '3', 'Bagmati'),
(334, '31002', '31', 'MAKAWANPUR', 'Bakaiya', 'Gaunpalika', '3', 'Bakaiya'),
(335, '31003', '31', 'MAKAWANPUR', 'Bhimphedi', 'Gaunpalika', '3', 'Bhimphedi'),
(336, '31004', '31', 'MAKAWANPUR', 'Hetauda', 'Upamahanagarpalika', '3', 'Hetauda'),
(337, '31005', '31', 'MAKAWANPUR', 'Indrasarowar', 'Gaunpalika', '3', 'Indrasarowar'),
(338, '31006', '31', 'MAKAWANPUR', 'Kailash', 'Gaunpalika', '3', 'Kailash'),
(339, '31007', '31', 'MAKAWANPUR', 'Makawanpurgadhi', 'Gaunpalika', '3', 'Makawanpurgadhi'),
(340, '31008', '31', 'MAKAWANPUR', 'Manahari', 'Gaunpalika', '3', 'Manahari'),
(341, '31009', '31', 'MAKAWANPUR', 'Raksirang', 'Gaunpalika', '3', 'Raksirang'),
(342, '31010', '31', 'MAKAWANPUR', 'Thaha', 'Nagarpalika', '3', 'Thaha'),
(343, '31088', '31', 'MAKAWANPUR', 'Parsa Wildlife Reserve', 'Wildlife Reserve', '3', 'Parsa Wildlife Reserve'),
(344, '31099', '31', 'MAKAWANPUR', 'Chitawan National Park', 'National Park', '3', 'Chitawan National Park'),
(345, '32001', '32', 'RAUTAHAT', 'Baudhimai', 'Nagarpalika', '2', 'Baudhimai'),
(346, '32002', '32', 'RAUTAHAT', 'Brindaban', 'Nagarpalika', '2', 'Brindaban'),
(347, '32003', '32', 'RAUTAHAT', 'Chandrapur', 'Nagarpalika', '2', 'Chandrapur'),
(348, '32004', '32', 'RAUTAHAT', 'Dewahhi Gonahi', 'Nagarpalika', '2', 'Dewahhi Gonahi'),
(349, '32005', '32', 'RAUTAHAT', 'Durga Bhagwati', 'Gaunpalika', '2', 'Durga Bhagwati'),
(350, '32006', '32', 'RAUTAHAT', 'Gadhimai', 'Nagarpalika', '2', 'Gadhimai'),
(351, '32007', '32', 'RAUTAHAT', 'Garuda', 'Nagarpalika', '2', 'Garuda'),
(352, '32008', '32', 'RAUTAHAT', 'Gaur', 'Nagarpalika', '2', 'Gaur'),
(353, '32009', '32', 'RAUTAHAT', 'Gujara', 'Nagarpalika', '2', 'Gujara'),
(354, '32010', '32', 'RAUTAHAT', 'Ishanath', 'Nagarpalika', '2', 'Ishanath'),
(355, '32011', '32', 'RAUTAHAT', 'Katahariya', 'Nagarpalika', '2', 'Katahariya'),
(356, '32012', '32', 'RAUTAHAT', 'Madhav Narayan', 'Nagarpalika', '2', 'Madhav Narayan'),
(357, '32013', '32', 'RAUTAHAT', 'Maulapur', 'Nagarpalika', '2', 'Maulapur'),
(358, '32014', '32', 'RAUTAHAT', 'Paroha', 'Nagarpalika', '2', 'Paroha'),
(359, '32015', '32', 'RAUTAHAT', 'Phatuwa Bijayapur', 'Nagarpalika', '2', 'Phatuwa Bijayapur'),
(360, '32016', '32', 'RAUTAHAT', 'Rajdevi', 'Nagarpalika', '2', 'Rajdevi'),
(361, '32017', '32', 'RAUTAHAT', 'Rajpur', 'Nagarpalika', '2', 'Rajpur'),
(362, '32018', '32', 'RAUTAHAT', 'Yemunamai', 'Gaunpalika', '2', 'Yemunamai'),
(363, '33001', '33', 'BARA', 'Adarshkotwal', 'Gaunpalika', '2', 'Adarshkotwal'),
(364, '33002', '33', 'BARA', 'Baragadhi', 'Gaunpalika', '2', 'Baragadhi'),
(365, '33003', '33', 'BARA', 'Bishrampur', 'Gaunpalika', '2', 'Bishrampur'),
(366, '33004', '33', 'BARA', 'Devtal', 'Gaunpalika', '2', 'Devtal'),
(367, '33005', '33', 'BARA', 'Jitpur Simara', 'Upamahanagarpalika', '2', 'Jitpur Simara'),
(368, '33006', '33', 'BARA', 'Kalaiya', 'Upamahanagarpalika', '2', 'Kalaiya'),
(369, '33007', '33', 'BARA', 'Karaiyamai', 'Gaunpalika', '2', 'Karaiyamai'),
(370, '33008', '33', 'BARA', 'Kolhabi', 'Nagarpalika', '2', 'Kolhabi'),
(371, '33009', '33', 'BARA', 'Mahagadhimai', 'Nagarpalika', '2', 'Mahagadhimai'),
(372, '33010', '33', 'BARA', 'Nijgadh', 'Nagarpalika', '2', 'Nijgadh'),
(373, '33011', '33', 'BARA', 'Pacharauta', 'Nagarpalika', '2', 'Pacharauta'),
(374, '33012', '33', 'BARA', 'Parwanipur', 'Gaunpalika', '2', 'Parwanipur'),
(375, '33013', '33', 'BARA', 'Pheta', 'Gaunpalika', '2', 'Pheta'),
(376, '33014', '33', 'BARA', 'Prasauni', 'Gaunpalika', '2', 'Prasauni'),
(377, '33015', '33', 'BARA', 'Simraungadh', 'Nagarpalika', '2', 'Simraungadh'),
(378, '33016', '33', 'BARA', 'Suwarna', 'Gaunpalika', '2', 'Suwarna'),
(379, '33099', '33', 'BARA', 'Parsa Wildlife Reserve', 'Wildlife Reserve', '2', 'Parsa Wildlife Reserve'),
(380, '34001', '34', 'PARSA', 'Bahudaramai', 'Nagarpalika', '2', 'Bahudaramai'),
(381, '34002', '34', 'PARSA', 'Bindabasini', 'Gaunpalika', '2', 'Bindabasini'),
(382, '34003', '34', 'PARSA', 'Birgunj', 'Mahanagarpalika', '2', 'Birgunj'),
(383, '34004', '34', 'PARSA', 'Chhipaharmai', 'Gaunpalika', '2', 'Chhipaharmai'),
(384, '34005', '34', 'PARSA', 'Dhobini', 'Gaunpalika', '2', 'Dhobini'),
(385, '34006', '34', 'PARSA', 'Jagarnathpur', 'Gaunpalika', '2', 'Jagarnathpur'),
(386, '34007', '34', 'PARSA', 'Jirabhawani', 'Gaunpalika', '2', 'Jirabhawani'),
(387, '34008', '34', 'PARSA', 'Kalikamai', 'Gaunpalika', '2', 'Kalikamai'),
(388, '34009', '34', 'PARSA', 'Pakahamainpur', 'Gaunpalika', '2', 'Pakahamainpur'),
(389, '34010', '34', 'PARSA', 'Parsagadhi', 'Nagarpalika', '2', 'Parsagadhi'),
(390, '34011', '34', 'PARSA', 'Paterwasugauli', 'Gaunpalika', '2', 'Paterwasugauli'),
(391, '34012', '34', 'PARSA', 'Pokhariya', 'Nagarpalika', '2', 'Pokhariya'),
(392, '34013', '34', 'PARSA', 'SakhuwaPrasauni', 'Gaunpalika', '2', 'SakhuwaPrasauni'),
(393, '34014', '34', 'PARSA', 'Thori', 'Gaunpalika', '2', 'Thori'),
(394, '34099', '34', 'PARSA', 'Chitwan National Park', 'National Park', '2', 'Chitwan National Park'),
(395, '35001', '35', 'CHITAWAN', 'Bharatpur', 'Mahanagarpalika', '3', 'Bharatpur'),
(396, '35002', '35', 'CHITAWAN', 'Ichchhyakamana', 'Gaunpalika', '3', 'Ichchhyakamana'),
(397, '35003', '35', 'CHITAWAN', 'Kalika', 'Nagarpalika', '3', 'Kalika'),
(398, '35004', '35', 'CHITAWAN', 'Khairahani', 'Nagarpalika', '3', 'Khairahani'),
(399, '35005', '35', 'CHITAWAN', 'Madi', 'Nagarpalika', '3', 'Madi'),
(400, '35006', '35', 'CHITAWAN', 'Rapti', 'Nagarpalika', '3', 'Rapti'),
(401, '35007', '35', 'CHITAWAN', 'Ratnanagar', 'Nagarpalika', '3', 'Ratnanagar'),
(402, '35099', '35', 'CHITAWAN', 'Chitawan National Park', 'National Park', '3', 'Chitawan National Park'),
(403, '36001', '36', 'GORKHA', 'Aarughat', 'Gaunpalika', '4', 'Aarughat'),
(404, '36002', '36', 'GORKHA', 'Ajirkot', 'Gaunpalika', '4', 'Ajirkot'),
(405, '36003', '36', 'GORKHA', 'Bhimsen', 'Gaunpalika', '4', 'BhimsenThapa'),
(406, '36004', '36', 'GORKHA', 'Chum Nubri', 'Gaunpalika', '4', 'Chum Nubri'),
(407, '36005', '36', 'GORKHA', 'Dharche', 'Gaunpalika', '4', 'Dharche'),
(408, '36006', '36', 'GORKHA', 'Gandaki', 'Gaunpalika', '4', 'Gandaki'),
(409, '36007', '36', 'GORKHA', 'Gorkha', 'Nagarpalika', '4', 'Gorkha'),
(410, '36008', '36', 'GORKHA', 'Palungtar', 'Nagarpalika', '4', 'Palungtar'),
(411, '36009', '36', 'GORKHA', 'Sahid Lakhan', 'Gaunpalika', '4', 'Sahid Lakhan'),
(412, '36010', '36', 'GORKHA', 'Siranchok', 'Gaunpalika', '4', 'Siranchok'),
(413, '36011', '36', 'GORKHA', 'Sulikot', 'Gaunpalika', '4', 'BarpakSulikot'),
(414, '37001', '37', 'LAMJUNG', 'Besishahar', 'Nagarpalika', '4', 'Besishahar'),
(415, '37002', '37', 'LAMJUNG', 'Dordi', 'Gaunpalika', '4', 'Dordi'),
(416, '37003', '37', 'LAMJUNG', 'Dudhpokhari', 'Gaunpalika', '4', 'Dudhpokhari'),
(417, '37004', '37', 'LAMJUNG', 'Kwholasothar', 'Gaunpalika', '4', 'Kwholasothar'),
(418, '37005', '37', 'LAMJUNG', 'MadhyaNepal', 'Nagarpalika', '4', 'MadhyaNepal'),
(419, '37006', '37', 'LAMJUNG', 'Marsyangdi', 'Gaunpalika', '4', 'Marsyangdi'),
(420, '37007', '37', 'LAMJUNG', 'Rainas', 'Nagarpalika', '4', 'Rainas'),
(421, '37008', '37', 'LAMJUNG', 'Sundarbazar', 'Nagarpalika', '4', 'Sundarbazar'),
(422, '38001', '38', 'TANAHU', 'Anbukhaireni', 'Gaunpalika', '4', 'Anbukhaireni'),
(423, '38002', '38', 'TANAHU', 'Bandipur', 'Gaunpalika', '4', 'Bandipur'),
(424, '38003', '38', 'TANAHU', 'Bhanu', 'Nagarpalika', '4', 'Bhanu'),
(425, '38004', '38', 'TANAHU', 'Bhimad', 'Nagarpalika', '4', 'Bhimad'),
(426, '38005', '38', 'TANAHU', 'Byas', 'Nagarpalika', '4', 'Byas'),
(427, '38006', '38', 'TANAHU', 'Devghat', 'Gaunpalika', '4', 'Devghat'),
(428, '38007', '38', 'TANAHU', 'Ghiring', 'Gaunpalika', '4', 'Ghiring'),
(429, '38008', '38', 'TANAHU', 'Myagde', 'Gaunpalika', '4', 'Myagde'),
(430, '38009', '38', 'TANAHU', 'Rhishing', 'Gaunpalika', '4', 'Rhishing'),
(431, '38010', '38', 'TANAHU', 'Shuklagandaki', 'Nagarpalika', '4', 'Shuklagandaki'),
(432, '39001', '39', 'SYANGJA', 'Aandhikhola', 'Gaunpalika', '4', 'Aandhikhola'),
(433, '39002', '39', 'SYANGJA', 'Arjunchaupari', 'Gaunpalika', '4', 'Arjunchaupari'),
(434, '39003', '39', 'SYANGJA', 'Bhirkot', 'Nagarpalika', '4', 'Bhirkot'),
(435, '39004', '39', 'SYANGJA', 'Biruwa', 'Gaunpalika', '4', 'Biruwa'),
(436, '39005', '39', 'SYANGJA', 'Chapakot', 'Nagarpalika', '4', 'Chapakot'),
(437, '39006', '39', 'SYANGJA', 'Galyang', 'Nagarpalika', '4', 'Galyang'),
(438, '39007', '39', 'SYANGJA', 'Harinas', 'Gaunpalika', '4', 'Harinas'),
(439, '39008', '39', 'SYANGJA', 'Kaligandagi', 'Gaunpalika', '4', 'Kaligandagi'),
(440, '39009', '39', 'SYANGJA', 'Phedikhola', 'Gaunpalika', '4', 'Phedikhola'),
(441, '39010', '39', 'SYANGJA', 'Putalibazar', 'Nagarpalika', '4', 'Putalibazar'),
(442, '39011', '39', 'SYANGJA', 'Waling', 'Nagarpalika', '4', 'Waling'),
(443, '40001', '40', 'KASKI', 'Annapurna', 'Gaunpalika', '4', 'Annapurna'),
(444, '40002', '40', 'KASKI', 'Machhapuchchhre', 'Gaunpalika', '4', 'Machhapuchchhre'),
(445, '40003', '40', 'KASKI', 'Madi', 'Gaunpalika', '4', 'Madi'),
(446, '40004', '40', 'KASKI', 'Pokhara Lekhnath', 'Mahanagarpalika', '4', 'Pokhara Lekhnath'),
(447, '40005', '40', 'KASKI', 'Rupa', 'Gaunpalika', '4', 'Rupa'),
(448, '41001', '41', 'MANANG', 'Chame', 'Gaunpalika', '4', 'Chame'),
(449, '41002', '41', 'MANANG', 'Narphu', 'Gaunpalika', '4', 'Narpabhumi'),
(450, '41003', '41', 'MANANG', 'Nashong', 'Gaunpalika', '4', 'Nashong'),
(451, '41004', '41', 'MANANG', 'Neshyang', 'Gaunpalika', '4', 'ManangNishyang'),
(452, '42001', '42', 'MUSTANG', 'Barhagaun Muktikhsetra', 'Gaunpalika', '4', 'BaragunMuktikhsetra'),
(453, '42002', '42', 'MUSTANG', 'Dalome', 'Gaunpalika', '4', 'Loghekhar Damodarkunda'),
(454, '42003', '42', 'MUSTANG', 'Gharapjhong', 'Gaunpalika', '4', 'Gharapjhong'),
(455, '42004', '42', 'MUSTANG', 'Lomanthang', 'Gaunpalika', '4', 'Lomanthang'),
(456, '42005', '42', 'MUSTANG', 'Thasang', 'Gaunpalika', '4', 'Thasang'),
(457, '43001', '43', 'MYAGDI', 'Annapurna', 'Gaunpalika', '4', 'Annapurna'),
(458, '43002', '43', 'MYAGDI', 'Beni', 'Nagarpalika', '4', 'Beni'),
(459, '43003', '43', 'MYAGDI', 'Dhaulagiri', 'Gaunpalika', '4', 'Dhaulagiri'),
(460, '43004', '43', 'MYAGDI', 'Malika', 'Gaunpalika', '4', 'Malika'),
(461, '43005', '43', 'MYAGDI', 'Mangala', 'Gaunpalika', '4', 'Mangala'),
(462, '43006', '43', 'MYAGDI', 'Raghuganga', 'Gaunpalika', '4', 'Raghuganga'),
(463, '43099', '43', 'MYAGDI', 'Dhorpatan Hunting Reserve', 'Hunting Reserve', '4', 'Dhorpatan Hunting Reserve'),
(464, '44001', '44', 'PARBAT', 'Bihadi', 'Gaunpalika', '4', 'Bihadi'),
(465, '44002', '44', 'PARBAT', 'Jaljala', 'Gaunpalika', '4', 'Jaljala'),
(466, '44003', '44', 'PARBAT', 'Kushma', 'Nagarpalika', '4', 'Kushma'),
(467, '44004', '44', 'PARBAT', 'Mahashila', 'Gaunpalika', '4', 'Mahashila'),
(468, '44005', '44', 'PARBAT', 'Modi', 'Gaunpalika', '4', 'Modi'),
(469, '44006', '44', 'PARBAT', 'Painyu', 'Gaunpalika', '4', 'Painyu'),
(470, '44007', '44', 'PARBAT', 'Phalebas', 'Nagarpalika', '4', 'Phalebas'),
(471, '45001', '45', 'BAGLUNG', 'Badigad', 'Gaunpalika', '4', 'Badigad'),
(472, '45002', '45', 'BAGLUNG', 'Baglung', 'Nagarpalika', '4', 'Baglung'),
(473, '45003', '45', 'BAGLUNG', 'Bareng', 'Gaunpalika', '4', 'Bareng'),
(474, '45004', '45', 'BAGLUNG', 'Dhorpatan', 'Nagarpalika', '4', 'Dhorpatan'),
(475, '45005', '45', 'BAGLUNG', 'Galkot', 'Nagarpalika', '4', 'Galkot'),
(476, '45006', '45', 'BAGLUNG', 'Jaimuni', 'Nagarpalika', '4', 'Jaimuni'),
(477, '45007', '45', 'BAGLUNG', 'Kanthekhola', 'Gaunpalika', '4', 'Kanthekhola'),
(478, '45008', '45', 'BAGLUNG', 'Nisikhola', 'Gaunpalika', '4', 'Nisikhola'),
(479, '45009', '45', 'BAGLUNG', 'Taman Khola', 'Gaunpalika', '4', 'Taman Khola'),
(480, '45010', '45', 'BAGLUNG', 'Tara Khola', 'Gaunpalika', '4', 'Tara Khola'),
(481, '45099', '45', 'BAGLUNG', 'Dhorpatan Hunting Reserve', 'Hunting Reserve', '4', 'Dhorpatan Hunting Reserve'),
(482, '46001', '46', 'GULMI', 'Chandrakot', 'Gaunpalika', '5', 'Chandrakot'),
(483, '46002', '46', 'GULMI', 'Chatrakot', 'Gaunpalika', '5', 'Chatrakot'),
(484, '46003', '46', 'GULMI', 'Dhurkot', 'Gaunpalika', '5', 'Dhurkot'),
(485, '46004', '46', 'GULMI', 'Gulmidarbar', 'Gaunpalika', '5', 'Gulmidarbar'),
(486, '46005', '46', 'GULMI', 'Isma', 'Gaunpalika', '5', 'Isma'),
(487, '46006', '46', 'GULMI', 'Kaligandaki', 'Gaunpalika', '5', 'Kaligandaki'),
(488, '46007', '46', 'GULMI', 'Madane', 'Gaunpalika', '5', 'Madane'),
(489, '46008', '46', 'GULMI', 'Malika', 'Gaunpalika', '5', 'Malika'),
(490, '46009', '46', 'GULMI', 'Musikot', 'Nagarpalika', '5', 'Musikot'),
(491, '46010', '46', 'GULMI', 'Resunga', 'Nagarpalika', '5', 'Resunga'),
(492, '46011', '46', 'GULMI', 'Ruru', 'Gaunpalika', '5', 'Ruru'),
(493, '46012', '46', 'GULMI', 'Satyawati', 'Gaunpalika', '5', 'Satyawati'),
(494, '47001', '47', 'PALPA', 'Bagnaskali', 'Gaunpalika', '5', 'Bagnaskali'),
(495, '47002', '47', 'PALPA', 'Mathagadhi', 'Gaunpalika', '5', 'Mathagadhi'),
(496, '47003', '47', 'PALPA', 'Nisdi', 'Gaunpalika', '5', 'Nisdi'),
(497, '47004', '47', 'PALPA', 'Purbakhola', 'Gaunpalika', '5', 'Purbakhola'),
(498, '47005', '47', 'PALPA', 'Rainadevi Chhahara', 'Gaunpalika', '5', 'Rainadevi Chhahara'),
(499, '47006', '47', 'PALPA', 'Rambha', 'Gaunpalika', '5', 'Rambha'),
(500, '47007', '47', 'PALPA', 'Rampur', 'Nagarpalika', '5', 'Rampur'),
(501, '47008', '47', 'PALPA', 'Ribdikot', 'Gaunpalika', '5', 'Ribdikot'),
(502, '47009', '47', 'PALPA', 'Tansen', 'Nagarpalika', '5', 'Tansen'),
(503, '47010', '47', 'PALPA', 'Tinau', 'Gaunpalika', '5', 'Tinau'),
(504, '48001', '48', 'NAWALPARASI_W', 'Bardaghat', 'Nagarpalika', '5', 'Bardaghat'),
(505, '48002', '48', 'NAWALPARASI_W', 'Palhi Nandan', 'Gaunpalika', '5', 'Palhi Nandan'),
(506, '48003', '48', 'NAWALPARASI_W', 'Pratappur', 'Gaunpalika', '5', 'Pratappur'),
(507, '48004', '48', 'NAWALPARASI_W', 'Ramgram', 'Nagarpalika', '5', 'Ramgram'),
(508, '48005', '48', 'NAWALPARASI_W', 'Sarawal', 'Gaunpalika', '5', 'Sarawal'),
(509, '48006', '48', 'NAWALPARASI_W', 'Sunwal', 'Nagarpalika', '5', 'Sunwal'),
(510, '48007', '48', 'NAWALPARASI_W', 'Susta', 'Gaunpalika', '5', 'Susta'),
(511, '49001', '49', 'RUPANDEHI', 'Butwal', 'Upamahanagarpalika', '5', 'Butwal'),
(512, '49002', '49', 'RUPANDEHI', 'Devdaha', 'Nagarpalika', '5', 'Devdaha'),
(513, '49003', '49', 'RUPANDEHI', 'Gaidahawa', 'Gaunpalika', '5', 'Gaidahawa'),
(514, '49004', '49', 'RUPANDEHI', 'Kanchan', 'Gaunpalika', '5', 'Kanchan'),
(515, '49005', '49', 'RUPANDEHI', 'Kotahimai', 'Gaunpalika', '5', 'Kotahimai'),
(516, '49006', '49', 'RUPANDEHI', 'Lumbini Sanskritik', 'Nagarpalika', '5', 'Lumbini Sanskritik'),
(517, '49007', '49', 'RUPANDEHI', 'Marchawari', 'Gaunpalika', '5', 'Marchawari'),
(518, '49008', '49', 'RUPANDEHI', 'Mayadevi', 'Gaunpalika', '5', 'Mayadevi'),
(519, '49009', '49', 'RUPANDEHI', 'Omsatiya', 'Gaunpalika', '5', 'Omsatiya'),
(520, '49010', '49', 'RUPANDEHI', 'Rohini', 'Gaunpalika', '5', 'Rohini'),
(521, '49011', '49', 'RUPANDEHI', 'Sainamaina', 'Nagarpalika', '5', 'Sainamaina'),
(522, '49012', '49', 'RUPANDEHI', 'Sammarimai', 'Gaunpalika', '5', 'Sammarimai'),
(523, '49013', '49', 'RUPANDEHI', 'Siddharthanagar', 'Nagarpalika', '5', 'Siddharthanagar'),
(524, '49014', '49', 'RUPANDEHI', 'Siyari', 'Gaunpalika', '5', 'Siyari'),
(525, '49015', '49', 'RUPANDEHI', 'Sudhdhodhan', 'Gaunpalika', '5', 'Sudhdhodhan'),
(526, '49016', '49', 'RUPANDEHI', 'Tillotama', 'Nagarpalika', '5', 'Tillotama'),
(527, '49099', '49', 'RUPANDEHI', 'Lumbini Sanskritik Development Area', 'Development Area', '5', 'Lumbini Sanskritik Development Area'),
(528, '50001', '50', 'KAPILBASTU', 'Banganga', 'Nagarpalika', '5', 'Banganga'),
(529, '50002', '50', 'KAPILBASTU', 'Bijayanagar', 'Gaunpalika', '5', 'Bijayanagar'),
(530, '50003', '50', 'KAPILBASTU', 'Buddhabhumi', 'Nagarpalika', '5', 'Buddhabhumi'),
(531, '50004', '50', 'KAPILBASTU', 'Kapilbastu', 'Nagarpalika', '5', 'Kapilbastu'),
(532, '50005', '50', 'KAPILBASTU', 'Krishnanagar', 'Nagarpalika', '5', 'Krishnanagar'),
(533, '50006', '50', 'KAPILBASTU', 'Maharajgunj', 'Nagarpalika', '5', 'Maharajgunj'),
(534, '50007', '50', 'KAPILBASTU', 'Mayadevi', 'Gaunpalika', '5', 'Mayadevi'),
(535, '50008', '50', 'KAPILBASTU', 'Shivaraj', 'Nagarpalika', '5', 'Shivaraj'),
(536, '50009', '50', 'KAPILBASTU', 'Suddhodhan', 'Gaunpalika', '5', 'Suddhodhan'),
(537, '50010', '50', 'KAPILBASTU', 'Yashodhara', 'Gaunpalika', '5', 'Yashodhara'),
(538, '51001', '51', 'ARGHAKHANCHI', 'Bhumekasthan', 'Nagarpalika', '5', 'Bhumekasthan'),
(539, '51002', '51', 'ARGHAKHANCHI', 'Chhatradev', 'Gaunpalika', '5', 'Chhatradev'),
(540, '51003', '51', 'ARGHAKHANCHI', 'Malarani', 'Gaunpalika', '5', 'Malarani'),
(541, '51004', '51', 'ARGHAKHANCHI', 'Panini', 'Gaunpalika', '5', 'Panini'),
(542, '51005', '51', 'ARGHAKHANCHI', 'Sandhikharka', 'Nagarpalika', '5', 'Sandhikharka'),
(543, '51006', '51', 'ARGHAKHANCHI', 'Sitganga', 'Nagarpalika', '5', 'Sitganga'),
(544, '52001', '52', 'PYUTHAN', 'Ayirabati', 'Gaunpalika', '5', 'Ayirabati'),
(545, '52002', '52', 'PYUTHAN', 'Gaumukhi', 'Gaunpalika', '5', 'Gaumukhi'),
(546, '52003', '52', 'PYUTHAN', 'Jhimruk', 'Gaunpalika', '5', 'Jhimruk'),
(547, '52004', '52', 'PYUTHAN', 'Mallarani', 'Gaunpalika', '5', 'Mallarani'),
(548, '52005', '52', 'PYUTHAN', 'Mandavi', 'Gaunpalika', '5', 'Mandavi'),
(549, '52006', '52', 'PYUTHAN', 'Naubahini', 'Gaunpalika', '5', 'Naubahini'),
(550, '52007', '52', 'PYUTHAN', 'Pyuthan', 'Nagarpalika', '5', 'Pyuthan'),
(551, '52008', '52', 'PYUTHAN', 'Sarumarani', 'Gaunpalika', '5', 'Sarumarani'),
(552, '52009', '52', 'PYUTHAN', 'Sworgadwary', 'Nagarpalika', '5', 'Sworgadwary'),
(553, '53001', '53', 'ROLPA', 'Duikholi', 'Gaunpalika', '5', 'Paribartan'),
(554, '53002', '53', 'ROLPA', 'Lungri', 'Gaunpalika', '5', 'Lungri'),
(555, '53003', '53', 'ROLPA', 'Madi', 'Gaunpalika', '5', 'Madi'),
(556, '53004', '53', 'ROLPA', 'Rolpa', 'Nagarpalika', '5', 'Rolpa'),
(557, '53005', '53', 'ROLPA', 'Runtigadi', 'Gaunpalika', '5', 'Runtigadi'),
(558, '53006', '53', 'ROLPA', 'Sukidaha', 'Gaunpalika', '5', 'Sukidaha'),
(559, '53007', '53', 'ROLPA', 'Sunchhahari', 'Gaunpalika', '5', 'Sunchhahari'),
(560, '53008', '53', 'ROLPA', 'Suwarnabati', 'Gaunpalika', '5', 'Suwarnabati'),
(561, '53009', '53', 'ROLPA', 'Thawang', 'Gaunpalika', '5', 'Thawang'),
(562, '53010', '53', 'ROLPA', 'Tribeni', 'Gaunpalika', '5', 'Tribeni'),
(563, '54001', '54', 'RUKUM_W', 'Aathbiskot', 'Nagarpalika', '6', 'Aathbiskot'),
(564, '54002', '54', 'RUKUM_W', 'Banfikot', 'Gaunpalika', '6', 'Banfikot'),
(565, '54003', '54', 'RUKUM_W', 'Chaurjahari', 'Nagarpalika', '6', 'Chaurjahari'),
(566, '54004', '54', 'RUKUM_W', 'Musikot', 'Nagarpalika', '6', 'Musikot'),
(567, '54005', '54', 'RUKUM_W', 'Sani Bheri', 'Gaunpalika', '6', 'Sani Bheri'),
(568, '54006', '54', 'RUKUM_W', 'Tribeni', 'Gaunpalika', '6', 'Tribeni'),
(569, '55001', '55', 'SALYAN', 'Bagchaur', 'Nagarpalika', '6', 'Bagchaur'),
(570, '55002', '55', 'SALYAN', 'Bangad Kupinde', 'Nagarpalika', '6', 'Bangad Kupinde'),
(571, '55003', '55', 'SALYAN', 'Chhatreshwori', 'Gaunpalika', '6', 'Chhatreshwori'),
(572, '55004', '55', 'SALYAN', 'Darma', 'Gaunpalika', '6', 'Darma'),
(573, '55005', '55', 'SALYAN', 'Dhorchaur', 'Gaunpalika', '6', 'Shiddhakumak'),
(574, '55006', '55', 'SALYAN', 'Kalimati', 'Gaunpalika', '6', 'Kalimati'),
(575, '55007', '55', 'SALYAN', 'Kapurkot', 'Gaunpalika', '6', 'Kapurkot'),
(576, '55008', '55', 'SALYAN', 'Kumakhmalika', 'Gaunpalika', '6', 'Kumakh'),
(577, '55009', '55', 'SALYAN', 'Sharada', 'Nagarpalika', '6', 'Sharada'),
(578, '55010', '55', 'SALYAN', 'Tribeni', 'Gaunpalika', '6', 'Tribeni'),
(579, '56001', '56', 'DANG', 'Babai', 'Gaunpalika', '5', 'Babai'),
(580, '56002', '56', 'DANG', 'Banglachuli', 'Gaunpalika', '5', 'Banglachuli'),
(581, '56003', '56', 'DANG', 'Dangisharan', 'Gaunpalika', '5', 'Dangisharan'),
(582, '56004', '56', 'DANG', 'Gadhawa', 'Gaunpalika', '5', 'Gadhawa'),
(583, '56005', '56', 'DANG', 'Ghorahi', 'Upamahanagarpalika', '5', 'Ghorahi'),
(584, '56006', '56', 'DANG', 'Lamahi', 'Nagarpalika', '5', 'Lamahi'),
(585, '56007', '56', 'DANG', 'Rajpur', 'Gaunpalika', '5', 'Rajpur'),
(586, '56008', '56', 'DANG', 'Rapti', 'Gaunpalika', '5', 'Rapti'),
(587, '56009', '56', 'DANG', 'Shantinagar', 'Gaunpalika', '5', 'Shantinagar'),
(588, '56010', '56', 'DANG', 'Tulsipur', 'Upamahanagarpalika', '5', 'Tulsipur'),
(589, '57001', '57', 'BANKE', 'Baijanath', 'Gaunpalika', '5', 'Baijanath'),
(590, '57002', '57', 'BANKE', 'Duduwa', 'Gaunpalika', '5', 'Duduwa'),
(591, '57003', '57', 'BANKE', 'Janki', 'Gaunpalika', '5', 'Janki'),
(592, '57004', '57', 'BANKE', 'Khajura', 'Gaunpalika', '5', 'Khajura'),
(593, '57005', '57', 'BANKE', 'Kohalpur', 'Nagarpalika', '5', 'Kohalpur'),
(594, '57006', '57', 'BANKE', 'Narainapur', 'Gaunpalika', '5', 'Narainapur'),
(595, '57007', '57', 'BANKE', 'Nepalgunj', 'Upamahanagarpalika', '5', 'Nepalgunj'),
(596, '57008', '57', 'BANKE', 'Rapti Sonari', 'Gaunpalika', '5', 'Rapti Sonari'),
(597, '58001', '58', 'BARDIYA', 'Badhaiyatal', 'Gaunpalika', '5', 'Badhaiyatal'),
(598, '58002', '58', 'BARDIYA', 'Bansagadhi', 'Nagarpalika', '5', 'Bansagadhi'),
(599, '58003', '58', 'BARDIYA', 'Barbardiya', 'Nagarpalika', '5', 'Barbardiya'),
(600, '58004', '58', 'BARDIYA', 'Geruwa', 'Gaunpalika', '5', 'Geruwa'),
(601, '58005', '58', 'BARDIYA', 'Gulariya', 'Nagarpalika', '5', 'Gulariya'),
(602, '58006', '58', 'BARDIYA', 'Madhuwan', 'Nagarpalika', '5', 'Madhuwan'),
(603, '58007', '58', 'BARDIYA', 'Rajapur', 'Nagarpalika', '5', 'Rajapur'),
(604, '58008', '58', 'BARDIYA', 'Thakurbaba', 'Nagarpalika', '5', 'Thakurbaba'),
(605, '58099', '58', 'BARDIYA', 'Bardiya National Park', 'National Park', '5', 'Bardiya National Park'),
(606, '59001', '59', 'SURKHET', 'Barahtal', 'Gaunpalika', '6', 'Barahtal'),
(607, '59002', '59', 'SURKHET', 'Bheriganga', 'Nagarpalika', '6', 'Bheriganga'),
(608, '59003', '59', 'SURKHET', 'Birendranagar', 'Nagarpalika', '6', 'Birendranagar'),
(609, '59004', '59', 'SURKHET', 'Chaukune', 'Gaunpalika', '6', 'Chaukune'),
(610, '59005', '59', 'SURKHET', 'Chingad', 'Gaunpalika', '6', 'Chingad'),
(611, '59006', '59', 'SURKHET', 'Gurbhakot', 'Nagarpalika', '6', 'Gurbhakot'),
(612, '59007', '59', 'SURKHET', 'Lekbeshi', 'Nagarpalika', '6', 'Lekbeshi'),
(613, '59008', '59', 'SURKHET', 'Panchpuri', 'Nagarpalika', '6', 'Panchpuri'),
(614, '59009', '59', 'SURKHET', 'Simta', 'Gaunpalika', '6', 'Simta'),
(615, '60001', '60', 'DAILEKH', 'Aathabis', 'Nagarpalika', '6', 'Aathabis'),
(616, '60002', '60', 'DAILEKH', 'Bhagawatimai', 'Gaunpalika', '6', 'Bhagawatimai'),
(617, '60003', '60', 'DAILEKH', 'Bhairabi', 'Gaunpalika', '6', 'Bhairabi'),
(618, '60004', '60', 'DAILEKH', 'Chamunda Bindrasaini', 'Nagarpalika', '6', 'Chamunda Bindrasaini'),
(619, '60005', '60', 'DAILEKH', 'Dullu', 'Nagarpalika', '6', 'Dullu'),
(620, '60006', '60', 'DAILEKH', 'Dungeshwor', 'Gaunpalika', '6', 'Dungeshwor'),
(621, '60007', '60', 'DAILEKH', 'Gurans', 'Gaunpalika', '6', 'Gurans'),
(622, '60008', '60', 'DAILEKH', 'Mahabu', 'Gaunpalika', '6', 'Mahabu'),
(623, '60009', '60', 'DAILEKH', 'Narayan', 'Nagarpalika', '6', 'Narayan'),
(624, '60010', '60', 'DAILEKH', 'Naumule', 'Gaunpalika', '6', 'Naumule'),
(625, '60011', '60', 'DAILEKH', 'Thantikandh', 'Gaunpalika', '6', 'Thantikandh'),
(626, '61001', '61', 'JAJARKOT', 'Barekot', 'Gaunpalika', '6', 'Barekot'),
(627, '61002', '61', 'JAJARKOT', 'Bheri', 'Nagarpalika', '6', 'Bheri'),
(628, '61003', '61', 'JAJARKOT', 'Chhedagad', 'Nagarpalika', '6', 'Chhedagad'),
(629, '61004', '61', 'JAJARKOT', 'Junichande', 'Gaunpalika', '6', 'Junichande'),
(630, '61005', '61', 'JAJARKOT', 'Kuse', 'Gaunpalika', '6', 'Kuse'),
(631, '61006', '61', 'JAJARKOT', 'Shiwalaya', 'Gaunpalika', '6', 'Shiwalaya'),
(632, '61007', '61', 'JAJARKOT', 'Tribeni Nalagad', 'Nagarpalika', '6', 'Nalagad'),
(633, '62001', '62', 'DOLPA', 'Chharka Tangsong', 'Gaunpalika', '6', 'Chharka Tangsong'),
(634, '62002', '62', 'DOLPA', 'Dolpo Buddha', 'Gaunpalika', '6', 'Dolpo Buddha'),
(635, '62003', '62', 'DOLPA', 'Jagadulla', 'Gaunpalika', '6', 'Jagadulla'),
(636, '62004', '62', 'DOLPA', 'Kaike', 'Gaunpalika', '6', 'Kaike'),
(637, '62005', '62', 'DOLPA', 'Mudkechula', 'Gaunpalika', '6', 'Mudkechula'),
(638, '62006', '62', 'DOLPA', 'Shey Phoksundo', 'Gaunpalika', '6', 'Shey Phoksundo'),
(639, '62007', '62', 'DOLPA', 'Thuli Bheri', 'Nagarpalika', '6', 'Thuli Bheri'),
(640, '62008', '62', 'DOLPA', 'Tripurasundari', 'Nagarpalika', '6', 'Tripurasundari'),
(641, '63001', '63', 'JUMLA', 'Chandannath', 'Nagarpalika', '6', 'Chandannath'),
(642, '63002', '63', 'JUMLA', 'Guthichaur', 'Gaunpalika', '6', 'Guthichaur'),
(643, '63003', '63', 'JUMLA', 'Hima', 'Gaunpalika', '6', 'Hima');
INSERT INTO `localbodies` (`id`, `DDGN`, `DCOD`, `district`, `local_bodies`, `type`, `state`, `changed_ga_pa`) VALUES
(644, '63004', '63', 'JUMLA', 'Kanakasundari', 'Gaunpalika', '6', 'Kanakasundari'),
(645, '63005', '63', 'JUMLA', 'Patrasi', 'Gaunpalika', '6', 'Patrasi'),
(646, '63006', '63', 'JUMLA', 'Sinja', 'Gaunpalika', '6', 'Sinja'),
(647, '63007', '63', 'JUMLA', 'Tatopani', 'Gaunpalika', '6', 'Tatopani'),
(648, '63008', '63', 'JUMLA', 'Tila', 'Gaunpalika', '6', 'Tila'),
(649, '64001', '64', 'KALIKOT', 'Kalika', 'Gaunpalika', '6', 'Kalika'),
(650, '64002', '64', 'KALIKOT', 'Khandachakra', 'Nagarpalika', '6', 'Khandachakra'),
(651, '64003', '64', 'KALIKOT', 'Mahawai', 'Gaunpalika', '6', 'Mahawai'),
(652, '64004', '64', 'KALIKOT', 'Naraharinath', 'Gaunpalika', '6', 'Naraharinath'),
(653, '64005', '64', 'KALIKOT', 'Pachaljharana', 'Gaunpalika', '6', 'Pachaljharana'),
(654, '64006', '64', 'KALIKOT', 'Palata', 'Gaunpalika', '6', 'Palata'),
(655, '64007', '64', 'KALIKOT', 'Raskot', 'Nagarpalika', '6', 'Raskot'),
(656, '64008', '64', 'KALIKOT', 'Sanni Tribeni', 'Gaunpalika', '6', 'Sanni Tribeni'),
(657, '64009', '64', 'KALIKOT', 'Tilagufa', 'Nagarpalika', '6', 'Tilagufa'),
(658, '65001', '65', 'MUGU', 'Chhayanath Rara', 'Nagarpalika', '6', 'Chhayanath Rara'),
(659, '65002', '65', 'MUGU', 'Khatyad', 'Gaunpalika', '6', 'Khatyad'),
(660, '65003', '65', 'MUGU', 'Mugum Karmarong', 'Gaunpalika', '6', 'Mugum Karmarong'),
(661, '65004', '65', 'MUGU', 'Soru', 'Gaunpalika', '6', 'Soru'),
(662, '66001', '66', 'HUMLA', 'Adanchuli', 'Gaunpalika', '6', 'Adanchuli'),
(663, '66002', '66', 'HUMLA', 'Chankheli', 'Gaunpalika', '6', 'Chankheli'),
(664, '66003', '66', 'HUMLA', 'Kharpunath', 'Gaunpalika', '6', 'Kharpunath'),
(665, '66004', '66', 'HUMLA', 'Namkha', 'Gaunpalika', '6', 'Namkha'),
(666, '66005', '66', 'HUMLA', 'Sarkegad', 'Gaunpalika', '6', 'Sarkegad'),
(667, '66006', '66', 'HUMLA', 'Simkot', 'Gaunpalika', '6', 'Simkot'),
(668, '66007', '66', 'HUMLA', 'Tanjakot', 'Gaunpalika', '6', 'Tanjakot'),
(669, '67001', '67', 'BAJURA', 'Badimalika', 'Nagarpalika', '7', 'Badimalika'),
(670, '67002', '67', 'BAJURA', 'Budhiganga', 'Nagarpalika', '7', 'Budhiganga'),
(671, '67003', '67', 'BAJURA', 'Budhinanda', 'Nagarpalika', '7', 'Budhinanda'),
(672, '67004', '67', 'BAJURA', 'Chhededaha', 'Gaunpalika', '7', 'Chhededaha'),
(673, '67005', '67', 'BAJURA', 'Gaumul', 'Gaunpalika', '7', 'Gaumul'),
(674, '67006', '67', 'BAJURA', 'Himali', 'Gaunpalika', '7', 'Himali'),
(675, '67007', '67', 'BAJURA', 'Pandav Gupha', 'Gaunpalika', '7', 'Jaganath'),
(676, '67008', '67', 'BAJURA', 'Swami Kartik', 'Gaunpalika', '7', 'Swami Kartik'),
(677, '67009', '67', 'BAJURA', 'Tribeni', 'Nagarpalika', '7', 'Tribeni'),
(678, '67099', '67', 'BAJURA', 'Khaptad National Park', 'National Park', '7', 'Khaptad National Park'),
(679, '68001', '68', 'BAJHANG', 'Bithadchir', 'Gaunpalika', '7', 'Bithadchir'),
(680, '68002', '68', 'BAJHANG', 'Bungal', 'Nagarpalika', '7', 'Bungal'),
(681, '68003', '68', 'BAJHANG', 'Chabispathivera', 'Gaunpalika', '7', 'Chabispathivera'),
(682, '68004', '68', 'BAJHANG', 'Durgathali', 'Gaunpalika', '7', 'Durgathali'),
(683, '68005', '68', 'BAJHANG', 'JayaPrithivi', 'Nagarpalika', '7', 'JayaPrithivi'),
(684, '68006', '68', 'BAJHANG', 'Kanda', 'Gaunpalika', '7', 'Sanpal'),
(685, '68007', '68', 'BAJHANG', 'Kedarseu', 'Gaunpalika', '7', 'Kedarseu'),
(686, '68008', '68', 'BAJHANG', 'Khaptadchhanna', 'Gaunpalika', '7', 'Khaptadchhanna'),
(687, '68009', '68', 'BAJHANG', 'Masta', 'Gaunpalika', '7', 'Masta'),
(688, '68010', '68', 'BAJHANG', 'Surma', 'Gaunpalika', '7', 'Surma'),
(689, '68011', '68', 'BAJHANG', 'Talkot', 'Gaunpalika', '7', 'Talkot'),
(690, '68012', '68', 'BAJHANG', 'Thalara', 'Gaunpalika', '7', 'Thalara'),
(691, '68099', '68', 'BAJHANG', 'Khaptad National Park', 'National Park', '7', 'Khaptad National Park'),
(692, '69001', '69', 'ACHHAM', 'Bannigadhi Jayagadh', 'Gaunpalika', '7', 'Bannigadhi Jayagadh'),
(693, '69002', '69', 'ACHHAM', 'Chaurpati', 'Gaunpalika', '7', 'Chaurpati'),
(694, '69003', '69', 'ACHHAM', 'Dhakari', 'Gaunpalika', '7', 'Dhakari'),
(695, '69004', '69', 'ACHHAM', 'Kamalbazar', 'Nagarpalika', '7', 'Kamalbazar'),
(696, '69005', '69', 'ACHHAM', 'Mangalsen', 'Nagarpalika', '7', 'Mangalsen'),
(697, '69006', '69', 'ACHHAM', 'Mellekh', 'Gaunpalika', '7', 'Mellekh'),
(698, '69007', '69', 'ACHHAM', 'Panchadewal Binayak', 'Nagarpalika', '7', 'Panchadewal Binayak'),
(699, '69008', '69', 'ACHHAM', 'Ramaroshan', 'Gaunpalika', '7', 'Ramaroshan'),
(700, '69009', '69', 'ACHHAM', 'Sanphebagar', 'Nagarpalika', '7', 'Sanphebagar'),
(701, '69010', '69', 'ACHHAM', 'Turmakhad', 'Gaunpalika', '7', 'Turmakhad'),
(702, '69099', '69', 'ACHHAM', 'Khaptad National Park', 'National Park', '7', 'Khaptad National Park'),
(703, '70001', '70', 'DOTI', 'Adharsha', 'Gaunpalika', '7', 'Adharsha'),
(704, '70002', '70', 'DOTI', 'Badikedar', 'Gaunpalika', '7', 'Badikedar'),
(705, '70003', '70', 'DOTI', 'Bogtan', 'Gaunpalika', '7', 'Bogtan'),
(706, '70004', '70', 'DOTI', 'Dipayal Silgadi', 'Nagarpalika', '7', 'Dipayal Silgadi'),
(707, '70005', '70', 'DOTI', 'Jorayal', 'Gaunpalika', '7', 'Jorayal'),
(708, '70006', '70', 'DOTI', 'K I Singh', 'Gaunpalika', '7', 'K I Singh'),
(709, '70007', '70', 'DOTI', 'Purbichauki', 'Gaunpalika', '7', 'Purbichauki'),
(710, '70008', '70', 'DOTI', 'Sayal', 'Gaunpalika', '7', 'Sayal'),
(711, '70009', '70', 'DOTI', 'Shikhar', 'Nagarpalika', '7', 'Shikhar'),
(712, '70099', '70', 'DOTI', 'Khaptad National Park', 'National Park', '7', 'Khaptad National Park'),
(713, '71001', '71', 'KAILALI', 'Bardagoriya', 'Gaunpalika', '7', 'Bardagoriya'),
(714, '71002', '71', 'KAILALI', 'Bhajani', 'Nagarpalika', '7', 'Bhajani'),
(715, '71003', '71', 'KAILALI', 'Chure', 'Gaunpalika', '7', 'Chure'),
(716, '71004', '71', 'KAILALI', 'Dhangadhi', 'Upamahanagarpalika', '7', 'Dhangadhi'),
(717, '71005', '71', 'KAILALI', 'Gauriganga', 'Nagarpalika', '7', 'Gauriganga'),
(718, '71006', '71', 'KAILALI', 'Ghodaghodi', 'Nagarpalika', '7', 'Ghodaghodi'),
(719, '71007', '71', 'KAILALI', 'Godawari', 'Nagarpalika', '7', 'Godawari'),
(720, '71008', '71', 'KAILALI', 'Janaki', 'Gaunpalika', '7', 'Janaki'),
(721, '71009', '71', 'KAILALI', 'Joshipur', 'Gaunpalika', '7', 'Joshipur'),
(722, '71010', '71', 'KAILALI', 'Kailari', 'Gaunpalika', '7', 'Kailari'),
(723, '71011', '71', 'KAILALI', 'Lamkichuha', 'Nagarpalika', '7', 'Lamkichuha'),
(724, '71012', '71', 'KAILALI', 'Mohanyal', 'Gaunpalika', '7', 'Mohanyal'),
(725, '71013', '71', 'KAILALI', 'Tikapur', 'Nagarpalika', '7', 'Tikapur'),
(726, '72001', '72', 'KANCHANPUR', 'Bedkot', 'Nagarpalika', '7', 'Bedkot'),
(727, '72002', '72', 'KANCHANPUR', 'Belauri', 'Nagarpalika', '7', 'Belauri'),
(728, '72003', '72', 'KANCHANPUR', 'Beldandi', 'Gaunpalika', '7', 'Beldandi'),
(729, '72004', '72', 'KANCHANPUR', 'Bhimdatta', 'Nagarpalika', '7', 'Bhimdatta'),
(730, '72005', '72', 'KANCHANPUR', 'Krishnapur', 'Nagarpalika', '7', 'Krishnapur'),
(731, '72006', '72', 'KANCHANPUR', 'Laljhadi', 'Gaunpalika', '7', 'Laljhadi'),
(732, '72007', '72', 'KANCHANPUR', 'Mahakali', 'Nagarpalika', '7', 'Mahakali'),
(733, '72008', '72', 'KANCHANPUR', 'Punarbas', 'Nagarpalika', '7', 'Punarbas'),
(734, '72009', '72', 'KANCHANPUR', 'Shuklaphanta', 'Nagarpalika', '7', 'Shuklaphanta'),
(735, '72099', '72', 'KANCHANPUR', 'Shuklaphanta National Park', 'National Park', '7', 'Shuklaphanta National Park'),
(736, '73001', '73', 'DADELDHURA', 'Ajaymeru', 'Gaunpalika', '7', 'Ajaymeru'),
(737, '73002', '73', 'DADELDHURA', 'Alital', 'Gaunpalika', '7', 'Alital'),
(738, '73003', '73', 'DADELDHURA', 'Amargadhi', 'Nagarpalika', '7', 'Amargadhi'),
(739, '73004', '73', 'DADELDHURA', 'Bhageshwar', 'Gaunpalika', '7', 'Bhageshwar'),
(740, '73005', '73', 'DADELDHURA', 'Ganayapdhura', 'Gaunpalika', '7', 'Ganayapdhura'),
(741, '73006', '73', 'DADELDHURA', 'Nawadurga', 'Gaunpalika', '7', 'Nawadurga'),
(742, '73007', '73', 'DADELDHURA', 'Parashuram', 'Nagarpalika', '7', 'Parashuram'),
(743, '74001', '74', 'BAITADI', 'Dasharathchanda', 'Nagarpalika', '7', 'Dasharathchanda'),
(744, '74002', '74', 'BAITADI', 'Dilasaini', 'Gaunpalika', '7', 'Dilasaini'),
(745, '74003', '74', 'BAITADI', 'Dogadakedar', 'Gaunpalika', '7', 'Dogadakedar'),
(746, '74004', '74', 'BAITADI', 'Melauli', 'Nagarpalika', '7', 'Melauli'),
(747, '74005', '74', 'BAITADI', 'Pancheshwar', 'Gaunpalika', '7', 'Pancheshwar'),
(748, '74006', '74', 'BAITADI', 'Patan', 'Nagarpalika', '7', 'Patan'),
(749, '74007', '74', 'BAITADI', 'Purchaudi', 'Nagarpalika', '7', 'Purchaudi'),
(750, '74008', '74', 'BAITADI', 'Shivanath', 'Gaunpalika', '7', 'Shivanath'),
(751, '74009', '74', 'BAITADI', 'Sigas', 'Gaunpalika', '7', 'Sigas'),
(752, '74010', '74', 'BAITADI', 'Surnaya', 'Gaunpalika', '7', 'Surnaya'),
(753, '75001', '75', 'DARCHULA', 'Apihimal', 'Gaunpalika', '7', 'Apihimal'),
(754, '75002', '75', 'DARCHULA', 'Byas', 'Gaunpalika', '7', 'Byas'),
(755, '75003', '75', 'DARCHULA', 'Dunhu', 'Gaunpalika', '7', 'Dunhu'),
(756, '75004', '75', 'DARCHULA', 'Lekam', 'Gaunpalika', '7', 'Lekam'),
(757, '75005', '75', 'DARCHULA', 'Mahakali', 'Nagarpalika', '7', 'Mahakali'),
(758, '75006', '75', 'DARCHULA', 'Malikaarjun', 'Gaunpalika', '7', 'Malikaarjun'),
(759, '75007', '75', 'DARCHULA', 'Marma', 'Gaunpalika', '7', 'Marma'),
(760, '75008', '75', 'DARCHULA', 'Naugad', 'Gaunpalika', '7', 'Naugad'),
(761, '75009', '75', 'DARCHULA', 'Shailyashikhar', 'Nagarpalika', '7', 'Shailyashikhar'),
(762, '76001', '76', 'NAWALPARASI_E', 'Binayee Tribeni', 'Gaunpalika', '4', 'Binayee Tribeni'),
(763, '76002', '76', 'NAWALPARASI_E', 'Bulingtar', 'Gaunpalika', '4', 'Bulingtar'),
(764, '76003', '76', 'NAWALPARASI_E', 'Bungdikali', 'Gaunpalika', '4', 'Bungdikali'),
(765, '76004', '76', 'NAWALPARASI_E', 'Devchuli', 'Nagarpalika', '4', 'Devchuli'),
(766, '76005', '76', 'NAWALPARASI_E', 'Gaidakot', 'Nagarpalika', '4', 'Gaidakot'),
(767, '76006', '76', 'NAWALPARASI_E', 'Hupsekot', 'Gaunpalika', '4', 'Hupsekot'),
(768, '76007', '76', 'NAWALPARASI_E', 'Kawasoti', 'Nagarpalika', '4', 'Kawasoti'),
(769, '76008', '76', 'NAWALPARASI_E', 'Madhyabindu', 'Nagarpalika', '4', 'Madhyabindu'),
(770, '76099', '76', 'NAWALPARASI_E', 'Chitawan National Park', 'National Park', '4', 'Chitawan National Park'),
(771, '77001', '77', 'RUKUM_E', 'Bhume', 'Gaunpalika', '5', 'Bhume'),
(772, '77002', '77', 'RUKUM_E', 'Putha Uttarganga', 'Gaunpalika', '5', 'Putha Uttarganga'),
(773, '77003', '77', 'RUKUM_E', 'Sisne', 'Gaunpalika', '5', 'Sisne'),
(774, '77099', '77', 'RUKUM_E', 'Dhorpatan Hunting Reserve', 'Hunting Reserve', '5', 'Dhorpatan Hunting Reserve');

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1516704041),
('m140209_132017_init', 1516706519),
('m140403_174025_create_account_table', 1516706519),
('m140504_113157_update_tables', 1516706519),
('m140504_130429_create_token_table', 1516706519),
('m140506_102106_rbac_init', 1516789437),
('m140830_171933_fix_ip_field', 1516706519),
('m140830_172703_change_account_table_name', 1516706519),
('m141222_110026_update_ip_field', 1516706519),
('m141222_135246_alter_username_length', 1516706519),
('m150614_103145_update_social_account_table', 1516706520),
('m150623_212711_fix_username_notnull', 1516706520),
('m151218_234654_add_timezone_to_profile', 1516706520),
('m160929_103127_add_last_login_at_to_user_table', 1516706520),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1516789437),
('m180118_094220_createtable_datacard', 1516706536),
('m180119_084933_creeatetable_localbodies', 1516706536),
('m180119_104109_creeatetable_regions', 1516706537),
('m180124_201315_addcolumn_locked_at_for_table_datacards', 1516825083),
('m180125_050023_CREATE_CONSTRAINT_unique_data_card_no', 1516856568),
('m180125_053209_ADD_COLUMN_uuid_FOR_TABLE_datacards', 1516859279);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int(11) NOT NULL,
  `district` varchar(255) DEFAULT NULL,
  `no_of_ga_pa` int(11) DEFAULT NULL,
  `ecology` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `zone` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `district`, `no_of_ga_pa`, `ecology`, `region`, `zone`) VALUES
(1, 'ACHHAM', 11, 'Hills Zone', 'FarWestern', 'Seti'),
(2, 'ARGHAKHANCHI', 6, 'Hills Zone', 'Western', 'Lumbini'),
(3, 'BAGLUNG', 11, 'Hills Zone', 'Western', 'Dhawalagiri'),
(4, 'BAITADI', 10, 'Hills Zone', 'FarWestern', 'Mahakali'),
(5, 'BAJHANG', 13, 'Mountains Zone', 'FarWestern', 'Seti'),
(6, 'BAJURA', 10, 'Mountains Zone', 'FarWestern', 'Seti'),
(7, 'BANKE', 8, 'Terai Zone', 'MidWestern', 'Bheri'),
(8, 'BARA', 16, 'Terai Zone', 'Central', 'Narayani'),
(9, 'BARDIYA', 10, 'Terai Zone', 'MidWestern', 'Bheri'),
(10, 'BHAKTAPUR', 4, 'Hills Zone', 'Central', 'Bagamati'),
(11, 'BHOJPUR', 9, 'Hills Zone', 'Eastern', 'Koshi'),
(12, 'CHITAWAN', 8, 'Terai Zone', 'Central', 'Narayani'),
(13, 'DADELDHURA', 7, 'Hills Zone', 'FarWestern', 'Mahakali'),
(14, 'DAILEKH', 11, 'Hills Zone', 'MidWestern', 'Bheri'),
(15, 'DANG', 10, 'Terai Zone', 'MidWestern', 'Rapti'),
(16, 'DARCHULA', 9, 'Mountains Zone', 'FarWestern', 'Mahakali'),
(17, 'DHADING', 13, 'Hills Zone', 'Central', 'Bagamati'),
(18, 'DHANKUTA', 7, 'Hills Zone', 'Eastern', 'Koshi'),
(19, 'DHANUSHA', 18, 'Terai Zone', 'Central', 'Janakpur'),
(20, 'DOLAKHA', 9, 'Mountains Zone', 'Central', 'Janakpur'),
(21, 'DOLPA', 8, 'Mountains Zone', 'MidWestern', 'Karnali'),
(22, 'DOTI', 10, 'Hills Zone', 'FarWestern', 'Seti'),
(23, 'GORKHA', 11, 'Hills Zone', 'Western', 'Gandaki'),
(24, 'GULMI', 12, 'Hills Zone', 'Western', 'Lumbini'),
(25, 'HUMLA', 7, 'Mountains Zone', 'MidWestern', 'Karnali'),
(26, 'ILAM', 10, 'Hills Zone', 'Eastern', 'Mechi'),
(27, 'JAJARKOT', 7, 'Hills Zone', 'MidWestern', 'Bheri'),
(28, 'JHAPA', 15, 'Terai Zone', 'Eastern', 'Mechi'),
(29, 'JUMLA', 8, 'Mountains Zone', 'MidWestern', 'Karnali'),
(30, 'KABHREPALANCHOK', 13, 'Hills Zone', 'Central', 'Bagamati'),
(31, 'KAILALI', 13, 'Terai Zone', 'FarWestern', 'Seti'),
(32, 'KALIKOT', 9, 'Mountains Zone', 'MidWestern', 'Karnali'),
(33, 'KANCHANPUR', 10, 'Terai Zone', 'FarWestern', 'Mahakali'),
(34, 'KAPILBASTU', 10, 'Terai Zone', 'Western', 'Lumbini'),
(35, 'KASKI', 5, 'Hills Zone', 'Western', 'Gandaki'),
(36, 'KATHMANDU', 11, 'Hills Zone', 'Central', 'Bagamati'),
(37, 'KHOTANG', 10, 'Hills Zone', 'Eastern', 'Sagarmatha'),
(38, 'LALITPUR', 6, 'Hills Zone', 'Central', 'Bagamati'),
(39, 'LAMJUNG', 8, 'Hills Zone', 'Western', 'Gandaki'),
(40, 'MAHOTTARI', 15, 'Terai Zone', 'Central', 'Janakpur'),
(41, 'MAKAWANPUR', 12, 'Hills Zone', 'Central', 'Narayani'),
(42, 'MANANG', 4, 'Mountains Zone', 'Western', 'Gandaki'),
(43, 'MORANG', 17, 'Terai Zone', 'Eastern', 'Koshi'),
(44, 'MUGU', 4, 'Mountains Zone', 'MidWestern', 'Karnali'),
(45, 'MUSTANG', 5, 'Mountains Zone', 'Western', 'Dhawalagiri'),
(46, 'MYAGDI', 7, 'Hills Zone', 'Western', 'Dhawalagiri'),
(47, 'NAWALPARASI_E', 9, 'Terai Zone', 'Western', 'Lumbini'),
(48, 'NAWALPARASI_W', 7, 'Terai Zone', 'Western', 'Lumbini'),
(49, 'NUWAKOT', 14, 'Hills Zone', 'Central', 'Bagamati'),
(50, 'OKHALDHUNGA', 8, 'Hills Zone', 'Eastern', 'Sagarmatha'),
(51, 'PALPA', 10, 'Hills Zone', 'Western', 'Lumbini'),
(52, 'PANCHTHAR', 8, 'Hills Zone', 'Eastern', 'Mechi'),
(53, 'PARBAT', 7, 'Hills Zone', 'Western', 'Dhawalagiri'),
(54, 'PARSA', 16, 'Terai Zone', 'Central', 'Narayani'),
(55, 'PYUTHAN', 9, 'Hills Zone', 'MidWestern', 'Rapti'),
(56, 'RAMECHHAP', 8, 'Hills Zone', 'Central', 'Janakpur'),
(57, 'RASUWA', 5, 'Mountains Zone', 'Central', 'Bagamati'),
(58, 'RAUTAHAT', 18, 'Terai Zone', 'Central', 'Narayani'),
(59, 'ROLPA', 10, 'Hills Zone', 'MidWestern', 'Rapti'),
(60, 'RUKUM_E', 4, 'Hills Zone', 'MidWestern', 'Rapti'),
(61, 'RUKUM_W', 6, 'Hills Zone', 'MidWestern', 'Rapti'),
(62, 'RUPANDEHI', 17, 'Terai Zone', 'Western', 'Lumbini'),
(63, 'SALYAN', 10, 'Hills Zone', 'MidWestern', 'Rapti'),
(64, 'SANKHUWASABHA', 10, 'Mountains Zone', 'Eastern', 'Koshi'),
(65, 'SAPTARI', 19, 'Terai Zone', 'Eastern', 'Sagarmatha'),
(66, 'SARLAHI', 20, 'Terai Zone', 'Central', 'Janakpur'),
(67, 'SINDHULI', 9, 'Hills Zone', 'Central', 'Janakpur'),
(68, 'SINDHUPALCHOK', 12, 'Mountains Zone', 'Central', 'Bagamati'),
(69, 'SIRAHA', 17, 'Terai Zone', 'Eastern', 'Sagarmatha'),
(70, 'SOLUKHUMBU', 8, 'Mountains Zone', 'Eastern', 'Sagarmatha'),
(71, 'SUNSARI', 13, 'Terai Zone', 'Eastern', 'Koshi'),
(72, 'SURKHET', 9, 'Hills Zone', 'MidWestern', 'Bheri'),
(73, 'SYANGJA', 11, 'Hills Zone', 'Western', 'Gandaki'),
(74, 'TANAHU', 10, 'Hills Zone', 'Western', 'Gandaki'),
(75, 'TAPLEJUNG', 9, 'Mountains Zone', 'Eastern', 'Mechi'),
(76, 'TERHATHUM', 6, 'Hills Zone', 'Eastern', 'Koshi'),
(77, 'UDAYAPUR', 9, 'Hills Zone', 'Eastern', 'Sagarmatha');

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

DROP TABLE IF EXISTS `social_account`;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'uHrU2MY0IdfYejwSqvDtYOaRRoxvRsGA', 1516706564, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'admin', 'admin@nset.org.np', '$2y$12$ttulGxeP/.y0zMU4Ajz9P..Nz/5NWsRrPZZ.Wiba6g1PhhbUggj0G', 'qhadgFdXsTGtjYdUrFUSZfOfYw-2Ef2N', 1516781825, NULL, NULL, '::1', 1516706564, 1516818009, 0, 1516859615),
(2, 'sadhikari', 'sadhikari@nset.org.np', '$2y$12$yucAXtly/j8CFBggipPST.r11JsVCKbzTDdeO5KhHB0z/7VBxsgvG', '3NUVP9zCOscAQgbRjw5pB-X9eZ2B6w8P', 1516707105, NULL, NULL, '::1', 1516707105, 1516707105, 0, 1516855850),
(3, 'dpujara', 'dpujara@nset.org.np', '$2y$12$0PPMuBgBSeLgO7nAqfZH2em0/DBk33FLE/MzOLIN1aP0xk9vgLqYq', '9AuzQKHXkSgWDGk_g57cSRt9Rz7vwJ7g', 1516707303, NULL, NULL, '::1', 1516707303, 1516707303, 0, 1516859590),
(4, 'sushilpandit', 'sushilpandit@nset.org.np', '$2y$12$J7C5MxR/WqL5oECpwB25O.7o3DhHyfTr2.LwbsBKX3BGVMqmsHl5S', 'IhkjA_Nna3FSmYu9rIS7pCqFEWqkmDc1', 1516707368, NULL, NULL, '::1', 1516707368, 1516784218, 0, 1516794025),
(5, 'ramshrestha', 'ramshrestha@nset.org.np', '$2y$12$Hk5215G7xuV6sg9uyDPMCeM1aQyvMcPFst5a7Nnr2119UQ3raa4dm', 'lvIluPdOzBQOp0FwjPUvDpBaKQ9qvV03', 1516707447, NULL, NULL, '::1', 1516707447, 1516707447, 0, 1516852846),
(6, 'demouser', 'demo@demo.com', '$2y$12$xG0o6c8fghlmujydbnNEK.2FIwD64ndod7xlwHkjOa/Tyvp2yuGPu', 'SHuaGfSkEFbTOTpSDvFsPoMfyWinSiUx', 1516785584, NULL, NULL, '::1', 1516785584, 1516785584, 0, 1516846735),
(8, 'enumeratoruser', 'enumerator@enumerator.com', '$2y$12$iEdslR9EOqL9jHpE5fw4fegOHrkh7eYw1Z.7n6euH1N9/vKF1GPLi', 'qxAjkT0OMdKp-k5J_QyYSZ00SaqLePKp', 1516785896, NULL, NULL, '::1', 1516785896, 1516785896, 0, 1516855799),
(9, 'datacardadminuser', 'datacardadminuser@datacardadminuser.com', '$2y$12$rL53gbgoRteMUVEF/nleUeI2Co2SUmIguCc/C/PIRJFTCLduligZ2', 'P3AP4YSNPT4G5OOad0r84L2HgVWorFVP', 1516785937, NULL, NULL, '::1', 1516785937, 1516785937, 0, 1516790129),
(10, 'datacardmoderator', 'moderator@datacard.com', '$2y$12$vOo/iajfQW6WFoBzqxY5c.3d308bDXE8DLFVxNSLI894n9PP9rhFu', 'Yw8OP9nv4FoIoJHzGKE0zj-hE9NVJnsP', 1516821305, NULL, NULL, '::1', 1516821305, 1516821305, 0, 1516855953);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `datacards`
--
ALTER TABLE `datacards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx-unique-data_card_no` (`data_card_no`),
  ADD UNIQUE KEY `idx-unique-uuid` (`uuid`);

--
-- Indexes for table `localbodies`
--
ALTER TABLE `localbodies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datacards`
--
ALTER TABLE `datacards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `localbodies`
--
ALTER TABLE `localbodies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
