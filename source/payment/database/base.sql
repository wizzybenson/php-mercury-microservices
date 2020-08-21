-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le : mer. 19 août 2020 à 09:37
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
  `amount` decimal(10,2) DEFAULT '0.00',
  `tax_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `currencycode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `transactioncode` int(11) NOT NULL,
  `transactiondate` datetime DEFAULT CURRENT_TIMESTAMP,
  `paymentmethod` int(11) NOT NULL,
  `paymenttransaction` int(11) NOT NULL,
  `shippingid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `costumors_payments`
--

INSERT INTO `costumors_payments` (`transactionid`, `costumorid`, `amount`, `tax_total`, `currencycode`, `transactioncode`, `transactiondate`, `paymentmethod`, `paymenttransaction`, `shippingid`) VALUES
(1, 3, '57.21', '11.44', 'USD', 17671405, '2020-08-19 09:32:24', 1, 1, 1),
(2, 4, '11.00', '2.20', 'USD', 148211274, '2020-08-19 09:33:17', 2, 1, 2),
(3, 4, '101.25', '20.25', 'USD', 719509322, '2020-08-19 09:33:57', 1, 2, 3),
(4, 8, '33.14', '6.63', 'USD', 223979215, '2020-08-19 09:34:33', 1, 3, 4),
(5, 6, '5.35', '1.07', 'USD', 276047721, '2020-08-19 09:34:50', 2, 2, 5),
(6, 7, '42.25', '8.45', 'USD', 18826924, '2020-08-19 09:35:23', 1, 4, 6);

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
(16, 'A gift Card', '6541h5rt4hdrt0h', 'c\'est une simple gift card', '2020-08-19 09:30:28', '2021-02-20 10:29:00', 12, 2, 1),
(17, 'Gift Card 2', 'tr4hr5ty4jukiu6', NULL, '2020-08-19 09:31:00', '2020-08-28 12:42:00', -1, 0, 1);

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
(1, 16),
(2, 16);

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
-- Structure de la table `paypal_payers`
--

CREATE TABLE `paypal_payers` (
  `payerid` int(11) NOT NULL,
  `given_name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `email_address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `payer_id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `country_code` varchar(6) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paypal_payers`
--

INSERT INTO `paypal_payers` (`payerid`, `given_name`, `surname`, `email_address`, `payer_id`, `country_code`) VALUES
(1, 'YASSINE', 'LAGRIDA', 'custumor@custumor.com', 'PVLKRERUJC5TA', 'MA'),
(2, 'YASSINE', 'LAGRIDA', 'custumor@custumor.com', 'PVLKRERUJC5TA', 'MA'),
(3, 'YASSINE', 'LAGRIDA', 'custumor@custumor.com', 'PVLKRERUJC5TA', 'MA'),
(4, 'YASSINE', 'LAGRIDA', 'custumor@custumor.com', 'PVLKRERUJC5TA', 'MA');

-- --------------------------------------------------------

--
-- Structure de la table `paypal_refunds`
--

CREATE TABLE `paypal_refunds` (
  `paypalrefundid` int(11) NOT NULL,
  `capturedpaypalrefundid` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paypal_refunds`
--

INSERT INTO `paypal_refunds` (`paypalrefundid`, `capturedpaypalrefundid`) VALUES
(1, '4KY13746PF121193B'),
(2, '9L342596KU580890Y'),
(3, '5HD78097B39003710');

-- --------------------------------------------------------

--
-- Structure de la table `paypal_transactions`
--

CREATE TABLE `paypal_transactions` (
  `paypaltransactionid` int(11) NOT NULL,
  `captureid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `paymentcaptureid` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `currencycode` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `amountvalue` decimal(10,2) NOT NULL,
  `paypalfee` decimal(10,2) NOT NULL,
  `createtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `payerid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `paypal_transactions`
--

INSERT INTO `paypal_transactions` (`paypaltransactionid`, `captureid`, `paymentcaptureid`, `currencycode`, `amountvalue`, `paypalfee`, `createtime`, `payerid`) VALUES
(1, '9EX19892XL3711222', '49P11354ML525061J', 'USD', '78.65', '4.15', '2020-08-19 09:32:27', 1),
(2, '2F820784GY137744R', '02M055881W5148106', 'USD', '131.50', '6.74', '2020-08-19 09:34:00', 2),
(3, '2EH17164C9892050X', '4WY265852E1774913', 'USD', '49.77', '2.74', '2020-08-19 09:34:37', 3),
(4, '4UT14684X68352621', '5TA30107VR078660N', 'USD', '60.70', '3.27', '2020-08-19 09:35:26', 4);

-- --------------------------------------------------------

--
-- Structure de la table `refunds`
--

CREATE TABLE `refunds` (
  `refundid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `currencycode` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(2) NOT NULL,
  `createtime` datetime DEFAULT CURRENT_TIMESTAMP,
  `refund_transaction` int(11) NOT NULL,
  `payment_transaction_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `refunds`
--

INSERT INTO `refunds` (`refundid`, `amount`, `currencycode`, `type`, `createtime`, `refund_transaction`, `payment_transaction_id`) VALUES
(1, '3.25', 'USD', 1, '2020-08-19 09:35:56', 1, 1),
(2, '6.85', 'USD', 1, '2020-08-19 09:36:11', 2, 1),
(3, '60.70', 'USD', 0, '2020-08-19 09:36:23', 3, 6);

-- --------------------------------------------------------

--
-- Structure de la table `shipping`
--

CREATE TABLE `shipping` (
  `shippingid` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `method` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_line_2` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `admin_area_2` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `admin_area_1` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `postal_code` int(7) NOT NULL,
  `country_code` varchar(4) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `shipping`
--

INSERT INTO `shipping` (`shippingid`, `amount`, `method`, `full_name`, `address_line_1`, `address_line_2`, `admin_area_2`, `admin_area_1`, `postal_code`, `country_code`) VALUES
(1, '10.00', 'United States Postal Service', 'LAGRIDA Yassine', '123 Townsend St', 'Floor 6', 'San Francisco', 'CA', 94107, 'US'),
(2, '10.00', 'United States Postal Service', 'LAGRIDA Yassine', '123 Townsend St', 'Floor 6', 'San Francisco', 'CA', 94107, 'US'),
(3, '10.00', 'United States Postal Service', 'LAGRIDA Yassine', '123 Townsend St', 'Floor 6', 'San Francisco', 'CA', 94107, 'US'),
(4, '10.00', 'United States Postal Service', 'LAGRIDA Yassine', '123 Townsend St', 'Floor 6', 'San Francisco', 'CA', 94107, 'US'),
(5, '10.00', 'United States Postal Service', 'LAGRIDA Yassine', '123 Townsend St', 'Floor 6', 'San Francisco', 'CA', 94107, 'US'),
(6, '10.00', 'United States Postal Service', 'LAGRIDA Yassine', '123 Townsend St', 'Floor 6', 'San Francisco', 'CA', 94107, 'US');

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
-- Index pour la table `paypal_payers`
--
ALTER TABLE `paypal_payers`
  ADD PRIMARY KEY (`payerid`);

--
-- Index pour la table `paypal_refunds`
--
ALTER TABLE `paypal_refunds`
  ADD PRIMARY KEY (`paypalrefundid`);

--
-- Index pour la table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  ADD PRIMARY KEY (`paypaltransactionid`);

--
-- Index pour la table `refunds`
--
ALTER TABLE `refunds`
  ADD PRIMARY KEY (`refundid`);

--
-- Index pour la table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shippingid`);

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
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `gift_card_admin`
--
ALTER TABLE `gift_card_admin`
  MODIFY `giftcardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `gift_card_transactions`
--
ALTER TABLE `gift_card_transactions`
  MODIFY `giftcardtransactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `paypal_admin`
--
ALTER TABLE `paypal_admin`
  MODIFY `paypalid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paypal_payers`
--
ALTER TABLE `paypal_payers`
  MODIFY `payerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `paypal_refunds`
--
ALTER TABLE `paypal_refunds`
  MODIFY `paypalrefundid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `paypal_transactions`
--
ALTER TABLE `paypal_transactions`
  MODIFY `paypaltransactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `refunds`
--
ALTER TABLE `refunds`
  MODIFY `refundid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shippingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
