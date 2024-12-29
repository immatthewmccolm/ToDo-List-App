<?php include_once('header.php'); ?>

<title>To-Do List</title>
</head>
<body>
<?php
// Start the session
session_start();

// Check if the user is signed in
if (!isset($_SESSION['username'])) {
    // If not signed in, redirect to the login page
    header('Location: login.php');
    exit();
}
// Include database credentials
include_once('creds.php');

// Create connection
$conn = new mysqli($DB_Host, $DB_User, $DB_Pass, $DB_Name);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the user_id from the session
$user_id = $_SESSION['id'];

// Prepare and execute the SQL query
$stmt = $conn->prepare("SELECT title, status, id FROM tasks WHERE user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Fetch the tasks
$tasks = [];
while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>

<div class="container">
    <header class="d-flex flex-wrap justify-content-center py-3 mb-4">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
       <img src="build/images/logo.svg" alt="" height="50px">
      </a>

      <ul class="nav nav-pills d-flex align-items-center link-body-emphasis text-decoration-none">
        <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
      </ul>
    </header>
  </div>

<div class="container">
    <h1>Tasks</h1>
    <hr>
    <button type="button" class="btn btn-primary mb-3 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Task</button>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Task</th>
                <th scope="col">Status</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody class="table-hover">
            <?php foreach ($tasks as $task): ?>
                <tr>
                    <td class="col-9"><?php echo htmlspecialchars($task['title']); ?></td>
                    <td class="col-2">
                        <?php if ($task['status'] == 'Pending') { ?>
                            <span class="badge text-bg-warning">Pending</span>
                        <?php } else { ?>
                            <span class="badge text-bg-success">Complete</span>
                        <?php } ?>
                    </td>
                    <td class="col-1">
                        <?php if ($task['status'] == 'Pending') { ?>
                            <a class="icon" href="backend/complete-task.php?id=<?php echo htmlspecialchars($task['id']);?>"><i class="fa-solid fa-check"></i></a>
                        <?php } else { ?>
                            <a class="icon" href="backend/uncomplete-task.php?id=<?php echo htmlspecialchars($task['id']);?>"><i class="fa-solid fa-X"></i></a>
                        <?php } ?>
                        <a class="icon" href="task-update.php?id=<?php echo htmlspecialchars($task['id']);?>&t=<?php echo htmlspecialchars($task['title']); ?>"><i class="fa-solid fa-pen"></i></a>
                        <a class="icon delete" href="backend/delete-task.php?id=<?php echo htmlspecialchars($task['id']);?>"><i class="fa-solid fa-trash-can"></i></a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="backend/create-task.php" method="post">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Add a New Task</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input type="text" name="title" class="form-control" id="title" placeholder="Task Title" required>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </div>
    </form>
    </div>
  </div>
</div>










<?php include_once('footer.php'); ?>