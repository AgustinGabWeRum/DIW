var AuxID=location.search.substr(1).split("=")[1];
$.getJSON( "http://localhost:3000/partes/"+AuxID, function( data ) {
  var items = [];
    $.each( data, function( key, val ) {
  console.log(key);
  
    items.push( "<li id='" + key + "' class='list-group-item'>" +key+" : " + val + "</li>" );
  });
  
  $( "<ul/>", {
    "class": "list-group",
    html: items.join( "" )
  }).appendTo( "#divLista" );
});