<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/3237/3237447.png" title="books icons">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/signup.css">
  <link rel="stylesheet" href="css/home.css">
  <title>Create an account</title>
</head>

<body class="fadein">
  <center>
    <form id="signupform" class="bg" action="signup.php" method="post">
      <center>
        <p class="heading">CREATE AN ACCOUNT</p>
        <div class="form-floating mb-3">
          <input name="username" type="text" class="form-control" id="name" placeholder="Name">
          <label for="name">Name</label>
        </div>
        <div class="form-floating mb-3">
          <input name="email" type="email" class="form-control" id="email" placeholder="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mb-3">
          <input type="password" class="form-control" id="Setpassword" placeholder="Set password">
          <label for="Setpassword">Set password</label>
        </div>
        <div class="form-floating mb-3">
          <input name="password" type="password" class="form-control" id="Confirmpassword" placeholder="Confirm password">
          <label for="Confirmpassword">Confirm password</label>
        </div>
        <p class="txt">
          Already registered ?<a href="login"><b> Sign in..</b></a>
        </p>
        <button type="button" onClick="create_account()">SIGN UP</button>
      </center> 
    </form>
  </center>
  <script src="js/signup.js" type="text/javascript"></script>
</body>
</html>