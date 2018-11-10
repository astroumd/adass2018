<?php

$header='<html lang="en"> <head> <meta charset="utf-8"> <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <meta name="description" content=""> <meta name="author" content=""> <title>ADASS 2018 | Contribution Instructions </title> <!-- Bootstrap core CSS --> <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet"> <!-- Custom styles for this template --> <link href="css/modern-business.css" rel="stylesheet"> </head>   <body>';
$inc1 = '<!--#include virtual="includes/nav.inc"-->';
$div1 = '<div class="container">';

$return = '<br><a href="instructions.html">Return to manuscript submission</a>';
$success = '<br><a href="index.html">Return to ADASS XXVIII</a>';
$footer='</div> <!-- /.container --> <!-- Bootstrap core JavaScript --> <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> <script src="vendor/jquery/jquery.min.js"></script><!--#include virtual="includes/footer.inc" --></body> </html>';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$filebase = strtoupper(pathinfo($target_file,PATHINFO_FILENAME));
$pattern  = '/^[POIFBTD][1-9][0-9]?-?[1-9]?[0-9]?_[V][0-9]+/';
$pattern_matches = preg_match($pattern,$filebase);
echo "$header";
echo "$inc1";
echo "$div1";
//echo "<h1>Found contribution file type " . $fileType . " </h1>";
if ( !$pattern_matches ) {
    echo "Your file root name $filebase does not match the required pattern. Please review the instructions and rename your file.<br>";
    $uploadOk = 0;
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "File " .$filebase. "." .$fileType. " already exists on the server.  Have you updated your version number?<br>";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Your file is too large. Files must be less than 50MB.<br>";
    $uploadOk = 0;
}
// Allow certain file formats
if($fileType != "tgz" && $fileType != "gz" && $fileType != "tar"
&& $fileType != "zip" && $fileType != "bz2" ) {
    echo "Only tgz, tar, (tar.)gz, zip,  and bz2 files are allowed.<br>";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<b>Your file was not uploaded.</b>";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<b>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.</b>";
    } else {
        echo "<b>There was an error uploading your file.</b>";
    }
}
if ($uploadOk== 0){ echo "$return";}
if ($uploadOk== 1){ echo "$success";}
echo "$footer";
?>
