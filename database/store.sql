-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2019 at 06:36 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `is_admin` enum('yes','no') CHARACTER SET latin1 NOT NULL DEFAULT 'no',
  `role` enum('superadmin','subadmin','customer','employee','waiter','new') CHARACTER SET latin1 NOT NULL DEFAULT 'customer',
  `first_name` text CHARACTER SET latin1,
  `last_name` text CHARACTER SET latin1,
  `slug` text,
  `image` varchar(255) NOT NULL DEFAULT 'userdefault.jpg',
  `email` text CHARACTER SET latin1,
  `country_code` int(3) NOT NULL DEFAULT '0',
  `phone` text CHARACTER SET latin1,
  `building_name` text,
  `area` text,
  `house_flat` text,
  `address` text CHARACTER SET latin1,
  `address2` text,
  `city` text CHARACTER SET latin1,
  `state` text CHARACTER SET latin1,
  `country` text CHARACTER SET latin1,
  `extra_direction` text,
  `username` text CHARACTER SET latin1,
  `password` text CHARACTER SET latin1,
  `device_id` text,
  `device_type` text,
  `created_on` datetime DEFAULT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('active','inactive','suspended','blocked') CHARACTER SET latin1 NOT NULL DEFAULT 'active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `is_admin`, `role`, `first_name`, `last_name`, `slug`, `image`, `email`, `country_code`, `phone`, `building_name`, `area`, `house_flat`, `address`, `address2`, `city`, `state`, `country`, `extra_direction`, `username`, `password`, `device_id`, `device_type`, `created_on`, `updated_on`, `status`) VALUES
(1, 'yes', 'superadmin', 'Super', 'Admin', NULL, 'userdefault.jpg', 'admin@email.com', 1, '(111) 111-1111', NULL, NULL, NULL, '123 Fake Street', NULL, 'Los Angeles', 'CA', 'US', NULL, 'superadmin', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL, '2019-08-01 00:00:00', '2019-08-04 11:18:36', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE IF NOT EXISTS `brand` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `slug` mediumtext,
  `image` mediumtext,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `image`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Brand 1', 'brand-1', 'brand-1.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(2, 'Brand 2', 'brand-2', 'brand-2.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(3, 'Brand 3', 'brand-3', 'brand-3.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(4, 'Brand 4', 'brand-4', 'brand-4.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(5, 'Brand 5', 'brand-5', 'brand-5.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(6, 'Brand 6', 'brand-6', 'brand-6.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(7, 'Brand 7', 'brand-7', 'brand-7.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(8, 'Brand 8', 'brand-8', 'brand-8.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(9, 'Brand 9', 'brand-9', 'brand-9.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39'),
(10, 'Brand 10', 'brand-10', 'brand-10.jpg', 1, '2019-11-03 01:36:39', '2019-11-02 21:36:39');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `slug` mediumtext,
  `image` mediumtext,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Category 1', 'category-1', 'category-1.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(2, 'Category 2', 'category-2', 'category-2.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(3, 'Category 3', 'category-3', 'category-3.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(4, 'Category 4', 'category-4', 'category-4.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(5, 'Category 5', 'category-5', 'category-5.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(6, 'Category 6', 'category-6', 'category-6.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(7, 'Category 7', 'category-7', 'category-7.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(8, 'Category 8', 'category-8', 'category-8.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(9, 'Category 9', 'category-9', 'category-9.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38'),
(10, 'Category 10', 'category-10', 'category-10.jpg', 1, '2019-11-03 01:37:38', '2019-11-02 21:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `slug` mediumtext,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `slug` mediumtext,
  `street_address` mediumtext,
  `city` mediumtext,
  `state` mediumtext,
  `country` mediumtext,
  `zip` mediumtext,
  `phone` mediumtext,
  `fax` mediumtext,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Country` varchar(100) DEFAULT NULL,
  `FIPS104` varchar(100) DEFAULT NULL,
  `ISO2` varchar(100) DEFAULT NULL,
  `ISO3` varchar(100) DEFAULT NULL,
  `ISON` varchar(100) DEFAULT NULL,
  `Internet` varchar(100) DEFAULT NULL,
  `Capital` varchar(100) DEFAULT NULL,
  `MapReference` varchar(100) DEFAULT NULL,
  `NationalitySingular` varchar(100) DEFAULT NULL,
  `NationalityPlural` varchar(100) DEFAULT NULL,
  `Currency` varchar(100) DEFAULT NULL,
  `CurrencyCode` varchar(100) DEFAULT NULL,
  `Population` varchar(100) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=276 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `Country`, `FIPS104`, `ISO2`, `ISO3`, `ISON`, `Internet`, `Capital`, `MapReference`, `NationalitySingular`, `NationalityPlural`, `Currency`, `CurrencyCode`, `Population`, `Title`, `Comment`) VALUES
(1, 'Afghanistan', 'AF', 'AF', 'AFG', '4', 'AF', 'Kabul ', 'Asia ', 'Afghan', 'Afghans', 'Afghani ', 'AFA', '26813057', 'Afghanistan', ''),
(2, 'Albania', 'AL', 'AL', 'ALB', '8', 'AL', 'Tirana ', 'Europe ', 'Albanian', 'Albanians', 'Lek ', 'ALL', '3510484', 'Albania', ''),
(3, 'Algeria', 'AG', 'DZ', 'DZA', '12', 'DZ', 'Algiers ', 'Africa ', 'Algerian', 'Algerians', 'Algerian Dinar ', 'DZD', '31736053', 'Algeria', ''),
(4, 'American Samoa', 'AQ', 'AS', 'ASM', '16', 'AS', 'Pago Pago ', 'Oceania ', 'American Samoan', 'American Samoans', 'US Dollar', 'USD', '67084', 'American Samoa', ''),
(5, 'Andorra', 'AN', 'AD', 'AND', '20', 'AD', 'Andorra la Vella ', 'Europe ', 'Andorran', 'Andorrans', 'Euro', 'EUR', '67627', 'Andorra', ''),
(6, 'Angola', 'AO', 'AO', 'AGO', '24', 'AO', 'Luanda ', 'Africa ', 'Angolan', 'Angolans', 'Kwanza ', 'AOA', '10366031', 'Angola', ''),
(7, 'Anguilla', 'AV', 'AI', 'AIA', '660', 'AI', 'The Valley ', 'Central America and the Caribbean ', 'Anguillan', 'Anguillans', 'East Caribbean Dollar ', 'XCD', '12132', 'Anguilla', ''),
(8, 'Antarctica', 'AY', 'AQ', 'ATA', '10', 'AQ', '', 'Antarctic Region ', '', '', '', '', '0', 'Antarctica', 'ISO defines as the territory south of 60 degrees south latitude'),
(9, 'Antigua and Barbuda', 'AC', 'AG', 'ATG', '28', 'AG', 'Saint John''s ', 'Central America and the Caribbean ', 'Antiguan and Barbudan', 'Antiguans and Barbudans', 'East Caribbean Dollar ', 'XCD', '66970', 'Antigua and Barbuda', ''),
(10, 'Argentina', 'AR', 'AR', 'ARG', '32', 'AR', 'Buenos Aires ', 'South America ', 'Argentine', 'Argentines', 'Argentine Peso ', 'ARS', '37384816', 'Argentina', ''),
(11, 'Armenia', 'AM', 'AM', 'ARM', '51', 'AM', 'Yerevan ', 'Commonwealth of Independent States ', 'Armenian', 'Armenians', 'Armenian Dram ', 'AMD', '3336100', 'Armenia', ''),
(12, 'Aruba', 'AA', 'AW', 'ABW', '533', 'AW', 'Oranjestad ', 'Central America and the Caribbean ', 'Aruban', 'Arubans', 'Aruban Guilder', 'AWG', '70007', 'Aruba', ''),
(13, 'Ashmore and Cartier', 'AT', '--', '-- ', '--', '--', '', 'Southeast Asia ', '', '', '', '', '0', 'Ashmore and Cartier', 'ISO includes with Australia'),
(14, 'Australia', 'AS', 'AU', 'AUS', '36', 'AU', 'Canberra ', 'Oceania ', 'Australian', 'Australians', 'Australian dollar ', 'AUD', '19357594', 'Australia', 'ISO includes Ashmore and Cartier Islands,Coral Sea Islands'),
(15, 'Austria', 'AU', 'AT', 'AUT', '40', 'AT', 'Vienna ', 'Europe ', 'Austrian', 'Austrians', 'Euro', 'EUR', '8150835', 'Austria', ''),
(16, 'Azerbaijan', 'AJ', 'AZ', 'AZE', '31', 'AZ', 'Baku (Baki) ', 'Commonwealth of Independent States ', 'Azerbaijani', 'Azerbaijanis', 'Azerbaijani Manat ', 'AZM', '7771092', 'Azerbaijan', ''),
(17, 'The Bahamas', 'BF', 'BS', 'BHS', '44', 'BS', 'Nassau ', 'Central America and the Caribbean ', 'Bahamian', 'Bahamians', 'Bahamian Dollar ', 'BSD', '297852', 'The Bahamas', ''),
(18, 'Bahrain', 'BA', 'BH', 'BHR', '48', 'BH', 'Manama ', 'Middle East ', 'Bahraini', 'Bahrainis', 'Bahraini Dinar ', 'BHD', '645361', 'Bahrain', ''),
(19, 'Baker Island', 'FQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '0', 'Baker Island', 'ISO includes with the US Minor Outlying Islands'),
(20, 'Bangladesh', 'BG', 'BD', 'BGD', '50', 'BD', 'Dhaka ', 'Asia ', 'Bangladeshi', 'Bangladeshis', 'Taka ', 'BDT', '131269860', 'Bangladesh', ''),
(21, 'Barbados', 'BB', 'BB', 'BRB', '52', 'BB', 'Bridgetown ', 'Central America and the Caribbean ', 'Barbadian', 'Barbadians', 'Barbados Dollar', 'BBD', '275330', 'Barbados', ''),
(22, 'Bassas da India', 'BS', '--', '-- ', '--', '--', '', 'Africa ', '', '', '', '', '0', 'Bassas da India', 'ISO includes with the Miscellaneous (French) Indian Ocean Islands'),
(23, 'Belarus', 'BO', 'BY', 'BLR', '112', 'BY', 'Minsk ', 'Commonwealth of Independent States ', 'Belarusian', 'Belarusians', 'Belarussian Ruble', 'BYR', '10350194', 'Belarus', ''),
(24, 'Belgium', 'BE', 'BE', 'BEL', '56', 'BE', 'Brussels ', 'Europe ', 'Belgian', 'Belgians', 'Euro', 'EUR', '10258762', 'Belgium', ''),
(25, 'Belize', 'BH', 'BZ', 'BLZ', '84', 'BZ', 'Belmopan ', 'Central America and the Caribbean ', 'Belizean', 'Belizeans', 'Belize Dollar', 'BZD', '256062', 'Belize', ''),
(26, 'Benin', 'BN', 'BJ', 'BEN', '204', 'BJ', 'Porto-Novo  ', 'Africa ', 'Beninese', 'Beninese', 'CFA Franc BCEAO', 'XOF', '6590782', 'Benin', ''),
(27, 'Bermuda', 'BD', 'BM', 'BMU', '60', 'BM', 'Hamilton ', 'North America ', 'Bermudian', 'Bermudians', 'Bermudian Dollar ', 'BMD', '63503', 'Bermuda', ''),
(28, 'Bhutan', 'BT', 'BT', 'BTN', '64', 'BT', 'Thimphu ', 'Asia ', 'Bhutanese', 'Bhutanese', 'Ngultrum', 'BTN', '2049412', 'Bhutan', ''),
(29, 'Bolivia', 'BL', 'BO', 'BOL', '68', 'BO', 'La Paz /Sucre ', 'South America ', 'Bolivian', 'Bolivians', 'Boliviano ', 'BOB', '8300463', 'Bolivia', ''),
(30, 'Bosnia and Herzegovina', 'BK', 'BA', 'BIH', '70', 'BA', 'Sarajevo ', 'Bosnia and Herzegovina, Europe ', 'Bosnian and Herzegovinian', 'Bosnians and Herzegovinians', 'Convertible Marka', 'BAM', '3922205', 'Bosnia and Herzegovina', ''),
(31, 'Botswana', 'BC', 'BW', 'BWA', '72', 'BW', 'Gaborone ', 'Africa ', 'Motswana', 'Batswana', 'Pula ', 'BWP', '1586119', 'Botswana', ''),
(32, 'Bouvet Island', 'BV', 'BV', 'BVT', '74', 'BV', '', 'Antarctic Region ', '', '', 'Norwegian Krone ', 'NOK', '0', 'Bouvet Island', ''),
(33, 'Brazil', 'BR', 'BR', 'BRA', '76', 'BR', 'Brasilia ', 'South America ', 'Brazilian', 'Brazilians', 'Brazilian Real ', 'BRL', '174468575', 'Brazil', ''),
(34, 'British Indian Ocean Territory', 'IO', 'IO', 'IOT', '86', 'IO', '', 'World ', '', '', 'US Dollar', 'USD', '0', 'The British Indian Ocean Territory', ''),
(35, 'British Virgin Islands', 'VI', 'VG', 'VGB', '92', 'VG', 'Road Town ', 'Central America and the Caribbean ', 'British Virgin Islander', 'British Virgin Islanders', 'US Dollar', 'USD', '20812', 'The British Virgin Islands', ''),
(36, 'Brunei Darussalam', 'BX', 'BN', 'BRN', '96', 'BN', '', '', '', '', 'Brunei Dollar', 'BND', '372361', 'Brunei', ''),
(37, 'Bulgaria', 'BU', 'BG', 'BGR', '100', 'BG', 'Sofia ', 'Europe ', 'Bulgarian', 'Bulgarians', 'Lev ', 'BGN', '7707495', 'Bulgaria', ''),
(38, 'Burkina Faso', 'UV', 'BF', 'BFA', '854', 'BF', 'Ouagadougou ', 'Africa ', 'Burkinabe', 'Burkinabe', 'CFA Franc BCEAO', 'XOF', '12272289', 'Burkina Faso', ''),
(39, 'Burma', 'BM', 'MM', 'MMR', '104', 'MM', 'Rangoon ', 'Southeast Asia ', 'Burmese', 'Burmese', 'kyat ', 'MMK', '41994678', 'Burma', 'ISO uses the name Myanmar'),
(40, 'Burundi', 'BY', 'BI', 'BDI', '108', 'BI', 'Bujumbura ', 'Africa ', 'Burundi', 'Burundians', 'Burundi Franc ', 'BIF', '6223897', 'Burundi', ''),
(41, 'Cambodia', 'CB', 'KH', 'KHM', '116', 'KH', 'Phnom Penh ', 'Southeast Asia ', 'Cambodian', 'Cambodians', 'Riel ', 'KHR', '12491501', 'Cambodia', ''),
(42, 'Cameroon', 'CM', 'CM', 'CMR', '120', 'CM', 'Yaounde ', 'Africa ', 'Cameroonian', 'Cameroonians', 'CFA Franc BEAC', 'XAF', '15803220', 'Cameroon', ''),
(43, 'Canada', 'CA', 'CA', 'CAN', '124', 'CA', 'Ottawa ', 'North America ', 'Canadian', 'Canadians', 'Canadian Dollar ', 'CAD', '31592805', 'Canada', ''),
(44, 'Cape Verde', 'CV', 'CV', 'CPV', '132', 'CV', 'Praia ', 'World ', 'Cape Verdean', 'Cape Verdeans', 'Cape Verdean Escudo ', 'CVE', '405163', 'Cape Verde', ''),
(45, 'Cayman Islands', 'CJ', 'KY', 'CYM', '136', 'KY', 'George Town ', 'Central America and the Caribbean ', 'Caymanian', 'Caymanians', 'Cayman Islands Dollar', 'KYD', '35527', 'The Cayman Islands', ''),
(46, 'Central African Republic', 'CT', 'CF', 'CAF', '140', 'CF', 'Bangui ', 'Africa ', 'Central African', 'Central Africans', 'CFA Franc BEAC', 'XAF', '3576884', 'The Central African Republic', ''),
(47, 'Chad', 'CD', 'TD', 'TCD', '148', 'TD', 'N''Djamena ', 'Africa ', 'Chadian', 'Chadians', 'CFA Franc BEAC', 'XAF', '8707078', 'Chad', ''),
(48, 'Chile', 'CI', 'CL', 'CHL', '152', 'CL', 'Santiago ', 'South America ', 'Chilean', 'Chileans', 'Chilean Peso ', 'CLP', '15328467', 'Chile', ''),
(49, 'China', 'CH', 'CN', 'CHN', '156', 'CN', 'Beijing ', 'Asia ', 'Chinese', 'Chinese', 'Yuan Renminbi', 'CNY', '1273111290', 'China', 'see also Taiwan'),
(50, 'Christmas Island', 'KT', 'CX', 'CXR', '162', 'CX', 'The Settlement ', 'Southeast Asia ', 'Christmas Island', 'Christmas Islanders', 'Australian Dollar ', 'AUD', '2771', 'Christmas Island', ''),
(51, 'Clipperton Island', 'IP', '--', '-- ', '--', '--', '', 'World ', '', '', '', '', '0', 'Clipperton Island', 'ISO includes with French Polynesia'),
(52, 'Cocos (Keeling) Islands', 'CK', 'CC', 'CCK', '166', 'CC', 'West Island ', 'Southeast Asia ', 'Cocos Islander', 'Cocos Islanders', 'Australian Dollar ', 'AUD', '633', 'The Cocos Islands', ''),
(53, 'Colombia', 'CO', 'CO', 'COL', '170', 'CO', 'Bogota ', 'South America, Central America and the Caribbean ', 'Colombian', 'Colombians', 'Colombian Peso ', 'COP', '40349388', 'Colombia', ''),
(54, 'Comoros', 'CN', 'KM', 'COM', '174', 'KM', 'Moroni ', 'Africa ', 'Comoran', 'Comorans', 'Comoro Franc', 'KMF', '596202', 'Comoros', ''),
(55, 'Congo, Democratic Republic of the', 'CG', 'CD', 'COD', '180', 'CD', 'Kinshasa ', 'Africa ', 'Congolese', 'Congolese', 'Franc Congolais', 'CDF', '53624718', 'Democratic Republic of the Congo', 'formerly Zaire'),
(56, 'Congo, Republic of the', 'CF', 'CG', 'COG', '178', 'CG', 'Brazzaville ', 'Africa ', 'Congolese', 'Congolese', 'CFA Franc BEAC', 'XAF', '2894336', 'Republic of the Congo', ''),
(57, 'Cook Islands', 'CW', 'CK', 'COK', '184', 'CK', 'Avarua ', 'Oceania ', 'Cook Islander', 'Cook Islanders', 'New Zealand Dollar ', 'NZD', '20611', 'The Cook Islands', ''),
(58, 'Coral Sea Islands', 'CR', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '0', 'The Coral Sea Islands', 'ISO includes with Australia'),
(59, 'Costa Rica', 'CS', 'CR', 'CRI', '188', 'CR', 'San Jose ', 'Central America and the Caribbean ', 'Costa Rican', 'Costa Ricans', 'Costa Rican Colon', 'CRC', '3773057', 'Costa Rica', ''),
(60, 'Cote d''Ivoire', 'IV', 'CI', 'CIV', '384', 'CI', 'Yamoussoukro', 'Africa ', 'Ivorian', 'Ivorians', 'CFA Franc BCEAO', 'XOF', '16393221', 'Cote d''Ivoire', ''),
(61, 'Croatia', 'HR', 'HR', 'HRV', '191', 'HR', 'Zagreb ', 'Europe ', 'Croatian', 'Croats', 'Kuna', 'HRK', '4334142', 'Croatia', ''),
(62, 'Cuba', 'CU', 'CU', 'CUB', '192', 'CU', 'Havana ', 'Central America and the Caribbean ', 'Cuban', 'Cubans', 'Cuban Peso', 'CUP', '11184023', 'Cuba', ''),
(63, 'Cyprus', 'CY', 'CY', 'CYP', '196', 'CY', 'Nicosia ', 'Middle East ', 'Cypriot', 'Cypriots', 'Cyprus Pound', 'CYP', '762887', 'Cyprus', ''),
(64, 'Czech Republic', 'EZ', 'CZ', 'CZE', '203', 'CZ', 'Prague ', 'Europe ', 'Czech', 'Czechs', 'Czech Koruna', 'CZK', '10264212', 'The Czech Republic', ''),
(65, 'Denmark', 'DA', 'DK', 'DNK', '208', 'DK', 'Copenhagen ', 'Europe ', 'Danish', 'Danes', 'Danish Krone', 'DKK', '5352815', 'Denmark', ''),
(66, 'Djibouti', 'DJ', 'DJ', 'DJI', '262', 'DJ', 'Djibouti ', 'Africa ', 'Djiboutian', 'Djiboutians', 'Djibouti Franc', 'DJF', '460700', 'Djibouti', ''),
(67, 'Dominica', 'DO', 'DM', 'DMA', '212', 'DM', 'Roseau ', 'Central America and the Caribbean ', 'Dominican', 'Dominicans', 'East Caribbean Dollar', 'XCD', '70786', 'Dominica', ''),
(68, 'Dominican Republic', 'DR', 'DO', 'DOM', '214', 'DO', 'Santo Domingo ', 'Central America and the Caribbean ', 'Dominican', 'Dominicans', 'Dominican Peso', 'DOP', '8581477', 'The Dominican Republic', ''),
(69, 'East Timor', 'TT', 'TL', 'TLS', '626', 'TP', '', '', '', '', 'Timor Escudo', 'TPE', '1040880', 'East Timor', 'NULL'),
(70, 'Ecuador', 'EC', 'EC', 'ECU', '218', 'EC', 'Quito ', 'South America ', 'Ecuadorian', 'Ecuadorians', 'US Dollar', 'USD', '13183978', 'Ecuador', ''),
(71, 'Egypt', 'EG', 'EG', 'EGY', '818', 'EG', 'Cairo ', 'Africa ', 'Egyptian', 'Egyptians', 'Egyptian Pound ', 'EGP', '69536644', 'Egypt', ''),
(72, 'El Salvador', 'ES', 'SV', 'SLV', '222', 'SV', 'San Salvador ', 'Central America and the Caribbean ', 'Salvadoran', 'Salvadorans', 'El Salvador Colon', 'SVC', '6237662', 'El Salvador', ''),
(73, 'Equatorial Guinea', 'EK', 'GQ', 'GNQ', '226', 'GQ', 'Malabo ', 'Africa ', 'Equatorial Guinean', 'Equatorial Guineans', 'CFA Franc BEAC', 'XAF', '486060', 'Equatorial Guinea', ''),
(74, 'Eritrea', 'ER', 'ER', 'ERI', '232', 'ER', 'Asmara ', 'Africa ', 'Eritrean', 'Eritreans', 'Nakfa', 'ERN', '4298269', 'Eritrea', ''),
(75, 'Estonia', 'EN', 'EE', 'EST', '233', 'EE', 'Tallinn ', 'Europe ', 'Estonian', 'Estonians', 'Kroon', 'EEK', '1423316', 'Estonia', ''),
(76, 'Ethiopia', 'ET', 'ET', 'ETH', '231', 'ET', 'Addis Ababa ', 'Africa ', 'Ethiopian', 'Ethiopians', 'Ethiopian Birr', 'ETB', '65891874', 'Ethiopia', ''),
(77, 'Europa Island', 'EU', '--', '-- ', '--', '--', '', 'Africa ', '', '', '', '', '0', 'Europa Island', 'ISO includes with the Miscellaneous (French) Indian Ocean Islands'),
(78, 'Falkland Islands (Islas Malvinas)', 'FK', 'FK', 'FLK', '238', 'FK', 'Stanley', 'South America', 'Falkland Island', 'Falkland Islanders', 'Falkland Islands Pound', 'FKP', '2895', 'The Falkland Islands ', ''),
(79, 'Faroe Islands', 'FO', 'FO', 'FRO', '234', 'FO', 'Torshavn ', 'Europe ', 'Faroese', 'Faroese', 'Danish Krone ', 'DKK', '45661', 'The Faroe Islands', ''),
(80, 'Fiji', 'FJ', 'FJ', 'FJI', '242', 'FJ', 'Suva ', 'Oceania ', 'Fijian', 'Fijians', 'Fijian Dollar ', 'FJD', '844330', 'Fiji', ''),
(81, 'Finland', 'FI', 'FI', 'FIN', '246', 'FI', 'Helsinki ', 'Europe ', 'Finnish', 'Finns', 'Euro', 'EUR', '5175783', 'Finland', ''),
(82, 'France', 'FR', 'FR', 'FRA', '250', 'FR', 'Paris ', 'Europe ', 'Frenchman', 'Frenchmen', 'Euro', 'EUR', '59551227', 'France', ''),
(83, 'France, Metropolitan', '--', '--', '-- ', '--', 'FX', '', '', '', '', 'Euro', 'EUR', '', 'Metropolitan France', 'ISO limits to the European part of France, excluding French Guiana, French Polynesia, French Southern and Antarctic Lands, Guadeloupe, Martinique, Mayotte, New Caledonia, Reunion, Saint Pierre and Miquelon, Wallis and Futuna'),
(84, 'French Guiana', 'FG', 'GF', 'GUF', '254', 'GF', 'Cayenne ', 'South America ', 'French Guianese', 'French Guianese', 'Euro', 'EUR', '177562', 'French Guiana', ''),
(85, 'French Polynesia', 'FP', 'PF', 'PYF', '258', 'PF', 'Papeete ', 'Oceania ', 'French Polynesian', 'French Polynesians', 'CFP Franc', 'XPF', '253506', 'French Polynesia', 'ISO includes Clipperton Island'),
(86, 'French Southern and Antarctic Lands', 'FS', 'TF', 'ATF', '260', 'TF', '', 'Antarctic Region ', '', '', 'Euro', 'EUR', '0', 'The French Southern and Antarctic Lands', 'FIPS 10-4 does not include the French-claimed portion of Antarctica (Terre Adelie)'),
(87, 'Gabon', 'GB', 'GA', 'GAB', '266', 'GA', 'Libreville ', 'Africa ', 'Gabonese', 'Gabonese', 'CFA Franc BEAC', 'XAF', '1221175', 'Gabon', ''),
(88, 'The Gambia', 'GA', 'GM', 'GMB', '270', 'GM', 'Banjul ', 'Africa ', 'Gambian', 'Gambians', 'Dalasi', 'GMD', '1411205', 'The Gambia', ''),
(89, 'Gaza Strip', 'GZ', '--', '-- ', '--', '--', '', 'Middle East ', '', '', 'New Israeli Shekel ', 'ILS', '1178119', 'The Gaza Strip', ''),
(90, 'Georgia', 'GG', 'GE', 'GEO', '268', 'GE', 'T''bilisi ', 'Commonwealth of Independent States ', 'Georgian', 'Georgians', 'Lari', 'GEL', '4989285', 'Georgia', ''),
(91, 'Germany', 'GM', 'DE', 'DEU', '276', 'DE', 'Berlin ', 'Europe ', 'German', 'Germans', 'Euro', 'EUR', '83029536', 'Deutschland', ''),
(92, 'Ghana', 'GH', 'GH', 'GHA', '288', 'GH', 'Accra ', 'Africa ', 'Ghanaian', 'Ghanaians', 'Cedi', 'GHC', '19894014', 'Ghana', ''),
(93, 'Gibraltar', 'GI', 'GI', 'GIB', '292', 'GI', 'Gibraltar ', 'Europe ', 'Gibraltar', 'Gibraltarians', 'Gibraltar Pound', 'GIP', '27649', 'Gibraltar', ''),
(94, 'Glorioso Islands', 'GO', '--', '-- ', '--', '--', '', 'Africa ', '', '', '', '', '0', 'The Glorioso Islands', 'ISO includes with the Miscellaneous (French) Indian Ocean Islands'),
(95, 'Greece', 'GR', 'GR', 'GRC', '300', 'GR', 'Athens ', 'Europe ', 'Greek', 'Greeks', 'Euro', 'EUR', '10623835', 'Greece', ''),
(96, 'Greenland', 'GL', 'GL', 'GRL', '304', 'GL', 'Nuuk ', 'Arctic Region ', 'Greenlandic', 'Greenlanders', 'Danish Krone', 'DKK', '56352', 'Greenland', ''),
(97, 'Grenada', 'GJ', 'GD', 'GRD', '308', 'GD', 'Saint George''s ', 'Central America and the Caribbean ', 'Grenadian', 'Grenadians', 'East Caribbean Dollar', 'XCD', '89227', 'Grenada', ''),
(98, 'Guadeloupe', 'GP', 'GP', 'GLP', '312', 'GP', 'Basse-Terre ', 'Central America and the Caribbean ', 'Guadeloupe', 'Guadeloupians', 'Euro', 'EUR', '431170', 'Guadeloupe', ''),
(99, 'Guam', 'GQ', 'GU', 'GUM', '316', 'GU', 'Hagatna', 'Oceania ', 'Guamanian', 'Guamanians', 'US Dollar', 'USD', '157557', 'Guam', ''),
(100, 'Guatemala', 'GT', 'GT', 'GTM', '320', 'GT', 'Guatemala ', 'Central America and the Caribbean ', 'Guatemalan', 'Guatemalans', 'Quetzal', 'GTQ', '12974361', 'Guatemala', ''),
(101, 'Guernsey', 'GK', '--', '-- ', '--', 'GG', 'Saint Peter Port ', 'Europe ', 'Channel Islander', 'Channel Islanders', 'Pound Sterling', 'GBP', '64342', 'Guernsey', 'ISO includes with the United Kingdom'),
(102, 'Guinea', 'GV', 'GN', 'GIN', '324', 'GN', 'Conakry ', 'Africa ', 'Guinean', 'Guineans', 'Guinean Franc ', 'GNF', '7613870', 'Guinea', ''),
(103, 'Guinea-Bissau', 'PU', 'GW', 'GNB', '624', 'GW', 'Bissau ', 'Africa ', 'Guinean', 'Guineans', 'CFA Franc BCEAO', 'XOF', '1315822', 'Guinea-Bissau', ''),
(104, 'Guyana', 'GY', 'GY', 'GUY', '328', 'GY', 'Georgetown ', 'South America ', 'Guyanese', 'Guyanese', 'Guyana Dollar', 'GYD', '697181', 'Guyana', ''),
(105, 'Haiti', 'HA', 'HT', 'HTI', '332', 'HT', 'Port-au-Prince ', 'Central America and the Caribbean ', 'Haitian', 'Haitians', 'Gourde', 'HTG', '6964549', 'Haiti', ''),
(106, 'Heard Island and McDonald Islands', 'HM', 'HM', 'HMD', '334', 'HM', '', 'Antarctic Region ', '', '', 'Australian Dollar', 'AUD', '0', 'The Heard Island and McDonald Islands', ''),
(107, 'Holy See (Vatican City)', 'VT', 'VA', 'VAT', '336', 'VA', 'Vatican City ', 'Europe ', '', '', 'Euro', 'EUR', '890', 'The Vatican City', ''),
(108, 'Honduras', 'HO', 'HN', 'HND', '340', 'HN', 'Tegucigalpa ', 'Central America and the Caribbean ', 'Honduran', 'Hondurans', 'Lempira', 'HNL', '6406052', 'Honduras', ''),
(109, 'Hong Kong (SAR)', 'HK', 'HK', 'HKG', '344', 'HK', '', 'Southeast Asia ', '', '', 'Hong Kong Dollar ', 'HKD', '0', 'Xianggang ', ''),
(110, 'Howland Island', 'HQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '7210505', 'Howland Island', 'ISO includes with the US Minor Outlying Islands'),
(111, 'Hungary', 'HU', 'HU', 'HUN', '348', 'HU', 'Budapest ', 'Europe ', 'Hungarian', 'Hungarians', 'Forint', 'HUF', '10106017', 'Hungary', ''),
(112, 'Iceland', 'IC', 'IS', 'ISL', '352', 'IS', 'Reykjavik ', 'Arctic Region ', 'Icelandic', 'Icelanders', 'Iceland Krona', 'ISK', '277906', 'Iceland', ''),
(113, 'India', 'IN', 'IN', 'IND', '356', 'IN', 'New Delhi ', 'Asia ', 'Indian', 'Indians', 'Indian Rupee ', 'INR', '1029991145', 'India', ''),
(114, 'Indonesia', 'ID', 'ID', 'IDN', '360', 'ID', 'Jakarta ', 'Southeast Asia ', 'Indonesian', 'Indonesians', 'Rupiah', 'IDR', '228437870', 'Indonesia', ''),
(115, 'Iran', 'IR', 'IR', 'IRN', '364', 'IR', 'Tehran ', 'Middle East ', 'Iranian', 'Iranians', 'Iranian Rial', 'IRR', '66128965', 'Iran', ''),
(116, 'Iraq', 'IZ', 'IQ', 'IRQ', '368', 'IQ', 'Baghdad ', 'Middle East ', 'Iraqi', 'Iraqis', 'Iraqi Dinar', 'IQD', '23331985', 'Iraq', ''),
(117, 'Ireland', 'EI', 'IE', 'IRL', '372', 'IE', 'Dublin ', 'Europe ', 'Irish', 'Irishmen', 'Euro', 'EUR', '3840838', 'Ireland', ''),
(118, 'Israel', 'IS', 'IL', 'ISR', '376', 'IL', 'Jerusalem', 'Middle East ', 'Israeli', 'Israelis', 'New Israeli Sheqel', 'ILS', '5938093', 'Israel', ''),
(119, 'Italy', 'IT', 'IT', 'ITA', '380', 'IT', 'Rome ', 'Europe ', 'Italian', 'Italians', 'Euro', 'EUR', '57679825', 'Italia ', ''),
(120, 'Jamaica', 'JM', 'JM', 'JAM', '388', 'JM', 'Kingston ', 'Central America and the Caribbean ', 'Jamaican', 'Jamaicans', 'Jamaican dollar ', 'JMD', '2665636', 'Jamaica', ''),
(121, 'Jan Mayen', 'JN', '--', '-- ', '--', '--', '', 'Arctic Region ', '', '', 'Norway Kroner', 'NOK', '0', 'Jan Mayen', 'ISO includes with Svalbard'),
(122, 'Japan', 'JA', 'JP', 'JPN', '392', 'JP', 'Tokyo ', 'Asia ', 'Japanese', 'Japanese', 'Yen ', 'JPY', '126771662', 'Japan', ''),
(123, 'Jarvis Island', 'DQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '0', 'Jarvis Island', 'ISO includes with the US Minor Outlying Islands'),
(124, 'Jersey', 'JE', '--', '-- ', '--', 'JE', 'Saint Helier ', 'Europe ', 'Channel Islander', 'Channel Islanders', 'Pound Sterling', 'GBP', '89361', 'Jersey', 'ISO includes with the United Kingdom'),
(125, 'Johnston Atoll', 'JQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '0', 'Johnston Atoll', 'ISO includes with the US Minor Outlying Islands'),
(126, 'Jordan', 'JO', 'JO', 'JOR', '400', 'JO', 'Amman ', 'Middle East ', 'Jordanian', 'Jordanians', 'Jordanian Dinar', 'JOD', '5153378', 'Jordan', ''),
(127, 'Juan de Nova Island', 'JU', '--', '-- ', '--', '--', '', 'Africa ', '', '', '', '', '0', 'Juan de Nova Island', 'ISO includes with the Miscellaneous (French) Indian Ocean Islands'),
(128, 'Kazakhstan', 'KZ', 'KZ', 'KAZ', '398', 'KZ', 'Astana ', 'Commonwealth of Independent States ', 'Kazakhstani', 'Kazakhstanis', 'Tenge', 'KZT', '16731303', 'Kazakhstan', ''),
(129, 'Kenya', 'KE', 'KE', 'KEN', '404', 'KE', 'Nairobi ', 'Africa ', 'Kenyan', 'Kenyans', 'Kenyan shilling ', 'KES', '30765916', 'Kenya', ''),
(130, 'Kingman Reef', 'KQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '0', 'Kingman Reef', 'ISO includes with the US Minor Outlying Islands'),
(131, 'Kiribati', 'KR', 'KI', 'KIR', '296', 'KI', 'Tarawa ', 'Oceania ', 'I-Kiribati', 'I-Kiribati', 'Australian dollar ', 'AUD', '94149', 'Kiribati', ''),
(132, 'Korea, North', 'KN', 'KP', 'PRK', '408', 'KP', 'P''yongyang ', 'Asia ', 'Korean', 'Koreans', 'North Korean Won', 'KPW', '21968228', 'North Korea', ''),
(133, 'Korea, South', 'KS', 'KR', 'KOR', '410', 'KR', 'Seoul ', 'Asia ', 'Korean', 'Koreans', 'Won', 'KRW', '47904370', 'South Korea', ''),
(134, 'Kuwait', 'KU', 'KW', 'KWT', '414', 'KW', 'Kuwait ', 'Middle East ', 'Kuwaiti', 'Kuwaitis', 'Kuwaiti Dinar', 'KWD', '2041961', 'Al Kuwayt', ''),
(135, 'Kyrgyzstan', 'KG', 'KG', 'KGZ', '417', 'KG', 'Bishkek ', 'Commonwealth of Independent States ', 'Kyrgyzstani', 'Kyrgyzstanis', 'Som', 'KGS', '4753003', 'Kyrgyzstan', ''),
(136, 'Laos', 'LA', 'LA', 'LAO', '418', 'LA', 'Vientiane ', 'Southeast Asia ', 'Lao', 'Laos', 'Kip', 'LAK', '5635967', 'Laos', ''),
(137, 'Latvia', 'LG', 'LV', 'LVA', '428', 'LV', 'Riga ', 'Europe ', 'Latvian', 'Latvians', 'Latvian Lats', 'LVL', '2385231', 'Latvia', ''),
(138, 'Lebanon', 'LE', 'LB', 'LBN', '422', 'LB', 'Beirut ', 'Middle East ', 'Lebanese', 'Lebanese', 'Lebanese Pound', 'LBP', '3627774', 'Lebanon', ''),
(139, 'Lesotho', 'LT', 'LS', 'LSO', '426', 'LS', 'Maseru ', 'Africa ', 'Basotho', 'Mosotho', 'Loti', 'LSL', '2177062', 'Lesotho', ''),
(140, 'Liberia', 'LI', 'LR', 'LBR', '430', 'LR', 'Monrovia ', 'Africa ', 'Liberian', 'Liberians', 'Liberian Dollar', 'LRD', '3225837', 'Liberia', ''),
(141, 'Libya', 'LY', 'LY', 'LBY', '434', 'LY', 'Tripoli ', 'Africa ', 'Libyan', 'Libyans', 'Libyan Dinar', 'LYD', '5240599', 'Libya', ''),
(142, 'Liechtenstein', 'LS', 'LI', 'LIE', '438', 'LI', 'Vaduz ', 'Europe ', 'Liechtenstein', 'Liechtensteiners', 'Swiss Franc', 'CHF', '32528', 'Liechtenstein', ''),
(143, 'Lithuania', 'LH', 'LT', 'LTU', '440', 'LT', 'Vilnius ', 'Europe ', 'Lithuanian', 'Lithuanians', 'Lithuanian Litas', 'LTL', '3610535', 'Lithuania', ''),
(144, 'Luxembourg', 'LU', 'LU', 'LUX', '442', 'LU', 'Luxembourg ', 'Europe ', 'Luxembourg', 'Luxembourgers', 'Euro', 'EUR', '442972', 'Luxembourg', ''),
(145, 'Macao', 'MC', 'MO', 'MAC', '446', 'MO', '', 'Southeast Asia ', 'Chinese', 'Chinese', 'Pataca', 'MOP', '453733', 'Macao', ''),
(146, 'Macedonia, The Former Yugoslav Republic of', 'MK', 'MK', 'MKD', '807', 'MK', 'Skopje ', 'Europe ', 'Macedonian', 'Macedonians', 'Denar', 'MKD', '2046209', 'Makedonija', ''),
(147, 'Madagascar', 'MA', 'MG', 'MDG', '450', 'MG', 'Antananarivo ', 'Africa ', 'Malagasy', 'Malagasy', 'Malagasy Franc', 'MGF', '15982563', 'Madagascar', ''),
(148, 'Malawi', 'MI', 'MW', 'MWI', '454', 'MW', 'Lilongwe ', 'Africa ', 'Malawian', 'Malawians', 'Kwacha', 'MWK', '10548250', 'Malawi', ''),
(149, 'Malaysia', 'MY', 'MY', 'MYS', '458', 'MY', 'Kuala Lumpur ', 'Southeast Asia ', 'Malaysian', 'Malaysians', 'Malaysian Ringgit', 'MYR', '22229040', 'Malaysia', ''),
(150, 'Maldives', 'MV', 'MV', 'MDV', '462', 'MV', 'Male ', 'Asia ', 'Maldivian', 'Maldivians', 'Rufiyaa', 'MVR', '310764', 'Maldives', ''),
(151, 'Mali', 'ML', 'ML', 'MLI', '466', 'ML', 'Bamako ', 'Africa ', 'Malian', 'Malians', 'CFA Franc BCEAO', 'XOF', '11008518', 'Mali', ''),
(152, 'Malta', 'MT', 'MT', 'MLT', '470', 'MT', 'Valletta ', 'Europe ', 'Maltese', 'Maltese', 'Maltese Lira', 'MTL', '394583', 'Malta', ''),
(153, 'Man, Isle of', 'IM', '--', '-- ', '--', 'IM', 'Douglas ', 'Europe ', 'Manxman', 'Manxmen', 'Pound Sterling', 'GBP', '73489', 'The Isle of Man', 'ISO includes with the United Kingdom'),
(154, 'Marshall Islands', 'RM', 'MH', 'MHL', '584', 'MH', 'Majuro ', 'Oceania ', 'Marshallese', 'Marshallese', 'US Dollar', 'USD', '70822', 'The Marshall Islands', ''),
(155, 'Martinique', 'MB', 'MQ', 'MTQ', '474', 'MQ', 'Fort-de-France ', 'Central America and the Caribbean ', 'Martiniquais', 'Martiniquais', 'Euro', 'EUR', '418454', 'Martinique', ''),
(156, 'Mauritania', 'MR', 'MR', 'MRT', '478', 'MR', 'Nouakchott ', 'Africa ', 'Mauritanian', 'Mauritanians', 'Ouguiya', 'MRO', '2747312', 'Mauritania', ''),
(157, 'Mauritius', 'MP', 'MU', 'MUS', '480', 'MU', 'Port Louis ', 'World ', 'Mauritian', 'Mauritians', 'Mauritius Rupee', 'MUR', '1189825', 'Mauritius', ''),
(158, 'Mayotte', 'MF', 'YT', 'MYT', '175', 'YT', 'Mamoutzou ', 'Africa ', 'Mahorais', 'Mahorais', 'Euro', 'EUR', '163366', 'Mayotte', ''),
(159, 'Mexico', 'MX', 'MX', 'MEX', '484', 'MX', 'Mexico ', 'North America ', 'Mexican', 'Mexicans', 'Mexican Peso', 'MXN', '101879171', 'Mexico', ''),
(160, 'Micronesia, Federated States of', 'FM', 'FM', 'FSM', '583', 'FM', 'Palikir ', 'Oceania ', 'Micronesian', 'Micronesians', 'US Dollar', 'USD', '134597', 'The Federated States of Micronesia', ''),
(161, 'Midway Islands', 'MQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', 'United States Dollars', 'USD', '0', 'The Midway Islands', 'ISO includes with the US Minor Outlying Islands'),
(162, 'Miscellaneous (French)', '--', '--', '-- ', '--', '--', '', '', '', '', '', '', '0', 'Miscellaneous (French)', 'ISO includes Bassas da India, Europa Island, Glorioso Islands, Juan de Nova Island, Tromelin Island'),
(163, 'Moldova', 'MD', 'MD', 'MDA', '498', 'MD', 'Chisinau ', 'Commonwealth of Independent States ', 'Moldovan', 'Moldovans', 'Moldovan Leu', 'MDL', '4431570', 'Moldova', ''),
(164, 'Monaco', 'MN', 'MC', 'MCO', '492', 'MC', 'Monaco ', 'Europe ', 'Monegasque', 'Monegasques', 'Euro', 'EUR', '31842', 'Monaco', ''),
(165, 'Mongolia', 'MG', 'MN', 'MNG', '496', 'MN', 'Ulaanbaatar ', 'Asia ', 'Mongolian', 'Mongolians', 'Tugrik', 'MNT', '2654999', 'Mongolia', ''),
(166, 'Montenegro', '--', '--', '-- ', '--', '--', '', '', '', '', '', '', '', 'Montenegro', 'now included as region within Yugoslavia'),
(167, 'Montserrat', 'MH', 'MS', 'MSR', '500', 'MS', 'Plymouth', 'Central America and the Caribbean ', 'Montserratian', 'Montserratians', 'East Caribbean Dollar', 'XCD', '7574', 'Montserrat', ''),
(168, 'Morocco', 'MO', 'MA', 'MAR', '504', 'MA', 'Rabat ', 'Africa ', 'Moroccan', 'Moroccans', 'Moroccan Dirham', 'MAD', '30645305', 'Morocco', ''),
(169, 'Mozambique', 'MZ', 'MZ', 'MOZ', '508', 'MZ', 'Maputo ', 'Africa ', 'Mozambican', 'Mozambicans', 'Metical', 'MZM', '19371057', 'Mozambique', ''),
(170, 'Myanmar', '--', '--', '-- ', '--', '--', '', '', '', '', 'Kyat', 'MMK', '0', 'Myanmar', 'see Burma'),
(171, 'Namibia', 'WA', 'NA', 'NAM', '516', 'NA', 'Windhoek ', 'Africa ', 'Namibian', 'Namibians', 'Namibian Dollar ', 'NAD', '1797677', 'Namibia', ''),
(172, 'Nauru', 'NR', 'NR', 'NRU', '520', 'NR', '', 'Oceania ', 'Nauruan', 'Nauruans', 'Australian Dollar', 'AUD', '12088', 'Nauru', ''),
(173, 'Navassa Island', 'BQ', '--', '-- ', '--', '--', '', 'Central America and the Caribbean ', '', '', '', '', '0', 'Navassa Island', ''),
(174, 'Nepal', 'NP', 'NP', 'NPL', '524', 'NP', 'Kathmandu ', 'Asia ', 'Nepalese', 'Nepalese', 'Nepalese Rupee', 'NPR', '25284463', 'Nepal', ''),
(175, 'Netherlands', 'NL', 'NL', 'NLD', '528', 'NL', 'Amsterdam ', 'Europe ', 'Dutchman', 'Dutchmen', 'Euro', 'EUR', '15981472', 'The Netherlands', ''),
(176, 'Netherlands Antilles', 'NT', 'AN', 'ANT', '530', 'AN', 'Willemstad ', 'Central America and the Caribbean ', 'Dutch Antillean', 'Dutch Antilleans', 'Netherlands Antillean guilder ', 'ANG', '212226', 'The Netherlands Antilles', ''),
(177, 'New Caledonia', 'NC', 'NC', 'NCL', '540', 'NC', 'Noumea ', 'Oceania ', 'New Caledonian', 'New Caledonians', 'CFP Franc', 'XPF', '204863', 'New Caledonia', ''),
(178, 'New Zealand', 'NZ', 'NZ', 'NZL', '554', 'NZ', 'Wellington ', 'Oceania ', 'New Zealand', 'New Zealanders', 'New Zealand Dollar', 'NZD', '3864129', 'New Zealand', ''),
(179, 'Nicaragua', 'NU', 'NI', 'NIC', '558', 'NI', 'Managua ', 'Central America and the Caribbean ', 'Nicaraguan', 'Nicaraguans', 'Cordoba Oro', 'NIO', '4918393', 'Nicaragua', ''),
(180, 'Niger', 'NG', 'NE', 'NER', '562', 'NE', 'Niamey ', 'Africa ', 'Nigerien', 'Nigeriens', 'CFA Franc BCEAO', 'XOF', '10355156', 'Niger', ''),
(181, 'Nigeria', 'NI', 'NG', 'NGA', '566', 'NG', 'Abuja', 'Africa ', 'Nigerian', 'Nigerians', 'Naira', 'NGN', '126635626', 'Nigeria', ''),
(182, 'Niue', 'NE', 'NU', 'NIU', '570', 'NU', 'Alofi ', 'Oceania ', 'Niuean', 'Niueans', 'New Zealand Dollar', 'NZD', '2124', 'Niue', ''),
(183, 'Norfolk Island', 'NF', 'NF', 'NFK', '574', 'NF', 'Kingston ', 'Oceania ', 'Norfolk Islander', 'Norfolk Islanders', 'Australian Dollar', 'AUD', '1879', 'Norfolk Island', ''),
(184, 'Northern Mariana Islands', 'CQ', 'MP', 'MNP', '580', 'MP', 'Saipan ', 'Oceania ', '', '', 'US Dollar', 'USD', '74612', 'The Northern Mariana Islands', ''),
(185, 'Norway', 'NO', 'NO', 'NOR', '578', 'NO', 'Oslo ', 'Europe ', 'Norwegian', 'Norwegians', 'Norwegian Krone', 'NOK', '4503440', 'Norway', ''),
(186, 'Oman', 'MU', 'OM', 'OMN', '512', 'OM', 'Muscat ', 'Middle East ', 'Omani', 'Omanis', 'Rial Omani', 'OMR', '2622198', 'Oman', ''),
(187, 'Pakistan', 'PK', 'PK', 'PAK', '586', 'PK', 'Islamabad ', 'Asia ', 'Pakistani', 'Pakistanis', 'Pakistan Rupee', 'PKR', '144616639', 'Pakistan', ''),
(188, 'Palau', 'PS', 'PW', 'PLW', '585', 'PW', 'Koror ', 'Oceania ', 'Palauan', 'Palauans', 'US Dollar', 'USD', '19092', 'Palau', ''),
(189, 'Palmyra Atoll', 'LQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', '', '', '0', 'Palmyra Atoll', 'ISO includes with the US Minor Outlying Islands'),
(190, 'Panama', 'PM', 'PA', 'PAN', '591', 'PA', 'Panama ', 'Central America and the Caribbean ', 'Panamanian', 'Panamanians', 'balboa ', 'PAB', '2845647', 'Panama', ''),
(191, 'Papua New Guinea', 'PP', 'PG', 'PNG', '598', 'PG', 'Port Moresby ', 'Oceania ', 'Papua New Guinean', 'Papua New Guineans', 'Kina', 'PGK', '5049055', 'Papua New Guinea', ''),
(192, 'Paracel Islands', 'PF', '--', '-- ', '--', '--', '', 'Southeast Asia ', '', '', '', '', '0', 'The Paracel Islands', ''),
(193, 'Paraguay', 'PA', 'PY', 'PRY', '600', 'PY', 'Asuncion ', 'South America ', 'Paraguayan', 'Paraguayans', 'Guarani', 'PYG', '5734139', 'Paraguay', ''),
(194, 'Peru', 'PE', 'PE', 'PER', '604', 'PE', 'Lima ', 'South America ', 'Peruvian', 'Peruvians', 'Nuevo Sol', 'PEN', '27483864', 'Peru', ''),
(195, 'Philippines', 'RP', 'PH', 'PHL', '608', 'PH', 'Manila ', 'Southeast Asia ', 'Philippine', 'Filipinos', 'Philippine Peso', 'PHP', '82841518', 'The Philippines', ''),
(196, 'Pitcairn Islands', 'PC', 'PN', 'PCN', '612', 'PN', 'Adamstown ', 'Oceania ', 'Pitcairn Islander', 'Pitcairn Islanders', 'New Zealand Dollar', 'NZD', '47', 'The Pitcairn Islands', ''),
(197, 'Poland', 'PL', 'PL', 'POL', '616', 'PL', 'Warsaw ', 'Europe ', 'Polish', 'Poles', 'Zloty', 'PLN', '38633912', 'Poland', ''),
(198, 'Portugal', 'PO', 'PT', 'PRT', '620', 'PT', 'Lisbon ', 'Europe ', 'Portuguese', 'Portuguese', 'Euro', 'EUR', '10066253', 'Portugal', ''),
(199, 'Puerto Rico', 'RQ', 'PR', 'PRI', '630', 'PR', 'San Juan ', 'Central America and the Caribbean ', 'Puerto Rican', 'Puerto Ricans', 'US Dollar', 'USD', '3937316', 'Puerto Rico', ''),
(200, 'Qatar', 'QA', 'QA', 'QAT', '634', 'QA', 'Doha ', 'Middle East ', 'Qatari', 'Qataris', 'Qatari Rial', 'QAR', '769152', 'Qatar', ''),
(201, 'R?union', 'RE', 'RE', 'REU', '638', 'RE', 'Saint-Denis', 'World', 'Reunionese', 'Reunionese', 'Euro', 'EUR', '732570', 'R?union', ''),
(202, 'Romania', 'RO', 'RO', 'ROU', '642', 'RO', 'Bucharest ', 'Europe ', 'Romanian', 'Romanians', 'Leu', 'ROL', '22364022', 'Romania', ''),
(203, 'Russia', 'RS', 'RU', 'RUS', '643', 'RU', 'Moscow ', 'Asia ', 'Russian', 'Russians', 'Russian Ruble', 'RUB', '145470197', 'Russia', ''),
(204, 'Rwanda', 'RW', 'RW', 'RWA', '646', 'RW', 'Kigali ', 'Africa ', 'Rwandan', 'Rwandans', 'Rwanda Franc', 'RWF', '7312756', 'Rwanda', ''),
(205, 'Saint Helena', 'SH', 'SH', 'SHN', '654', 'SH', 'Jamestown ', 'Africa ', 'Saint Helenian', 'Saint Helenians', 'Saint Helenian Pound ', 'SHP', '7266', 'Saint Helena', ''),
(206, 'Saint Kitts and Nevis', 'SC', 'KN', 'KNA', '659', 'KN', 'Basseterre ', 'Central America and the Caribbean ', 'Kittitian and Nevisian', 'Kittitians and Nevisians', 'East Caribbean Dollar ', 'XCD', '38756', 'Saint Kitts and Nevis', ''),
(207, 'Saint Lucia', 'ST', 'LC', 'LCA', '662', 'LC', 'Castries ', 'Central America and the Caribbean ', 'Saint Lucian', 'Saint Lucians', 'East Caribbean Dollar ', 'XCD', '158178', 'Saint Lucia', ''),
(208, 'Saint Pierre and Miquelon', 'SB', 'PM', 'SPM', '666', 'PM', 'Saint-Pierre ', 'North America ', 'Frenchman', 'Frenchmen', 'Euro', 'EUR', '6928', 'Saint Pierre and Miquelon', ''),
(209, 'Saint Vincent and the Grenadines', 'VC', 'VC', 'VCT', '670', 'VC', 'Kingstown ', 'Central America and the Caribbean ', 'Saint Vincentian', 'Saint Vincentians', 'East Caribbean Dollar ', 'XCD', '115942', 'Saint Vincent and the Grenadines', ''),
(210, 'Samoa', 'WS', 'WS', 'WSM', '882', 'WS', 'Apia ', 'Oceania ', 'Samoan', 'Samoans', 'Tala', 'WST', '179058', 'Samoa', 'NULL'),
(211, 'San Marino', 'SM', 'SM', 'SMR', '674', 'SM', 'San Marino ', 'Europe ', 'Sammarinese', 'Sammarinese', 'Euro', 'EUR', '27336', 'San Marino', ''),
(212, 'S?o Tom? and Pr?ncipe', 'TP', 'ST', 'STP', '678', 'ST', 'Sao Tome', 'Africa', 'Sao Tomean', 'Sao Tomeans', 'Dobra', 'STD', '165034', 'S?o Tom? and Pr?ncipe', ''),
(213, 'Saudi Arabia', 'SA', 'SA', 'SAU', '682', 'SA', 'Riyadh ', 'Middle East ', 'Saudi Arabian ', 'Saudis', 'Saudi Riyal', 'SAR', '22757092', 'Saudi Arabia', ''),
(214, 'Senegal', 'SG', 'SN', 'SEN', '686', 'SN', 'Dakar ', 'Africa ', 'Senegalese', 'Senegalese', 'CFA Franc BCEAO', 'XOF', '10284929', 'Senegal', ''),
(215, 'Serbia', '--', '--', '-- ', '--', '--', '', '', '', '', '', '', '', 'Serbia', 'now included as region within Yugoslavia'),
(216, 'Serbia and Montenegro', '--', '--', '-- ', '--', '--', '', '', '', '', '', '', '', 'Serbia and Montenegro', 'See Yugoslavia'),
(217, 'Seychelles', 'SE', 'SC', 'SYC', '690', 'SC', 'Victoria ', 'Africa ', 'Seychellois', 'Seychellois', 'Seychelles Rupee', 'SCR', '79715', 'Seychelles', ''),
(218, 'Sierra Leone', 'SL', 'SL', 'SLE', '694', 'SL', 'Freetown ', 'Africa ', 'Sierra Leonean', 'Sierra Leoneans', 'Leone', 'SLL', '5426618', 'Sierra Leone', ''),
(219, 'Singapore', 'SN', 'SG', 'SGP', '702', 'SG', 'Singapore ', 'Southeast Asia ', 'Singaporeian', 'Singaporeans', 'Singapore Dollar', 'SGD', '4300419', 'Singapore', ''),
(220, 'Slovakia', 'LO', 'SK', 'SVK', '703', 'SK', 'Bratislava ', 'Europe ', 'Slovakian', 'Slovaks', 'Slovak Koruna', 'SKK', '5414937', 'Slovakia', ''),
(221, 'Slovenia', 'SI', 'SI', 'SVN', '705', 'SI', 'Ljubljana ', 'Europe ', 'Slovenian', 'Slovenes', 'Tolar', 'SIT', '1930132', 'Slovenia', ''),
(222, 'Solomon Islands', 'BP', 'SB', 'SLB', '90', 'SB', 'Honiara ', 'Oceania ', 'Solomon Islander', 'Solomon Islanders', 'Solomon Islands Dollar', 'SBD', '480442', 'The Solomon Islands', ''),
(223, 'Somalia', 'SO', 'SO', 'SOM', '706', 'SO', 'Mogadishu ', 'Africa ', 'Somali', 'Somalis', 'Somali Shilling', 'SOS', '7488773', 'Somalia', ''),
(224, 'South Africa', 'SF', 'ZA', 'ZAF', '710', 'ZA', 'Pretoria', 'Africa ', 'South African', 'South Africans', 'Rand', 'ZAR', '43586097', 'South Africa', ''),
(225, 'South Georgia and the South Sandwich Islands', 'SX', 'GS', 'SGS', '239', 'GS', '', 'Antarctic Region ', '', '', 'Pound Sterling', 'GBP', '0', 'The South Georgia and the South Sandwich Islands', ''),
(226, 'Spain', 'SP', 'ES', 'ESP', '724', 'ES', 'Madrid ', 'Europe ', 'Spanish', 'Spaniards', 'Euro', 'EUR', '40037995', 'Spain', ''),
(227, 'Spratly Islands', 'PG', '--', '-- ', '--', '--', '', 'Southeast Asia ', '', '', '', '', '0', 'The Spratly Islands', ''),
(228, 'Sri Lanka', 'CE', 'LK', 'LKA', '144', 'LK', 'Colombo', 'Asia ', 'Sri Lankan', 'Sri Lankans', 'Sri Lanka Rupee', 'LKR', '19408635', 'Sri Lanka', ''),
(229, 'Sudan', 'SU', 'SD', 'SDN', '736', 'SD', 'Khartoum ', 'Africa ', 'Sudanese', 'Sudanese', 'Sudanese Dinar', 'SDD', '36080373', 'Sudan', ''),
(230, 'Suriname', 'NS', 'SR', 'SUR', '740', 'SR', 'Paramaribo ', 'South America ', 'Surinamese', 'Surinamers', 'Suriname Guilder', 'SRG', '433998', 'Suriname', ''),
(231, 'Svalbard', 'SV', 'SJ', 'SJM', '744', 'SJ', 'Longyearbyen ', 'Arctic Region ', '', '', 'Norwegian Krone', 'NOK', '2332', 'Svalbard', 'ISO includes Jan Mayen'),
(232, 'Swaziland', 'WZ', 'SZ', 'SWZ', '748', 'SZ', 'Mbabane ', 'Africa ', 'Swazi', 'Swazis', 'Lilangeni', 'SZL', '1104343', 'Swaziland', ''),
(233, 'Sweden', 'SW', 'SE', 'SWE', '752', 'SE', 'Stockholm ', 'Europe ', 'Swedish', 'Swedes', 'Swedish Krona', 'SEK', '8875053', 'Sweden', ''),
(234, 'Switzerland', 'SZ', 'CH', 'CHE', '756', 'CH', 'Bern ', 'Europe ', 'Swiss', 'Swiss', 'Swiss Franc', 'CHF', '7283274', 'Switzerland', ''),
(235, 'Syria', 'SY', 'SY', 'SYR', '760', 'SY', 'Damascus ', 'Middle East ', 'Syrian', 'Syrians', 'Syrian Pound', 'SYP', '16728808', 'Syria', ''),
(236, 'Taiwan', 'TW', 'TW', 'TWN', '158', 'TW', 'Taipei ', 'Southeast Asia ', 'Chinese', 'Chinese', 'New Taiwan Dollar', 'TWD', '22370461', 'Taiwan', ''),
(237, 'Tajikistan', 'TI', 'TJ', 'TJK', '762', 'TJ', 'Dushanbe ', 'Commonwealth of Independent States ', 'Tajikistani', 'Tajikistanis', 'Somoni', 'TJS', '6578681', 'Tajikistan', ''),
(238, 'Tanzania', 'TZ', 'TZ', 'TZA', '834', 'TZ', 'Dar es Salaam', 'Africa ', 'Tanzanian', 'Tanzanians', 'Tanzanian Shilling', 'TZS', '36232074', 'Tanzania', ''),
(239, 'Thailand', 'TH', 'TH', 'THA', '764', 'TH', 'Bangkok ', 'Southeast Asia ', 'Thai', 'Thai', 'Baht', 'THB', '61797751', 'Thailand', ''),
(240, 'Togo', 'TO', 'TG', 'TGO', '768', 'TG', 'Lome ', 'Africa ', 'Togolese', 'Togolese', 'CFA Franc BCEAO', 'XOF', '5153088', 'Togo', ''),
(241, 'Tokelau', 'TL', 'TK', 'TKL', '772', 'TK', '', 'Oceania ', 'Tokelauan', 'Tokelauans', 'New Zealand Dollar', 'NZD', '1445', 'Tokelau', ''),
(242, 'Tonga', 'TN', 'TO', 'TON', '776', 'TO', 'Nuku''alofa ', 'Oceania ', 'Tongan', 'Tongans', 'Pa''anga', 'TOP', '104227', 'Tonga', ''),
(243, 'Trinidad and Tobago', 'TD', 'TT', 'TTO', '780', 'TT', 'Port-of-Spain ', 'Central America and the Caribbean ', 'Trinidadian and Tobagonian', 'Trinidadians and Tobagonians', 'Trinidad and Tobago Dollar', 'TTD', '1169682', 'Trinidad and Tobago', ''),
(244, 'Tromelin Island', 'TE', '--', '-- ', '--', '--', '', 'Africa ', '', '', '', '', '0', 'Tromelin Island', 'ISO includes with the Miscellaneous (French) Indian Ocean Islands'),
(245, 'Tunisia', 'TS', 'TN', 'TUN', '788', 'TN', 'Tunis ', 'Africa ', 'Tunisian', 'Tunisians', 'Tunisian Dinar', 'TND', '9705102', 'Tunisia', ''),
(246, 'Turkey', 'TU', 'TR', 'TUR', '792', 'TR', 'Ankara ', 'Middle East ', 'Turkish', 'Turks', 'Turkish Lira', 'TRL', '66493970', 'Turkey', ''),
(247, 'Turkmenistan', 'TX', 'TM', 'TKM', '795', 'TM', 'Ashgabat ', 'Commonwealth of Independent States ', 'Turkmen', 'Turkmens', 'Manat', 'TMM', '4603244', 'Turkmenistan', ''),
(248, 'Turks and Caicos Islands', 'TK', 'TC', 'TCA', '796', 'TC', 'Cockburn Town ', 'Central America and the Caribbean ', '', '', 'US Dollar', 'USD', '18122', 'The Turks and Caicos Islands', ''),
(249, 'Tuvalu', 'TV', 'TV', 'TUV', '798', 'TV', 'Funafuti ', 'Oceania ', 'Tuvaluan', 'Tuvaluans', 'Australian Dollar', 'AUD', '10991', 'Tuvalu', ''),
(250, 'Uganda', 'UG', 'UG', 'UGA', '800', 'UG', 'Kampala ', 'Africa ', 'Ugandan', 'Ugandans', 'Uganda Shilling', 'UGX', '23985712', 'Uganda', ''),
(251, 'Ukraine', 'UP', 'UA', 'UKR', '804', 'UA', 'Kiev ', 'Commonwealth of Independent States ', 'Ukrainian', 'Ukrainians', 'Hryvnia', 'UAH', '48760474', 'The Ukraine', ''),
(252, 'United Arab Emirates', 'AE', 'AE', 'ARE', '784', 'AE', 'Abu Dhabi ', 'Middle East ', 'Emirati', 'Emiratis', 'UAE Dirham', 'AED', '2407460', 'The United Arab Emirates', ''),
(253, 'United Kingdom', 'UK', 'GB', 'GBR', '826', 'UK', 'London ', 'Europe ', 'British', 'Britons', 'Pound Sterling', 'GBP', '59647790', 'The United Kingdom', 'ISO includes Guernsey, Isle of Man, Jersey'),
(254, 'United States', 'US', 'US', 'USA', '840', 'US', 'Washington, DC ', 'North America ', 'American', 'Americans', 'US Dollar', 'USD', '278058881', 'The United States', ''),
(255, 'United States Minor Outlying Islands', '--', 'UM', 'UMI', '581', 'UM', '', '', '', '', 'US Dollar', 'USD', '0', 'The United States Minor Outlying Islands', 'ISO includes Baker Island, Howland Island, Jarvis Island, Johnston Atoll, Kingman Reef, Midway Islands, Palmyra Atoll, Wake Island'),
(256, 'Uruguay', 'UY', 'UY', 'URY', '858', 'UY', 'Montevideo ', 'South America ', 'Uruguayan', 'Uruguayans', 'Peso Uruguayo', 'UYU', '3360105', 'Uruguay', ''),
(257, 'Uzbekistan', 'UZ', 'UZ', 'UZB', '860', 'UZ', 'Tashkent', 'Commonwealth of Independent States ', 'Uzbekistani', 'Uzbekistanis', 'Uzbekistan Sum', 'UZS', '25155064', 'Uzbekistan', ''),
(258, 'Vanuatu', 'NH', 'VU', 'VUT', '548', 'VU', 'Port-Vila ', 'Oceania ', 'Ni-Vanuatu', 'Ni-Vanuatu', 'Vatu', 'VUV', '192910', 'Vanuatu', ''),
(259, 'Venezuela', 'VE', 'VE', 'VEN', '862', 'VE', 'Caracas ', 'South America, Central America and the Caribbean ', 'Venezuelan', 'Venezuelans', 'Bolivar', 'VEB', '23916810', 'Venezuela', ''),
(260, 'Vietnam', 'VM', 'VN', 'VNM', '704', 'VN', 'Hanoi ', 'Southeast Asia ', 'Vietnamese', 'Vietnamese', 'Dong', 'VND', '79939014', 'Vietnam', ''),
(261, 'Virgin Islands', 'VQ', 'VI', 'VIR', '850', 'VI', 'Charlotte Amalie ', 'Central America and the Caribbean ', 'Virgin Islander', 'Virgin Islanders', 'US Dollar', 'USD', '122211', 'The Virgin Islands', ''),
(262, 'Virgin Islands (UK)', '--', '--', '-- ', '--', '--', '', '', '', '', 'US Dollar', 'USD', '', 'Virgin Islands (UK)', 'see British Virgin Islands'),
(263, 'Virgin Islands (US)', '--', '--', '-- ', '--', '--', '', '', '', '', 'US Dollar', 'USD', '', 'Virgin Islands (US)', 'see Virgin Islands'),
(264, 'Wake Island', 'WQ', '--', '-- ', '--', '--', '', 'Oceania ', '', '', 'US Dollar', 'USD', '0', 'Wake Island', 'ISO includes with the US Minor Outlying Islands'),
(265, 'Wallis and Futuna', 'WF', 'WF', 'WLF', '876', 'WF', 'Mata-Utu', 'Oceania ', 'Wallis and Futuna Islander', 'Wallis and Futuna Islanders', 'CFP Franc', 'XPF', '15435', 'Wallis and Futuna', ''),
(266, 'West Bank', 'WE', '--', '-- ', '--', '--', '', 'Middle East ', '', '', 'New Israeli Shekel ', 'ILS', '2090713', 'The West Bank', ''),
(267, 'Western Sahara', 'WI', 'EH', 'ESH', '732', 'EH', '', 'Africa ', 'Sahrawian', 'Sahrawis', 'Moroccan Dirham', 'MAD', '250559', 'Western Sahara', ''),
(268, 'Western Samoa', '--', '--', '-- ', '--', '--', '', '', '', '', 'Tala', 'WST', '', 'Western Samoa', 'see Samoa'),
(269, 'World', '--', '--', '-- ', '--', '--', '', 'World, Time Zones ', '', '', '', '', '1862433264', 'The World', 'NULL'),
(270, 'Yemen', 'YM', 'YE', 'YEM', '887', 'YE', 'Sanaa ', 'Middle East ', 'Yemeni', 'Yemenis', 'Yemeni Rial', 'YER', '18078035', 'Yemen', ''),
(271, 'Yugoslavia', 'YI', 'YU', 'YUG', '891', 'YU', 'Belgrade ', 'Europe ', 'Serbian', 'Serbs', 'Yugoslavian Dinar ', 'YUM', '10677290', 'Yugoslavia', 'NULL'),
(272, 'Zaire', '--', '--', '-- ', '--', '--', '', '', '', '', '', '', '', 'Zaire', 'see Democratic Republic of the Congo'),
(273, 'Zambia', 'ZA', 'ZM', 'ZWB', '894', 'ZM', 'Lusaka ', 'Africa ', 'Zambian', 'Zambians', 'Kwacha', 'ZMK', '9770199', 'Zambia', ''),
(274, 'Zimbabwe', 'ZI', 'ZW', 'ZWE', '716', 'ZW', 'Harare ', 'Africa ', 'Zimbabwean', 'Zimbabweans', 'Zimbabwe Dollar', 'ZWD', '11365366', 'Zimbabwe', ''),
(275, 'Palestinian Territory, Occupied', '--', 'PS', 'PSE', '275', 'PS', '', '', '', '', '', '', '', 'Palestine', 'NULL');

-- --------------------------------------------------------

--
-- Table structure for table `credit_card_detail`
--

CREATE TABLE IF NOT EXISTS `credit_card_detail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `card_number` longtext,
  `card_cvc` longtext,
  `card_expiry` longtext,
  `card_type` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` text,
  `password` text,
  `first_name` text,
  `last_name` text,
  `slug` text,
  `store_credit` text,
  `phone` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_billing_address`
--

CREATE TABLE IF NOT EXISTS `customer_billing_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL DEFAULT '0',
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone` text,
  `street_address` text,
  `city` text,
  `state` text,
  `country` text,
  `zip` text,
  `company` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer_shipping_address`
--

CREATE TABLE IF NOT EXISTS `customer_shipping_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` int(20) NOT NULL DEFAULT '0',
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone` text,
  `street_address` text,
  `city` text,
  `state` text,
  `country` text,
  `zip` text,
  `company` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE IF NOT EXISTS `discount` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `discountID` bigint(20) NOT NULL DEFAULT '0',
  `percentage` float NOT NULL DEFAULT '0',
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `first_name` text,
  `last_name` text,
  `slug` text,
  `email` text,
  `phone` text,
  `role` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_current_address`
--

CREATE TABLE IF NOT EXISTS `employee_current_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `street_address` text,
  `city` text,
  `state` text,
  `country` text,
  `zip` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_permanent_address`
--

CREATE TABLE IF NOT EXISTS `employee_permanent_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `street_address` text,
  `city` text,
  `state` text,
  `country` text,
  `zip` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE IF NOT EXISTS `manufacturer` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text,
  `slug` text,
  `abbreviation` text,
  `image` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`id`, `name`, `slug`, `abbreviation`, `image`, `status`, `date_created`, `date_updated`) VALUES
(1, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(8, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(9, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(10, '0', '0', '0', '0', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) NOT NULL DEFAULT '0',
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `payment_option_id` bigint(20) NOT NULL DEFAULT '0',
  `card_number_id` bigint(20) NOT NULL DEFAULT '0',
  `status` enum('complete','incomplete') NOT NULL DEFAULT 'incomplete',
  `payment_status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `shipping_status` enum('pending','completed') NOT NULL DEFAULT 'pending',
  `order_status` enum('pending','dispatched','delivered','canceled','rejected') NOT NULL DEFAULT 'pending',
  `order_total` float DEFAULT NULL,
  `insurance_amount` float DEFAULT NULL,
  `tax_amount` float DEFAULT NULL,
  `shipping_amount` float DEFAULT NULL,
  `discount_amount` float DEFAULT NULL,
  `tax_exempt` float DEFAULT NULL,
  `transaction_id` text,
  `tracking_id` text,
  `discount` float DEFAULT NULL,
  `discount_id` bigint(20) NOT NULL DEFAULT '0',
  `order_date` datetime DEFAULT NULL,
  `shipping_date` datetime DEFAULT NULL,
  `delivery_date` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_billing_address`
--

CREATE TABLE IF NOT EXISTS `order_billing_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL DEFAULT '0',
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone` text,
  `street_address` text,
  `city` text,
  `state` text,
  `country` text,
  `zip` text,
  `company` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE IF NOT EXISTS `order_detail` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL DEFAULT '2',
  `item_id` bigint(20) NOT NULL DEFAULT '0',
  `item_quantity` int(11) NOT NULL DEFAULT '0',
  `item_color` text,
  `item_size` text,
  `item_image` text,
  `item_price` float DEFAULT NULL,
  `on_sale` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `subtotal` float DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping_address`
--

CREATE TABLE IF NOT EXISTS `order_shipping_address` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `order_id` bigint(20) NOT NULL DEFAULT '0',
  `first_name` text,
  `last_name` text,
  `email` text,
  `phone` text,
  `street_address` text,
  `city` text,
  `state` text,
  `country` text,
  `zip` text,
  `company` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `payment_option`
--

CREATE TABLE IF NOT EXISTS `payment_option` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `option_type` enum('card') NOT NULL DEFAULT 'card',
  `payment_option` enum('card') NOT NULL DEFAULT 'card',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text,
  `slug` text,
  `image` text,
  `manufacturer_id` bigint(20) NOT NULL DEFAULT '0',
  `brand_id` bigint(20) NOT NULL DEFAULT '0',
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `subcategory_id` bigint(20) NOT NULL DEFAULT '0',
  `model` text NOT NULL,
  `warranty_type_id` bigint(20) NOT NULL DEFAULT '0',
  `warranty_limit_id` bigint(20) NOT NULL DEFAULT '0',
  `short_description` text,
  `description` text,
  `status` int(1) NOT NULL DEFAULT '1',
  `price` float DEFAULT NULL,
  `on_sale` float DEFAULT NULL,
  `sale_price` float DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_updatede` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE IF NOT EXISTS `product_color` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `color_id` bigint(20) NOT NULL DEFAULT '0',
  `image` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_size`
--

CREATE TABLE IF NOT EXISTS `product_size` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `size_id` bigint(20) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `product_stock_availability`
--

CREATE TABLE IF NOT EXISTS `product_stock_availability` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `product_color_id` bigint(20) NOT NULL DEFAULT '0',
  `product_size_id` bigint(20) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sale_tax`
--

CREATE TABLE IF NOT EXISTS `sale_tax` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `active_date` date DEFAULT NULL,
  `active_status` int(11) NOT NULL,
  `percentage` float NOT NULL,
  `state_id` bigint(20) NOT NULL DEFAULT '0',
  `country_id` bigint(20) NOT NULL DEFAULT '0',
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_company`
--

CREATE TABLE IF NOT EXISTS `shipping_company` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text,
  `slug` text,
  `image` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shipping_type`
--

CREATE TABLE IF NOT EXISTS `shipping_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `shipping_company_id` bigint(20) NOT NULL DEFAULT '0',
  `shipping_type` enum('standard','express','free') NOT NULL DEFAULT 'free',
  `min_delivery_days` int(11) NOT NULL DEFAULT '45',
  `max_delivery_days` int(11) NOT NULL DEFAULT '7',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` text,
  `slug` text,
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` char(2) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=60 ;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `code`, `name`) VALUES
(1, 'AL', 'Alabama'),
(2, 'AK', 'Alaska'),
(3, 'AS', 'American Samoa'),
(4, 'AZ', 'Arizona'),
(5, 'AR', 'Arkansas'),
(6, 'CA', 'California'),
(7, 'CO', 'Colorado'),
(8, 'CT', 'Connecticut'),
(9, 'DE', 'Delaware'),
(10, 'DC', 'District of Columbia'),
(11, 'FM', 'Federated States of Micronesia'),
(12, 'FL', 'Florida'),
(13, 'GA', 'Georgia'),
(14, 'GU', 'Guam'),
(15, 'HI', 'Hawaii'),
(16, 'ID', 'Idaho'),
(17, 'IL', 'Illinois'),
(18, 'IN', 'Indiana'),
(19, 'IA', 'Iowa'),
(20, 'KS', 'Kansas'),
(21, 'KY', 'Kentucky'),
(22, 'LA', 'Louisiana'),
(23, 'ME', 'Maine'),
(24, 'MH', 'Marshall Islands'),
(25, 'MD', 'Maryland'),
(26, 'MA', 'Massachusetts'),
(27, 'MI', 'Michigan'),
(28, 'MN', 'Minnesota'),
(29, 'MS', 'Mississippi'),
(30, 'MO', 'Missouri'),
(31, 'MT', 'Montana'),
(32, 'NE', 'Nebraska'),
(33, 'NV', 'Nevada'),
(34, 'NH', 'New Hampshire'),
(35, 'NJ', 'New Jersey'),
(36, 'NM', 'New Mexico'),
(37, 'NY', 'New York'),
(38, 'NC', 'North Carolina'),
(39, 'ND', 'North Dakota'),
(40, 'MP', 'Northern Mariana Islands'),
(41, 'OH', 'Ohio'),
(42, 'OK', 'Oklahoma'),
(43, 'OR', 'Oregon'),
(44, 'PW', 'Palau'),
(45, 'PA', 'Pennsylvania'),
(46, 'PR', 'Puerto Rico'),
(47, 'RI', 'Rhode Island'),
(48, 'SC', 'South Carolina'),
(49, 'SD', 'South Dakota'),
(50, 'TN', 'Tennessee'),
(51, 'TX', 'Texas'),
(52, 'UT', 'Utah'),
(53, 'VT', 'Vermont'),
(54, 'VI', 'Virgin Islands'),
(55, 'VA', 'Virginia'),
(56, 'WA', 'Washington'),
(57, 'WV', 'West Virginia'),
(58, 'WI', 'Wisconsin'),
(59, 'WY', 'Wyoming');

-- --------------------------------------------------------

--
-- Table structure for table `stock_availability_refil`
--

CREATE TABLE IF NOT EXISTS `stock_availability_refil` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `stock_id` bigint(20) NOT NULL DEFAULT '0',
  `refil_amount` int(11) NOT NULL DEFAULT '0',
  `employee_id` bigint(20) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE IF NOT EXISTS `subcategory` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` mediumtext,
  `slug` mediumtext,
  `image` mediumtext,
  `status` int(11) NOT NULL DEFAULT '1',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `name`, `slug`, `image`, `status`, `date_created`, `date_updated`) VALUES
(1, 'Subcategory 1', 'subcategory-1', 'subcategory-1.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(2, 'Subcategory 2', 'subcategory-2', 'subcategory-2.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(3, 'Subcategory 3', 'subcategory-3', 'subcategory-3.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(4, 'Subcategory 4', 'subcategory-4', 'subcategory-4.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(5, 'Subcategory 5', 'subcategory-5', 'subcategory-5.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(6, 'Subcategory 6', 'subcategory-6', 'subcategory-6.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(7, 'Subcategory 7', 'subcategory-7', 'subcategory-7.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(8, 'Subcategory 8', 'subcategory-8', 'subcategory-8.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(9, 'Subcategory 9', 'subcategory-9', 'subcategory-9.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57'),
(10, 'Subcategory 10', 'subcategory-10', 'subcategory-10.jpg', 1, '2019-11-03 01:37:57', '2019-11-02 21:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `warranty_limit`
--

CREATE TABLE IF NOT EXISTS `warranty_limit` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `warranty_limit` int(1) NOT NULL DEFAULT '0',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `warranty_type`
--

CREATE TABLE IF NOT EXISTS `warranty_type` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `warranty_type` enum('parts','stitch','color','none') NOT NULL DEFAULT 'none',
  `date_created` datetime DEFAULT NULL,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
