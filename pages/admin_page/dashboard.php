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
                    <a href="dashboard.php" class="nav-link active">
                        <i class="bi bi-house"></i>
                        Dashboard
                    </a>            
                </li>
                <li class="nav-item">
                    <a href="sales-orders.php" class="nav-link">
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
                <h4 class="mt-1">Dashboard</h4>                    
                <div class="row g-3">
                    <div class="col-md-3">
                        <div class="card shadow rounded-4 border-0" style="background-color: #63ffad">
                            <div class="card-body">
                                <h6 class="card-title">Total Sales</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 id="orderSales" class="mb-0 fw-bold">...</h4>
                                    <i class="bi bi-cash fs-3"></i>
                                </div>
                                <p id="orderSalesPercent" class="small text-muted mb-0">...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow rounded-4 border-0" style="background-color: #638eff">
                            <div class="card-body">
                                <h6 class="card-title">Sales Today</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 id="todaySales" class="mb-0 fw-bold">...</h4>
                                    <i class="bi bi-calendar-day fs-3"></i>
                                </div>
                                <p id="todaySalesPercent" class="small text-muted mb-0"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow rounded-4 border-0" style="background-color: #ff63dc">
                            <div class="card-body">
                                <h6 class="card-title">Total Orders</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 id="orderCount" class="mb-0 fw-bold">...</h4>
                                    <i class="bi bi-bag-check fs-3"></i>
                                </div>
                                <p id="orderPercent" class="small text-muted mb-0">...</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card shadow rounded-4 border-0" style="background-color: #ffd463">
                            <div class="card-body">
                                <h6 class="card-title">Total Users</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 id="totalUser" class="mb-0 fw-bold fs-5">...</h4>
                                    <i class="bi bi-people fs-3"></i>
                                </div>
                                <p class="small text-muted mb-0">Number of system users</p>
                            </div>
                        </div>
                    </div>
                </div>                                                               
                <h4 class="mt-3">Pie Chart</h4>                                                
                <div class="pie-chart d-flex justify-content-center">
                    <canvas id="pieChart"></canvas>
                </div>
                <h4 class="mt-3">Bar Chart</h4>
                <div class="bar-chart d-flex justify-content-center">
                    <canvas id="barChart"></canvas>
                </div>
            </div>
        </div>
    </div>
    
    <!-- BOOTSTRAP -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!-- CHART JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CUSTOM JS -->
    <script src="../../assets/js/script.js"></script>
    <script src="../../assets/js/chart.js"></script>
    <script src="../../assets/js/dashboard.js"></script>
</body>
</html>