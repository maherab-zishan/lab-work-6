
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="style.css">
<!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
</head>
<body>
  
<div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Register Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
            <?php 
    require('config.php');
    if(isset($_REQUEST['submit'])){
        $name = $_REQUEST['name'];
        $phone = $_REQUEST['phone'];
        $email = $_REQUEST['email'];
        $passwordText = $_REQUEST['password'];
        $password = password_hash($passwordText, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (name,email,phone,password) VALUES ('$name','$email','$phone','$password')";

        $run = mysqli_query($connection,$sql);

        if($run){
            header('location: login.php');
        }else{
            echo "erroe";
        }

    }
   ?>
               <form method="POST" action=''>
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" placeholder="Name">
                  </div>
                  <div class="form-group">
                     <label>Phone</label>
                     <input type="text" name="phone" class="form-control" placeholder="Phone">
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" name="confirm_pass" class="form-control" placeholder="Password">
                  </div>
                  <button type="submit" name='submit' class="btn btn-black">Register</button>
                  <a href="login.php" class="btn btn-secondary">Login</a>
               </form>
            </div>
         </div>
      </div>
</div>
</body>
</html>