<!DOCTYPE html>
<html>
<head>
	<title>Upload de Arquivos</title>
</head>
<body>
	<h1>Upload de Arquivos</h1>
	<form action="upload_evidencia.php" method="post" enctype="multipart/form-data">
		<label for="usuario">Usuário:</label>
		<input type="text" name="usuario" id="usuario"><br><br>

		<label for="resposta">Resposta:</label>
		<input type="text" name="resposta" id="resposta"><br><br>

		<label for="arquivo">Selecione o arquivo:</label>
		<input type="file" name="arquivo" id="arquivo"><br><br>

		<input type="submit" name="submit" value="Enviar">
	</form>

	<a href="dashboard.php">arquivos</a>
</body>
</html>