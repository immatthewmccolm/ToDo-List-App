<?php include_once('header.php'); ?>

<title>Update Task</title>
</head>
<body class=" d-flex justify-content-center align-items-center vh-100">

<?php
$task_id = urldecode($_GET['id']);
$task_title = urldecode($_GET['t']);
?>

<section class="form bg-white p-5 rounded shadow">

    <div class="mb-5 text-center">
    <h2>Task Update</h2>
    </div>

    <form action="backend/update-task.php" method="post">
    <div class="mb-3">
        <input type="text" name="title" class="form-control" id="title" value="<?php echo $task_title ?>" required>
    </div>

    <input type="number" name="id" class="form-control" id="id" value="<?php echo $task_id ?>" hidden>

    <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
    
</section>

<?php include_once('footer.php'); ?>