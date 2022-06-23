<?php
	$id_contato = $_GET["id_contato"];

	$conn = mysqli_connect("localhost", "root", "", "agenda");

	if($conn){
		$sql = "DELETE FROM contatos WHERE id = $id_contato";
		if(mysqli_query($conn, $sql)){
			echo ("
				<script>
					alert('Contato excluido com sucesso');
					location.href = 'mostrar_agenda.php';
				</script>
			");
		}else{
			echo("erro");
		}

		mysqli_close($conn);
	}else{
		echo("falha na conexão:" .mysqli_connect_error());
	}


?>
