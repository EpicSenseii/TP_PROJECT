<?php
$musicDir = "../../assets/sounds/1.mp3";
require_once '../../models/postsModel.php';
?>

<?php
$post = new posts();
$getPost = $post->getList();

foreach ($getPost as $sound) { ?>

    <div class="musicContainer">
        <div class="soundCardContainer">
            <div class="artistImg">
                <img src="<?= $sound->img ?>" alt="">
            </div>
            <div class="rightCardSection">
                <div class="artistHeader">
                    <i id="playBtn" class="bi bi-play-fill playBtn"></i>
                    <div class="artistNameTitle">
                        <p class="artistName"><?= $sound->username ?></p>
                        <div class="titleAndDate">
                            <p class="musicTitle"><?= $sound->title ?></p>
                            <p class="musicTitle small"><?= $sound->creationDate ?></p>
                        </div>
                    </div>
                </div>
                <div class="audioSection">
                    <div class="loader-overlay" id="loaderOverlay">
                        <div class="loader"></div>
                    </div>
                    <div class="waveform" path="<?= $sound->mp3Files ?>"></div>
                </div>
                <div class="socials">
                    <div class="socialLikes">
                        <i class="bi bi-heart"></i>
                        <span>4</span>
                    </div>
                    <i class="bi bi-share-fill"></i>
                    <div class="socialListened">
                        <i class="bi bi-play-fill musicListened"></i>
                        <span>32</span>
                    </div>
                    <div class="socialComments">
                        <i class="bi bi-chat-right-fill"></i>
                        <span>4</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script type="module">
    // var splide = new Splide('.splide', {
    //     type: 'loop',
    //     drag: 'free',
    //     snap: true,
    //     perPage: 4,
    // });

    // splide.mount();
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
            url: wave.getAttribute("path"),
        })
        console.log(wavesurfer);
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