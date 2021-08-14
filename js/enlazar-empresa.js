// In your Javascript (external .js resource or <script> tag)

// cuando se cargue la página se leera esto primero
$(() => {
  cargarUbicacion();
  cargarEmpresa();
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

function cargarEmpresa() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_empresa.php",
    success: function (response) {
      $("#empresa").html(response);
    },
  });
}

/*Funcion para recuperar a los usuarios*/
getLista = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_enlazar-empresa.php",
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
    { data: "empresa_idEmpresa" },
    { data: "nombreEmpresa" },
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
  idempresa = 0;

// funcion que nos trae el click en la datatable --> edit y eliminar
$("#dataTableVideo").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.ubicacionesQR_idUbicacionesQR, data.empresa_idEmpresa);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#ubicacion").val(data.ubicacionesQR_idUbicacionesQR);
  $("#empresa").val(data.empresa_idEmpresa);
  $("#ingresar").hide();
  $("#update").show();
  idqr = data.ubicacionesQR_idUbicacionesQR;
  idempresa = data.empresa_idEmpresa;
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

$("#empresa").change(() => {
  let empresa = $("#empresa").val();
  if (empresa) {
    $("#frm_empresa > input").removeClass("is-invalid");
  } else {
    $("#frm_empresa > input").addClass("is-invalid");
  }
});

// limpia los campos del formulario
function limpiar() {
  $("#empresa").val("");
  $("#ubicacion").val("");
  $("#ingresar").show();
  $("#update").hide();
  idqr = 0;
  idempresa = 0;
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

  if ($("#empresa").val() == "") {
    $("#frm_empresa > select").addClass("is-invalid");
    $("#frm_empresa > div").html(
      "Seleccionar la Empresa es un campo requerido"
    );
    $("#empresa").focus();
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
    url: "../function/ctrl_enlazar-empresa.php",
    data: {
      ubicacion: $("#ubicacion").val(),
      empresa: $("#empresa").val(),
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
    url: "../function/ctrl_enlazar-empresa.php",
    data: {
      ubicacion_pasado: idqr,
      empresa_pasado: idempresa,
      ubicacion: $("#ubicacion").val(),
      empresa: $("#empresa").val(),
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
function eliminar(qr, empresa) {
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
        url: "../function/ctrl_enlazar-empresa.php",
        data: {
          ubicacion: qr,
          empresa: empresa,
          accion_oculta: "Eliminar",
        },
        success: function (response) {
          Swal.fire("Guardado!", "", "success");
          getLista();
          limpiar();
        },
        error: () => {
          alert("No se pudo eliminar el enlace");
        },
      });
    }
  });
}
