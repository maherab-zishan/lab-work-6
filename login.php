
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" href="style.css">
<!------ Include the above in your HEAD tag ---------->
    <title>Document</title>
</head>
<body>
<div class="sidenav">
         <div class="login-main-text">
            <h2>Application<br> Login Page</h2>
            <p>Login or register from here to access.</p>
         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="login-form">
                <?php
                require('config.php');
                    if(isset($_REQUEST['submit'])){
                        $email = $_REQUEST['email'];
                        $password = $_REQUEST['password'];
                        $query="select * from users";
                        session_start();
                        $result=mysqli_query($connection,$query);
                        while($data = mysqli_fetch_array($result)){
                            if($data['email']==$email && password_verify($password, $data['password'])){
                                $_SESSION['user_name'] = $data['name']; 
                                header('location: index.php');
                            }else{
                                
                            }
                        }
                    }
                ?>
               <form name="myForm" methd="POST" action='' >
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" id="email" name="email" class="form-control" placeholder="Email" >
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" id='password'  name='password' password="password" class="form-control" placeholder="Password" >
                  </div>
                  <button type="submit" name="submit" class="btn btn-black" onclick="validateForm()">Login</button>
                  <a href="registation.php" class="btn btn-secondary">Register</a>
               </form>
            </div>
         </div>
      </div>
      <script>
          function validateForm() {
              const email = document.getElementById("email").value;
              const password = document.getElementById("password").value;
              console.log(password)
              let fieldName ;
              if(!password){
                fieldName = "Password"
              }
              if(!email){
                  fieldName = "Email"
              }
              if(fieldName){
                  alert(`${fieldName} is required`);
                  return false;
              }else{
                  return true;
              }

        }
      </script>
</body>
</html>