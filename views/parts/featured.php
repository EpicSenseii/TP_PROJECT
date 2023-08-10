<?php $musicDir = "../../assets/sounds/1.mp3"; ?>


<section class="splide" aria-label="Splide Basic HTML Example">
    <div class="splide__track">
        <ul class="splide__list">
            <li class="splide__slide"><?php include "cardsFeatured.php" ?></li>
            <li class="splide__slide"><?php include "cardsFeatured.php" ?></li>
            <li class="splide__slide"><?php include "cardsFeatured.php" ?></li>
        </ul>
    </div>
</section>

<!-- <div class="musicContaineFeatured">

</div> -->


<script type="module">
    var splide = new Splide( '.splide', {
  type   : 'loop',
  drag   : 'free',
  snap   : true,
  perPage: 3,
} );

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
            progressColor: "#d1159f",
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

<style>
    i {
        cursor: pointer;
    }

    .musicContaineFeatured {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .loader-overlay {
        display: flex;
        justify-content: center;
        align-items: center;
        position: fixed;
        width: 100px;
        height: 100px;
        z-index: 9999;
    }

    .loader {
        border: 6px solid #f3f3f3;
        border-top: 6px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    .soundCardContainerFeatured {
        /* width: 800px; */
        display: flex;
        margin-top: 100px;
    }

    .artistImg {
        height: 200px;
        width: 200px;
    }

    .artistImg img {
        height: 100%;
        object-fit: cover;
    }

    .artistHeader {
        margin-left: 30px;
        display: flex;
        align-items: center;
    }

    .playBtn,
    .pauseBtn {
        background: #D68CD6;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
    }

    .artistNameTitle {
        margin-top: 20px;
        margin-left: 20px;
    }

    .artistName {
        color: #8A8989;
    }

    .musicTitle {
        color: #494949;
        font-size: 1.1em;
    }

    .audioSectionFeatured {
        width: 30vw;
        margin-left: 30px;
        padding: 20px 0;
        display: none;
    }

    .waveform {
        width: 100%;
    }

    .socials {
        margin-left: 30px;
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 40%;
        margin: 0 auto;
    }

    .socialListened {
        display: flex;
        align-items: center;
    }

    .socialListened span {
        font-size: 12px;
    }

    .musicListened {
        font-size: 25px;
    }

    .socialComments {
        display: flex;
        align-items: center;
    }

    .socialComments span {
        font-size: 12px;
        margin-left: 5px;
    }
    
</style>