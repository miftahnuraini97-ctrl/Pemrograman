<?php require_once '../app/config.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku - <?= SITE_NAME ?></title>
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
                <li class="nav-item"><a href="buku.php" class="nav-link active"><i class="fas fa-book"></i> Buku</a></li>
                <li class="nav-item"><a href="film.php" class="nav-link"><i class="fas fa-film"></i> Film</a></li>
            </ul>
        </div>
    </nav>

    <section class="content-section">
        <div class="container">
            <div style="text-align: center; margin: 6rem 0 3rem 0;">
                <h1 class="page-title gradient-text">📚 Buku Favorit</h1>
                <p class="page-subtitle">Koleksi buku</p>
            </div>
            
            <div class="book-grid">
                <div class="book-card">
                    <a href="https://p16-oec-sg.ibyteimg.com/tos-alisg-i-aphluv4xwc-sg/c64f242ef9494931aa0927531de5a995~tplv-aphluv4xwc-resize-jpeg:700:0.jpeg" target="_blank" rel="noopener noreferrer">
                        <div class="book-image">
                            <img src="https://p16-oec-sg.ibyteimg.com/tos-alisg-i-aphluv4xwc-sg/c64f242ef9494931aa0927531de5a995~tplv-aphluv4xwc-resize-jpeg:700:0.jpeg" alt="Dompet Ayah Sepatu Ibu">
                        </div>
                        <h4>Dompet Ayah Sepatu Ibu</h4>
                        <p><strong>J.S Khairen</strong> | 2024</p>
                        <p class="book-desc">Menceritakan perjuangan gigih Asrul dan Zena, anak-anak yang hidup penuh keterbatasan di kawasan Gunung Singgalang, Sumatera Barat, dalam mengubah nasib keluarga mereka melalui pendidikan tinggi berkat dukungan luar biasa dari orang tua.</p>
                    </a>
                </div>

                <div class="book-card">
                    <a href="https://cdn.gramedia.com/uploads/picture_meta/2023/6/26/ewdijg3qnq7vwifvrcydwj.png" target="_blank" rel="noopener noreferrer">
                        <div class="book-image">
                            <img src="https://cdn.gramedia.com/uploads/picture_meta/2023/6/26/ewdijg3qnq7vwifvrcydwj.png" alt="Semesta Bercerita">
                        </div>
                        <h4>Semesta Bercerita</h4>
                        <p><strong>ASTRONOTESS</strong> | 2023</p>
                        <p class="book-desc">Buku dengan fokus utamanya adalah bagaimana manusia menghadapi kekecewaan, kegagalan, dan kehilangan, namun tetap berusaha menemukan harapan. Narasi di dalamnya mengajak pembaca untuk berdamai dengan masa lalu, mensyukuri setiap kejadian, dan melihat setiap peristiwa sebagai cara "semesta" memberikan pelajaran berharga.</p>
                    </a>
                </div>

                <div class="book-card">
                    <a href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH0-CnHPjWIJwb0j421nG8P_XJVu3A7ALG2Q&s" target="_blank" rel="noopener noreferrer">
                        <div class="book-image">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSH0-CnHPjWIJwb0j421nG8P_XJVu3A7ALG2Q&s" alt="Laut Bercerita">
                        </div>
                        <h4>Laut Bercerita</h4>
                        <p><strong>S. Chudori</strong> | 2017</p>
                        <p class="book-desc">Novel fiksi sejarah yang mengisahkan perjuangan, penyiksaan, dan kehilangan para aktivis mahasiswa pada masa Orde Baru (1998). </p>
                    </a>
                </div>

                <div class="book-card add-new">
                    <a href="#">
                        <i class="fas fa-plus-circle"></i>
                        <h4>+ Tambah Buku</h4>
                        <p>Edit file ini untuk tambah koleksi</p>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <style>
        .content-section {
            min-height: 100vh;
            padding: 100px 0;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        }
        
        .page-title {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        
        .page-subtitle {
            font-size: 1.2rem;
            color: #64748b;
            max-width: 600px;
            margin: 0 auto;
        }
        
        .book-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }
        
        .book-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            transition: all 0.3s ease;
            border-top: 4px solid transparent;
        }
        
        .book-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(139, 92, 246, 0.2);
            border-top-color: #8b5cf6;
        }

        .book-card a {
            color: inherit;
            text-decoration: none;
            display: block;
        }

        .book-image {
            margin-bottom: 1.5rem;
        }

        .book-image img {
            width: 100%;
            height: 180px;
            object-fit: contain;
            border-radius: 18px;
            background: #f8fafc;
        }
        
        .book-placeholder {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #ff6b9d, #8b5cf6);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 2rem;
            color: white;
        }
        
        .book-card h4 {
            color: #1e293b;
            margin-bottom: 0.5rem;
        }
        
        .book-desc {
            color: #64748b;
            font-size: 0.95rem;
            margin-top: 1rem;
            line-height: 1.5;
        }
        
        .add-new {
            border: 2px dashed #8b5cf6;
            background: #f8fafc;
            cursor: pointer;
            color: #8b5cf6;
        }
        
        .add-new:hover {
            background: #8b5cf6;
            color: white;
            border-color: white;
        }
    </style>
</body>
</html>