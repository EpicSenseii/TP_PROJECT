<?php $title = "SoundTherapy" ?>
<?php include "views/header.php"; ?>

<!-- GranimJs library for landing page use js file to modify -->
<div class="canvas-interactive-wrapper">
    <canvas id="canvas-interactive"></canvas>
    <nav>
        <div class="landingHeader">
            <img id="logoLanding" src="assets/img/logo_transparent.png" alt="">
            <h1 id="logoName">SoundTherapy</h1>
        </div>
    </nav>
    <div class="cta-wrapper">
        <a href="#default-state" name="defaultState" id="default-state-cta" class="aLink active">En savoir plus</a>
        <a href="#violet-state" name="violetState" id="violet-state-cta" class="aLink">Lorem</a>
        <a href="feed" class="aLink">Entrer</a>
        <div class="defaultStateClicked landingDescription" id="defaultStateClicked">
            <p>SoundTherapy est une plateforme de musique qui vous permet d'explorer et de découvrir une vaste bibliothèque de morceaux apaisants et inspirants. Profitez d'une expérience immersive en ajoutant votre musique préférée, découvrez de nouvelles pistes et créez des playlists personnalisées.</p>
        </div>
        <div class="violetStateClicked landingDescription" id="violetStateClicked">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur saepe dolores corporis asperiores numquam eveniet cupiditate. Recusandae ea, nihil repellat, voluptatibus iusto ut error iste sequi ipsa delectus temporibus eum?</p>
        </div>
    </div>
</div>

<?php include "views/footer.php"; ?>