<?php $title = "SoundTherapy" ?>
<?php include "views/header.php"; ?>

<div class="canvas-interactive-wrapper">
    <canvas id="canvas-interactive"></canvas>
    <nav>
        <div class="landingHeader">
            <img id="logoLanding" src="assets/img/logo_transparent.png" alt="">
            <h1 id="logoName">SoundTherapy</h1>
        </div>
    </nav>
    <div class="cta-wrapper">
        <a href="#default-state" id="default-state-cta" class="aLink active">En savoir plus</a>
        <a href="#violet-state" id="violet-state-cta" class="aLink">Violet state</a>
        <a href="views/pages/mainPage.php" class="aLink">Entrer</a>
    </div>
</div>

<?php include "views/footer.php"; ?>