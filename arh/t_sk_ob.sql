-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2009 at 03:47 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `Narpro_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_sk_ob`
--

CREATE TABLE IF NOT EXISTS `t_sk_ob` (
  `c_id_ob` int(11) NOT NULL AUTO_INCREMENT,
  `c_name_ob` text NOT NULL,
  `c_ob_date` date NOT NULL,
  PRIMARY KEY (`c_id_ob`)
) ENGINE=MyISAM  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `t_sk_ob`
--

INSERT INTO `t_sk_ob` (`c_id_ob`, `c_name_ob`, `c_ob_date`) VALUES
(1, 'Склад Эмиля', '2009-12-06'),
(2, 'Склад сабишки', '2009-12-06');
