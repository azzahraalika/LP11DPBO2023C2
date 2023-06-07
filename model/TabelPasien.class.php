<?php

/******************************************
Asisten Pemrogaman 11
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}

	function add($data)
    {
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

        //lengkapi
        $query = "INSERT INTO pasien VALUES('', '$nik', '$nama', '$tempat', '$tl', '$gender', '$email', '$telp')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {
        //lengkapi
        $query = "DELETE FROM pasien WHERE id=$id";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function update($data)
    {
        $id = $data['id'];
        $nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];

        // lengkapi
        $query = "UPDATE pasien SET nik='$nik', nama='$nama', tempat='$tempat', tl='$tl', gender='$gender', email='$email', telp='$telp' WHERE id='$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function getPasienById($id)
    {
        // lengkapi
        $query = "SELECT * FROM pasien WHERE id=$id";
        
        // Mengeksekusi query
        return $this->execute($query);
    }
}
