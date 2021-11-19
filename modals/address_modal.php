<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
 Add Address
</button>
<?php

include ('includes/connection.php');
$query="SELECT city_name FROM city ";
$result = mysqli_query($connect,$query);


?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="modals/add_address_sql.php" enctype="" method="post">
      <div class="modal-body">
           <div class="row">
                <div class="col-lg-6">
                     <input type="text" name="name" placeholder="Name" class="form-control">
                </div>
                <div class="col-lg-6">
                     <input type="text" name="firstname" placeholder="First Name" class="form-control">
                </div>
           </div>
           <div class="row mt-3">
                <div class="col-lg-6">
                     <input type="email" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="col-lg-6">
                     <input type="text" name="street" placeholder="Street" class="form-control">
                </div>
           </div>
           <div class="row mt-3">
                <div class="col-lg-6">
                     <input type="text" name="zip" placeholder="Zip" class="form-control">
                </div>
                <div class="col-lg-6">
                     <select class="form-select" style="color: black;" name="city" id="">
                          <option value="">Select City</option>
                          <?php
                              foreach ($result as $row) {
                                   echo '<option  value="'.$row["city_name"].'">'.$row["city_name"].'</option>';
                                   }
                          ?>
                     </select>
                </div>
           </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">Save changes</button>
       </div>
      </form>
    </div>
  </div>
</div>