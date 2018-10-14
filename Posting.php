<?php
  session_start();
  $db = mysqli_connect('localhost','root','','TA6');
  $NIM = $_SESSION["NIM"];
  $query = "SELECT * FROM data WHERE NIM = $NIM";
 	$view = mysqli_query($db,$query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Posting Page</title>
  </head>
  <body>
      <center>
        <br>
        <table border="2">
    			<tr>
            <td width = "25%"><center><a href="Home.php" name = "home">Home profile</a></center></td>
            <td width = "25%"><center><a href="Posting.php" name = "posting">Posting</a></center></td>
    				<td width = "25%"><center><a href="View.php" name = "view">View your Posting</a></center></td>
    				<td width = "25%"><center><a href="Viewall.php" name = "viewall">View all Posting</a></center></td>
    			</tr>
    		</table>
        <h1>Post your status here!</h1>
        <form method="POST" action="" enctype="multipart/form-data">
          <table border="3">
            <?php 	while ($data = mysqli_fetch_array($view)) { ?>
    				<tr>
    					<td colspan="3"><center><img src="<?php echo $data['Pic'];?>" width = "250"></center></td>
    				</tr>
    				<tr>
    					<td>Nim</td>
    					<td>:</td>
    					<td><?php echo $data['NIM'];?></td>
    				</tr>
            <?php } ?>
            <tr>
              <td> Judul Postingan </td>
              <td> : </td>
              <td> <input type="text" name="Judul" size="50"> </td>
            </tr>
            <tr>
              <td>Post Picture</td>
              <td>:</td>
              <td><input type="file" name="image"></td>
            </tr>
            <tr>
              <td valign = "top">Status Comment</td>
              <td valign = "top">:</td>
              <td><textarea name = "comment" placeholder="Input your status comment here..." rows="20" cols="80"></textarea></td>
            </tr>
            <tr>
    					<td colspan="3"><center><br><input type="submit" name="submit" value="Post"></center><br></td>
    				</tr>
          </table>
        </form>
      </center>
  </body>
</html>

<?php
  if (isset($_POST['submit'])) {
    $judul = $_POST['Judul'];
    $status = $_POST['comment'];
    $pic = "post/".$_FILES['image']['name'];
    $date = date("Y-m-d H:i:s");
    if (str_word_count($status) > 30) {
      if (strlen($judul)>0) {
        if (move_uploaded_file($_FILES['image']['tmp_name'],$pic)) {
          $insert = "INSERT INTO post(Title, tanggal, Konten, img, NIM) VALUES('$judul', '$date', '$status', '$pic', '$NIM')";
          if (mysqli_query($db,$insert)) {
            echo "<script language = 'javascript'>alert('Post Success!');document.location=('Posting.php');</script>";
          }else {
            echo "<script language = 'javascript'>alert('Post Failed...'); document.location=('Posting.php');</script>";
          }
        }else {
          echo "<script language ='javascript'>alert('Pic Upload Fail...'); document.location=('Posting.php');</script>";
        }
      }else {
        echo "<script language ='javascript'>alert('Judul Harus Diisi'); document.location = ('Posting.php');</script>";
      }
    }else{
      echo "<script languange = 'javascript'>alert('Kata status harus lebih dari 30 kata'); document.location=('Posting.php');</script>";
    }
  }
?>
