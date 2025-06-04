<?php

// Kelas yang menggambarkan detail sebuah baksos dengan atribut-atributnya
class Baksos
{
	var $idbaksos = '';
	var $namabaksos = '';
	var $tanggalbaksos = '';
	var $deskripsibaksos = '';
    var $lokasibaksos = '';
	var $timpelaksana = '';

	function __construct($idbaksos = '', $namabaksos = '', $tanggalbaksos = '', $deskripsibaksos = '', $lokasibaksos = '', $timpelaksana = '')
	{
		$this->idbaksos = $idbaksos;
		$this->namabaksos = $namabaksos;
		$this->tanggalbaksos = $tanggalbaksos;
		$this->deskripsi = $deskripsibaksos;
        $this->lokasibaksos = $lokasibaksos;
		$this->timpelaksana = $timpelaksana;
	}

	function setIdbaksos($idbaksos)
	{
		$this->idbaksos = $idbaksos;
	}
	function setNamabaksos($namabaksos)
	{
		$this->namabaksos = $namabaksos;
	}
	function setTanggalbaksos($tanggalbaksos)
	{
		$this->tanggalbaksos = $tanggalbaksos;
	}
	function setDeskripsibaksos($deskripsibaksos)
	{
		$this->deskripsibaksos = $deskripsibaksos;
	}
    function setLokasibaksos($lokasibaksos)
	{
		$this->lokasibaksos = $lokasibaksos;
	}
	function setTimpelaksana($timpelaksana){
		$this->timpelaksana = $timpelaksana;
	}

	function getIdbaksos()
	{
		return $this->idbaksos;
	}
	function getNamabaksos()
	{
		return $this->namabaksos;
	}
	function getTanggalbaksos()
	{
		return $this->tanggalbaksos;
	}
	function getDeskripsibaksos()
	{
		return $this->deskripsibaksos;
	}
    function getLokasibaksos()
	{
		return $this->lokasibaksos;
	}
	function getTimpelaksana(){
		return $this->timpelaksana;
	}
}
