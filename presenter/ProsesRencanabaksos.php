<?php

include("KontrakPresenterRencanabaksos.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

class ProsesRencanabaksos implements KontrakPresenterRencanabaksos
{
	private $tabelrencanabaksos;
	private $data = [];

	function __construct()
	{
		// Konstruktor
		try {
			$db_host = "localhost"; // host 
			$db_user = "root"; // user
			$db_password = ""; // password
			$db_name = "dbbaksos"; // nama basis data
			$this->tabelrencanabaksos = new TabelRencanabaksos($db_host, $db_user, $db_password, $db_name); // instansi Tabelrencanabaksos
			$this->data = array(); // instansi list untuk data rencanabaksos
		} catch (Exception $e) {
			echo "yah error" . $e->getMessage();
		}
	}
	function prosesDataRencanabaksos()
	{
		try {
			echo "Starting prosesDataRencanabaksos()<br>";
			// mengambil data di tabel rencanabaksos
			$this->tabelrencanabaksos->open();
			$this->tabelrencanabaksos->getRencanabaksos();

			while ($row = $this->tabelrencanabaksos->getResult()) {
				// ambil hasil query
				$rencanabaksos = new Rencanabaksos(); // instansiasi objek rencanabaksos untuk setiap data rencanabaksos
				$rencanabaksos->setIdbaksos($row['idbaksos']); // mengisi idbaksos
				$rencanabaksos->setNamabaksos($row['namabaksos']); // mengisi namabaksos
				$rencanabaksos->setTanggalbaksos($row['tanggalbaksos']); // mengisi tanggalbaksos
				$rencanabaksos->setDeskripsibaksos($row['deskripsibaksos']); // mengisi deskripsibaksos
				$rencanabaksos->setLokasibaksos($row['lokasibaksos']); // mengisi lokasibaksos
				$rencanabaksos->setTimpelaksana($row['timpelaksana']); // mengisi timpelaksana
			
				$this->data[] = $rencanabaksos; // tambahkan data rencanabaksos ke dalam list
			}
			// Tutup koneksi
			$this->tabelrencanabaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 2" . $e->getMessage();
		}
	}

	function addRencanabaksos($postData){
		try{
			$this->tabelrencanabaksos->open();
			$this->tabelrencanabaksos->addRencanabaksos($postData);
			$this->tabelrencanabaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 3" . $e->getMessage();
		}
	}

	function deleteRencanabaksos($getID){
		try{
			$this->tabelrencanabaksos->open();
			$this->tabelrencanabaksos->deleteRencanabaksos($getID);
			$this->tabelrencanabaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 4" . $e->getMessage();
		}
	}

	function DataImplementasiRencanabaksos($getID){
		try{
			// mengambil data di tabel rencanabaksos
			$this->tabelrencanabaksos->open();
			$this->tabelrencanabaksos->getRencanabaksosById($getID);

			while ($row = $this->tabelrencanabaksos->getResult()) {
				// ambil hasil query
				$rencanabaksos = new rencanabaksos(); // instansiasi objek rencanabaksos untuk setiap data rencanabaksos
				$rencanabaksos->setIdbaksos($row['idbaksos']); // mengisi idbaksos
				$rencanabaksos->setNamabaksos($row['namabaksos']); // mengisi namabaksos
				$rencanabaksos->setTanggalbaksos($row['tanggalbaksos']); // mengisi tanggalbaksos
				$rencanabaksos->setDeskripsibaksos($row['deskripsibaksos']); // mengisi deskripsibaksos
				$rencanabaksos->setLokasibaksos($row['lokasibaksos']); // mengisi lokasibaksos
				$rencanabaksos->setTimpelaksana($row['timpelaksana']); // mengisi timpelaksana

				$this->data[] = $rencanabaksos; // tambahkan data rencanabaksos ke dalam list
			}
			// Tutup koneksi
			$this->tabelrencanabaksos->close();

			// return $rencanabaksos; // mengembalikan data rencanabaksos
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 5" . $e->getMessage();
		}
	}

	function editRencanabaksos($getID, $postData){
		try{
			$this->tabelrencanabaksos->open();
			$this->tabelrencanabaksos->editRencanabaksos($getID, $postData);
			$this->tabelrencanabaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 6" . $e->getMessage();
		}
	}

	function editTanggalDanTimpelaksana($getID, $postData){
		try{
			$this->tabelrencanabaksos->open();
			$this->tabelrencanabaksos->editTanggalDanTimpelaksana($getID, $postData);
			$this->tabelrencanabaksos->close();
		} catch (Exception $e) {
			// memproses error
			echo "yah error part 6" . $e->getMessage();
		}
	}

	function getIdbaksos($i)
	{
		// mengembalikan idbaksos rencanabaksos dengan indeks ke i
		return $this->data[$i]->idbaksos;
	}
	function getNamabaksos($i)
	{
		// mengembalikan namabaksos rencanabaksos dengan indeks ke i
		return $this->data[$i]->namabaksos;
	}
	function getTanggalbaksos($i)
	{
		// mengembalikan tanggalbaksos rencanabaksos dengan indeks ke i
		return $this->data[$i]->tanggalbaksos;
	}
	function getDeskripsibaksos($i)
	{
		// mengembalikan deskripsibaksos rencanabaksos dengan indeks ke i
		return $this->data[$i]->Deskripsibaksos;
	}
	function getLokasibaksos($i)
	{
		// mengembalikan lokasibaksos rencanabaksos dengan indeks ke i
		return $this->data[$i]->lokasibaksos;
	}
	function getTimpelaksana($i)
	{
		// mengembalikan Timpelaksana rencanabaksos dengan indeks ke i
		return $this->data[$i]->Timpelaksana;
	}
	function getSize()
	{
		return sizeof($this->data);
	}
}
