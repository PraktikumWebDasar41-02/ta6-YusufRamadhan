<?php
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'TA6');
	$nim = $_SESSION["NIM"];
	$query = "SELECT * FROM data WHERE NIM = $nim";
 	$view = mysqli_query($db,$query);
?>

<!DOCTYPE html>
<html>
<head>
	<title>View</title>
</head>
<body>
	<br><br>
	<center>
		<table border="2">
			<tr>
				<td width = "25%"><center><a href="Home.php" name = "home">Home profile</a></center></td>
				<td width = "25%"><center><a href="Posting.php" name = "posting">Posting</a></center></td>
				<td width = "25%"><center><a href="View.php" name = "view">View your Posting</a></center></td>
				<td width = "25%"><center><a href="Viewall.php" name = "viewall">View all Posting</a></center></td>
			</tr>
		</table>
		<h1>Welcome to Homepage</h1>
		<h3>here's your information!</h3>
		<table border="2">
			<form action="" method="POST">
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
					<td><?php echo $data['Nama'];?></td>
				</tr>
				<tr>
					<td>Jenis Kelamin</td>
					<td>:</td>
					<td><?php echo $data['Jenis_Kelamin']; ?></td>
				</tr>
				<tr>
					<td>Hobi</td>
					<td>:</td>
					<td><?php echo $data['Hobi']; ?></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td><?php echo $data['Alamat']; ?></td>
				</tr>
				<tr>
					<td>Kelas</td>
					<td>:</td>
					<td><?php echo $data['Kelas']; ?></td>
				</tr>
				<tr>
					<td>Fakultas</td>
					<td>:</td>
					<td><?php echo $data['Fakultas'];; ?></td>
				</tr>
				<tr>
					<td><center><input type="submit" name="Update" value="Update"></center></td>
					<td colspan="2"><center><input type="submit" name="submit" value="Logout"></center></td>
				</tr>
				<?php }
				if (isset($_POST['submit'])) {
					session_destroy();
					header("Location: Login.php");
				}
				if(isset($_POST['Update'])){
					$_SESSION["NIM"] = $nim;
					header("Location: Update.php");
				}
				// $link = $_GET['posting'];
				// if ($link == 'Posting.php') {
				// 	$_SESSION["NIM"] = $nim;
				// }
				?>
			</form>
		</table>
	</center>
</body>
</html>
