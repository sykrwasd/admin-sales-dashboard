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
            <div class="container py-5 d-flex justify-content-center">
                <div class="card shadow rounded-4" style="width: 400px;">
                    <div class="card-body text-center p-3">
                        <img src="../../assets/img/default-profile-pic.png" alt="Profile Picture" class="rounded-circle mb-3" width="120" height="120" />
                        
                        <h4 class="card-title mb-1"><?= $_SESSION['name']?></h4>
                        <p class="text-muted mb-1"><?= $_SESSION['email']?></p>
                        <span class="badge bg-primary fs-6 text-uppercase"><?= $_SESSION['role']?></span>
                    </div>
                    <div class="d-flex justify-content-center gap-3 m-3">
                        <a href="#" 
                        class="btn btn-outline-primary edit-btn" 
                        data-email="<?=$_SESSION['email']?>" 
                        data-bs-toggle="modal"
                        data-bs-target="#editModal">
                        Edit Profile
                        </a>
                        <a href="#" class="btn btn-outline-danger delete-btn" data-email="<?=$_SESSION['email']?>">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="editModalBody">
            <p class="text-center">Loading form...</p>
        </div>
        </div>
    </div>
    </div>
    
    <script>
        document.addEventListener("click", function (e) {

        // For edit button
        if (e.target.classList.contains("edit-btn")) { // use contains because when using addeventlistener, it only read what in the first page
            e.preventDefault(); // prevent default link action        
    
            const userEmail = e.target.getAttribute("data-email");
            const modalBody = document.getElementById("editModalBody");
    
            // Show loading message
            modalBody.innerHTML = "<p class='text-center'>Loading form...</p>";
    
            // Fetch the edit form
            fetch(`../../actions/profile_fetch_form.php?email=${userEmail}`)
                .then(response => response.text())
                .then(html => {
                    modalBody.innerHTML = html;
    
                    const form = document.getElementById("editProfileForm");
    
                    form.addEventListener("submit", function (e) {
                        e.preventDefault();
    
                        const formData = new FormData(form);
    
                        fetch("../../actions/profile_update.php", {
                            method: "POST",
                            body: formData
                        })
                        .then(res => res.text())
                        .then(response => {
                            if (response.trim() === "success") {
                                // Calling sweet alert
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Profile updated!',
                                    showConfirmButton: false,
                                    timer: 1500
                                }).then(() => {
                                    window.location.reload();
                                });
                            }
                        });
                    });
                })
                .catch(error => {
                    modalBody.innerHTML = `<div class="alert alert-danger">Error loading form.</div>`;
                    console.error("Error:", error);
                });
        }

        // For delete button
        if (e.target.classList.contains("delete-btn")) {
            const userEmail = e.target.getAttribute("data-email");

            // Calling sweet alert
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#aaa',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Send delete request to PHP
                    fetch(`../../actions/profile_delete.php?email=${userEmail}`)
                        .then(response => response.text())
                        .then(result => {
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'The profile has been deleted.',
                                icon: 'success',
                                timer: 1500,
                                showConfirmButton: false
                            }).then(() => {
                                // Reload the page to update the table
                                window.location.href = '../../actions/logout.php'
                            });
                        })
                        .catch(error => {
                            Swal.fire('Error!', 'Failed to delete the order.', 'error');
                            console.error(error);
                        });
                }
            });
        }

    })

    </script>

    <!-- SWAL -->    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="../../assets/js/script.js"></script>
</body>
</html>