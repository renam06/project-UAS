-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2021 at 02:10 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') NOT NULL,
  `email` varchar(30) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `foto_admin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `id_admin`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `no_tlp`, `foto_admin`) VALUES
('renam', 'A-2021INDMA8', 'Rena Muliani', 'Karawang', '2001-06-06', 'Perempuan', 'reeenamuliani@gmail.com', '085887422174', 'foto_profil.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `username` varchar(20) NOT NULL,
  `id_anggota` varchar(30) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') NOT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `foto_anggota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`username`, `id_anggota`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `email`, `no_tlp`, `foto_anggota`) VALUES
('acan15', 'A-2021SMAHW28', 'Anggi Nurul Fitriyani', 'Sukabumi', '2000-11-15', 'Perempuan', 'Mahasiswa', 'anggi.azahra87@gmail.com', '089693545252', 'foto_karin.jpg'),
('aldea12', 'A-2021HSAWM54', 'Aldea Ulilalbab', 'Karawang', '2021-08-08', 'Laki-laki', 'Mahasiswa', 'aldea@gmail.com', '089693545252', 'jung_sungchan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_penulis` int(10) NOT NULL,
  `id_penerbit` int(10) NOT NULL,
  `tahun_terbit` varchar(10) NOT NULL,
  `halaman` varchar(10) NOT NULL,
  `foto_buku` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL,
  `keterangan` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_kategori`, `judul`, `id_penulis`, `id_penerbit`, `tahun_terbit`, `halaman`, `foto_buku`, `stok`, `keterangan`) VALUES
(1, 1, 'Manusia Setengah Salmon', 1, 1, '2011', '264', 'manusia-setengah-salmon1.jpg', 10, 'Manusia Setengah Salmon adalah buku karya Raditya Dika keenam yang diterbitkan pada tahun 2011. Berkonsepkan cerita komedi yang ditulis berdasarkan kisah sang penulis seperti dalam buku-buku sebelumnya. Buku ini berisi 264 halaman.Sinopsis Singkat :Novel ini menceritakan tentang karakter dika yang harus beranjak dewasa, dimana dia harus melewati fase the grow up yang dimana sakit karena patah hati dan diibaratkan dengan pindah rumah, pindah rumah dan merapihkan kekacauan adalah hal yang dapa'),
(3, 2, 'METODOLOGI PENELITIAN KUANTITATIF KUALITATIF dan R&D', 3, 2, '2019', '464', 'Metode Penelitian Kuantitatif Kualitatif dan RD.jpg', 10, 'Buku ini memuat antara lain: \r\n1) metode penelitian kuantitatif dan kualitatif saat ini sudah dapat digabungkan penggunaannya dalam penelitian, sehingga metode tersebut  dinamakan metode kombinasi atau mixed methods.\r\n2) teknik perhitungan untuk menentukan jumlah anggota sampel dilakukan dengan memperhatikan sampling error dan confidence level; ada teknik perhitungan jumlah anggota sample dari populasi yang tidak di ketahui jumlahnya dan ada yang diketahui jumlahnya.\r\n3) dalam penelitian dan pengembangan, diketemukan bermacam-macan desain dan level dalam penelitian dan pengembangan.\r\n\r\nMetode kuantitatif yang berlandasan pada filsafat positivisme, cocok digunakan untuk penelitian yang bermaksud menggambarkan keadaan populasi yang luas berdasarkan data sampel, menguji teori yang udah ada, menguji pemikiran baru, \r\ndan menguji produk yang sudah ada atau produk baru hasil pengembangan atau penciptaan. Metode penelitian kualitatif yang berlandasan pada filsafat enterpretif cocok digunakan '),
(4, 2, 'Statistika Untuk Penelitian', 3, 2, '2017', '416', 'Statistika untuk penelitian.jpg', 10, 'Konsep dasar penelitian kuantitatif\r\nPeran statistik dalam penelitian kuantitatif\r\nStatistik deskriptif\r\nPopulasi dan sampel\r\nPengujian hipotesis deskriptif\r\nPengujian hipotesis komparatif dua sampel dan lebih dari dua sampel, dengan statistik parametris (t-test dan Anova) dan nonparametris (Chi Kuadrat, dll)\r\nPengujian hipotesis asosiatif dengan statistik parametris dan nonparametris (korelasi tunggal, ganda dan parsial)\r\nAnalisis regresi tunggal dan ganda\r\nPengujian hipotesis struktural, dengan analisis jalur (path analysis), dan SEM (Strukture Equation Model/Model Persamaan Struktural)\r\nStatistik untuk pengujian validitas dan reliabilitas instrumen penelitian'),
(5, 2, 'Algoritma dan Pemrograman dalam Bahasa Pascal dan C (Edisi Revisi)', 2, 3, '2011', '592', 'algoritma.jpg', 10, 'Buku Algoritma dan Pemrograman dalam Bahasa Pascal dan C merupakan penggabungan dari dua buah buku sebelumnya, yaitu Algoritma dan Pemrograman dalam Bahasa Pascal \r\ndan C (Buku 1) dan Algoritma dan Pemrograman dalam Bahasa Pascal dan C (Buku 2).\r\nMateri yang dibahas di dalam buku ini meliputi :\r\n- Konsep dasar algoritma\r\n- Tipe, Operator, dan Ekspresi\r\n- Struktur dasar pembangun algoritma : runtunan, pemilihan, pengulangan\r\n- Pemrograman modular : Fungsi dan prosedur\r\n- Larik (array)\r\n- Matriks\r\n- Algoritma Pencarian(Searching)\r\n- Algoritma pengurutan (Sorting)\r\n- Arsip beruntun (sequential file)\r\n- Algoritma rekursif'),
(6, 1, 'Tujuh Hari untuk Keshia', 4, 4, '2019', '450', 'tujuh hari untuk keshia.jpg', 8, 'Sejak mantan pacarnya tahu-tahu kembali dan membawa seorang anak perempuan bernama Keshia, Sadewa tahu hidupnya akan menjadi kacau. Benar saja, \r\nSadewa tidak pernah akur dengan Keshia. Mereka selalu bertengkar di rumah. Keduanya tidak pernah mempedulikan satu sama lain. Sampai suatu ketika \r\nsebuah kecelakaan mengubah segalanya. Sebuah kecelakaan yang membuat Sadewa mati-matian ingin memenuhi segala keinginan Keshia dan membuat Keshia \r\ningin tetap bersama ayahnya sekalipun dia sangat membenci laki-laki itu. Sebuah kecelakaan yang memberikan keduanya pemahaman bila mungkin hanya \r\nkehilangan yang membuat mereka bisa berjalan beriringan tanpa lagi ada kebencian.'),
(7, 1, 'Say Hi!', 4, 4, '2020', '517', 'say hi!.jpg', 10, 'Bagi Ribby, punya dua sohib ganteng itu musibah. Dia yang serba pas-pasan, ngerasa temenan sama Ervan dan Pandu yang berpredikat cowok popular \r\nsekolah jadi semacam ujian. Ervan si ganteng, Ribby si kumal. Pandu si keren, Ribby si dekil. Waktu masih kecil, Ribby emang nggak peduli dengan \r\nperbandingan itu. Tapi semenjak SMA, Ribby mulai capek dengan ejek-ejekan yang kadang kala membuatnya insecure. Pada fase-fase krisis percaya diri \r\nitulah Ribby mendadak membuat akun Say Hi! Itu, lho, aplikasi akun dating berbasis anonim yang sedang digandrungi remaja zaman sekarang. Di aplikasi Say Hi!, \r\nRibby berkenalan dengan cowok bernama Robbi. Awalnya sih, Ribby Cuma iseng. Namun, perlakuan Robbi yang lucu setiap kali mereka chatting-an, entah kenapa membuat \r\nRibby jatuh nyaman. Bahkan Ribby merasa Robbi jauh lebih mengerti Ribby daripada dua sahabatnya yang playboy mampus itu. Sementara itu, di sisi lain, salah satu di \r\nantara sahabatnya ada yang mengirim chat pada Ribby. Robbi: Maafin gu'),
(8, 1, 'Revered Back', 4, 4, '2015', '424', 'revered back.jpg', 10, 'Jana dan Dimi adalah bayangan dan benda. Tidak pernah terpisah, juga tak pernah bisa bersama. Dimi tak pernah mau menganggap Jana ada. Selalu menolak hingga Jana \r\nmenjadi gelap mata.\r\nJana lalu rela melakukan segalanya agar selalu terlihat di mata Dimi. Termasuk menyingkirkan Gwen---perempuan yang disukai Dimi.\r\nKetika akhirnya Jana tahu Dimi tak akan pernah memilihnya, Cakra hadir.\r\nHidup yang sama kelam, luka yang sama dalam, membuat Cakra menjadi orang yang paling mengerti Jana.\r\nDan Cakra juga yang membuat Jana sadar ... sebenarnya, siapakah dia selama ini?'),
(9, 3, 'Pangan dan Gizi untuk Kesehatan', 7, 5, '2004', '209', 'BUKU_PANGAN_DAN_GIZI.jpg', 10, 'Daftar Isi:\r\nBerisi tentang, dari janin sampai manula, gizi dan penyakit degeneratif, pola makan sehat, kemanan pangan dan gizi.');

-- --------------------------------------------------------

--
-- Table structure for table `favorite`
--

CREATE TABLE `favorite` (
  `id_favorite` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Pendidikan'),
(3, 'Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_buku` int(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `username`, `id_buku`, `tanggal_pinjam`, `tanggal_kembali`, `id_admin`) VALUES
(12, 'acan15', 6, '2021-06-06', '2021-06-09', 'A-2021INDMA8');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `lokasi_penerbit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `lokasi_penerbit`) VALUES
(1, 'Gagas Media', 'Jakarta Selatan'),
(2, 'Alfabeta', 'Bandung'),
(3, 'Informatika', 'Bandung'),
(4, 'Elex Media Komputindo', 'Jakarta Pusat'),
(5, 'Rajawali Sport', 'Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_kembali` int(10) NOT NULL,
  `id_pinjam` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `telat` int(10) DEFAULT NULL,
  `denda` int(10) DEFAULT NULL,
  `id_admin` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_kembali`, `id_pinjam`, `username`, `tanggal_kembali`, `telat`, `denda`, `id_admin`) VALUES
(7, 12, 'acan15', '2021-06-09', 1, 5000, 'A-2021INDMA8');

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE `penulis` (
  `id_penulis` int(11) NOT NULL,
  `nama_penulis` varchar(50) NOT NULL,
  `foto_penulis` varchar(100) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id_penulis`, `nama_penulis`, `foto_penulis`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`) VALUES
(1, 'Raditya Dika', 'raditya-dika.jpg', 'Jakarta', '1984-12-28', 'Penulis, Komedian, Sutradara, Aktor'),
(2, 'Dr. Ir. Rinaldi Munir, MT.', 'rinaldi-munir.jpg', 'Padang', '1965-12-10', 'Dosen Teknik Informatika ITB'),
(3, 'Prof. Dr. H. Sugiyono, M. Pd.', 'Prof. Dr. Sugiyono.jpg', 'Klaten', '1953-12-14', 'Dosen Universitas Negeri Yogyakarta'),
(4, 'Inggrid Sonya', 'inggrid-sonya.jpg', 'Jakarta', '1997-06-17', 'Editor'),
(7, 'Prof. Dr. Ir. Ali Khomsan, MS.', 'prof dr ir ali khomsan.jpg', 'Ambarawa', '1960-02-02', 'Guru Besar di IPB');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `username` varchar(20) NOT NULL,
  `id_petugas` varchar(20) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Perempuan','Laki-laki') NOT NULL,
  `email` varchar(20) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `foto_petugas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`username`, `id_petugas`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `email`, `no_tlp`, `foto_petugas`) VALUES
('karianah12', 'A-2021SGPTA65', 'Karianah', 'Bogor', '2001-05-05', 'Perempuan', 'karianah@gmail.com', '089764531087', 'foto_karin.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_confirm` varchar(100) NOT NULL,
  `level` enum('pengguna','admin','petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `no_tlp`, `password`, `password_confirm`, `level`) VALUES
(1, 'Rena Muliani', 'reeenamuliani@gmail.com', 'renam', '085887422174', '0232c05d68ad5c10bf7c928af4d6f7dd8e2b1738', '0232c05d68ad5c10bf7c928af4d6f7dd8e2b1738', 'admin'),
(2, 'Anggi Nurul Fitriyani', 'anggi.azahra87@gmail.com', 'acan15', '089693545252', '167b3a2abef17a8f73c6f94e4d13cb06715cde5e', '167b3a2abef17a8f73c6f94e4d13cb06715cde5e', 'pengguna'),
(3, 'Karianah', 'karianah@gmail.com', 'karianah12', '089764531087', '6bf11a02b312ee82aa105300366dbc9192070e11', '6bf11a02b312ee82aa105300366dbc9192070e11', 'petugas'),
(4, 'Aldea Ulilalbab', 'aldea@gmail.com', 'aldea12', '089693545252', 'fa567e703372de79e37b14fa1b9beafe6a0dd075', 'fa567e703372de79e37b14fa1b9beafe6a0dd075', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_penulis` (`id_penulis`);

--
-- Indexes for table `favorite`
--
ALTER TABLE `favorite`
  ADD PRIMARY KEY (`id_favorite`),
  ADD KEY `id_buku` (`id_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_kembali`),
  ADD KEY `id_admin` (`id_admin`),
  ADD KEY `id_pinjam` (`id_pinjam`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id_penulis`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `favorite`
--
ALTER TABLE `favorite`
  MODIFY `id_favorite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_kembali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id_penulis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id_penerbit`),
  ADD CONSTRAINT `buku_ibfk_3` FOREIGN KEY (`id_penulis`) REFERENCES `penulis` (`id_penulis`);

--
-- Constraints for table `favorite`
--
ALTER TABLE `favorite`
  ADD CONSTRAINT `favorite_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_pinjam`) REFERENCES `peminjaman` (`id_pinjam`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
