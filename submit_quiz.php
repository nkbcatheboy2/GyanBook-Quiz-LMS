<?php
include 'db.php';
session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_name'])) {
    
    $name = $conn->real_escape_string($_SESSION['user_name']);
    $cat_name = $conn->real_escape_string($_POST['category_name']); // Category pakdi
    
    if(isset($_POST['ans']) && !empty($_POST['ans'])) {
        $answers = $_POST['ans'];
        $score = 0;
        $total = 0;

        foreach($answers as $q_id => $user_ans) {
            $total++;
            $sql = "SELECT correct_opt FROM questions WHERE id = " . intval($q_id);
            $res = $conn->query($sql);
            if($res && $res->num_rows > 0) {
                $row = $res->fetch_assoc();
                if($row['correct_opt'] == $user_ans) {
                    $score++;
                }
            }
        }

       
        $insert = "INSERT INTO results (student_name, score, total, category) VALUES ('$name', '$score', '$total', '$cat_name')";
        
        if($conn->query($insert)) {
            
            header("Location: certificate.php?name=" . urlencode($name) . "&score=$score&total=$total&cat=" . urlencode($cat_name));
            exit();
        } else {
            echo "Database error: " . $conn->error;
        }
    } else {
        echo "<div style='text-align:center; margin-top: 50px; font-family: Arial;'>";
        echo "<h2 style='color:red;'>Aapne koi bhi answer select nahi kiya!</h2>";
        echo "<a href='quiz.php' style='padding:10px 20px; background:#38bdf8; color:white; text-decoration:none; border-radius:5px;'>Wapas Jayein</a>";
        echo "</div>";
    }
} else {
    echo "<div style='text-align:center; margin-top: 50px; font-family: Arial;'>";
    echo "<h2 style='color:red;'>Direct access allowed nahi hai!</h2>";
    echo "<a href='login.php' style='padding:10px 20px; background:#10b981; color:white; text-decoration:none; border-radius:5px;'>Pehle Login Karein</a>";
    echo "</div>";
}
?>
