// In your Javascript (external .js resource or <script> tag)

// cuando se cargue la página se leera esto primero
$(() => {
  cargarUbicacion();
  cargarInteres();
  getLista();
});

function cargarUbicacion() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_ubicacion.php",
    success: function (response) {
      $("#ubicacion").html(response);
    },
  });
}

function cargarInteres() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_interes.php",
    success: function (response) {
      $("#interes").html(response);
    },
  });
}

/*Funcion para recuperar a los usuarios*/
getLista = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_enlazar-interes.php",
    data: { accion_oculta: "show" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      console.log(result);
      tabla.clear();
      tabla.rows.add(result);
      tabla.order([1, "desc"]).draw();
    },
    error: () => {
      swal({
        title: "Error",
        icon: "error",
        text: "No se pudo encontrar el recurso",
      }).then(() => {
        $("body").removeClass("loading");
      });
    },
  });
};

/*Constante para rellenar las filas de la tabla: usuarios --> se crea el datatable*/
const tabla = $("#dataTableVideo").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
  },
  columns: [
    { data: "ubicacionesQR_idUbicacionesQR" },
    { data: "descripcionUbicacionQR" },
    { data: "puntointeres_idPuntointeres" },
    { data: "descripcionPuntointeres" },
    {
      defaultContent: `<div class="text-center"'>
                                <button type='button' name='btn_update' class='btn'>
                                <i class="fas fa-pen" style="color:blue"></i>
                                </button>
                             </div>`,
    },
    {
      defaultContent: `<div class="text-center"'>
                                <button type='button' name='btn_delete'  value='Eliminar' class='btn''>
                                
								  <i class="fas fa-trash text-danger"></i>
                                </button> 
                              </div>`,
    },
  ],
});

// variable global para guardar el id del usuario
let idqr = 0,
  idinteres = 0;

// funcion que nos trae el click en la datatable --> edit y eliminar
$("#dataTableVideo").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(
      data.ubicacionesQR_idUbicacionesQR,
      data.puntointeres_idPuntointeres
    );
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#ubicacion").val(data.ubicacionesQR_idUbicacionesQR);
  $("#interes").val(data.puntointeres_idPuntointeres);
  $("#ingresar").hide();
  $("#update").show();
  idqr = data.ubicacionesQR_idUbicacionesQR;
  idinteres = data.puntointeres_idPuntointeres;
}

// cambios en el nombre
$("#ubicacion").change(() => {
  let ubicacion = $("#ubicacion").val();
  if (ubicacion) {
    $("#frm_ubicacion > input").removeClass("is-invalid");
  } else {
    $("#frm_ubicacion > input").addClass("is-invalid");
  }
});

$("#interes").change(() => {
  let interes = $("#interes").val();
  if (interes) {
    $("#frm_interes > input").removeClass("is-invalid");
  } else {
    $("#frm_interes > input").addClass("is-invalid");
  }
});

// limpia los campos del formulario
function limpiar() {
  $("#empresa").val("");
  $("#interes").val("");
  idqr = 0;
  idinteres = 0;
}

// validar campos vacios
function validar() {
  if ($("#ubicacion").val() == "") {
    $("#frm_ubicacion > select").addClass("is-invalid");
    $("#frm_ubicacion > div").html(
      "Seleccionar la ubicación QR es un campo requerido"
    );
    $("#ubicacion").focus();
    return false;
  }

  if ($("#interes").val() == "") {
    $("#frm_interes > select").addClass("is-invalid");
    $("#frm_interes > div").html(
      "Seleccionar el Punto de Interes es un campo requerido"
    );
    $("#interes").focus();
    return false;
  }

  return true;
}

// función para el switch
function enviar(accion) {
  if (validar()) {
    if (accion == "Ingresar") {
      create();
    } else if (accion == "Update") {
      update();
    }
  }
}

//ajax create
function create() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_enlazar-interes.php",
    data: {
      ubicacion: $("#ubicacion").val(),
      interes: $("#interes").val(),
      accion_oculta: "Ingresar",
    },
    success: (result) => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Registrado",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getLista();
        limpiar();
      });
    },
  });
}

// ajax del update
function update() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_enlazar-interes.php",
    data: {
      ubicacion_pasado: idqr,
      interes_pasado: idinteres,
      ubicacion: $("#ubicacion").val(),
      interes: $("#interes").val(),
      accion_oculta: "Actualizar",
    },

    success: function (response) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Modificado",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getLista();
        limpiar();
      });
    },
  });
}

// ajax delete
function eliminar(qr, interes) {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_enlazar-interes.php",
    data: {
      ubicacion: qr,
      interes: interes,
      accion_oculta: "Eliminar",
    },
    success: function (response) {
      getLista();
      limpiar();
    },
    error: () => {
      alert("No se pudo eliminar el enlace");
    },
  });
}
