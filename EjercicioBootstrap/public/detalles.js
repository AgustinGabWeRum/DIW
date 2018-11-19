var AuxID=location.search.substr(1).split("=")[1];
var leve;
var grave;
$.getJSON( "http://localhost:3000/partes/"+AuxID, function( data ) {
  var items = [];
    $.each( data, function( key, val ) {
  console.log(key);
  
    items.push( "<li id='" + key + "' class='list-group-item'>" +key+" : " + val + "</li>" );

    if( key == "leve"){
      leve = val;
    }else{
      grave = val;
    }
  });
  
  $( "<ul/>", {
    "class": "list-group",
    html: items.join( "" )
  }).appendTo( "#divLista" );
});

function eliminar(){
  alert("ye");
    $.ajax({
      type: "DELETE",
      url: "http://localhost:3000/partes/"+AuxID,
      data: ""
    });
}

function cambiarPag(){

  if(grave == "grave"){
    document.getElementById('enlace').href = "http://localhost:3000/listarGrave.html";
  }else{
    document.getElementById('enlace').href = "http://localhost:3000/listarLeve.html";
  }
}
  
