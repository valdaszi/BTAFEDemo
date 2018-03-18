function onJustifyContent() {
    var element = document.getElementById("justify-content");
    var value = element.options[element.selectedIndex].value;

    document.querySelector(".container").style.justifyContent = value;
}

function onAlignItems() {
    var element = document.getElementById("align-items");
    var value = element.options[element.selectedIndex].value;

    document.querySelector(".container").style.alignItems = value;
}