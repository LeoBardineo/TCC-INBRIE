const tagInput = document.getElementById('taginput');
const postTags = document.getElementById('postTags');

tagInput.addEventListener('keypress', function(e){
    if(e.keyCode == 32){
        var tag = this.value.trim();
        if(tag.length>0){
            var template = 
            `<span class="tag">
            <i class="fas fa-tag"></i>
            <span class="tagtext">${tag}</span>
            <button class="close-tag" type="button" onclick="deletaTag(this)"><i class="fas fa-times"></i></button>
            </span>`;
            var pai = document.querySelector('.tags-input');
            var div = document.createElement('div');
            div.classList.add('div-tag');
            div.innerHTML = template;
            pai.appendChild(div);
            if(document.querySelectorAll('.div-tag').length == 1){
                postTags.value = tag;
            }else{
                postTags.value = postTags.value + "," + tag;
            }
            console.log(postTags.value);
            this.value = "";
        }
    }
})

function deletaTag(e) {
    var tagToRemove = e.parentNode.querySelector('.tagtext').innerText.trim();
    e.parentNode.parentNode.parentNode.removeChild(e.parentNode.parentNode);
    var tags = postTags.value.trim();
    var newTags = tags.replace(`${tagToRemove}`, '').trim();
    postTags.value = newTags;
    if(document.querySelectorAll('.div-tag').length == 0){
        postTags.value = "";
    }
    console.log(newTags);
}