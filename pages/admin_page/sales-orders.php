<?php

    session_start();
    if (!isset($_SESSION['email'])) {
        header("Location: ../../index.php");
        exit();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">  
    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">  
    <!-- Datatables -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css">  
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.0/css/dataTables.bootstrap5.css">
    <!-- Custom css -->
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar d-flex flex-column flex-shrink p-3 text-white bg-dark">   

            <!-- Brand section -->
            <div id="brand">
                <a href="dashboard.php" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <i class="bi bi-house-door-fill fs-2 me-2"></i>
                <span class="fs-4">My dashboard</span>            
                </a>
            </div>

            <hr>

            <!-- Navigation menu -->
            <ul class="nav nav-pills flex-column mb-auto" id="sidebar-nav">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link">
                        <i class="bi bi-house"></i>
                        Dashboard
                    </a>            
                </li>
                <li class="nav-item">
                    <a href="sales-orders.php" class="nav-link active">
                        <i class="bi bi-receipt"></i>
                        Sales Orders
                    </a>            
                </li>
                <li class="nav-item">
                    <a href="users.php" class="nav-link">
                        <i class="bi bi-people"></i>
                        Users
                    </a>            
                </li>
                <li class="nav-item">
                    <a href="products.php" class="nav-link">
                        <i class="bi bi-house"></i>
                        Products
                    </a>
                </li>            
            </ul>

            <hr>

            <!-- Dropdown -->
            <div class="dropdown d-flex flex-col">
                <img src="../../assets/img/default-profile-pic.png" alt="" width="32" height="32" class="rounded-circle me-2">
                <div class="p-1">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle rounded" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <strong><?= $_SESSION['name']; ?></strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#" onclick="window.location.href='../../actions/logout.php'">Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- MAIN -->
        <div class="main-content">

            <!-- Navigation bar -->
            <nav class="navbar navbar-dark navbar-expand px-3" style="background-color: #343a40;">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-items d-flex ms-auto align-items-center">
                    <p id="welcome" class="me-2">Welcome, <?= $_SESSION['name'] ?></p> 
                    <a id="navbar-profile" class="d-flex align-items-center justify-content-center" href="profile.php">
                        <i class="bi bi-person-circle text-white"></i>
                    </a>
                </div>  
            </nav>
            <!-- Content -->
            <div class="content container-fluid p-3">
                <div class="p-3">
                    <table id="ordersTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>College Name</th>
                                <th>Room Number</th>
                                <th>Method</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            include('../../config/connectdb.php');

                            $sql = "SELECT * FROM orders";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "  <tr>
                                                <td>" . htmlspecialchars($row['id']) . "</td>
                                                <td>" . htmlspecialchars($row['name']) . "</td>
                                                <td>" . htmlspecialchars($row['phoneNum']) . "</td>
                                                <td>" . htmlspecialchars($row['collegeName']) . "</td>
                                                <td>" . htmlspecialchars($row['roomNum']) . "</td>
                                                <td>" . htmlspecialchars($row['method']) . "</td>
                                                <td>" . htmlspecialchars($row['totalPrice']) . "</td>
                                                <td>" . htmlspecialchars($row['orderDate']) . "</td>
                                                <td>
                                                    <a href='#' 
                                                    class='btn btn-sm btn-primary edit-btn' 
                                                    data-id='" . $row['id'] . "' 
                                                    data-bs-toggle='modal'
                                                    data-bs-target='#editModal'>
                                                    Edit
                                                    </a>
                                                    <button 
                                                        class='btn btn-sm btn-danger delete-btn'
                                                        data-id=" . $row['id'] . ">
                                                        Delete
                                                    </button>
                                                </td>
                                            </tr>";
                                }
                            }
                            else {
                                echo "<div class='alert alert-warning'>No data found.</div>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>                
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Order</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editModalBody">
            <p class="text-center">Loading form...</p>
        </div>
        </div>
    </div>
    </div>

    <!-- SWAL -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Datatables -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.3.0/js/dataTables.bootstrap5.js"></script>
    <!-- Custom JS -->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/table_orders.js"></script>
</body>
</html>