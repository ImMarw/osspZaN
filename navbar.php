<div class="navbar">
    <div class="logo">
        <a href="index.php"><img src="logo.png" alt="Logo"></a>
    </div>
    <div class="nav-links">
        <a href="index.php" class="<?php if ($currentPage == 'index')
            echo 'active'; ?>">Domů</a>
        <a href="items.php" class="<?php if ($currentPage == 'items')
            echo 'active'; ?>">Nalezené Předměty</a>
        <a href="login.php" class="<?php if ($currentPage == 'login')
            echo 'active'; ?>">Administrace</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="toggleMenu()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<script>
    function toggleMenu() {
        var navLinks = document.getElementById("navLinks");
        if (navLinks.classList.contains("show-nav")) {
            navLinks.classList.remove("show-nav");
        } else {
            navLinks.classList.add("show-nav");
        }
    }
</script>