<?php

include("model/Template.class.php");
include("model/DB.class.php");
include("model/Baksos.class.php");
include("model/TabelBaksos.class.php");

/******************************************
 Asisten Pemrogaman 13 & 14
******************************************/

// Interface atau gambaran dari presenter akan seperti apa
interface KontrakPresenterBaksos
{
	public function prosesDataBaksos();
    public function addBaksos($postData);
    public function deleteBaksos($getID);
    public function editTampilBaksos($getID);
    public function editBaksos($getID, $postData);
	public function getIdbaksos($i);
	public function getNamabaksos($i);
	public function getTanggalbaksos($i);
	public function getDeskripsibaksos($i);
	public function getLokasibaksos($i);
	public function getTimpelaksana();
}