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
             $checkemail_sql = "SELECT email FROM address_list WHERE email='$email'";
             $result = mysqli_query($connect,$checkemail_sql);

             if(mysqli_num_rows($result) > 1){
               header("Location: ../index.php?error=Address already exist");
               exit(); 
             }else{
               $sql2="INSERT INTO address_list (name,firstname,email,street,zip,city) VALUES ('$name','$firstname' ,'$email' ,'$street' ,'$zip' ,'$city')";
               $result2 = mysqli_query($connect, $sql2);

               if( $result2){
                    header("Location: ../index.php?success=Address added succesfully");
                    exit();
               }else{
                    echo $connect->error;
                    // header("Location: ../index.php?error=Address added succesfully");
                    // exit();  
               }
             }
        }
}
?>