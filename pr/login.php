<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">      
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Login | SMK Negeri 1 Lagos</title>
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
<div class="container mt-4">
<h2>Login</h2><br>
<form action="proses_login.php" method="POST">  
    <!-- Email input -->
    <div class="form-outline mb-4 col-4">
    <label class="form-label" for="form2Example1">Username</label>
    <input type="text" id="username" name="username"class="form-control" />
 </div>

    <!-- Password input -->
   <div class="form-outline mb-4 col-4">
   <label class="form-label" for="form2Example2">Password</label>
   <input type="password" id="password" name="password" class="form-control" />
 </div>

   <!-- Submit button -->
  <div class="form-outline mb-4 col-4">
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>
  </div>
  </div>
  </form>
  </div>
  </body>
  </html>