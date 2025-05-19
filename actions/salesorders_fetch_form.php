<?php
include('../config/connectdb.php');

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $result = $conn->query("SELECT * FROM orders WHERE id = $id");

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>

        <form id="editOrderForm">
            <input type="hidden" name="id" value="<?= $row['id'] ?>">
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($row['name']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Phone Number</label>
                <input type="text" name="phoneNum" class="form-control" value="<?= htmlspecialchars($row['phoneNum']) ?>" required>
            </div>
            <div class="mb-3">
                <label>College Name</label>
                <input type="text" name="collegeName" class="form-control" value="<?= htmlspecialchars($row['collegeName']) ?>" required>
            </div>
            <div class="mb-3">
                <label>Room Number</label>
                <input type="text" name="roomNum" class="form-control" value="<?= htmlspecialchars($row['roomNum']) ?>">
            </div>
            <div class="mb-3">
                <label>Method</label>
                <select name="method" class="form-select">
                    <option <?= $row['method'] == 'delivery' ? 'selected' : '' ?>>Delivery</option>
                    <option <?= $row['method'] == 'pickup' ? 'selected' : '' ?>>Pickup</option>
                </select>
            </div>
            <div class="mb-3">
                <label>Total Price (RM)</label>
                <input type="number" name="totalPrice" class="form-control" step="0.01" value="<?= $row['totalPrice'] ?>" required>
            </div>
            <div class="mb-3">
                <label>Date</label>
                <input type="date" name="orderDate" class="form-control" value="<?= $row['orderDate'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Update</button>
        </form>

        <?php
    } else {
        echo "<div class='alert alert-danger'>Order not found.</div>";
    }
}
?>
