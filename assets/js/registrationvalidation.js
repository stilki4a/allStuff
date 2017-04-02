// validacia na imeto pri registraciq
var nameField = document.getElementById('username');
 nameField.onblur = function () {
    if (!(nameField.value.trim().length > 6)){
        var conteiner = document.getElementById('regName');
        var errorMesege = document.createElement('span');
        errorMesege.className = 'errors';
        errorMesege.textContent = "Моля поне 6 символа";
        conteiner.appendChild(errorMesege);
    }
};

 // nameField.onfocus = function () {
    nameField.onkeypress = function () {
   var error = document.querySelector('#regName > .errors');
   errorMesege.parentNode.removeChild(errorMesege);
 };