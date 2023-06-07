<?php

interface KontrakView{
	public function tampil();
    public function add($data);
    public function update($data);
    public function delete($data);
}
?>