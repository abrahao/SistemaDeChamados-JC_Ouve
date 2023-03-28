<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

<?php
session_start();

// Change this to your connection info.
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = 'root';
$DATABASE_user = 'xjcouve';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_user);
if (mysqli_connect_errno()) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if (!isset($_POST['email'], $_POST['senha'])) {
	// Could not get the data that should have been sent.
	echo "Preecha todos os campos.";
	header("Refresh: 4; url=/login_admin");
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT id, senha FROM cadastro_admin WHERE email = ?')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the email is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
		$stmt->bind_result($id, $senha);
		$stmt->fetch();
		// Account exists, now we verify the senha.
		// Note: remember to use senha_hash in your registration file to store the hashed senhas.
		if (password_verify($_POST['senha'], $senha)) {
			// Verification success! email has logged-in!
			// Create sessions, so we know the email is logged in, they basically act like cookies but remember the data on the server.
			session_regenerate_id();
			$_SESSION['loggedin'] = TRUE;
			$_SESSION['email'] = $_POST['email'];
			$_SESSION['id'] = $id;

			header("location: /admin/home");
		}
		} else {
			// Incorrect senha
			?>
			<div class="alert alert-warning" role="alert">
				Usuário e/ou senha incorretos!
			</div>
	
			<div class="alert alert-warning" role="alert">
				Redirecionando para a tela de login...
			</div>
	<?php
			header("Refresh: 4; url=/");
		}
	
		$stmt->close();
	}
	