<?php

include("KontrakPresenterBaksos.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesBaksos implements KontrakPresenterBaksos
{
	private $tabelbaksos;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "dbbaksos"; // nama basis data
			$this->tabelbaksos = new TabelBaksos($db_host, $db_user, $db_password, $db_name); // instansi Tabelbaksos
			$this->data = array(); // instansi list untuk data baksos
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}

	function prosesDataBaksos()
	{
		try {
			// mengambil data di tabel baksos
			$this->tabelbaksos->open();
			$this->tabelbaksos->getbaksos();

			while ($row = $this->tabelbaksos->getResult()) {
				// ambil hasil query
				$baksos = new Baksos(); // instansiasi objek baksos untuk setiap data baksos
				$baksos->setIdbaksos($row['idbaksos']); // mengisi idbaksos
				$baksos->setNamabaksos($row['namabaksos']); // mengisi namabaksos
				$baksos->setTanggalbaksos($row['tanggalbaksos']); // mengisi tanggalbaksos
				$baksos->setDeskripsibaksos($row['deskripsibaksos']); // mengisi deskripsibaksos
				$baksos->setLokasibaksos($row['lokasibaksos']); // mengisi lokasibaksos
				$baksos->setTimpelaksana($row['timpelaksana']); // mengisi timpelaksana
			
				$this->data[] = $baksos; // tambahkan data baksos ke dalam list
			}
			// Tutup koneksi
			$this->tabelbaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}

	function addBaksos($postData){
		try{
			$this->tabelbaksos->open();
			$this->tabelbaksos->addBaksos($postData);
			$this->tabelbaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 3" . $e->getMessage();
		}
	}

	function deleteBaksos($getID){
		try{
			$this->tabelbaksos->open();
			$this->tabelbaksos->deleteBaksos($getID);
			$this->tabelbaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 4" . $e->getMessage();
		}
	}

	function editTampilBaksos($getID){
		try{
			// mengambil data di tabel baksos
			$this->tabelbaksos->open();
			$this->tabelbaksos->getBaksosById($getID);

			while ($row = $this->tabelbaksos->getResult()) {
				// ambil hasil query
				$baksos = new baksos(); // instansiasi objek baksos untuk setiap data baksos
				$baksos->setIdbaksos($row['idbaksos']); // mengisi idbaksos
				$baksos->setNamabaksos($row['namabaksos']); // mengisi namabaksos
				$baksos->setTanggalbaksos($row['tanggalbaksos']); // mengisi tanggalbaksos
				$baksos->setDeskripsibaksos($row['deskripsibaksos']); // mengisi deskripsibaksos
				$baksos->setLokasibaksos($row['lokasibaksos']); // mengisi lokasibaksos
				$baksos->setTimpelaksana($row['timpelaksana']); // mengisi timpelaksana

				$this->data[] = $baksos; // tambahkan data baksos ke dalam list
			}
			// Tutup koneksi
			$this->tabelbaksos->close();

			// return $baksos; // mengembalikan data baksos
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 5" . $e->getMessage();
		}
	}

	function editBaksos($getID, $postData){
		try{
			$this->tabelbaksos->open();
			$this->tabelbaksos->editbaksos($getID, $postData);
			$this->tabelbaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 6" . $e->getMessage();
		}
	}

	function getIdbaksos($i)
	{
		// mengembalikan idbaksos baksos dengan indeks ke i
		return $this->data[$i]->idbaksos;
	}
	function getNamabaksos($i)
	{
		// mengembalikan namabaksos baksos dengan indeks ke i
		return $this->data[$i]->namabaksos;
	}
	function getTanggalbaksos($i)
	{
		// mengembalikan tanggalbaksos baksos dengan indeks ke i
		return $this->data[$i]->tanggalbaksos;
	}
	function getDeskripsibaksos($i)
	{
		// mengembalikan deskripsibaksos baksos dengan indeks ke i
		return $this->data[$i]->Deskripsibaksos;
	}
	function getLokasibaksos($i)
	{
		// mengembalikan lokasibaksos baksos dengan indeks ke i
		return $this->data[$i]->lokasibaksos;
	}
	function getTimpelaksana($i)
	{
		// mengembalikan Timpelaksana baksos dengan indeks ke i
		return $this->data[$i]->Timpelaksana;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
