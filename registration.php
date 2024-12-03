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
            <div class="col-md-8 ">

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
                        <h4 class="text-center">Registration</h4>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="functions/authcode.php" method="POST">
                            <div class="col-md-6">
                                <label for="Fname" class="form-label">First Name</label>
                                <input type="text" name="first_name" required class="form-control" id="Fname" placeholder="Enter First Name">
                            </div>
                            <div class="col-md-6">
                                <label for="Lname" class="form-label">Last Name</label>
                                <input type="text" name="last_name" required class="form-control" id="Lname" placeholder="Enter Last Name">
                            </div>
                            <div class="col-12">
                                <label for="Contact" class="form-label">Contact Number</label>
                                <input type="tel"  name="contact_num" required class="form-control" id="Contact" placeholder="Enter Contact Number (ex: 09...)" pattern="09\d{9}">
                            </div>
                            <div class="col-12">
                                <label for="Email" class="form-label">Email</label>
                                <input type="email" name="email" required class="form-control" id="Email" placeholder="Enter Email (accepted email address: gmail, yahoo, and hotmail)" pattern="[^@\s]+@(?:gmail\.com|yahoo\.com|hotmail\.com)">
                            </div>
                            <div class="col-12">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" required class="form-control" id="password" placeholder="Enter Password">
                            </div>
                            <div class="col-12">
                                <label for="confirm" class="form-label">Confirm Password</label>
                                <input type="password" name="cpassword" required class="form-control" id="password2" placeholder="Confirm Password">
                            </div>
                            <div class="col-12">
                                <button type="submit" name="register_btn" class="btn btn-warning float-end mt-2">Register</button>
                                <p class="mt-2">Already have an account? Login <a href="login.php" class="href text-warning">here</a>.</p>
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
