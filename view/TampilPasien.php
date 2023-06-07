<?php


include("KontrakView.php");
include("presenter/ProsesPasien.php");

class TampilPasien implements KontrakView
{
	private $prosespasien; //presenter yang dapat berinteraksi langsung dengan view
	private $tpl;

	function __construct()
	{
		//konstruktor
		$this->prosespasien = new ProsesPasien();
	}

	function tampil()
	{
		$this->prosespasien->prosesDataPasien();
		$data = null;

		//semua terkait tampilan adalah tanggung jawab view
		for ($i = 0; $i < $this->prosespasien->getSize(); $i++) {
			$no = $i + 1;
			$data .= "<tr>
			<td>" . $no . "</td>
			<td>" . $this->prosespasien->getNik($i) . "</td>
			<td>" . $this->prosespasien->getNama($i) . "</td>
			<td>" . $this->prosespasien->getTempat($i) . "</td>
			<td>" . $this->prosespasien->getTl($i) . "</td>
			<td>" . $this->prosespasien->getGender($i) . "</td>
			<td>" . $this->prosespasien->getEmail($i) . "</td>
			<td>" . $this->prosespasien->getTelp($i) . "</td>
			<td>
				<a class='btn btn-success' href='index.php?id_edit=" . $this->prosespasien->getId($i) . "'>Edit</a>
				<a class='btn btn-danger' href='index.php?id_hapus=" . $this->prosespasien->getId($i) . "'>Delete</a>
			</td>
			
			";
		}
		// Membaca template skin.html
		$this->tpl = new Template("templates/skin.html");

		// Mengganti kode Data_Tabel dengan data yang sudah diproses
		$this->tpl->replace("DATA_TABEL", $data);

		// Menampilkan ke layar
		$this->tpl->write();
	}

	function add($data){
		$this->prosespasien->add($data);
		
		header("location:index.php");
	  }
	
	  function update($data){
		$this->prosespasien->update($data);
		
		header("location:index.php");
	  }
	
	  function delete($data){
		$this->prosespasien->delete($data);
		
		header("location:index.php");
	  }	

	public function formAdd(){
		$this->tpl = new Template("templates/skinform.html");
		$this->tpl->replace("submit", 'add');
		$this->tpl->replace("DATA_TITLE", 'Add New');
		$this->tpl->write();
	}

	public function formUpdate($data){
		$this->prosespasien->prosesDataPasienById($data);

		$this->tpl = new Template("templates/skinform.html");
		$this->tpl->replace("DATA_ID", $this->prosespasien->getId(0));
		$this->tpl->replace("DATA_NIK", $this->prosespasien->getNik(0));
        $this->tpl->replace("DATA_NAMA", $this->prosespasien->getNama(0));
        $this->tpl->replace("DATA_TEMPAT", $this->prosespasien->getTempat(0));
        $this->tpl->replace("DATA_TL", $this->prosespasien->getTl(0));
		$this->tpl->replace("DATA_GENDER", $this->prosespasien->getGender(0));
        $this->tpl->replace("DATA_EMAIL", $this->prosespasien->getEmail(0));
        $this->tpl->replace("DATA_TELP", $this->prosespasien->getTelp(0));
		$this->tpl->replace("submit", 'update');
		$this->tpl->replace("DATA_TITLE", 'Edit');
		$this->tpl->write();
	}	
}
