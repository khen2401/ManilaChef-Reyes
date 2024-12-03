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
    $otp_input = $_POST['otp'];

    // Retrieve the OTP stored in the database
    $query = "SELECT otp FROM users WHERE email = '$email'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user['otp'] == $otp_input) {
        // OTP matches, redirect to reset password page
        redirect("reset_password.php?email=$email",'Email verified successfully. You can now change your password.');
        exit();
    } else {
        // OTP does not match, show error
        redirect("pass_verification.php?email=$email", "Invalid OTP. Please try again.");
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
        <form action="pass_verification.php" method="POST">
            <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>">
            <label for="otp">Enter OTP:</label>
            <input type="text" name="otp" placeholder="Enter the OTP sent to your email" required pattern="[0-9]{6}" inputmode="numeric" title="Please enter a 6-digit OTP">
            <button type="submit" name="verify_btn">Verify OTP</button>
        </form>
    </div>

<?php
include('includes/footer.php')
?> 