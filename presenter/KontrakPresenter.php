<?php

interface KontrakPresenter
{
	public function prosesDataPasien();
    public function add($data);
    public function update($data);
    public function delete($data);
	public function getId($i);
	public function getNik($i);
	public function getNama($i);
	public function getTempat($i);
	public function getTl($i);
	public function getGender($i);
	public function getEmail($i);
	public function getTelp($i);
	public function getSize();
}

?>