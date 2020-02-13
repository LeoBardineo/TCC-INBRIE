const dotObrigatorio = document.getElementById("dotObrigatorio");
const dotOpcional = document.getElementById("dotOpcional");
const tabsContainer = document.getElementById("tabsContainer");
const tabOne = document.getElementById("tabOne");
const tabTwo = document.getElementById("tabTwo");

function formObrigatorio() {
    tabOne.style.display = "flex";
    tabTwo.style.display = "none";
    dotObrigatorio.classList.add("active");
    dotOpcional.classList.remove("active");
}

function formOpcional() {
    tabOne.style.display = "none";
    tabTwo.style.display = "flex";
    dotOpcional.classList.add("active");
    dotObrigatorio.classList.remove("active");
}