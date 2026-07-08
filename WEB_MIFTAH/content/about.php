<?php require_once '../app/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - <?= SITE_NAME ?></title>
    <link rel="stylesheet" href="../asset/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
                <i class="fas fa-code"></i>
                <span><?= SITE_NAME ?></span>
            </div>
            <ul class="nav-menu">
                <li class="nav-item"><a href="../index.php" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                <li class="nav-item"><a href="../index.php#about" class="nav-link"><i class="fas fa-user"></i> About</a></li>
                <li class="nav-item"><a href="buku.php" class="nav-link"><i class="fas fa-book"></i> Buku</a></li>
                <li class="nav-item"><a href="film.php" class="nav-link"><i class="fas fa-film"></i> Film</a></li>
            </ul>
        </div>
    </nav>
    
    <section class="content-section">
        <div class="container">
            <div style="text-align: center; margin: 6rem 0 3rem 0;">
                <h1 class="page-title gradient-text">👤 Tentang Saya</h1>
            </div>
            <div class="profile-card">
                <div class="profile-content">
                    <h2>Miftah Nur'Aini Sholihah</h2>
                    <div class="profile-info">
                        <p><strong>🎂 Tempat/Tgl Lahir:</strong> Kuningan, 06 Oktober 2005</p>
                        <p><strong>🏠 Asal:</strong> Boyolali</p>
                        <p><strong>🏫 Universitas:</strong> Universitas Sains Al-Qur'an Wonosobo</p>
                        <p><strong>📚 Jurusan:</strong> Teknik Informatika</p>
                        <p><strong>👑 Jabatan:</strong> Wakil Ketua HIMTI UNSIQ 2025-2026</p>
                    </div>
                    <p class="profile-bio">
                        Mahasiswa Teknik Informatika yang passionate dengan coding dan pengembangan web. 
                        Selalu haus belajar hal baru dan berkontribusi di Himpunan Mahasiswa Teknik Informatika.
                    </p>
                    <div class="contact-section">
                        <h3>Hubungi Saya</h3>
                        <a href="https://wa.me/6287730139550" class="whatsapp-btn" target="_blank" rel="noopener noreferrer">
                            <i class="fab fa-whatsapp"></i>
                            <span>WhatsApp: 087730139550</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        .contact-section {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #e2e8f0;
        }

        .contact-section h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .whatsapp-btn {
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            padding: 12px 24px;
            background: linear-gradient(135deg, #25d366, #20ba61);
            color: white;
            text-decoration: none;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);
        }

        .whatsapp-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
            background: linear-gradient(135deg, #20ba61, #1da851);
        }

        .whatsapp-btn i {
            font-size: 1.5rem;
        }
    </style>
</body>
</html>