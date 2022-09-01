///////////////////////////////////////////////////////////////////////////

// modals for unique buttons
const modals = ["createCategory", "deleteCategory", "createTodo"];

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
///////////////////////////////////////////////////////////////////////////

// for multiple buttons that refer to the same modal
const buttons = document.getElementsByName("editTodoBtn");

buttons.forEach((e) => {
    const modal = document.getElementById("editTodo");
    const span = document.getElementsByClassName("close")[modals.length];

    const id = document.getElementById("editTodoId");
    const title = document.getElementById("editTodoTitle");
    const description = document.getElementById("editTodoDescription");
    const status = document.getElementById("editTodoStatus");
    const assignedTo = document.getElementById("editTodoAssignedTo");
    const category = document.getElementById("editTodoCategory");

    const idVal = e.getAttribute("value");

    e.onclick = function () {
        modal.style.display = "block";

        id.value = idVal;
        title.value = document.getElementById(idVal + ",title").value;
        description.value = document.getElementById(idVal + ",description").value;
        status.value = document.getElementById(idVal + ",status").value;
        assignedTo.value = document.getElementById(idVal + ",assignedTo").value;
        category.value = document.getElementById(idVal + ",category").value;
    }

    span.onclick = function () {
        modal.style.display = "none";
    }
})
///////////////////////////////////////////////////////////////////////////

// window onclick for all modals
window.onclick = function (event) {

    modals.forEach((e) => {
        const modal = document.getElementById(e);
        if (event.target === modal) {
            modal.style.display = "none";
        }
    })

    buttons.forEach((e) => {
        const modal = document.getElementById("editTodo");
        if (event.target === modal) {
            modal.style.display = "none";
        }
    })
}
///////////////////////////////////////////////////////////////////////////