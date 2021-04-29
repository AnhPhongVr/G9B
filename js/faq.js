function reponse(id){ 
    if (document.getElementById(id).style.display == 'none'){
    	document.getElementById(id).style.display = 'block';
    	document.getElementById('logoClient').style.display = 'none';
    	document.getElementById('titreReponse').style.display = 'block';
    }else{
    	document.getElementById(id).style.display = 'none';
    }
}

