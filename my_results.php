<?php
include 'db.php';
session_start();
if(!isset($_SESSION['user_name'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head><title>My Results</title>
<style>
    body{font-family:'Poppins'; background:#f1f5f9; padding:40px;}
    .box{max-width:800px; margin:auto; background:white; padding:30px; border-radius:15px; box-shadow:0 10px 20px rgba(0,0,0,0.1);}
    table{width:100%; border-collapse:collapse; margin-top:20px;}
    th,td{padding:12px; border-bottom:1px solid #ddd; text-align:left;}
</style>
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="box">
    <h2>🎓 My Exam Results</h2>
    <table>
        <tr><th>Category</th><th>Score</th><th>Date</th><th>Action</th></tr>
        <?php
        $name = $_SESSION['user_name'];
        $res = $conn->query("SELECT * FROM results WHERE student_name='$name' ORDER BY id DESC");
        while($r = $res->fetch_assoc()){
            echo "<tr>
                    <td>".$r['category']."</td>
                    <td>".$r['score']."/".$r['total']."</td>
                    <td>".$r['exam_date']."</td>
                    <td><a href='certificate.php?name=".urlencode($r['student_name'])."&score=".$r['score']."&total=".$r['total']."&cat=".urlencode($r['category'])."' target='_blank'>View Cert</a></td>
                  </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>