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

    <div class="mb-3">
        <label for="name" class="form-label">What would you like to be known as?</label>
        <input type="text" name="Name" id="Name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input type="email" name="email" id="email" class="form-control" required>
    </div>

    <div class="mb-4">
        <label for="Password" class="form-label">What would you like to be known as?</label>
        <input type="Password" name="Password" id="Password" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary mb-3">Sign Up</button>
</section>

<?php include_once('footer.php'); ?>