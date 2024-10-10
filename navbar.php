<!-- navbar.php -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="topnav" id="myTopnav">
    <div class="logo">
        <a href="index.php"><img src="lgoo.png" alt="Logo"></a>
    </div>
    <div class="nav-links">
    <a href="index.php">Domů</a>
    <a href="items.php">Nalezené Předměty</a>
    <a href="login.php">Administrace</a>
    </div>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
    </a>
</div>
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>