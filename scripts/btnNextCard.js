var x = 0;
var btnRight = document.getElementById("btnRight");
var btnLeft = document.getElementById("btnLeft");
var titleCard = document.getElementById("title-card-container");
const cardContainer = document.getElementById("cardContainer");

function nextCard() {
    if(x==1){
        x = 0;
        var template = `
        <button type="button" id="btnLeft" onclick="nextCard()" class="nextCardLeft" style="display: none;"><i class="fas fa-chevron-left"></i></button>
        <div class="card first">
            <img src="imagens/suporte.png">
            <h2 class="normal-title">Tenha visibilidade em suas obras</h2>
            <p>Todo projeto que você compartilhar, terá o feedback de outros artistas para o seu crescimento.</p>
        </div>
        <div class="card">
            <img src="imagens/novos.png">
            <h2 class="normal-title">Destaque-se como um novo artista</h2>
            <p>Com o INBRIE, temos o intuito de dar mais visibilidade aos novos artistas, dando espaço para que possam crescer e evoluir.</p>
        </div>
        <div class="card">
            <img src="imagens/divulgacao.png">
            <h2 class="last-title">Nós te ajudamos a divulgar</h2>
            <p>Com sua permissão, podemos ajudar na divulgação, postando as obras nas redes sociais.</p>
        </div>
        <button type="button" id="btnRight" onclick="nextCard()" class="nextCardRight"><i class="fas fa-chevron-right"></i></button>
        `;
        cardContainer.innerHTML = template;
        titleCard.innerText = "Para os artistas";
    }else{
        x = 1;
        var template = `
        <button type="button" id="btnLeft" onclick="nextCard()" class="nextCardLeft"><i class="fas fa-chevron-left"></i></button>
        <div class="card first">
            <img class="talento-icon" src="imagens/talentosIcon.png">
            <h2 class="normal-title">Buque novos talentos</h2>
            <p>No INBRIE, há artistas talentosos em busca de oportunidades, entre em contato com eles!</p>
        </div>
        <div class="card">
            <img src="imagens/contatoIcon.png">
            <h2 class="normal-title">Conheça e contate os artistas facilmente</h2>
            <p>Na plataforma, você poderá visitar e conhecer o perfil dos artistas que quiser de forma fácil e rápida.</p>
        </div>
        <div class="card">
            <img src="imagens/filtroIcon.png">
            <h2 class="normal-title">Filtre os artistas para achar o ideal</h2>
            <p>Uma vez logado, você poderá filtrar entre a grande quantidade de artistas, para achar o artistas que você quer.</p>
        </div>
        <button type="button" id="btnRight" onclick="nextCard()" class="nextCardRight" style="display: none;"><i class="fas fa-chevron-right"></i></button>
        `;
        cardContainer.innerHTML = template;
        titleCard.innerText = "Para a indústria";
    }
}