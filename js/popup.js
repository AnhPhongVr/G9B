// Get the modal
let modal = document.getElementById("myModal");

// Get the button that opens the modal
let btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
let span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target === modal) {
        modal.style.display = "none";
    }
}

// Get the PopI
let popI = document.getElementById("Popup");

// Get the button that opens the PopI
let btn2 = document.getElementById("Inscription");

// Get the <span> element that closes the PopI
let span2 = document.getElementsByClassName("btnClose")[0];

// When the user clicks on the button, open the PopI
btn2.onclick = function() {
    popI.style.display = "block";
}

// When the user clicks on <span> (x), close the PopI
span2.onclick = function() {
    popI.style.display = "none";
}

// When the user clicks anywhere outside of the PopI, close it
window.onclick = function(event) {
    if (event.target === popI) {
        popI.style.display = "none";
    }
}

//Afficher le mot de passe

function Afficher(){ 
    var input = document.getElementById("password"); 
    if (input.type === "password"){ 
        input.type = "text"; 
    } else{
            input.type = "password"; 
    } 
} 

//Afficher le mot de passe pour la confirmation

function AfficherConfirmation(){ 
    var input = document.getElementById("confirmation"); 
    if (input.type === "password"){ 
        input.type = "text"; 
    } else{
            input.type = "password"; 
    } 
} 

/*Mot de passe*/

//(?=.{12,} doit contenir au moins 12 caractères
//(?=.*[A-Z]) doit contenir au moins une lettre majuscule
//(?=.*[a-z]) doit contenir au moins une lettre minuscule
//(?=.*[0-9]) doit contenir au moins un chiffre
//(?=.*\\W) doit contenir au moins un caractère spécial

function robustesse() {
    var strength = document.getElementById('force');
    var strongRegex = new RegExp("^(?=.{12,})(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*\\W).*$", "g");
    var mediumRegex = new RegExp("^(?=.{8,})(((?=.*[A-Z])(?=.*[a-z])(?=.*\\W))|((?=.*[A-Z])(?=.*[0-9])(?=.*\\W))|((?=.*[a-z])(?=.*[0-9])(?=.*\\W))).*$", "g");
    var enoughRegex = new RegExp("(?=.{7,})(?=.*\\W).*$", "g");
    var pwd = document.getElementById("password");
        if (false == enoughRegex.test(pwd.value)) {
            strength.innerHTML = 'More Characters';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Strong!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Medium!</span>';
        } else {
            strength.innerHTML = '<span style="color:red">Weak!</span>';
        }
}

function check(){
    if (document.getElementById("password").value ==
        document.getElementById("confirmation").value) {
        document.getElementById("message").style.color = "green";
        document.getElementById("message").innerHTML = "Les mots de passe correspondent";
    } else{
        document.getElementById("message").style.color = "red";
        document.getElementById("message").innerHTML = "Les mots de passe ne correspondent pas";
    }
}