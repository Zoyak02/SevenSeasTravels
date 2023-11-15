<?php
  require("connection.php");
  include("function222.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Application Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body class="bg-light">
    <div class="container text-light p-3 rounded my-4" style="background-color: #12526A;">
        <div class="d-flex align-items-center justify-content-between px-3">
            <h2>
                <a href="index_merchant.php" class="text-white text-decoration-none">
                    <img src="img/Travel Website.png" style="width :80px "></img> Welcome, Tourism Officer.
                </a>
            </h2>
            <li class="login__item" style="list-style-type:none;">
            <a href="index.php?logout=1" class="cd-signin" style="text-decoration:none;padding-top:10px;padding-bottom:10px;margin-right:50px;">Logout</a>
            </li>
        </div>
    </div>
    
    <div class="container mt-4 p-0">
        <table class="table table-bordered table-hover text-center">
            <h1>Pending Approval Account List</h1><br>
            <thead class="thead-light">
                <tr>
                    <th width="10%" scope="col" class="rounded-start">Sr. No</th>
                    <th width="15%" scope="col">Merchant ID</th>
                    <th width="15%" scope="col">Merchant Name</th>
                    <th width="10%" scope="col">Email</th>
                    <th width="10%" scope="col">Status</th>
                    <th width="20%" scope="col" class="rounded-end">Action</th>
                </tr>
            </thead>

            <tbody class=bg-white>
                <?php
         
          // $merchantID = $_SESSION['user']['merchantID'];
          $query = "SELECT merchantID, username, email, status FROM merchant";
          $con = mysqli_connect("localhost", "root", "", "login");
          $result=mysqli_query($con,$query);
          $i=1;
          $fetch_src = FETCH_SRC;

          while($fetch=mysqli_fetch_assoc($result))
          {
            $merchantID = $fetch['merchantID'];
            echo<<<lists
              <tr class="align-middle">
                <th scope="row">$i</th>
                <td>$merchantID</td>
                <td>$fetch[username]</td>
                <td>$fetch[email]</td>
                <td>$fetch[status]</td>
                <td><a href="merchantDetails.php?merchantID=$merchantID">Click here to view the details</a></td>
              </tr>
            lists;
            $i++;
          }
        ?>
            </tbody>
        </table>
    </div>

</body>

</html>