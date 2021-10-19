<?php

/* $id = $_POST['id'];
unlink("../qrImage/".$id."qrImg.png"); */

    $folder_path = "../../qrImage";
   
// List of name of files inside
// specified folder
    $files = glob($folder_path.'/*'); 
   
// Deleting all the files in the list
    foreach($files as $file) {
   
    if(is_file($file)) 
    
        // Delete the given file
        unlink($file); 
    }
    
?>