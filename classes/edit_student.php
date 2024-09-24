<?php

include_once 'Database.php';
include_once 'Student.php';


$database = new Database();
$db = $database->getConnection();

$student = new Student($db);


if (isset($_GET['id'])) {
    $student->id = $_GET['id'];

    $stmt = $db->prepare("SELECT * FROM students WHERE id = ?");
    $stmt->execute([$student->id]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$row) {
        echo "No student found with this ID.";
        exit;
    }

    $student->name = $row['name'];
    $student->email = $row['email'];
    $student->phone = $row['phone'];
}


if ($_POST) {
    $student->name = $_POST['name'];
    $student->email = $_POST['email'];
    $student->phone = $_POST['phone'];

    if ($student->update()) {
        $message = "Student updated successfully!";
    } else {
        $message = "Failed to update student.";
    }
}else{

    $message = "";
}
?>

<?php include_once('header.php') ?>
<div class="row row justify-content-center pt-5">
    <div class="col-md-6 card mt-5 p-5 shadow rounded-4">
    <h4>Edit Student</h4>
     <h6 class="text-center"><?php echo $message; ?></h6>
    <form action="edit_student.php?id=<?php echo $student->id; ?>" method="post">
        <label>Name:</label><br>
        <input type="text" name="name" class="form-control" value="<?php echo $student->name; ?>" required><br>
        <label>Email:</label><br>
        <input type="email" name="email" class="form-control" value="<?php echo $student->email; ?>" required><br>
        <label>Phone:</label><br>
        <input type="text" name="phone" class="form-control" value="<?php echo $student->phone; ?>" required><br>
        <input type="submit" class="btn btn-success" value="Update Student">
    </form>
    <a href="../index.php" class="mt-4">Back to Student List</a>
    </div>
  </div>
<?php include_once('footer.php') ?>
