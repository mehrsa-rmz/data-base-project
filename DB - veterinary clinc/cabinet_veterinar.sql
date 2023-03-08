-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 06:51 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cabinet_veterinar`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultatii_pacienti`
--

CREATE TABLE `consultatii_pacienti` (
  `id_c_p` int(11) NOT NULL,
  `id_consultatie` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `data_consultatie` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consultatii_pacienti`
--

INSERT INTO `consultatii_pacienti` (`id_c_p`, `id_consultatie`, `id_pacient`, `data_consultatie`) VALUES
(1, 7, 8, '2022-11-15'),
(2, 8, 1, '2023-01-05'),
(3, 1, 5, '2022-09-18'),
(4, 9, 3, '2022-08-04'),
(5, 9, 2, '2022-12-20'),
(6, 7, 4, '2022-12-11'),
(7, 9, 6, '2022-12-08'),
(8, 7, 5, '2022-10-31');

-- --------------------------------------------------------

--
-- Table structure for table `istoric_medical`
--

CREATE TABLE `istoric_medical` (
  `id_istoric` int(11) NOT NULL,
  `id_pacient` int(11) NOT NULL,
  `probleme_ereditare` varchar(200) DEFAULT NULL,
  `probleme_anterioare` varchar(200) DEFAULT NULL,
  `probleme_curente` varchar(200) DEFAULT NULL,
  `castrat` char(1) NOT NULL,
  `vaccinat` char(1) NOT NULL,
  `deparazitat_intern` char(1) NOT NULL,
  `deparazitat_extern` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `istoric_medical`
--

INSERT INTO `istoric_medical` (`id_istoric`, `id_pacient`, `probleme_ereditare`, `probleme_anterioare`, `probleme_curente`, `castrat`, `vaccinat`, `deparazitat_intern`, `deparazitat_extern`) VALUES
(1, 1, 'N/A', '-Slabire subita pe sistem nervos', '-Lipsa de apetit', 'N', 'D', 'D', 'D'),
(2, 2, 'N/A', '-Sensibilitate la nivelul pielii\r\n-Paraziti interni', 'N/A', 'D', 'D', 'D', 'D'),
(3, 3, 'N/A', 'N/A', 'N/A', 'N', 'D', 'D', 'D'),
(4, 4, 'N/A', '-Rana la aripa stanga', '-Sensibilitate la stomac', 'N', 'D', 'D', 'D'),
(5, 5, '-Lipsa abilitatii de a vedea la ochiul stang', '-Infectie urinara', 'N/A', 'D', 'D', 'D', 'D'),
(6, 6, '-1 deget in minus la membrul inferior drept', '-Sensibilitate la stomac\r\n-Infectie la nivelul pielii', 'N/A', 'N', 'D', 'D', 'D'),
(7, 7, 'N/A', 'N/A', '-Sedentarism\r\n-Lipsa apetitului', 'N', 'D', 'D', 'D'),
(8, 8, '-Auz slab in urechea dreapta', 'N/A', 'N/A', 'D', 'D', 'D', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `pacienti`
--

CREATE TABLE `pacienti` (
  `id_pacient` int(11) NOT NULL,
  `id_stapan` int(11) NOT NULL,
  `numep` varchar(50) NOT NULL,
  `specie` varchar(50) NOT NULL,
  `rasa` varchar(50) NOT NULL,
  `data_nasterii` date NOT NULL,
  `sex` char(1) NOT NULL,
  `greutate` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pacienti`
--

INSERT INTO `pacienti` (`id_pacient`, `id_stapan`, `numep`, `specie`, `rasa`, `data_nasterii`, `sex`, `greutate`) VALUES
(1, 9, 'Velma', 'catel', 'Golden Retriever', '2019-11-03', 'F', 24.5),
(2, 8, 'Oscar', 'catel', 'Bichon', '2015-07-08', 'M', 5),
(3, 8, 'Boris', 'pisica', 'mixa', '2017-12-10', 'M', 6.2),
(4, 8, 'Cici', 'papagal', 'Perus', '2020-05-08', 'F', 1.1),
(5, 1, 'Pufi', 'pisica', 'Persana', '2013-10-03', 'F', 3.7),
(6, 2, 'Nala', 'rozatoare', 'Hamster', '2022-06-01', 'F', 0.4),
(7, 5, 'Jerry', 'rozatoare', 'Porcusor de Guineea', '2021-08-18', 'M', 1),
(8, 10, 'Lady', 'catel', 'Cocker Spaniel', '2018-09-28', 'F', 4.7),
(9, 11, 'Salmon', 'pisica', 'Birmaneza', '2008-05-16', 'F', 5),
(10, 124, 'Ralf', 'catel', 'Husky', '2012-03-08', 'M', 22),
(11, 1, 'Dodo', 'papagal', 'Perus', '2020-04-04', 'M', 0.9),
(15, 126, 'Maru Jr.', 'rozatoare', 'Hamster', '2023-01-11', 'F', 0.2);

-- --------------------------------------------------------

--
-- Table structure for table `personal_medical`
--

CREATE TABLE `personal_medical` (
  `id_personal` int(11) NOT NULL,
  `id_specializare` int(11) NOT NULL,
  `grad_medical` varchar(50) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `nr_telefon` varchar(20) NOT NULL,
  `e_mail` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `personal_medical`
--

INSERT INTO `personal_medical` (`id_personal`, `id_specializare`, `grad_medical`, `nume`, `prenume`, `CNP`, `nr_telefon`, `e_mail`) VALUES
(0, 5, 'X', 'X', 'X', '1234567890777', '0733377356', 'x@yahoo.com'),
(1, 1, 'Doctor', 'Vasile', 'Oana', '1122334455667', '0733333357', 'oana_vas@gmail.com'),
(2, 2, 'Doctor', 'Dinu', 'Alexa', '1122334455668', '0733333334', 'alxxdn@yahoo.com'),
(3, 3, 'Doctor', 'Ionescu', 'Ana', '1122334455669', '0733333335', 'ana.i@gmail.com'),
(4, 4, 'Doctor', 'Sandu', 'Robert', '1122334455660', '0733333336', 'rob_snd@yahoo.com'),
(5, 5, 'Doctor', 'Renner', 'Daniel', '1122334455666', '0733333337', 'renner.d@gmail.com'),
(6, 6, 'Doctor', 'Mihnea', 'Paula', '1122334455665', '0733333338', 'paula_mihnea@yahoo.com'),
(7, 6, 'Asistent', 'Popescu', 'Denisa', '1122334455665', '0733333339', 'pop.den@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `specializari`
--

CREATE TABLE `specializari` (
  `id_specializare` int(11) NOT NULL,
  `denumire` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specializari`
--

INSERT INTO `specializari` (`id_specializare`, `denumire`) VALUES
(4, 'Dermatologie'),
(5, 'Gastroenterologie'),
(6, 'General'),
(3, 'Ginecologie'),
(1, 'Oftalmologie'),
(2, 'ORL');

-- --------------------------------------------------------

--
-- Table structure for table `stapani`
--

CREATE TABLE `stapani` (
  `id_stapan` int(11) NOT NULL,
  `nume` varchar(50) NOT NULL,
  `prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `nr_telefon` varchar(20) DEFAULT NULL,
  `e_mail` varchar(50) NOT NULL,
  `oras` varchar(50) NOT NULL,
  `judet_sector` varchar(50) NOT NULL,
  `strada` varchar(50) NOT NULL,
  `nr_strada` int(11) NOT NULL,
  `apartament` int(11) DEFAULT NULL,
  `parola` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stapani`
--

INSERT INTO `stapani` (`id_stapan`, `nume`, `prenume`, `CNP`, `nr_telefon`, `e_mail`, `oras`, `judet_sector`, `strada`, `nr_strada`, `apartament`, `parola`) VALUES
(1, 'Pop', 'Ana', '1234567890123', '0711111111', 'ana_pop@yahoo.com', 'Bucuresti', '3', 'Unirii', 1, 1, '1234'),
(2, 'Dan', 'Maria', '1234567890124', '0722222222', 'maria_dan@gmail.com', 'Bucuresti', '4', 'Brancoveanu', 2, 2, '5678'),
(5, 'Tudor', 'Radu', '1234567890125', '0733333333', 'radu_tudor@yahoo.com', 'Bucuresti', '2', 'Roma', 3, 3, '1234'),
(8, 'Micu', 'Bianca', '1234567890126', '0733618355', 'bianca_micu@yahoo.com', 'Bucuresti', '4', 'Aurel', 4, 0, '5678'),
(9, 'Doncu', 'Matei', '1234567890199', '', 'matei_d@gmail.com', 'Ilfov', 'Jilava', 'Giurgiului', 6, 0, '1234'),
(10, 'Radu', 'Elena', '1234567890128', '', 'elena_r@yahoo.com', 'Galati', 'Galati', 'Micro', 5, 20, '5678'),
(11, 'Pencea', 'Amalia', '1234567890155', '', 'amalia_p@yahoo.com', 'Giurgiu', 'Giurgiu', 'I.C. Bratianu', 1, 0, '1234'),
(123, 'Admin', 'Retea', '0000000000000', NULL, 'admin@pinkpaws.com', 'Bucuresti', '3', 'Clinicii', 1, NULL, 'admin'),
(124, 'Nicolae', 'Bogdan', '1472583691472', '0733334855', 'bobi_nic@yahoo.com', 'Bucuresti', '4', 'Aleea', 4, 12, '1234'),
(126, 'Untaru', 'Maria', '1534599890124', '0738334855', 'untaru_maru@outlook.com', 'Bucuresti', '4', 'Sos. Berceni', 51, 26, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tip_consultatii`
--

CREATE TABLE `tip_consultatii` (
  `id_consultatie` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `descriere` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tip_consultatii`
--

INSERT INTO `tip_consultatii` (`id_consultatie`, `id_personal`, `descriere`) VALUES
(1, 1, 'Consultatie oftalmologica + analize'),
(2, 2, 'Consultatie ORL + analize'),
(3, 3, 'Consultatie ginecologica + analize'),
(4, 4, 'Consultatie dermatologica + analize'),
(5, 5, 'Consultatie gastroenterologica + analize'),
(6, 6, 'Consultatie generala + analize'),
(7, 3, 'Ecografie'),
(8, 7, 'Scurtare gheare'),
(9, 7, 'Recoltare analize');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultatii_pacienti`
--
ALTER TABLE `consultatii_pacienti`
  ADD PRIMARY KEY (`id_c_p`),
  ADD KEY `id_consultatie` (`id_consultatie`,`id_pacient`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexes for table `istoric_medical`
--
ALTER TABLE `istoric_medical`
  ADD PRIMARY KEY (`id_istoric`),
  ADD KEY `probleme_ereditare` (`probleme_ereditare`,`probleme_anterioare`,`probleme_curente`,`castrat`,`vaccinat`,`deparazitat_intern`,`deparazitat_extern`),
  ADD KEY `id_pacient` (`id_pacient`);

--
-- Indexes for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD PRIMARY KEY (`id_pacient`),
  ADD KEY `nume` (`numep`,`specie`,`rasa`,`data_nasterii`,`sex`,`greutate`),
  ADD KEY `id_stapan` (`id_stapan`);

--
-- Indexes for table `personal_medical`
--
ALTER TABLE `personal_medical`
  ADD PRIMARY KEY (`id_personal`),
  ADD KEY `grad_medical` (`grad_medical`,`nume`,`prenume`,`nr_telefon`,`e_mail`),
  ADD KEY `id_specializare` (`id_specializare`);

--
-- Indexes for table `specializari`
--
ALTER TABLE `specializari`
  ADD PRIMARY KEY (`id_specializare`),
  ADD KEY `denumire` (`denumire`);

--
-- Indexes for table `stapani`
--
ALTER TABLE `stapani`
  ADD PRIMARY KEY (`id_stapan`),
  ADD UNIQUE KEY `CNP` (`CNP`),
  ADD UNIQUE KEY `e_mail` (`e_mail`),
  ADD KEY `nume` (`nume`,`prenume`,`CNP`,`nr_telefon`,`e_mail`,`oras`,`judet_sector`,`strada`,`nr_strada`,`apartament`);

--
-- Indexes for table `tip_consultatii`
--
ALTER TABLE `tip_consultatii`
  ADD PRIMARY KEY (`id_consultatie`),
  ADD KEY `data_consultatie` (`descriere`),
  ADD KEY `id_personal` (`id_personal`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultatii_pacienti`
--
ALTER TABLE `consultatii_pacienti`
  MODIFY `id_c_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `istoric_medical`
--
ALTER TABLE `istoric_medical`
  MODIFY `id_istoric` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pacienti`
--
ALTER TABLE `pacienti`
  MODIFY `id_pacient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `specializari`
--
ALTER TABLE `specializari`
  MODIFY `id_specializare` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `stapani`
--
ALTER TABLE `stapani`
  MODIFY `id_stapan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tip_consultatii`
--
ALTER TABLE `tip_consultatii`
  MODIFY `id_consultatie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultatii_pacienti`
--
ALTER TABLE `consultatii_pacienti`
  ADD CONSTRAINT `consultatii_pacienti_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`),
  ADD CONSTRAINT `consultatii_pacienti_ibfk_2` FOREIGN KEY (`id_consultatie`) REFERENCES `tip_consultatii` (`id_consultatie`);

--
-- Constraints for table `istoric_medical`
--
ALTER TABLE `istoric_medical`
  ADD CONSTRAINT `istoric_medical_ibfk_1` FOREIGN KEY (`id_pacient`) REFERENCES `pacienti` (`id_pacient`);

--
-- Constraints for table `pacienti`
--
ALTER TABLE `pacienti`
  ADD CONSTRAINT `pacienti_ibfk_1` FOREIGN KEY (`id_stapan`) REFERENCES `stapani` (`id_stapan`);

--
-- Constraints for table `personal_medical`
--
ALTER TABLE `personal_medical`
  ADD CONSTRAINT `personal_medical_ibfk_1` FOREIGN KEY (`id_specializare`) REFERENCES `specializari` (`id_specializare`);

--
-- Constraints for table `tip_consultatii`
--
ALTER TABLE `tip_consultatii`
  ADD CONSTRAINT `tip_consultatii_ibfk_1` FOREIGN KEY (`id_personal`) REFERENCES `personal_medical` (`id_personal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
