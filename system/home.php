<?php
include './shared/layout.php';
?>
<div class="content flex-grow-1">
    <div class="container">
        <h1 class="text-center">¡Bienvenido al Sistema!</h1>
        <p class="text-center">Bienvenido, <?php echo $_SESSION['usuario'] ?></p>
    </div>
</div>
<?php
include './shared/footer.php';
?>