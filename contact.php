<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Contact Us – MSIC 2025</title>
<link rel="stylesheet" href="styles.css">
</head>

<body>
<header class="hero">
  <div class="hero-overlay">
    <div class="topbar">
      <div class="logo">
        <div class="logo-icon">🏛️</div>
        <div class="title">
          Ministry of Economy
          <div class="subtitle">Department of Statistics Malaysia</div>
        </div>
      </div>
      <div class="lang">
        <a href="index.php" class="lang-btn">Home</a>
      </div>
    </div>

    <div class="hero-content">
      <div class="badge">Support</div>
      <h1>Contact Us</h1>
      <p class="lead">Need help? Send us your message.</p>
    </div>
  </div>
</header>

<br>
<br>
<br>
<br>
<br>
<br>

<main class="container">
  <section class="search-section">
    <div class="search-panel">
      <h3>Send your message</h3>
      <form method="post" action="send_message.php">
        <label>Name</label>
        <input type="text" name="name" required>

        <label>Email</label>
        <input type="email" name="email" required>

        <label>Message</label>
        <textarea name="message" style="width:100%;height:140px;border-radius:8px;border:1px solid #ddd;padding:12px;" required></textarea>

        <button class="btn primary" style="margin-top:12px;">Submit</button>
      </form>
    </div>
  </section>
</main>

<footer>
    <div class="footer-container">
      <div>
        <h4>MSIC 2025</h4>
        <p>The official classification system for economic activities in Malaysia, maintained by the Department of Statistics Malaysia.</p>
        <p style="margin-top:20px; font-size:13px;">© 2025 Department of Statistics Malaysia | Bahagian Perangkaan Pengeluaran Industri Dan Binaan | Malaysia Madani</p>
    <p style="font-size:12px;">Terms of Service | Privacy Policy | Accessibility</p>
      </div>
      <div>
        <h4>Quick Links</h4>
        <a href="#">About MSIC</a><br>
        <a href="admin.php">Updates</a>
      </div>
      <div>
        <h4>Support</h4>
        <a href="help.php">Help Center</a><br>
        <a href="contact.php">Contact Us</a><br>
        <a href="feedback.php">Feedback</a><br>
        <a href="privacy.php">Privacy Policy</a>
      </div>
    </div>
  </footer>
</body>
</html>
