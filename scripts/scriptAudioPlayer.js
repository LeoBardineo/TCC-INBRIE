    var audio = document.querySelectorAll("audio");
    var playButton = document.querySelectorAll(".btn-playpause");
    var muteButton = document.querySelectorAll(".mute-volume");
    var volumeRange = document.querySelectorAll(".trackVolume");
    var timeRange = document.querySelectorAll(".trackTime");
    var currentDuration = document.querySelectorAll(".current-duration");
    var totalDuration = document.querySelectorAll(".total-duration");

    for(var i = 0; i < audio.length; i++){

        audio[i].addEventListener('ended', function(){
            var index = this.getAttribute('data-value');
            if(index==audio.length){
                audio[0].play();
            }else{
                audio[index].play();
            }
        })
        
        playButton[i].addEventListener('click', function(){
            if(this.isPlaying == false){

                var index = this.getAttribute('data-value');
                var audioSelected = document.getElementById('track-i['+index+']');
                audioSelected.play();
                this.isPlaying = true;
                this.innerHTML = '<i class="fas fa-pause"></i>';
                
            }else if(this.isPlaying == true){
                
                var index = this.getAttribute('data-value');
                var audioSelected = document.getElementById('track-i['+index+']');
                audioSelected.pause();
                this.isPlaying = false;
                this.innerHTML = '<i class="fas fa-play"></i>';

            }else{

                var index = this.getAttribute('data-value');
                var audioSelected = document.getElementById('track-i['+index+']');
                audioSelected.play();
                this.isPlaying = true;
                this.innerHTML = '<i class="fas fa-pause"></i>';
            }
        })

        muteButton[i].addEventListener('click', function(){
            if(this.isMute == false){

                var index = this.getAttribute('data-value');
                var audioSelected = document.getElementById('track-i['+index+']');
                audioSelected.muted = true;
                this.isMute = true;
                this.innerHTML = '<i class="fas fa-volume-off"></i>';
                
            }else if(this.isMute == true){
                
                var index = this.getAttribute('data-value');
                var audioSelected = document.getElementById('track-i['+index+']');
                audioSelected.muted = false;
                this.isMute = false;
                this.innerHTML = '<i class="fas fa-volume-up"></i>';

            }else{

                var index = this.getAttribute('data-value');
                var audioSelected = document.getElementById('track-i['+index+']');
                audioSelected.muted = true;
                this.isMute = true;
                this.innerHTML = '<i class="fas fa-volume-off"></i>';
            }
        })

        volumeRange[i].addEventListener('change', function(){
            var index = this.getAttribute('data-value');
            var audioSelected = document.getElementById('track-i['+index+']');
            audioSelected.volume = (this.value)/100;
            var restante = 100-this.value;
            this.style.background = 'linear-gradient(to left, #424242 '+restante+'%, white '+restante+'%)';
        })

        volumeRange[i].addEventListener('input', function(){
            var index = this.getAttribute('data-value');
            var audioSelected = document.getElementById('track-i['+index+']');
            audioSelected.volume = (this.value)/100;
            var restante = 100-this.value;
            this.style.background = 'linear-gradient(to left, #424242 '+restante+'%, white '+restante+'%)';
        })

        timeRange[i].addEventListener('change', function(){
            var index = this.getAttribute('data-value');
            var audioSelected = document.getElementById('track-i['+index+']');
            audioSelected.currentTime = this.value;
        })

        timeRange[i].addEventListener('input', function(){
            var index = this.getAttribute('data-value');
            var audioSelected = document.getElementById('track-i['+index+']');
            audioSelected.currentTime = this.value;
        })

        audio[i].onloadedmetadata = function(){
            var index = this.getAttribute('data-value');
            var rangeSelected = document.getElementById('timebar['+index+']');
            rangeSelected.max = this.duration;
            var totalDuration = document.getElementById('trackDuration['+index+']');
            var minutos = Math.floor((this.duration)/60);
            var segundos = Math.floor(this.duration % 60);
            var duracao = `${("0" + minutos).slice(-2)}:${("0" + segundos).slice(-2)}`;
            totalDuration.innerText = duracao;
        }
        
        audio[i].addEventListener('timeupdate', function(){
            var index = this.getAttribute('data-value');
            var rangeSelected = document.getElementById('timebar['+index+']');
            var actualTime = document.getElementById('trackActualTime['+index+']');
            var minutos = Math.floor((this.currentTime)/60);
            var segundos = Math.floor(this.currentTime % 60);
            var duracao = `${("0" + minutos).slice(-2)}:${("0" + segundos).slice(-2)}`;
            actualTime.innerText = duracao;
            rangeSelected.value = this.currentTime;
            var porcentagem = (this.currentTime/this.duration)*100;
            var restante = 100-porcentagem;
            rangeSelected.style.background = 'linear-gradient(to left, #424242 '+restante+'%, white '+restante+'%)';
        })
    }