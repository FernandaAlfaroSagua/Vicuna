// In your Javascript (external .js resource or <script> tag)

// cuando se cargue la página se leera esto primero
$(() => {
  cargarUbicacion();
  cargarCalle();
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

function cargarCalle() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_calle.php",
    success: function (response) {
      $("#calle").html(response);
    },
  });
}

/*Funcion para recuperar a los usuarios*/
getLista = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_enlazar-calle.php",
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
    { data: "calles_idcalles" },
    { data: "nombreCalle" },
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
  idcalle = 0;

// funcion que nos trae el click en la datatable --> edit y eliminar
$("#dataTableVideo").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.ubicacionesQR_idUbicacionesQR, data.calles_idcalles);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#ubicacion").val(data.ubicacionesQR_idUbicacionesQR);
  $("#calle").val(data.calles_idcalles);
  $("#ingresar").hide();
  $("#update").show();
  idqr = data.ubicacionesQR_idUbicacionesQR;
  idcalle = data.calles_idcalles;
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

$("#calle").change(() => {
  let calle = $("#calle").val();
  if (calle) {
    $("#frm_calle > input").removeClass("is-invalid");
  } else {
    $("#frm_calle > input").addClass("is-invalid");
  }
});

// limpia los campos del formulario
function limpiar() {
  $("#ubicacion").val("");
  $("#calle").val("");
  idqr = 0;
  idcalle = 0;
  $("#ingresar").show();
  $("#update").hide();
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

  if ($("#calle").val() == "") {
    $("#frm_calle > select").addClass("is-invalid");
    $("#frm_calle > div").html("Seleccionar la Calle es un campo requerido");
    $("#calle").focus();
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
    url: "../function/ctrl_enlazar-calle.php",
    data: {
      ubicacion: $("#ubicacion").val(),
      calle: $("#calle").val(),
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
    url: "../function/ctrl_enlazar-calle.php",
    data: {
      ubicacion_pasado: idqr,
      calle_pasado: idcalle,
      ubicacion: $("#ubicacion").val(),
      calle: $("#calle").val(),
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
function eliminar(qr, calle) {
  Swal.fire({
    title: "¿Seguro de eliminarlo?",
    icon: "warning",
    showDenyButton: true,
    confirmButtonText: `Si, eliminalo`,
    denyButtonText: `Cancelar`,
    customClass: {
      confirmButton: "order-2",
      denyButton: "order-3",
    },
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "../function/ctrl_enlazar-calle.php",
        data: {
          ubicacion: qr,
          calle: calle,
          accion_oculta: "Eliminar",
        },
        success: function (response) {
          Swal.fire("Guardado!", "", "success");
          getLista();
          limpiar();
        },
        error: () => {
          alert("No se pudo eliminar la relacion");
        },
      });
    }
  });
}
