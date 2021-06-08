<!DOCTYPE html>
<html>
	<head>
		<title>
		</title>
	</head>

	<body>
				<!-- create bedrijf -->
		<form action = "create_Bedrijf.php" method = "POST">
			<p><b> create bedrijf </b></p>
			<p><input type="text" name="Naam_bedrijf"> Naam_bedrijf</p>
            <p><input type="text" name="GebruikersNaam"> GebruikersNaam</p>
            <p><input type="text" name="Password"> Password</p>

            <p><input type="submit" value="submit" name="submit"></p>
		</form>
				<!-- delete bedrijf -->
		<form action = "delete_Bedrijf.php" method = "POST">
			<p><b> delete bedrijf </b></p>
			<p><input type="text" name="bedrijf_id"> bedrijf_id</p>

            <p><input type="submit" value="submit" name="submit"></p>

		</form>
				<!-- update bedrijf -->
		<form action = "update_Bedrijf.php" method = "POST">
			<p><b> update bedrijf </b></p>
			<p><input type="text" name="bedrijf_id"> bedrijf_id</p>
			<p><input type="text" name="Naam_bedrijf"> Naam_bedrijf</p>
            <p><input type="text" name="GebruikersNaam"> GebruikersNaam</p>
            <p><input type="text" name="Password"> Password</p>

            <p><input type="submit" value="submit" name="submit"></p>

		</form>
				<!-- read bedrijf -->
		<form action = "read_Bedrijf.php" method = "POST">
			<p><b> read bedrijf tabel </b></p>

			<p><input type="submit" value="submit" name="submit"></p>

		</form>
				<!-- single read bedrijf -->
		<form action = "single_read_Bedrijf.php" method = "POST">
			<p><b> single read bedrijf </b></p>
			<p><input type="text" name="bedrijf_id"> bedrijf_id</p>

            <p><input type="submit" value="submit" name="submit"></p>

		</form>
	</body>



</html>
