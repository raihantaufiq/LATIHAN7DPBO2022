<?php 

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM tb_to_do";

		// Mengeksekusi query
		return $this->execute($query);
	}
	
	//tambah data ke database
	function addData(){
		$name = $_POST['tname'];
		$deadline = $_POST['tdeadline'];
		$details = $_POST['tdetails'];
		$subject = $_POST['tsubject'];
		$priority = $_POST['tpriority'];

		$query = "INSERT INTO tb_to_do (name_td, details_td, subject_td, priority_td, deadline_td, status_td)
				VALUES ('$name', '$details', '$subject', '$priority', '$deadline', 'Belum')";

		return $this->execute($query);
	}

	//hapus data berdasarkan id
	function deleteData($id){
		$query = "DELETE FROM tb_to_do WHERE id = $id";

		return $this->execute($query);
	}

	//ubah status data berdasarkan id
	function finishTask($id){
		$query = "UPDATE tb_to_do
				SET status_td='Sudah'
				WHERE id=$id";
		
		return $this->execute($query);
	}

	//ascending
	function ascendData($what){
		if($what == 'priority_td'){
			$query = "SELECT * FROM tb_to_do ORDER BY 
					CASE 
						WHEN priority_td = 'High' THEN '3'
						WHEN priority_td = 'Medium' THEN '2'
						WHEN priority_td = 'Low' THEN '1'
					END ASC";
		}else{
			$query = "SELECT * FROM tb_to_do
					ORDER BY $what ASC";
		}

		// Mengeksekusi query
		return $this->execute($query);
	}
}

?>