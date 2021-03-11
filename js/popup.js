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

//Ajout d'un message lorsque le mot de passe et sa confirmation correspondent/ne correspondent pas
/*var check = function() {
  if (document.getElementById("password").value ==
    document.getElementById("confirmation").value) {
    document.getElementById("message").style.color = "green";
    document.getElementById("message").innerHTML = "Correspond";
  } else {
    document.getElementById("message").style.color = "red";
    document.getElementById("message").innerHTML = "Ne correspond pas";
  }
*/
