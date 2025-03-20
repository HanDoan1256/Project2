<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit();
}

echo "<h1>Welcome to the Management Page, " . $_SESSION['username'] . "!</h1>";

require_once "settings.php";
$conn = new mysqli($host, $user, $pwd, $sql_db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// delete all EOIs for a specified job ref
if (isset($_POST['delete_job_ref'])) {
    $job_ref_num = mysqli_real_escape_string($conn, $_POST['delete_job_ref']);
    $sql = "DELETE FROM eoi WHERE job_ref_num = '$job_ref_num'";

}

// update EOI's Status
if (isset($_POST['update_eoi']) && isset($_POST['new_status'])) {
    $eoi_num = mysqli_real_escape_string($conn, $_POST['update_eoi']);
    $new_status = mysqli_real_escape_string($conn, $_POST['new_status']);
    $sql = "UPDATE eoi SET status = '$new_status' WHERE eoi_num = '$eoi_num'";

}

// search query
$search_query = "SELECT * FROM eoi";
if (!empty($_POST['job_ref_num']) || !empty($_POST['search_name'])) {
    $search_query .= " WHERE 1";
    if (!empty($_POST['job_ref_num'])) {
        $search_query .= " AND job_ref_num = '" . mysqli_real_escape_string($conn, $_POST['job_ref_num']) . "'";
    }
    if (!empty($_POST['search_name'])) {
        $search_name = mysqli_real_escape_string($conn, $_POST['search_name']);
        $search_query .= " AND (first_name LIKE '%$search_name%' OR last_name LIKE '%$search_name%')";
    }
}
$result = mysqli_query($conn, $search_query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Management</title>
</head>
<body>
<?php include 'header.inc'; ?>

<h2>Management</h2>

<!-- form -->
<form method="post">
    Job Reference: <input type="text" name="job_ref_num">
    Name: <input type="text" name="search_name" placeholder="Enter first name, last name, or both">
    <input type="submit" value="Search">
</form>

<!-- form to delete EOI jor job ref  -->
<form method="post">
    Delete EOIs for Job Reference: <input type="text" name="delete_job_ref" required>
    <input type="submit" value="Delete">
</form>

<!-- EOI table display -->
<table border="1">
    <tr>
        <th>EOI Number</th>
        <th>Job Ref</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['eoi_num'] ?></td>
            <td><?= $row['job_ref_num'] ?></td>
            <td><?= $row['first_name'] . " " . $row['last_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone_number'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <!-- form to update status -->
                <form method="post" style="display:inline;">
                    <input type="hidden" name="update_eoi" value="<?= $row['eoi_num'] ?>">
                    <select name="new_status">
                        <option value="New">New</option>
                        <option value="Current">Current</option>
                        <option value="Final">Final</option>
                    </select>
                    <input type="submit" value="Update">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<br> <br>
<form action="logout.php" method="post">
        <button type="submit">Logout</button>
</form>

<br><br>
<?php include 'footer.inc'; ?>
</body>
</html>

<?php
mysqli_close($conn);
?>
