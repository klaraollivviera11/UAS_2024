<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Rencanabaksos.class.php");
include("model/TabelRencanabaksos.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenterRencanabaksos
{
	public function prosesDataRencanabaksos();
	public function addRencanabaksos($postData);
	public function deleteRencanabaksos($getID);
	public function DataImplementasiRencanabaksos($getID);
	public function editRencanabaksos($getID, $postData);
	public function editTanggalDanTimpelaksana($getID, $postData);
	public function getIdbaksos($i);
	public function getNamabaksos($i);
	public function getTanggalbaksos($i);
	public function getDeskripsibaksos($i);
	public function getLokasibaksos($i);
	public function getTimpelaksana($i);
}