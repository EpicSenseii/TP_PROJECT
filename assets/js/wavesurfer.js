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