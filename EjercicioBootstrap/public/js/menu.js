document.addEventListener("DOMContentLoaded", cargar);

function cargar(){

   document.getElementById("hamburguesa").addEventListener('click', menuDesplegable);

}
function menuDesplegable(){

    if( document.getElementById("menu").style.display == "block"){
        document.getElementById("menu").style.display = "none";
    }else{
        document.getElementById("menu").style.display = "block";
    }
}