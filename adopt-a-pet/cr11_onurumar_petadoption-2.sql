-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 27. Jul 2020 um 13:49
-- Server-Version: 10.4.13-MariaDB
-- PHP-Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `cr11_onurumar_petadoption`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `animal`
--

DROP TABLE IF EXISTS `animal`;
CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `location` varchar(1000) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `img` varchar(1000) DEFAULT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `hobbies` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `animal`
--

INSERT INTO `animal` (`id`, `location`, `age`, `img`, `name`, `description`, `type`, `hobbies`) VALUES
(1, 'Rechte Wienzeile 11, 1050 Wien ', 1, 'https://i.pinimg.com/originals/11/57/a3/1157a3905a2932b5a1cc365b088e7d07.jpg', 'tiger', 'A cute baby tiger', 'small', 'eats meat'),
(2, 'Johnstraße 111, 1060 Wien ', 1, 'https://tubestatic.orf.at/static/images/site/tube/20131042/22.5192003.jpg', 'panda', 'cute panda baby', 'small', 'likes to cuddle'),
(3, 'Kettenbrückengasse 1, 1050 Wien ', 1, 'https://i.ytimg.com/vi/SNggmeilXDQ/maxresdefault.jpg', 'elephant', 'elephant baby ', 'small', 'like to drink water'),
(4, 'Belvederegasse 3, 1040 Wien', 1, 'https://static.clubs.nfl.com/image/private/t_new_photo_album/jaguars/qm6zecymsy4hjzuwbhp7.jpg', 'Jaguar', 'jaguar baby', 'small', 'likes to run'),
(5, 'Zieglergasse 34, 1070 Wien', 5, 'https://upload.wikimedia.org/wikipedia/commons/0/06/Ringed_white_stork.jpg', 'Stork', 'badass stork', 'large', 'likes to fly'),
(6, 'Neubaugasse 33, 1070 Wien', 5, 'https://i.pinimg.com/originals/9b/2c/79/9b2c79802acf2bcf7943e019b2539953.jpg', 'Puma', 'badass puma', 'large', 'running'),
(7, 'Operngasse 10', 5, 'https://assets.nrdc.org/sites/default/files/styles/full_content--retina/public/media-uploads/4156898465_25c1473163_o_0.jpg?itok=bySSKukk', 'Giraffe', 'long neck', 'large', 'likes to be tall'),
(8, 'Mariahilferstraße 11, 1060 Wien', 5, 'https://ichef.bbci.co.uk/news/1024/cpsprodpb/E0F0/production/_112548575_gettyimages-492611032-1.jpg', 'lion', 'dangerous animal', 'large', 'likes to eat a lot'),
(9, 'Wattgasse 17, 1070 Wien', 10, 'https://images.theconversation.com/files/336212/original/file-20200519-152292-3nomu2.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=1200&h=1200.0&fit=crop', 'bat', 'dark animal', 'senior', 'likes to hang out in the dark'),
(10, 'Johannesgasse 10, 1090 Wien', 10, 'https://kids.nationalgeographic.com/content/dam/kidsea/kids-core-objects/animals/5-reasons/5-reasons-eagle.adapt.1900.1.jpg', 'eagle', 'beautiful creature', 'senior', 'fly around'),
(11, 'Ottakringerstraße 19, 1160 Wien', 10, 'https://arc-anglerfish-arc2-prod-advancelocal.s3.amazonaws.com/public/YQ5GMV5QSRF65HKFPQLV6EJ73Y.jpeg', 'Seal', 'cute but fat animal', 'senior', 'likes to lay around'),
(12, 'Schönbrunnm 17, 1130 Wien', 10, 'https://media.4-paws.org/9/0/d/3/90d3cd23d6907cdfe23d38ef89e6eb14c186e667/YAR_6487-5272x3648-1920x1329.jpg', 'Bear', 'Brown and thick', 'senior', 'raw');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `userEmail` varchar(60) NOT NULL,
  `userPass` varchar(255) NOT NULL,
  `status` enum('user','admin','superadmin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`userId`, `userName`, `userEmail`, `userPass`, `status`) VALUES
(1, 'onurumar', 'onurumar@hotmail.com', '0413987558880fb089f72788e5ba87aec6a0b995f072eb5821eedbf3861f2a84', 'user'),
(2, 'onurumarer', 'onurumar123@gmail.com', '64781cf5da96b44cf05e8234ee6e7cc634a75ce619c4f8e5d2815d3f67f6fab0', 'user'),
(3, 'umarsenay', 'umarsenay@hotmail.com', 'd4eea290be07b0cd1618c497bfe8b3595d3bbefc9822adf3d21bc1ea54a7f942', 'admin');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
