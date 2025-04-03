let currentPageNumber = 0;
const pagination = document.getElementById('pagination');

window.reloadPagination = function () {
    const previousButton = document.getElementById('previousButton');
    const nextButton = document.getElementById('nextButton');
    const paginationButtons = document.getElementsByClassName('paginationButton');
    currentPageNumber = 0;

    previousButton.addEventListener('click', function () { setPage(currentPageNumber - 1) });
    nextButton.addEventListener('click', function () { setPage(currentPageNumber + 1) });
    for (let i = 0; i < paginationButtons.length; i++) {
        paginationButtons[i].addEventListener('click', function () { setPage(i) });
    }

    setPage(currentPageNumber, false);
}

function setPage(pageNumber, dispatchEvent = true) {
    const previousButton = document.getElementById('previousButton');
    const nextButton = document.getElementById('nextButton');
    const paginationButtons = document.getElementsByClassName('paginationButton');

    paginationButtons[currentPageNumber].classList.remove("active");
    paginationButtons[pageNumber].classList.add("active");

    previousButton.classList.toggle("invisible", pageNumber <= 0);
    nextButton.classList.toggle("invisible", pageNumber >= paginationButtons.length - 1);

    currentPageNumber = pageNumber;

    if (dispatchEvent) {
        pagination.dispatchEvent(new CustomEvent("pagechanged", {
            detail: { pageNumber: currentPageNumber }
        }));
    }
}