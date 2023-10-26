<nav class="navDesktop">
    <ul>
        <div class="navFlex logoAndTitle">
            <li><a href="feed"><img src="assets/img/logo_transparent.png" alt=""></a></li>
            <li><a href="feed">
                    <h1>SoundTherapy</h1>
                </a></li>
            <li><a class="feed" href="feed">Feed</a></li>
        </div>
        <div class="search-container">
            <form class="search-form" action="" method="get">
                <input type="search" class="musicSearch" name="search" id="search">
                <button type="submit" class="bi bi-search loupe"></button>
            </form>
        </div>

        <div class="navFlex userNAvSection">
            <?php if (isset($_SESSION['user'])) { ?>
                <li><a href="upload">Uploader</a></li>
                <div class="iconAndConnection">
                    <li><img class="userIcon" src="<?= $_SESSION['user']['img'] ?>" alt=""></li>
                <?php } ?>

                <?php if (isset($_SESSION['user'])) { ?>
                    <li id="connectionBtn"><a href="profil"><?= $_SESSION['user']['username'] ?></a></li>
                    <li id="logoutBtn"><a href="logout">Déconnexion</a></li>
                <?php } else { ?>
                    <li id="logoutBtn"><a href="signin">Connexion</a></li>
                <?php } ?>
                </div>
                <li><i class="bi bi-bell-fill"></i></li>
        </div>
    </ul>
</nav>

<nav class="navMobile">
    <ul>
        <div class="navFlex logoAndTitle">
            <li><a href="feed"><img src="assets/img/logo_transparent.png" alt=""></a></li>
            <li><a href="feed">
                    <h1>SoundTherapy</h1>
                </a></li>
            <li><a class="feed" href="feed">Feed</a></li>
        </div>

        <div class="navFlex userNAvSection">
            <?php if (isset($_SESSION['user'])) { ?>
                <li><a href="upload">Uploader</a></li>
            <?php } ?>
            <div class="iconAndConnection">
                <?php if (isset($_SESSION['user'])) { ?>
                    <li><img class="userIcon" src="<?= $_SESSION['user']['img'] ?>" alt=""></li>
                <?php } ?>

                <?php if (isset($_SESSION['user'])) { ?>
                    <li id="connectionBtn"><a href="profil"><?= $_SESSION['user']['username'] ?></a></li>
                    <li id="logoutBtn"><a href="logout">Déconnexion</a></li>
                <?php } else { ?>
                    <li id="logoutBtn"><a href="signin">Connexion</a></li>
                <?php } ?>
            </div>
            <li><i class="bi bi-bell-fill"></i></li>
        </div>

        <div class="search-container">
            <span class="bi bi-search loupe" id="searchEvent"></span>
            <form class="search-form2" action="" method="get">
                <input type="search" class="musicSearch" name="search" id="search">
                <button type="submit" class="bi bi-search loupe"></button>
            </form>
        </div>
    </ul>
</nav>

<style>
    ul {
        list-style-type: none;
    }

    nav a,
    nav h1 {
        text-decoration: none;
        color: whitesmoke;
        margin: 0;
    }

    nav {
        padding: 5px 0;
        background: #333;
    }

    nav ul {
        margin: 0 auto;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .navFlex {
        display: flex;
        align-items: center;
    }

    .bi-bell-fill {
        color: white;
        cursor: pointer;
    }

    img {
        height: 40px;
        width: 40px;
        margin: 0;
        padding: 0;
    }

    .userNAvSection li:not(#connectionBtn) {
        margin-left: 20px;
    }

    #connectionBtn {
        margin-left: 5px;
    }

    .feed {
        margin-left: 15px;
    }

    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        border-radius: 4px;
        padding: 5px;
    }

    .search-form {
        width: 100%;
    }

    .musicSearch {
        flex: 1;
        height: 30px;
        padding: 0 5px;
        border: none;
        border-radius: 3px;
        outline: none;
        font-size: 16px;
        width: 300px;
    }

    .musicSearch:focus {
        outline: none;
    }

    .bi-search {
        color: white;
        font-size: 20px;
        margin-left: 10px;
        background: none;
        border: none;
        cursor: pointer;
    }

    .iconAndConnection {
        display: flex;
        align-items: center;
    }

    .userIcon {
        border-radius: 50%;
        object-fit: cover;
    }

    .navMobile {
        display: none;
    }

    input[type="search"]::-webkit-search-decoration,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-results-button,
    input[type="search"]::-webkit-search-results-decoration {
        -webkit-appearance: none;
    }

    @media only screen and (max-width: 935px) {
        .navDesktop {
            display: none;
        }

        .navMobile {
            display: block;
        }

        .search-form2 {
            display: none;
        }

        #searchEvent {
            margin-right: 10px;
            cursor: pointer;
        }

        .bi-x {
            font-size: 30px;
            color: white;
        }
    }
</style>