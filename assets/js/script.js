document.addEventListener('DOMContentLoaded', () => {
    const searchIcon = document.getElementById('searchEvent');
    const searchForm = document.querySelector('.search-form2');

    let isSearchIconCrossed = false;

    searchIcon.addEventListener('click', () => {
        isSearchIconCrossed = !isSearchIconCrossed;

        if (isSearchIconCrossed) {
            // Lorsque l'utilisateur clique, transformez l'icône en "X"
            searchIcon.classList.remove('bi-search');
            searchIcon.classList.add('bi-x');
        } else {
            // Lorsque l'utilisateur clique à nouveau, ramenez l'icône à sa forme initiale
            searchIcon.classList.remove('bi-x');
            searchIcon.classList.add('bi-search');
        }
        searchForm.style.display = searchForm.style.display === 'block' ? 'none' : 'block';
    });
});
