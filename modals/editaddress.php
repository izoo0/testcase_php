<!-- Modal -->
<div class="modal fade" id="editaddress<?php echo $ls['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="modals/edit_address_sql.php?id=<?php echo $ls['id']; ?>" enctype="" method="post">
      <div class="modal-body">
           <div class="row">
                <div class="col-lg-6">
                     <input type="text" name="name" placeholder="Name" value="<?php echo $ls ['name'];?>" class="form-control">
                </div>
                <div class="col-lg-6">
                     <input type="text" name="firstname" placeholder="First Name" value="<?php echo $ls ['firstname'];?>" class="form-control">
                </div>
           </div>
           <div class="row mt-3">
                <div class="col-lg-6">
                     <input type="email" name="email" placeholder="Email" value="<?php echo $ls ['email'];?>" class="form-control">
                </div>
                <div class="col-lg-6">
                     <input type="text" name="street" placeholder="Street" value="<?php echo $ls ['street'];?>" class="form-control">
                </div>
           </div>
           <div class="row mt-3">
                <div class="col-lg-6">
                     <input type="text" name="zip" placeholder="Zip" value="<?php echo $ls ['zip'];?>" class="form-control">
                </div>
                <div class="col-lg-6">
                     <select class="form-select" style="color: black;" name="city" id="">
                          <option value=""><?php echo $ls ['city'];?></option>
                          <?php
                              foreach ($result as $ls) {
                                   echo '<option  value="'.$ls["city_name"].'">'.$ls["city_name"].'</option>';
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