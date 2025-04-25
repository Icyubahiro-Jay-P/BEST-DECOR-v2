<?php
session_start();
include("connect.php");

if(isset($_FILES['file'])){
  $img_name = $_FILES['file']['name']; //getting image name
  $img_type = $_FILES['file']['type']; //getting imae type
  $tmp_name = $_FILES['file']['tmp_name']; // used to save/move to folder

  $img_explode = explode('.', $img_name);
  $img_ext = end($img_explode);

  $extensions = ['png', 'jpeg', 'jpg'];
  if(in_array($img_ext, $extensions) === true){
    $time = time();
    $new_img_name = $time.$img_name;
    if(move_uploaded_file($tmp_name, "../images/".$new_img_name)){
      $sql = "INSERT INTO users (profile_picture)
              VALUES ('$new_img_name')";
      $query = mysqli_query($conn, $sql);
      if(!$query){
        echo "Something went wrong";
      }
    }else{
      echo "Failed to upload image";
    }
  }else{
    echo "Please select an image type file - jpeg, jpg, png";
  }
}else{
  echo "Please select an image";
}
?>