<?php
  require("connection.php");
  include("function222.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant's Account Detail Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/merchant_details.css">
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
        <?php
            $db = mysqli_connect('localhost', 'root', '', 'login');
            $merchantID = $_GET['merchantID'];

if (!empty($merchantID)) {
    $query = "SELECT * FROM merchant WHERE merchantID = ?";
    $stmt = mysqli_prepare($db, $query);
    mysqli_stmt_bind_param($stmt, "s", $merchantID);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($fetch = mysqli_fetch_assoc($result)) {
        ?>
        <table class="table table-bordered table-hover text-center">
            <h1>Merchant's Account Detail</h1><br>
            <thead class="thead-light">
                <tr>
                    <th width="10%" scope="col" class="rounded-start">Merchant ID</th>
                    <td><?php echo $fetch['merchantID']; ?></td>
                </tr>
                <tr>
                    <th width="10%" scope="col">Merchant Name</th>
                    <td><?php echo $fetch['username']; ?></td>
                </tr>
                <tr>
                    <th width="10%" scope="col">Email</th>
                    <td><?php echo $fetch['email']; ?></td>
                </tr>
                <tr>
                    <th width="10%" scope="col">Phone Number</th>
                    <td><?php echo $fetch['number']; ?></td>
                </tr>
                <tr>
                    <th width="10%" style="padding: 100px;" scope="col">logo</th>
                    <td><img src="<?php echo $fetch['logo']; ?>" style="width:400px;"alt="Logo"></td>
                </tr>
                <tr>
                    <th width="10%" style="padding: 80px;" scope="col">Description</th>
                    <td><?php echo $fetch['description']; ?></td>
                </tr>
                <tr>
                    <th width="10%" scope="col">Document</th>
                    <td><a href="<?php echo $fetch['document']; ?>" target="_blank">View Document</a></td>
                </tr>
            </thead>
        </table>
        <?php
        
    } 
    else {
        echo "No details found for this merchant.";
    }
    mysqli_stmt_close($stmt); // Close the statement
    mysqli_close($db); // Close the database connection
}
?>

        <div class="button-container">

            <!-- Buttons to trigger modals -->

            <div>
                <button onclick="confirmApprove()" class="btn btn-success">
                    Approve Application
                </button>&nbsp;&nbsp;
                <div class="modal fade" id="approveModal" tabindex="-1" role="dialog"
                    aria-labelledby="approveModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="approveModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p id="approveMessage"></p>
                                <?php
                                $db = mysqli_connect('localhost', 'root', '', 'login');
                                $merchantID = $_GET['merchantID'];
                                // $password = generateDefaultPassword();
                                
                                $query = "SELECT email,username FROM merchant WHERE merchantID = '$merchantID'";
                                $result=mysqli_query($db,$query);
                                $fetch_src = FETCH_SRC;
                                while($fetch=mysqli_fetch_assoc($result))
                                {
                                    echo "Login Name: $fetch[username]<br>";
                                    echo "The password has been sent to the $fetch[email].<br>";
                                    echo "Record updated successfully.";
                                }
                            ?>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="redirectToPendingApplication()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <button onclick="confirmReject()" class="btn btn-danger">
                    Reject Application
                </button>
                <div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="rejectModalLabel">Confirmation</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p id="rejectMessage"></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="redirectToPendingApplication()">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <?php              
            function generateDefaultPassword() {
                $length = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $password = '';
                for ($i = 0; $i < $length; $i++) {
                    $password .= $characters[rand(0, strlen($characters) - 1)];
                }
                return $password;
            }
        ?>
    </div>
    </div>

    <script>
    function confirmApprove() {
        var confirmation = confirm("Are you sure you want to approve this application?");
        if (confirmation) {
            // Make an AJAX request to update the record
            $.ajax({
                type: "POST",
                url: "updateApprovalApplication.php", // Update this with the correct URL
                data: {
                    action: "approve",
                    merchantID: <?php echo json_encode($_GET['merchantID']); ?> // Pass the merchantID from PHP to JavaScript
                },
                success: function(response) {
                    // Handle the response
                    $('#approveMessage').html(response);
                    $('#approveModal').modal('show');
                }
            });
        }
    }

    function confirmReject() {
        var confirmation = confirm("Are you sure you want to reject this application?");
        if (confirmation) {
            // Make an AJAX request to update the record
            $.ajax({
                type: "POST",
                url: "updateApprovalApplication.php", // Update this with the correct URL
                data: {
                    action: "reject",
                    merchantID: <?php echo json_encode($_GET['merchantID']); ?> // Pass the merchantID from PHP to JavaScript
                },
                success: function(response) {
                    // Handle the response
                    $('#rejectMessage').html(response);
                    $('#rejectModal').modal('show');
                }
            });
        }
    }

    function redirectToPendingApplication() {
        window.location.href = 'pendingApplication.php';
    }
    </script>

</body>

</html>