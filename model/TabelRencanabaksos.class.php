<?php

// Kelas yang berisikan tabel dari rencana baksos
class TabelRencanabaksos extends DB
{
	function getRencanabaksos()
	{
		// Query mysql select data trencanabaksos
		$query = "SELECT * FROM trencanabaksos";
		
		// Mengeksekusi query
		$result = $this->execute($query);
		
		return $result;
	}

	function addRencanabaksos($data){
        //query
        $query = "INSERT INTO trencanabaksos (namabaksos, tanggalbaksos, deskripsibaksos, lokasibaksos, timpelaksana, telp)
        VALUES ( '{$data['namabaksos']}', '{$data['tanggalbaksos']}', '{$data['deskripsibaksos']}', '{$data['lokasibaksos']}', '{$data['timpelaksana']}')";

        //eksekusi query
        return $this->execute($query);
    }

	function deleteRencanabaksos($idbaksos){
        //query
        $query = "DELETE from trencanabaksos where idbaksos = '$idbaksos'";

        //eksekusi query
        return $this->execute($query);
    }

    function editRencanabaksos($idbaksos, $data){
    
        //query
        $query = "UPDATE trencanabaksos SET namabaksos = '{$data['namabaksos']}', tanggalbaksos = '{$data['tanggalbaksos']}', deskripsibaksos = '{$data['deskripsibaksos']}', lokasibaksos = '{$data['lokasibaksos']}', timpelaksana = '{$data['timpelaksana']}' WHERE idbaksos = '$idbaksos'";
    
        //eksekusi query
        return $this->execute($query);
    }

    function editTanggalDanTimpelaksana($idbaksos, $tanggalbaksos, $timpelaksana){
        // Query untuk update hanya tanggalbaksos dan timpelaksana
        $query = "UPDATE trencanabaksos SET tanggalbaksos = '{$tanggalbaksos}', timpelaksana = '{$timpelaksana}' WHERE idbaksos = '$idbaksos'";
        
        // Eksekusi query
        return $this->execute($query);
    }
    
    function getRencanabaksosById($idbaksos){
        //query untuk mengambil data berdasarkan ID
        $query = "SELECT * FROM trencanabaksos WHERE idbaksos = '$idbaksos'";
        
        // eksekusi query
        return $this->execute($query);
    }
}
