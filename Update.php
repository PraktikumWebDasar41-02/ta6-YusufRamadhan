<?php
	session_start();
	$db = mysqli_connect('localhost','root','','TA6');
	$NIM = $_SESSION["NIM"];
	$query = "SELECT * FROM data WHERE NIM = $NIM";
 	$view = mysqli_query($db,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<br>
	<center>
		<table border="2">
			<tr>
				<td width = "25%"><center><a href="Home.php" name = "home">Home profile</a></center></td>
				<td width = "25%"><center><a href="Posting.php" name = "posting">Posting</a></center></td>
				<td width = "25%"><center><a href="View.php" name = "view">View your Posting</a></center></td>
				<td width = "25%"><center><a href="Viewall.php" name = "viewall">View all Posting</a></center></td>
			</tr>
		</table>
		<h3>Edit Profile Page</h3>
		<table border="2">
			<form action="" method="POST" enctype="multipart/form-data">
				<?php 	while ($data = mysqli_fetch_array($view)) { ?>
				<tr>
					<td colspan="3"><center><img src="<?php echo $data['Pic'];?>" width = "250"></center></td>
				</tr>
				<tr>
					<td>Nim</td>
					<td>:</td>
					<td><?php echo $data['NIM'];?></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name = "Nama" value="<?php echo $data['Nama'];?>" size="35"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<input type="radio" name="JK" value="Laki-Laki"
						<?php if ($data['Jenis_Kelamin'] == 'Laki-Laki') {
							echo "checked";
						}?>>Laki-Laki
						<input type="radio" name="JK" value="Perempuan"
						<?php if ($data['Jenis_Kelamin'] == 'Perempuan') {
							echo "checked";
						}?>>Perempuan
						<input type="radio" name="JK" value="Lainnya"
						<?php if ($data['Jenis_Kelamin'] == 'Lainnya') {
							echo "checked";
						}?>>Lainnya
					</td>
				</tr>
				<tr>
					<td>Hobi</td>
					<td>:</td>
					<td>
						<input type="checkbox" name="Hobi[]" value="Tidur"
						<?php if (strpos(" ".$data['Hobi'],"Tidur")) {
							echo "checked";
						}?>>Tidur
						<input type="checkbox" name="Hobi[]" value="Bermain"
						<?php if (strpos(" ".$data['Hobi'],"Bermain")) {
							echo "checked";
						}?>>Bermain
						<input type="checkbox" name="Hobi[]" value="Makan"
						<?php if (strpos(" ".$data['Hobi'],"Makan")) {
							echo "checked";
						}?>>Makan
						<input type="checkbox" name="Hobi[]" value="Ngoding"
						<?php if (strpos(" ".$data['Hobi'],"Ngoding")) {
							echo "checked";
						}?>>Ngoding
						<input type="checkbox" name="Hobi[]" value="Membaca"
						<?php if (strpos(" ".$data['Hobi'],"Membaca")) {
							echo "checked";
						}?>>Membaca
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea name="Alamat"><?php echo $data['Alamat']; ?></textarea></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<input type="radio" name="Kelas" value="D3MI-40-01"
						<?php if ($data['Kelas'] == 'D3MI-40-01') {
							echo "checked";
						}?>>D3MI-40-01
						<input type="radio" name="Kelas" value="D3MI-40-02"
						<?php if ($data['Kelas'] == 'D3MI-40-02') {
							echo "checked";
						}?>>D3MI-40-02
						<input type="radio" name="Kelas" value="D3MI-40-03"
						<?php if ($data['Kelas'] == 'D3MI-40-03') {
							echo "checked";
						}?>>D3MI-40-03
						<input type="radio" name="Kelas" value="D3MI-40-04"
						<?php if ($data['Kelas'] == 'D3MI-40-04') {
							echo "checked";
						}?>>D3MI-40-04
						<br>
						<input type="radio" name="Kelas" value="D3MI-41-01"
						<?php if ($data['Kelas'] == 'D3MI-41-01') {
							echo "checked";
						}?>>D3MI-41-01
						<input type="radio" name="Kelas" value="D3MI-41-02"
						<?php if ($data['Kelas'] == 'D3MI-41-02') {
							echo "checked";
						}?>>D3MI-41-02
						<input type="radio" name="Kelas" value="D3MI-41-03"
						<?php if ($data['Kelas'] == 'D3MI-41-03') {
							echo "checked";
						}?>>D3MI-41-03
						<input type="radio" name="Kelas" value="D3MI-41-04"
						<?php if ($data['Kelas'] == 'D3MI-41-04') {
							echo "checked";
						}?>>D3MI-41-04
						<br>
						<input type="radio" name="Kelas" value="D3MI-42-01"
						<?php if ($data['Kelas'] == 'D3MI-42-01') {
							echo "checked";
						}?>>D3MI-42-01
						<input type="radio" name="Kelas" value="D3MI-42-02"
						<?php if ($data['Kelas'] == 'D3MI-42-02') {
							echo "checked";
						}?>>D3MI-42-02
						<input type="radio" name="Kelas" value="D3MI-42-03"
						<?php if ($data['Kelas'] == 'D3MI-42-03') {
							echo "checked";
						}?>>D3MI-42-03
						<input type="radio" name="Kelas" value="D3MI-42-04"
						<?php if ($data['Kelas'] == 'D3MI-42-04') {
							echo "checked";
						}?>>D3MI-42-04
					</td>
				</tr>
				<tr>
					<td>Fakultas</td>
					<td>:</td>
					<td>
						<select name="Fakultas">
							<option value="Fakultas Ilmu Terapan"
							<?php if ($data['Fakultas'] == 'Fakultas Ilmu Terapan') {
								echo "selected";
							}?>>Fakultas Ilmu Terapan</option>
							<option value="Fakultas Teknik Elektro"
							<?php if ($data['Fakultas'] == 'Fakultas Teknik Elektro') {
								echo "selected";
							}?>>Fakultas Teknik Elektro</option>
							<option value="Fakultas Rekayasa Industri"
							<?php if ($data['Fakultas'] == 'Fakultas Rekayasa Industri') {
								echo "selected";
							}?>>Fakultas Rekayasa Industri</option>
							<option value="Fakultas Informatika"
							<?php if ($data['Fakultas'] == 'Fakultas Informatika') {
								echo "selected";
							}?>>Fakultas Informatika</option>
							<option value="Fakultas Ekonomi dan Bisnis"
							<?php if ($data['Fakultas'] == 'Fakultas Ekonomi dan Bisnis') {
								echo "selected";
							}?>>Fakultas Ekonomi dan Bisnis</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Update Profile Pic</td>
					<td>:</td>
					<td><input type="file" name="image" value=""></td>
				</tr>
				<tr>
					<td><center><input type="submit" name="Back" value="Back to Menu"></center></td>
					<td colspan="2"><center><input type="submit" name="Update" value="Update"></center></td>
				</tr>
				<?php }
				if (isset($_POST['Update'])) {
					$Nama = $_POST['Nama'];
					$JK = $_POST['JK'];
					$ArrayHobi = $_POST['Hobi'];
					$Alamat = $_POST['Alamat'];
					$Kelas = $_POST['Kelas'];
					$Fakultas = $_POST['Fakultas'];
					$Hobi = "";

					if (!empty($ArrayHobi)) {
							foreach ($ArrayHobi as $value) {
								$Hobi .= $value.", ";
							}
						}

				$pic = "img/".$_FILES['image']['name'];

					if ($NIM == is_numeric($NIM)) {
							if (strlen($NIM)==10) {
								if ( strlen($Nama)<=35 && strlen($Nama)>0) {
									move_uploaded_file($_FILES['image']['tmp_name'],$pic);
										$update = "UPDATE data SET Nama = '$Nama',  Jenis_Kelamin = '$JK', Hobi = '$Hobi', Alamat = '$Alamat', Kelas = '$Kelas', Fakultas = '$Fakultas', Pic = '$pic' WHERE NIM = '$NIM'";
										if (mysqli_query($db,$update)) {
											echo "<script languange = 'javascript'>alert('Update Success');
											document.location=('Update.php');</script>";
										}
										else{
											echo "<script languange = 'javascript'>alert('Something went error');
										document.location=('Update.php');</script>";
										}
								}
								else{
									echo "<script languange = 'javascript'>alert('Input nama tidak boleh kosong dan maksimal 35 huruf');
									document.location=('Update.php');</script>";
								}
							}
							else{
								echo "<script languange = 'javascript'>alert('NIM harus berisikan 10 digit angka');
								document.location=('Update.php');</script>";
							}
						}
					else{
						echo "<script languange = 'javascript'>alert('NIM Harus Angka/Numerik');
						document.location=('Update.php');</script>";
					}
				}

				if (isset($_POST['Back'])) {
					header("Location: Home.php");
				}
				?>
			</form>
		</table>
	</center>
</body>
</html>
