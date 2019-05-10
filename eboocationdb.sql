/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.1.37-MariaDB : Database - eboocationdb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`eboocationdb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `eboocationdb`;

/*Table structure for table `ebooks` */

DROP TABLE IF EXISTS `ebooks`;

CREATE TABLE `ebooks` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `year` varchar(4) DEFAULT '-',
  `publisher` varchar(50) DEFAULT '-',
  `category` varchar(20) DEFAULT NULL,
  `description` text,
  `filename` varchar(100) DEFAULT NULL,
  `uploadtime` datetime DEFAULT NULL,
  `approval` enum('0','1') DEFAULT NULL,
  `iduser` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `ebooks` */

insert  into `ebooks`(`id`,`title`,`author`,`year`,`publisher`,`category`,`description`,`filename`,`uploadtime`,`approval`,`iduser`) values 
(2,'Dilan 1','Pidi Baiq','2014','Pastek Books','sastra','Cinta, walaupun sudah berlalu sekian lama, tetap saja, saat dikenang begitu manis.\r\nMilea, dia kembali ke tahun 1990 untuk menceritakan seorang laki-laki yang pernah menjadi seseorang yang sangat dicintainya, Dilan.\r\nLaki-laki yang mendekatinya (milea) bukan dengan seikat bunga atau kata-kata manis untuk menarik perhatiannya. Namun','dilan1.pdf','2018-04-18 10:12:19','1',2),
(3,'Dilan 2','Pidi Baiq','2014','Pastel Books','sastra','Milea kembali bercerita tentang kisah percintaannya dengan Dilan. Seperti orang yang baru jadian pada umumnya, Milea mengalami masa yang indah di SMA sesudah resmi jadi pacar Dilan. Ketika guyuran hujan menerpa, Dilan menggunaka motor CB dengan Milea di belakangnya. Milea dengan erat memeluk Dilan. Mereka berdua jalan-jalan menyusuri Jl. Buah Batu sembari ketawa riang, itu semua berkat Dilan yang selalu membuat hari-hari Milea bahagia.\r\n\r\nJawaban yang diberikan Dilan selalu saja membaut Milea tersenyum, Dilan pun termasuk orang yang cerdas dan pintar di kelasnya, buktinya dia selalu mendapatkan ranking satu atau dua. Meski Melia merasa khawatir dengan Dilan yang bergabung dengan geng motor, karena Melia takut terjadi hal yang buruk menimpa Dilan karena geng motor.','dilan2.pdf','2018-04-18 10:17:25','1',2),
(4,'Dilan 3','Pidi Baiq','2014','Pastel Books','sastra','Novel ini menceritakan pengenalan singkat Dilan waktu dia masih kecil. Kira-kira waktu masih berumur 5 tahun, pernah ingin jadi macan walaupun itu tidak mungkin. Dia pernah menamai sepedanya dengan nama â€œmobil derekâ€. Dia juga pernah sholat pakai mukena. Dilan selalu berpikir bahwa dia mempunyai masa kecil yang benar-benar bahagia.','DILAN 3 (shabrinabachtiar).pdf','2018-04-18 10:19:00','1',2),
(5,'Berjuang ditanah Rantau','Ahmad Fuadi','2013','PT BENTANG PUSTAKA','sastra','Hidup di tanah rantau memang bukan perkara mudah. Beda provinsi, pulau, negara, apalagi benua. Keberanian keluar dari kampung halaman untuk hidup di negeri orang adalah sebuah faktor penting untuk maju. Merantau artinya berani meninggalkan kenyamanan rumah dan keluarga, untuk berjuang mencari sesuatu yang â€˜belum pastiâ€™ di sebuah tanah asing. Perjuangan untuk berani berhadapan dengan â€˜ketidakpastianâ€™ ini yang bisa mengasah jiwa dan raga seorang untuk lebih maju daripada yang tetap bergaul dengan â€˜kepastianâ€™ di kampung halaman.','Berjuang di Tanah Rantau.pdf','2018-04-18 10:24:47','1',6),
(6,'Negeri 5 Menara','Ahmad Fuadi','2009','Gramedia','sastra','Alif lahir di pinggir Danau Maninjau dan tidak pernah menginjak tanah di luar ranah Minangkabau. Masa kecilnya adalah berburu durian runtuh di rimba Bukit Barisan, bermain bola di sawah berlumpur dan tentu mandi berkecipak di air biru Danau Maninjau. Tiba-tiba saja dia harus naik bus tiga hari tiga malam melintasi punggung Sumatera dan Jawa menuju sebuah desa di pelosok Jawa Timur. Ibunya ingin dia menjadi Buya Hamka walau Alif ingin menjadi Habibie. Dengan setengah hati dia mengikuti perintah Ibunya: belajar di pondok. Di kelas hari pertamanya di Pondok Madani (PM), Alif terkesima dengan \"mantera\" sakti man jadda wajada. Siapa yang bersungguh-sungguh pasti sukses. Dia terheran-heran mendengar komentator sepakbola berbahasa Arab, anak menggigau dalam bahasa Inggris, merinding mendengar ribuan orang melagukan Syair Abu Nawas dan terkesan melihat pondoknya setiap pagi seperti melayang di udara. Dipersatukan oleh hukuman jewer berantai, Alif berteman dekat dengan Raja dari Medan, Said dari Surabaya, Dulmajid dari Sumenep, Atang dari Bandung dan Baso dari Gowa. Di bawah menara masjid yang menjulang, mereka berenam kerap menunggu maghrib sambil menatap awan lembayung yang berarak pulang ke ufuk. Di mata belia mereka, awan-awan itu menjelma menjadi negara dan benua impian masing-masing. Kemana impian jiwa muda ini membawa mereka?','negeri-5-menara-dewikz-tmt1.pdf','2018-04-18 10:27:46','1',11),
(8,'CSS Notes for Profesiional','GoalKicker Team ','-','GoalKicker.com','ilmiah','Panduan CSS untuk tingkat Profesional','CSSNotesForProfessionals.pdf','2018-04-18 16:01:15','1',1),
(9,'E - Book belajar bahasa inggris dengan mudah','Teguh Handoko S','2009','e-Compusoft Training Center','bahasa','Buku untuk belajar bahasa inggris bagi pemula','ebook-belajar-bahasa-inggris-dengan-mudah.pdf','2018-04-19 04:14:02','0',1),
(10,'English grammar secret','Caroline Brown','2010','Caroline Brown','sastra','Grammar for Beginner','englishgrammarsecrets.pdf','2018-04-19 04:40:51','1',1),
(11,'Ilmu Nahwu','Abu Razin','2015','Pustaka Bisa','bahasa','Belajar nahwu dengan mudah dengan ini ni...dijamin langsung...','ebook-ilmu-nahwu-untuk-pemula.pdf','2018-04-19 04:51:54','1',3),
(12,'Catatan hitam lima presiden','ishak rafik','2008','Ufuk Publishing House','sejarah','catatan hitam lima presiden RI','catatanhitamlimapresidenindonesia.pdf','2018-04-19 05:35:26','1',7),
(13,'Riwayat Perjuangan K.H Abdul Halim','Miftahul Falah,S.S','2008','Masyarakat Sejarawan Indonesia','biografi','Riwayat Perjuangan K.H Abdul Halim','riwayat_perjuangan_k_h_abdul_halim.pdf','2018-04-19 05:38:22','1',11),
(14,'komunisme musuh islam sepanjang sejarah','Abdul Qadir Djaelani','2000','Yayasan pengkajian islam madinah munawwarah','sejarah','Riwayat Perjuangan K.H Abdul Halim','riwayat_perjuangan_k_h_abdul_halim.pdf','2018-04-19 05:42:21','1',8),
(16,'Software Engineering A Practitionerâ€™s Approach','Roger S. Pressman','2015','Mc Graw Hill','ilmiah','To succeed, we need discipline when software is designed\r\nand built. We need an engineering approach.','PythonNotesForProfessionals.pdf','2017-04-20 08:14:48','0',9),
(17,'Ubur Ubur Lembur','Raditya Dika','2018','Gagas Media','sastra','Hal kedua yang gue nggak sempat kasih tahu Iman: jadi orang yang dikenal publik harus tahan dengan asumsi-asumsi orang. Misalnya, orang-orang penuh dengan asumsi yang salah. Gue kurusan dikit, dikomentarin orang yang baru ketemu, â€˜Bang Radit, kurusan, deh. Buat film baru, ya?â€™ Gue geleng, â€˜Enggak.â€™ Gue bilang, â€˜Emang lagi diet aja.â€™ Dia malah balas bilang, â€˜Ah, bohong! Paling abis putus cinta, kan?','Ubur-Ubur Lembur.pdf','2018-04-22 07:20:41','1',1),
(18,'HTTP Server','Badrus','2018','-','ilmiah','Http server adalah metode jaringan untuk memusatkan html di server','http_server.docx','2018-04-23 21:49:23','1',1),
(19,'Abu Bakar Asshidqi','Muhammad Husein Haekal','2003','Litera Antarnusa','biografi','Biografi Khalifah Abu Bakar Asshidqi','02-abu-bakar-as-siddiq.pdf','2018-04-23 22:28:39','0',2),
(20,'BJ HABIBIE','Bacharuddin Jusuf Habibie','2006','THC MANDIRI','biografi','Biografi B.J Habibie','bj-habibie-detik-detik-yang-menentukan.pdf','2018-04-23 22:31:01','1',2),
(21,'Bencana Umat Islam Indonesia ','Ismail Shadiq','1989','Zahratif','sejarah','Sejarah Bencana Umat Islam Indonesia ','bencana-ummat-islam-indonesia-tahun-1980-2000.pdf','2018-04-23 22:58:15','0',10);

/*Table structure for table `ebooktrash` */

DROP TABLE IF EXISTS `ebooktrash`;

CREATE TABLE `ebooktrash` (
  `id` int(10) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `author` varchar(50) DEFAULT NULL,
  `year` varchar(4) DEFAULT '-',
  `publisher` varchar(50) DEFAULT '-',
  `category` varchar(20) DEFAULT NULL,
  `description` text,
  `filename` varchar(100) DEFAULT NULL,
  `uploadtime` datetime DEFAULT NULL,
  `approval` enum('0','1') DEFAULT NULL,
  `iduser` int(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `ebooktrash` */

insert  into `ebooktrash`(`id`,`title`,`author`,`year`,`publisher`,`category`,`description`,`filename`,`uploadtime`,`approval`,`iduser`) values 
(7,'Ranah 3 Warna','Ahmad Fuadi','2009','Gramedia','sastra','Alif baru saja tamat dari Pondok Madani. Dia bahkan sudah bisa bermimpi dalam bahasa Arab dan Inggris. Impiannya? Tinggi betul. Ingin belajar teknologi tinggi di Bandung seperti Habibie, lalu merantau sampai ke Amerika.\r\n\r\nRanah 3 Warna adalah hikayat bagaimana impian tetap wajib dibela habis-habisan walau hidup terus digelung nestapa. Tuhan bersama orang yang sabar.','RANAH 3 WARNA.pdf','2018-04-18 10:30:18','1',6);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` enum('user','admin') DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id`,`username`,`email`,`status`,`password`) values 
(1,'badrus','badrussholehsalim@gmail.com','admin','badrus'),
(2,'danaria','danaria@gmail.com','admin','danaria'),
(3,'anis','anis@yahoo.com','user','anis789'),
(4,'feldi','feldi200@gmail.com','user','feldi123'),
(5,'danar90','Danar@gmail.com','user','danaria'),
(6,'ahmad','ahamad@unida.ac.id','user','harmoni'),
(7,'hasbi','hasbi@gontor.com','user','hasbi'),
(8,'sholeh','sholeh','admin','sholeh'),
(9,'gulam','gulam@unida.com','admin','GULAM'),
(10,'user','user@user.co','user','user'),
(11,'ghost','ghost@ghost.com','admin','ghost'),
(12,'hisnu','hisnu@unida.gontor.ac.id','user','hisnu'),
(14,'tsubasa','tsubasa@jepang.ja','user','tsubasa');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
