var menu = document.getElementsByClassName("menu");
var i;

for (i = 0; i < menu.length; i++) {
    menu[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var texte = this.nextElementSibling;
        if (texte.style.maxHeight){
            texte.style.maxHeight = null;
        } else {
            texte.style.maxHeight = texte.scrollHeight + "px";
        }
    });
}

var menu1 = document.getElementsByClassName("menu1");
var i;

for (i = 0; i < menu1.length; i++) {
    menu1[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var texte = this.nextElementSibling;
        if (texte.style.maxHeight){
            texte.style.maxHeight = null;
        } else {
            texte.style.maxHeight = texte.scrollHeight + "px";
        }
    });
}