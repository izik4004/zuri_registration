<?php session_start();
require_once('functions/user.php');

$errorCount = 0;
//collecting data

$first_name = $_POST['first_name'] !="" ? $_POST['first_name'] : $errorCount++; 
$last_name = $_POST['last_name'] !="" ? $_POST['last_name'] : $errorCount++; 
$email = $_POST['email'] !="" ? $_POST['email'] : $errorCount++; 
$password = $_POST['password'] !="" ? $_POST['password'] : $errorCount++; 



    $_SESSION['first_name'] = $first_name;
    $_SESSION['last_name'] = $last_name;
    $_SESSION['email'] = $email;
   

if($errorCount > 0){

    $session_error = "You have " . $errorCount . " error";
       
    if($errorCount > 1) {
        $session_error  .= "s";  
    }

    $session_error .=    "in your form submission";
    $_SESSION["error"] = $session_error ;

    header("Location: register.php");
 

}else{ 

        $newUserId = $countAllUsers-1;

$userObject = [
    'id'=>$newUserId,
    'first_name'=>$first_name,
    'last_name'=>$last_name,
    'email'=>$email,
    'password'=>password_hash($password, PASSWORD_DEFAULT),
   

];

$userExists = find_user($email);

    if($userExists){
        $_SESSION["error"] = "Registration failed User already exists";
        header("Location:register.php");
        die();
        
    }
    

save_user($userObject);

    
    $_SESSION["message"] = "Registration successful, you can now login " . $first_name;
    header("Location: login.php");
}   