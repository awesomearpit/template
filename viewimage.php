
<style>
th{text-align: left;}
form{margin: 0px;}
</style>
<table border="2" cellpadding="10" style="width:70%;border-collapse:collapse;" class="table table-striped">
<thead>
<tr>
<th>S.no.</th>
<th>Image Uploaded</th>
<th>Action</th>

</tr>
<?php $s_no=1; ?>
</thead>
<tbody id="show_result">
<tr>
<?php
include 'img-database.php';
$sql = "select * from files";
$result = $conn->query($sql); 
if ($result->num_rows > 0) {
	while($row = $result->fetch_assoc()) {	

?>





<td><?php echo $s_no; ?>.</td>
<td><?php echo $row['imagename']; ?></td>

<td>
<form action="show-image.php" method="POST">
<input type="hidden" value="<?php echo $row['id']; ?>"  name="hidden_id">
<input type="submit" value="Change Image" style="float:left;margin-right:32px" required>
</form>

<!-- <a href="edit_client.php?id=<?php echo $row['id'];?>">edit</a> -->

<form action="delete_client.php" method="POST">
<input type="hidden" value="<?php echo $row['id']; ?>"  name="hidden_id">
<input type="submit" value="Delete" style="float:left;margin-right:32px" required>
</form>
<!--<a href="delete_client.php?id=<?php echo $row['id'];?>">delete</a>-->
</td> 


</tr>



<?php 
$s_no++;
}} ?>


</tbody>


</table>

