function addEntry() {
    function addElement(entry, elementID) {
        let element = document.createElement("div");
        element.innerHTML = entry;
        document.getElementById(elementID).appendChild(element);
    }

    let entry = '<label></label>\n<input class="input-box" type="text" name="sku[]" placeholder="sku">';
    let elementID = 'sku-id';
    addElement(entry, elementID);

    entry = '<label></label>\n<input class="input-box" type="text" name="price[]" placeholder="price">';
    elementID = 'price-id';
    addElement(entry, elementID);

    entry = '<label></label>\n<input class="input-box" type="text" name="size[]" placeholder="size">';
    elementID = 'size-id';
    addElement(entry, elementID);
}
