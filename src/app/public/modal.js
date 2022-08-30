const modals = ["createCategory", "createTodo"];

modals.forEach((e, i) => {
    // Get the modal
    const modal = document.getElementById(e);

    // Get the button that opens the modal
    const btn = document.getElementById(e + "Btn");

    // Get the <span> element that closes the modal
    const span = document.getElementsByClassName("close")[i];

    // When the user clicks on the button, open the modal
    btn.onclick = function () {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }
})

// When the user clicks anywhere outside the modal, close it
window.onclick = function (event) {
    modals.forEach((e) => {
        const modal = document.getElementById(e);
        if (event.target === modal) {
            modal.style.display = "none";
        }
    })
}
