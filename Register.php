<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>
	<center>
		<br><br>
		<h1>Welcome to register page!</h1>
		<h3>Input Your Personal Information here!</h3>
		<br>
		<table>
			<form method="POST" action="" enctype="multipart/form-data">
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><input type="text" name="NIM"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="Nama"></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td>
						<input type="radio" name="JK" value="Laki-Laki">Laki-Laki
						<input type="radio" name="JK" value="Perempuan">Perempuan
						<input type="radio" name="JK" value="Lainnya">Lainnya
					</td>
				</tr>
				<tr>
					<td>Hobi</td>
					<td>:</td>
					<td>
						<input type="checkbox" name="Hobi[]" value="Tidur">Tidur
						<input type="checkbox" name="Hobi[]" value="Bermain">Bermain
						<input type="checkbox" name="Hobi[]" value="Makan">Makan
						<input type="checkbox" name="Hobi[]" value="Ngoding">Ngoding
						<input type="checkbox" name="Hobi[]" value="Membaca">Membaca
					</td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><textarea name="Alamat" placeholder="Input your address here...."></textarea></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td>
						<input type="radio" name="Kelas" value="D3MI-40-01">D3MI-40-01
						<input type="radio" name="Kelas" value="D3MI-40-02">D3MI-40-02
						<input type="radio" name="Kelas" value="D3MI-40-03">D3MI-40-03
						<input type="radio" name="Kelas" value="D3MI-40-04">D3MI-40-04
						<br>
						<input type="radio" name="Kelas" value="D3MI-41-01">D3MI-41-01
						<input type="radio" name="Kelas" value="D3MI-41-02">D3MI-41-02
						<input type="radio" name="Kelas" value="D3MI-41-03">D3MI-41-03
						<input type="radio" name="Kelas" value="D3MI-41-04">D3MI-41-04
						<br>
						<input type="radio" name="Kelas" value="D3MI-42-01">D3MI-42-01
						<input type="radio" name="Kelas" value="D3MI-42-02">D3MI-42-02
						<input type="radio" name="Kelas" value="D3MI-42-03">D3MI-42-03
						<input type="radio" name="Kelas" value="D3MI-42-04">D3MI-42-04
					</td>
				</tr>
				<tr>
					<td>Fakultas</td>
					<td>:</td>
					<td>
						<select name="Fakultas">
							<option value="Fakultas Ilmu Terapan">Fakultas Ilmu Terapan</option>
							<option value="Fakultas Teknik Elektro">Fakultas Teknik Elektro</option>
							<option value="Fakultas Rekayasa Industri">Fakultas Rekayasa Industri</option>
							<option value="Fakultas Informatika">Fakultas Informatika</option>
							<option value="Fakultas Ekonomi dan Bisnis">Fakultas Ekonomi dan Bisnis</option>
						</select>
					</td>
				</tr>
				<tr>
					<td>Profile Pic</td>
					<td>:</td>
					<td><input type="file" name="image" value=""></td>
				</tr>
				<tr>
					<td colspan="3"><center><br><input type="submit" name="submit" value="Register"></center></td>
				</tr>
				<tr>
					<td colspan="3"><center><a href="Login.php">Login if you have account!</a></center></td>
				</tr>
			</form>
		</table>
	</center>
</body>
</html>





<?php
 $db = mysqli_connect('localhost','root','','TA6');

 if (isset($_POST['submit'])) {
 	$NIM = $_POST['NIM'];
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
 					$insert = "INSERT INTO data(NIM, Nama, Jenis_Kelamin, Hobi, Alamat, Kelas, Fakultas, Pic) VALUES ('$NIM', '$Nama', '$JK', '$Hobi', '$Alamat', '$Kelas', '$Fakultas', '$pic')";
 					if (mysqli_query($db,$insert)) {
 						echo "<script languange = 'javascript'>alert('Registration Success');
 						document.location=('Login.php');</script>";
 					}
 					else{
 						echo "<script languange = 'javascript'>alert('Something went error');
 					document.location=('Register.php');</script>";
 					}
 				}
 				else{
 					echo "<script languange = 'javascript'>alert('Input nama tidak boleh kosong dan maksimal 35 huruf');
 					document.location=('Register.php');</script>";
 				}
 			}
 			else{
 				echo "<script languange = 'javascript'>alert('NIM harus berisikan 10 digit angka');
 				document.location=('Register.php');</script>";
		 	}
 		}
 	else{
 		echo "<script languange = 'javascript'>alert('NIM Harus Angka/Numerik');
 		document.location=('Register.php');</script>";

 	}

	if (move_uploaded_file($_FILES['image']['tmp_name'],$pic)) {
		echo "Upload Success!";
	}else {
		echo "Upload Fail...";
	}
 }

?>
