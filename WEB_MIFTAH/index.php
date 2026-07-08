<?php require_once 'app/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Miftah's Worlds</title>
    <link rel="stylesheet" href="asset/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-code"></i>
                <span>Miftah's Worlds</span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item">
                    <a href="index.php" class="nav-link active">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#about" class="nav-link">
                        <i class="fas fa-user"></i> About
                    </a>
                </li>
                <li class="nav-item">
                    <a href="content/buku.php" class="nav-link">
                        <i class="fas fa-book"></i> Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a href="content/film.php" class="nav-link">
                        <i class="fas fa-film"></i> Film
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <section id="home" class="hero">
        <div class="hero-content">
            <h1 class="hero-title">Welcome to <span class="gradient-text">Miftah's Worlds</span></h1>
            <p class="hero-subtitle">Mahasiswa Teknik Informatika UNSIQ Wonosobo | HIMTI 2025-2026</p>
            <div class="hero-buttons">
                <a href="#about" class="btn btn-primary">Tentang Saya</a>
                <a href="content/buku.php" class="btn btn-secondary">Eksplorasi</a>
            </div>
        </div>
        <div class="floating-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
        </div>
    </section>

    <section id="about" class="about">
        <div class="container">
            <h2 class="section-title">Tentang <span class="gradient-text">Saya</span></h2>
            <div class="about-content">
                <div class="about-text">
                    <div class="about-header">
                        <div class="about-avatar">
                            <img src="asset/miftah.jpg" alt="Foto Miftah">
                        </div>
                        <div class="about-title">
                            <h3>Miftah Nur'Aini Sholihah</h3>
                        </div>
                    </div>
                    <div class="info-grid">
                        <div class="info-item">
                            <i class="fas fa-birthday-cake"></i>
                            <span>Kuningan, 06 Oktober 2005</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Asal Boyolali</span>
                        </div>
                        <div class="info-item">
                            <i class="fas fa-users"></i>
                            <span>Wakil Ketua HIMTI UNSIQ 2025-2026</span>
                        </div>
                    </div>
                </div>
                <div class="social-media">
                    <h4>FIND ME!</h4>
                    <div class="sosmed-grid">
                        <a href="https://wa.me/6287730139550" class="sosmed-card whatsapp" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp</span>
                        </a>
                        <a href="https://www.instagram.com/mfthnranshlh?igsh=MXVndXpiaHpkcGlzdA==" class="sosmed-card instagram" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-instagram"></i>
                            <span>Instagram</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>