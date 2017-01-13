-- phpMyAdmin SQL Dump
-- version 4.2.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 10. Jan 2017 um 22:13
-- Server Version: 5.6.33
-- PHP-Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `isithombeDB`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `localizations`
--

CREATE TABLE IF NOT EXISTS `localizations` (
`id` int(6) NOT NULL,
  `qualifier` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `lang` varchar(2) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=125 ;

--
-- Daten für Tabelle `localizations`
--

INSERT INTO `localizations` (`id`, `qualifier`, `value`, `lang`) VALUES
(1, 'detail', 'Detailansicht', 'de'),
(2, 'home', 'Startseite', 'de'),
(3, 'upload', 'hochladen', 'de'),
(4, 'register', 'Registrieren', 'de'),
(5, 'my_pictures', 'Meine Bilder', 'de'),
(6, 'no_pictures', 'Sie haben bisher keine Bilder hochgeladen.', 'de'),
(7, 'my_orders', 'Meine Einkäufe', 'de'),
(8, 'no_orders', 'Sie haben bisher keine Einkäufe.', 'de'),
(9, 'categories', 'Kategorien', 'de'),
(10, 'username', 'Benutzername', 'de'),
(11, 'password', 'Passwort', 'de'),
(12, 'login', 'Anmelden', 'de'),
(13, 'profile', 'Mein Profil', 'de'),
(14, 'logout', 'Abmelden', 'de'),
(15, 'camera_model', 'Kamera', 'de'),
(16, 'aperture', 'Blende', 'de'),
(17, 'exposure_time', 'Verschlusszeit', 'de'),
(18, 'price', 'Preis', 'de'),
(19, 'title', 'Titel', 'de'),
(20, 'search', 'Suche', 'de'),
(21, 'created_at', 'Aufnahmedatum', 'de'),
(22, 'uploaded_at', 'Hochgeladen am', 'de'),
(23, 'owner', 'Besitzer', 'de'),
(24, 'order_date', 'Bestelldatum', 'de'),
(25, 'first_name', 'Vorname', 'de'),
(26, 'last_name', 'Nachname', 'de'),
(27, 'email', 'E-Mail Adresse', 'de'),
(28, 'sex', 'Geschlecht', 'de'),
(29, 'male', 'Herr', 'de'),
(30, 'female', 'Frau', 'de'),
(31, 'edit', 'Bearbeiten', 'de'),
(32, 'buy', 'Kaufen', 'de'),
(33, 'no_result', 'Keine Einträge gefunden.', 'de'),
(34, 'basket', 'Warenkorb', 'de'),
(35, 'lens', 'Objektiv', 'de'),
(36, 'size', 'Grösse', 'de'),
(37, 'description', 'Beschreibung', 'de'),
(38, 'detail', 'Details', 'en'),
(39, 'home', 'Home', 'en'),
(40, 'upload', 'Upload', 'en'),
(41, 'register', 'Register', 'en'),
(42, 'my_pictures', 'My pictures', 'en'),
(43, 'no_pictures', 'Currently you haven&#039;t uploaded any pictures.', 'en'),
(44, 'my_orders', 'My Orders', 'en'),
(45, 'no_orders', 'You haven&#039;t bought anything yet', 'en'),
(46, 'categories', 'Categories', 'en'),
(47, 'username', 'Username', 'en'),
(48, 'password', 'Password', 'en'),
(49, 'login', 'Login', 'en'),
(50, 'profile', 'My profile', 'en'),
(51, 'logout', 'Logout', 'en'),
(52, 'camera_model', 'Camera', 'en'),
(53, 'aperture', 'Aperture', 'en'),
(54, 'exposure_time', 'Exposure time', 'en'),
(55, 'price', 'Price', 'en'),
(56, 'title', 'Title', 'en'),
(57, 'search', 'Search', 'en'),
(58, 'created_at', 'Recording date', 'en'),
(59, 'uploaded_at', 'Upload date', 'en'),
(60, 'owner', 'Owner', 'en'),
(61, 'order_date', 'Order date', 'en'),
(62, 'first_name', 'First name', 'en'),
(63, 'last_name', 'Last name', 'en'),
(64, 'email', 'E-mail address', 'en'),
(65, 'sex', 'Gender', 'en'),
(66, 'male', 'Male', 'en'),
(67, 'female', 'Female', 'en'),
(68, 'edit', 'Edit', 'en'),
(69, 'buy', 'Buy', 'en'),
(70, 'no_result', 'Nothing found.', 'en'),
(71, 'basket', 'Basket', 'en'),
(72, 'lens', 'Lens', 'en'),
(73, 'size', 'Size', 'en'),
(74, 'description', 'Description', 'en'),
(75, 'pictures', 'Bilder', 'de'),
(76, 'show_profile', 'Profil anzeigen', 'de'),
(77, 'update', 'Aktualisieren', 'de'),
(78, 'pictures', 'Pictures', 'en'),
(79, 'show_profile', 'Show Profile', 'en'),
(80, 'update', 'Update', 'en'),
(81, 'buy_now', 'Jetzt kaufen (Paypal)', 'de'),
(82, 'delete_picture', 'Bild löschen', 'de'),
(83, 'checkout', 'Zur Kasse', 'de'),
(84, 'edit_profile', 'Profil bearbeiten', 'de'),
(85, 'budget', 'Kontostand', 'de'),
(86, 'payment_successful', 'Die Zahlung war erfolgreich.', 'de'),
(87, 'nomail_payok', 'Die Bestätigungsmail konnte nicht versandt werden, aber die Bezahlung war erfolgreich.', 'de'),
(88, 'no_payment', 'Die Zahlung konnte nicht durchgeführt werden.', 'de'),
(89, 'wrong_password', 'Bitte überprüfen Sie ihr Passwort.', 'de'),
(90, 'mail_notsent', 'Überprüfen Sie die Mailadresse.', 'de'),
(91, 'double_username', 'Dieser Benutzername wird bereits verwendet. Bitte versuchen Sie einen anderen.', 'de'),
(92, 'login_error', 'Der Benutzer existiert nicht, das Passwort ist falsch oder ihre E-Mail-Adresse wurde noch nicht bestätigt.', 'de'),
(93, 'picture_deleted', 'Das Bild wurde erfolgreich gelöscht.', 'de'),
(94, 'type_notallowed', 'Dieser Dateityp ist auf dieser Seite nicht erlaubt. ', 'de'),
(95, 'select_file', 'Bitte wählen Sie eine Datei.', 'de'),
(96, 'no_thumbnail', 'Beim Erstellen der Bildvorschau ist ein Fehler aufgetreten.', 'de'),
(97, 'buy_now', 'Buy now (Paypal)', 'en'),
(98, 'delete_picture', 'Delete picture', 'en'),
(99, 'checkout', 'Checkout', 'en'),
(100, 'edit_profile', 'Edit profile', 'en'),
(101, 'budget', 'Credit balance', 'en'),
(102, 'payment_successful', 'The payment was successful.', 'en'),
(103, 'nomail_payok', 'Mail could not be send, but the payment was successful.', 'en'),
(104, 'no_payment', 'The payment wasn&#039;t successfully', 'en'),
(105, 'wrong_password', 'Please check your password.', 'en'),
(106, 'mail_notsent', 'Please check your mail address.', 'en'),
(107, 'double_username', 'This username is already taken. Please try another one.', 'en'),
(108, 'login_error', 'User does not exist, password is wrong or email is not confirmed.', 'en'),
(109, 'picture_deleted', 'The picture is successfully deleted.', 'en'),
(110, 'type_notallowed', 'This file type is not allowed to upload to this site. ', 'en'),
(111, 'select_file', 'Please select a file.', 'en'),
(112, 'no_thumbnail', 'An error occured on creating a thumbnail.', 'en'),
(113, 'copyright', 'Ich bestätige hiermit die Urheberrechte an dem Bild zu haben und dieses an Isithombe Webshop zu übertragen.', 'de'),
(114, 'license', 'Ich akzeptiere hiermit die Allgmeinen Geschäftsbedingungen von Isithombe Webshop.', 'de'),
(115, 'added_picture', 'Bild dem Warenkorb hinzugefügt', 'de'),
(116, 'login_successful', 'Login erfolgreich', 'de'),
(117, 'logout_successful', 'Logout erfolgreich', 'de'),
(118, 'copyright', 'I confirm, I have the full copyright on the picture and will hand it over to isithombe webshop', 'en'),
(119, 'license', 'I accept the license agreement with isithombe webshop', 'en'),
(120, 'added_picture', 'Added picture to basket', 'en'),
(121, 'login_successful', 'You are logged in now', 'en'),
(122, 'logout_successful', 'Logout successful', 'en'),
(123, 'actual_offer', 'Aktuell: 50% Rabatt auf ausgewählte Bilder! ', 'de'),
(124, 'actual_offer', 'Now: 50% discount on the following pictures!', 'en');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `offers_pictures`
--

CREATE TABLE IF NOT EXISTS `offers_pictures` (
  `offer_id` int(6) NOT NULL,
  `picture_id` int(6) NOT NULL,
  `new_price` decimal(5,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `offers_pictures`
--

INSERT INTO `offers_pictures` (`offer_id`, `picture_id`, `new_price`) VALUES
(2, 1, NULL);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`id` int(6) NOT NULL,
  `order_date` datetime DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `user_id` int(6) NOT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `complete` tinyint(1) DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `orders`
--

INSERT INTO `orders` (`id`, `order_date`, `price`, `user_id`, `payment_id`, `hash`, `complete`) VALUES
(1, '2017-01-08 16:57:46', '1.00', 1, 'PAY-9D030335LL2728630LBZGC6I', '38f78d7f0819f70080fdc1b4d810dbdb', 0),
(2, '2017-01-08 17:05:53', '1.10', 3, 'PAY-0AD76514KS5255818LBZGGYI', '464b46254f7e260902fc59b389d70c92', 1),
(3, '2017-01-08 17:10:51', '1.00', 1, 'PAY-51H05576S6774162ELBZGJCY', '1f3546dbb3ce36092e89398c61667507', 1),
(4, '2017-01-08 20:12:29', '2.50', 3, 'PAY-9EJ858282T8131350LBZI6HI', 'fcd1e52e8690d5bb6a1739d40cb9c7b3', 1),
(5, '2017-01-09 19:14:03', '1.00', 2, 'PAY-99M28070TM368310DLBZ5F2Y', '8dc7d670b7ebe93c67f54fa6104da77f', 1),
(6, '2017-01-09 21:04:08', '0.25', 1, 'PAY-036645564R246402RLBZ6ZOA', '0e14db01943d8c77b0b8dba9a341920c', 1),
(7, '2017-01-10 18:18:45', '1.35', 6, 'PAY-29W480264R164011VLB2RO5I', '7f07a238277dfec3ba7ccce23a3fc092', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `payouts`
--

CREATE TABLE IF NOT EXISTS `payouts` (
`id` int(6) NOT NULL,
  `execution` datetime NOT NULL,
  `user_id` int(6) NOT NULL,
  `total_payout` decimal(5,2) DEFAULT NULL,
  `state` enum('full_size','half_size','thumbnail') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures`
--

CREATE TABLE IF NOT EXISTS `pictures` (
`id` int(6) NOT NULL,
  `title` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL,
  `thumbnail_path` varchar(255) NOT NULL,
  `camera_model` varchar(255) DEFAULT NULL,
  `lens` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) NOT NULL DEFAULT '0.00',
  `width` int(6) NOT NULL,
  `height` int(6) NOT NULL,
  `aperture` varchar(255) DEFAULT NULL,
  `exposure_time` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `uploaded_at` datetime NOT NULL,
  `owner_id` int(6) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Daten für Tabelle `pictures`
--

INSERT INTO `pictures` (`id`, `title`, `path`, `thumbnail_path`, `camera_model`, `lens`, `price`, `width`, `height`, `aperture`, `exposure_time`, `created_at`, `uploaded_at`, `owner_id`, `description`, `deleted`) VALUES
(1, 'Blausee', 'gallery/fec15e5b2061a3eb42564c970638c40d.JPG', 'gallery/thumbnails/fec15e5b2061a3eb42564c970638c40d.JPG', 'Canon EOS 550D', 'n/a', '1.10', 5184, 3456, 'n/a', '1/30 s', '2016-09-11 09:55:34', '2017-01-08 16:56:26', 1, 'test', 0),
(2, 'Mond', 'gallery/1be6051997c6cdd95abe3ed4621ab724.jpg', 'gallery/thumbnails/1be6051997c6cdd95abe3ed4621ab724.jpg', 'Canon EOS 7D', 'EF70-200mm f/4L IS USM', '1.00', 457, 457, 'n/a', '1/100 s', '2012-05-25 22:32:06', '2017-01-08 16:56:56', 3, 'Originalbild (unbearbeitet) aufgenommen vom Balkon aus.', 0),
(3, 'Mond bearbeitet', 'gallery/223cdd401d0b03bc72dd3e5a05668896.jpg', 'gallery/thumbnails/223cdd401d0b03bc72dd3e5a05668896.jpg', 'Canon EOS 7D', 'EF70-200mm f/4L IS USM', '1.00', 459, 459, 'n/a', '1/1000 s', '2012-06-02 02:09:21', '2017-01-08 16:57:46', 3, 'Einzige Bearbeitung: aufgehellt und Kontrast erhöht.', 0),
(4, 'Sternenhimmel', 'gallery/09ccaee1f8e1b4c3b6421b8846daed1c.JPG', 'gallery/thumbnails/09ccaee1f8e1b4c3b6421b8846daed1c.JPG', 'Canon EOS 7D', 'n/a', '1.00', 5184, 3456, 'n/a', '10/1 s', '2011-05-08 21:07:02', '2017-01-08 16:58:55', 3, '', 1),
(5, 'Jungfraujoch', 'gallery/f4c429cc027d61cec99c9b81990a566b.JPG', 'gallery/thumbnails/f4c429cc027d61cec99c9b81990a566b.JPG', 'Canon EOS 7D', 'n/a', '10.00', 5184, 3456, 'n/a', '1/1250 s', '2012-05-17 18:06:34', '2017-01-08 16:59:32', 3, 'Aufnahme von Interlaken aus.', 0),
(6, 'Oeschinensee', 'gallery/87c905e3710f9a2e0f5ada7cf61d1dde.JPG', 'gallery/thumbnails/87c905e3710f9a2e0f5ada7cf61d1dde.JPG', 'Canon EOS 550D', 'n/a', '2.50', 5184, 3456, 'n/a', '1/250 s', '2016-09-11 16:14:10', '2017-01-08 17:23:05', 1, 'Oeschinensee Sommer 16', 0),
(7, 'Pizza Huus', 'gallery/7dbc2816e684eeea2ca5a910101fa25f.jpg', 'gallery/thumbnails/7dbc2816e684eeea2ca5a910101fa25f.jpg', 'HTC Desire', 'n/a', '1.20', 272, 272, 'n/a', 'n/a', '2010-09-14 20:44:04', '2017-01-09 19:08:18', 4, 'blabla', 1),
(8, 'asdf', 'gallery/bbe00ead2db3dce812d890225a5db5f1.jpg', 'gallery/thumbnails/bbe00ead2db3dce812d890225a5db5f1.jpg', 'HTC Desire', 'n/a', '1.00', 2592, 1552, 'n/a', 'n/a', '2011-10-11 18:50:10', '2017-01-09 20:46:50', 3, '', 1),
(9, 'Gewitter im Anzug', 'gallery/afb44c43af72847deb1f6045b3dff262.JPG', 'gallery/thumbnails/afb44c43af72847deb1f6045b3dff262.JPG', 'Canon EOS 7D', 'n/a', '2.50', 5184, 3456, 'n/a', '1/100 s', '2011-04-30 19:17:26', '2017-01-10 13:57:25', 3, 'Dunkle Wolken über Bern', 0),
(10, 'Faulensee', 'gallery/a74a80f0d48a6af2e5b135f7eb34e78a.JPG', 'gallery/thumbnails/a74a80f0d48a6af2e5b135f7eb34e78a.JPG', 'Canon EOS 7D', 'n/a', '1.30', 5184, 3456, 'n/a', '1/250 s', '2012-05-17 18:44:53', '2017-01-10 13:58:36', 3, '', 0),
(11, 'Libelle', 'gallery/995de2b670b00ed1c0a05ec380730571.JPG', 'gallery/thumbnails/995de2b670b00ed1c0a05ec380730571.JPG', 'Canon EOS 550D', 'n/a', '15.00', 5184, 3456, 'n/a', '1/80 s', '2016-10-30 16:21:09', '2017-01-10 18:20:00', 6, 'Eine Libelle', 0);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures_orders`
--

CREATE TABLE IF NOT EXISTS `pictures_orders` (
  `picture_id` int(6) NOT NULL,
  `order_id` int(6) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pictures_orders`
--

INSERT INTO `pictures_orders` (`picture_id`, `order_id`, `size`, `price`) VALUES
(1, 2, 'all', '1.10'),
(2, 3, 'all', '1.00'),
(6, 4, 'all', '2.50'),
(4, 5, 'all', '1.00'),
(3, 6, 'all', '0.50'),
(2, 7, 'all', '0.50'),
(1, 7, 'all', '1.10');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `pictures_tags`
--

CREATE TABLE IF NOT EXISTS `pictures_tags` (
  `tag_id` int(6) NOT NULL,
  `picture_id` int(6) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `pictures_tags`
--

INSERT INTO `pictures_tags` (`tag_id`, `picture_id`) VALUES
(16, 1),
(15, 1),
(14, 1),
(17, 2),
(17, 3),
(55, 11),
(54, 4),
(20, 5),
(21, 5),
(1, 5),
(22, 6),
(1, 6),
(23, 7),
(23, 8),
(24, 9),
(25, 9),
(26, 9),
(27, 10),
(28, 10),
(29, 10),
(56, 11),
(57, 11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `picture_id` int(6) NOT NULL,
  `user_id` int(6) NOT NULL,
  `value` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `special_offers`
--

CREATE TABLE IF NOT EXISTS `special_offers` (
`id` int(6) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Daten für Tabelle `special_offers`
--

INSERT INTO `special_offers` (`id`, `start`, `end`) VALUES
(2, '2017-01-08 18:00:00', '2017-01-14 23:00:00');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
`id` int(6) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Daten für Tabelle `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'Nature'),
(56, 'Draussen'),
(53, 'Crap'),
(52, 'Shit'),
(51, 'Diaröh'),
(50, 'Beauty'),
(49, 'Kitchen'),
(48, 'Cars'),
(47, 'Fashion'),
(46, 'Sports'),
(45, 'Dog'),
(44, 'Cat'),
(43, 'Animal'),
(14, 'Lake'),
(15, 'See'),
(16, 'Blausee'),
(17, 'Mond'),
(55, 'Libelle'),
(54, ''),
(20, 'Berge'),
(21, 'Jungfrau'),
(22, 'Oeschinensee'),
(42, 'Politics'),
(24, 'Wetter'),
(25, 'Wolken'),
(26, 'Gebäude'),
(27, 'Thunersee'),
(28, 'Spiez'),
(29, 'Faulensee'),
(57, 'Balkon');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(6) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_confirmed` tinyint(1) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` varchar(255) DEFAULT NULL,
  `budget` decimal(5,2) DEFAULT NULL,
  `paypal_address` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password_hash` varchar(255) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `email_confirmed`, `address`, `sex`, `budget`, `paypal_address`, `is_admin`, `username`, `password_hash`, `deleted`) VALUES
(1, 'tobias', 'flühmann', 't.fluehmann@whatever.ch', 1, NULL, 'male', '2.82', NULL, 1, 'tfluehmann', '$2y$10$W6zRHQBYFKRBkAHdpdbFhOfJL8xXeXcI6kRuAaBG5Lh8N0gCIAuL.', 0),
(2, 'raphael', 'suter', 'r.suter@whatever.ch', 1, NULL, 'male', NULL, NULL, 1, 'rsuter', '$2y$10$W6zRHQBYFKRBkAHdpdbFhOfJL8xXeXcI6kRuAaBG5Lh8N0gCIAuL.', 0),
(3, NULL, NULL, 'mail@maestro02.ch', 1, NULL, NULL, '1.80', NULL, NULL, 'maestro02', '$2y$10$b8xAM9IYypXfb77/zKwXIe2vetvNDNXFyYNNe3TKGp2xZgRym4Wfe', 0),
(4, NULL, NULL, 'mail@maestro02.ch', 1, NULL, NULL, NULL, NULL, NULL, 'user', '$2y$10$dA5CZfTW9dOwEluiDfzPIusFKnMN/IqV.hwuivT9Mvv54TNYdqa/C', 0),
(5, '', '', 'mail@maestro02.ch', 1, NULL, 'male', NULL, NULL, 1, 'chrieger', '$2y$10$VC6mjXr5ebRkSblJ2wbOouOzpWyEBkyheWEvNggBbaAgN6pyAzZdi', 1),
(6, 'Hansli', 'Wurst', 't.fluehmann94@hotmail.com', 1, NULL, 'male', NULL, NULL, 1, 'hansli', '$2y$10$3O9CaR5eIoDqjFvwVQ1qlOoNRRHdb2nzLeI8.bF6fwkB.i.vAS07.', 0),
(7, 'Kai', 'Brünnler', 'kai.bruennler@bfh.ch', 1, NULL, 'male', NULL, NULL, 1, 'admin', '$2y$10$4IuzWMzTcoK0zKQzoUDz3O8pvOEURhyvjzkE9FFAEliqst6krdeTO', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `localizations`
--
ALTER TABLE `localizations`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers_pictures`
--
ALTER TABLE `offers_pictures`
 ADD KEY `picture_id` (`picture_id`), ADD KEY `offer_id` (`offer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
 ADD PRIMARY KEY (`id`), ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `pictures_orders`
--
ALTER TABLE `pictures_orders`
 ADD KEY `picture_id` (`picture_id`), ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
 ADD KEY `picture_id` (`picture_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `special_offers`
--
ALTER TABLE `special_offers`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `localizations`
--
ALTER TABLE `localizations`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=125;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `special_offers`
--
ALTER TABLE `special_offers`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(6) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
