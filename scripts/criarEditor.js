function criarInputEditor(form) {
    var editor = document.getElementById('litescritura');
    var editorCode = editor.innerHTML;
    var input = document.createElement('input');
    input.style.display = 'none';
    input.style.opacity = '0';
    input.setAttribute('type', 'text');
    input.setAttribute('value', editorCode);
    input.setAttribute('id', 'textoEscrito');
    input.setAttribute('name', 'textoEscrito');
    editor.appendChild(input);
    return true;
}