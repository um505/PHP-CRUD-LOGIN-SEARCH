-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 04, 2020 at 06:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cr11_maxim_petadoption`
--

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` char(50) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `ZIP` int(11) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `location_img` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `city`, `ZIP`, `address`, `location_img`) VALUES
(1, 'IBT Internationaler Bund der Tierversuchsgegner', 'Vienna', 1030, 'Radetzkystr. 21', 'IBT.jpg'),
(2, 'Tierschutzverein Baden', 'Baden', 2500, 'Zubringerstraße 64', 'img/260711_tierheim.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

CREATE TABLE `pets` (
  `pet_id` int(11) NOT NULL,
  `pet_name` char(70) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `pet_IMG` varchar(255) DEFAULT NULL,
  `type` enum('small','large') DEFAULT NULL,
  `description` longtext,
  `senior` enum('no','yes') DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `hobbies` text,
  `date_available` date DEFAULT NULL,
  `location_id_FK` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `pet_name`, `age`, `pet_IMG`, `type`, `description`, `senior`, `website`, `hobbies`, `date_available`, `location_id_FK`) VALUES
(1, 'Foxy', 4, 'img/foxy.jpeg', 'small', 'The Pomeranian is a breed of dog of the Spitz type that is named for the Pomerania region in north-west Poland and north-east Germany in Central Europe. Classed as a toy dog breed because of its small size, the Pomeranian is descended from larger Spitz-type dogs, specifically the German Spitz. It has been determined by the Fédération Cynologique Internationale to be part of the German Spitz breed; and in many countries, they are known as the Zwergspitz.', 'no', 'https://en.wikipedia.org/wiki/Pomeranian_(dog)', 'play, sleep, travel', '2020-10-01', 1),
(2, 'Alice', 10, 'img/Alice.jpeg', 'small', 'Cocker Spaniels are dogs belonging to two breeds of the spaniel dog type: the American Cocker Spaniel and the English Cocker Spaniel, both of which are commonly called simply Cocker Spaniel in their countries of origin. In the early 20th century, Cocker Spaniels also included small hunting spaniels.', 'yes', NULL, 'eat, sleep, hunting, steel food', NULL, 1),
(3, 'British Shorthair', 4, 'img/cat-br.jpg', 'small', 'The British Shorthair is the pedigreed version of the traditional British domestic cat, with a distinctively stocky body, dense coat, and broad face. The most familiar color variant is the \"British Blue,\" a solid grey-blue coat, orange eyes, and a medium-sized tail. The breed has also been developed in a wide range of other colours and patterns, including tabby and colorpoint.', 'no', NULL, NULL, NULL, 1),
(4, 'Persian cat', 9, 'img/White_Persian_Cat.jpg', 'small', 'The Persian cat is a long-haired breed of cat characterized by its round face and short muzzle. It is also known as the \"Persian Longhair\" in the English-speaking countries. The first documented ancestors of the Persian were imported into Italy from Iran (historically known as Persia in the west) around 1620.[1][2] Recognized by the cat fancy since the late 19th century, it was developed first by the English, and then mainly by American breeders after the Second World War. Some cat fancier organizations\' breed standards subsume the Himalayan and Exotic Shorthair as variants of this breed, while others treat them as separate breeds.', 'yes', NULL, NULL, NULL, 2),
(5, 'Siamese cat', 13, 'img/siamese.jpg', 'small', 'The Siamese cat is one of the first distinctly recognized breeds of Asian cat. Derived from the Wichianmat landrace, one of several varieties of cat native to Thailand (formerly known as Siam), the original Siamese became one of the most popular breeds in Europe and North America in the 19th century. The carefully refined, more extreme-featured, modern-style Siamese is characterized by blue almond-shaped eyes; a triangular head shape; large ears; an elongated, slender, and muscular body; and various forms of point colouration. ', 'no', NULL, NULL, NULL, 2),
(6, 'German Shepherd', 8, 'img/german-shepherd-411613_1280.jpg', 'large', 'The German Shepherd (German: Deutscher Schäferhund, is a breed of medium to large-sized working dog that originated in Germany. In the English language, the breed\'s officially recognized name is German Shepherd Dog (GSD). The breed was officially known as the \"Alsatian Wolf Dog\" in the UK from after the First World War until 1977 when its name was changed back to German Shepherd.[2] Despite its wolf-like appearance, the German Shepherd is a relatively modern breed of dog, with their origin dating to 1899.', 'yes', NULL, NULL, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `permissions` enum('user','admin') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `pwd`, `permissions`) VALUES
(1, 'nadin', 'nadin@mail.ru', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user'),
(3, 'admin', 'admin@mail.com', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'admin'),
(4, 'Foxy', 'foxy@mail.ru', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user'),
(5, 'Tati', 'tati@mail.ru', '96cae35ce8a9b0244178bf28e4966c2ce1b8385723a96a6b838858cdd6ca0a1e', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `pets`
--
ALTER TABLE `pets`
  ADD PRIMARY KEY (`pet_id`),
  ADD KEY `location_id_FK` (`location_id_FK`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pets`
--
ALTER TABLE `pets`
  MODIFY `pet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pets`
--
ALTER TABLE `pets`
  ADD CONSTRAINT `pets_ibfk_1` FOREIGN KEY (`location_id_FK`) REFERENCES `location` (`location_id`);