<?php 
include 'db.php';
session_start();

// Admin check
if(!isset($_SESSION['admin'])) {
    header("Location: admin.php");
    exit();
}

// Fetch question details
$q_id = 0;
$row = [];
if(isset($_GET['id'])) {
    $q_id = intval($_GET['id']);
    $res = $conn->query("SELECT * FROM questions WHERE id = $q_id");
    if($res->num_rows > 0) {
        $row = $res->fetch_assoc();
    } else {
        header("Location: admin.php");
        exit();
    }
}

// Update Database logic
if(isset($_POST['update_q'])) {
    $q = $conn->real_escape_string($_POST['q']);
    $a = $conn->real_escape_string($_POST['a']);
    $b = $conn->real_escape_string($_POST['b']);
    $c = $conn->real_escape_string($_POST['c']);
    $d = $conn->real_escape_string($_POST['d']);
    $ans = $conn->real_escape_string($_POST['ans']);

    $conn->query("UPDATE questions SET question_text='$q', opt_a='$a', opt_b='$b', opt_c='$c', opt_d='$d', correct_opt='$ans' WHERE id=$q_id");
    header("Location: admin.php?msg=Question Updated Successfully!");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Question</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f1f5f9; margin: 0; }
        .edit-box { max-width: 600px; margin: 50px auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .admin-input { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-family: 'Poppins'; margin-bottom: 15px; box-sizing:border-box;}
        .add-btn { background: #3b82f6; color: white; padding: 15px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; width: 100%; font-size:16px;}
        .back-btn { display: inline-block; margin-bottom: 20px; color: #f43f5e; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="edit-box">
        <a href="admin.php" class="back-btn">⬅️ Back to Dashboard</a>
        <h2 style="margin-top:0; color:#0f172a;">✏️ Edit Question #<?php echo $q_id; ?></h2>
        
        <form method="POST">
            <label><strong>Question:</strong></label>
            <input type="text" name="q" class="admin-input" value="<?php echo $row['question_text']; ?>" required>
            
            <label><strong>Option A:</strong></label>
            <input type="text" name="a" class="admin-input" value="<?php echo $row['opt_a']; ?>" required>
            
            <label><strong>Option B:</strong></label>
            <input type="text" name="b" class="admin-input" value="<?php echo $row['opt_b']; ?>" required>
            
            <label><strong>Option C:</strong></label>
            <input type="text" name="c" class="admin-input" value="<?php echo $row['opt_c']; ?>" required>
            
            <label><strong>Option D:</strong></label>
            <input type="text" name="d" class="admin-input" value="<?php echo $row['opt_d']; ?>" required>
            
            <label><strong>Correct Answer:</strong></label>
            <select name="ans" class="admin-input" required>
                <option value="A" <?php if($row['correct_opt']=='A') echo 'selected'; ?>>A</option>
                <option value="B" <?php if($row['correct_opt']=='B') echo 'selected'; ?>>B</option>
                <option value="C" <?php if($row['correct_opt']=='C') echo 'selected'; ?>>C</option>
                <option value="D" <?php if($row['correct_opt']=='D') echo 'selected'; ?>>D</option>
            </select>
            
            <button type="submit" name="update_q" class="add-btn">Update Question Now</button>
        </form>
    </div>
</body>
</html>