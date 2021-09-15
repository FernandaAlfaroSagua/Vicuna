$(() => {
  cargarBusqueda();
});

function cargarBusqueda() {
  const queryString = window.location.search;

  const urlParams = new URLSearchParams(queryString);

  const page_type = urlParams.get("q");
  console.log(queryString);
  if (queryString === "") {
    $("#busqueda").html("Error en la URL");
  } else if (page_type === "") {
    $("#busqueda").html("No ingreso la búsqueda");
  } else {
    $.ajax({
      type: "GET",
      url: "./function/cargar_busqueda.php",
      data: "q=" + page_type,
      success: function (response) {
        $("#busqueda").html(response);
      },
    });
  }
}
