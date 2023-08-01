<?php $musicDir = "../../assets/sounds/1.mp3"; ?>

<div class="soundCardContainer">
    <div class="artistImg">
        <img src="https://picsum.photos/300" alt="">
    </div>
    <div class="rightCardSection">
        <div class="artistHeader">
            <i id="playBtn" class="bi bi-play-fill"></i>
            <!-- INTERHCANGER ICONE PLAY ET PAUSE -->
            <!-- <i class="bi bi-pause-fill"></i> -->
            <div class="artistNameTitle">
                <p class="artistName">Epic</p>
                <p class="musicTitle">First Music </p>
            </div>
        </div>
        <div class="audioSection">
            <div class="loader-overlay" id="loaderOverlay">
                <div class="loader"></div>
            </div>
            <div id="waveform"></div>
        </div>
    </div>
</div>

<script type="module">
    import WaveSurfer from 'https://unpkg.com/wavesurfer.js@7/dist/wavesurfer.esm.js'

    const wavesurfer = WaveSurfer.create({
        container: '#waveform',
        waveColor: "#57508b",
        progressColor: "#d1159f",
        barWidth: 3,
        barGap: 0.5,
        url: "<?= $musicDir ?>",
    })

    let isPlaying = false;

    function togglePlayPause() {
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

    wavesurfer.on('interaction', () => {
        if (!isPlaying) {
            wavesurfer.play();
            isPlaying = true;
            playBtn.classList.replace('bi-play-fill', 'bi-pause-fill');
        }
    });

    playBtn.addEventListener('click', () => {
        togglePlayPause();
    });

    wavesurfer.on('ready', () => {
        // Une fois que la musique est chargée, masquer le loader
        document.getElementById('loaderOverlay').style.display = 'none';
        // Afficher le graphique de la musique une fois chargée
        document.getElementById('waveform').style.display = 'block';
    });
</script>

<style>
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

    .soundCardContainer {
        width: 800px;
        height: 200px;
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
    }

    .bi-play-fill,
    .bi-pause-fill {
        background: #D68CD6;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
    }

    .artistNameTitle {
        margin-top: 20px;
    }

    .artistName {
        color: #8A8989;
    }

    .musicTitle {
        color: #494949;
        font-size: 1.2em;
    }

    .audioSection {
        width: 30vw;
        margin-left: 30px;
    }
</style>