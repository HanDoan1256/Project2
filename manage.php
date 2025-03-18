<?php
include 'settings_asm.php';

// delete single EOI
if (isset($_POST['delete_eoi'])) {
    $eoi_id = $_POST['delete_eoi'];
    $sql = "DELETE FROM eoi WHERE EOInumber = '$eoi_id'"; //delete query
    mysqli_query($conn, $sql);
}

// delete all EOIs for job reference number
if (isset($_POST['delete_job_ref'])) {
    $job_ref = $_POST['delete_job_ref'];
    $sql = "DELETE FROM eoi WHERE job_ref = '$job_ref'";
    mysqli_query($conn, $sql);
}

// update status
if (isset($_POST['update_eoi']) && isset($_POST['new_status'])) { //check if the form contains EOi number to updatr & new status's value
    $eoi_id = $_POST['update_eoi'];
    $new_status = $_POST['new_status'];
    $sql = "UPDATE eoi SET status = '$new_status' WHERE EOInumber = '$eoi_id'"; //update query to change status
    mysqli_query($conn, $sql);
}

// search query
$search_query = "SELECT * FROM eoi"; //select all EOIs
if (!empty($_POST['job_ref']) || !empty($_POST['first_name']) || !empty($_POST['last_name'])) { //check if the manager has entered search form
    $search_query .= " WHERE 1";
    //filter searches
    if (!empty($_POST['job_ref'])) {
        $search_query .= " AND job_ref = '" . $_POST['job_ref'] . "'";
    }
    if (!empty($_POST['first_name'])) {
        $search_query .= " AND first_name LIKE '%" . $_POST['first_name'] . "%'";
    }
    if (!empty($_POST['last_name'])) {
        $search_query .= " AND last_name LIKE '%" . $_POST['last_name'] . "%'";
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

<h2>Management</h2>

<form method="post"> <!-- search form -->
    job reference: <input type="text" name="job_ref">
    first name: <input type="text" name="first_name">
    last name: <input type="text" name="last_name">
    <input type="submit" value="Search">
</form>

<form method="post"> <!-- delete by job reference form -->
    Delete EOIs for Job Reference: <input type="text" name="delete_job_ref" required>
    <input type="submit" value="Delete">
</form>


<table border="1"> <!-- display EOI table -->
    <tr>
        <th>EOI Number</th>
        <th>Job Ref</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?= $row['EOInumber'] ?></td>
            <td><?= $row['job_ref'] ?></td>
            <td><?= $row['first_name'] . " " . $row['last_name'] ?></td>
            <td><?= $row['email'] ?></td>
            <td><?= $row['phone'] ?></td>
            <td><?= $row['status'] ?></td>
            <td>
                <form method="post" style="display:inline;"> <!-- delete button for each EOI -->
                    <input type="hidden" name="delete_eoi" value="<?= $row['EOInumber'] ?>">
                    <input type="submit" value="Delete">
                </form>
                <form method="post" style="display:inline;"> <!-- update EOI's status -->
                    <input type="hidden" name="update_eoi" value="<?= $row['EOInumber'] ?>">
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

</body>
</html>

<?php
    mysqli_close($conn);
?>
