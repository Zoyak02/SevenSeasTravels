<?php
  require("connection.php");
  include("function222.php");

  if (!isMerchant()) {
    // Display an alert if the user is not a merchant
    echo "<script>alert('Access denied. You need to log in as a merchant to access this page.');
    window.location.href = 'index.php'; // Redirect to index.php
    </script>";
    exit(); // Stop executing the current script
}

if (isset($_GET['success'])) {
  $success_message = $_GET['success'];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Merchant Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/login.css">
</head>
<body class="bg-light">
  <div class="container text-light p-3 rounded my-4" style="background-color: #12526A;">
    <div class="d-flex align-items-center justify-content-between px-3">
      <h2>
        <a href="index_merchant.php" class="text-white text-decoration-none">
          <img src ="img/Travel Website.png" style = "width :80px "  ></img> Welcome, <?php echo ucfirst($_SESSION['user']['username']);?> 
        </a>
      </h2>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addproduct"  style="margin-left:290px ;">
        <i class="bi bi-plus-lg"></i> Add Product
      </button>

      <li class="login__item" style="list-style-type:none;">
          <a href="index.php?logout=1" class="cd-signin" style="text-decoration:none;padding-top:10px;padding-bottom:10px;margin-right:50px;">Logout</a>
      </li>
    </div>
  </div>



   <?php
                  

    if(isset($_GET['alert']))
    {
      if($_GET['alert']=='img_upload')
      {
        echo<<<alert
        <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
          <strong>Image Upload Failed! Server Down!</strong>
        </div>
        alert;
      }
      if($_GET['alert']=='img_rem-fail')
      {
        echo<<<alert
        <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
          <strong>Image Removal Failed! Server Down!</strong>
        </div>
        alert;
      }
      if($_GET['alert']=='added_fail')
      {
        echo<<<alert
        <div class="container alert alert-danger alert-dismissible text-center"  id="alert-msg" role="alert">
          <strong>Cannot Add Product!</strong>
        </div>
        alert;
      }
      if($_GET['alert']=='remove_failed')
      {
        echo<<<alert
        <div class="container alert alert-danger alert-dismissible text-center"  id="alert-msg" role="alert">
          <strong>Cannot Remove Product! Server Down!</strong>
        </div>
        alert;
      }
      if($_GET['alert']=='update_failed')
      {
        echo<<<alert
        <div class="container alert alert-danger alert-dismissible text-center" id="alert-msg" role="alert">
          <strong>Cannot Update Product! Server Down!</strong>
        </div>
        alert;
      }
    }

    else if(isset($_GET['success']))
    {
      if($_GET['success']=='updated')
      {
        echo<<<alert
        <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
          <strong>Product Updated</strong>
        </div>
        alert;
      }

      if($_GET['success']=='added')
      {
        echo<<<alert
        <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
          <strong>Product Added</strong>
        </div>
        alert;
      }
      if($_GET['success']=='removed')
      {
        echo<<<alert
        <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
          <strong>Product Removed</strong>
        </div>
        alert;
      }
      if($_GET['success']=='set')
      {
        echo<<<alert
        <div class="container alert alert-success alert-dismissible text-center" id="success-msg" role="alert">
          <strong>New Password Set Successfully</strong>
        </div>
        alert;
      }
    }
  ?>

<div class="modal fade" id="newPass" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="false">
  <div class="modal-dialog">
    <form action="function222.php" method="POST" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Set New Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <span class="input-group-text">New Password</span>
            <input type="text" class="form-control" name="password_1" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text">Confirm New Password</span>
            <input type="text" class="form-control" name="password_2" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success" name="newPass"> Create </button>
        </div>
      </div>
    </form>
  </div>
</div>
  
  <div class="container mt-4 p-0">
    <table class="table table-bordered table-hover text-center">
      <thead class="thead-light" >
        <tr>
          <th width="10%" scope="col" class="rounded-start">Sr. No</th>    
          <th width="15%" scope="col">Image</th>
          <th width="10%" scope="col">Tour Type</th>
          <th width="10%" scope="col">Tour Name</th>
          <th width="10%" scope="col">Location</th>
          <th width="10%" scope="col">Price</th>
          <th width="35%" scope="col">Description</th>
          <th width="20%" scope="col" class="rounded-end">Action</th>
        </tr>
      </thead>

      <tbody class=bg-white>
        <?php

          $merchantID = $_SESSION['user']['merchantID'];
          $query = "SELECT * FROM products WHERE merchantID = '$merchantID'";
          $result=mysqli_query($con,$query);
          $i=1;
          $fetch_src = FETCH_SRC;

          while($fetch=mysqli_fetch_assoc($result))
          {
            echo<<<product
              <tr class="align-middle">
                <th scope="row">$i</th>
                <td><img src="$fetch_src$fetch[image]" width="150px"></td>
                <td>$fetch[tour_type]</td>
                <td>$fetch[name]</td>
                <td>$fetch[location]</td>
                <td>$fetch[price]</td>
                <td>$fetch[description]</td>
                <td>
                  <a href="?edit=$fetch[id]" class="btn btn-warning me-2"><i class="bi bi-pencil-square"></i></a> 
                  <button onclick="confirm_rem($fetch[id])" class="btn btn-danger me-2"><i class="bi bi-trash"></i></button>
                </td>
              </tr>
            product;
            $i++;
             
          }  
           

          
        ?>
        
      </tbody>
    </table>
  </div>

  <div class="modal fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>


          <div class="modal-body">

            <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name= "tour_type" required>
              <option selected>Select Tour Type</option>
              <option value="1">Asia</option>
              <option value="2">Europe</option>
              <option value="3">North America</option>
              </select>
            </div>
         
            <div class="input-group mb-3">
              <span class="input-group-text">Tour Name</span>
              <input type="text" class="form-control" name="name" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Location</span>
              <input type="text" class="form-control" name="location" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Price</span>
              <input type="number" class="form-control"name="price" min="1" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Description</span>
              <textarea class="form-control" name="desc" required></textarea>
            </div>

            <div class="input-group mb-3">
              <label class="input-group-text" >Image</label>
              <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg,.jpeg" required>
            </div>
          </div> 

          <div class="modal-footer">
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="addproduct">Add</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <div class="modal fade" id="editproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="crud.php" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Product</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <div class="input-group mb-3">
              <select class="form-select" aria-label="Default select example" name= "tour_type" id="edittour_type" required>
              <option selected>Select Tour Type</option>
              <option value="1">Asia</option>
              <option value="2">Europe</option>
              <option value="3">North America</option>
              </select>
            </div>
            
            <div class="input-group mb-3">
              <span class="input-group-text">Tour Name</span>
              <input type="text" class="form-control"name="name" id="editname" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Location</span>
              <input type="text" class="form-control"name="location" id="editlocation" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Price</span>
              <input type="number" class="form-control"name="price" id="editprice" min="1" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Description</span>
              <textarea class="form-control" name="desc" id="editdesc" required></textarea>
            </div>
            <img src="" id="editimg" width="100%" class="mb-3"><br>

            <div class="input-group mb-3">
              <label class="input-group-text" >Image</label>
              <input type="file" class="form-control" name="image" accept=".jpg,.png,.svg,.jpeg">
            </div>
            <input type="hidden" name="editpid" id="editpid">
          </div> 
          <div class="modal-footer">
            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-success" name="editproduct">Edit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <?php
    if(isset($_GET['edit'])&& $_GET['edit']>0)
    {
      $query="SELECT * FROM `products` WHERE `id`='$_GET[edit]'";
      $result=mysqli_query($con,$query);
      $fetch=mysqli_fetch_assoc($result);
      echo"
        <script>
          var editproduct = new bootstrap.Modal(document.getElementById('editproduct'),{
            keyboard:false
          });
          document.querySelector('#edittour_type').value=`$fetch[tour_type]`;
          document.querySelector('#editname').value=`$fetch[name]`;
          document.querySelector('#editlocation').value=`$fetch[location]`;
          document.querySelector('#editprice').value=`$fetch[price]`;
          document.querySelector('#editdesc').value=`$fetch[description]`;
          document.querySelector('#editimg').src=`$fetch_src$fetch[image]`;
          document.querySelector('#editpid').value=`$_GET[edit]`;
          editproduct.show();
        </script>
      ";
    }

  ?>

  <script>
    function confirm_rem(id){
      if(confirm("Are you sure, you want to delete this item?")){
        window.location.href="crud.php?rem="+id;
      }
    }
  </script>



<script>

// Check if the first_login condition is met
if (<?php echo isset($_SESSION['user']['first_login']) ? $_SESSION['user']['first_login'] : '0'; ?> === 1) {
  // If first_login is 1, trigger the modal
  var newPassModal = new bootstrap.Modal(document.getElementById('newPass'), {
    backdrop: 'static',
    keyboard: false
  });
  newPassModal.show();
}
else{
  newPassModal.hide()
}

</script>


<script>
   setTimeout(function() {
   document.getElementById('success-msg').style.display = 'none';
   }, 4000);
</script>

<script>
   setTimeout(function() {
   document.getElementById('alert-msg').style.display = 'none';
   }, 4000);
</script>





</body>
</html>