<?php
function get_data(){
 require 'includes/connection.php';
$query = "SELECT * FROM address_list ORDER BY id";

$results1 = mysqli_query($connect,$query);

$list = array();

while($row = mysqli_fetch_assoc($results1)){
     $list[] = array(
          'name' => $row["name"],
          'firstname' => $row["firstname"],
          'email' => $row["email"],
          'street' => $row["street"],
          'zip' => $row["zip"],
          'city' => $row["city"],
     );
}

return json_encode($list);
}

// echo '<pre>';
// print_r(get_data());
// echo '</pre>';

$file_name = 'address_list' . '.json';

if(file_put_contents($file_name, get_data())){
     header("Location:index.php?success=json file exported successfully");
     exit();
}else{
     echo $file_name.'not created';
}
 ?>            