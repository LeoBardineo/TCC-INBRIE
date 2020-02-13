const previewImg = document.getElementById("thumb-preview");
const inputFile = document.getElementById("thumbinput");
const fileText = document.querySelector(".input-file-span");

inputFile.addEventListener("change", function(e) {
    const fileToUpload = e.target.files.item(0);
    const reader = new FileReader();
    reader.onload = function(e){ 
        previewImg.src = e.target.result;
        previewImg.classList.remove("defaultpreview");
        previewImg.classList.add("previewimg");
        fileText.innerText = inputFile.files[0].name;
    };
    reader.readAsDataURL(fileToUpload);
});