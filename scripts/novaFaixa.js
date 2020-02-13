const inputFileTrack = document.getElementById("new-audio");
var deleteButton = document.getElementsByClassName("delete-track");
var i = 0;

// ------------------------ Nova faixa ------------------------ 
inputFileTrack.addEventListener("change", function(e) {
    const fileToUpload = e.target.files.item(0);
    const reader = new FileReader();
    reader.onload = function(e){
        i++;
        var template = 
        `
        <div class="track-container" id="container-num[${i}]">
            <div class="track-options">
                <span class="track-index">${i}</span>
                <button class="descButton" type="button" data-value="${i}" onclick="descerTrack(this)"><i class="fas fa-angle-down"></i></button>
                <button class="subirButton" type="button" data-value="${i}" onclick="subirTrack(this)"><i class="fas fa-angle-up"></i></button>
                <button class="delete-track" type="button" data-value="${i}" onclick="deletaTrack(this)"><i class="fas fa-times-circle"></i></button>
            </div>
            <label>Título da faixa</label>
            <input type="text" name="track[${i}][titleTrack]" id="track[${i}][titleTrack]" class="input-track" placeholder="Escreva aqui o título da faixa.">
            <label>Preview</label>


            <div class="audio-player">
                <button class="btn-playpause" data-value="${i}" type="button" onclick="toggleTocarPausar(this)"><i class="fas fa-play"></i></button>
                <div class="current-dutation" id="trackActualTime[${i}]">00:00</div>
                <div class="range-field">
                    <input type="range" min=0 max=0 data-value="${i}" class="trackTime" id="timebar[${i}]" step="1" onchange="timeRangeChange(this)" oninput="timeRangeChange(this)">
                </div>
                <div class="total-dutation" id="trackDuration[${i}]">00:00</div>
                <button class="mute-volume"  data-value="${i}" type="button" onclick="toggleMutarDesmutar(this)"><i class="fas fa-volume-up"></i></button>
                <div class="volume-field">
                    <input type="range" min=0 max=100 data-value="${i}" class="trackVolume" id="volumebar" step="1"  onchange="volumeRangeChange(this)" oninput="volumeRangeChange(this)">
                </div>
            </div>


            <audio controls src="" class="audio-path" data-value="${i}" id="track[${i}][trackContentPreview]" onended="fimMusica(this)" onloadedmetadata="metadataLoaded(this)" ontimeupdate="audioTimeUpdate(this)" ></audio>
            <div class="to-append" id="append-before[${i}]"></div>
        </div>
        `;

        var musicContainer = document.querySelector('.music-container');
        var div = document.createElement('div');
        div.innerHTML = template;
        div.style.order = i;
        musicContainer.appendChild(div);
        
        var fileText = document.getElementById(`track[${i}][titleTrack]`);
        var previewAudio = document.getElementById(`track[${i}][trackContentPreview]`); 
        var trackFile = document.getElementById(`new-audio`);
        fileText.value = inputFileTrack.files[0].name;
        previewAudio.src = e.target.result;
        
        var trackCloned = trackFile.cloneNode(true);
        trackCloned.classList.add('track-file');
        trackCloned.classList.remove('new-audio');
        trackCloned.setAttribute('name', `track[${i}][trackContent]`);
        trackCloned.setAttribute('id', `track[${i}][trackContent]`);
        var containerDiv = document.getElementById(`container-num[${i}]`);
        var appendBefore = document.getElementById(`append-before[${i}]`);
        containerDiv.insertBefore(trackCloned, appendBefore);

        var trackList = document.querySelectorAll('.track-container');

        // Desativa os botões subir se for 1 e descer se for o ultimo, ou ativa se n for nem um nem outro
        
        for(var x = 1; x < trackList.length+1; x++){
            if(x==1){
                var selecItem = document.getElementById(`container-num[${x}]`);
                var selecSub = selecItem.querySelector('.subirButton');
                selecSub.disabled = true;
                selecSub.style.opacity = 0;
                selecSub.style.cursor = 'initial';
            } else if(x==trackList.length){
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
function subirTrack(e){
    var selecIndex = e.getAttribute('data-value');
    var selecItem = document.getElementById(`container-num[${selecIndex}]`);
    var trackOption = selecItem.querySelector('.track-options');
    var selecDesc = trackOption.querySelector('.descButton');

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

    // --- Verifica track manualmente do item selecionado ---
    var trackIndex = selecItem.querySelector('.track-index');
    var buttonDeletar = selecItem.querySelector('.delete-track');
    var buttonSubir = selecItem.querySelector('.subirButton');
    var buttonDescer = selecItem.querySelector('.descButton');
    var titleIndex = selecItem.querySelector('.input-track');
    var audioIndex = selecItem.querySelector('.audio-path');
    var trackFile = selecItem.querySelector('.track-file');
    var appendBefore = selecItem.querySelector('.to-append');

    trackIndex.innerHTML = `${newI}`;
    buttonDeletar.setAttribute('data-value', `${newI}`);
    buttonSubir.setAttribute('data-value', `${newI}`);
    buttonDescer.setAttribute('data-value', `${newI}`);
    titleIndex.name = `track[${newI}][titleTrack]`;
    titleIndex.id = `track[${newI}][titleTrack]`;
    audioIndex.id = `track[${newI}][trackContentPreview]`;
    trackFile.name = `track[${newI}][trackContent]`;
    trackFile.id = `track[${newI}][trackContent]`;
    appendBefore.id= `append-before[${newI}]`;

    // --- Verifica track manualmente do próximo item ---
    var trackIndex = nextItem.querySelector('.track-index');
    var buttonDeletar = nextItem.querySelector('.delete-track');
    var buttonSubir = nextItem.querySelector('.subirButton');
    var buttonDescer = nextItem.querySelector('.descButton');
    var titleIndex = nextItem.querySelector('.input-track');
    var audioIndex = nextItem.querySelector('.audio-path');
    var trackFile = nextItem.querySelector('.track-file');
    var appendBefore = nextItem.querySelector('.to-append');

    trackIndex.innerHTML = `${nextNewI}`;
    buttonDeletar.setAttribute('data-value', `${nextNewI}`);
    buttonSubir.setAttribute('data-value', `${nextNewI}`);
    buttonDescer.setAttribute('data-value', `${nextNewI}`);
    titleIndex.name = `track[${nextNewI}][titleTrack]`;
    titleIndex.id = `track[${nextNewI}][titleTrack]`;
    audioIndex.id = `track[${nextNewI}][trackContentPreview]`;
    trackFile.name = `track[${nextNewI}][trackContent]`;
    trackFile.id = `track[${nextNewI}][trackContent]`;
    appendBefore.id= `append-before[${nextNewI}]`;

    
    var trackList = document.querySelectorAll('.track-container');
    for(var x = 1; x < trackList.length+1; x++){
        if(x==1){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = true;
            selecSub.style.opacity = 0;
            selecSub.style.cursor = 'initial';
        } else if(x==trackList.length){
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
function descerTrack(e){
    var selecIndex = e.getAttribute('data-value');
    var selecItem = document.getElementById(`container-num[${selecIndex}]`);
    var trackOption = selecItem.querySelector('.track-options');
    var selecDesc = trackOption.querySelector('.descButton');

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

    // --- Verifica track manualmente do item selecionado ---
    var trackIndex = selecItem.querySelector('.track-index');
    var buttonDeletar = selecItem.querySelector('.delete-track');
    var buttonSubir = selecItem.querySelector('.subirButton');
    var buttonDescer = selecItem.querySelector('.descButton');
    var titleIndex = selecItem.querySelector('.input-track');
    var audioIndex = selecItem.querySelector('.audio-path');
    var trackFile = selecItem.querySelector('.track-file');
    var appendBefore = selecItem.querySelector('.to-append');

    trackIndex.innerHTML = `${newI}`;
    buttonDeletar.setAttribute('data-value', `${newI}`);
    buttonSubir.setAttribute('data-value', `${newI}`);
    buttonDescer.setAttribute('data-value', `${newI}`);
    titleIndex.name = `track[${newI}][titleTrack]`;
    titleIndex.id = `track[${newI}][titleTrack]`;
    audioIndex.id = `track[${newI}][trackContentPreview]`;
    trackFile.name = `track[${newI}][trackContent]`;
    trackFile.id = `track[${newI}][trackContent]`;
    appendBefore.id= `append-before[${newI}]`;

    // --- Verifica track manualmente do próximo item ---
    var trackIndex = nextItem.querySelector('.track-index');
    var buttonDeletar = nextItem.querySelector('.delete-track');
    var buttonSubir = nextItem.querySelector('.subirButton');
    var buttonDescer = nextItem.querySelector('.descButton');
    var titleIndex = nextItem.querySelector('.input-track');
    var audioIndex = nextItem.querySelector('.audio-path');
    var trackFile = nextItem.querySelector('.track-file');
    var appendBefore = nextItem.querySelector('.to-append');

    trackIndex.innerHTML = `${nextNewI}`;
    buttonDeletar.setAttribute('data-value', `${nextNewI}`);
    buttonSubir.setAttribute('data-value', `${nextNewI}`);
    buttonDescer.setAttribute('data-value', `${nextNewI}`);
    titleIndex.name = `track[${nextNewI}][titleTrack]`;
    titleIndex.id = `track[${nextNewI}][titleTrack]`;
    audioIndex.id = `track[${nextNewI}][trackContentPreview]`;
    trackFile.name = `track[${nextNewI}][trackContent]`;
    trackFile.id = `track[${nextNewI}][trackContent]`;
    appendBefore.id= `append-before[${nextNewI}]`;

    // Desativa ou ativa os botões subir e descer track
    var trackList = document.querySelectorAll('.track-container');
    for(var x = 1; x < trackList.length+1; x++){
        if(x==1){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = true;
            selecSub.style.opacity = 0;
            selecSub.style.cursor = 'initial';
        } else if(x==trackList.length){
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
function deletaTrack(e){
    var buttonValue = e.getAttribute('data-value');
    var filho = document.getElementById(`container-num[${buttonValue}]`);
    if(filho.parentNode){
        var pai = document.getElementById('musiccontainer');
        pai.removeChild(filho.parentNode);
        // muda todos os indices do track-container com for
        verificaTrack();
        }
    i--;
    }

// ------------------------ Botões subir e descer index ------------------------  
    

function verificaTrack(){
    console.log('entrou :)');
    var trackList = document.querySelectorAll('.track-container');
    var trackIndex = document.querySelectorAll('.track-index');
    var buttonDeletar = document.querySelectorAll('.delete-track');
    var buttonSubir = document.querySelectorAll('.subirButton');
    var buttonDescer = document.querySelectorAll('.descButton');
    var titleIndex = document.querySelectorAll('.input-track');
    var audioIndex = document.querySelectorAll('.audio-path');
    var trackFile = document.querySelectorAll('.track-file');
    var appendBefore = document.querySelectorAll('.to-append');

    for(var x = 0; x < trackList.length; x++){
        console.log(x);
        var index = x + 1;
        trackList[x].id = `container-num[${index}]`;
        trackList[x].parentNode.style.order = index;
        trackIndex[x].innerHTML = `${index}`;
        buttonDeletar[x].setAttribute('data-value', `${index}`);
        buttonSubir[x].setAttribute('data-value', `${index}`);
        buttonDescer[x].setAttribute('data-value', `${index}`);
        titleIndex[x].name = `track[${index}][titleTrack]`;
        titleIndex[x].id = `track[${index}][titleTrack]`;
        audioIndex[x].id = `track[${index}][trackContentPreview]`;
        trackFile[x].name = `track[${index}][trackContent]`;
        trackFile[x].id = `track[${index}][trackContent]`;
        appendBefore[x].id= `append-before[${index}]`;
    }

    for(var x = 1; x < trackList.length+1; x++){
        if(x==1){
            var selecItem = document.getElementById(`container-num[${x}]`);
            var selecSub = selecItem.querySelector('.subirButton');
            selecSub.disabled = true;
            selecSub.style.opacity = 0;
            selecSub.style.cursor = 'initial';
        } else if(x==trackList.length){
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

function fimMusica(e) {
    var index = e.getAttribute('data-value');
    if(index==audio.length){
        audio[0].play();
    }else{
        index = parseInt(index) + parseInt(1);
        nextAudio = document.getElementById(`track[${index}][trackContentPreview]`);
        nextAudio.play();
    }
}

function toggleTocarPausar(e) {
    if(e.isPlaying == true){
        var index = e.getAttribute('data-value');
        var audioSelected = document.getElementById('track['+index+'][trackContentPreview]');
        audioSelected.pause();
        e.isPlaying = false;
        e.innerHTML = '<i class="fas fa-play"></i>';
    }else{
        var index = e.getAttribute('data-value');
        var audioSelected = document.getElementById('track['+index+'][trackContentPreview]');
        audioSelected.play();
        e.isPlaying = true;
        e.innerHTML = '<i class="fas fa-pause"></i>';
    }
}

function toggleMutarDesmutar(e) {
    if(e.isMute == true){
        var index = e.getAttribute('data-value');
        var audioSelected = document.getElementById('track['+index+'][trackContentPreview]');
        audioSelected.muted = false;
        e.isMute = false;
        e.innerHTML = '<i class="fas fa-volume-up"></i>';
    }else{
        var index = e.getAttribute('data-value');
        var audioSelected = document.getElementById('track['+index+'][trackContentPreview]');
        audioSelected.muted = true;
        e.isMute = true;
        e.innerHTML = '<i class="fas fa-volume-off"></i>';
    }
}

function volumeRangeChange(e) {
    var index = e.getAttribute('data-value');
    var audioSelected = document.getElementById('track['+index+'][trackContentPreview]');
    audioSelected.volume = (e.value)/100;
    var restante = 100-e.value;
    e.style.background = 'linear-gradient(to left, #424242 '+restante+'%, #F48C1C '+restante+'%)';
}

function timeRangeChange(e){
    var index = e.getAttribute('data-value');
    var audioSelected = document.getElementById('track['+index+'][trackContentPreview]');
    audioSelected.currentTime = e.value;
}

function metadataLoaded(e){
    var index = e.getAttribute('data-value');
    var rangeSelected = document.getElementById('timebar['+index+']');
    rangeSelected.max = e.duration;
    var totalDuration = document.getElementById('trackDuration['+index+']');
    var minutos = Math.floor((e.duration)/60);
    var segundos = Math.floor(e.duration % 60);
    var duracao = `${("0" + minutos).slice(-2)}:${("0" + segundos).slice(-2)}`;
    totalDuration.innerText = duracao;
}

function audioTimeUpdate(e){
    var index = e.getAttribute('data-value');
    var rangeSelected = document.getElementById('timebar['+index+']');
    var actualTime = document.getElementById('trackActualTime['+index+']');
    var minutos = Math.floor((e.currentTime)/60);
    var segundos = Math.floor(e.currentTime % 60);
    var duracao = `${("0" + minutos).slice(-2)}:${("0" + segundos).slice(-2)}`;
    actualTime.innerText = duracao;
    rangeSelected.value = e.currentTime;
    var porcentagem = (e.currentTime/e.duration)*100;
    var restante = 100-porcentagem;
    rangeSelected.style.background = 'linear-gradient(to left, #424242 '+restante+'%, #F48C1C '+restante+'%)';
}