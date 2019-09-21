-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Sep 20, 2019 at 05:53 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `formation`
--
CREATE DATABASE IF NOT EXISTS `formation` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `formation`;

-- --------------------------------------------------------

--
-- Table structure for table `Agent`
--

CREATE TABLE `Agent` (
  `mat_agn` int(11) NOT NULL,
  `nom_agn` varchar(255) NOT NULL,
  `prn_agn` varchar(255) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `dat_tran` varchar(255) NOT NULL,
  `cod_fon` int(11) NOT NULL,
  `cod_str` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Benefier`
--

CREATE TABLE `Benefier` (
  `id` int(11) NOT NULL,
  `cod_gar` int(11) NOT NULL,
  `cod_ty_frai` int(11) NOT NULL,
  `frais_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Domaine`
--

CREATE TABLE `Domaine` (
  `cod_dom` int(11) NOT NULL,
  `des_dom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Fonction`
--

CREATE TABLE `Fonction` (
  `num_fon` int(11) NOT NULL,
  `des_fon` varchar(255) NOT NULL,
  `cod_gar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `formation`
--

CREATE TABLE `formation` (
  `cod_for` int(11) NOT NULL,
  `dat_deb` varchar(255) NOT NULL,
  `dat_fin` int(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `cod_them` int(11) NOT NULL,
  `cod_pl_for` int(11) NOT NULL,
  `cod_ty_loc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Grade`
--

CREATE TABLE `Grade` (
  `cod_gra` int(11) NOT NULL,
  `des_gra` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Ordre_mision`
--

CREATE TABLE `Ordre_mision` (
  `num_om` int(11) NOT NULL,
  `dat_om` varchar(255) NOT NULL,
  `mat_agn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `organism_formation`
--

CREATE TABLE `organism_formation` (
  `cod_or_for` int(11) NOT NULL,
  `or_for` varchar(255) NOT NULL,
  `adr_or` varchar(255) NOT NULL,
  `tel_or` varchar(12) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `fax_or` varchar(12) NOT NULL,
  `represent_or` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Planifier`
--

CREATE TABLE `Planifier` (
  `id` int(11) NOT NULL,
  `cod_them` int(11) NOT NULL,
  `cod_pl_for` int(11) NOT NULL,
  `nb_per` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plan_formation`
--

CREATE TABLE `plan_formation` (
  `cod_pl_for` int(11) NOT NULL,
  `des_pl_for` varchar(255) NOT NULL,
  `cod_og_for` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Pris_charge`
--

CREATE TABLE `Pris_charge` (
  `cod_pr` int(11) NOT NULL,
  `presalaire` varchar(255) NOT NULL,
  `autre_char` varchar(255) NOT NULL,
  `cont_glo` varchar(255) NOT NULL,
  `don_dev` varchar(255) NOT NULL,
  `obs` varchar(255) NOT NULL,
  `num_om` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Remborcer`
--

CREATE TABLE `Remborcer` (
  `id` int(11) NOT NULL,
  `cod_ty_frai` int(11) NOT NULL,
  `cod_pr` int(11) NOT NULL,
  `nb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Structure`
--

CREATE TABLE `Structure` (
  `cod_str` int(11) NOT NULL,
  `des_str` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Theme`
--

CREATE TABLE `Theme` (
  `cod_them` int(11) NOT NULL,
  `des_them` varchar(255) NOT NULL,
  `cat_them` varchar(255) NOT NULL,
  `typ_them` varchar(255) NOT NULL,
  `dur_them` int(11) NOT NULL,
  `cod_dom` int(11) NOT NULL,
  `cod_gra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Typ_frai`
--

CREATE TABLE `Typ_frai` (
  `cod_ty_fr` int(11) NOT NULL,
  `des_ty_fr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Typ_local`
--

CREATE TABLE `Typ_local` (
  `cod_ty_loc` int(11) NOT NULL,
  `des_ty_loc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Agent`
--
ALTER TABLE `Agent`
  ADD PRIMARY KEY (`mat_agn`);

--
-- Indexes for table `Benefier`
--
ALTER TABLE `Benefier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Domaine`
--
ALTER TABLE `Domaine`
  ADD PRIMARY KEY (`cod_dom`);

--
-- Indexes for table `Fonction`
--
ALTER TABLE `Fonction`
  ADD PRIMARY KEY (`num_fon`);

--
-- Indexes for table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`cod_for`);

--
-- Indexes for table `Grade`
--
ALTER TABLE `Grade`
  ADD PRIMARY KEY (`cod_gra`);

--
-- Indexes for table `Ordre_mision`
--
ALTER TABLE `Ordre_mision`
  ADD PRIMARY KEY (`num_om`);

--
-- Indexes for table `organism_formation`
--
ALTER TABLE `organism_formation`
  ADD PRIMARY KEY (`cod_or_for`);

--
-- Indexes for table `Planifier`
--
ALTER TABLE `Planifier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_formation`
--
ALTER TABLE `plan_formation`
  ADD PRIMARY KEY (`cod_pl_for`);

--
-- Indexes for table `Pris_charge`
--
ALTER TABLE `Pris_charge`
  ADD PRIMARY KEY (`cod_pr`);

--
-- Indexes for table `Remborcer`
--
ALTER TABLE `Remborcer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Structure`
--
ALTER TABLE `Structure`
  ADD PRIMARY KEY (`cod_str`);

--
-- Indexes for table `Theme`
--
ALTER TABLE `Theme`
  ADD PRIMARY KEY (`cod_them`);

--
-- Indexes for table `Typ_frai`
--
ALTER TABLE `Typ_frai`
  ADD PRIMARY KEY (`cod_ty_fr`);

--
-- Indexes for table `Typ_local`
--
ALTER TABLE `Typ_local`
  ADD PRIMARY KEY (`cod_ty_loc`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Agent`
--
ALTER TABLE `Agent`
  MODIFY `mat_agn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Benefier`
--
ALTER TABLE `Benefier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Domaine`
--
ALTER TABLE `Domaine`
  MODIFY `cod_dom` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Fonction`
--
ALTER TABLE `Fonction`
  MODIFY `num_fon` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `formation`
--
ALTER TABLE `formation`
  MODIFY `cod_for` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Grade`
--
ALTER TABLE `Grade`
  MODIFY `cod_gra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Ordre_mision`
--
ALTER TABLE `Ordre_mision`
  MODIFY `num_om` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organism_formation`
--
ALTER TABLE `organism_formation`
  MODIFY `cod_or_for` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_formation`
--
ALTER TABLE `plan_formation`
  MODIFY `cod_pl_for` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Pris_charge`
--
ALTER TABLE `Pris_charge`
  MODIFY `cod_pr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Remborcer`
--
ALTER TABLE `Remborcer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Structure`
--
ALTER TABLE `Structure`
  MODIFY `cod_str` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Theme`
--
ALTER TABLE `Theme`
  MODIFY `cod_them` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Typ_frai`
--
ALTER TABLE `Typ_frai`
  MODIFY `cod_ty_fr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Typ_local`
--
ALTER TABLE `Typ_local`
  MODIFY `cod_ty_loc` int(11) NOT NULL AUTO_INCREMENT;
