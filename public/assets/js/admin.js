

const tableElement = document.querySelector("table.table");

const tableActionElement = tableElement.querySelectorAll(".table-action");


tableActionElement.forEach((item) => {
    const button = item.querySelector(".btn.btn-success");
    const list = item.querySelector('ul');


    button.addEventListener('click', function() {
        list.classList.toggle('d-none');
    });
});