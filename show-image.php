<?php include 'img-database.php';
echo $id2=$_POST['hidden_id'];
// echo $id2=$_GET['id1'];
$sql = "select * from files where id='$id2'";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {	
?>
<img src="image_upload/<?php echo $row['imagename']; ?>" style="float:left;height:100px;width:100px;">
<form action="imageedit.php" enctype="multipart/form-data" method="post" style="float: left;margin-top: 20px;">
<input type="file" id="fileToUpload" name="fileToUpload" required="required">
<input type="hidden" id="" name="hidden_id_for_image" value="<?php echo $id2;?>"	>
<input name="ordernow" value="Register" style="padding:10px 40px;" type="submit">
</form>
<?php
 }
}
 ?>