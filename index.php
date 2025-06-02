<?php

session_start();

$errors = [
    'login' => isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '',
    'register' => isset($_SESSION['register_error']) ? $_SESSION['register_error'] : ''
];
$activeForm = isset($_SESSION['active_form']) ? $_SESSION['active_form'] : 'login';


session_unset();

function showError($error) {
    return !empty($error) ? "<p class='error-message'> $error</p>" : '';
}

function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="min-vh-100 d-flex justify-content-center align-items-center background-index">
    <div class="container">
        <div class="form-box <?= isActiveForm('login', $activeForm); ?> d-flex justify-content-center" id="login-form">
            <div class="card col-12 col-sm-8 col-md-6 col-lg-4 p-4">
                <form action="actions/login_register.php" method="post" >
                    <h2 class="text-center">Login</h2>
                    <?= showError($errors['login']); ?>
                    <div class="mb-3">
                        <p class="form-label">Email</p>
                        <input 
                        type="email" 
                        name="email" 
                        class="form-control"
                        placeholder="Email" 
                        required>
                    </div>       
                    <div class="mb-3">
                        <p class="form-label">Password</p>
                        <input 
                        type="password" 
                        name="password" 
                        class="form-control"
                        placeholder="Password" 
                        required>                        
                    </div>             
                    <div class="mb-3 d-flex flex-column align-items-center">
                        <button 
                        type="submit" 
                        class="btn btn-outline-primary w-25 mb-2" 
                        name="login">
                        Login
                        </button>
                        <p class="m-0">Don't have an account? <a class="text-decoration-none" href="" onclick="event.preventDefault(); showForm('register-form')">Register</a></p>
                    </div>
                </form>
            </div>            
        </div>
        <div class="form-box <?= isActiveForm('register', $activeForm); ?> d-flex justify-content-center" id="register-form">
            <div class="card col-12 col-sm-8 col-md-6 col-lg-4 p-4">
                <form action="actions/login_register.php" method="post" >
                    <h2 class="text-center">Register</h2>
                    <?= showError($errors['register']); ?>
                    <div class="mb-3">
                        <p class="form-label">Name</p>
                        <input 
                        type="text" 
                        name="name" 
                        class="form-control"
                        placeholder="Name" 
                        required>
                    </div>       
                    <div class="mb-3">
                        <p class="form-label">Email</p>
                        <input 
                        type="email" 
                        name="email" 
                        class="form-control"
                        placeholder="Email" 
                        required>
                    </div>       
                    <div class="mb-3">
                        <p class="form-label">Password</p>
                        <input 
                        type="password" 
                        name="password" 
                        class="form-control"
                        placeholder="Password" 
                        required>                        
                    </div> 
                    <div class="mb-3">
                        <p class="form-label">Role</p>
                            <select 
                            class="form-select"
                            name="role">
                                <option value="">--Select Role--</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                    </div>               
                    <div class="mb-3 d-flex flex-column align-items-center">
                        <button 
                        type="submit" 
                        class="btn btn-outline-primary mb-2" 
                        name="register">
                        Register
                        </button>
                        <p class="m-0">Already have an account? <a class="text-decoration-none" href="" onclick="event.preventDefault(); showForm('login-form')">Login</a></p>
                    </div>
                </form>
            </div>            
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</body>
</html>