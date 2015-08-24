<?php 

include 'inc/connect.php'; 

if (isset($_POST['submit'])) {
    
    $us_em = $_POST['us_em'];
    $password = $_POST['password'];
    
    if ($username == "") {
        
        echo = "Username is empty.";
        
    } elseif (strlen($username) > 60) { 
        
        echo = "Username is too big, use another one.";
        
    } elseif ($email == "") {
        
        echo = "Email is empty.";
        
    
    } elseif (strlen($email) > 60) {
    
        echo = "Email is too big, use another one.";
    
    } elseif ($password == "") {
        
        echo = "Password is empty.";
    
    } elseif (strlen($password) < 8) {
        
        echo = "Password must be atleast 8 characters.";
    
    } else {

        try {
      
            $query = $conn->prepare("SELECT * FROM users WHERE :us_em IN (username, email) AND password=:password LIMIT 1");
            $query->execute(
                array(
                    ':us_em' => $us_em,
                    ':password' => $password
                )
            );
            $result = $query->fetch(PDO::FETCH_ASSOC);
        
            if ($result['us_em'] == $us_em && $result['password'] == $password) {
            
                header('location: profile.php');
            
            } else {
        
                echo "Wrong Details";
        
            }
        
        
        
        } catch(PDOException $e) {
			
            echo $e->getMessage();
    
        s}
    }
    
}








?>  

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>


<link rel="stylesheet" type="text/css" href="">



</head>

<body>

    
    
    
    
    
    
    
<form method="post">
    <div>
        <input type="text" name="us_em" placeholder="Username or Email">
    </div>
        <input type="password" name="password" placeholder="Password">
    </div>
    <div>
        <input type="submit" name="submit" value="Login">
    </div>
</form>

<div><a href="register.php">Sign up now!</a></div>    
    
    
</body>

</html> 
