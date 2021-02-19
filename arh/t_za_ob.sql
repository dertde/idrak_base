
-- phpMyAdmin SQL Dump
-- version 3.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 06, 2009 at 03:49 PM
-- Server version: 5.1.40
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `Narpro_base`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_za_ob`
--

CREATE TABLE IF NOT EXISTS `t_za_ob` (
  `c_id_val` int(11) NOT NULL AUTO_INCREMENT,
  `c_id_product` varchar(15) NOT NULL,
  `c_name_product` varchar(60) NOT NULL,
  `c_comment_product` text NOT NULL,
  `c_netto` varchar(15) NOT NULL,
  `c_pw` decimal(10,2) NOT NULL,
  `c_price_ukr` decimal(10,2) NOT NULL,
  `c_price_azm_distr` decimal(10,2) NOT NULL,
  `c_price_azm_klient` decimal(10,2) NOT NULL,
  `c_date` date NOT NULL,
  `c_ves` decimal(10,0) NOT NULL,
  `c_travel` decimal(10,0) NOT NULL,
  `c_pribil` decimal(10,0) NOT NULL,
  `c_count` decimal(10,2) NOT NULL,
  `client_id` int(11) NOT NULL,
  `c_status` text NOT NULL,
  PRIMARY KEY (`c_id_val`),
  KEY `c_id_product` (`c_id_product`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `t_za_ob`
--

