<?php
require 'includes/connection.php';
$query = "SELECT * FROM address_list ";
$results1 = mysqli_query($connect,$query);

$xml = new DOMDocument("1.0");
$xml->formatOutput=true;

$address_list = $xml->createElement("address_list");
$xml->appendChild($address_list);
while($row = mysqli_fetch_array($results1)){
     $address = $xml->createElement("address");
     $address_list->appendChild($address);

      $name=$xml->createElement("name",$row['name']);
      $address->appendChild($name);

      $firstname=$xml->createElement("firstname",$row['firstname']);
      $address->appendChild($firstname);

      $email=$xml->createElement("email",$row['email']);
      $address->appendChild($email);

      $street=$xml->createElement("street",$row['street']);
      $address->appendChild($street);

      $zip=$xml->createElement("zip",$row['zip']);
      $address->appendChild($zip);
      
      $city=$xml->createElement("city",$row['city']);
      $address->appendChild($city);
}

// echo "<xmp>".$xml->saveXML()."<xmp>";
$xml -> save("address.xml");

if ($xml) {
     header("Location:index.php?success=xml file exported successfully");
     exit();
}

?>