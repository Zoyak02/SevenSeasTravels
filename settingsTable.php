<style>
    th.b {
        table-layout: fixed;
    }

    td.b {
        table-layout: fixed;
    }

    th.a {
        table-layout: auto;
    }

    td.a {
        table-layout: auto;
    }
    </style>

<div class="container-fluid">

           
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h5 class="m-0 font-weight-bold text-primary"> EDIT Policies and About Us </h5>
                </div>
                <div class="card-body">
   
   
   
   <div class="table-responsive" style="overflow-x:auto;">
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

        $sql = "SELECT * FROM policy";
        $result = $mysqli->query($sql);
    ?>
    
      <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
          <tr>
              <th style="text-align: center;" class="a"> Policy ID </th>
              <th class="b"> Privacy Policy Description </th>
              <th class="b"> About Us Description </th>
              <th style="text-align: center;">EDIT</th>
              
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
            <td style="text-align: center;" class="a"><?php  echo $row['policyID']; ?></td>
            <td class="b"><?php  echo $row['policyDescription']; ?></td>
            <td class="b"> <?php  echo $row['aboutUsDescription']; ?></td>
            <td>
                <form action="settingsEdit.php" method="post" style="text-align: center;">
                    <input type="hidden" name="edit_policyID" value="<?php echo $row["policyID"]; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
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