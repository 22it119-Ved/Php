<?php
require_once "config.php";

$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{
        $sql = "SELECT id FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: medium;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        p {
            font-size: small;
            padding: 0px;
            margin-bottom: 5px;
        }
        .wrapper {
            width: 360px;
            padding: 20px;
            padding-bottom: 5px;
            margin: 0 auto;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
        }
        .wrapper h2 {
            margin-bottom: 10px;
        }
        .form-group {
            margin-bottom: 10px;
            position: relative;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        label {
            display: block;
            font-weight: normal;
        }
        .invalid-feedback {
            color: red;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary,
        .btn-secondary {
            width: 45%;
            margin-right: 2%;
            margin-bottom: 10px;
        }
        select {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            margin-left: 2%;
        }
        .btn-secondary:hover {
            background-color: #545b62;
            border-color: #545b62;
        }
        .gender {
            display: flex;
            align-items: center;
        }
        .gender label {
            display: inline-block;
            margin-right: 5px;
        }
        .show {
            position: absolute;
            right: 10px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
        }
        #male,
        #female,
        #other {
            margin-left: 10px;
            margin-right: 2px;
            padding-top: 2px;
        }
        #dob,
        #city {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .date input[type="date"] {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            width: 100%;
            box-sizing: border-box;
        }
        #city {
            width: 100%;
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>*Please fill this form to create an account.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control<?php echo (!empty($username_err)) ? ' is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" id="password<?php echo (!empty($password_err)) ? ' is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
                <img src="Icons/show.png" alt="Show" class="show" id="togglePassword" style="opacity: 0.5; width: 20px; height: 20px;">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" id="confirmPassword<?php echo (!empty($confirm_password_err)) ? ' is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                <img src="Icons/show.png" alt="Show" class="show" id="toggleConfirmPassword" style="opacity: 0.5; width: 20px; height: 20px;">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile No.</label>
                <input type="tel" id="mobile" class="form-control" name="mobile" maxlength="10">
            </div>
            <div class="gender">
                <label for="gender">Gender:</label>
                <div>
                    <input type="radio" id="Male" name="gender" value="Male">
                    <label for="Male">Male</label>
                </div>
                <div>
                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>
                </div>
                <div>
                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
            </div>
            <div class="date">
                <label for="dob">D.O.B.
                    <input type="date" id="dob" name="dob">
                </label>
            </div>
            <div class="city">
                <label for="city">City
                    <select id="city" name="city">
                        <option value="Vapi">Vapi</option>
                        <option value="Vadodara">Vadodara</option>
                        <option value="Surat">Surat</option>
                        <option value="Ahmedabad">Ahmedabad</option>
                    </select>
                </label>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
        </form>
    </div>  
    <script>
        const togglePassword = document.getElementById("togglePassword");
        const passwordInput = document.getElementById("password");

        const toggleConfirmPassword = document.getElementById("toggleConfirmPassword");
        const confirmPasswordInput = document.getElementById("confirmPassword");

        togglePassword.addEventListener("click", function() {
            const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
            passwordInput.setAttribute("type", type);
            this.src = type === "password" ? "show.png" : "hide.png";
        });

        toggleConfirmPassword.addEventListener("click", function() {
            const type = confirmPasswordInput.getAttribute("type") === "password" ? "text" : "password";
            confirmPasswordInput.setAttribute("type", type);
            this.src = type === "password" ? "show.png" : "hide.png";
        });
    </script>      
</body>
</html>