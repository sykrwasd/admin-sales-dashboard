<?php
include('../config/connectdb.php');

if (isset($_GET['email'])) {
    $email = $_GET['email'];
    $result = $conn->query("SELECT * FROM users WHERE email = '$email'");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>

        <form id="editProfileForm">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required>
            </div>
            <input type="hidden" name="role" value="<?= $row['role'] ?>">
            <button type="submit" class="btn btn-success">Update</button>
        </form>

        <?php
    } else {
        echo "<div class='alert alert-danger'>User not found.</div>";
    }
}
?>
