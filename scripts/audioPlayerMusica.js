var audio = document.querySelectorAll("audio");
var playButton = document.querySelectorAll(".btn-playpause");
var muteButton = document.querySelectorAll(".mute-volume");
var volumeRange = document.querySelectorAll(".trackVolume");
var timeRange = document.querySelectorAll(".trackTime");
var currentDuration = document.querySelectorAll(".current-duration");
var totalDuration = document.querySelectorAll(".total-duration");

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