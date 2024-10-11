<!-- navbar.php -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="navbar">
    <div class="logo">
        <a href="index.php"><img src="lgoo.png" alt="Logo"></a>
    </div>
    <div class="nav-links">
    <a href="index.php" class="<?php if ($currentPage == 'index') echo 'active'; ?>">Domů</a>
    <a href="items.php" class="<?php if ($currentPage == 'items') echo 'active'; ?>">Nalezené Předměty</a>
    <a href="login.php" class="<?php if ($currentPage == 'login') echo 'active'; ?>">Administrace</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
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