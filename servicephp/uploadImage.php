<?php
    // isset($_FILES["photo"]["tmp_name"]);
    header('Access-Control-Allow-Origin: *');
    if(isset($_POST["photo"]) && isset($_FILES['file'])) {
        $file_temp = $_FILES['file']['tmp_name'];   
        $info = getimagesize($file_temp);
    } else {
        print "File not sent to server succesfully!";
        exit;
    }
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if($check !== false){
        echo "File is an image - ". $check["mime"] . ".";
        $uploadOk = 1;
        if(move_uploaded_file($_FILES["photo"]["name"],$target_file)){
            echo "The file ". basename($_FILES["phpto"]["name"])."has been uploaded.";
        }else{
            echo "Sorry";
        }

    }else{
        echo "File is not an image.";
        $uploadOk = 0;
    }


?>