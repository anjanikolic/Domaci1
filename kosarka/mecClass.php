<?php

class Mec
{

	private $db;

	public function __construct($db)
	{
		$this->db = $db;
	}

	public function unesiMec()
	{
		$data = array(
			'DomacinID' => trim($_POST['domacin']),
			'GostID' => trim($_POST['gost']),
			'PoeniDomacin' => trim($_POST['poenDom']),
			'PoenaGosti' => trim($_POST['poenGost'])
		);
/* 
		if (!isset($_POST['domacin']) || !isset($_POST['gost']) || !isset($_POST['poenDom']) || !isset($_POST['PoenGost'])) {
			return false;

		}
		if ($_POST['domacin'] == '' || $_POST['gost'] == '' || $_POST['poenDom'] == '' || $_POST['poenGost'] == '') {
			return false;
		} */

		

		$sacuvano = $this->db->insert('mec', $data);

	

		if ($sacuvano) {
			return true;

		} else {
			return false;
		}
	}

	public function izmeniNaziv()
	{
		if (!isset($_POST['tim']) || !isset($_POST['NazivTima'])) {
			$poruka = 'Greska 1';
			return false;

		}
		if ($_POST['tim'] == '' || $_POST['NazivTima'] == '') {
			$poruka = 'Greska 2';
			return false;

		}

		$data = array(
			trim($_POST['NazivTima']),
			trim($_POST['tim'])

		);
		$sacuvano = $this->db->rawQuery("UPDATE tim set NazivTima = ? where TimID = ?", $data);
		// upitnik se menja vrednostima koje php automatski vadi iz $data niza
		//prepare statement kao iz softvera 

		return true;

	}


}

?>
