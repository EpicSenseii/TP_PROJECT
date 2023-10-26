<div class="mainContainer">
    <div class="musicContainer">
        <h2><?= $post->title ?></h2>
        <div class="soundCardContainer">
            <div class="artistImg">
                <img src="<?= $post->img ?>" alt="">
            </div>
            <div class="rightCardSection">
                <div class="artistHeader">
                    <i id="playBtn" class="bi bi-play-fill playBtn"></i>
                    <div class="artistNameTitle">
                        <p class="artistName"><?= $post->username ?></p>
                        <div class="titleAndDate">
                            <p class="musicTitle"><?= $post->title ?></p>
                            <p class="musicTitle small"><?= $post->creationDate ?></p>
                            <?php if (isset($_SESSION['user']['id'])) { ?>
                                <form class="commentEdit" action="" method="POST">
                                    <input type="hidden" name="comment_id" value="">
                                    <input class="editComment" type="submit" value="&times">
                                    <a href="edit-" class="editCommentBtn"><i class="bi bi-pencil editComment"></i></a>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="audioSection">
                    <div class="loader-overlay" id="loaderOverlay">
                        <div class="loader"></div>
                    </div>
                    <div class="waveform" path="<?= $post->mp3Files ?>"></div>
                </div>
                <div class="socials">
                    <div title="Like it !" class="socialLikes">
                        <i class="bi bi-heart"></i>
                        <span>4</span>
                    </div>
                    <i title="Share" class="bi bi-share-fill"></i>
                    <div class="socialListened">
                        <i title="Views" class="bi bi-play-fill musicListened"></i>
                        <span>32</span>
                    </div>
                    <div class="socialComments">
                        <i title="Comments" class="bi bi-chat-right-fill"></i>
                        <span><?= $post->commentsNumber ?></span>
                    </div>
                    <div class="socialOption">
                        <i title="Options" class="bi bi-three-dots"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="commentsContainer">
        <form class="signupForm formFlex2" action="" method="POST">
            <h2>Ajoutez un commentaire</h2>
            <label for="commentOnID">Entrez un commentaire</label>
            <textarea name="commentOnID" id="commentOnID" class="commentOnID" cols="30" rows="3" placeholder="Wow amazing 🥰"></textarea>
            <input class="submitBtn" type="submit" value="Envoyez votre commentaire">
        </form>
    </div>

    <div class="commentsListContainer" style="margin-top: 50px;">
        <?php foreach ($commentsList as $uComment) { ?>
            <div class="commentsContainer cContainerFlex">
                <div class="userInfos">
                    <div class="leftSide">
                        <img src="<?= $uComment->img ?>" alt="user profil image">
                        <p class="artistName"><?= $uComment->username ?></p>
                        <p class="small"><?= $uComment->publicationDate ?></p>
                    </div>
                    <div class="rightSide">
                        <?php if (isset($_SESSION['user']['id'])) { ?>
                            <form class="commentEdit" action="" method="POST">
                                <input type="hidden" name="comment_id" value="<?= $uComment->commentId ?>">
                                <input class="editComment" type="submit" value="&times">
                            </form>
                            <div class="rightSide">
                                <a href="edit-<?= $uComment->commentId ?>" class="editCommentBtn"><i class="bi bi-pencil editComment"></i></a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="useruComment">
                    <p><?= $uComment->comment ?></p>
                </div>
            </div>
            <hr>
        <?php } ?>
    </div>

</div>
</div>

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