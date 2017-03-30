<?php include 'img-database.php';
session_start();
if(isset($_POST['hidden_id_for_image'])){
	$getid = $_POST['hidden_id_for_image'];
	$sql = "select * from files where id=".$getid."";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$imagename = $row['imagename'];
			@unlink("image_upload/".$imagename);
		}
	}
}

$target_dir = "image_upload/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if image file is a actual image or fake image
// rename file
if (file_exists($target_file)) {
	
$test = explode('.',$_FILES["fileToUpload"]["name"]);
$test_name=$test[0];
$extn=end($test);
$random_number=rand(10000,1000000);
$final_name=$test_name.$random_number.'.'.$extn;
$_SESSION["img_name_2"]=$final_name;
$target_file = $target_dir .$final_name;
   
if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	$_SESSION["image_add"]="Entry Is successfully created.";
}
} 
else{
   if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	    $_SESSION["img_name_2"]=basename($_FILES["fileToUpload"]["name"]);
		$_SESSION["image_add"] = "Entry Is successfully created.";
	} 
	else {
       echo "Sorry, there was an error uploading your file.";
   }
}

echo $tt=$_SESSION["img_name_2"];
echo $_SESSION["image_add"];
$sql="update files set  imagename= '$tt' where id='$getid'";
if ($conn->query($sql) == TRUE) {
	echo 'entry created';
}
else{
	echo 'not created';
}
die;
?>