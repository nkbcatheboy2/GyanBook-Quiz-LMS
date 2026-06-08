<?php
include 'db.php';
session_start();

$action = $_POST['action'] ?? $_GET['action'] ?? '';

// 1. Comment Add Karne ka logic
if($action == 'add') {
    if(isset($_SESSION['user_name'])) {
        $story_id = intval($_POST['story_id']);
        $name = $conn->real_escape_string($_SESSION['user_name']);
        $comment = $conn->real_escape_string($_POST['comment']);

        if(!empty($comment)) {
            $conn->query("INSERT INTO comments (story_id, user_name, comment) VALUES ($story_id, '$name', '$comment')");
            echo "Success";
        }
    } else {
        echo "Login required"; // Agar bina login ke comment karne ki koshish kare
    }
}

// 2. Comments Fetch (Dekhne) ka logic
elseif($action == 'fetch') {
    $story_id = intval($_GET['story_id']);
    $res = $conn->query("SELECT * FROM comments WHERE story_id = $story_id ORDER BY id DESC");
    
    if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            // Comment ka stylish design
            echo "<div style='background:rgba(255,255,255,0.05); padding:10px 15px; border-radius:8px; margin-bottom:10px; border-left: 3px solid #38bdf8;'>";
            echo "<strong style='color:#38bdf8; font-size:14px;'>👤 ".$row['user_name']."</strong> ";
            echo "<span style='font-size:11px; color:#64748b; float:right;'>".date('d M, h:i A', strtotime($row['created_at']))."</span>";
            echo "<p style='margin:5px 0 0; font-size:14px; color:#e2e8f0;'>".htmlspecialchars($row['comment'])."</p>";
            echo "</div>";
        }
    } else {
        echo "<p style='color:#94a3b8; font-size:14px; text-align:center;'>Abhi tak koi comment nahi hai. Be the first to share your thoughts!</p>";
    }
}
?>