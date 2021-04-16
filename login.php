<?php include_once('lib/header.php');
     require_once('functions/alert.php');

if(isset($_SESSION['loggedIn']) && !empty($_SESSION['loggedIn'])){
    // redirect to dashboard
    header("Location: dashboard.php");
}

?>

        <h3>Login</h3>
    
        <p>
        <?php print_alert(); ?>
        </p>

<!---registration form ---->
         <form method="POST" action="processlogin.php">
    
                
            <p>
                <label>Email</label><br />
                <input
                
                <?php              
                    if(isset($_SESSION['email'])){
                        echo "value=" . $_SESSION['email'];                                                             
                    }                
                ?>

                type="text" class="form-control" name="email" placeholder="Email"  />
            </p>

            <p>
                <label>Password</label><br />
                <input class="form-control" type="password" name="password" placeholder="Password"  />
            </p>       
        
        
            <p>
                <button class="btn btn-sm btn-primary" type="submit">Login</button>
            </p>
            <p>
                <a href="forgot.php">Forgot Password</a><br />
                <a href="register.php">Don't have an account? Register</a>
            </p>
        </form>
    </div>
</div>
