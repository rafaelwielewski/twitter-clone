<?php
  
    header('Access-Control-Allow-Origin: *');  
  
    if (move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$_FILES['file']['name'])) {
        echo "done";
        exit;
    }
  
    echo "failed";
  
?>