$.getJSON("http://localhost:3000/partes/faltasGraves", function (data) {
  var items = [];
  $.each(data, function (key, val) {
    console.log(key);

    items.push("<li id='" + key + "' class='list-group-item'><a href='detalles.html?id=" + val._id + "' >" + val.nom + "</a></li>");
  });

  $("<ul/>", {
    "class": "list-group",
    html: items.join("")
  }).appendTo("#divLista");
});