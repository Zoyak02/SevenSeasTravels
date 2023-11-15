<div class="container-fluid">

            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"> EDIT Merchants </h5>
                </div>
                <div class="card-body">
   
   
   
   <div class="table-responsive">
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login";

        // Step 1: Connect to Database
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        // Check Connection
        if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT * FROM merchant";
        $result = $mysqli->query($sql);
    ?>
    
      <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
          <tr>
              <th style="text-align: center;"> Merchant ID </th>
              <th> Merchant Username </th>
              <th>Password</th>
              <th>Email Address</th>
              <th>Contact Number </th>
              <th>Description</th>
              <th style="text-align: center;">Status</th>
              <th style="text-align: center;">EDIT</th>
              <th style="text-align: center;">DELETE</th>
          </tr>
        </thead>
        <tbody>
        <?php
        if(mysqli_num_rows($result) > 0)        
        {
            while($row = mysqli_fetch_assoc($result))
            {
               ?>
          <tr>
            <td style="text-align: center;"><?php  echo $row['merchantID']; ?></td>
            <td><?php  echo $row['username']; ?></td>
            <td><?php  echo $row['password']; ?></td>
            <td><?php  echo $row['email']; ?></td>
            <td><?php  echo $row['number']; ?></td>
            <td><?php  echo $row['description']; ?></td>
            <td style="text-align: center;"><?php  echo $row['status']; ?></td>
            <td>
                <form action="merchantsEdit.php" method="post" style="text-align: center;">
                    <input type="hidden" name="edit_id" value="<?php echo $row["merchantID"]; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="merchantsDelete.php" method="post" style="text-align: center;">
                  <input type="hidden" name="delete_id" value="<?php echo $row["merchantID"]; ?>">
                  <button onclick="return confirm('Are you sure you want to delete this record?')" type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                </form>
            </td>
          </tr>

          <?php
            } 
        }
        else {
            echo "<h5><i>No Record Found</i></h5><br>";
        }
        ?>
        </tbody>
      </table>
    </div>

    </div>
    </div>