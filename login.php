<?php 
include 'db.php';
session_start();
$msg = "";

if(isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $pass = $_POST['password'];

    $res = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        // Password verify karna
        if(password_verify($pass, $row['password'])) {
            $_SESSION['user_name'] = $row['name'];
            $_SESSION['user_email'] = $row['email'];
            // Login hote hi direct quiz wale page par bhej do
            header("Location: quiz.php"); 
            exit();
        } else {
            $msg = "Galat Password! Wapas try karein.";
        }
    } else {
        $msg = "Ye Email registered nahi hai! Pehle Register karein.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; background: linear-gradient(135deg, #1e293b, #0f172a); min-height: 100vh; color: white; }
        .login-box { max-width: 400px; margin: 80px auto; background: rgba(255, 255, 255, 0.1); padding: 40px; border-radius: 15px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 15px 25px rgba(0,0,0,0.5); text-align: center; }
        .login-box h2 { color: #10b981; margin-top: 0; }
        .input-field { width: 100%; padding: 12px; margin-bottom: 20px; border-radius: 8px; border: none; outline: none; font-family: 'Poppins'; box-sizing: border-box; }
        .login-btn { width: 100%; padding: 15px; background: #10b981; color: white; font-weight: bold; font-size: 16px; border: none; border-radius: 8px; cursor: pointer; transition: 0.3s; }
        .login-btn:hover { background: #059669; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="login-box">
        <h2>Student Login 🎓</h2>
        <p style="color: #f43f5e; font-weight: bold;"><?php echo $msg; ?></p>
        
        <form method="POST">
            <input type="email" name="email" class="input-field" placeholder="Email Address" required>
            <input type="password" name="password" class="input-field" placeholder="Password" required>
            <button type="submit" name="login" class="login-btn">Login to Start Exam</button>
        </form>
        
        <p style="margin-top: 20px;">Account nahi hai? <a href="register.php" style="color: #38bdf8;">Register karein</a></p>
    </div>
</body>
</html>