/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `hasil_tes_kepribadian`;
CREATE TABLE `hasil_tes_kepribadian` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_peserta` varchar(100) NOT NULL,
  `kepribadian_id` int(5) unsigned NOT NULL,
  `jawaban` enum('jawaban1','jawaban2','jawaban3','jawaban4') NOT NULL,
  `nilai` int(5) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hasil_tes_kepribadian_kepribadian_id_foreign` (`kepribadian_id`),
  CONSTRAINT `hasil_tes_kepribadian_kepribadian_id_foreign` FOREIGN KEY (`kepribadian_id`) REFERENCES `kepribadian` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `hasil_tes_tulis`;
CREATE TABLE `hasil_tes_tulis` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `nama_peserta` varchar(100) NOT NULL,
  `tulis_id` int(5) unsigned NOT NULL,
  `filejawaban` varchar(100) NOT NULL,
  `waktu_pengerjaan` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `hasil_tes_tulis_tulis_id_foreign` (`tulis_id`),
  CONSTRAINT `hasil_tes_tulis_tulis_id_foreign` FOREIGN KEY (`tulis_id`) REFERENCES `tulis` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `kepribadian`;
CREATE TABLE `kepribadian` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) NOT NULL,
  `soal` varchar(100) NOT NULL,
  `jawaban1` varchar(100) NOT NULL,
  `jawaban2` varchar(100) NOT NULL,
  `jawaban3` varchar(100) NOT NULL,
  `jawaban4` varchar(100) NOT NULL,
  `jawaban_benar` enum('jawaban1','jawaban2','jawaban3','jawaban4') NOT NULL,
  `nilai` int(5) NOT NULL DEFAULT 5,
  `nomor_soal` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `pengaturan_tes`;
CREATE TABLE `pengaturan_tes` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `waktu_pengerjaan_tes_kepribadian` varchar(100) NOT NULL,
  `waktu_pengerjaan_tes_tulis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

DROP TABLE IF EXISTS `tulis`;
CREATE TABLE `tulis` (
  `id` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `teks` text DEFAULT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;



INSERT INTO `hasil_tes_tulis` (`id`, `nama_peserta`, `tulis_id`, `filejawaban`, `waktu_pengerjaan`) VALUES
(5, 'Anjas', 2, 'Bulanan_55_2023-07-16 14 55 02_1.pdf', 0);
INSERT INTO `hasil_tes_tulis` (`id`, `nama_peserta`, `tulis_id`, `filejawaban`, `waktu_pengerjaan`) VALUES
(6, 'Anjas', 2, 'Untitled58_20230715192506.png', 0);
INSERT INTO `hasil_tes_tulis` (`id`, `nama_peserta`, `tulis_id`, `filejawaban`, `waktu_pengerjaan`) VALUES
(7, 'Martha', 3, 'Bulanan_55_2023-07-16 14 55 02_2.pdf', 0);

INSERT INTO `kepribadian` (`id`, `gambar`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban_benar`, `nilai`, `nomor_soal`) VALUES
(3, 'Screenshot 2023-07-10 at 09-20-19 POPUP_2.png', 'In amet accusamus r', 'Sed quos do eiusmod ', 'Quis sapiente volupt', 'Voluptatem minus sol', 'Illum voluptatem of', 'jawaban3', 5, 3);
INSERT INTO `kepribadian` (`id`, `gambar`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban_benar`, `nilai`, `nomor_soal`) VALUES
(4, 'Screenshot 2023-07-09 at 18-15-27 Pusdag Indonesia_1.png', 'Eveniet nulla volup', 'Iusto magna commodi ', 'Sit distinctio Aut', 'Ad quos quisquam qui', 'Magna hic commodi li', 'jawaban1', 5, 2);
INSERT INTO `kepribadian` (`id`, `gambar`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban_benar`, `nilai`, `nomor_soal`) VALUES
(5, 'Untitled58_20230715192515.png', 'Eiusmod dolore labor', 'Rerum et nisi dolore', 'In natus autem et do', 'Esse itaque ipsam ex', 'Qui et doloremque ex', 'jawaban3', 5, 1);
INSERT INTO `kepribadian` (`id`, `gambar`, `soal`, `jawaban1`, `jawaban2`, `jawaban3`, `jawaban4`, `jawaban_benar`, `nilai`, `nomor_soal`) VALUES
(6, 'Screenshot 2023-07-03 at 23-25-15 https __anjas-porto.netlify.app.png', 'Obcaecati qui placea', 'Ut quis at ab volupt', 'Repudiandae perspici', 'Impedit maiores dol', 'Rem id consequatur ', 'jawaban4', 5, 4);

INSERT INTO `pengaturan_tes` (`id`, `waktu_pengerjaan_tes_kepribadian`, `waktu_pengerjaan_tes_tulis`) VALUES
(2, '20', '30');


INSERT INTO `tulis` (`id`, `teks`, `gambar`) VALUES
(2, 'Lorem Ipsum doloorrrrrrrrqqwrqwr', 'Spider-Man drawing ( not mine)_5.jpg');
INSERT INTO `tulis` (`id`, `teks`, `gambar`) VALUES
(3, 'sSdDQWF3F33FFWSfefefe', 'Tumblr_6.png');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;