-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-09-2013 a las 19:21:09
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
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `fk_type` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_type` (`fk_type`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activitytype`
--

CREATE TABLE IF NOT EXISTS `activitytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) COLLATE armscii8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin AUTO_INCREMENT=1 ;

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
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` varchar(140) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_place`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
('action_ui_rbaclistops', 0, '', NULL, 'N;'),
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cruge_field`
--

INSERT INTO `cruge_field` (`idfield`, `fieldname`, `longname`, `position`, `required`, `fieldtype`, `fieldsize`, `maxlength`, `showinreports`, `useregexp`, `useregexpmsg`, `predetvalue`) VALUES
(1, 'isPlace', 'Is Place', 0, 0, 2, 1, 1, 1, '', '', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cruge_fieldvalue`
--

INSERT INTO `cruge_fieldvalue` (`idfieldvalue`, `iduser`, `idfield`, `value`) VALUES
(1, 5, 1, ''),
(2, 6, 1, 0x31),
(3, 2, 1, ''),
(4, 7, 1, 0x31);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

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
(84, 7, 1378701146, 1378702946, 1, '127.0.0.1', 3, 1378701441, NULL, NULL);

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
(1, NULL, NULL, 1378339019, 'admin', 'admin@tucorreo.com', 'admin', NULL, 1, 0, 0),
(2, NULL, NULL, NULL, 'invitado', 'invitado', 'invitado', NULL, 1, 0, 0),
(3, 1376845914, NULL, NULL, 'pepe', 'pepe@mail.com', 'pepe12', '2e0e9d031309f89fb3615618fd2b6288', 1, 0, 0),
(4, 1376845947, NULL, NULL, 'carlitos', 'carlitos@mail.com', 'carlitos', 'e2acd279dc6553e62bbab66999672ac1', 1, 0, 0),
(5, 1378339184, NULL, NULL, 'choto', 'aaa@aa.com', 'asdasdasd', 'ebab2001617d17a68440a776d4a8fb2a', 1, 0, 0),
(6, 1378340060, NULL, 1378340915, 'figlio', 'f@m.com', 'figlio', '64d56d19e5e68b4b5bfe47ba10ca28b5', 1, 0, 0),
(7, 1378698865, NULL, 1378701441, 'place1', 'place@m.com', 'place1', '9b655b917a892fdbb2bed16ada930f20', 1, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id_user1` int(11) NOT NULL,
  `id_user2` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_user1`,`id_user2`),
  KEY `id_user2` (`id_user2`)
) ENGINE=InnoDB DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin;

--
-- Volcado de datos para la tabla `friend`
--

INSERT INTO `friend` (`id_user1`, `id_user2`, `date`) VALUES
(1, 2, '2013-08-06'),
(2, 3, '0000-00-00'),
(2, 4, '0000-00-00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id_user` int(11) NOT NULL,
  `latitude` double NOT NULL,
  `date` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `longitude` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`id_user`, `latitude`, `date`, `id`, `longitude`) VALUES
(7, 0, '0000-00-00', 2, 0),
(7, 0, '0000-00-00', 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `review`
--

CREATE TABLE IF NOT EXISTS `review` (
  `id_place` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id_place`,`id_user`),
  KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) COLLATE armscii8_bin NOT NULL,
  `email` varchar(60) COLLATE armscii8_bin NOT NULL,
  `password` varchar(8) COLLATE armscii8_bin NOT NULL,
  `fk_typeId` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_typeId` (`fk_typeId`)
) ENGINE=InnoDB  DEFAULT CHARSET=armscii8 COLLATE=armscii8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `fk_typeId`) VALUES
(1, 'user', 'user@mail.com', 'user', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`fk_type`) REFERENCES `activitytype` (`id`);

--
-- Filtros para la tabla `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cruge_user` (`iduser`);

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
-- Filtros para la tabla `position`
--
ALTER TABLE `position`
  ADD CONSTRAINT `position_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `cruge_user` (`iduser`);

--
-- Filtros para la tabla `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `cruge_user` (`iduser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
