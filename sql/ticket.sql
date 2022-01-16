-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 16 Oca 2022, 13:32:52
-- Sunucu sürümü: 10.4.22-MariaDB
-- PHP Sürümü: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ticket`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `tickets_info`
--

CREATE TABLE `tickets_info` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8mb4_turkish_ci NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `tickets_info`
--

INSERT INTO `tickets_info` (`id`, `name`, `date`, `price`, `quantity`) VALUES
(15, 'Konser Ankara', '2022-02-09', 100, 55),
(16, 'Konser', '2022-02-24', 123, 7),
(18, 'Gölbaşı', '2022-12-12', 100, 0),
(19, 'Tarkan Konseri', '2022-03-09', 100, 55);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `ID` int(100) NOT NULL,
  `Email` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `First_name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Last_name` varchar(100) COLLATE utf8mb4_turkish_ci NOT NULL,
  `Password` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`ID`, `Email`, `First_name`, `Last_name`, `Password`) VALUES
(20, 'aysenur@gmail.com', 'Ayşenur', 'Yazıcı', 0),
(22, 'enes@gmail.com', 'Enes', 'Yazıcı', 0),
(23, 'simge@gmail.com', 'Simge', 'Çelik', 0);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `tickets_info`
--
ALTER TABLE `tickets_info`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `tickets_info`
--
ALTER TABLE `tickets_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
