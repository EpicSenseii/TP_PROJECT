<?php $musicDir = "../../assets/sounds/1.mp3"; ?>

<!-- Splide library used for caroussel -->

<h2 class="partsTitles">Top 10</h2>
<section class="splide" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide"><?php include "cardsFeatured.php" ?></li>
            <li class="splide__slide"><?php include "cardsFeatured.php" ?></li>
            <li class="splide__slide"><?php include "cardsFeatured.php" ?></li>
        </ul>
    </div>
</section>

<hr>



<script type="module">
    var splide = new Splide('.splide', {
        type: 'loop',
        drag: 'free',
        snap: true,
        perPage: 4,
    });

    splide.mount();
    import WaveSurfer from 'https://unpkg.com/wavesurfer.js@7/dist/wavesurfer.esm.js'

    let isPlaying = false;
    let waves = document.querySelectorAll('.waveform');

    function togglePlayPause(wavesurfer, playBtn) {
        if (!isPlaying) {
            wavesurfer.play();
            isPlaying = true;
            playBtn.classList.replace('bi-play-fill', 'bi-pause-fill');
        } else {
            wavesurfer.pause();
            isPlaying = false;
            playBtn.classList.replace('bi-pause-fill', 'bi-play-fill');
        }
    }


    for (let wave of waves) {
        let wavesurfer = WaveSurfer.create({
            container: wave,
            waveColor: "#57508b",
            progressColor: "#c942a6",
            barWidth: 3,
            barGap: 0.5,
            url: "<?= $musicDir ?>",
        })

        wavesurfer.on('ready', () => {
            wave.previousElementSibling.style.display = 'none';
        });

        wavesurfer.on('interaction', (wavesurfer, playBtn) => {
            if (!isPlaying) {
                wavesurfer.play();
                isPlaying = true;
                playBtn.classList.replace('bi-play-fill', 'bi-pause-fill');
            }
        });

        let playBtn = wave.parentElement.previousElementSibling.firstElementChild;
        playBtn.addEventListener('click', () => {
            togglePlayPause(wavesurfer, playBtn);
        });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>