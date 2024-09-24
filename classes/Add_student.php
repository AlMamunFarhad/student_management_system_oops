<?php
include_once ('Database.php');
include_once ('Student.php');

if ($_POST) {
    $database = new Database();
    $db = $database->getConnection();

    $student = new Student($db);

    $student->name = $_POST['name'];
    $student->email = $_POST['email'];
    $student->phone = $_POST['phone'];

    if ($student->create()) {
        $message = "Student added successfully!";
    } else {
        $message = "Failed to add student.";
    }
}else{
    $message = "";
}
?>

<?php include('header.php') ?>
   <div class="row justify-content-center pt-5">
     <div class="col-md-6 card mt-5 p-5 shadow rounded-4">
    <h4>Add New Student</h4>
    <form action="add_student.php" method="post">
        <h6 class="text-center"><?php echo $message; ?></h6>
        <label>Name:</label><br>
        <input type="text" name="name" class="form-control" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" class="form-control" required><br>
        <label>Phone:</label><br>
        <input type="text" name="phone" class="form-control" required><br>
        <input type="submit" class="btn btn-success rounded-2" value="Add Student">
    </form>
    <a href="../index.php" class="mt-4">Back to Student List</a>
    </div>
</div>
<?php include('footer.php') ?>
