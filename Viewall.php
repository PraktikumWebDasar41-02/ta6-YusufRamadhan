<?php
	session_start();
	$db = mysqli_connect('localhost','root','','TA6');
	$NIM = $_SESSION["NIM"];
	$query = "SELECT * FROM post ORDER BY ID DESC";
 	$view = mysqli_query($db,$query);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Timeline Post</title>
  </head>
  <body>
      <center>
        <table border="2">
    			<tr>
    				<td width = "25%"><center><a href="Home.php" name = "home">Home profile</a></center></td>
    				<td width = "25%"><center><a href="Posting.php" name = "posting">Posting</a></center></td>
    				<td width = "25%"><center><a href="View.php" name = "view">View your Posting</a></center></td>
    				<td width = "25%"><center><a href="Viewall.php" name = "viewall">View all Posting</a></center></td>
    			</tr>
    		</table>
        <br>
        <h3>Timeline post</h3>
        <table border="1" width = "50%">
          <?php
            while ($post = mysqli_fetch_array($view)) {
          ?>
          <tr>
            <td> By <?php echo $post['NIM']; ?></td>
            <td colspan="2"><center><?php echo $post['Title'];?></center></td>
          </tr>
          <tr>
            <td rowspan="2"><img src="<?php echo $post['img'];?>" width="250"></td>
            <td><?php echo "<b> created ".$post['tanggal']."</b>";?></td>
          </tr>
          <tr>
            <td><?php echo $post['Konten'];?></td>
          </tr>
          <?php
            }
          ?>
        </table>
      </center>
  </body>
</html>
