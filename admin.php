<?php 
include 'db.php';
session_start();

// LOGIN LOGIC
if(isset($_POST['login'])) {
    if($_POST['password'] == 'Nitesh@2026') { $_SESSION['admin'] = true; } 
    else { $error = "Invalid Security Credentials!"; }
}
if(isset($_GET['logout'])) { session_destroy(); header("Location: admin.php"); }

// DELETE QUESTION
if(isset($_GET['delete_q']) && isset($_SESSION['admin'])) {
    $del_id = intval($_GET['delete_q']);
    $conn->query("DELETE FROM questions WHERE id = $del_id");
    header("Location: admin.php?msg=Question Deleted Successfully!");
    exit();
}

// DELETE STORY
if(isset($_GET['delete_story']) && isset($_SESSION['admin'])) {
    $del_id = intval($_GET['delete_story']);
    $conn->query("DELETE FROM stories WHERE id = $del_id");
    header("Location: admin.php?msg=Story Deleted Successfully!");
    exit();
}

// ADD SINGLE QUESTION
if(isset($_POST['add_q']) && isset($_SESSION['admin'])) {
    $cat = $conn->real_escape_string($_POST['category']);
    $q = $conn->real_escape_string($_POST['q']);
    $a = $conn->real_escape_string($_POST['a']);
    $b = $conn->real_escape_string($_POST['b']);
    $c = $conn->real_escape_string($_POST['c']);
    $d = $conn->real_escape_string($_POST['d']);
    $ans = $conn->real_escape_string($_POST['ans']);
    $conn->query("INSERT INTO questions (category, question_text, opt_a, opt_b, opt_c, opt_d, correct_opt) VALUES ('$cat', '$q', '$a', '$b', '$c', '$d', '$ans')");
    header("Location: admin.php?msg=Question Added!");
    exit();
}

// ADD STORY
if(isset($_POST['add_story']) && isset($_SESSION['admin'])) {
    $title = $conn->real_escape_string($_POST['story_title']);
    $content = $conn->real_escape_string($_POST['story_content']);
    $conn->query("INSERT INTO stories (title, content) VALUES ('$title', '$content')");
    header("Location: admin.php?msg=New Story Published!");
    exit();
}

// BULK UPLOAD CSV LOGIC
if(isset($_POST['upload_csv']) && isset($_SESSION['admin'])) {
    if($_FILES['csv_file']['name']) {
        $filename = explode(".", $_FILES['csv_file']['name']);
        if(end($filename) == "csv") {
            $handle = fopen($_FILES['csv_file']['tmp_name'], "r");
            fgetcsv($handle); 
            while($data = fgetcsv($handle)) {
                $cat = $conn->real_escape_string($data[0]);
                $q = $conn->real_escape_string($data[1]);
                $a = $conn->real_escape_string($data[2]);
                $b = $conn->real_escape_string($data[3]);
                $c = $conn->real_escape_string($data[4]);
                $d = $conn->real_escape_string($data[5]);
                $ans = strtoupper(trim($conn->real_escape_string($data[6]))); 
                $conn->query("INSERT INTO questions (category, question_text, opt_a, opt_b, opt_c, opt_d, correct_opt) VALUES ('$cat', '$q', '$a', '$b', '$c', '$d', '$ans')");
            }
            fclose($handle);
            header("Location: admin.php?msg=CSV Uploaded!");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <style>
        body { font-family: 'Poppins', sans-serif; background: #f1f5f9; margin: 0; }
        .dashboard { max-width: 1100px; margin: 40px auto; background: white; padding: 40px; border-radius: 15px; box-shadow: 0 10px 30px rgba(0,0,0,0.1); }
        .header { display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #e2e8f0; padding-bottom: 20px; margin-bottom: 30px; }
        .logout-btn { background: #f43f5e; color: white; padding: 8px 15px; text-decoration: none; border-radius: 8px; font-weight: bold; }
        .styled-table { width: 100%; border-collapse: collapse; margin-top: 15px; font-size: 14px; }
        .styled-table th, .styled-table td { padding: 12px; text-align: left; border-bottom: 1px solid #e2e8f0; }
        .styled-table th { background-color: #0f172a; color: white; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px; }
        .admin-input { width: 100%; padding: 12px; border: 1px solid #cbd5e1; border-radius: 8px; font-family: 'Poppins'; box-sizing: border-box; }
        .add-btn { background: #3b82f6; color: white; padding: 12px 25px; border: none; border-radius: 8px; font-weight: bold; cursor: pointer; width: 100%; }
        .section-title { color: #334155; margin-top: 50px; border-left: 5px solid #38bdf8; padding-left: 10px; background: #f8fafc; padding: 10px; border-radius: 5px;}
        .alert { background: #10b981; color: white; padding: 10px; border-radius: 5px; text-align: center; font-weight: bold; margin-bottom: 20px; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>

    <div class="dashboard">
        <?php if(!isset($_SESSION['admin'])) { ?>
            <div style="text-align: center; max-width: 400px; margin: 0 auto;">
                <h2>Secure Admin Login</h2>
                <form method="POST">
                    <input type="password" name="password" class="admin-input" placeholder="Password (admin123)" required style="margin-bottom: 15px;">
                    <button type="submit" name="login" class="add-btn">Login</button>
                    <p style="color: red; font-weight:bold;"><?php echo $error ?? ''; ?></p>
                </form>
            </div>
        <?php } else { ?>
            <div class="header">
                <h2 style="margin:0;">⚙️ Admin Command Center</h2>
                <a href="?logout=true" class="logout-btn">Logout</a>
            </div>
            
            <?php if(isset($_GET['msg'])) { echo "<div class='alert'>".$_GET['msg']."</div>"; } ?>

            <!-- NEW SECTION: ADD STORY -->
            <h3 class="section-title">📖 Manage Motivation Stories</h3>
            <div style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0; margin-bottom: 20px;">
                <form method="POST">
                    <input type="text" name="story_title" class="admin-input" placeholder="Story Title (e.g., The Thirsty Crow)" required style="margin-bottom: 10px;">
                    <textarea name="story_content" class="admin-input" placeholder="Write the full story here..." rows="5" required style="resize: vertical;"></textarea>
                    <button type="submit" name="add_story" class="add-btn" style="background:#8b5cf6;">Publish Story</button>
                </form>
            </div>

            <!-- STORIES LIST -->
            <div style="overflow-y:auto; max-height: 250px; border: 1px solid #e2e8f0; border-radius:8px;">
                <table class="styled-table" style="margin-top:0;">
                    <tr style="position: sticky; top: 0;"><th width="10%">ID</th><th width="30%">Title</th><th width="40%">Snippet</th><th width="20%">Actions</th></tr>
                    <?php
                    $stories = $conn->query("SELECT * FROM stories ORDER BY id DESC");
                    while($s = $stories->fetch_assoc()) {
                        $snippet = mb_strimwidth($s['content'], 0, 50, "...");
                        echo "<tr>
                                <td>#".$s['id']."</td>
                                <td><strong>".$s['title']."</strong></td>
                                <td>".$snippet."</td>
                                <td><a href='admin.php?delete_story=".$s['id']."' onclick='return confirm(\"Delete this story?\");' style='background:#ef4444; color:white; padding:6px 12px; text-decoration:none; border-radius:5px; font-size:13px;'>🗑️ Delete</a></td>
                              </tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- ADD SINGLE QUESTION -->
            <h3 class="section-title">➕ Add Single Question</h3>
            <form method="POST" style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0;">
                <div class="form-grid">
                    <select name="category" class="admin-input" required>
                        <option value="">Select Category</option>
                        <option value="General Knowledge">General Knowledge</option>
                        <option value="Ramayan">Ramayan</option>
                        <option value="Mahabharat">Mahabharat</option>
                        <option value="English">English</option>
                        <option value="Math">Math</option>
                        <option value="Hindi">Hindi</option>
                        <option value="Science">Science</option>
                    </select>
                    <input type="text" name="q" class="admin-input" placeholder="Enter Question..." required>
                </div>
                <div class="form-grid">
                    <input type="text" name="a" class="admin-input" placeholder="Option A" required>
                    <input type="text" name="b" class="admin-input" placeholder="Option B" required>
                    <input type="text" name="c" class="admin-input" placeholder="Option C" required>
                    <input type="text" name="d" class="admin-input" placeholder="Option D" required>
                </div>
                <div class="form-grid">
                    <select name="ans" class="admin-input" required>
                        <option value="">Correct Answer</option>
                        <option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option>
                    </select>
                    <button type="submit" name="add_q" class="add-btn">Save Question</button>
                </div>
            </form>

            <!-- BULK UPLOAD CSV -->
            <h3 class="section-title">📂 Bulk Upload via CSV (Excel)</h3>
            <div style="background: #f8fafc; padding: 20px; border-radius: 10px; border: 1px solid #e2e8f0;">
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="csv_file" accept=".csv" required class="admin-input" style="background:white; margin-bottom:15px; width:50%;">
                    <button type="submit" name="upload_csv" class="add-btn" style="background:#10b981; width:auto; padding: 12px 30px;">⬆️ Upload CSV File</button>
                </form>
            </div>

            <!-- MANAGE QUESTIONS LIST -->
            <h3 class="section-title">📝 Manage Questions</h3>
            <div style="overflow-y:auto; max-height: 400px; border: 1px solid #e2e8f0; border-radius:8px;">
                <table class="styled-table" style="margin-top:0;">
                    <tr style="position: sticky; top: 0;"><th width="5%">ID</th><th width="15%">Category</th><th width="40%">Question</th><th width="15%">Answer</th><th width="25%">Actions</th></tr>
                    <?php
                    $qs = $conn->query("SELECT * FROM questions ORDER BY id DESC");
                    while($q = $qs->fetch_assoc()) {
                        echo "<tr>
                                <td>#".$q['id']."</td>
                                <td><span style='background:#e2e8f0; padding:3px 8px; border-radius:5px; font-size:12px; color:black;'>".$q['category']."</span></td>
                                <td>".$q['question_text']."</td>
                                <td><span style='background:#f59e0b; color:white; padding:3px 8px; border-radius:5px;'>".$q['correct_opt']."</span></td>
                                <td>
                                    <a href='edit_question.php?id=".$q['id']."' style='background:#3b82f6; color:white; padding:6px 12px; text-decoration:none; border-radius:5px; font-size:13px;'>✏️ Edit</a>
                                    <a href='admin.php?delete_q=".$q['id']."' onclick='return confirm(\"Delete this question?\");' style='background:#ef4444; color:white; padding:6px 12px; text-decoration:none; border-radius:5px; font-size:13px; margin-left:5px;'>🗑️ Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </table>
            </div>

            <!-- RESULTS LIST -->
            <h3 class="section-title">📊 Quiz Results Logs</h3>
<table class="styled-table">
    <tr><th>Student Name</th><th>Category</th><th>Score</th><th>Date</th><th>Action</th></tr>
    <?php
    $res = $conn->query("SELECT * FROM results ORDER BY id DESC");
    while($r = $res->fetch_assoc()) {
        echo "<tr>
                <td><strong>".$r['student_name']."</strong></td>
                <td>".$r['category']."</td>
                <td>".$r['score']."/".$r['total']."</td>
                <td>".$r['exam_date']."</td>
                <td><a href='certificate.php?name=".urlencode($r['student_name'])."&score=".$r['score']."&total=".$r['total']."&cat=".urlencode($r['category'])."' target='_blank' style='color:blue;'>View Cert</a></td>
              </tr>";
    }
    ?>
</table>

        <?php } ?>
    </div>
</body>
</html>