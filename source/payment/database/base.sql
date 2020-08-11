-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mar. 11 août 2020 à 10:17
-- Version du serveur :  5.7.24
-- Version de PHP : 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `yassine`
--

-- --------------------------------------------------------

--
-- Structure de la table `activated_paypal`
--

CREATE TABLE `activated_paypal` (
  `id` int(2) NOT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `activated_paypal`
--

INSERT INTO `activated_paypal` (`id`, `active`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `costumors_payments`
--

CREATE TABLE `costumors_payments` (
  `transactionid` int(11) NOT NULL,
  `costumorid` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `transactioncode` int(11) NOT NULL,
  `transactiondate` datetime DEFAULT CURRENT_TIMESTAMP,
  `paymentmethod` int(11) NOT NULL,
  `paymenttransaction` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `costumors_payments`
--

INSERT INTO `costumors_payments` (`transactionid`, `costumorid`, `amount`, `transactioncode`, `transactiondate`, `paymentmethod`, `paymenttransaction`) VALUES
(18, 247, 2742, 7739047, '2020-08-06 12:07:26', 2, 3),
(19, 247, 2742, 3258757, '2020-08-06 12:07:27', 2, 3),
(20, 1247, 1717, 4150839, '2020-08-06 12:13:40', 2, 4),
(21, 287, 4174, 2330015, '2020-08-06 12:21:54', 2, 4),
(22, 5612, 32211, 9666266, '2020-08-06 20:01:00', 2, 4),
(23, 1234, 4321, 642093868, '2020-08-07 22:43:59', 2, 7),
(24, 252, 114, 16679334, '2020-08-08 10:16:57', 2, 8),
(25, 25, 777, 833635161, '2020-08-08 10:23:49', 2, 9),
(26, 24, 2424, 966472962, '2020-08-08 20:15:15', 2, 10),
(27, 1111, 2222, 121159885, '2020-08-09 10:54:13', 2, 14),
(28, 12, 22, 336742682, '2020-08-11 02:56:35', 2, 15),
(29, 14, 41, 797915475, '2020-08-11 05:44:59', 2, 16),
(30, 6, 220, 648618777, '2020-08-11 09:58:04', 1, 1),
(31, 6, 220, 104306821, '2020-08-11 10:00:40', 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `gift_card_admin`
--

CREATE TABLE `gift_card_admin` (
  `giftcardid` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ladate` datetime DEFAULT CURRENT_TIMESTAMP,
  `expiration_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `max_use` int(10) NOT NULL,
  `used` int(10) DEFAULT '0',
  `status` int(2) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `gift_card_admin`
--

INSERT INTO `gift_card_admin` (`giftcardid`, `title`, `code`, `description`, `ladate`, `expiration_date`, `max_use`, `used`, `status`) VALUES
(1, 'my title', 'df65g15gb', 'jtyjytj', '2020-07-30 14:02:10', '2020-08-13 12:11:00', 22, 3, 1),
(2, 'First2', 'jrthry2475fg', 'c\'est l\'etude des fonctions arithmitique', '2020-07-30 14:28:42', '2020-07-31 00:00:00', 10, 0, 1),
(13, 'A gift Card', 'h65rt01h5', 'this is gift card', '2020-08-07 20:53:39', '2020-08-22 00:00:00', -1, 3, 1),
(14, 'new', '86t4r1hgrt22ht', 'jtrjtjjrtjrty', '2020-08-08 10:23:40', '2020-11-29 00:00:00', 17, 6, 1),
(15, 'hrerth', 'he41rt541he', 'hrtrthrt', '2020-08-09 11:47:42', '2020-08-21 12:47:00', -1, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `gift_card_transactions`
--

CREATE TABLE `gift_card_transactions` (
  `giftcardtransactionid` int(11) NOT NULL,
  `giftcardid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `gift_card_transactions`
--

INSERT INTO `gift_card_transactions` (`giftcardtransactionid`, `giftcardid`) VALUES
(1, 13),
(2, 13),
(3, 13),
(4, 13),
(5, 13),
(6, 13),
(7, 13),
(8, 1),
(9, 14),
(10, 14),
(11, 14),
(12, 14),
(13, 14),
(14, 14),
(15, 1),
(16, 1);

-- --------------------------------------------------------

--
-- Structure de la table `payments`
--

CREATE TABLE `payments` (
  `paymentid` int(11) NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `payments`
--

INSERT INTO `payments` (`paymentid`, `url`, `title`, `description`, `image`, `status`) VALUES
(1, '/paypal', 'paypal', 'Pay with standard paypal', 'https://lagrida.com/vueressources/img/paypal3.png', 1),
(2, '/giftcards', 'Gift Card', 'Pay with gift card', 'https://lagrida.com/vueressources/img/gift-card.png', 1);

-- --------------------------------------------------------

--
-- Structure de la table `paypal_admin`
--

CREATE TABLE `paypal_admin` (
  `paypalid` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `clientid` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `clientsecret` varchar(225) COLLATE utf8_unicode_ci NOT NULL,
  `sandboxmode` int(2) NOT NULL DEFAULT '0',
  `transactionmethod` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paypal_admin`
--

INSERT INTO `paypal_admin` (`paypalid`, `email`, `clientid`, `clientsecret`, `sandboxmode`, `transactionmethod`) VALUES
(1, 'b12@business.com', 'AfCgeAWh_bC7ucdREvxCciv_Nkrc-_HQgekclLfRBdPbnoQ5CNIWWa3DNL9m_Ay7FNU1jP58qre5XzDr', 'EPom1-ckhRGMKiNzSoYF2OnIzJwVW9osKh8TSh48oIEAhpSik13Ud-UbTLxDmIrV7NtMlZJf_gIsA4Tq', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `paypal_transactions`
--

CREATE TABLE `paypal_transactions` (
  `paypaltransactionid` int(11) NOT NULL,
  `captureid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shippingname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `shippingadress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `paymentcaptureid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currencycode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amountvalue` decimal(10,2) NOT NULL,
  `paypalfee` decimal(10,2) NOT NULL,
  `createtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `payerid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `payeremail` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paypal_transactions`
--

INSERT INTO `paypal_transactions` (`paypaltransactionid`, `captureid`, `shippingname`, `shippingadress`, `paymentcaptureid`, `currencycode`, `amountvalue`, `paypalfee`, `createtime`, `payerid`, `payeremail`) VALUES
(1, '1HG98666WL477513U', 'John Doe', '123 Townsend St, Floor 6, San Francisco, CA 94107, US', '8B130050E0172831S', 'USD', '220.00', '11.08', '2020-08-11 09:58:04', 'PVLKRERUJC5TA', 'custumor@custumor.com'),
(2, '3KP73180CA5416647', 'John Doe', '123 Townsend St, Floor 6, San Francisco, CA 94107, US', '34W7242835261460M', 'USD', '220.00', '11.08', '2020-08-11 10:00:40', 'PVLKRERUJC5TA', 'custumor@custumor.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activated_paypal`
--
ALTER TABLE `activated_paypal`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `costumors_payments`
--
ALTER TABLE `costumors_payments`
  ADD PRIMARY KEY (`transactionid`);

--
-- Index pour la table `gift_card_admin`
--
ALTER TABLE `gift_card_admin`
  ADD PRIMARY KEY (`giftcardid`);

--
-- Index pour la table `gift_card_transactions`
--
ALTER TABLE `gift_card_transactions`
  ADD PRIMARY KEY (`giftcardtransactionid`);

--
-- Index pour la table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`);

--
-- Index pour la table `paypal_admin`
--
ALTER TABLE `paypal_admin`
  ADD PRIMARY KEY (`paypalid`);

--
-- Index pour la table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  ADD PRIMARY KEY (`paypaltransactionid`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `activated_paypal`
--
ALTER TABLE `activated_paypal`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `costumors_payments`
--
ALTER TABLE `costumors_payments`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT pour la table `gift_card_admin`
--
ALTER TABLE `gift_card_admin`
  MODIFY `giftcardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `gift_card_transactions`
--
ALTER TABLE `gift_card_transactions`
  MODIFY `giftcardtransactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paypal_admin`
--
ALTER TABLE `paypal_admin`
  MODIFY `paypalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT pour la table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  MODIFY `paypaltransactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
