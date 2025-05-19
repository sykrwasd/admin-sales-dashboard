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
                    <a href="dashboard.php" class="nav-link">
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
                    <a href="products.php" class="nav-link active">
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
                <h2 class="text-center mb-4">Our Buldak Ramen Collection</h2>
                    <div class="row g-4">
                        <!-- Product -->
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="https://down-my.img.susercontent.com/file/9da5764161948dc353c9024b6f8382ce" alt="Original Ramen">
                                <div class="overlay">
                                    <h5>Original Buldak Ramen</h5>
                                    <p>Classic Korean spice. Unforgettable heat.</p>
                                    <p class="text-end m-0">RM5.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="https://jgcj.jayagrocer.com/cdn/shop/files/155442-1-1_436d13fb-c268-4df1-8219-7ddf0262420f_1024x.jpg?v=1721805692" alt="Carbonara Ramen">
                                <div class="overlay">
                                    <h5>Carbonara Buldak Ramen</h5>
                                    <p>Smooth and savory with a hint of smoky bacon.</p>
                                    <p class="text-end m-0">RM5.50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="https://jgcj.jayagrocer.com/cdn/shop/files/155439-5-1_700x.jpg?v=1736742196" alt="Cheese Ramen">
                                <div class="overlay">
                                    <h5>Cheese Buldak Ramen</h5>
                                    <p>Creamy, rich, and perfectly cheesy goodness.</p>
                                    <p class="text-end m-0">RM5.50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="https://jgcj.jayagrocer.com/cdn/shop/products/126973-1-1_700x.jpg?v=1699950702" alt="Stew Ramen">
                                <div class="overlay">
                                    <h5>Stew Buldak Ramen</h5>
                                    <p>Hearty and comforting, like a warm home-cooked meal.</p>
                                    <p class="text-end m-0">RM5.50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="product-card">
                                <img src="https://jgcj.jayagrocer.com/cdn/shop/files/018879-5-1_29454281-9b00-42fe-9251-6e73f398f5dd_700x.jpg?v=1746787379" alt="Cheese carbonara Ramen">
                                <div class="overlay">
                                    <h5>Cream Carbonara Buldak Ramen</h5>
                                    <p>Luxuriously creamy with a delicate cheesy touch.</p>
                                    <p class="text-end m-0">RM5.50</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="../../assets/js/script.js"></script>
</body>
</html>