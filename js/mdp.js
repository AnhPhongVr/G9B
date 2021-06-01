
//mdp input manipulation------------------------------------------------------------------------------------------------
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
            strength.innerHTML = 'Plus de charactères et varier les types';
        } else if (strongRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:green">Fort!</span>';
        } else if (mediumRegex.test(pwd.value)) {
            strength.innerHTML = '<span style="color:orange">Moyen!</span>';
        } else {
            strength.innerHTML = '<span style="color:red">Faible!</span>';
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
