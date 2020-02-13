// o contenteditable deixa o usuário tornar o texto italico com ctrl+i, negrito com ctrl+b e sublinhado com ctrl+u
window.onload = function() {
    var element = document.getElementById("preloadcontainer");
    element.classList.remove("preload");

    const editor = document.querySelector(".content-editable");
    const negrito = document.querySelector(".negrito-button");
    const italico = document.querySelector(".italico-button");
    const underline = document.querySelector(".underline-button");

    const justificarEsquerda = document.querySelector(".esquerda-button");
    const justificarCentro = document.querySelector(".center-button");
    const justificarDireita = document.querySelector(".direita-button");
    const justificar = document.querySelector(".justificar-button");

    const fonteNome = document.querySelector(".fonteNome-button");
    const fonteTamanho = document.querySelector(".fonteTamanho-button");
    const desfazer = document.querySelector(".desfazer-button");

    negrito.addEventListener("click", function negrito() {
        document.execCommand("bold");
    });
    
    italico.addEventListener("click", function italico() {
        document.execCommand("italic");
    });

    underline.addEventListener("click", function underline() {
        document.execCommand("underline");
    });

    justificarEsquerda.addEventListener("click", function justificarEsquerda() {
        document.execCommand("justifyLeft");
    });

    justificarCentro.addEventListener("click", function justificarCentro() {
        document.execCommand("justifyCenter");
    });

    justificarDireita.addEventListener("click", function justificarDireita() {
        document.execCommand("justifyRight");
    });

    justificar.addEventListener("click", function justificar() {
        document.execCommand("justifyFull");
    });

    desfazer.addEventListener("click", function desfazer() {
        document.execCommand("undo");
    });

    fonteNome.addEventListener("click", function fonteNome() {
        var fontSelected = document.querySelector(".fonteNome");
        var resultSelected = fontSelected.options[fontSelected.selectedIndex].text;
        document.execCommand("fontName", false, resultSelected);
    });

    fonteTamanho.addEventListener("click", function fonteTamanho(){
        document.execCommand("fontSize", false, "7");
        var fontSize = document.querySelector(".fonteTamanho");
        var fontElements = document.getElementsByTagName("font");
        for (var i = 0, len = fontElements.length; i < len; ++i) {
            if (fontElements[i].size == "7") {
                fontElements[i].removeAttribute("size");
                fontElements[i].style.fontSize = fontSize.value+"px";
            }
        }
    });
}