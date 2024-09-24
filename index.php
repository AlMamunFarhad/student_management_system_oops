<?php
include_once 'classes/Database.php';
include_once 'classes/Student.php';

$database = new Database();
$db = $database->getConnection();

$student = new Student($db);
$stmt = $student->readAll();

?>
<?php include_once('classes/header.php') ?>
<div class="row py-5">
    <h1>All Students</h1>
      <div class="mb-3 d-flex justify-content-end">
         <a href="classes/add_student.php" class="btn btn-success ">Add New Student</a>
      </div>
    <table class="table table-hover">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th class="text-end pe-4">Actions</th>
        </tr>
        <?php
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            extract($row);
            echo "<tr>";
            echo "<td>{$id}</td>";
            echo "<td>{$name}</td>";
            echo "<td>{$email}</td>";
            echo "<td>{$phone}</td>";
            echo "<td class='text-end'>";
            echo "<a href='classes/edit_student.php?id={$id}' class='btn btn-success btn-sm me-2'>Edit</a>";
            echo "<a href='classes/delete_student.php?id={$id}' class='btn btn-danger btn-sm'>Delete</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
    </div>
<?php include_once('classes/footer.php') ?>
