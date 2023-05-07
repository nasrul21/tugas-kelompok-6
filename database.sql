-- db_si_nasrul.HakAkses definition

CREATE TABLE `HakAkses` (
  `IdAkses` int NOT NULL AUTO_INCREMENT,
  `NamaAkses` varchar(100) NOT NULL,
  `Keterangan` text,
  PRIMARY KEY (`IdAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- db_si_nasrul.Pengguna definition

CREATE TABLE `Pengguna` (
  `IdPengguna` int NOT NULL AUTO_INCREMENT,
  `NamaPengguna` varchar(100) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaDepan` varchar(50) NOT NULL,
  `NamaBelakang` varchar(50) DEFAULT NULL,
  `NoHp` varchar(20) NOT NULL,
  `Alamat` text,
  `IdAkses` int NOT NULL,
  PRIMARY KEY (`IdPengguna`),
  KEY `Pengguna_FK` (`IdAkses`),
  CONSTRAINT `Pengguna_FK` FOREIGN KEY (`IdAkses`) REFERENCES `HakAkses` (`IdAkses`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- db_si_nasrul.Penjualan definition

CREATE TABLE `Penjualan` (
  `IdPenjualan` int NOT NULL AUTO_INCREMENT,
  `JumlahPenjualan` int NOT NULL,
  `HargaJual` bigint NOT NULL,
  `IdPengguna` int NOT NULL,
  PRIMARY KEY (`IdPenjualan`),
  KEY `Penjualan_FK` (`IdPengguna`),
  CONSTRAINT `Penjualan_FK` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- db_si_nasrul.Barang definition

CREATE TABLE `Barang` (
  `IdBarang` int NOT NULL AUTO_INCREMENT,
  `NamaBarang` varchar(100) NOT NULL,
  `Keterangan` text,
  `Satuan` varchar(15) NOT NULL,
  `IdPengguna` int NOT NULL,
  PRIMARY KEY (`IdBarang`),
  KEY `Barang_FK` (`IdPengguna`),
  CONSTRAINT `Barang_FK` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- db_si_nasrul.Pembelian definition

CREATE TABLE `Pembelian` (
  `IdPembelian` int NOT NULL AUTO_INCREMENT,
  `JumlahPembelian` int NOT NULL,
  `HargaBeli` bigint NOT NULL,
  `IdPengguna` int NOT NULL,
  PRIMARY KEY (`IdPembelian`),
  KEY `Pembelian_FK` (`IdPengguna`),
  CONSTRAINT `Pembelian_FK` FOREIGN KEY (`IdPengguna`) REFERENCES `Pengguna` (`IdPengguna`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO db_si_nasrul.HakAkses (NamaAkses,Keterangan) VALUES
	 ('Admin','Admin Perusahaan'),
	 ('User','Pengguna Biasa');

INSERT INTO db_si_nasrul.Pengguna (NamaPengguna,Password,NamaDepan,NamaBelakang,NoHp,Alamat,IdAkses) VALUES
	 ('AnwarRuslan','Asjdfnriugn345$#','Anwar','Ruslan','6284675827365','Jl Hayam Wuruk Glodok Harco Bl C-1/59, Jakarta',1),
	 ('WatiSulaiman','Tsdfgsedrgd36#$','Wati','Sulaiman','6287463759283','Jl Cipinang Muara III 19, Dki Jakarta',1),
	 ('AdiRidwan','Erndskrognm44!','Adi','Riswan','6289573628574','Psr Tanah Abang 27, Dki Jakarta',1),
	 ('ArifJusuf','Hsdfilohmti96$!','Arif','Jusuf','6285647118853','Jl Imam Bonjol RT 003 83511',1),
	 ('AmirAgus','Hnsfdkghbsr27!','Amir','Agus','6286573887713','Jl Mangga Dua Raya Bl F-2/2, Dki Jakarta',1),
	 ('Batar Fatimah','Gvmasbrytk98#','Batar','Fatimah','6281256478374','Jl Rama Plaza Jati Makmur, Dki Jakarta',2),
	 ('AgusAminah','Cfgkrngsdrlr43$','Agus','Aminah','6281356738574','Jl Jend Gatot Subroto Kav 36, Dki Jakarta',2),
	 ('YusufAgus','Uhnaskrugnsd4%','Yusuf','Agus','6282166558845','Jl Mesjid Al Barkah, Dki Jakarta',2),
	 ('NurulLatifah','Vdruilmhtuer33!','Nurul','Latifah','6286748573645','Kawasan Niaga Citra Grand Blok R3 No. 11, Jatikarya, Bekasi',2),


INSERT INTO db_si_nasrul.Barang (NamaBarang,Keterangan,Satuan,IdPengguna) VALUES
	 ('Bolpen','Bolpen merk ABC','Buah',1),
	 ('Pulpen','Pulpen merk XYZ','Buah',2),
	 ('Penghapus','Penghapus merk PQR','Buah',3),
	 ('Buku Tulis','Buku tulis A4 100 halaman','Buah',4),
	 ('Pensil','Pensil 2B','Buah',5),
	 ('Kertas','Kertas HVS A4 70 gram','Buah',6),
	 ('Tipe-X','Tipe-X isi 10 gram','Buah',7),
	 ('Spidol','Spidol warna merah','Buah',8),
	 ('Kalkulator','Kalkulator Scientific','Buah',9),
	 ('Stabilo','Stabilo warna biru','Buah',10);

INSERT INTO db_si_nasrul.Pembelian (JumlahPembelian,HargaBeli,IdPengguna) VALUES
	 (10,5000,1),
	 (20,10000,2),
	 (20,2000,3),
	 (30,30000,4),
	 (50,15000,5),
	 (25,25000,6),
	 (40,40000,7),
	 (7,7000,8),
	 (20,12000,9),
	 (40,18000,10),
	 (8,8000,1),
	 (30,13000,2),
	 (22,22000,3),
	 (19,19000,4),
	 (6,6000,5),
	 (27,27000,6),
	 (35,35000,7),
	 (11,11000,8),
	 (16,16000,9),
	 (14,14000,10);

INSERT INTO db_si_nasrul.Penjualan (JumlahPenjualan,HargaJual,IdPengguna) VALUES
	 (10,5000,1),
	 (20,15000,2),
	 (5,3000,3),
	 (15,35000,4),
	 (25,20000,5),
	 (12,30000,6),
	 (3,50000,7),
	 (7,8000,8),
	 (18,15000,9),
	 (30,20000,10),
	 (5,10000,1),
	 (22,15000,2),
	 (25,25000,3),
	 (24,20000,4),
	 (6,7000,5),
	 (8,28000,6),
	 (19,36000,7),
	 (5,15000,8),
	 (14,18000,9),
	 (17,15000,10);
