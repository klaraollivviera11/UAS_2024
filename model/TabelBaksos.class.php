<?php

// Kelas yang berisikan tabel dari baksos
class TabelBaksos extends DB
{
	function getBaksos()
	{
		// Query mysql select data tbaksos
		$query = "SELECT * FROM tbaksos";
		
		// Mengeksekusi query
		return $this->execute($query);
	}

	function addBaksos($data){
        //query
        $query = "INSERT INTO tbaksos (namabaksos, tanggalbaksos, deskripsibaksos, lokasibaksos, timpelaksana, telp)
        VALUES ( '{$data['namabaksos']}', '{$data['tanggalbaksos']}', '{$data['deskripsibaksos']}', '{$data['lokasibaksos']}', '{$data['timpelaksana']}')";

        //eksekusi query
        return $this->execute($query);
    }

	function deleteBaksos($idbaksos){
        //query
        $query = "DELETE from tbaksos where idbaksos = '$idbaksos'";

        //eksekusi query
        return $this->execute($query);
    }

	function editBaksos($idbaksos, $data){
    
        //query
        $query = "UPDATE tbaksos SET namabaksos = '{$data['namabaksos']}', tanggalbaksos = '{$data['tanggalbaksos']}', deskripsibaksos = '{$data['deskripsibaksos']}', lokasibaksos = '{$data['lokasibaksos']}', timpelaksana = '{$data['timpelaksana']}' WHERE idbaksos = '$idbaksos'";
    
        //eksekusi query
        return $this->execute($query);
    }
    
    function getBaksosById($idbaksos){
        //query untuk mengambil data berdasarkan ID
        $query = "SELECT * FROM tbaksos WHERE idbaksos = '$idbaksos'";
        
        // eksekusi query
        return $this->execute($query);
    }
}
