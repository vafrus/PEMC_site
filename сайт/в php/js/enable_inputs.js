function enable(type, dis_en) {
    var open = document.getElementsByTagName(type);
    var i;
    if (dis_en == "enabled") {
        for (i = 0; i < open.length; i++) {
            open[i].disabled = false;
        }
    }
    if (dis_en == "disabled") {
        for (i = 0; i < open.length; i++) {
            open[i].disabled = true;
        }
    }
}

function setEnabled() {
    enable("input", "enabled");
    enable("select", "enabled");
    enable("textarea", "enabled");
}

function setDisabled() {
    enable("input", "disabled");
    enable("select", "disabled");
    enable("textarea", "disabled");
}