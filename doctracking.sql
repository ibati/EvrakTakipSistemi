-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 24 Eki 2020, 00:20:52
-- Sunucu sürümü: 8.0.17
-- PHP Sürümü: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `doctracking`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `general`
--

CREATE TABLE `general` (
  `doc_id` int(11) NOT NULL,
  `doc_way` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `doc_type` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `doc_no` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `doc_name` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `doc_delivered_person` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `doc_delivered_date` date NOT NULL,
  `doc_delivered_time` time NOT NULL,
  `log_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `general`
--

INSERT INTO `general` (`doc_id`, `doc_way`, `doc_type`, `doc_no`, `doc_name`, `doc_delivered_person`, `doc_delivered_date`, `doc_delivered_time`, `log_timestamp`) VALUES
(1986, 'Gelen Evrak', 'Fatura', 'VDE2020000000168', 'VEDEL KLİMA FATURASI', 'İbrahim Batı', '2020-10-23', '10:53:00', '2020-10-23 20:53:38');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `general`
--
ALTER TABLE `general`
  ADD PRIMARY KEY (`doc_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `general`
--
ALTER TABLE `general`
  MODIFY `doc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1987;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
