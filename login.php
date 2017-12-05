<?php  //Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
header("Location: a1.php");
}
?>
<html>
<head>
	<title>RMD CAMPUS PORTAL!</title>
<style> 
body {
    background: url("images/coverpage.jpg");
    background-size: 100% 200%;
    background-repeat: no-repeat;
    padding-top: 40px;
}
form {
    border: 3px solid #f1f1f1;
}

input[type=text], input[type=password] {
    width: 30%;
    padding: 8px 7px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: #4CAF50;
    color: none;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: auto;
}

button:hover {
    opacity: 0.8;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: auto;
    border-radius: 10px;
}

.container {
    padding: 1px;
}

/*span.psw {
    float: right;
    padding-top: auto;
}*/
</style>
</head>
<body>
<br>
<br>
<br>
<br>
<br>

<div class="container">
      <form class="form-signin" method="POST">
	    <div class="imgcontainer">
    <img src="images/user.png" alt="Avatar" class="avatar">
  </div>
      <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
      <center>  <h2 class="form-signin-heading" >Login</h2>  
        <div class="input-group">
	  <span class="input-group-addon" id="basic-addon1">Username</span>
	  <input type="text" name="username" class="form-control" placeholder="Username" required>
	</div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required><br>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        
      </form>
</div>

</body>

</html>
