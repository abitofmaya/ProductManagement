function nextImage(obj, event) {
    let src_path = obj.getAttribute("src");

    // Get the parent div that has the display image element and select that element
    img_element =
        event.target.parentNode.parentNode.parentNode.firstElementChild;
    img_element.setAttribute("src", src_path);
}
