<nav>
    <ul>
        <div class="navFlex logoAndTitle">
            <li><a href="../pages/mainPage.php"><img src="../../assets/img/logo_transparent.png" alt=""></a></li>
            <li><a href="../pages/mainPage.php">
                    <h1>SoundTherapy</h1>
                </a></li>
        </div>
        <div class="search-container">
            <input type="search" class="musicSearch" name="search" id="search">
            <i class="bi bi-search"></i>
        </div>

        <div class="navFlex userNAvSection">
            <li><a href="">Uploader</a></li>
            <li><a href="">USERICON</a></li>
            <!-- SI PAS CONNECTE -->
            <li><a href="../pages/signup.php">CONNECTEZ VOUS</a></li>
            <li><i class="bi bi-bell-fill"></i></li>
        </div>
    </ul>
</nav>

<!-- AJOUTER ACTIVE CLASS SUR LES LIENS / PAGES -->

<style>
    ul {
        list-style-type: none;
    }

    nav a,
    nav h1 {
        text-decoration: none;
        color: whitesmoke;
    }

    nav {
        padding: 5px 0;
        background: #333;
    }

    nav ul {
        margin: 0 auto;
        display: flex;
        justify-content: space-around;
        align-items: center;
        width: 70%;
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

    .logoAndTitle {}

    .userNAvSection li {
        margin-left: 20px;
    }

    .search-container {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        /* border: 1px solid #ccc; */
        border-radius: 4px;
        padding: 5px;
        margin-left: 30%;
    }

    .musicSearch {
        flex: 1;
        height: 30px;
        padding: 0 5px;
        width: 300px;
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
        margin-left: 5px;
    }

    input[type="search"]::-webkit-search-decoration,
    input[type="search"]::-webkit-search-cancel-button,
    input[type="search"]::-webkit-search-results-button,
    input[type="search"]::-webkit-search-results-decoration {
        -webkit-appearance: none;
    }
</style>