<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GadgeX Login</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body style="display:flex; align-items:center; justify-content:center;">
<div class="login-page">
<div class="form">

    <form action="process_registration.php" class="register-form" method="POST">
    <h2>Register</h2>
    <!-- Display registration error message, if any -->
    <?php
    if (isset($_GET['error'])) {
        echo '<p style="color: red;">' . $_GET['error'] . '</p>';
        }
    ?>

    <!-- new input text-->
    <div class="input-container">
        <input placeholder="Enter Fullname" name="fullname" class="input-field" type="text">
        <label for="input-field" class="input-label">Fullname</label>
        <span class="input-highlight"></span>
    </div>
    <div class="input-container">
        <input placeholder="Enter Username" name="username" class="input-field" type="text">
        <label for="input-field" class="input-label">Username</label>
        <span class="input-highlight"></span>
    </div>
    <div class="input-container">
        <input placeholder="Enter Email" name="email" class="input-field" type="email">
        <label for="input-field" class="input-label">Email</label>
        <span class="input-highlight"></span>
    </div>
    <div class="input-container">
        <input placeholder="Enter Password" name="password" class="input-field" type="password">
        <label for="password" class="input-label">Password</label>
        <span class="input-highlight"></span>
    </div>
    <div class="input-container">
        <input placeholder="Enter Confirm Password" name="confirm_password" class="input-field" type="password">
        <label for="password" class="input-label">Confirm Password</label>
        <span class="input-highlight"></span>
    </div>

    <button type="submit" class="btn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Create
    </button>
    <p class="message">Already registered? <a href="#">Sign In</a></p>
    </form>


    <form action="process_login.php" class="login-form" method="post">
    <h2></i> Login</h2>

    <!-- Display success message if it's present -->
    <?php
    if (isset($_GET['success'])) {
    echo '<p style="color: green;">' . $_GET['success'] . '</p>';
    }

      // Display login error message if it's present
    if (isset($_GET['login_error'])) {
    echo '<p style="color: red;">' . $_GET['login_error'] . '</p>';
    }
    ?>


    <div class="input-container">
        <input placeholder="Enter Username" name="username" class="input-field" type="text">
        <label for="input-field" class="input-label">Username</label>
        <span class="input-highlight"></span>
    </div>
    <div class="input-container">
        <input placeholder="Enter Password" name="password" class="input-field" type="password">
        <label for="password" class="input-label">Password</label>
        <span class="input-highlight"></span>
    </div>
    <button type="submit" class="btn">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        Sign in
    </button>
    <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>
</div>
</div>
<!-- design -->

<div class="socket">
			<div class="gel center-gel">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c1 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c2 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c3 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c4 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c5 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c6 r1">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
			<div class="gel c7 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
			<div class="gel c8 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c9 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c10 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c11 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c12 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c13 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c14 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c15 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c16 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c17 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c18 r2">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c19 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c20 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c21 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c22 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c23 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c24 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c25 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c26 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c28 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c29 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c30 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c31 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c32 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c33 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c34 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c35 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c36 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			<div class="gel c37 r3">
				<div class="hex-brick h1"></div>
				<div class="hex-brick h2"></div>
				<div class="hex-brick h3"></div>
			</div>
			
		</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="main.js"></script>

</body>
</html>