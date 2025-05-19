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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Page</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/form.css">    
  </head>
<body>    
    <!-- Loading overlay -->
    <div id="loadingOverlay" style="display: none;">
        <div class="loader"></div>
    </div>

    <div class="card-form">
        <div class="card p-4 shadow" style="width: 350px;">
          <h4 class="mb-3 text-center">Ramentic <br> Spreadsheet Form</h4>          
          <h6 id="collegeDisplay" class="badge col-5 align-self-center"></h6>  
          <form id="orderForm" method="POST" action="../../actions/submit_order.php">

            <div class="mb-3">   
                <p class="form-label">Name</p>          
                <input 
                type="text" 
                class="form-control" 
                id="inputName" 
                name="name"
                placeholder="Enter name"
                required>
            </div>
            <div class="mb-3">
                <p class="form-label">Phone number</p>
                <div class="input-group">                              
                    <span class="input-group-text">+60</span>
                    <input 
                    type="tel" 
                    class="form-control" 
                    id="inputPhoneNum" 
                    name="phoneNum"        
                    placeholder="Enter phone number"
                    oninput="if(this.value.startsWith('0')) this.value = '';"
                    pattern="[0-9]{9,10}"
                    maxlength="10"
                    required>
                </div>
            </div>
            <div class="mb-3">               
                <p class="form-label">Room number</p>          
                <input 
                type="text" 
                class="form-control" 
                id="inputRoom" 
                name="roomNum"
                placeholder="Enter room number">
            </div>
            <div class="mb-3">               
                <p class="form-label">Method</p>          
                <select class="form-select" name="method" required>                    
                    <option value="pickup">Pick up</option>
                    <option value="delivery">Delivery</option>
                </select>    
            </div>        
            <div class="mb-3">               
                <p class="form-label">Total price</p>          
                <input 
                type="number" 
                class="form-control" 
                id="inputPrice" 
                name="totalPrice"
                placeholder="Enter total price"
                step="0.01"
                required>
            </div>
            <button 
            type="submit"
            class="btn btn-primary w-100 mb-3"
            name="order">
            Submit
            </button>         
            <a href="college.php" class="btn btn-outline-secondary w-100">Back</a>
          </form>
        </div>
    </div>
    <footer>
        <p>Copyright &#169; 2025 Syahril Haiqal. All Rights Reserved.</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>    
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>