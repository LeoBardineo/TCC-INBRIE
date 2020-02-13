const inputFileImage = document.getElementById("new-ilust");
var deleteButton = document.getElementsByClassName("delete-image");
var i = 0;

// ------------------------ Nova faixa ------------------------ 
inputFileImage.addEventListener("change", function(e) {
    const fileToUpload = e.target.files.item(0);
    const reader = new FileReader();
    reader.onload = function(e){
        i++;
        var template = 
        `
        <div class="image-container" id="container-num[${i}]">
            <div class="image-options">
                <span class="image-index">${i}</span>
                <button class="descButton" type="button" data-value="${i}" onclick="descerImage(this)"><i class="fas fa-angle-down"></i></button>
                <button class="subirButton" type="button" data-value="${i}" onclick="subirImage(this)"><i class="fas fa-angle-up"></i></button>
                <button class="delete-image" type="button" data-value="${i}" onclick="deletaImage(this)"><i class="fas fa-times-circle"></i></button>
            </div>
            <label>Preview</label>

            <div class="imagePreview-container">
                <img src="" data-value="${i}" id="image[${i}][imageContentPreview]" class="image-previewfile">
            </div>

            <div class="to-append" id="append-before[${i}]"></div>
        </div>
        `;

        var imageContainer = document.querySelector('.allimage-container');
        var div = document.createElement('div');
        div.innerHTML = template;
        div.style.order = i;
        imageContainer.appendChild(div);
        
        var previewImage = document.getElementById(`image[${i}][imageContentPreview]`); 
        var imageFile = document.getElementById(`new-ilust`);
        previewImage.src = e.target.result;
        
        var imageCloned = imageFile.cloneNode(true);
        imageCloned.classList.add('image-file');
        imageCloned.classList.remove('new-ilust');
        imageCloned.setAttribute('name', `image[${i}][imageContent]`);
        imageCloned.setAttribute('id', `image[${i}][imageContent]`);
        var containerDiv = document.getElementById(`container-num[${i}]`);
        var appendBefore = document.getElementById(`append-before[${i}]`);
        containerDiv.insertBefore(imageCloned, appendBefore);

        var imageList = document.querySelectorAll('.image-container');

        // Desativa os botões subir se for 1 e descer se for o ultimo, ou ativa se n for nem um nem outro
        
        for(var x = 1; x < imageList.length+1; x++){
            if(x==1){
                var selecItem = document.getElementById(`container-num[${x}]`);
                var selecSub = selecItem.querySelector('.subirButton');
                selecSub.disabled = true;
                selecSub.style.opacity = 0;
                selecSub.style.cursor = 'initial';
            } else if(x==imageList.length){
                var selecItem = document.getElementById(`container-num[${x}]`);
                var descerBtn = selecItem.querySelector('.descButton');
                descerBtn.disabled = true;
                descerBtn.style.opacity = 0;
                descerBtn.style.cursor = 'initial';
            }else{
                var selecItem = document.getElementById(`container-num[${x}]`);
                var descerBtn = selecItem.querySelector('.descButton');
                descerBtn.disabled = false;
                descerBtn.style.opacity = 1;
                descerBtn.style.cursor = 'pointer';
                
                var selecSub = selecItem.querySelector('.subirButton');
                selecSub.disabled = false;
                selecSub.style.opacity = 1;
                selecSub.style.cursor = 'pointer';
            }
    }
        
    };
    
    reader.readAsDataURL(fileToUpload);
});
// ------------------------ Botões subir e descer index ------------------------ 


// ------------------------ Botão Subir ---------------------------
function subirImage(e){
    var selecIndex = e.getAttribute('data-value');
    var selecItem = document.getElementById(`container-num[${selecIndex}]`);
    var imageOption = selecItem.querySelector('.image-options');
    var selecDesc = imageOption.querySelector('.descButton');

    var nextItem = document.getElementById(`container-num[${parseInt(selecIndex)-parseInt(1)}]`);

    var nextItemDesc = nextItem.querySelector('.descButton');
    var nextItemDescIndex = nextItemDesc.getAttribute('data-value');
    
    var nextItemSubir = nextItem.querySelector('.subirButton');
    var nextItemSubirIndex = nextItemSubir.getAttribute('data-value');

    var selecItemFather = selecItem.parentElement;
    var nextItemFather = nextItem.parentElement;

    var newI = parseInt(selecIndex)-parseInt(1);
    var nextNewI = parseInt(nextItemSubirIndex)+parseInt(1);
    
    selecItemFather.style.order = newI;
    selecItem.id = `container-num[${newI}]`;
    nextItemFather.style.order = nextNewI;
    nextItem.id = `container-num[${nextNewI}]`;

    selecDesc.setAttribute('data-value', newI);
    e.setAttribute('data-value', newI);

    nextItemDesc.setAttribute('data-value', nextNewI);
    nextItemSubir.setAttribute('data-value', nextNewI);

    // --- Verifica image manualmente do item selecionado ---
    var imageIndexSpan = selecItem.querySelector('.image-index');
    var buttonDeletar = selecItem.querySelector('.delete-image');
    var buttonSubir = selecItem.querySelector('.subirButton');
    var buttonDescer = selecItem.querySelector('.descButton');
    var ImageIndex = selecItem.querySelector('.image-previewfile');
    var imageFile = selecItem.querySelector('.image-file');
    var appendBefore = selecItem.querySelector('.to-append');

    imageIndexSpan.innerHTML = `${newI}`;
    buttonDeletar.setAttribute('data-value', `${newI}`);
    buttonSubir.setAttribute('data-value', `${newI}`);
    buttonDescer.setAttribute('data-value', `${newI}`);


    ImageIndex.id = `image[${newI}][imageContentPreview]`;
    imageFile.name = `image[${newI}][imageContent]`;
    imageFile.id = `image[${newI}][imageContent]`;
    appendBefore.id= `append-before[${newI}]`;

    // --- Verifica image manualmente do próximo item ---
    var imageIndexSpan = nextItem.querySelector('.image-index');
    var buttonDeletar = nextItem.querySelector('.delete-image');
    var buttonSubir = nextItem.querySelector('.subirButton');
    var buttonDescer = nextItem.querySelector('.descButton');
    
    var ImageIndex = nextItem.querySelector('.image-previewfile');
    var imageFile = nextItem.querySelector('.image-file');
    var appendBefore = nextItem.querySelector('.to-append');

    imageIndexSpan.innerHTML = `${nextNewI}`;
    buttonDeletar.setAttribute('data-value', `${nextNewI}`);
    buttonSubir.setAttribute('data-value', `${nextNewI}`);
    buttonDescer.setAttribute('data-value', `${nextNewI}`);


    ImageIndex.id = `image[${nextNewI}][imageContentPreview]`;
    imageFile.name = `image[${nextNewI}][imageContent]`;
    imageFile.id = `image[${nextNewI}][imageContent]`;
    appendBefore.id= `append-before[${nextNewI}]`;

    
    var imageList = document.querySelectorAll('.image-container');
    for(var x = 1; x < imageList.length+1; x++){
        if(x==1){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = true;
            selecSub.style.opacity = 0;
            selecSub.style.cursor = 'initial';
        } else if(x==imageList.length){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var descerBtn = selecItem.querySelector('.descButton');
            descerBtn.disabled = true;
            descerBtn.style.opacity = 0;
            descerBtn.style.cursor = 'initial';
        }else{
            var selecItem = document.getElementById(`container-num[${x}]`);
            var descerBtn = selecItem.querySelector('.descButton');
            descerBtn.disabled = false;
            descerBtn.style.opacity = 1;
            descerBtn.style.cursor = 'pointer';
            
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = false;
            selecSub.style.opacity = 1;
            selecSub.style.cursor = 'pointer';
        }
    }
};

// ------------------------ Botão Descer ---------------------------
function descerImage(e){
    var selecIndex = e.getAttribute('data-value');
    var selecItem = document.getElementById(`container-num[${selecIndex}]`);
    var imageOption = selecItem.querySelector('.image-options');
    var selecDesc = imageOption.querySelector('.descButton');

    var nextItem = document.getElementById(`container-num[${parseInt(selecIndex)+parseInt(1)}]`);

    var nextItemDesc = nextItem.querySelector('.descButton');
    var nextItemDescIndex = nextItemDesc.getAttribute('data-value');
    
    var nextItemSubir = nextItem.querySelector('.subirButton');
    var nextItemSubirIndex = nextItemSubir.getAttribute('data-value');

    var selecItemFather = selecItem.parentElement;
    var nextItemFather = nextItem.parentElement;

    var newI = parseInt(selecIndex)+parseInt(1);
    var nextNewI = parseInt(nextItemSubirIndex)-parseInt(1);

    selecItemFather.style.order = newI;
    selecItem.id = `container-num[${newI}]`;
    nextItemFather.style.order = nextNewI;
    nextItem.id = `container-num[${nextNewI}]`;

    selecDesc.setAttribute('data-value', newI);
    e.setAttribute('data-value', newI);

    nextItemDesc.setAttribute('data-value', nextNewI);
    nextItemSubir.setAttribute('data-value', nextNewI);

    // --- Verifica image manualmente do item selecionado ---
    var imageIndexSpan = selecItem.querySelector('.image-index');
    var buttonDeletar = selecItem.querySelector('.delete-image');
    var buttonSubir = selecItem.querySelector('.subirButton');
    var buttonDescer = selecItem.querySelector('.descButton');
    
    var ImageIndex = selecItem.querySelector('.image-previewfile');
    var imageFile = selecItem.querySelector('.image-file');
    var appendBefore = selecItem.querySelector('.to-append');

    imageIndexSpan.innerHTML = `${newI}`;
    buttonDeletar.setAttribute('data-value', `${newI}`);
    buttonSubir.setAttribute('data-value', `${newI}`);
    buttonDescer.setAttribute('data-value', `${newI}`);


    ImageIndex.id = `image[${newI}][imageContentPreview]`;
    imageFile.name = `image[${newI}][imageContent]`;
    imageFile.id = `image[${newI}][imageContent]`;
    appendBefore.id= `append-before[${newI}]`;

    // --- Verifica image manualmente do próximo item ---
    var imageIndexSpan = nextItem.querySelector('.image-index');
    var buttonDeletar = nextItem.querySelector('.delete-image');
    var buttonSubir = nextItem.querySelector('.subirButton');
    var buttonDescer = nextItem.querySelector('.descButton');
    
    var ImageIndex = nextItem.querySelector('.image-previewfile');
    var imageFile = nextItem.querySelector('.image-file');
    var appendBefore = nextItem.querySelector('.to-append');

    imageIndexSpan.innerHTML = `${nextNewI}`;
    buttonDeletar.setAttribute('data-value', `${nextNewI}`);
    buttonSubir.setAttribute('data-value', `${nextNewI}`);
    buttonDescer.setAttribute('data-value', `${nextNewI}`);


    ImageIndex.id = `image[${nextNewI}][imageContentPreview]`;
    imageFile.name = `image[${nextNewI}][imageContent]`;
    imageFile.id = `image[${nextNewI}][imageContent]`;
    appendBefore.id= `append-before[${nextNewI}]`;

    // Desativa ou ativa os botões subir e descer image
    var imageList = document.querySelectorAll('.image-container');
    for(var x = 1; x < imageList.length+1; x++){
        if(x==1){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = true;
            selecSub.style.opacity = 0;
            selecSub.style.cursor = 'initial';
        } else if(x==imageList.length){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var descerBtn = selecItem.querySelector('.descButton');
            descerBtn.disabled = true;
            descerBtn.style.opacity = 0;
            descerBtn.style.cursor = 'initial';
        }else{
            var selecItem = document.getElementById(`container-num[${x}]`);
            var descerBtn = selecItem.querySelector('.descButton');
            descerBtn.disabled = false;
            descerBtn.style.opacity = 1;
            descerBtn.style.cursor = 'pointer';
            
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = false;
            selecSub.style.opacity = 1;
            selecSub.style.cursor = 'pointer';
        }
    }
};

// ------------------------ Deletar faixa ------------------------ 
function deletaImage(e){
    var buttonValue = e.getAttribute('data-value');
    var filho = document.getElementById(`container-num[${buttonValue}]`);
    if(filho.parentNode){
        var pai = document.getElementById('imagecontainer');
        pai.removeChild(filho.parentNode);
        // muda todos os indices do image-container com for
        verificaImage();
        }
    i--;
    }

// ------------------------ Botões subir e descer index ------------------------  
    

function verificaImage(){
    var imageList = document.querySelectorAll('.image-container');
    var imageIndexSpan = document.querySelectorAll('.image-index');
    var buttonDeletar = document.querySelectorAll('.delete-image');
    var buttonSubir = document.querySelectorAll('.subirButton');
    var buttonDescer = document.querySelectorAll('.descButton');
    
    var ImageIndex = document.querySelectorAll('.image-previewfile');
    var imageFile = document.querySelectorAll('.image-file');
    var appendBefore = document.querySelectorAll('.to-append');

    for(var x = 0; x < imageList.length; x++){
        var index = x + 1;
        imageList[x].id = `container-num[${index}]`;
        imageList[x].parentNode.style.order = index;
        imageIndexSpan[x].innerHTML = `${index}`;
        buttonDeletar[x].setAttribute('data-value', `${index}`);
        buttonSubir[x].setAttribute('data-value', `${index}`);
        buttonDescer[x].setAttribute('data-value', `${index}`);
    
    
        ImageIndex[x].id = `image[${index}][imageContentPreview]`;
        imageFile[x].name = `image[${index}][imageContent]`;
        imageFile[x].id = `image[${index}][imageContent]`;
        appendBefore[x].id= `append-before[${index}]`;
    }

    for(var x = 1; x < imageList.length+1; x++){
        if(x==1){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = true;
            selecSub.style.opacity = 0;
            selecSub.style.cursor = 'initial';
        } else if(x==imageList.length){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var descerBtn = selecItem.querySelector('.descButton');
            descerBtn.disabled = true;
            descerBtn.style.opacity = 0;
            descerBtn.style.cursor = 'initial';
        }else{
            var selecItem = document.getElementById(`container-num[${x}]`);
            var descerBtn = selecItem.querySelector('.descButton');
            descerBtn.disabled = false;
            descerBtn.style.opacity = 1;
            descerBtn.style.cursor = 'pointer';
            
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = false;
            selecSub.style.opacity = 1;
            selecSub.style.cursor = 'pointer';
        }
    }
}