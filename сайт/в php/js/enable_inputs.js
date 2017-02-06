function setEnabled() {
    var inputs = document.getElementsByTagName("input");
    var selects = document.getElementsByTagName("select");
    var textareas = document.getElementsByTagName("textarea");
    var i;
    for (i = 0; i < inputs.length; i++) {
        inputs[i].disabled = false;
    }
    for (i = 0; i < selects.length; i++) {
        selects[i].disabled = false;
    }
    for (i = 0; i < textareas.length; i++) {
        textareas[i].disabled = false;
    }
}