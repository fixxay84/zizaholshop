-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Sep 2020 pada 08.47
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zizaholshop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama_depan` varchar(128) NOT NULL,
  `nama_belakang` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(1) NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `nama_depan`, `nama_belakang`, `email`, `alamat`, `telp`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(46, 'Test', 'Member', 'mohammad.asad0884@gmail.com', '', '', 'default.jpg', '$2y$10$G2k3ySZ4JSHzhFYHcyNcGea6lvXZ3CYGNuhU6img0VpDa49j1v6jy', 1, 1, 1599640485);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama_product` varchar(128) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `gambar_product` varchar(128) NOT NULL,
  `harga` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `modified_by` varchar(128) NOT NULL,
  `last_modified` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `nama_product`, `id_kategori`, `gambar_product`, `harga`, `weight`, `stock`, `deskripsi`, `modified_by`, `last_modified`) VALUES
(64, 'NBR0006', 1, 'GM_49_COKLAT_SUSU_(17).jpg', 415000, 900, 5, 'Berat : 900 gram\r\n\r\nBAHAN VALENCIA\r\nadalah bahan yang tebal, dan adem.\r\n\r\nDetail:\r\n– saku depan ziper besi\r\n– tali sisi\r\n– lengan manset & kancing \r\n\r\nBAHAN HIJAB RUBY CREPE\r\nadalah bahan yang bersifat lentur, tidak kaku, dan tetap nyaman saat bersentuhan dengan kulit.\r\n\r\n\r\nsize 90 x 125 cm.\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:38:18'),
(66, 'NBR0001', 1, '7854-COVER-GM-22-TOSCA.jpeg', 315000, 400, 0, 'Berat : 400 gram\r\n\r\nMaterial maxmara\r\nSaku samping kanan dalam.\r\nLebar bawah umbrella 160 ( kel 320)\r\n\r\nKancing depan Busui Friendly\r\nTangan manset\r\nMotif  batik  tradisional modern\r\n\r\nTersedia dalam dua pilihan warna : Tosca dan Biru.\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:38:25'),
(67, 'NBR0058', 1, 'AG_44_DUSTY_PINK_(18).jpg', 267000, 670, 16, 'Berat : 670 gram\r\n\r\n-BAHAN SERAT KAYU KAOS MIX KATUN JEPANG MOTIF-\r\n*Bahan serat kayu adalah bahan yang lembut, bertextur garis seperti kayu, polyester.\r\n*Bahan katun jepang adalah bahan yang lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.\r\n\r\ndetail : \r\n– busui friendly\r\n– lengan manset & kancing \r\n– saku kanan\r\n– tali samping \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:40:52'),
(68, 'NBR0009', 1, 'AG_43_2_(1).jpg', 267000, 640, 20, 'Berat : 640 gram\r\n\r\n-BAHAN SERAT KAYU KAOS MIX PRINT- \r\nadalah bahan yang lembut, bertextur garis seperti kayu,& polyester.\r\n\r\n\r\nDetail baju: \r\n– busui friendly\r\n– lengan manset & kancing \r\n– saku depan \r\n– tali samping\"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:40:56'),
(69, 'NBR0030', 1, 'NB_A10_CHOCOLATE.jpg', 268000, 520, 51, 'Berat : 520 gram\r\n\r\nBAHAN PERSIVA MIX ANGELINA\r\nPersiva adalah PE, halus, lembut, tebal, two tone color, berserat garis\r\nAngelina adalah PE, halus, lembut, tebal (Spt NB A04)\r\n\r\nDetail : \r\n- Busui friendly \r\n- Lengan manset & kancing\r\n- saku kanan \r\n- variasi pintuck        \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:00'),
(70, 'NBR0056', 1, 'Gamis_Dewasa_NBC09.jpg', 268000, 420, 1, 'Berat : 420 gram\r\n\r\nBAHAN IMA PLATINUM: kain dari keluarga katun yang memiliki ciri berupa tekstur kotak-kotak kecil pada permukaan kainnya. Karakteristik kainnya adalah ringan, namun tidak terlalu jatuh.\r\n\r\n\r\ndetail : \r\n- busui friendly\r\n- lengan manset & kancing\r\n- saku & tali depan \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:04'),
(71, 'NBR0040', 1, 'NS_46_NAVY_A.jpeg', 258000, 470, 0, 'Berat : 470 gram\r\n\r\n-Bahan Balotelli motif-\r\n\r\n*Bahan balotelli adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\nDetail Baju: \r\n- Busui Friendly\r\n- Lengan manset & kancing\r\n- saku kanan\r\n- tali samping \r\n\"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:08'),
(72, 'NBR0041', 1, 'NS_47_PINK.jpeg', 258000, 420, 10, 'Berat : 420 gram\r\n\r\nBAHAN BALOTELLI MOTIF MIX POLOS\r\nadalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\nDetail Baju: \r\n- busui friendly\r\n- saku kanan \r\n- lengan manset kancing\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:11'),
(73, 'NBR0044', 1, 'NS_48_HITAM_(8).jpg', 268000, 430, 5, 'Berat : 430 gram\r\n\r\nBahan : Balotelli kotak mix polos\r\nBahan balotelli adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\nDetail :\r\n- Busui Friendly\r\n- Lengan Manset & Kancing\r\n- Saku kanan\r\n- Tali samping\r\n- Lebar bawah 110 Cm\"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:16'),
(74, 'NBR0005', 1, 'GM_43_BLUE_(20).jpg', 415000, 730, 19, 'Berat : 730 gram\r\n\r\nBAHAN GAMIS & HIJAB ADALAH LEMON SKIN.\r\n(Lemon skin:\r\nPolyester, tebal, halus, tekstur nya berbintik)\r\nDetail : \r\n- Busui friendly\r\n- Lengan manset dan kancing\r\n- Saku kanan \r\n- Tali samping\r\n- Variasi list\r\n\r\nSize hijab:\r\nPanjang depan 90cm\r\nPanjang belakang 125cm\r\n\r\n(SET GAMIS + HIJAB).\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:19'),
(75, 'NBR0004', 1, 'GM_38_GREY_(3).jpg', 395000, 620, 4, 'Berat : 620 gram\r\n\r\nBahan Gamis dan Hijab MAXMARA \r\nMaxmara adalah bahan yang halus, lembut, mengkilap, dan lemas.\r\n\r\nDetail : \r\n- Busui friendly\r\n- Lengan manset & kancing \r\n- Saku kanan \r\n- Tali samping \r\n\r\n\r\nsize hijab : 90 x 120 cm.\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:23'),
(76, 'NBR0003', 3, 'NA_31_BIRU_(20).jpg', 178000, 220, 3, 'Berat : 220 gram\r\n\r\nBahan Supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem, & polyester.\r\n\r\nDetail :\r\n- Busui Friendly\r\n- Saku Depan\r\n- Lengan Manset & kancing.\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:26'),
(77, 'NBR0008', 1, 'AG_41_NAVY_(1)_(1).jpg', 255000, 450, 13, 'Berat : 450 gram\r\n\r\n-Bahan combed 20 S mix supernova kotak-\r\nadalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.\r\n\r\ndetail : \r\n- Busui friendly\r\n- Saku kanan\"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:30'),
(78, 'NBR0007', 1, 'AG_40_ABU.jpeg', 255000, 470, 12, 'Berat : 470 gram\r\n\r\nBahan combed 20s mix katun abstrak\r\nadalah bahan yang halus, lembut,& adem.\r\n\r\nDetail baju: \r\n- busui friendly\r\n- saku kanan .\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:33'),
(79, 'TNK0010', 3, 'NA_36_NAVY_(5).jpg', 188000, 230, 0, 'Berat : 230 gram\r\n\r\nBahan Cassanova Mix Angelina\r\nadalah bahan yang bertextur lembut, lemes, berserat garis, tebal, halus, &polyester;.\r\n\r\n\r\nDetail:\r\n-Kerah Kemeja\r\n-Variasi Pintuck\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:39'),
(80, 'TNK0009', 3, 'NA_35_ABU_(14).jpg', 188000, 270, 14, 'Berat : 270 gram\r\n\r\nBahan Angelina\r\nadalah bahan yang tebal, halus, lembut, dan polyester.\r\n\r\nDetail:\r\n-Variasi Pintuck\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:43'),
(81, 'TNK0008', 3, 'NA_32_HITAM_1.jpeg', 188000, 320, 0, 'Berat : 320 gram\r\n\r\nBahan Almond Mix Print Polkadot.\r\n*Bahan almond adalah bahan yang halus, lemes, seratnya garis, polyester. dipadukan dengan kain print pola polkadot\r\n\r\nDetail : \r\n- Busui Friendly\r\n- Lengan Manset & Kancing\r\n- Kerah kemeja\r\n- Saku depan\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:47'),
(82, 'TNK0007', 3, 'NA_29_HITAM_A.jpeg', 188000, 230, 26, 'Berat : 230 gram\r\n\r\nBAHAN IMA PLATINUM adalah kain dari keluarga katun yang memiliki ciri berupa tekstur kotak-kotak kecil pada permukaan kainnya. Karakteristik kainnya adalah ringan, namun tidak terlalu jatuh.\r\n\r\n\r\nDetail baju : \r\n- full kancing \r\n- saku depan \r\n- lengan manset & kancing \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:50'),
(83, 'TNK0006', 3, 'NA_28_NAVY_A.jpeg', 178000, 330, 0, 'Berat : 330 gram\r\n\r\nBAHAN OXFORD\r\nadalah two tone colour, halus, lembut, tebal, &PE;.\r\n*PE adalah polyester. Bahan dari serat buatan atau campuran.\r\n\r\nDetail : \r\n- full kancing\r\n- saku depan\r\n- lengan manset & kancing \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:54'),
(84, 'TNK0005', 3, 'NA_18_BIRU_EMERALD_TWICE_PAD_NAVY_1.jpg', 198000, 250, 8, 'Berat : 250 gram\r\n\r\nTunik motif kotak kotak\r\nMaterial cotton yandet (lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.)\r\n\r\nDetail baju:\r\n-Kancing depan busui friendly\r\n-Lengan manset kancing\r\n-Saku kanan kiri dalam\r\n-Variasi skolder atas saku\r\n-Baju belah kanan kiri\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:41:58'),
(86, 'NBR0028', 1, 'NB_A05_ABU_(21).jpg', 278000, 410, 21, 'Berat : 410 gram\r\n\r\nKatun jepang adalah bahan yang lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.\r\nKain aurora adalah bahan yang tebal, bertekstur seperti crepe, doff, lembut, PE.\r\n\r\nDetail : \r\n- Busui friendly\r\n- Saku depan \r\n- Lengan manset & kancing\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:01'),
(87, 'NBR0027', 1, 'NB_A03_HITAM_A.jpeg', 278000, 370, 0, 'Berat : 370 gram\r\n\r\nKatun jepang : lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.\r\nKain rami : bersifat sejuk, menyerap keringat dan nyaman ketika digunakan pada daerah-daerah dengan iklim yang panas. \r\n\r\nDetail :\r\n-Busui friendly\r\n-saku depan\r\n-Lengan Rib\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:05'),
(88, 'NBR0002', 1, 'AG_48_MAROON_(19).jpg', 247000, 492, 11, 'Berat : 492 gram\r\n\r\nBahan Combed 20s Mix Katun Jepang\r\n\r\nBahan Combed 20s\r\n*kainnya nyaman, lembut, dan tidak mudah sobek.\r\n\r\nBahan Katun jepang\r\n*kainnya lebih halus, lebih tebal, warna lebih awet, &serat; tidak terurai.\r\n\r\nDetail:\r\n-Busui Friendly\r\n-Lengan Karet\r\n-Variasi Saku Skoder \r\n-Variasi List.\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:08'),
(89, 'NBR0010', 1, 'AG_47_PEACH_(3).jpg', 257000, 470, 0, 'Berat : 470 gram\r\n\r\nBAHAN Combed 20s mix katun jepang\r\nadalah bahan yang lebih tebal, lebih halus, warna lebih awet, stretch, & serat tidak terurai.\r\n\r\nDetail:\r\n-Busui Friendly\r\n-Saku Depan\r\n-Lengan Manset & Kancing\"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:12'),
(90, 'NBR0017', 1, 'NS_44_MAROON_(11).jpg', 248000, 400, 2, 'Berat : 400 gram\r\n\r\n-Bahan balotelli motif-\r\n\r\nBahan balotelli adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\n\r\nDetail Baju:\r\n- busui friendly\r\n- saku kanan \r\n- tali samping\r\n- lengan manset kancing \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:15'),
(91, 'NBR0018', 1, 'NS_44_NAVY_(19).jpg', 248000, 400, 3, 'Berat : 400 gram\r\n\r\n-Bahan balotelli motif-\r\n\r\nBahan balotelli adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\n\r\nDetail Baju:\r\n- busui friendly\r\n- saku kanan \r\n- tali samping\r\n- lengan manset kancing \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:26'),
(92, 'NBR0019', 1, 'NS_41_MAROON_(16).jpg', 258000, 450, 17, 'Berat : 450 gram\r\n\r\nBahan balotelli motif\r\nadalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\nDetail baju:\r\n- busui friendly\r\n- lengan manset\r\n- kancing saku kanan \r\n- tali samping\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:30'),
(93, 'NBR0020', 1, 'NS_41_NAVY_(15).jpg', 258000, 450, 10, 'Berat : 450 gram\r\n\r\nBahan balotelli motif\r\nadalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\nDetail baju:\r\n- busui friendly\r\n- lengan manset\r\n- kancing saku kanan \r\n- tali samping\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:33'),
(96, 'TNK0004', 3, 'NA_34_ABU_(12).jpg', 198000, 210, 5, 'Berat : 210 gram\r\n\r\nPolly Yarn Dyed \r\nmix Serat Kayu\r\nadalah bahan yang halus, adem, lembut, bertextur garis seperti kayu, & polyester.\r\n\r\nDetail:\r\n-Busui Friendly\r\n-Saku Depan\r\n-Lengan Manset & Kancing\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:36'),
(97, 'TNK0003', 3, 'NA_33_HITAM_(12).jpg', 208000, 320, 1, 'Berat : 320 gram\r\n\r\nBahan : Toyobo Mix Ventura Salur\r\n\r\nKarakteristik bahan:\r\n- Bahan toyobo: seperti katun, halus, tebal, adem, & tidak mudah kusut.\r\n- Ventura salur: polyester, bertekstur lembut, bermotif salur.\r\n\r\n\r\nDetail :\r\n- Kancing & Saku Depan\r\n- Lengan Manset & Kancing\r\n- Variasi List\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:39'),
(98, 'TNK0002', 3, 'NA_24_COKLAT_SUSU_(10).jpg', 178000, 250, 12, 'Berat : 250 gram\r\n\r\nBahan Balotelly\r\ndetail : bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\nDetail baju:\r\n- Busui Friendly\r\n- Variasi Pita\r\n- Lengan Berbentuk Terompet\r\n- Full Frill\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:43'),
(100, 'NBR0025', 1, 'NBC_01_HITAM_P_(1).jpeg', 268000, 400, 19, 'Berat : 400 gram\r\n\r\nBahan TOYOBO \r\nadalah bahan dengan serat twiill garukan finishing miring\r\n\r\n- busui friendly\r\n- saku depan\r\n- variasi list & kancing \r\n- lengan manset & kancing \r\nkhusus kancing depan dari atas sampai ke bawah variasi, hanya kancing paling bawah saja yang hidup \"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:46'),
(101, 'NBR0026', 1, 'NB_173_KUNING.jpeg', 238000, 450, 9, 'Berat : 450 gram\r\n\r\nBahan back saten polos adalah bahan yang halus dan lembut.\r\n\r\nDetail baju:\r\n- busui friendly \r\n- lengan manset kacing\r\n- saku kanan \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:50'),
(103, 'NBR0032', 1, 'NS_39_MERAH_(5).jpg', 248000, 450, 0, 'Berat : 450 gram\r\n\r\nBahan wallpeach motif \r\nmix ballotelli \r\n\r\n*Bahan Wallpeach memiliki beberapa karakteristik seperti berikut ini:\r\n-Mempunyai serat yang rapat dan halus.\r\n-Bahan kainnya tebal namun ringan.\r\n-Bahan wolfis tidak panas sehingga nyaman saat dikenakan.\r\n-Kain tidak mudah kusut.\r\n-Kain tidak transparan & tidak licin.\r\n\r\n*Bahan balotelli adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\n\r\nDetail baju:\r\n- busui friendly\r\n- lengan manset kancing\r\n- saku kanan \r\n- tali samping \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:53'),
(104, 'NBR0033', 1, 'NS_40_PINK_(9).jpg', 248000, 450, 6, 'Berat : 450 gram\r\n\r\nBahan Ballotelli\r\nadalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\r\n\r\nDetail baju:\r\n- busui friendly\r\n- lengan manset kancing\r\n- tali samping\r\n- saku kanan\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:42:56'),
(105, 'NBR0034', 1, 'GM_41_BROWN1.jpeg', 395000, 670, 13, 'Berat : 670 gram\r\n\r\nBAHAN GAMIS SABATO :\r\nBertextur lembut, bahan nya jatuh, hampir mirip spt maxmara, & adem.\r\n\r\nBAHAN HIJAB MOSSCREPE :\r\nBertextur bintik-bintik, lembut, tidak kaku, & polyester.\r\nSize Hijab 90 x 125 CM\r\n\r\nDetail : \r\n- Busui friendly\r\n- Saku kanan \r\n- Tali samping\r\n- Lengan manset & kancing\r\n\r\n(SET GAMIS + HIJAB)\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:43:00'),
(106, 'TNK0001', 3, 'ITU_003_MAROON_(10).jpg', 172000, 290, 12, 'Berat : 290 gram\r\n\r\nBahan balotelly adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.\"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'ASAD', '2020-09-18 06:43:03'),
(109, 'NBR0031', 1, 'NBc_11_ABU_SILVER_(2).jpg', 278000, 510, 7, 'Berat : 510 gram\r\n\r\nBAHAN LINEN IMPORT: sejuk, menyerap keringat dan nyaman ketika digunakan pada daerah-daerah dengan iklim yang panas.\r\n\r\nDetail :\r\n- busui friendly\r\n- lengan manset & kancing\r\n- saku depan\r\n- variasi benang nilon\"\r\n              ', 'ASAD', '2020-09-18 06:43:07'),
(110, 'NBR0035', 1, 'NBC_07_ABU_MUDA_A.jpeg', 278000, 470, 19, 'Berat : 470 gram\r\n\r\nBAHAN LINEN IMPORT\r\nKarakteristik :\r\n- Polyester\r\n- halus\r\n- lembut\r\n- berserat\r\n\r\ndetail :\r\n- Busui Friendly\r\n- tali depan\r\n- saku depan\"\r\n              ', 'ASAD', '2020-09-18 06:43:10'),
(111, 'CP0001', 4, 'ANAK_KERUDUNG_TWO_TONE_(19).jpg', 40000, 50, 39, 'Berat : 50 gram\r\n\r\nBahan Rajut adalah bahan yang tidak mudah kusut, halus dan lembut', 'ASAD', '2020-09-18 06:43:13'),
(112, 'OTR0001', 5, 'IO_HITAM_001_(5).jpg', 162000, 310, 20, 'Berat : 310 gram\r\n\r\nBahan serat kayu adalah bahan yang lembut, bertextur garis seperti kayu, &polyester;.', 'ASAD', '2020-09-18 06:43:17'),
(113, 'TNK0011', 3, 'ITU_001_BIRU_MUDA_(1).jpg', 152000, 270, 30, 'Berat : 270 gram\r\n\r\nTR Salur 20s\r\nadalah polyester rayon.\r\nBahannya terasa halus, lembut, tebal, dan tidak muda lecek.', 'ASAD', '2020-09-18 06:43:20'),
(114, 'TNK0012', 3, 'ITU_001_HITAM_(6).jpg', 152000, 270, 34, 'Berat : 270 gram\r\n\r\nTR Salur 20s\r\nadalah polyester rayon.\r\nBahannya terasa halus, lembut, tebal, dan tidak muda lecek.', 'ASAD', '2020-09-18 06:43:24'),
(115, 'TNK0013', 3, 'ITU_003_BROKEN_WHITE_(3).jpg', 162000, 290, 20, 'Berat : 290 gram\r\n\r\nBahan balotelly adalah bahan kain yang cukup tebal dengan tekstur khas berupa kotak kecil yang membentuk garis-garis. Kain ini halus dan tidak menerawang.', 'ASAD', '2020-09-18 06:43:27'),
(116, 'TNK0014', 3, 'ITU_002_NAVY_(6).jpg', 152000, 270, 44, 'Berat : 270 gram\r\n\r\nBahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.', 'ASAD', '2020-09-18 06:43:30'),
(117, 'NBR0021', 1, 'GM_50_BLUE_(48).jpg', 405000, 880, 3, 'Berat : 880 gram\r\n\r\nBAHAN GAMIS KATUN FANCY\r\nadalah bahan yang halus, lembut,& adem.\r\n\r\nDetail :\r\n- saku depan\r\n- lengan manset & kancing\r\n- tali sisi\r\n\r\nBAHAN HIJAB moscrepe Streetch\r\nadalah bahan yang bertextur bintik-bintik, lembut, tidak kaku, &polyester;.\r\n\r\n- size 100 x 125 cm', 'ASAD', '2020-09-18 06:43:34'),
(118, 'NBR0022', 1, 'GM_54_BABY_PINK_(4).jpg', 415000, 756, 20, 'Berat : 756 gram\r\n\r\nBahan Serat Kayu Jati\r\nadalah bahan yang lembut, bertextur garis seperti kayu, polyester.\r\n\r\nDetail:\r\n-Busui Friendly\r\n-Lengan Manset & Kancing\r\n-Variasi Skoder Bagian Bawah\r\n-Tali Samping', 'ASAD', '2020-09-18 06:43:37'),
(119, 'HJB0001', 7, 'MICA_NAVY_(1).jpg', 110000, 220, 23, 'Berat : 220 gram\r\n\r\nBAHAN KASIBO MOTIF POLKADOT\r\nadalah bahan yang halus, lembut, dan PE.\r\n\r\nSize 73cm x 90cm', 'ASAD', '2020-09-18 06:43:40'),
(120, 'HJB0002', 7, 'MICA_PEACH_(1).jpg', 110000, 220, 38, 'Berat : 220 gram\r\n\r\nBAHAN KASIBO MOTIF POLKADOT\r\nadalah bahan yang halus, lembut, dan PE.\r\n\r\nSize 73cm x 90cm', 'ASAD', '2020-09-18 06:43:43'),
(121, 'KKO0001', 6, '3536-G-IMG-20170202-WA0068-1.jpg', 228000, 270, 45, 'Berat : 270 gram\r\n\r\nFANTASY SHIRT WITH EMBROIDERY (DOBBY COTTON VERTICAL STRIPE)', 'ASAD', '2020-09-18 06:43:47'),
(122, 'KKO0002', 6, '3536-COVER-IMG-20170202-WA0071-2.jpg', 228000, 270, 45, 'Berat : 270 gram\r\n\r\nFANTASY SHIRT WITH EMBROIDERY (DOBBY COTTON VERTICAL STRIPE)', 'ASAD', '2020-09-18 06:43:57'),
(123, 'HJB0003', 7, 'ORCHID_KLIM_NAVY_(16).jpg', 120000, 220, 52, 'Berat : 220 gram\r\n\r\nBahan Satin Velvet Motif\r\nmerupakan bahan yang halus dan lembut.\r\n\r\nSize 140 x 140 cm', 'ASAD', '2020-09-18 06:44:00'),
(124, 'HJB0004', 7, 'ORCHID_KLIM_PINK_(3).jpg', 120000, 220, 48, 'Berat : 220 gram\r\n\r\nBahan Satin Velvet Motif\r\nmerupakan bahan yang halus dan lembut.\r\n\r\nSize 140 x 140 cm', 'ASAD', '2020-09-18 06:44:03'),
(125, 'HJB0005', 7, 'KENANGA_KLIM_BIRU_(17).jpg', 110000, 100, 27, 'Berat : 100 gram\r\n\r\nBahan voal motif\r\nadalah bahan yang cukup halus, lembut, dan lemas.\r\n\r\nSize 115 x 115cm', 'ASAD', '2020-09-18 06:44:07'),
(126, 'HJB0006', 7, 'KENANGA_KLIM_MAROON_(9).jpg', 110000, 100, 36, 'Berat : 100 gram\r\n\r\nBahan voal motif\r\nadalah bahan yang cukup halus, lembut, dan lemas.\r\n\r\nSize 115 x 115cm', 'ASAD', '2020-09-18 06:44:11'),
(127, 'HJB0007', 7, 'JASMINE_KLIM_HIJAU_(14).jpg', 125000, 220, 16, 'Berat : 220 gram\r\n\r\nJASMINE KLIM\r\nBahan :\r\n- Dramasilk Motif\r\n\r\nKarakteristik :\r\n- Bertextur lembut, hampir mirip spt satin / maxmara, tdk mudah kusut & tdk licin\r\n\r\nSize : 140 X 140 Cm', 'ASAD', '2020-09-18 06:44:14'),
(128, 'HJB0012', 7, 'FLANELLA_KLIM_COKLAT_(5).jpg', 100000, 130, 21, 'Berat : 130 gram\r\n\r\nBAHAN SILKY MOTIF\r\nadalah bahan yang agak mengkilap, halus, dan lembut.\r\n\r\nSIZE 110 X 110 CM\"\r\n              ', 'ASAD', '2020-09-18 06:44:18'),
(129, 'HJB0008', 7, 'EDELWEIS_KLIM_BIRU_(1).jpg', 105000, 110, 7, 'Berat : 110 gram\r\n\r\nBAHAN VOAL MOTIF\r\nadalah bahan yang cukup halus, lembut, dan lemes.\r\n\r\nSIZE 115 X 115 CM', 'ASAD', '2020-09-18 06:44:23'),
(130, 'HJB0009', 7, 'EDELWEIS_KLIM_HITAM_(4).jpg', 110000, 110, 5, 'Berat : 110 gram\r\n\r\nBAHAN VOAL MOTIF\r\nadalah bahan yang cukup halus, lembut, dan lemes.\r\n\r\nSIZE 115 X 115 CM', 'ASAD', '2020-09-18 06:44:28'),
(131, 'HJB0010', 7, 'EDELWEIS_KLIM_UNGU_(5).jpg', 110000, 110, 1, 'Berat : 110 gram\r\n\r\nBAHAN VOAL MOTIF\r\nadalah bahan yang cukup halus, lembut, dan lemes.\r\n\r\nSIZE 115 X 115 CM', 'ASAD', '2020-09-18 06:44:31'),
(132, 'HJB0011', 7, 'CRYSAN_KLIM_HIJAU_TUA_(8).jpg', 110000, 220, 27, 'Berat : 220 gram\r\n\r\nCrysan Klim\r\nBahan Saten Velvet\r\nadalah bahan yang halus dan lembut.\r\n\r\nUkuran 140cm x 140cm', 'ASAD', '2020-09-18 06:44:35'),
(133, 'KKO0003', 6, 'WhatsApp_Image_2019-09-19_at_11_34__27_(1)_.jpeg', 228000, 230, 19, 'Berat : 230 gram\r\n\r\nKatun Print\r\nadalah bahan Polyester, tebal, bertextur motif, adem, hampir sama dengan katun jepang.\r\n\r\nDetail:\r\n-Saku Tempel\r\n-Full Kancing', 'ASAD', '2020-09-18 06:44:38'),
(134, 'KKO0004', 6, 'WhatsApp_Image_2019-09-19_at_11_34__22_.jpeg', 228000, 250, 16, 'Berat : 250 gram\r\n\r\nKATUN PRINT\r\nadalah Polyester, bahannya tebal, bertextur motif, adem, hampir sama dengan katun jepang.\r\n\r\nDetail:\r\n-saku depan', 'ASAD', '2020-09-18 06:44:41'),
(135, 'KKO0005', 6, 'WhatsApp_Image_2019-09-19_at_11_34__19_.jpeg', 228000, 250, 12, 'Berat : 250 gram\r\n\r\nKATUN PRINT\r\nadalah Polyester, bahannya tebal, bertextur motif, adem, hampir sama dengan katun jepang.\r\n\r\nDetail:\r\n-saku depan', 'ASAD', '2020-09-18 06:44:44'),
(136, 'KKO0006', 6, 'NK_45_BIRU_(19).jpg', 228000, 220, 4, 'Berat : 220 gram\r\n\r\nKATUN PRINT KOTAK\r\nadalah bahan polyester, tebal, bertextur motif, adem, hampir sama dengan katun jepang.\r\n\r\nDetail:\r\n-Saku Depan\r\n-Full Kancing', 'ASAD', '2020-09-18 06:44:47'),
(137, 'KKO0007', 6, 'NK_43_MAROON_(7).jpg', 228000, 220, 4, 'Berat : 220 gram\r\n\r\nBAHAN COTTON PRINT\r\nadalah bahan Polyester, tebal, bertextur motif, adem, hampir sama dengan katun jepang.\r\n\r\nDetail:\r\n-Full kancing\r\n-Saku depan\r\n-Variasi List', 'ASAD', '2020-09-18 06:44:50'),
(138, 'KKO0008', 6, 'NK_39_BLACK_(3).jpg', 228000, 250, 10, 'Berat : 250 gram\r\n\r\nBahan Monalisa Motif\r\nadalah Polyester, tebal, halus, lembut. bermotif bintik - bintik.\r\n\r\n\r\nDetail baju:\r\n-Full kancing\r\n-Saku depan\r\n-Lengan manset & Kancing', 'ASAD', '2020-09-18 06:44:54'),
(139, 'KKO0009', 6, '1840-G-NK-13-GOLD-FILEminimizer.jpg', 220000, 250, 27, 'Berat : 250 gram\r\n\r\nDOBBY SLUB BLUE WITH SHORT SLEEVE\r\n\r\nDOBBY SLUB BROWN WITH SHORT SLEEVE\r\n=====\r\n\r\nDobby adalah bahan yang halus, tebal, lembut, bertekstur garis, dan PE.', 'ASAD', '2020-09-18 06:44:57'),
(140, 'MKN0001', 2, 'NM_07_CREAM_(14).jpg', 375000, 620, 50, 'Berat : 620 gram\r\n\r\nBahan Katun Jepang\r\nadalah lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.\r\n\r\nDetail:\r\n-Variasi List\r\n-Panjang Depan 112cm\r\n-Panjang Belakang 125cm\r\n-Panjang Rok 120cm\r\n-Lebar Bawah 75cm', 'ASAD', '2020-09-18 06:45:00'),
(141, 'MKN0002', 2, 'NM_07_LAVENDER_(4).jpg', 375000, 620, 33, 'Berat : 620 gram\r\n\r\nBahan Katun Jepang\r\nadalah lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.\r\n\r\nDetail:\r\n-Variasi List\r\n-Panjang Depan 112cm\r\n-Panjang Belakang 125cm\r\n-Panjang Rok 120cm\r\n-Lebar Bawah 75cm', 'ASAD', '2020-09-18 06:45:03'),
(142, 'MKN0003', 2, 'NM_07_MAROON_(13).jpg', 375000, 620, 53, 'Berat : 620 gram\r\n\r\nBahan Katun Jepang\r\nadalah lebih tebal, lebih halus, warna lebih awet, & serat tidak terurai.\r\n\r\nDetail:\r\n-Variasi List\r\n-Panjang Depan 112cm\r\n-Panjang Belakang 125cm\r\n-Panjang Rok 120cm\r\n-Lebar Bawah 75cm', 'ASAD', '2020-09-18 06:45:07'),
(143, 'MKN0004', 2, 'NM_09_HITAM_(12).jpg', 275000, 670, 26, 'Berat : 670 gram\r\n\r\nBahan Rayon adalah bahan yang halus dan lembut.\r\n\r\nDetail:\r\n-Variasi Renda\r\n-Panjang Depan 115cm\r\n-Panjang Belakang 130cm\r\n-Panjang Rok 120cm\r\n-Lebar Rok 78cm', 'ASAD', '2020-09-18 06:45:10'),
(144, 'MKN0005', 2, 'NM_06_BIRU_A.jpeg', 330000, 650, 26, 'Berat : 650 gram\r\n\r\nbahan atasan dan rok : supernova motif.\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.', 'ASAD', '2020-09-18 06:45:14'),
(145, 'MKN0006', 2, 'NM_06_HITAM_A.jpeg', 330000, 650, 11, 'Berat : 650 gram\r\n\r\nbahan atasan dan rok : supernova motif.\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.', 'ASAD', '2020-09-18 06:45:17'),
(146, 'MKN0007', 2, 'NM_06_UNGU_A.jpeg', 330000, 650, 24, 'Berat : 650 gram\r\n\r\nbahan atasan dan rok : supernova motif.\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.', 'ASAD', '2020-09-18 06:45:20'),
(147, 'MKN0008', 2, 'NM_05_PUTIH_(2).jpg', 305000, 700, 10, 'Berat : 700 gram\r\n\r\n-Bahan Rayon mix Renda-\r\n\r\nbahan rayon adalah bahan yang lembut.', 'ASAD', '2020-09-18 06:45:42'),
(148, 'TNK0015', 3, '1405-G-NTU-02-SALEM-A-FILEminimizer.jpg', 198000, 350, 18, 'Berat : 350 gram\r\n\r\nTunik polos model cardigan\r\nMaterial cotton minyak : halus, lembut, adem, & lebih mengkilap.\r\n\r\ndetail baju:\r\n-Kancing depan busui friendly\r\n-Saku kanan kiri luar atas bawah\r\n-Variasi tali serut di.pinggang', 'ASAD', '2020-09-18 06:45:46'),
(149, 'TNK0016', 3, '1424-G-NTU-03-TOSCA-B-FILEminimizer.jpg', 198000, 250, 24, 'Berat : 250 gram\r\n\r\nTunik polos model.cardigan\r\nMaterial cotton minyak tokai (halus, lembut, adem, & lebih mengkilap.)\r\n\r\n\r\nDetail baju:\r\n-Kancing depan busui friendly\r\n-Saku kanan kiri luar\r\n-Variasi two skolder di depan\r\n-Lengan A', 'ASAD', '2020-09-18 06:45:48'),
(150, 'TNK0017', 3, '1424-G-NTU-03-BATA-A-FILEminimizer.jpg', 198000, 250, 23, 'Berat : 250 gram\r\n\r\nTunik polos model.cardigan\r\nMaterial cotton minyak tokai (halus, lembut, adem, & lebih mengkilap.)\r\n\r\n\r\nDetail baju:\r\n-Kancing depan busui friendly\r\n-Saku kanan kiri luar\r\n-Variasi two skolder di depan\r\n-Lengan A', 'ASAD', '2020-09-18 06:45:52'),
(151, 'ROK0001', 8, '5475-G-NRC-07-ABU-MUDA-B-FILEminimizer.jpg', 160000, 400, 5, 'Berat : 400 gram\r\n\r\nBahan: Supernova Standar.\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.', 'ASAD', '2020-09-18 06:45:55'),
(152, 'ROK0002', 8, '5392-G-NRC-03-HIJAU-TOSCA-A-FILEminimizer.jpg', 170000, 400, 7, 'Berat : 400 gram\r\n\r\nTWILL MODEL KULOT DENGAN TUTUP DEPAN SAJA\r\n=====\r\n\r\nBahan Twill adalah bahan yang lembut, halus,& tebal.', 'ASAD', '2020-09-18 06:45:58'),
(153, 'ROK0003', 8, '5392-G-NRC-03-PINK-B-FILEminimizer.jpg', 170000, 400, 10, 'Berat : 400 gram\r\n\r\nTWILL MODEL KULOT DENGAN TUTUP DEPAN SAJA\r\n=====\r\n\r\nBahan Twill adalah bahan yang lembut, halus,& tebal.', 'ASAD', '2020-09-18 06:46:01'),
(154, 'ROK0004', 8, '5392-G-NRC-03-SALEM-B-FILEminimizer.jpg', 170000, 400, 6, 'Berat : 400 gram\r\n\r\nTWILL MODEL KULOT DENGAN TUTUP DEPAN SAJA\r\n=====\r\n\r\nBahan Twill adalah bahan yang lembut, halus,& tebal.', 'ASAD', '2020-09-18 06:46:04'),
(155, 'ROK0005', 8, '5181-COVER-NRC-06-ABU-MUDA-A-FILEminimizer.jpg', 175000, 420, 8, 'Berat : 420 gram\r\n\r\n-SUPERNOVA VARIASI SLETING DEPAN-\r\n=====\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.\r\n\r\nDetail:\r\n-pinggang karet belakang\r\n-zipper depar\r\n-lingkar kaki berkaret', 'ASAD', '2020-09-18 06:46:08'),
(156, 'ROK0006', 8, '5181-G-NRC-06-ABU-TUA-B-FILEminimizer.jpg', 175000, 420, 5, 'Berat : 420 gram\r\n\r\n-SUPERNOVA VARIASI SLETING DEPAN-\r\n=====\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.\r\n\r\nDetail:\r\n-pinggang karet belakang\r\n-zipper depar\r\n-lingkar kaki berkaret', 'ASAD', '2020-09-18 06:46:11'),
(157, 'ROK0007', 8, '5181-G-NRC-06-COKLAT-KOPI-B-FILEminimizer.jpg', 175000, 420, 25, 'Berat : 420 gram\r\n\r\n-SUPERNOVA VARIASI SLETING DEPAN-\r\n=====\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.\r\n\r\nDetail:\r\n-pinggang karet belakang\r\n-zipper depar\r\n-lingkar kaki berkaret\"\r\n              ', 'ASAD', '2020-09-18 06:46:14'),
(158, 'ROK0008', 8, 'NRC_06_CREAM_A.jpeg', 175000, 420, 15, 'Berat : 420 gram\r\n\r\n-SUPERNOVA VARIASI SLETING DEPAN-\r\n=====\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.\r\n\r\nDetail:\r\n-pinggang karet belakang\r\n-zipper depar\r\n-lingkar kaki berkaret', 'ASAD', '2020-09-18 06:46:17'),
(159, 'ROK0009', 8, '5181-G-NRC-06-MAROON-B-FILEminimizer.jpg', 175000, 420, 15, 'Berat : 420 gram\r\n\r\n-SUPERNOVA VARIASI SLETING DEPAN-\r\n=====\r\n\r\n*Bahan supernova adalah jenis katun yang memiliki feel kain yang halus, lembut, adem & polyester.\r\n\r\nDetail:\r\n-pinggang karet belakang\r\n-zipper depar\r\n-lingkar kaki berkaret', 'ASAD', '2020-09-18 06:46:20'),
(160, 'ROK0010', 8, '4865-G-NRC-04-BIRU-TOSCA-B-FILEminimizer.jpg', 190000, 400, 8, 'Berat : 400 gram\r\n\r\nCIGARET STANDAR (TIDAK BANYAK KANTONG)\r\n=====\r\n\r\n\r\nBahan Cigaret adalah bahan yang tebal, PE,& halus.', 'ASAD', '2020-09-18 06:46:23'),
(161, 'ROK0011', 8, '4865-G-NRC-04-UNGU-TUA-A-FILEminimizer.jpg', 180000, 400, 9, 'Berat : 400 gram\r\n\r\nCIGARET STANDAR (TIDAK BANYAK KANTONG)\r\n=====\r\n\r\n\r\nBahan Cigaret adalah bahan yang tebal, PE,& halus.', 'ASAD', '2020-09-18 06:46:27'),
(162, 'ROK0012', 8, '2512-G-NRC-01-COKLAT-A-FILEminimizer.jpg', 220000, 450, 5, 'Berat : 450 gram\r\n\r\nBAHAN CIGARET DENGAN BANYAK KANTONG\r\n=====\r\n\r\nBahan Cigaret adalah bahan yang tebal, PE,& halus.', 'ASAD', '2020-09-18 06:46:30'),
(163, 'ROK0013', 8, 'NR_09_COKLAT_A.jpeg', 180000, 370, 24, 'Berat : 370 gram\r\n\r\n-BAHAN SERAT KAYU-\r\nadalah bahan yang lembut, bertextur garis seperti kayu, polyester.\r\n\r\n\r\n\r\nDetail Rok :\r\n- pinggang full karet & tali\"\r\n              ', 'TEST', '2020-09-18 04:00:10'),
(164, 'ROK0014', 8, 'NR_08_ABU_A.jpeg', 180000, 370, 10, 'Berat : 370 gram\r\n\r\n-BAHAN OXFORD-\r\nadalah two tone colour, halus, tebal, lembut, dan PE.\r\n\r\nDetail :\r\n- pinggang berkaret & bertali\r\n- saku kanan & kiri\r\n- variasi kancing\"\r\n              ', 'TEST', '2020-09-18 04:09:02'),
(165, 'ROK0015', 8, 'NR_08_NAVY_(15).jpg', 180000, 370, 4, 'Berat : 370 gram\r\n\r\n-BAHAN OXFORD-\r\nadalah two tone colour, halus, tebal, lembut, dan PE.\r\n\r\nDetail :\r\n- pinggang berkaret & bertali\r\n- saku kanan & kiri\r\n- variasi kancing', 'ASAD', '2020-09-18 06:46:35'),
(166, 'NBR0029', 1, 'NB_A11_BLACK_(9).jpg', 253000, 520, 62, 'Berat : 520 gram\r\n\r\nBAHAN AURORA adalah bahan yang halus, lembut, PE, tebal, bertekstur bintik-bintik (seperti crepe).\r\n\r\nDetail :\r\n- Busui friendly\r\n- Lengan manset & kancing\r\n- Saku kanan\r\n- Rompi tempel', 'ASAD', '2020-09-18 06:46:38'),
(167, 'NBR0023', 1, 'NB_A11_WHITE_(7).jpg', 253000, 520, 60, 'Berat : 520 gram\r\n\r\nBAHAN AURORA adalah bahan yang halus, lembut, PE, tebal, bertekstur bintik-bintik (seperti crepe).\r\n\r\nDetail :\r\n- Busui friendly\r\n- Lengan manset & kancing\r\n- Saku kanan\r\n- Rompi tempel\"\r\n              ', 'TEST', '2020-09-18 04:00:03'),
(168, 'NBR0024', 1, 'NB_200_BIRU_(22).jpg', 253000, 410, 82, 'Berat : 410 gram\r\n\r\nBAHAN INTRA RAMI RAYON\r\nMIX PRINT\r\nkarakteristik : Polyester, bertextur lembut& berserat garis\r\nDetail :\r\n- Busui friendly\r\n- Saku kanan\r\n- Lengan manset & kancing\"\r\n              ', 'TEST', '2020-09-18 03:59:56'),
(169, 'NBR0036', 1, 'NB_200_ABU_(18).jpg', 253000, 410, 53, 'Berat : 410 gram\r\n\r\nBAHAN INTRA RAMI RAYON\r\nMIX PRINT\r\nkarakteristik : Polyester, bertextur lembut& berserat garis\r\nDetail :\r\n- Busui friendly\r\n- Saku kanan\r\n- Lengan manset & kancing\"\r\n              ', 'TEST', '2020-09-18 03:59:47'),
(170, 'NBR0037', 1, 'NB_200_COKLAT_(21).jpg', 253000, 410, 37, 'Berat : 410 gram\r\n\r\nBAHAN INTRA RAMI RAYON\r\nMIX PRINT\r\nkarakteristik : Polyester, bertextur lembut& berserat garis\r\nDetail :\r\n- Busui friendly\r\n- Saku kanan\r\n- Lengan manset & kancing\"\r\n              \"\r\n              ', 'TEST', '2020-09-18 03:59:38'),
(171, 'NBR0038', 1, 'NB_200_PINK_(11).jpg', 253000, 900, 7, 'Berat : 410 gram\r\n\r\nBAHAN INTRA RAMI RAYON\r\nMIX PRINT\r\nkarakteristik : Polyester, bertextur lembut& berserat garis\r\nDetail :\r\n- Busui friendly\r\n- Saku kanan\r\n- Lengan manset & kancing\"\r\n              ', 'TEST', '2020-09-11 08:47:15'),
(172, 'TNK0018', 3, 'AA_41_ABU_TUA_(3).jpg', 195000, 360, 25, 'Berat : 360 gram\r\n\r\nCombed 20s\r\nadalah bahan yang terbuat dari serat alami dan tidak membuat alergi. serta tidak mudah kisut apabila dicuci. adem dan halus.\r\n\r\nDetail:\r\n-Busui Friendly\r\n-Variasi List\"\r\n              \"\r\n              ', 'TEST', '2020-09-11 08:48:28'),
(173, 'TNK0019', 3, 'AA_41_NAVY_(11).jpg', 195000, 360, 19, 'Berat : 360 gram\r\n\r\nCombed 20s\r\nadalah bahan yang terbuat dari serat alami dan tidak membuat alergi. serta tidak mudah kisut apabila dicuci. adem dan halus.\r\n\r\nDetail:\r\n-Busui Friendly\r\n-Variasi List\"\r\n              \"\r\n              ', 'TEST', '2020-09-16 08:21:11'),
(174, 'TNK0020', 3, 'WhatsApp_Image_2019-09-14_at_13_30__46_.jpeg', 158000, 200, 25, 'Berat : 200 gram\r\n\r\nBahan Rayon\r\nmemiliki feel yang lembut ketika bersentuhan dengan kulit.\r\n\r\nDetail:\r\n-Resleting Belakang\r\n-Lengan Manset & Kancing\r\n-Variasi Opnaisel & Kancing\"\r\n              \"\r\n              \"\r\n              \"\r\n              \"\r\n              ', 'TEST', '2020-09-16 08:21:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `total` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `transaction_status` varchar(128) NOT NULL,
  `resi` varchar(128) NOT NULL,
  `ekspedisi` varchar(128) NOT NULL,
  `service_ekspedisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `order_id`, `email`, `total`, `time`, `transaction_status`, `resi`, `ekspedisi`, `service_ekspedisi`) VALUES
(92, 9600698, 'mohammad.asad0884@gmail.com', 414000, '2020-09-16 08:44:29', 'pending', '-', 'jne', 'REG');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `kategori`) VALUES
(1, 'gamis'),
(2, 'mukena'),
(3, 'tunik'),
(4, 'ciput'),
(5, 'outer'),
(6, 'koko'),
(7, 'hijab'),
(8, 'rok');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(10, 'test', 'mohammad.asad0884@gmail.com', 'default.jpg', '$2y$10$LFbTpjV.J2GoucDljZalkOcO8IvHJdBmZc8xAjVOg/oz5eZyvCDxy', 2, 1, 1599808538);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT untuk tabel `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
