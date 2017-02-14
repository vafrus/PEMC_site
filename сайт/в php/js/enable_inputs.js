function enable(type, dis_en) {
    var open = document.getElementsByTagName(type);
    var i;
    for (i = 0; i < open.length; i++) {
        if (dis_en == "enabled") {
            open[i].readOnly = false;
        }
        if (dis_en == "disabled") {
            open[i].readOnly = true;
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