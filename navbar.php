<div class="navbar">
    <div class="logo">
        <a href="index.php"><img src="logo.png" alt="Logo"></a>
    </div>
    <button id="nav-button" onclick="toggleMenu()"></button>
    <div class="nav-links" id="nav-links">
        <a href="index.php" class="<?php if ($currentPage == 'index')
            echo 'active'; ?>">Domů</a>
        <a href="items.php" class="<?php if ($currentPage == 'items')
            echo 'active'; ?>">Nalezené Předměty</a>
        <a href="login.php" class="<?php if ($currentPage == 'login')
            echo 'active'; ?>">Administrace</a>
    </div>
    <div class="nav-links" id="nav-links-small">
        <a href="index.php" class="<?php if ($currentPage == 'index')
            echo 'active'; ?>">Domů</a>
        <a href="items.php" class="<?php if ($currentPage == 'items')
            echo 'active'; ?>">Nalezené Předměty</a>
        <a href="login.php" class="<?php if ($currentPage == 'login')
            echo 'active'; ?>">Administrace</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<script>
    document.getElementById("nav-links-small").style.display = "none";
    function toggleMenu() {
        var navLinks = document.getElementById("nav-links-small");
        var style = navLinks.style.display;
        if (style === 'none') {
            navLinks.style.display = "flex";
        } else {
            navLinks.style.display = "none";
        }
    }

    function updateScreenWidth() {
        var navLinks = document.getElementById("nav-links-small").style.display = 'none';
    }

    window.addEventListener('resize', updateScreenWidth);
</script>