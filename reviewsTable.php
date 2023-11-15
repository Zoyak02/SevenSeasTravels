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
                    <h5 class="m-0 font-weight-bold text-primary"> EDIT Reviews </h5>
                </div>
                <div class="card-body">
   
   
   
   <div class="table-responsive" style="overflow-x:auto;">
    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bookings";

        // Step 1: Connect to Database
        $mysqli = new mysqli($servername, $username, $password, $dbname);

        // Check Connection
        if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT * FROM purchases";
        $result = $mysqli->query($sql);
    ?>
    
      <table class="table table-bordered" id="dataTable" cellspacing="0">
        <thead>
          <tr>
              <th style="text-align: center;" class="a"> Order ID </th>
              <th style="text-align: center;" class="a"> User ID </th>
              <th class="b"> Username </th>
              <th class="b"> Tour Location </th>
              <th class="b"> Product Name </th>
              <th style="text-align: center;" class="b"> Guests </th>
              <th style="text-align: center;" class="b"> Star Rating </th>
              <th class="b"> Review </th>
              <th style="text-align: center;">EDIT</th>
              <th style="text-align: center;">DELETE</th>
              
          </tr>
        </thead>
        <tbody>
        <?php

        //function & switch statement to read convert rating number into rating stars
        function to_stars($num){
       
        switch($num){

            case 0: 

                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                 echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                 echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                 echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                 echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                 break;

            case 1: 

                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                break;

            case 2:

                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                break;

            case 3:

                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                break;

            case 4:

                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                break;

            case 5:

                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                echo '<img src="admin_logos/star.png" style="height: 25px; width: 25px;" />';
                break;

            case null:

                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                echo '<img src="admin_logos/empty star logo.png" style="height: 25px; width: 25px;"/>';
                break;

            default:
                
                echo '<h5 style="color: red;"><i>Error in Retrieving User Ratings</i></h5>';
            
        }   
        
        }
   

        if(mysqli_num_rows($result) > 0)        
        {
            while($row = mysqli_fetch_assoc($result))
            {
               ?>
          <tr>
            <td style="text-align: center;" class="a"><?php  echo $row['orderID']; ?></td>
            <td style="text-align: center;" class="b"><?php  echo $row['userID']; ?></td>
            <td class="b"><?php  echo $row['username']; ?></td>
            <td class="b"><?php  echo $row['tour_location']; ?></td>
            <td class="b"><?php  echo $row['product_name']; ?></td>
            <td style="text-align: center;" class="b"><?php  echo $row['guests']; ?></td>
            <td style="text-align: center;" class="b"><?php  echo to_stars($row['star_rating']); ?></td> <!--calls function to_stars-->
            <td class="b"><?php  echo $row['review']; ?></td>
            <td>
                <form action="reviewsEdit.php" method="post" style="text-align: center;">
                    <input type="hidden" name="edit_orderID" value="<?php echo $row["orderID"]; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="reviewsDelete.php" method="post" style="text-align: center;">
                  <input type="hidden" name="delete_id" value="<?php echo $row["orderID"]; ?>">
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