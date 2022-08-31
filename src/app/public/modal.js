const modals = ["createCategory", "createTodo"];

modals.forEach((e, i) => {
    const modal = document.getElementById(e);
    const btn = document.getElementById(e + "Btn");
    const span = document.getElementsByClassName("close")[i];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        modal.style.display = "none";
    }
})

window.onclick = function (event) {
    modals.forEach((e) => {
        const modal = document.getElementById(e);
        if (event.target === modal) {
            modal.style.display = "none";
        }
    })
}
