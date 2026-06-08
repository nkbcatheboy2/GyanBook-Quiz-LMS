<?php 
include 'db.php'; 
session_start();

if(!isset($_SESSION['user_name'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Take Quiz</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #e2e8f0; margin: 0; }
        .quiz-container { max-width: 900px; margin: 40px auto; }
        .quiz-header { background: #0f172a; color: white; padding: 20px; border-radius: 15px 15px 0 0; text-align: center; }
        .quiz-body { background: white; padding: 40px; border-radius: 0 0 15px 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        
        /* Category Grid Styles */
        .cat-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-top: 20px; }
        .cat-card { background: linear-gradient(135deg, #38bdf8, #8b5cf6); padding: 30px; text-align: center; border-radius: 15px; color: white; text-decoration: none; font-size: 20px; font-weight: bold; box-shadow: 0 10px 20px rgba(0,0,0,0.1); transition: 0.3s; }
        .cat-card:hover { transform: translateY(-5px); box-shadow: 0 15px 25px rgba(0,0,0,0.2); }

        /* Question Styles */
        .question-card { background: #f8fafc; border-left: 5px solid #8b5cf6; padding: 20px; margin-top: 25px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
        .question-card p { font-size: 18px; font-weight: 600; color: #1e293b; margin-top: 0; }
        .options label { display: block; background: #ffffff; padding: 10px 15px; margin: 8px 0; border: 1px solid #e2e8f0; border-radius: 8px; cursor: pointer; transition: all 0.2s; }
        .options label:hover { background: #eff6ff; border-color: #38bdf8; transform: translateX(5px); }
        .submit-btn { width: 100%; background: linear-gradient(90deg, #10b981, #059669); color: white; padding: 15px; font-size: 20px; font-weight: bold; border: none; border-radius: 10px; margin-top: 30px; cursor: pointer; transition: 0.3s; box-shadow: 0 10px 20px rgba(16, 185, 129, 0.3); }
        .submit-btn:hover { background: linear-gradient(90deg, #059669, #047857); transform: translateY(-3px); }
        .back-btn { display: inline-block; margin-bottom: 20px; color: #f43f5e; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="quiz-container">
        <div class="quiz-header">
            <h2>🧠 Ultimate Knowledge Test</h2>
            <p style="color: #38bdf8; margin: 0; font-weight: bold;">Best of Luck, <?php echo $_SESSION['user_name']; ?>!</p>
        </div>
        <div class="quiz-body">
            
            <?php if(!isset($_GET['cat'])): ?>
                <h3 style="text-align: center; color: #334155;">Select a Subject / Category</h3>
                <div class="cat-grid">
                    <?php
                    // Database se saari unique categories nikalna
                    $cats = $conn->query("SELECT DISTINCT category FROM questions");
                    if($cats->num_rows > 0) {
                        while($c = $cats->fetch_assoc()) {
                            $cat_name = $c['category'];
                            echo "<a href='quiz.php?cat=".urlencode($cat_name)."' class='cat-card'>📚 ".$cat_name."</a>";
                        }
                    } else {
                        echo "<p style='color:red; text-align:center; grid-column: 1 / -1;'>Abhi tak koi category available nahi hai. Admin Panel se question add karein.</p>";
                    }
                    ?>
                </div>

            <?php else: ?>
                <?php $selected_cat = $conn->real_escape_string($_GET['cat']); ?>
                <a href="quiz.php" class="back-btn">⬅️ Back to Categories</a>
                <h3 style="color: #0f172a; border-bottom: 2px solid #e2e8f0; padding-bottom: 10px;">Subject: <?php echo htmlspecialchars($selected_cat); ?></h3>
                
                <form action="submit_quiz.php" method="POST">
                    <?php
                    $sql = "SELECT * FROM questions WHERE category='$selected_cat' ORDER BY RAND() LIMIT 100";
                    $result = $conn->query($sql);
                    
                    if($result->num_rows > 0) {
                        $q_no = 1;
                        while($row = $result->fetch_assoc()) {
                            echo "<div class='question-card'>";
                            echo "<p>Q" . $q_no . ": " . $row['question_text'] . "</p>";
                            echo "<div class='options'>";
                            echo "<label><input type='radio' name='ans[".$row['id']."]' value='A' required> " . $row['opt_a'] . "</label>";
                            echo "<label><input type='radio' name='ans[".$row['id']."]' value='B'> " . $row['opt_b'] . "</label>";
                            echo "<label><input type='radio' name='ans[".$row['id']."]' value='C'> " . $row['opt_c'] . "</label>";
                            echo "<label><input type='radio' name='ans[".$row['id']."]' value='D'> " . $row['opt_d'] . "</label>";
                            echo "</div></div>";
                            $q_no++;
                        }
                        echo '<button type="submit" class="submit-btn">Submit Exam & Get Result 🎓</button>';
                    } else {
                        echo "<h3 style='color:red; text-align:center;'>Is category mein abhi koi question nahi hai!</h3>";
                    }
                    ?>
                </form>
            <?php endif; ?>

        </div>
    </div>
</body>
</html>