-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 20-03-2014 a las 21:52:37
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sitenet_schema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alertfilter`
--

CREATE TABLE IF NOT EXISTS `alertfilter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_1` int(11) NOT NULL,
  `user_2` int(11) NOT NULL,
  `value` int(11) NOT NULL,
  `id_position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_position` (`id_position`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `alertfilter`
--

INSERT INTO `alertfilter` (`id`, `user_1`, `user_2`, `value`, `id_position`) VALUES
(16, 3, 4, 999, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `announcement_data`
--

CREATE TABLE IF NOT EXISTS `announcement_data` (
  `id_state` int(11) NOT NULL,
  `message` varchar(140) NOT NULL,
  `image` varchar(200) NOT NULL,
  PRIMARY KEY (`id_state`),
  UNIQUE KEY `id_state` (`id_state`),
  UNIQUE KEY `id_state_5` (`id_state`),
  KEY `id_state_2` (`id_state`),
  KEY `id_state_3` (`id_state`),
  KEY `id_state_4` (`id_state`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `announcement_data`
--

INSERT INTO `announcement_data` (`id_state`, `message`, `image`) VALUES
(3, 'a', '3Homer.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authassignment`
--

CREATE TABLE IF NOT EXISTS `cruge_authassignment` (
  `userid` int(11) NOT NULL,
  `bizrule` text,
  `data` text,
  `itemname` varchar(64) NOT NULL,
  PRIMARY KEY (`userid`,`itemname`),
  KEY `fk_cruge_authassignment_cruge_authitem1` (`itemname`),
  KEY `fk_cruge_authassignment_user` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitem`
--

CREATE TABLE IF NOT EXISTS `cruge_authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cruge_authitem`
--

INSERT INTO `cruge_authitem` (`name`, `type`, `description`, `bizrule`, `data`) VALUES
('action_activitytype_admin', 0, '', NULL, 'N;'),
('action_activitytype_create', 0, '', NULL, 'N;'),
('action_activitytype_delete', 0, '', NULL, 'N;'),
('action_activitytype_index', 0, '', NULL, 'N;'),
('action_activitytype_update', 0, '', NULL, 'N;'),
('action_activitytype_view', 0, '', NULL, 'N;'),
('action_activity_admin', 0, '', NULL, 'N;'),
('action_activity_create', 0, '', NULL, 'N;'),
('action_activity_delete', 0, '', NULL, 'N;'),
('action_activity_index', 0, '', NULL, 'N;'),
('action_activity_update', 0, '', NULL, 'N;'),
('action_activity_view', 0, '', NULL, 'N;'),
('action_crugeuser_delete', 0, '', NULL, 'N;'),
('action_crugeuser_get', 0, '', NULL, 'N;'),
('action_crugeuser_getall', 0, '', NULL, 'N;'),
('action_crugeuser_view', 0, '', NULL, 'N;'),
('action_friend_delete', 0, '', NULL, 'N;'),
('action_friend_getall', 0, '', NULL, 'N;'),
('action_friend_index', 0, '', NULL, 'N;'),
('action_friend_savefriend', 0, '', NULL, 'N;'),
('action_friend_view', 0, '', NULL, 'N;'),
('action_search_index', 0, '', NULL, 'N;'),
('action_search_search', 0, '', NULL, 'N;'),
('action_site_contact', 0, '', NULL, 'N;'),
('action_site_error', 0, '', NULL, 'N;'),
('action_site_index', 0, '', NULL, 'N;'),
('action_site_login', 0, '', NULL, 'N;'),
('action_site_loginmobile', 0, '', NULL, 'N;'),
('action_site_logout', 0, '', NULL, 'N;'),
('action_site_map', 0, '', NULL, 'N;'),
('action_ui_editprofile', 0, '', NULL, 'N;'),
('action_ui_fieldsadmincreate', 0, '', NULL, 'N;'),
('action_ui_fieldsadminlist', 0, '', NULL, 'N;'),
('action_ui_fieldsadminupdate', 0, '', NULL, 'N;'),
('action_ui_keepalive', 0, '', NULL, 'N;'),
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
('action_ui_sessionadmin', 0, '', NULL, 'N;'),
('action_ui_systemupdate', 0, '', NULL, 'N;'),
('action_ui_usermanagementadmin', 0, '', NULL, 'N;'),
('action_ui_usermanagementcreate', 0, '', NULL, 'N;'),
('action_ui_usermanagementupdate', 0, '', NULL, 'N;'),
('action_usertype_admin', 0, '', NULL, 'N;'),
('action_usertype_create', 0, '', NULL, 'N;'),
('action_usertype_delete', 0, '', NULL, 'N;'),
('action_usertype_index', 0, '', NULL, 'N;'),
('action_usertype_update', 0, '', NULL, 'N;'),
('action_usertype_view', 0, '', NULL, 'N;'),
('action_user_admin', 0, '', NULL, 'N;'),
('action_user_create', 0, '', NULL, 'N;'),
('action_user_delete', 0, '', NULL, 'N;'),
('action_user_index', 0, '', NULL, 'N;'),
('action_user_update', 0, '', NULL, 'N;'),
('action_user_view', 0, '', NULL, 'N;'),
('admin', 0, '', NULL, 'N;'),
('controller_activity', 0, '', NULL, 'N;'),
('controller_activitytype', 0, '', NULL, 'N;'),
('controller_crugeuser', 0, '', NULL, 'N;'),
('controller_friend', 0, '', NULL, 'N;'),
('controller_search', 0, '', NULL, 'N;'),
('controller_site', 0, '', NULL, 'N;'),
('controller_user', 0, '', NULL, 'N;'),
('controller_usertype', 0, '', NULL, 'N;'),
('edit-advanced-profile-features', 0, 'C:\\Users\\Jorge\\Desktop\\Tesis Android\\src\\pagina tesis\\protected\\modules\\cruge\\views\\ui\\usermanagementupdate.php linea 114', NULL, 'N;');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_authitemchild`
--

CREATE TABLE IF NOT EXISTS `cruge_authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_field`
--

CREATE TABLE IF NOT EXISTS `cruge_field` (
  `idfield` int(11) NOT NULL AUTO_INCREMENT,
  `fieldname` varchar(20) NOT NULL,
  `longname` varchar(50) DEFAULT NULL,
  `position` int(11) DEFAULT '0',
  `required` int(11) DEFAULT '0',
  `fieldtype` int(11) DEFAULT '0',
  `fieldsize` int(11) DEFAULT '20',
  `maxlength` int(11) DEFAULT '45',
  `showinreports` int(11) DEFAULT '0',
  `useregexp` varchar(512) DEFAULT NULL,
  `useregexpmsg` varchar(512) DEFAULT NULL,
  `predetvalue` mediumblob,
  PRIMARY KEY (`idfield`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `cruge_field`
--

INSERT INTO `cruge_field` (`idfield`, `fieldname`, `longname`, `position`, `required`, `fieldtype`, `fieldsize`, `maxlength`, `showinreports`, `useregexp`, `useregexpmsg`, `predetvalue`) VALUES
(1, 'isPlace', 'Is Place', 0, 0, 2, 1, 1, 1, '', '', ''),
(2, 'lastUpdateDate', 'Last Update Date', 0, 0, 0, 30, 45, 1, '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_fieldvalue`
--

CREATE TABLE IF NOT EXISTS `cruge_fieldvalue` (
  `idfieldvalue` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `idfield` int(11) NOT NULL,
  `value` blob,
  PRIMARY KEY (`idfieldvalue`),
  KEY `fk_cruge_fieldvalue_cruge_user1` (`iduser`),
  KEY `fk_cruge_fieldvalue_cruge_field1` (`idfield`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `cruge_fieldvalue`
--

INSERT INTO `cruge_fieldvalue` (`idfieldvalue`, `iduser`, `idfield`, `value`) VALUES
(1, 5, 1, ''),
(2, 6, 1, 0x31),
(3, 2, 1, ''),
(4, 7, 1, 0x31),
(5, 3, 1, ''),
(6, 4, 1, ''),
(7, 3, 2, 0x31342f30332f32302030353a32303a343720706d),
(8, 4, 2, 0x31342f30332f32302031323a32363a313020616d),
(9, 7, 2, ''),
(10, 1, 2, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_session`
--

CREATE TABLE IF NOT EXISTS `cruge_session` (
  `idsession` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` int(11) NOT NULL,
  `created` bigint(30) DEFAULT NULL,
  `expire` bigint(30) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `ipaddress` varchar(45) DEFAULT NULL,
  `usagecount` int(11) DEFAULT '0',
  `lastusage` bigint(30) DEFAULT NULL,
  `logoutdate` bigint(30) DEFAULT NULL,
  `ipaddressout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idsession`),
  KEY `crugesession_iduser` (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=295 ;

--
-- Volcado de datos para la tabla `cruge_session`
--

INSERT INTO `cruge_session` (`idsession`, `iduser`, `created`, `expire`, `status`, `ipaddress`, `usagecount`, `lastusage`, `logoutdate`, `ipaddressout`) VALUES
(1, 1, 1372901472, 1372903272, 1, '127.0.0.1', 1, 1372901472, NULL, NULL),
(2, 1, 1373236880, 1373238680, 1, '127.0.0.1', 1, 1373236880, NULL, NULL),
(3, 1, 1373329072, 1373330872, 1, '127.0.0.1', 1, 1373329072, NULL, NULL),
(4, 1, 1373416208, 1373418008, 0, '127.0.0.1', 1, 1373416208, 1373416748, '127.0.0.1'),
(5, 1, 1373417484, 1373419284, 0, '127.0.0.1', 1, 1373417484, 1373417796, '127.0.0.1'),
(6, 1, 1373418011, 1373419811, 1, '127.0.0.1', 1, 1373418011, NULL, NULL),
(7, 1, 1373586962, 1373588762, 0, '127.0.0.1', 1, 1373586962, 1373587109, '127.0.0.1'),
(8, 1, 1373587128, 1373588928, 0, '127.0.0.1', 1, 1373587128, 1373587201, '127.0.0.1'),
(9, 2, 1373587208, 1373589008, 1, '127.0.0.1', 1, 1373587208, NULL, NULL),
(10, 1, 1373841930, 1373843730, 0, '127.0.0.1', 1, 1373841930, 1373842046, '127.0.0.1'),
(11, 2, 1373842056, 1373843856, 0, '127.0.0.1', 1, 1373842056, 1373843373, '127.0.0.1'),
(12, 2, 1373845735, 1373847535, 1, '127.0.0.1', 7, 1373846982, NULL, NULL),
(13, 1, 1373846711, 1373848511, 0, '127.0.0.1', 1, 1373846711, 1373846716, '127.0.0.1'),
(14, 1, 1373846994, 1373848794, 0, '127.0.0.1', 1, 1373846994, 1373847139, '127.0.0.1'),
(15, 2, 1373848545, 1373850345, 1, '127.0.0.1', 1, 1373848545, NULL, NULL),
(16, 2, 1374617829, 1374619629, 0, '127.0.0.1', 3, 1374618617, NULL, NULL),
(17, 1, 1374618547, 1374620347, 1, '127.0.0.1', 1, 1374618547, NULL, NULL),
(18, 2, 1374619743, 1374621543, 1, '127.0.0.1', 5, 1374621528, NULL, NULL),
(19, 1, 1374621541, 1374623341, 0, '127.0.0.1', 2, 1374621578, NULL, NULL),
(20, 2, 1374626129, 1374627929, 1, '127.0.0.1', 1, 1374626129, NULL, NULL),
(21, 1, 1374626143, 1374627943, 0, '127.0.0.1', 1, 1374626143, 1374626148, '127.0.0.1'),
(22, 2, 1375312102, 1375313902, 0, '127.0.0.1', 1, 1375312102, 1375312343, '127.0.0.1'),
(23, 2, 1375312398, 1375314198, 0, '127.0.0.1', 1, 1375312398, 1375312417, '127.0.0.1'),
(24, 2, 1375312470, 1375314270, 0, '127.0.0.1', 1, 1375312470, 1375312472, '127.0.0.1'),
(25, 2, 1375312478, 1375314278, 0, '127.0.0.1', 2, 1375312810, 1375312817, '127.0.0.1'),
(26, 2, 1375312897, 1375314697, 0, '127.0.0.1', 1, 1375312897, 1375312904, '127.0.0.1'),
(27, 2, 1375312973, 1375314773, 0, '127.0.0.1', 1, 1375312973, 1375312979, '127.0.0.1'),
(28, 2, 1375312985, 1375314785, 0, '127.0.0.1', 1, 1375312985, 1375313002, '127.0.0.1'),
(29, 2, 1375313018, 1375314818, 0, '127.0.0.1', 1, 1375313018, 1375313023, '127.0.0.1'),
(30, 2, 1375313067, 1375314867, 0, '127.0.0.1', 1, 1375313067, 1375313072, '127.0.0.1'),
(31, 2, 1375313087, 1375314887, 0, '127.0.0.1', 1, 1375313087, 1375313094, '127.0.0.1'),
(32, 2, 1375313581, 1375315381, 0, '127.0.0.1', 1, 1375313581, 1375313588, '127.0.0.1'),
(33, 2, 1375313663, 1375315463, 0, '127.0.0.1', 2, 1375313676, 1375313681, '127.0.0.1'),
(34, 2, 1375313694, 1375315494, 0, '127.0.0.1', 1, 1375313694, 1375313696, '127.0.0.1'),
(35, 2, 1375313760, 1375315560, 0, '127.0.0.1', 1, 1375313760, 1375313766, '127.0.0.1'),
(36, 2, 1375313778, 1375315578, 1, '127.0.0.1', 10, 1375314501, NULL, NULL),
(37, 2, 1375397796, 1375399596, 0, '127.0.0.1', 1, 1375397796, NULL, NULL),
(38, 2, 1375633520, 1375635320, 1, '127.0.0.1', 1, 1375633520, NULL, NULL),
(39, 2, 1375746244, 1375748044, 0, '127.0.0.1', 1, 1375746244, 1375746270, '127.0.0.1'),
(40, 2, 1375746281, 1375748081, 1, '127.0.0.1', 1, 1375746281, NULL, NULL),
(41, 2, 1375748797, 1375750597, 1, '127.0.0.1', 1, 1375748797, NULL, NULL),
(42, 2, 1376000362, 1376002162, 0, '127.0.0.1', 1, 1376000362, NULL, NULL),
(43, 2, 1376005749, 1376007549, 0, '127.0.0.1', 2, 1376005979, NULL, NULL),
(44, 2, 1376536169, 1376537969, 1, '127.0.0.1', 1, 1376536169, NULL, NULL),
(45, 1, 1376699956, 1376701756, 0, '127.0.0.1', 1, 1376699956, NULL, NULL),
(46, 1, 1376701810, 1376703610, 0, '127.0.0.1', 1, 1376701810, NULL, NULL),
(47, 1, 1376704619, 1376706419, 0, '127.0.0.1', 1, 1376704619, 1376705825, '127.0.0.1'),
(48, 2, 1376804794, 1376806594, 0, '127.0.0.1', 1, 1376804794, NULL, NULL),
(49, 2, 1376844145, 1376845945, 1, '127.0.0.1', 1, 1376844145, NULL, NULL),
(50, 1, 1376845869, 1376847669, 0, '127.0.0.1', 1, 1376845869, NULL, NULL),
(51, 2, 1376848742, 1376850542, 0, '127.0.0.1', 1, 1376848742, 1376848747, '127.0.0.1'),
(52, 2, 1376848756, 1376850556, 0, '127.0.0.1', 1, 1376848756, 1376848772, '127.0.0.1'),
(53, 2, 1376880932, 1376882732, 0, '127.0.0.1', 1, 1376880932, 1376880945, '127.0.0.1'),
(54, 2, 1376881092, 1376882892, 0, '127.0.0.1', 1, 1376881092, NULL, NULL),
(55, 2, 1376884169, 1376885969, 1, '127.0.0.1', 4, 1376884744, NULL, NULL),
(56, 1, 1376884217, 1376886017, 0, '127.0.0.1', 1, 1376884217, 1376884271, '127.0.0.1'),
(57, 2, 1376926584, 1376928384, 0, '127.0.0.1', 1, 1376926584, NULL, NULL),
(58, 2, 1376941337, 1376943137, 1, '127.0.0.1', 1, 1376941337, NULL, NULL),
(59, 1, 1376941388, 1376943188, 0, '127.0.0.1', 1, 1376941388, NULL, NULL),
(60, 2, 1376943500, 1376945300, 1, '127.0.0.1', 1, 1376943500, NULL, NULL),
(61, 2, 1377040763, 1377042563, 0, '127.0.0.1', 1, 1377040763, NULL, NULL),
(62, 2, 1377126905, 1377128705, 0, '127.0.0.1', 1, 1377126905, NULL, NULL),
(63, 1, 1377128976, 1377130776, 1, '127.0.0.1', 1, 1377128976, NULL, NULL),
(64, 2, 1377213847, 1377215647, 0, '127.0.0.1', 1, 1377213847, NULL, NULL),
(65, 1, 1377215797, 1377217597, 0, '127.0.0.1', 1, 1377215797, NULL, NULL),
(66, 1, 1377217722, 1377219522, 1, '127.0.0.1', 1, 1377217722, NULL, NULL),
(67, 2, 1377472744, 1377474544, 1, '127.0.0.1', 1, 1377472744, NULL, NULL),
(68, 2, 1378178914, 1378180714, 1, '127.0.0.1', 1, 1378178914, NULL, NULL),
(69, 2, 1378227806, 1378229606, 1, '127.0.0.1', 2, 1378229123, NULL, NULL),
(70, 2, 1378237484, 1378239284, 0, '127.0.0.1', 1, 1378237484, NULL, NULL),
(71, 2, 1378330777, 1378332577, 0, '127.0.0.1', 1, 1378330777, NULL, NULL),
(72, 1, 1378335646, 1378337446, 0, '127.0.0.1', 1, 1378335646, NULL, NULL),
(73, 1, 1378339019, 1378340819, 0, '127.0.0.1', 1, 1378339019, 1378339133, '127.0.0.1'),
(74, 2, 1378339267, 1378341067, 0, '127.0.0.1', 1, 1378339267, 1378340023, '127.0.0.1'),
(75, 6, 1378340071, 1378341871, 1, '127.0.0.1', 5, 1378340915, NULL, NULL),
(76, 2, 1378340937, 1378342737, 0, '127.0.0.1', 2, 1378340957, 1378341064, '127.0.0.1'),
(77, 2, 1378341073, 1378342873, 1, '127.0.0.1', 1, 1378341073, NULL, NULL),
(78, 2, 1378420980, 1378422780, 0, '127.0.0.1', 3, 1378421416, NULL, NULL),
(79, 2, 1378656588, 1378658388, 0, '127.0.0.1', 2, 1378656894, 1378656935, '127.0.0.1'),
(80, 2, 1378656942, 1378658742, 0, '127.0.0.1', 1, 1378656942, 1378656986, '127.0.0.1'),
(81, 2, 1378656990, 1378658790, 0, '127.0.0.1', 1, 1378656990, NULL, NULL),
(82, 2, 1378698816, 1378700616, 0, '127.0.0.1', 1, 1378698816, 1378698830, '127.0.0.1'),
(83, 7, 1378698877, 1378700677, 1, '127.0.0.1', 3, 1378699883, NULL, NULL),
(84, 7, 1378701146, 1378702946, 1, '127.0.0.1', 3, 1378701441, NULL, NULL),
(85, 3, 1378811214, 1378813014, 0, '127.0.0.1', 1, 1378811214, 1378811242, '127.0.0.1'),
(86, 3, 1378811402, 1378813202, 0, '127.0.0.1', 1, 1378811402, 1378811411, '127.0.0.1'),
(87, 3, 1378812334, 1378814134, 1, '127.0.0.1', 1, 1378812334, NULL, NULL),
(88, 3, 1378814847, 1378816647, 1, '127.0.0.1', 1, 1378814847, NULL, NULL),
(89, 3, 1378847803, 1378849603, 0, '127.0.0.1', 2, 1378849058, NULL, NULL),
(90, 3, 1378853998, 1378855798, 0, '127.0.0.1', 1, 1378853998, 1378854754, '127.0.0.1'),
(91, 3, 1378854850, 1378856650, 1, '127.0.0.1', 1, 1378854850, NULL, NULL),
(92, 7, 1378942438, 1378944238, 1, '127.0.0.1', 1, 1378942438, NULL, NULL),
(93, 3, 1379169418, 1379171218, 0, '127.0.0.1', 1, 1379169418, 1379170135, '127.0.0.1'),
(94, 3, 1379170139, 1379171939, 1, '127.0.0.1', 1, 1379170139, NULL, NULL),
(95, 3, 1379172612, 1379174412, 1, '127.0.0.1', 1, 1379172612, NULL, NULL),
(96, 3, 1379192663, 1379194463, 1, '127.0.0.1', 1, 1379192663, NULL, NULL),
(97, 7, 1379257809, 1379259609, 1, '127.0.0.1', 1, 1379257809, NULL, NULL),
(98, 7, 1379279260, 1379281060, 0, '127.0.0.1', 1, 1379279260, NULL, NULL),
(99, 7, 1379281429, 1379283229, 0, '127.0.0.1', 1, 1379281429, NULL, NULL),
(100, 7, 1379283816, 1379285616, 0, '127.0.0.1', 3, 1379285317, NULL, NULL),
(101, 7, 1379286437, 1379288237, 0, '127.0.0.1', 1, 1379286437, 1379287970, '127.0.0.1'),
(102, 7, 1379290440, 1379292240, 0, '127.0.0.1', 1, 1379290440, 1379291428, '127.0.0.1'),
(103, 2, 1379291433, 1379293233, 0, '127.0.0.1', 1, 1379291433, 1379291685, '127.0.0.1'),
(104, 7, 1379291691, 1379293491, 1, '127.0.0.1', 2, 1379291758, NULL, NULL),
(105, 7, 1379353881, 1379355681, 0, '127.0.0.1', 1, 1379353881, NULL, NULL),
(106, 7, 1379355918, 1379357718, 0, '127.0.0.1', 1, 1379355918, 1379355922, '127.0.0.1'),
(107, 2, 1379355930, 1379357730, 0, '127.0.0.1', 1, 1379355930, 1379356323, '127.0.0.1'),
(108, 2, 1379356333, 1379358133, 0, '127.0.0.1', 1, 1379356333, 1379356338, '127.0.0.1'),
(109, 7, 1379356342, 1379358142, 0, '127.0.0.1', 1, 1379356342, 1379358046, '127.0.0.1'),
(110, 2, 1379358050, 1379359850, 1, '127.0.0.1', 1, 1379358050, NULL, NULL),
(111, 7, 1379361167, 1379362967, 0, '127.0.0.1', 1, 1379361167, 1379361189, '127.0.0.1'),
(112, 2, 1379361195, 1379362995, 1, '127.0.0.1', 1, 1379361195, NULL, NULL),
(113, 2, 1379712891, 1379714691, 0, '127.0.0.1', 2, 1379712984, 1379713073, '127.0.0.1'),
(114, 2, 1379713093, 1379714893, 1, '127.0.0.1', 1, 1379713093, NULL, NULL),
(115, 7, 1379807421, 1379809221, 0, '127.0.0.1', 1, 1379807421, 1379807579, '127.0.0.1'),
(116, 3, 1379807606, 1379809406, 1, '127.0.0.1', 1, 1379807606, NULL, NULL),
(117, 2, 1380058579, 1380060379, 0, '127.0.0.1', 3, 1380058846, NULL, NULL),
(118, 1, 1380058633, 1380060433, 1, '127.0.0.1', 1, 1380058633, NULL, NULL),
(119, 2, 1380112348, 1380114148, 1, '127.0.0.1', 1, 1380112348, NULL, NULL),
(120, 2, 1380147039, 1380148839, 1, '127.0.0.1', 1, 1380147039, NULL, NULL),
(121, 2, 1380246791, 1380248591, 1, '127.0.0.1', 1, 1380246791, NULL, NULL),
(122, 2, 1380325202, 1380327002, 1, '127.0.0.1', 1, 1380325202, NULL, NULL),
(123, 1, 1380471383, 1380473183, 0, '127.0.0.1', 17, 1380473003, NULL, NULL),
(124, 3, 1380473367, 1380475167, 0, '127.0.0.1', 1, 1380473367, 1380473372, '127.0.0.1'),
(125, 3, 1380473700, 1380475500, 0, '127.0.0.1', 1, 1380473700, 1380473738, '127.0.0.1'),
(126, 3, 1380473934, 1380475734, 0, '127.0.0.1', 1, 1380473934, 1380474566, '127.0.0.1'),
(127, 3, 1380474842, 1380476642, 0, '127.0.0.1', 1, 1380474842, NULL, NULL),
(128, 1, 1380497402, 1380499202, 0, '127.0.0.1', 1, 1380497402, 1380497408, '127.0.0.1'),
(129, 3, 1380497520, 1380499320, 0, '127.0.0.1', 1, 1380497520, 1380497533, '127.0.0.1'),
(130, 2, 1380497541, 1380499341, 1, '127.0.0.1', 1, 1380497541, NULL, NULL),
(131, 4, 1380497590, 1380499390, 0, '127.0.0.1', 1, 1380497590, 1380497804, '127.0.0.1'),
(132, 1, 1380497811, 1380499611, 0, '127.0.0.1', 1, 1380497811, 1380497858, '127.0.0.1'),
(133, 3, 1380759588, 1380761388, 0, '127.0.0.1', 1, 1380759588, NULL, NULL),
(134, 3, 1381363427, 1381365227, 0, '127.0.0.1', 1, 1381363427, 1381363556, '127.0.0.1'),
(135, 4, 1381363580, 1381365380, 0, '127.0.0.1', 1, 1381363580, NULL, NULL),
(136, 3, 1381448036, 1381449836, 0, '127.0.0.1', 1, 1381448036, NULL, NULL),
(137, 3, 1381450779, 1381452579, 0, '127.0.0.1', 1, 1381450779, NULL, NULL),
(138, 3, 1381457515, 1381459315, 0, '127.0.0.1', 1, 1381457515, 1381457529, '127.0.0.1'),
(139, 3, 1381457541, 1381459341, 0, '127.0.0.1', 1, 1381457541, 1381458298, '127.0.0.1'),
(140, 3, 1381458303, 1381460103, 1, '127.0.0.1', 1, 1381458303, NULL, NULL),
(141, 3, 1381961319, 1381963119, 0, '127.0.0.1', 2, 1381962324, NULL, NULL),
(142, 3, 1381970441, 1381972241, 0, '127.0.0.1', 2, 1381970470, NULL, NULL),
(143, 3, 1382492557, 1382494357, 0, '127.0.0.1', 1, 1382492557, NULL, NULL),
(144, 3, 1382564755, 1382566555, 0, '127.0.0.1', 1, 1382564755, NULL, NULL),
(145, 3, 1382657888, 1382659688, 1, '127.0.0.1', 1, 1382657888, NULL, NULL),
(146, 1, 1382659343, 1382661143, 0, '127.0.0.1', 1, 1382659343, NULL, NULL),
(147, 3, 1382661385, 1382663185, 0, '127.0.0.1', 1, 1382661385, 1382662521, '127.0.0.1'),
(148, 3, 1382662527, 1382664327, 1, '127.0.0.1', 1, 1382662527, NULL, NULL),
(149, 3, 1382701084, 1382702884, 0, '127.0.0.1', 1, 1382701084, 1382701539, '127.0.0.1'),
(150, 3, 1382701543, 1382703343, 1, '127.0.0.1', 1, 1382701543, NULL, NULL),
(151, 3, 1383176707, 1383178507, 0, '127.0.0.1', 1, 1383176707, NULL, NULL),
(152, 3, 1383178685, 1383180485, 0, '127.0.0.1', 1, 1383178685, NULL, NULL),
(153, 3, 1383180506, 1383182306, 0, '127.0.0.1', 2, 1383182212, NULL, NULL),
(154, 3, 1383182371, 1383184171, 1, '127.0.0.1', 1, 1383182371, NULL, NULL),
(155, 3, 1383350312, 1383352112, 1, '127.0.0.1', 1, 1383350312, NULL, NULL),
(156, 3, 1383404532, 1383406332, 0, '127.0.0.1', 1, 1383404532, NULL, NULL),
(157, 3, 1383429209, 1383431009, 1, '127.0.0.1', 1, 1383429209, NULL, NULL),
(158, 3, 1383434338, 1383436138, 0, '127.0.0.1', 1, 1383434338, NULL, NULL),
(159, 3, 1383436147, 1383437947, 1, '127.0.0.1', 1, 1383436147, NULL, NULL),
(160, 3, 1383516462, 1383518262, 0, '127.0.0.1', 1, 1383516462, NULL, NULL),
(161, 3, 1383518341, 1383520141, 0, '127.0.0.1', 1, 1383518341, NULL, NULL),
(162, 3, 1383524351, 1383526151, 0, '127.0.0.1', 1, 1383524351, NULL, NULL),
(163, 3, 1383526177, 1383527977, 0, '127.0.0.1', 1, 1383526177, NULL, NULL),
(164, 3, 1383528629, 1383530429, 1, '127.0.0.1', 1, 1383528629, NULL, NULL),
(165, 3, 1383576135, 1383577935, 0, '127.0.0.1', 1, 1383576135, 1383576228, '127.0.0.1'),
(166, 4, 1383576276, 1383578076, 0, '127.0.0.1', 1, 1383576276, NULL, NULL),
(167, 3, 1383578825, 1383580625, 0, '127.0.0.1', 1, 1383578825, NULL, NULL),
(168, 3, 1383621708, 1383623508, 1, '127.0.0.1', 1, 1383621708, NULL, NULL),
(169, 3, 1383655486, 1383657286, 0, '127.0.0.1', 1, 1383655486, NULL, NULL),
(170, 3, 1383658769, 1383660569, 0, '127.0.0.1', 1, 1383658769, NULL, NULL),
(171, 3, 1383662869, 1383664669, 1, '127.0.0.1', 1, 1383662869, NULL, NULL),
(172, 3, 1383693880, 1383695680, 1, '127.0.0.1', 1, 1383693880, NULL, NULL),
(173, 3, 1383778277, 1383780077, 1, '127.0.0.1', 1, 1383778277, NULL, NULL),
(174, 3, 1383956579, 1383958379, 1, '127.0.0.1', 1, 1383956579, NULL, NULL),
(175, 3, 1384015134, 1384016934, 0, '127.0.0.1', 1, 1384015134, NULL, NULL),
(176, 3, 1384110641, 1384112441, 0, '127.0.0.1', 1, 1384110641, NULL, NULL),
(177, 1, 1384121947, 1384123747, 1, '127.0.0.1', 1, 1384121947, NULL, NULL),
(178, 3, 1384181696, 1384183496, 0, '127.0.0.1', 1, 1384181696, NULL, NULL),
(179, 3, 1384186378, 1384188178, 0, '127.0.0.1', 1, 1384186378, NULL, NULL),
(180, 3, 1384188472, 1384190272, 0, '127.0.0.1', 1, 1384188472, NULL, NULL),
(181, 3, 1384211589, 1384213389, 0, '127.0.0.1', 1, 1384211589, NULL, NULL),
(182, 3, 1384213975, 1384215775, 0, '127.0.0.1', 1, 1384213975, NULL, NULL),
(183, 3, 1384263585, 1384265385, 1, '127.0.0.1', 1, 1384263585, NULL, NULL),
(184, 3, 1384304417, 1384306217, 0, '127.0.0.1', 1, 1384304417, NULL, NULL),
(185, 3, 1384483788, 1384485588, 1, '127.0.0.1', 1, 1384483788, NULL, NULL),
(186, 3, 1384552878, 1384554678, 0, '127.0.0.1', 1, 1384552878, 1384554606, '127.0.0.1'),
(187, 3, 1384554612, 1384556412, 0, '127.0.0.1', 1, 1384554612, 1384554811, '127.0.0.1'),
(188, 3, 1384554832, 1384556632, 0, '127.0.0.1', 1, 1384554832, NULL, NULL),
(189, 3, 1384556727, 1384558527, 0, '127.0.0.1', 1, 1384556727, NULL, NULL),
(190, 3, 1384558781, 1384560581, 0, '127.0.0.1', 1, 1384558781, NULL, NULL),
(191, 7, 1384561750, 1384563550, 1, '127.0.0.1', 1, 1384561750, NULL, NULL),
(192, 3, 1384561758, 1384563558, 0, '127.0.0.1', 1, 1384561758, NULL, NULL),
(193, 3, 1384564225, 1384566025, 0, '127.0.0.1', 2, 1384564656, NULL, NULL),
(194, 7, 1384564646, 1384566446, 1, '127.0.0.1', 1, 1384564646, NULL, NULL),
(195, 3, 1384567821, 1384569621, 1, '127.0.0.1', 1, 1384567821, NULL, NULL),
(196, 3, 1384645180, 1384646980, 0, '127.0.0.1', 1, 1384645180, NULL, NULL),
(197, 3, 1384668535, 1384670335, 0, '127.0.0.1', 1, 1384668535, 1384668840, '127.0.0.1'),
(198, 3, 1384668850, 1384670650, 0, '127.0.0.1', 1, 1384668850, 1384669088, '127.0.0.1'),
(199, 3, 1384709189, 1384710989, 0, '127.0.0.1', 1, 1384709189, NULL, NULL),
(200, 3, 1384711333, 1384713133, 0, '127.0.0.1', 1, 1384711333, NULL, NULL),
(201, 3, 1384713959, 1384715759, 0, '127.0.0.1', 2, 1384714246, NULL, NULL),
(202, 1, 1384713990, 1384715790, 0, '127.0.0.1', 1, 1384713990, 1384714030, '127.0.0.1'),
(203, 3, 1384718924, 1384720724, 0, '127.0.0.1', 1, 1384718924, NULL, NULL),
(204, 3, 1384731907, 1384733707, 0, '127.0.0.1', 1, 1384731907, NULL, NULL),
(205, 3, 1384735217, 1384737017, 0, '127.0.0.1', 1, 1384735217, NULL, NULL),
(206, 3, 1384820363, 1384822163, 0, '127.0.0.1', 1, 1384820363, 1384820652, '127.0.0.1'),
(207, 1, 1384820905, 1384822705, 0, '127.0.0.1', 1, 1384820905, 1384822109, '127.0.0.1'),
(208, 3, 1384822114, 1384823914, 1, '127.0.0.1', 1, 1384822114, NULL, NULL),
(209, 4, 1384898497, 1384900297, 0, '127.0.0.1', 1, 1384898497, NULL, NULL),
(210, 3, 1384899693, 1384901493, 1, '127.0.0.1', 1, 1384899693, NULL, NULL),
(211, 4, 1384900683, 1384902483, 0, '127.0.0.1', 1, 1384900683, 1384902268, '127.0.0.1'),
(212, 3, 1384902290, 1384904090, 0, '127.0.0.1', 1, 1384902290, 1384903137, '127.0.0.1'),
(213, 3, 1384903168, 1384904968, 0, '127.0.0.1', 1, 1384903168, NULL, NULL),
(214, 3, 1384905043, 1384906843, 0, '127.0.0.1', 1, 1384905043, NULL, NULL),
(215, 3, 1384909166, 1384910966, 1, '127.0.0.1', 1, 1384909166, NULL, NULL),
(216, 3, 1385070026, 1385071826, 0, '127.0.0.1', 1, 1385070026, 1385070059, '127.0.0.1'),
(217, 4, 1385070063, 1385071863, 0, '127.0.0.1', 1, 1385070063, 1385071360, '127.0.0.1'),
(218, 3, 1385071450, 1385073250, 0, '127.0.0.1', 1, 1385071450, 1385071614, '127.0.0.1'),
(219, 4, 1385071619, 1385073419, 0, '127.0.0.1', 1, 1385071619, 1385071866, '127.0.0.1'),
(220, 3, 1385071869, 1385073669, 0, '127.0.0.1', 1, 1385071869, 1385072006, '127.0.0.1'),
(221, 4, 1385072010, 1385073810, 0, '127.0.0.1', 1, 1385072010, 1385072621, '127.0.0.1'),
(222, 4, 1385072625, 1385074425, 0, '127.0.0.1', 2, 1385072697, 1385072727, '127.0.0.1'),
(223, 3, 1385072733, 1385074533, 0, '127.0.0.1', 1, 1385072733, 1385072769, '127.0.0.1'),
(224, 3, 1385072772, 1385074572, 0, '127.0.0.1', 1, 1385072772, 1385073256, '127.0.0.1'),
(225, 1, 1385073261, 1385075061, 0, '127.0.0.1', 1, 1385073261, 1385073452, '127.0.0.1'),
(226, 3, 1385073502, 1385075302, 0, '127.0.0.1', 1, 1385073502, 1385073938, '127.0.0.1'),
(227, 4, 1385073943, 1385075743, 0, '127.0.0.1', 1, 1385073943, 1385074234, '127.0.0.1'),
(228, 4, 1385074238, 1385076038, 0, '127.0.0.1', 1, 1385074238, 1385074267, '127.0.0.1'),
(229, 3, 1385074271, 1385076071, 0, '127.0.0.1', 1, 1385074271, 1385074337, '127.0.0.1'),
(230, 4, 1385074347, 1385076147, 0, '127.0.0.1', 1, 1385074347, 1385075065, '127.0.0.1'),
(231, 4, 1385075074, 1385076874, 0, '127.0.0.1', 1, 1385075074, 1385075100, '127.0.0.1'),
(232, 3, 1385075106, 1385076906, 0, '127.0.0.1', 1, 1385075106, 1385075582, '127.0.0.1'),
(233, 4, 1385075586, 1385077386, 0, '127.0.0.1', 1, 1385075586, 1385075773, '127.0.0.1'),
(234, 3, 1385075777, 1385077577, 0, '127.0.0.1', 1, 1385075777, 1385075923, '127.0.0.1'),
(235, 4, 1385075928, 1385077728, 1, '127.0.0.1', 1, 1385075928, NULL, NULL),
(236, 3, 1385149169, 1385150969, 0, '127.0.0.1', 1, 1385149169, 1385149315, '127.0.0.1'),
(237, 4, 1385149200, 1385151000, 0, '127.0.0.1', 2, 1385149319, 1385149324, '127.0.0.1'),
(238, 4, 1385149330, 1385151130, 0, '127.0.0.1', 2, 1385149789, 1385149844, '127.0.0.1'),
(239, 3, 1385149881, 1385151681, 0, '127.0.0.1', 1, 1385149881, NULL, NULL),
(240, 4, 1385149910, 1385151710, 1, '127.0.0.1', 1, 1385149910, NULL, NULL),
(241, 4, 1385151776, 1385153576, 1, '127.0.0.1', 1, 1385151776, NULL, NULL),
(242, 4, 1385155356, 1385157156, 0, '127.0.0.1', 1, 1385155356, 1385155450, '127.0.0.1'),
(243, 3, 1385155375, 1385157175, 0, '127.0.0.1', 1, 1385155375, 1385155453, '127.0.0.1'),
(244, 3, 1385156594, 1385158394, 0, '127.0.0.1', 1, 1385156594, NULL, NULL),
(245, 4, 1385156609, 1385158409, 0, '127.0.0.1', 1, 1385156609, 1385157978, '127.0.0.1'),
(246, 3, 1385595947, 1385597747, 0, '127.0.0.1', 4, 1385596568, NULL, NULL),
(247, 3, 1385598004, 1385599804, 0, '127.0.0.1', 5, 1385598513, NULL, NULL),
(248, 3, 1385600154, 1385601954, 1, '127.0.0.1', 1, 1385600154, NULL, NULL),
(249, 3, 1385680575, 1385682375, 0, '127.0.0.1', 1, 1385680575, NULL, NULL),
(250, 3, 1385683064, 1385684864, 0, '127.0.0.1', 3, 1385684460, NULL, NULL),
(251, 3, 1385684878, 1385686678, 1, '127.0.0.1', 2, 1385684970, NULL, NULL),
(252, 3, 1385844258, 1385846058, 0, '127.0.0.1', 1, 1385844258, 1385845047, '127.0.0.1'),
(253, 3, 1385845067, 1385846867, 0, '127.0.0.1', 2, 1385846444, NULL, NULL),
(254, 3, 1385847043, 1385848843, 1, '127.0.0.1', 3, 1385848042, NULL, NULL),
(255, 3, 1385853517, 1385855317, 0, '127.0.0.1', 2, 1385854748, NULL, NULL),
(256, 3, 1385855405, 1385857205, 1, '127.0.0.1', 2, 1385856433, NULL, NULL),
(257, 3, 1386035891, 1386037691, 1, '127.0.0.1', 1, 1386035891, NULL, NULL),
(258, 3, 1386212762, 1386214562, 1, '127.0.0.1', 1, 1386212762, NULL, NULL),
(259, 3, 1386257214, 1386259014, 0, '127.0.0.1', 1, 1386257214, NULL, NULL),
(260, 3, 1389833591, 1389835391, 0, '127.0.0.1', 1, 1389833591, NULL, NULL),
(261, 3, 1389835496, 1389837296, 0, '127.0.0.1', 1, 1389835496, 1389835851, '127.0.0.1'),
(262, 3, 1389835859, 1389837659, 1, '127.0.0.1', 1, 1389835859, NULL, NULL),
(263, 3, 1390359707, 1390361507, 0, '127.0.0.1', 1, 1390359707, NULL, NULL),
(264, 3, 1390363894, 1390365694, 0, '127.0.0.1', 1, 1390363894, NULL, NULL),
(265, 3, 1390365798, 1390367598, 1, '127.0.0.1', 1, 1390365798, NULL, NULL),
(266, 3, 1390440247, 1390442047, 0, '127.0.0.1', 1, 1390440247, NULL, NULL),
(267, 3, 1390442076, 1390443876, 0, '127.0.0.1', 2, 1390443495, NULL, NULL),
(268, 3, 1390444084, 1390445884, 0, '127.0.0.1', 1, 1390444084, NULL, NULL),
(269, 3, 1390845491, 1390847291, 0, '127.0.0.1', 2, 1390846168, NULL, NULL),
(270, 3, 1391560658, 1391562458, 0, '127.0.0.1', 1, 1391560658, NULL, NULL),
(271, 3, 1391562509, 1391564309, 0, '127.0.0.1', 1, 1391562509, NULL, NULL),
(272, 3, 1392160483, 1392162283, 0, '127.0.0.1', 1, 1392160483, NULL, NULL),
(273, 3, 1392162316, 1392164116, 1, '127.0.0.1', 1, 1392162316, NULL, NULL),
(274, 3, 1392591570, 1392593370, 0, '127.0.0.1', 1, 1392591570, NULL, NULL),
(275, 3, 1392593377, 1392595177, 0, '127.0.0.1', 1, 1392593377, NULL, NULL),
(276, 3, 1392595751, 1392597551, 0, '127.0.0.1', 1, 1392595751, NULL, NULL),
(277, 3, 1392597772, 1392599572, 0, '127.0.0.1', 1, 1392597772, NULL, NULL),
(278, 3, 1392601059, 1392602859, 1, '127.0.0.1', 1, 1392601059, NULL, NULL),
(279, 7, 1392852182, 1392853982, 0, '127.0.0.1', 1, 1392852182, NULL, NULL),
(280, 7, 1392855191, 1392856991, 1, '127.0.0.1', 1, 1392855191, NULL, NULL),
(281, 7, 1393085135, 1393086935, 1, '127.0.0.1', 1, 1393085135, NULL, NULL),
(282, 7, 1393187996, 1393189796, 0, '127.0.0.1', 1, 1393187996, 1393189243, '127.0.0.1'),
(283, 3, 1394396078, 1394397878, 1, '127.0.0.1', 1, 1394396078, NULL, NULL),
(284, 1, 1394396797, 1394398597, 0, '127.0.0.1', 1, 1394396797, NULL, NULL),
(285, 3, 1394403953, 1394405753, 0, '127.0.0.1', 1, 1394403953, NULL, NULL),
(286, 3, 1394579773, 1394581573, 0, '127.0.0.1', 1, 1394579773, NULL, NULL),
(287, 3, 1394581661, 1394583461, 0, '127.0.0.1', 1, 1394581661, NULL, NULL),
(288, 3, 1394583558, 1394585358, 1, '127.0.0.1', 1, 1394583558, NULL, NULL),
(289, 3, 1395264785, 1395266585, 0, '127.0.0.1', 1, 1395264785, NULL, NULL),
(290, 3, 1395284925, 1395286725, 0, '127.0.0.1', 1, 1395284925, NULL, NULL),
(291, 4, 1395285338, 1395287138, 0, '127.0.0.1', 1, 1395285338, NULL, NULL),
(292, 3, 1395286997, 1395288797, 1, '127.0.0.1', 1, 1395286997, NULL, NULL),
(293, 4, 1395287175, 1395288975, 1, '127.0.0.1', 1, 1395287175, NULL, NULL),
(294, 3, 1395345643, 1395347443, 0, '127.0.0.1', 1, 1395345643, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_system`
--

CREATE TABLE IF NOT EXISTS `cruge_system` (
  `idsystem` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `largename` varchar(45) DEFAULT NULL,
  `sessionmaxdurationmins` int(11) DEFAULT '30',
  `sessionmaxsameipconnections` int(11) DEFAULT '10',
  `sessionreusesessions` int(11) DEFAULT '1' COMMENT '1yes 0no',
  `sessionmaxsessionsperday` int(11) DEFAULT '-1',
  `sessionmaxsessionsperuser` int(11) DEFAULT '-1',
  `systemnonewsessions` int(11) DEFAULT '0' COMMENT '1yes 0no',
  `systemdown` int(11) DEFAULT '0',
  `registerusingcaptcha` int(11) DEFAULT '0',
  `registerusingterms` int(11) DEFAULT '0',
  `terms` blob,
  `registerusingactivation` int(11) DEFAULT '1',
  `defaultroleforregistration` varchar(64) DEFAULT NULL,
  `registerusingtermslabel` varchar(100) DEFAULT NULL,
  `registrationonlogin` int(11) DEFAULT '1',
  PRIMARY KEY (`idsystem`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_system`
--

INSERT INTO `cruge_system` (`idsystem`, `name`, `largename`, `sessionmaxdurationmins`, `sessionmaxsameipconnections`, `sessionreusesessions`, `sessionmaxsessionsperday`, `sessionmaxsessionsperuser`, `systemnonewsessions`, `systemdown`, `registerusingcaptcha`, `registerusingterms`, `terms`, `registerusingactivation`, `defaultroleforregistration`, `registerusingtermslabel`, `registrationonlogin`) VALUES
(1, 'default', NULL, 30, 10, 1, -1, -1, 0, 0, 0, 0, '', 0, '', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cruge_user`
--

CREATE TABLE IF NOT EXISTS `cruge_user` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `regdate` bigint(30) DEFAULT NULL,
  `actdate` bigint(30) DEFAULT NULL,
  `logondate` bigint(30) DEFAULT NULL,
  `username` varchar(64) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL COMMENT 'Hashed password',
  `authkey` varchar(100) DEFAULT NULL COMMENT 'llave de autentificacion',
  `state` int(11) DEFAULT '0',
  `totalsessioncounter` int(11) DEFAULT '0',
  `currentsessioncounter` int(11) DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cruge_user`
--

INSERT INTO `cruge_user` (`iduser`, `regdate`, `actdate`, `logondate`, `username`, `email`, `password`, `authkey`, `state`, `totalsessioncounter`, `currentsessioncounter`) VALUES
(1, NULL, NULL, 1394396797, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'invitado', NULL, 1, 0, 0),
(3, 1376845914, NULL, 1395345643, 'pepe', 'pepe@mail.com', 'pepe12', '2e0e9d031309f89fb3615618fd2b6288', 1, 0, 0),
(4, 1376845947, NULL, 1395287175, 'carlitos', 'carlitos@mail.com', 'carlitos', 'e2acd279dc6553e62bbab66999672ac1', 1, 0, 0),
(5, 1378339184, NULL, NULL, 'juancito', 'aaa@aa.com', 'asdasdasd', 'ebab2001617d17a68440a776d4a8fb2a', 1, 0, 0),
(6, 1378340060, NULL, 1378340915, 'figlio', 'f@m.com', 'figlio', '64d56d19e5e68b4b5bfe47ba10ca28b5', 1, 0, 0),
(7, 1378698865, NULL, 1393187996, 'place1', 'place@m.com', 'place1', '9b655b917a892fdbb2bed16ada930f20', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`),
  KEY `id_user2` (`id_user2`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Volcado de datos para la tabla `friend`
--

INSERT INTO `friend` (`id_user1`, `id_user2`, `date`) VALUES
(3, 4, '2013-12-02 11:02:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `latitude` double NOT NULL,
  `date` datetime NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`latitude`, `date`, `id`, `longitude`) VALUES
(0, '2014-03-11 00:00:00', 1, 0),
(-37.3216807, '2014-03-20 12:25:59', 2, -59.12248969999999),
(-37.3216652, '2014-03-20 12:48:22', 3, -59.1224833),
(-37.3216652, '2014-03-20 12:48:32', 4, -59.1224833);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE IF NOT EXISTS `state` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `type` varchar(50) NOT NULL,
  `description` varchar(140) NOT NULL,
  `id_position` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`),
  KEY `id_user_2` (`id_user`),
  KEY `id_position` (`id_position`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `state`
--

INSERT INTO `state` (`id`, `id_user`, `date`, `type`, `description`, `id_position`) VALUES
(1, 4, '2014-03-20 12:25:54', 'State', 'p', 2),
(2, 4, '2014-03-20 12:48:22', 'Announcement', 'a', 3),
(3, 4, '2014-03-20 12:48:32', 'Announcement', 'a', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_position_relation`
--

CREATE TABLE IF NOT EXISTS `user_position_relation` (
  `id_user` int(11) NOT NULL,
  `id_position` int(11) NOT NULL,
  PRIMARY KEY (`id_user`,`id_position`),
  KEY `id_user` (`id_user`),
  KEY `id_position` (`id_position`),
  KEY `id_user_2` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user_position_relation`
--

INSERT INTO `user_position_relation` (`id_user`, `id_position`) VALUES
(3, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alertfilter`
--
ALTER TABLE `alertfilter`
  ADD CONSTRAINT `alertfilter_ibfk_1` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`);

--
-- Filtros para la tabla `announcement_data`
--
ALTER TABLE `announcement_data`
  ADD CONSTRAINT `announcement_data_ibfk_1` FOREIGN KEY (`id_state`) REFERENCES `state` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authassignment`
--
ALTER TABLE `cruge_authassignment`
  ADD CONSTRAINT `fk_cruge_authassignment_cruge_authitem1` FOREIGN KEY (`itemname`) REFERENCES `cruge_authitem` (`name`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_authassignment_user` FOREIGN KEY (`userid`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cruge_authitemchild`
--
ALTER TABLE `cruge_authitemchild`
  ADD CONSTRAINT `crugeauthitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `crugeauthitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `cruge_authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cruge_fieldvalue`
--
ALTER TABLE `cruge_fieldvalue`
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_field1` FOREIGN KEY (`idfield`) REFERENCES `cruge_field` (`idfield`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cruge_fieldvalue_cruge_user1` FOREIGN KEY (`iduser`) REFERENCES `cruge_user` (`iduser`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `friend`
--
ALTER TABLE `friend`
  ADD CONSTRAINT `friend_ibfk_3` FOREIGN KEY (`id_user1`) REFERENCES `cruge_user` (`iduser`),
  ADD CONSTRAINT `friend_ibfk_4` FOREIGN KEY (`id_user2`) REFERENCES `cruge_user` (`iduser`);

--
-- Filtros para la tabla `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cruge_user` (`iduser`),
  ADD CONSTRAINT `state_ibfk_2` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user_position_relation`
--
ALTER TABLE `user_position_relation`
  ADD CONSTRAINT `user_position_relation_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cruge_user` (`iduser`),
  ADD CONSTRAINT `user_position_relation_ibfk_2` FOREIGN KEY (`id_position`) REFERENCES `position` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
