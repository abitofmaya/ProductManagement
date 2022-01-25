function insertField() {
    let entry =
        '<label>Product ID:</label>\n<input class="input-box" type="text" name="pid" placeholder="product id">';

    let element = document.createElement("div");
    element.setAttribute("id", "pid-id");
    element.innerHTML = entry;

    document
        .getElementById("form-id")
        .insertBefore(element, document.getElementById("name-id"));

    // Update the form handler
    updateForm();
    updateSubmitButton();
}

function updateForm() {
    let element = document.getElementById("form-id");
    element.setAttribute("action", "../includes/update.php");
}

function updateSubmitButton() {
    let element = document.getElementById("submit-id");
    element.setAttribute("name", "update");
    element.innerText = "Update";
}
