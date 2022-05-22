function showHideArea(answer_text) {
    var textArea = document.getElementById("textArea");
    textArea.style.display = answer_text.value == "Иное" ? "block" : "none";
}
