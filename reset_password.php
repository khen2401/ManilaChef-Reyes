<?php
ob_start();
session_start();
include('config/dbcon.php');
include('includes/header.php');


function redirect($url, $message)
{
    $_SESSION['message'] = $message;
    header('Location:' .$url);
    exit();
}

if (isset($_POST['verify_btn'])) {
    $email = $_POST['email'];
    $new_password = md5(mysqli_real_escape_string($con,$_POST['password']));
    $cpassword = md5(mysqli_real_escape_string($con,$_POST['cpassword']));

    if($new_password == $cpassword)
    {
        $query = "UPDATE users SET password='$new_password' WHERE email='$email'";
        mysqli_query($con, $query);
    
        redirect("login.php", "Password has been reset successfully.");
    }
    else
    {
        redirect("reset_password.php?email=$email",'Passwords do not match.');
    }

}


ob_end_flush();
?>

<div class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 ">
                <?php
                    if(isset($_SESSION['message']))
                    {
                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        unset($_SESSION['message']);
                    } 
                ?>      
                <div class="card">
                    <div class="card-header m-2">
                        <h4 class="text-center">Reset Password</h4>
                    </div>
                    <div class="card-body">
                    <form class="row g-3" action="reset_password.php" method="POST">
                        <div class="col-12">
                            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
                            <label for="password" class="form-label">New Password</label>
                            <input type="password" required name="password" class="form-control" id="password" placeholder="Enter new password">
                        </div>
                        <div class="col-12">
                            <label for="password" class="form-label">Confirm Password</label>
                            <input type="password" required name="cpassword" class="form-control" id="cpassword" placeholder="Confirm new password">
                        </div>
                        <div class="col-12">
                            <button type="submit" name="verify_btn" class="btn btn-warning float-end">Reset Password</button>
                        </div>  
                    </form>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php')
?> 