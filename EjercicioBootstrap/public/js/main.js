function onSubmit(form) {

  var data = JSON.stringify($(form).serializeArray()); //  <-----------
  console.log(data);
  return false; //don't submit
}
function fechaActual() {
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth() + 1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if (dia < 10){
    dia = '0' + dia; //agrega cero si el menor de 10
  }
  if (mes < 10){
    mes = '0' + mes //agrega cero si el menor de 10
  }

  var fechaActual = ano + "-" + mes + "-" + dia;
  
  document.getElementById('incident').value = fechaActual;
  document.getElementById('dias').value = fechaActual;
  document.getElementById('horas').value = fechaActual;
  document.getElementById('dias2').value = fechaActual;
  document.getElementById('dias4').value = fechaActual;
}
$(document).ready(function () {

  $("input[type=radio]").click(function (event) {
    var valor = $(event.target).val();
    if (valor == "leve") {
      $("#leve").show();
      $("#grave").hide();
      $("#Faltagrave").hide();
      $("#botonGrave").hide();
    } else if (valor == "grave") {
      $("#leve").hide();
      $("#Faltagrave").show();
      $("#botonGrave").show();
    }
    else {

    }
  })
})

function marcarLeve() {

  document.getElementById("radioLeve").checked = 1;
}

function radioButtonLeve() {

  if (document.getElementById('radioLeve').checked) {
    document.getElementById('radioGrave').checked = 0;
    document.getElementById('radioLeve').name = "leve";

  }

}
function radioButtonGrave() {
  if (document.getElementById('radioGrave').checked) {
    document.getElementById('radioLeve').checked = 0;
    document.getElementById('radioGrave').name = "grave";

  }
}