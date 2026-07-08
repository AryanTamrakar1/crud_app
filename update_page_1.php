<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<?php
$row = ['first_name' => '', 'last_name' => '', 'age' => ''];

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "select * FROM students where `id` = $id";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        $row = mysqli_fetch_assoc($result);
    }
}
?>


<?php
if (isset($_POST["update_students"])) {

    if (isset($_GET['id_new'])) {
        $idnew = $_GET['id_new'];
    }


    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $age = $_POST['age'];

    $query = "update `students` set `first_name` = '$fname', `last_name` = '$lname', `age` = '$age' where `id` = '$idnew'";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query Failed" . mysqli_error($connection));
    } else {
        header('location:index.php?update_msg= you have successfully updated the data');
    }
}
?>


<a href="index.php" class="btn btn-secondary">Back</a>
<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
    <div class="form-group">
        <label for="f_name">First Name</label>
        <input type="text" class="form-control" id="f_name" value=" <?php echo $row['first_name']; ?> " name="f_name" placeholder="Enter First Name">
    </div>
    <div class="form-group">
        <label for="l_name">Last Name</label>
        <input type="text" class="form-control" id="l_name" value=" <?php echo $row['last_name']; ?> " name="l_name" placeholder="Enter Last Name">
    </div>
    <div class="form-group">
        <label for="age">Age</label>
        <input type="number" class="form-control" id="age" value="<?php echo $row['age']; ?>" name="age" placeholder="Enter Age">
    </div>
    <input type="submit" class="btn btn-primary" name="update_students" value="UPDATE">
</form>


<?php include('footer.php'); ?>