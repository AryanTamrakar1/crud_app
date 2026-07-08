<?php include('header.php'); ?>
<?php include('dbcon.php'); ?>


<div class="box1">
    <h2>ALL STUDENTS</h2>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">ADD STUDENTS</button>
</div>

<table class="table table-hover table-bordered table-striped">
    <thead>
        <tr>
            <th> ID</th>
            <th> FIRST NAME </th>
            <th> LAST NAME</th>
            <th> AGE</th>
            <th>Update</th>
            <th> Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $query = "select * FROM students";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query Failed" . mysqli_error($connection));
        } else {
            while ($row = mysqli_fetch_assoc($result)) {
        ?>

                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['age']; ?></td>
                    <td><a href="update_page_1.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Update</a></td>
                    <td><a href="delete_page.php?id=<?php echo $row['id']; ?>" class="btn btn-danger">Delete</a></td>
                </tr>
        <?php
            }
        }

        ?>

    </tbody>
</table>


<?php
if (isset($_GET['insert_msg'])) {
    echo "<h6>" . $_GET['insert_msg'] . "</h6>";
}

?>

<?php
if (isset($_GET['update_msg'])) {
    echo "<h6>" . $_GET['update_msg'] . "</h6>";
}

?>

<?php
if (isset($_GET['delete_msg'])) {
    echo "<h6>" . $_GET['delete_msg'] . "</h6>";
}

?>


<!-- Modal -->

<form action="insert_data.php" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="f_name">First Name</label>
                        <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Enter First Name">
                    </div>
                    <div class="form-group">
                        <label for="l_name">Last Name</label>
                        <input type="text" class="form-control" id="l_name" name="l_name" placeholder="Enter Last Name">
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="number" class="form-control" id="age" name="age" placeholder="Enter Age">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" class="btn btn-primary" name="add_student" value="ADD">
                </div>
            </div>
        </div>
    </div>
</form>
<?php include('footer.php'); ?>