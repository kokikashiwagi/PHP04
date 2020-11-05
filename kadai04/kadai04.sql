-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 05, 2020 at 12:49 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gs_kadai1`
--

-- --------------------------------------------------------

--
-- Table structure for table `gs_bm_table`
--

CREATE TABLE `gs_bm_table` (
  `id` int(12) NOT NULL,
  `name` text NOT NULL,
  `country` text NOT NULL,
  `star` text NOT NULL,
  `comment` text NOT NULL,
  `indate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gs_bm_table`
--

INSERT INTO `gs_bm_table` (`id`, `name`, `country`, `star`, `comment`, `indate`) VALUES
(1, '', '', '★', '', '2020-10-27'),
(2, '', 'Japan', '★', '', '2020-10-27'),
(3, 'aaa', 'Japan', '★', '', '2020-10-27'),
(4, 'aaa', 'Japan', '★', '', '2020-10-27'),
(5, '', 'Japan', '★', '', '2020-11-04'),
(6, '', 'Russia', '★', '', '2020-11-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gs_bm_table`
--
ALTER TABLE `gs_bm_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
