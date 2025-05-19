<?php
include('../config/connectdb.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM users WHERE id = $id");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>

        <form id="editUserForm">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= htmlspecialchars($row['email']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Role</label>
                <select name="role" class="form-select">
                    <option <?= $row['role'] == 'Admin' ? 'selected' : '' ?>>Admin</option>
                    <option <?= $row['role'] == 'User' ? 'selected' : '' ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

        <?php
    } else {
        echo "<div class='alert alert-danger'>User not found.</div>";
    }
}
?>
