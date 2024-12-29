<?php include_once('header.php'); ?>

<title>Login</title>
</head>
<body class="login d-flex justify-content-center align-items-center vh-100 ">


<section class="form bg-white p-5 rounded shadow">

    <div class="mb-5 signup-logo">
        <img src="build/images/logo.svg" alt="Logo">
    </div>

    <div class="mb-5 text-center">
    <h2>Account Login</h2>
    </div>

    <?php if (isset($_GET['s']) && $_GET['s'] == 'success'): ?>
        <div class="alert alert-success text-center">
            Signup successful! Please log in.
        </div>
    <?php endif; ?>
    <?php if (isset($_GET['s']) && $_GET['s'] == 'none'): ?>
        <div class="alert alert-danger text-center">
            Please check your Username and Password
        </div>
    <?php endif; ?>

    <form action="backend/login.php" method="post">
        <div class="mb-3">
            <label for="email" class="form-label">Username</label>
            <input type="text" name="email" id="email" class="form-control" required>
        </div>

        <div class="mb-4">
            <label for="Password" class="form-label">Password</label>
            <input type="Password" name="Password" id="Password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mb-3">Login</button>
    </form>

    
</section>

<?php include_once('footer.php'); ?>