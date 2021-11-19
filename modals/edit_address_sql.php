<?php
include ('../includes/connection.php');
if (isset($_POST['name']) && isset($_POST['firstname']) && isset($_POST['email']) && isset($_POST['street']) && isset($_POST['zip']) && isset($_POST['city'])){
     function validate($data){
          $data = trim($data);
           $data = stripslashes($data);
           $data = htmlspecialchars($data);
           return $data;
        }

        $name = validate($_POST['name']);
        $firstname = validate($_POST['firstname']);
        $email = validate($_POST['email']);
        $street = validate($_POST['street']);
        $zip = validate($_POST['zip']);
        $city = validate($_POST['city']);
        $id = $_GET['id'];
 
        if(empty($name)){
          header("Location: ../index.php?error=Name is required");
          exit();   
        }
        elseif(empty($firstname)){
          header("Location: ../index.php?error=firstname is required");
          exit();   
        }
        elseif(empty($email)){
          header("Location: ../index.php?error=email is required");
          exit();   
        }
        elseif(empty($street)){
          header("Location: ../index.php?error=street is required");
          exit();   
        }
        elseif(empty( $zip)){
          header("Location: ../index.php?error=zip is required");
          exit();   
        }
        elseif(empty( $city)){
          header("Location: ../index.php?error=city  is required");
          exit();   
        }else{
               $sql="UPDATE `address_list` SET `name`='$name',`firstname`='$firstname',`email`='$email',`street`='$street',`zip`='$zip',`city`='$city' WHERE `id`= '$id' ";
               $result = mysqli_query($connect, $sql);

               if( $result){
                    header("Location: ../index.php?success=Address updated succesfully");
                    exit();
               }else{
                    echo $connect->error;
                    // header("Location: ../index.php?error=Address added succesfully");
                    // exit();  
               }
             }
        }

?>