<?php 
// Is check ka matlab hai: Agar session chalu nahi hai, tabhi start karo
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
<style>
    .navbar {
        background: rgba(15, 23, 42, 0.9);
        backdrop-filter: blur(10px);
        padding: 15px 30px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
        position: sticky;
        top: 0;
        z-index: 1000;
        font-family: 'Poppins', sans-serif;
    }
    .navbar a {
        color: #e2e8f0;
        margin: 0 15px;
        text-decoration: none;
        font-weight: 600;
        font-size: 15px;
        transition: all 0.3s ease;
        text-transform: uppercase;
        letter-spacing: 1px;
    }
    .navbar a:hover { color: #38bdf8; text-shadow: 0 0 10px rgba(56, 189, 248, 0.6); transform: translateY(-2px); }
    .navbar a.register-btn { background: #38bdf8; color: #0f172a; padding: 8px 20px; border-radius: 25px; }
    .navbar a.admin-btn { background: #e11d48; color: white; padding: 8px 20px; border-radius: 25px; }
    .user-tag { color: #10b981 !important; font-weight: 800 !important; }
</style>

<div class="navbar">
    <style>
    /* Naya CSS code for Logo */
    .logo {
        font-family: 'Poppins', sans-serif;
        font-weight: 800;
        font-size: 24px;
        letter-spacing: -1px;
        color: white;
        margin-right: 30px;
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    .logo span {
        color: #38bdf8;
    }
</style>

<div class="navbar">
    <a href="index.php" class="logo">Gyan<span>Book</span></a>
    
    <a href="index.php">Home</a>
    <a href="quiz.php">Take Quiz</a>
    
    <?php if(isset($_SESSION['user_name'])): ?>
        <a href="#" class="user-tag">👤 Hi, <?php echo $_SESSION['user_name']; ?></a>
        <a href="logout.php" style="color: #f43f5e;">Logout</a>
    <?php else: ?>
        <a href="login.php" class="register-btn" style="background: #10b981;">Login</a>
        <a href="register.php" class="register-btn">Register</a>
    <?php endif; ?>
    
    <a href="admin.php" class="admin-btn">Admin Panel</a>
</div>
</div>