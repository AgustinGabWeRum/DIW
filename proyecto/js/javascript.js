var productosCarrito = 0;
var server = "192.168.4.26";

function cargar() {
    
    document.getElementById("carrito").addEventListener("dragover", allowDrop);

    document.getElementById("carrito").addEventListener('click', menuDesplegable);

    contadorCarrito();


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

    //FormData para poder enviar el idProducto al php
    var formulario = new FormData();

    formulario.append("idProducto", idProducto);

    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://' + server + '/proyecto/insertarLineaCarrito.php', true);

    //Enviamos parámetros;
    peticion_http.send(formulario);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {

            var texto = peticion_http.responseText;
            var padre = document.getElementById("carritoPadre");
            padre.innerHTML=texto;

            contadorCarrito();
            scroll();

        }
    }
    

}

function comprobarCarrito(){

    contadorCarrito();
    
    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://' + server + '/proyecto/desplegableCarrito.php', true);

    //Enviamos parámetros;
    peticion_http.send(null);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            var texto = peticion_http.responseText;
            var padre = document.getElementById("carritoPadre");
            padre.innerHTML=texto;

            scroll();
        }
    }
}

function contadorCarrito(){

    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://' + server + '/proyecto/contadorCarrito.php', true);

    //Enviamos parámetros;
    peticion_http.send(null);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {

            var texto = peticion_http.responseText;
            var padre = document.getElementById("contadorPadre");
            padre.innerHTML=texto;

            comprobarCarrito();
        }
    }
}

function menuDesplegable() {

    if (document.getElementById("carritoPadre").style.display == "block") {
        document.getElementById("carritoPadre").style.display = "none";
        scroll();
    } else {
        document.getElementById("carritoPadre").style.display = "block";
        scroll();
    }
}
//ESTA FUNCION SE USA CUANDO ELIMINO EL PRODUCTO DEL DESPLEGABLE DEL CARRITO

function eliminar(evento){

    idLineaCarrito = evento.target.id;

    //FormData para poder enviar el idProducto al php
    var formulario = new FormData();

    formulario.append("idLineaCarrito", idLineaCarrito);

    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://' + server + '/proyecto/eliminarProductoCarrito.php', true);

    //Enviamos parámetros;
    peticion_http.send(formulario);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {
            contadorCarrito();
            scroll();
            menuDesplegable();
        }
    }
}

function comprar(){

    var total = document.getElementById("precioTotal").innerText;

    //FormData para poder enviar el idProducto al php
    var formulario = new FormData();

    formulario.append("total", total);

    //AJAX

    peticion_http = new XMLHttpRequest();

    peticion_http.onreadystatechange = mostrar;

    peticion_http.open('POST', 'http://' + server + '/proyecto/insertarPedido.php', true);

    //Enviamos parámetros;
    peticion_http.send(formulario);

    function mostrar() {

        if (peticion_http.readyState == 4 && peticion_http.status == 200) {

            location.reload();
        }
    }
}

function scroll(){

    var div = document.getElementById("carritoPadre");

    var height = div.offsetHeight;

    if(height > 496){

        div.classList.add("scroll");
    }
    else{
        div.classList.remove("scroll");
    }
}

window.addEventListener("load", cargar);