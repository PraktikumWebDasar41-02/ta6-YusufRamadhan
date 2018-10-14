<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<center>
		<h1>Welcome to Login Page</h1>
		<h3>Please Login to proceed</h3>
		<table>
			<form method="POST" action="" enctype="multipart/form-data">
				<tr>
					<td>NIM</td>
					<td>:</td>
					<td><input type="password" name="NIM"></td>
				</tr>
				<tr>
					<td>Nama</td>
					<td>:</td>
					<td><input type="text" name="Nama"></td>
				</tr>
				<tr>
					<td colspan="3"><center><br><input type="submit" name="submit" value="Login"></center></td>
				</tr>
				<tr>
					<br>
					<td colspan="3"><center><a href="Register.php">Back to register page</a></center></td>
				</tr>
			</form>
		</table>
	</center>
</body>
</html>

<?php
	if (isset($_POST['submit'])) {
		$NIM = $_POST['NIM'];
	 	$Nama = $_POST['Nama'];
		$db = mysqli_connect('localhost', 'root', '', 'TA6');
		if ($NIM == is_numeric($NIM)) {
			if (strlen($NIM)==10) {
				if ( strlen($Nama)<=35 && strlen($Nama)>0) {
					$query = mysqli_query($db,"SELECT * FROM data WHERE NIM = '".$NIM."' AND Nama = '".$Nama."'");
					if (mysqli_fetch_row($query)) {
						$_SESSION['NIM'] = $NIM;
						echo "<script languange = 'javascript'>alert('Login Success!');
 						document.location=('Home.php');</script>";
					}
					else{
						echo "<script languange = 'javascript'>alert('Username atau Password salah');
 						document.location=('Login.php');</script>";
					}
				}
				else{
					echo "<script languange = 'javascript'>alert('Input nama tidak boleh kosong dan maksimal 35 huruf');
 					document.location=('login.php');</script>";
				}
			}
			else{
				echo "<script languange = 'javascript'>alert(''NIM harus berisikan 10 digit angka');
 				document.location=('Login.php');</script>";
			}
		}
		else{
			echo "<script languange = 'javascript'>alert('NIM Harus Angka/Numerik');
 			document.location=('Login.php');</script>";
		}

	}
?>
