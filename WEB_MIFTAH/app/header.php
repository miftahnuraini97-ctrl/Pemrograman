<?php
// PHP untuk detect halaman aktif
$current_page = basename($_SERVER['PHP_SELF']);
$isRootPage = dirname($_SERVER['PHP_SELF']) === '/' || dirname($_SERVER['PHP_SELF']) === '\\';
$rootPath = $isRootPage ? './' : '../';
?>
<header class="header">
    <nav class="navbar">
        <div class="container">
            <div class="nav-brand">
                <a href="<?php echo $rootPath; ?>index.php">
                    <i class="fas fa-globe"></i> Miftah's Worlds
                </a>
            </div>
            
            <!-- Desktop Menu -->
            <ul class="nav-menu nav-menu-desktop">
                <li><a href="<?php echo $rootPath; ?>index.php" class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i> Home
                </a></li>
                <li><a href="<?php echo $rootPath; ?>content/about.php" class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>">
                    <i class="fas fa-user"></i> Tentang
                </a></li>
                <li><a href="<?php echo $rootPath; ?>content/contact.php" class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">
                    <i class="fas fa-envelope"></i> Kontak
                </a></li>
            </ul>

            <!-- Mobile Menu Toggle (Pure CSS) -->
            <label for="mobile-menu-toggle" class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </label>
            <input type="checkbox" id="mobile-menu-toggle" class="mobile-menu-toggle">

            <!-- Mobile Menu -->
            <ul class="nav-menu nav-menu-mobile">
                <li><a href="<?php echo $rootPath; ?>index.php" class="nav-link <?php echo $current_page == 'index.php' ? 'active' : ''; ?>">
                    <i class="fas fa-home"></i> Home
                </a></li>
                <li><a href="<?php echo $rootPath; ?>content/about.php" class="nav-link <?php echo $current_page == 'about.php' ? 'active' : ''; ?>">
                    <i class="fas fa-user"></i> Tentang
                </a></li>
                <li><a href="<?php echo $rootPath; ?>content/contact.php" class="nav-link <?php echo $current_page == 'contact.php' ? 'active' : ''; ?>">
                    <i class="fas fa-envelope"></i> Kontak
                </a></li>
            </ul>
        </div>
    </nav>
</header>
