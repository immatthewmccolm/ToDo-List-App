<?php include_once('header.php'); ?>

<title>Sign Up</title>
</head>
<body class="login d-flex justify-content-center align-items-center vh-100 ">


<section class="form bg-white p-5 rounded shadow">

    <div class="mb-5 signup-logo">
        <img src="build/images/logo.svg" alt="Logo">
    </div>

    <div class="mb-5 text-center">
    <h2>Account Sign Up</h2>
    </div>

    <?php if (isset($_GET['s']) && $_GET['s'] == 'fail'): ?>
        <?php
            $error = urldecode($_GET['e']);
        ?>
        <div class="alert alert-danger text-center">
            Signup unsuccessful! Error: <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="backend/signup.php" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">What would you like to be known as?</label>
            <input type="text" name="Name" id="Name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="username" name="username" id="username" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="Password" class="form-label">Password</label>
            <input type="Password" name="Password" id="Password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
    </form>

    <p class="account-notice">Alredy got an Account? <a href="login.php">Sign In.</a></p>
</section>

<?php include_once('footer.php'); ?>