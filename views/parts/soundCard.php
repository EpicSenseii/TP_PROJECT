<?php
$musicDir = "../../assets/sounds/1.mp3";
require_once '../../models/postsModel.php';
?>

<?php
$post = new posts();
$getPost = $post->getList();

$search = new posts();
$getSearch = $search->getByName();

if (isset($_GET['search'])) {
    $searchTerm = $_GET['search'];

    foreach ($getSearch as $post) {
        if (stripos($post['name'], $searchTerm) !== false) {
            // Afficher le post correspondant au terme de recherche
            var_dump($post);
        }
    }
}


foreach ($getPost as $sound) { ?>
    <div class="musicContainer">
        <div class="soundCardContainer">
            <div class="artistImg">
                <a href="music-<?= $sound->id ?>"><img src="<?= $sound->img ?>" alt=""></a>
            </div>
            <div class="rightCardSection">
                <div class="artistHeader">
                    <i id="playBtn" class="bi bi-play-fill playBtn"></i>
                    <div class="artistNameTitle">
                        <p class="artistName"><?= $sound->username ?></p>
                        <div class="titleAndDate">
                            <a href="music-<?= $sound->id ?>">
                                <p class="musicTitle"><?= $sound->title ?></p>
                            </a>
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
                        <i title="Like it !" class="bi bi-heart"></i>
                        <span>4</span>
                    </div>
                    <i title="Share" class="bi bi-share-fill"></i>
                    <div class="socialListened">
                        <i title="Views" class="bi bi-play-fill musicListened"></i>
                        <span>32</span>
                    </div>
                    <div class="socialComments">
                        <a href="music-<?= $sound->id ?>"><i title="Comments" class="bi bi-chat-right-fill"></i></a>
                        <span><?= $sound->commentsNumber ?></span>
                    </div>
                    <div class="socialOption">
                        <div class="dropdown">
                            <i title="Options" class="bi bi-three-dots dotBtn" id="dotBtn"></i>
                            <ul class="dropdownMenu">
                                <li><a class="dropdown-item" href="#">Modifier</a></li>
                                <li><a class="dropdown-item" href="#">Supprimer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<script type="module">
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
            height: 100,
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