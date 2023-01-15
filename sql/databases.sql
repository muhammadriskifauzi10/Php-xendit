-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 15 Jan 2023 pada 23.33
-- Versi server: 10.5.16-MariaDB
-- Versi PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id17905243_kelompok4`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_xendit`
--

CREATE TABLE `payment_xendit` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(191) NOT NULL,
  `external_id` varchar(191) NOT NULL,
  `amount` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL,
  `merchant_name` varchar(191) NOT NULL,
  `merchant_profile_picture_url` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `given_names` varchar(191) NOT NULL,
  `surname` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `mobile_number` varchar(191) NOT NULL,
  `city` varchar(191) NOT NULL,
  `country` varchar(191) NOT NULL,
  `postal_code` varchar(191) NOT NULL,
  `state` text NOT NULL,
  `expiry_date` varchar(191) NOT NULL,
  `invoice_url` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `subitem_payment_xendit`
--

CREATE TABLE `subitem_payment_xendit` (
  `id` int(11) NOT NULL,
  `external_id` varchar(191) NOT NULL,
  `name` varchar(191) NOT NULL,
  `quantity` varchar(191) NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(191) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `payment_xendit`
--
ALTER TABLE `payment_xendit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subitem_payment_xendit`
--
ALTER TABLE `subitem_payment_xendit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `payment_xendit`
--
ALTER TABLE `payment_xendit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `subitem_payment_xendit`
--
ALTER TABLE `subitem_payment_xendit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
