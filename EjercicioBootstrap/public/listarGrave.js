$.getJSON( "http://localhost:3000/partes", function( data ) {
  var items = [];
    $.each( data, function( key, val ) {
  console.log(key);
  
  if( val.grave == "grave"){
    items.push( "<li id='" + key + "' class='list-group-item'><a href='partes/"+val._id+"' >" + val.nom + "</a></li>" );
  }});
  
  $( "<ul/>", {
    "class": "list-group",
    html: items.join( "" )
  }).appendTo( "#divLista" );
});