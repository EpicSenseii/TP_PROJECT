<nav>
    <ul>
        <div class="navFlex logoAndTitle">
            <li><a href="feed"><img src="../../assets/img/logo_transparent.png" alt=""></a></li>
            <li><a href="feed">
                    <h1>SoundTherapy</h1>
                </a></li>
        </div>
        <div class="search-container">
            <input type="search" class="musicSearch" name="search" id="search">
            <i class="bi bi-search loupe"></i>
        </div>

        <div class="navFlex userNAvSection">
            <li><a href="upload">Uploader</a></li>
            <div class="iconAndConnection">
                <li><img class="userIcon" src="https://picsum.photos/200" alt=""></li>
                <li id="connectionBtn"><a href="signin">Connexion</a></li>
            </div>
            <li><i class="bi bi-bell-fill"></i></li>
        </div>
    </ul>
</nav>

<!-- 
    Ajouter MODAL sur NOTIFICATIONS 
    Corriger barre de RECHERCHE non RESPONSIVE
    Changer l'image PROFIL si non CONNECTE
    REMPLACER "connexion" par le NOM UTILISATEUR si CONNECTE
    Rentre le CLIQUE IMPOSSIBLE si NON CONNECTE
-->

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
        margin: 0;
        padding: 0;
    }

    .userNAvSection li:not(#connectionBtn) {
        margin-left: 20px;
    }

    #connectionBtn {
        margin-left: 5px;
    }

    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        width: 300px;
        border-radius: 4px;
        padding: 5px;
    }

    .musicSearch {
        flex: 1;
        height: 30px;
        padding: 0 5px;
        border: none;
        border-radius: 3px;
        outline: none;
        font-size: 16px;

    }

    .musicSearch:focus {
        outline: none;
    }

    .bi-search {
        color: white;
        font-size: 20px;
        margin-left: 10px;
    }

    .iconAndConnection {
        display: flex;
        align-items: center;
    }

    .userIcon {
        border-radius: 50%;
        object-fit: cover;
    }

    input[type="search"]::-webkit-search-decoration,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-results-button,
    input[type="search"]::-webkit-search-results-decoration {
        -webkit-appearance: none;
    }
</style>