if (document.addEventListener) {
    document.addEventListener("contextmenu", function(e) {
        e.preventDefault();
        return false;
    });

    document.addEventListener("keydown", bloquearFonte);
}

function bloquearFonte(e) {
    e = e || window.event;

    var code = e.which || e.keyCode;

    if ((e.ctrlKey && (code == 83 || code == 85)) || code == 123) {
        if (e.preventDefault) {
            e.preventDefault();
        } else {
            e.returnValue = false;
        }

        return false;
    }
}