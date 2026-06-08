<?php 
include 'db.php';
$msg = "";

if(isset($_POST['register'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $mobile = $conn->real_escape_string($_POST['mobile']);
    $email = $conn->real_escape_string($_POST['email']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $edu = $conn->real_escape_string($_POST['education']);
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT); // Password securely hidden

    $check = $conn->query("SELECT * FROM users WHERE email='$email'");
    if($check->num_rows > 0) {
        $msg = "<p style='color: red;'>Email already registered!</p>";
    } else {
        $sql = "INSERT INTO users (name, mobile, email, gender, education, password) VALUES ('$name', '$mobile', '$email', '$gender', '$edu', '$pass')";
        if($conn->query($sql)) {
            $msg = "<p style='color: #10b981;'>Registration Successful! You can now take the Quiz.</p>";
        } else {
            $msg = "<p style='color: red;'>Error in registration!</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration</title>
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; background: linear-gradient(135deg, #1e293b, #0f172a); min-height: 100vh; color: white; }
        .reg-box { max-width: 500px; margin: 50px auto; background: rgba(255, 255, 255, 0.1); padding: 40px; border-radius: 15px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.2); box-shadow: 0 15px 25px rgba(0,0,0,0.5); }
        .reg-box h2 { text-align: center; color: #38bdf8; margin-top: 0; }
        .input-field { width: 100%; padding: 12px; margin-bottom: 15px; border-radius: 8px; border: none; outline: none; font-family: 'Poppins'; box-sizing: border-box; }
        select.input-field { cursor: pointer; }
        .reg-btn { width: 100%; padding: 15px; background: #38bdf8; color: #0f172a; font-weight: bold; font-size: 16px; border: none; border-radius: 8px; cursor: pointer; transition: 0.3s; }
        .reg-btn:hover { background: #0284c7; color: white; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="reg-box">
        <h2>Create Account 🎓</h2>
        <?php echo $msg; ?>
        <form method="POST">
            <input type="text" name="name" class="input-field" placeholder="Full Name" required>
            <input type="number" name="mobile" class="input-field" placeholder="Mobile Number" required>
            <input type="email" name="email" class="input-field" placeholder="Email Address" required>
            
            <select name="gender" class="input-field" required>
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <select name="education" class="input-field" required>
                <option value="">Select Highest Education</option>
                <option value="High School (10th)">High School (10th)</option>
                <option value="Intermediate (12th)">Intermediate (12th)</option>
                <option value="Graduation (BA/BSc/BCA etc)">Graduation (BA/BSc/BCA etc)</option>
                <option value="Post Graduation">Post Graduation</option>
            </select>

            <input type="password" name="password" class="input-field" placeholder="Create Password" required>
            
            <button type="submit" name="register" class="reg-btn">Register Now</button>
        </form>
    </div>
</body>
</html>