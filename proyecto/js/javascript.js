var productosCarrito = 0;
var carrito = [];
var server = "localhost"; //"192.168.4.100"

function cargar() {
    
    document.getElementById("carrito").addEventListener("dragover", allowDrop);
    
    //document.getElementById("carrito").addEventListener("drop", drop);

    document.getElementById("carrito").addEventListener('click', menuDesplegable);
    
}
function drag(ev) {
    
    //Indicamos que valor y tipo de información vamos a arrastrar. En este caso texto e ID del elemento.
    ev.dataTransfer.setData("text", ev.target.id);
}

function allowDrop(ev) {

    //Permitir que reciba algún elemento
    ev.preventDefault();

}

function drop(ev) {

    //Evitamos el comportamiento normal del navegador, que sería abrir el elemento en una nueva pestaña.
    ev.preventDefault();

    //Guardamos el elemento, llamado "text" en una variable.
    var data = ev.dataTransfer.getData("text");
    var idProducto = data;

    //contador carrito
    carrito[productosCarrito] = idProducto;
    productosCarrito++;
    document.getElementById("contador").innerText = productosCarrito;

    //FormData para poder enviar el idProducto al php
    var formulario = new FormData();

    formulario.append("idProducto", idProducto);

    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://' + server + '/proyecto/desplegableCarrito.php', true);

    //Enviamos parámetros;
    peticion_http.send(formulario);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {

            var texto = peticion_http.responseText;
            var padre = document.getElementById("carritoPadre");
            padre.innerHTML=texto;


        }
    }
    

}

function menuDesplegable() {

    if (document.getElementById("carritoPadre").style.display == "block") {
        document.getElementById("carritoPadre").style.display = "none";
    } else {
        document.getElementById("carritoPadre").style.display = "block";
    }
}

window.addEventListener("load", cargar);