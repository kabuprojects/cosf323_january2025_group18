<?php
session_start();
include '../authentication/db.php';

// Handle new course submission
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['add_course'])) {
    $title_en = mysqli_real_escape_string($conn, $_POST['title_en']);
    $title_sw = mysqli_real_escape_string($conn, $_POST['title_sw']);
    $content_en = mysqli_real_escape_string($conn, $_POST['content_en']);
    $content_sw = mysqli_real_escape_string($conn, $_POST['content_sw']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);

    $query = "INSERT INTO cybersecurity_content (title_en, title_sw, content_en, content_sw, category) 
              VALUES ('$title_en', '$title_sw', '$content_en', '$content_sw', '$category')";

    if (mysqli_query($conn, $query)) {
        $message = "Course added successfully!";
    } else {
        $error = "Error adding course: " . mysqli_error($conn);
    }
}

// Handle content deletion
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $deleteQuery = "DELETE FROM cybersecurity_content WHERE id = $id";

    if (mysqli_query($conn, $deleteQuery)) {
        $message = "Content deleted successfully!";
    } else {
        $error = "Error deleting content: " . mysqli_error($conn);
    }
}

// Fetch all content
$query = "SELECT * FROM cybersecurity_content ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);

// Fetch Existing Courses
$query = "SELECT * FROM cybersecurity_content ORDER BY created_at DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Courses</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="container">
        <h1>Admin Panel - Manage Cybersecurity Content</h1>

        <!-- Success / Error Messages -->
        <?php if (isset($message)) echo "<p style='color: green;'>$message</p>"; ?>
        <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>

        <!-- Add New Course -->
        <h2>Add New Course</h2>
        <form method="POST">
            <input type="text" name="title_en" placeholder="English Title" required><br>
            <input type="text" name="title_sw" placeholder="Swahili Title" required><br>
            <textarea name="content_en" placeholder="English Content" required></textarea><br>
            <textarea name="content_sw" placeholder="Swahili Content" required></textarea><br>
            <input type="text" name="category" placeholder="Category" required><br>
            <button type="submit" name="add_course">Add Course</button>
        </form>

        <!-- View & Delete Courses -->
        <h2>Existing Courses</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Title (EN)</th>
                <th>Title (SW)</th>
                <th>Category</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['title_en']; ?></td>
                    <td><?php echo $row['title_sw']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td>
                        <a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this content?');">🗑 Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>

</html>