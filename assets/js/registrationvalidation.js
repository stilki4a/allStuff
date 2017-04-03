// validacia na imeto pri registraciq
var nameField = document.getElementById('username');

 var hasErrors = false;

 nameField.onblur = function () {
    if (!(nameField.value.trim().length > 6)){
        var conteiner = document.getElementById('regName');
        var errorMesege = document.createElement('span');
        errorMesege.className = 'errors';
        errorMesege.textContent = "Моля поне 6 символа";
        conteiner.appendChild(errorMesege);
        hasErrors = true;
    }
};

 // nameField.onfocus = function () {
    nameField.onkeypress = function () {
   var errorMasege = document.querySelector("#regName > .errors");
   if(errorMasege) {
       errorMesege.parentNode.removeChild(errorMesege);
       hasErrors = false;
   }
 };


    document.forms[1].onsubmit = function (event) {
        if (hasErrors){
            event.preventDefault();
        }
    };

    //  validate emaila

function validEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

nameField.onblur = function () {
    if (!(validEmail(nameField.value))){
        var conteiner = document.getElementById('maiL');
        var errorMesege = document.createElement('span');
        errorMesege.className = 'wrong';
        errorMesege.textContent = "Моля въведете в правилен формат email";
        conteiner.appendChild(errorMesege);
        hasErrors = true;
    }
};


nameField.onkeypress = function () {
    var errorMasege = document.querySelector("#maiL > .wrong");
    if(errorMasege) {
        errorMesege.parentNode.removeChild(errorMesege);
        hasErrors = false;
    }
};



document.forms[1].onsubmit = function (event) {
    if (hasErrors){
        event.preventDefault();
    }
};




