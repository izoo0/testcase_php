<?php include('base.php');
      include('includes/navbar.php');
?>
<div class="container mt-5">
<?php include 'export.php' ?>
<?php if (isset($_GET['success'])) { ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
     <strong><?php echo $_GET['success']; ?></strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
    <?php } ?>
    <?php if (isset($_GET['error'])) { ?>
     <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong><?php echo $_GET['error']; ?></strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
<?php } ?>
          <?php include ('modals/address_modal.php') ?>

      <div class="card mt-3">
           <div class="card-header bg-primary">
                <div class="card-title text-white">
                    Address List
                </div>
           </div>
           <div class="card-body">
           <table class="table responsive" id="address">
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Email</th>
      <th scope="col">Street</th>
      <th scope="col">Zip</th>
      <th scope="col">City</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
 <?php
  require 'includes/connection.php';
$query = "SELECT * FROM address_list ORDER BY id";

$results1 = mysqli_query($connect,$query);

$list = array();

while($row = mysqli_fetch_assoc($results1)){
     $list[] = $row;
}
 ?>            
                <tr>       
                   <?php $ctr=0; foreach($list as $ls ): $ctr++; ?>  
                    <td><?php echo $ls ['name'];?></td>
                    <td><?php echo $ls ['firstname'];?></td>
                    <td><?php echo $ls ['email'];?></td>
                    <td><?php echo $ls ['street'];?></td>
                    <td><?php echo $ls ['zip'];?></td>
                    <td><?php echo $ls ['city'];?></td>
                    <td><a rel="tooltip"  title="Edit" id="<?php echo $ls['id']; ?>" data-bs-toggle="modal" data-bs-target="#editaddress<?php echo $ls['id']; ?>" class="btn btn-outline-success"><i class="fas fa-pencil-alt"></i>Edit</a> 
                     <?php include 'modals/editaddress.php';?></td>
                    </tr>
                    <?php endforeach; ?>
  </tbody>
</table>
           </div>
      </div>
</div>

<?php include('includes/scripts.php') ?>
<script>
     $(document).ready( function () {
    $('#address').DataTable();
} );
</script>
