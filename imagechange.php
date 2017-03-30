<?php include "database.php";
 session_start(); ?>
<form action="imageedit.php" enctype="multipart/form-data" method="post" style="float: left;margin-top: 0px;">
<input type="file" id="fileToUpload" name="fileToUpload" required="required">
<input name="ordernow" value="Register" style="padding:10px 40px;" type="submit">
</form>