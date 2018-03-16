-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2018 at 02:06 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukuspokus`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_name` varchar(255) NOT NULL,
  `cat_permalink` varchar(255) DEFAULT NULL,
  `cat_photo` varchar(255) NOT NULL,
  `cat_description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`cat_id`),
  UNIQUE KEY `cat_name_UNIQUE` (`cat_name`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_permalink`, `cat_photo`, `cat_description`, `status`) VALUES
(1, 'U samo jednoj šerpi!', 'u-samo-jednoj-serpi', 'ujednojserpi.jpg', 'Ovde ćete pronaći recepte za koje vam treba samo jedan sud. Ukusan ručak ili poslastica, a čista kuhinja i nakon pripreme! Zbogom, gomilo prljavih sudova!', 1),
(2, 'Ljuto', 'ljuto', 'ljuto.jpg', 'Jer zašto da ne? Pored bibera i ljute papričice, ima još raznih začina koji mogu učiniti jelo ljutim, ili bar pikantnim i jakim.', 1),
(3, 'Slatko', 'slatko', 'slatko.jpg', 'Slatko! Magična reč! Bilo da nešto slavite, da hoćete nekoga da iznenadite, možda nagradite najmlađe, treba vam nešto slatko!', 1),
(4, 'Slano', 'slano', 'slano.jpg', 'Slani recepti u kojima sigurno ima za svakog po nešto. Upotrebite <a href=\"<?php echo ROOT_URL; ?>search\">naprednu pretragu</a> da izdvojite npr posne recepte, pečeno, kuvano, vegansko itd.', 1),
(5, 'Zimnica', 'zimnica', 'zimnica.jpg', 'Provereni recepti za zimnicu. Obećavamo da nisu teški, i da svako može da ih napravi uspešno, čak i sa malo ili nimalo iskustva.', 1),
(6, 'Smoothie, i kreni! ', 'smoothie', 'smoothie.jpg', 'Recepti za smoothie, sa voćem, mlekom, jogurtom, sladoledom, začinima, povrćem. Osvežavajuće, hranljivo. Kombinacija je toliko...', 1),
(7, 'Zgodno za poneti', 'za-poneti', 'zaponeti.jpg', 'Živite aktivno, nemate vremena da jedete kući polako, a nikako ne želite da opet jedete u pekari ili neke pljeke kod nekog Džoa? Evo inspiracije!', 1),
(8, 'Recepti za bebe', 'za-bebe', 'zabebe.jpg', 'Bez namirnica koje se ne preporučuju u prve dve godine života: živo jaje, buđavi sirevi, sveži citrusi, namirnice iz konzerve, beli šećer, konzervansi, margarin, puno začina, nesamlevene semenke...', 1),
(9, 'Sadrži alkohol', 'sa-alkoholom', 'saalkoholom.jpg', 'Meso u sosu od malina i votke? Kolač sa likerom od ruža? Alkoholni kokteli, hobotnica u vinu, kiflice sa pivom? Tu su, i još svašta nešto.', 1),
(10, 'Bez šećera', 'bez-secera', 'bezsecera.jpg', 'U ovim receptima se koriste urme, sirupi agave, javora, stevia, i drugi prirodni zaslađivači. Ponegde ima i meda.', 1),
(11, 'Smrznuto', 'smrznuto', 'smrznuto.jpg', 'Ovde su recepti u kojima se nešto upotrebljava u smrznutom stanju. Ili ste stavili ranije da se smrzne, ili ste kupili. Uglavnom brza rešenja. ', 1),
(12, 'Prženo', 'przeno', 'przeno.jpg', 'Tiganj neka bude u pripravnosti, jer trebaće vam za ovu kategoriju koja je prepuna recepata za slane i slatke pržene đakonije.', 1),
(13, 'Pečeno', 'peceno', 'peceno.jpg', 'Razne pečene đakonije, slatke, slane. Pečeno sadrži i puno recepata koje bismo mogli nazvati \"smućkaš i strpaš u rernu za ručak\". Ali tu su i razni slatkiši, torte koje se peku, slana predjela...', 1),
(14, 'Kuvano', 'kuvano', 'kuvano.jpg', 'Kuvano, ili što mame vole da kažu - jedi kašikom. Ne znamo da li je najbolje za stomak, kao što mame tvrde, ali znamo da su provereni recepti i da nećete pogrešiti šta god da odaberete. ', 1),
(15, 'Vegetarijansko', 'vegetarijansko', 'vegetarijansko.jpg', 'Vegetarijansko ovde podrazumeva da nema mesa i mesnih prerađevina, kao ni ribe. Mlečni proizvodi i jaja su zastupljeni. Slatko, slano, udri! ', 1),
(16, 'Egzotično', 'egzoticno', 'egzoticno.jpg', 'Iznenadite ukućane ili prijatelje nečim neobičnim. Egzotični napici, kolači, pa i čitavi obroci sa sastojcima koje ne koristite svaki dan ili ih možda niste ni probali. ', 1),
(17, 'Priprema za 15 min', 'za-15-min', 'za15min.jpg', 'Iznenadni gosti? Puno posla i premalo vremena za kuhinju danas? Brdo obaveza i frka? Ovo je kategorija za vas!', 1),
(18, 'Posno', 'posno', 'posno.jpg', 'Posno - nema mesa, mleka i mlečnih proizvoda i jaja, ali može se naći poneka ribica na trpezi, da obogati period posta ili upotpuni posni meni za slavlja i nedeljne ručkove. ', 1),
(19, 'Vegansko', 'vegansko', 'vegansko.jpg', 'Vegansko podrazumeva da nema namirnica životinjskog porekla - nema jaja, mleka, mlečnih proizvoda, mesa, mesnih prerađevina, kao ni ribe. Detox na kvadrat, enzimi na kub!', 1),
(20, 'Bez glutena', 'bez-glutena', 'bezglutena.jpg', 'Gluten je biljni protein koji se nalazi u pšenici, ovsu, ječmu i raži, i njihovom brašnu i pahuljicama. Ovde ćete naći razne recepte sa heljdinim, pirinčanim, prosenim, krompirnim i drugim vrstama brašna, kao i razne fore.', 1),
(21, 'No limits', 'no-limits', 'nolimit.jpg', 'Jaretina sa pistaćima, i tako to. Razni specijaliteti kojima treba ili puno sastojaka ili puno vremena za pripremu. Ali smatramo da vredi podeliti ih. ', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
