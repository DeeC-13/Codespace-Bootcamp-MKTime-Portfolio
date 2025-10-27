<?php

    if(isset($_POST['submit'])){
        $file = $_FILES['item_img'];

        $fileName = $_FILES['item_img']['name'];
        $fileTmpName = $_FILES['item_img']['tmp_name'];
        $fileSize = $_FILES['item_img']['size'];
        $fileError = $_FILES['item_img']['error'];
        $fileType = $_FILES['item_img']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        $allowed = array('jpg', 'jpeg', 'png');

        if(in_array($fileActualExt, $allowed)){
            if($fileError === 0){
                if($fileSize < 1000000){
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = '../admin/item_img/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, '../admin/item_img/'. $fileDestination);
                    
                    header("Location: create.php");
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
        
      }                    

    
    