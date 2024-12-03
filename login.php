<?php
session_start();

if(isset($_SESSION['auth']))
{
    $_SESSION['message'] = "You are already logged in.";
    header('Location: index.php');
    exit();
}

include('includes/header.php')
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
                        <h4 class="text-center">Welcome to Manila Chef Creative Cuisine Inc.</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="functions/authcode.php" method="POST">
                            <div class="col-12">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" required name="email" class="form-control" id="Email" placeholder="Enter Email">
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" required name="password" class="form-control" id="password" placeholder="Enter Password">
                            </div>
                            <div class="col-md-12">
                                <p class="mt-2 float-end">Forgot password? Click <a href="forgot_password.php" class="href text-warning">here</a>.</p>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" name="login_btn" class="btn btn-warning col-md-8">Login</button>
                            </div>
                            <div class="col-md-12">
                                <p class="mt-2">Don't have an account? Register <a href="registration.php" class="href text-warning">here</a>.</p>
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
