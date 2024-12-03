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
    $email = $_SESSION['email']; // Get the email from the session
    $otp = mysqli_real_escape_string($con, $_POST['otp']);

    // Check if the OTP matches
    $query = "SELECT * FROM users WHERE email='$email' AND otp='$otp' AND is_verified=0";
    $query_run = mysqli_query($con, $query);

    if (mysqli_num_rows($query_run) > 0) {
        // Update the user as verified
        $update_query = "UPDATE users SET is_verified=1 WHERE email='$email'";
        $update_query_run = mysqli_query($con, $update_query);

 
        redirect("login.php",'Email verified successfully. You can now log in.');
    } else {
        redirect("otp_verification.php", "Invalid OTP. Please try again.");
    }
}
ob_end_flush();
?>

<div class="container">
        <h4>OTP Verification</h4>
        <?php
            if(isset($_SESSION['message'])) {
                echo "<div class='alert alert-warning'>".$_SESSION['message']."</div>";
                unset($_SESSION['message']);
            }
        ?>
        <form action="otp_verification.php" method="POST">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" placeholder="Enter the OTP sent to your email" required pattern="[0-9]{6}" inputmode="numeric" title="Please enter a 6-digit OTP">
            <button type="submit" name="verify_btn">Verify OTP</button>
        </form>
    </div>

<?php
include('includes/footer.php')
?> 