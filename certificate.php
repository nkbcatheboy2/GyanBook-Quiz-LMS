<?php
session_start();
// Division calculate karne ka logic
$score = intval($_GET['score']);
$total = intval($_GET['total']);
$percentage = ($score / $total) * 100;

if ($percentage >= 60) {
    $division = "FIRST DIVISION";
} elseif ($percentage >= 45) {
    $division = "SECOND DIVISION";
} else {
    $division = "THIRD DIVISION";
}

// 8-Digit Unique ID Generate karna
$unique_id = str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Certificate</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Poppins', sans-serif; background: #e2e8f0; margin: 0; }
        .cert-wrapper { display: flex; justify-content: center; padding: 40px 20px; }
        .cert-container { 
            width: 800px; 
            background: #ffffff;
            padding: 20px; 
            border-radius: 15px; 
            box-shadow: 0 20px 50px rgba(0,0,0,0.2); 
            text-align: center; 
            position: relative; 
        }
        .cert-border { border: 10px solid #0f172a; outline: 4px solid #d4af37; outline-offset: -20px; padding: 50px 40px; }
        .title { font-family: 'Playfair Display', serif; font-size: 40px; color: #0f172a; text-transform: uppercase; }
        .name { font-family: 'Playfair Display', serif; font-size: 45px; color: #be123c; margin: 20px 0; border-bottom: 2px solid #d4af37; display: inline-block; padding: 0 40px; }
        .info-box { margin: 20px 0; font-size: 18px; color: #334155; }
        .division-badge { display: inline-block; background: #d4af37; color: white; padding: 10px 25px; border-radius: 5px; font-weight: bold; margin: 15px 0; }
        .footer-info { display: flex; justify-content: space-between; margin-top: 50px; font-size: 14px; color: #64748b; }
        .print-btn { display: block; width: 250px; margin: 0 auto 50px; background: #38bdf8; color: white; padding: 15px; border: none; border-radius: 10px; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    
    <div class="cert-wrapper">
        <div class="cert-container">
            <div class="cert-border">
                <div class="title">Certificate of Excellence</div>
                <p>Heartiest congratulations! You have earned this certificate through your dedication and hard work. We wish you continued success and a bright future ahead. Keep learning and keep shining!</p>
                <div class="name"><?php echo htmlspecialchars($_GET['name']); ?></div>
                
                <div class="info-box">
                    has successfully completed the assessment in <strong><?php echo htmlspecialchars($_GET['cat'] ?? 'General Knowledge'); ?></strong> category.
                </div>

                <div class="division-badge"><?php echo $division; ?></div>
                <div style="font-size:18px;">Score: <?php echo $score; ?> / <?php echo $total; ?></div>

                <div class="footer-info">
                    <div><strong>Issue Date:</strong> <?php echo date('d-m-Y'); ?></div>
                    <div><strong>Cert ID:</strong> <?php echo $unique_id; ?></div>
                </div>
            </div>
        </div>
    </div>
    <button class="print-btn" onclick="window.print()">🖨️ Print Certificate</button>
</body>
</html>