-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 17. Jan 2022 um 00:42
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `semesterproject`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `create_datetime` datetime NOT NULL,
  `picPath` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `create_datetime`, `picPath`) VALUES
(2, 'My first post', 'text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! text lorem loremdq, i was busy! text lorem loremdq, i was busy!text lorem loremdq, i was busy! ', '0000-00-00 00:00:00', '../uploads/news/1.jpg'),
(3, 'qweqw', '  \r\n  qweqweq', '0000-00-00 00:00:00', '../uploads/news/3.jpg'),
(4, 'late night talk ', 'sleeping is good', '0000-00-00 00:00:00', '../uploads/news/4.jpg'),
(5, 'hey', 'me now ', '2022-01-15 13:15:08', '../uploads/news/5.jpg'),
(6, 'croc pic', 'check out my croc', '2022-01-15 13:48:48', '../uploads/news/2.jpg'),
(7, 'Still trying', 'Still trying to pass web course', '2022-01-15 16:07:12', '../uploads/news/4.jpg');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rechte`
--

CREATE TABLE `rechte` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rechte`
--

INSERT INTO `rechte` (`ID`, `Name`) VALUES
(1, 'Anonym'),
(2, 'Guest'),
(3, 'Admin'),
(4, 'Owner');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `status`
--

CREATE TABLE `status` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `status`
--

INSERT INTO `status` (`ID`, `Name`) VALUES
(1, 'ToDo'),
(2, 'Done'),
(3, 'InProgress');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tickets`
--

CREATE TABLE `tickets` (
  `TicketID` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL DEFAULT 1,
  `Body` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `tickets`
--

INSERT INTO `tickets` (`TicketID`, `Status`, `Body`) VALUES
(1, 3, 'problem with login'),
(2, 1, 'Problem with email'),
(3, 1, 'there is a problem'),
(4, 1, 'there is a problem'),
(5, 2, 'there is a problem'),
(6, 1, 'dfdfdfdf');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `salutation` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `RechteID` int(11) NOT NULL DEFAULT 1,
  `userStatus` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`ID`, `firstName`, `lastName`, `salutation`, `username`, `password`, `useremail`, `RechteID`, `userStatus`) VALUES
(1, 'Martin', 'Böck', 'Mr.', 'mb', '63a9f0ea7bb98050796b649e85481845', 'mb@boeck.info', 4, 'active'),
(2, 'Vasilii', 'Klemenko', 'Mr.', 'vk', '63a9f0ea7bb98050796b649e85481845', 'wi20b030@technikum-wien.at', 4, 'active'),
(3, 'test', '1', 'Mr.', 't2', '098f6bcd4621d373cade4e832627b4f6', 't@test.at', 1, 'active'),
(4, 'some', 'admin', 'Mr.', 'sa', '63a9f0ea7bb98050796b649e85481845', 'sa@test.at', 3, 'active');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `rechte`
--
ALTER TABLE `rechte`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketID`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `User` (`username`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT für Tabelle `tickets`
--
ALTER TABLE `tickets`
  MODIFY `TicketID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
