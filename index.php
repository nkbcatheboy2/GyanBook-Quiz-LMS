<?php include 'db.php'; ?>
<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Ultimate GK Quiz</title>
    <style>
        body { font-family: 'Poppins', sans-serif; margin: 0; background: linear-gradient(135deg, #1e293b, #0f172a); color: white; min-height: 100vh; }
        .hero { text-align: center; padding: 80px 20px; }
        .hero h1 { font-size: 55px; font-weight: 800; color: #38bdf8; margin: 0; text-shadow: 0 4px 10px rgba(0,0,0,0.5); }
        .hero p { font-size: 22px; color: #cbd5e1; margin-top: 15px; }
        .start-btn { display: inline-block; margin-top: 30px; background: #e11d48; color: white; padding: 15px 40px; font-size: 20px; font-weight: 800; text-decoration: none; border-radius: 50px; transition: 0.3s; box-shadow: 0 10px 20px rgba(225, 29, 72, 0.4); }
        .start-btn:hover { transform: translateY(-5px); background: #be123c; }
        
        .story-container { max-width: 1100px; margin: 0 auto 80px; padding: 0 20px; }
        .section-title { text-align: center; color: #38bdf8; font-size: 35px; margin-bottom: 40px; }
        .story-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px; }
        
        .story-card { background: rgba(255, 255, 255, 0.05); padding: 30px; border-radius: 15px; backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.1); box-shadow: 0 10px 30px rgba(0,0,0,0.3); transition: transform 0.3s, border-color 0.3s; display: flex; flex-direction: column; justify-content: space-between; }
        .story-card:hover { transform: translateY(-10px); border-color: #38bdf8; }
        .story-card h3 { color: #fef08a; font-size: 22px; margin-top: 0; }
        .story-card p { color: #cbd5e1; font-size: 15px; line-height: 1.6; flex-grow: 1; }
        .read-more-btn { margin-top: 20px; background: transparent; border: 2px solid #38bdf8; color: #38bdf8; padding: 10px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; font-family: 'Poppins'; }
        .read-more-btn:hover { background: #38bdf8; color: #0f172a; }

        .modal { display: none; position: fixed; z-index: 2000; left: 0; top: 0; width: 100%; height: 100%; background-color: rgba(15, 23, 42, 0.8); backdrop-filter: blur(8px); align-items: center; justify-content: center; padding: 20px; box-sizing: border-box; }
        .modal-content { background: #1e293b; border-radius: 15px; padding: 30px; width: 100%; max-width: 800px; max-height: 85vh; overflow-y: auto; border: 1px solid #38bdf8; box-shadow: 0 20px 50px rgba(0,0,0,0.5); position: relative; animation: slideIn 0.3s ease-out; display: flex; flex-direction: column; }
        @keyframes slideIn { from { transform: translateY(-50px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }
        
        .modal h2 { color: #fef08a; margin-top: 0; font-size: 28px; border-bottom: 2px solid #334155; padding-bottom: 15px; }
        .modal p { color: #f1f5f9; font-size: 17px; line-height: 1.8; white-space: pre-wrap; }
        .close-btn { position: absolute; top: 15px; right: 25px; color: #f43f5e; font-size: 35px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .close-btn:hover { color: #e11d48; transform: scale(1.1); }
        .modal-content::-webkit-scrollbar { width: 8px; }
        .modal-content::-webkit-scrollbar-track { background: #0f172a; border-radius: 10px; }
        .modal-content::-webkit-scrollbar-thumb { background: #38bdf8; border-radius: 10px; }

        /* Comment Section Styles */
        .comment-section { margin-top: 30px; border-top: 2px solid #334155; padding-top: 20px; }
        .comment-input-area { display: flex; gap: 10px; margin-bottom: 20px; }
        .comment-input { flex-grow: 1; padding: 12px; border-radius: 8px; border: 1px solid #334155; background: #0f172a; color: white; font-family: 'Poppins'; outline: none; }
        .comment-input:focus { border-color: #38bdf8; }
        .comment-btn { background: #10b981; color: white; border: none; padding: 12px 20px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: 0.3s; }
        .comment-btn:hover { background: #059669; }
        .comments-list { max-height: 200px; overflow-y: auto; padding-right: 10px; }
    </style>
</head>
<body>
    
    
    <div class="hero">
        <h1>Challenge Your Brain 🧠</h1>
        <p>Register yourself, Test your General Knowledge, and Earn a Premium Certificate!</p>
        <a href="register.php" class="start-btn">Register to Start 🚀</a>
    </div>

    <!-- DYNAMIC STORIES SECTION -->
    <div id="story" class="story-container">
        <h2 class="section-title">📖 Motivational Stories</h2>
        <div class="story-grid">
            <?php
            $stories = $conn->query("SELECT * FROM stories ORDER BY id DESC LIMIT 3");
            if($stories->num_rows > 0) {
                while($s = $stories->fetch_assoc()) {
                    $snippet = mb_strimwidth($s['content'], 0, 120, "...");
                    echo "<div class='story-card'>
                            <div>
                                <h3>".htmlspecialchars($s['title'])."</h3>
                                <p>".htmlspecialchars($snippet)."</p>
                                <!-- HIDDEN DATA FOR POPUP -->
                                <div class='full-title' style='display:none;'>".htmlspecialchars($s['title'])."</div>
                                <div class='full-content' style='display:none;'>".nl2br(htmlspecialchars($s['content']))."</div>
                            </div>
                            <!-- Yahan hum story ka ID pass kar rahe hain JS function ko -->
                            <button class='read-more-btn' onclick='openModal(this, ".$s['id'].")'>Read More & Comment 💬</button>
                          </div>";
                }
            } else {
                echo "<p style='text-align:center; grid-column:1/-1; color:gray;'>No stories added yet. Admin will add soon!</p>";
            }
            ?>
        </div>
    </div>

    <!-- POPUP MODAL -->
    <div id="storyModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2 id="modalTitle">Story Title</h2>
            <p id="modalContent" style="margin-bottom: 20px;">Story Content</p>

            <!-- COMMENT SECTION (New) -->
            <div class="comment-section">
                <h3 style="color: #38bdf8; font-size: 20px; margin-top: 0;">💬 Discussion</h3>
                
                <!-- Hidden input to store active story ID -->
                <input type="hidden" id="activeStoryId" value="">
                
                <?php if(isset($_SESSION['user_name'])): ?>
                    <div class="comment-input-area">
                        <input type="text" id="commentText" class="comment-input" placeholder="Write your thoughts here..." required>
                        <button onclick="postComment()" class="comment-btn">Post Comment</button>
                    </div>
                <?php else: ?>
                    <div style="background: rgba(225, 29, 72, 0.1); padding: 15px; border-radius: 8px; border: 1px solid #e11d48; margin-bottom: 20px; text-align: center;">
                        <p style="margin: 0; color: #f87171; font-size: 14px;">You must <a href="login.php" style="color: white; font-weight: bold;">Login</a> or <a href="register.php" style="color: white; font-weight: bold;">Register</a> to post a comment.</p>
                    </div>
                <?php endif; ?>

                <!-- List where comments will load -->
                <div id="commentsList" class="comments-list">
                    <div style="text-align:center; color:gray;">Loading comments...</div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- JAVASCRIPT FOR POPUP & AJAX COMMENTS -->
    <script>
        function openModal(btn, story_id) {
            var card = btn.parentElement;
            var title = card.querySelector('.full-title').innerHTML;
            var content = card.querySelector('.full-content').innerHTML;
            
            document.getElementById('modalTitle').innerHTML = title;
            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('activeStoryId').value = story_id; // Set Story ID for comments
            
            document.getElementById('storyModal').style.display = 'flex';
            document.body.style.overflow = 'hidden';
            
            fetchComments(story_id); // Open hote hi us story ke comments load karo
        }

        function closeModal() {
            document.getElementById('storyModal').style.display = 'none';
            document.body.style.overflow = 'auto';
            document.getElementById('commentText').value = ''; // Clean input
        }

        window.onclick = function(event) {
            var modal = document.getElementById('storyModal');
            if (event.target == modal) {
                closeModal();
            }
        }

        // ================= AJAX COMMENT FUNCTIONS =================

        // 1. Comments Fetch Karne Ka Function
        function fetchComments(story_id) {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "comment_api.php?action=fetch&story_id=" + story_id, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById('commentsList').innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }

        // 2. Comment Post Karne Ka Function
        function postComment() {
            var story_id = document.getElementById('activeStoryId').value;
            var comment_box = document.getElementById('commentText');
            var comment = comment_box.value.trim();

            if(comment === "") {
                alert("Please write something before posting!");
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "comment_api.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    if(xhr.responseText.includes("Success")) {
                        comment_box.value = ""; // Text box clear karo
                        fetchComments(story_id); // Comments wapas refresh karo immediately
                    } else {
                        alert(xhr.responseText); // Agar login na ho toh error
                    }
                }
            };
            xhr.send("action=add&story_id=" + story_id + "&comment=" + encodeURIComponent(comment));
        }
    </script>
</body>
</html>