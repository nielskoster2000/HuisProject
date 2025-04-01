let currentPage = 0;

window.reloadPagination = function () {
    console.log("reloadPagination");

    currentPage = 0;

    const previousButton = document.getElementById('previousButton');
    const nextButton = document.getElementById('nextButton');
    const paginationButtons = document.getElementsByClassName('paginationButton');

    previousButton.addEventListener('click', function () { console.log("click previous"); setPage(currentPage - 1) });
    nextButton.addEventListener('click', function () { setPage(currentPage + 1) });
    for (let i = 0; i < paginationButtons.length; i++) {
        paginationButtons[i].addEventListener('click', function () { setPage(i) });
    }

    setPage(currentPage);
}

window.setPage = function (page) {

    const pagination = document.getElementById('pagination');
    const previousButton = document.getElementById('previousButton');
    const nextButton = document.getElementById('nextButton');
    const paginationButtons = document.getElementsByClassName('paginationButton');

    paginationButtons[currentPage].classList.remove("active");
    paginationButtons[page].classList.add("active");

    previousButton.classList.toggle("invisible", page <= 0);
    nextButton.classList.toggle("invisible", page >= paginationButtons.length - 1);

    currentPage = page;

    pagination.dispatchEvent(new CustomEvent("pagechanged", {
        detail: { page: currentPage }
    }));
}