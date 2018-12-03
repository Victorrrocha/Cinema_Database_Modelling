<?php

session_start();

if(isset($_SESSION['UsuarioLog'])){
    header("Location: movies.php");
    die;
  }

include_once ("config.php");
include_once ("connection.php");
include_once("functions.php");

if(isset($_POST['login'])){

	$conn = DBConnect();
	$user_email = mysqli_escape_string($conn, $_POST['email']);
	$password = mysqli_escape_string($conn, $_POST['password']);

	$teste = DBQuery('cliente', "WHERE cli_email = '$user_email' AND cli_senha = '$password'");

	if($teste){
		$_SESSION['UsuarioLog'] = true;
		header("Location: movies.php");
		// echo "<script>alert('Bem-vindo ')". $nome = $teste['cli_nome'] ."</script>";

	} else{
		echo "<script>alert('Não encontrado')</script>";
	}
}

?>



<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Cinema Paradiso</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signIn.css" rel="stylesheet">
  </head> 

  <body class="text-center">
  	

    <form method="POST" action="" class="form-signin">

    <img class="mb-4" src="popcorn.svg" alt="" width="72" height="72">
  	<h1 class="h3 mb-3 font-weight-normal">Cinema Paradiso</h1>

      <label for="inputEmail" class="sr-only">Email address</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

      <label for="inputPassword" class="sr-only">Password</label>
      <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>

  </body>
</html>
