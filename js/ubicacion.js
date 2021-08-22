// cuando se cargue la página se leera esto primero
$(() => {
  getUbicacion();
});

/*Funcion para recuperar a los usuarios*/
getUbicacion = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_ubicacion.php",
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
const tabla = $("#dataTableUbicacion").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
  },
  columns: [
    { data: "idUbicacionesQR" },
    { data: "descripcionUbicacionQR" },
    { data: "latitududUbicacionQR" },
    { data: "longitudUbicacionQR" },
    {
      defaultContent: "estadoUbicacionQR",
      render: function (data, type, row) {
        if (row.estadoUbicacionQR == 1) {
          return `<div class="text-center">
                            <i class="fas fa-check-square" style="color: #26d941"></i> Activo
                                    </div>`;
        } else {
          return `<div class="text-center">
                            <i class="fas fa-window-close text-danger"></i> Inactivo
                            </div>`;
        }
      },
    },
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
let idEdit = 0;

// funcion que nos trae el click en la datatable --> edit y eliminar
$("#dataTableUbicacion").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.idUbicacionesQR);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  tinyMCE.get("descripcionUbicacion").setContent(data.descripcionUbicacionQR);
  $("#latitud").val(data.latitududUbicacionQR);
  $("#longitud").val(data.longitudUbicacionQR);
  $("#estado").val(data.estadoUbicacionQR);
  $("#ingresar").hide();
  $("#update").show();
  $(".invalido").hide();
  $(".invalido").html("");
  idEdit = data.idUbicacionesQR;
}

// cambios en  la laatitud
$("#latitud").change(() => {
  let latitud = $("#latitud").val();
  if (latitud) {
    $("#frm_latitud > input").removeClass("is-invalid");
  } else {
    $("#frm_latitud > input").addClass("is-invalid");
  }
});

// cambios en la longitud
$("#longitud").change(() => {
  let longitud = $("#longitud").val();
  if (longitud) {
    $("#frm_longitud > input").removeClass("is-invalid");
  } else {
    $("#frm_longitud > input").addClass("is-invalid");
  }
});

//cambios en el estado  --> elimino o agrego el css de invalid
$("#estado").change(() => {
  let estado = $("#estado").val();
  if (estado) {
    $("#frm_estado > select").removeClass("is-invalid");
  } else {
    $("#frm_estado > select").addClass("is-invalid");
  }
});

// limpia los campos del formulario
function limpiar() {
  tinyMCE.get("descripcionUbicacion").setContent("");
  $("#latitud").val("");
  $("#longitud").val("");
  $("#estado").val("");
  $("#ingresar").show();
  $("#update").hide();
  idEdit = 0;
  $(".invalido").hide();
  $(".invalido").html("");
}

// validar campos vacios
function validar() {
  if (tinyMCE.get("descripcionUbicacion").getContent() == "") {
    $(".invalido").show();
    $(".invalido").html("Descripcion es un campo requerido");
    tinyMCE.get("descripcionUbicacion").focus();

    return false;
  }

  if ($("#latitud").val() == "") {
    $("#frm_latitud > input").addClass("is-invalid");
    $("#frm_latitud > div").html("Latitud es un campo requerido");
    $("#latitud").focus();

    return false;
  }

  if ($("#longitud").val() == "") {
    $("#frm_longitud > input").addClass("is-invalid");
    $("#frm_longitud > div").html("Longitud es un campo requerido");
    $("#longitud").focus();

    return false;
  }

  if ($("#estado").val() == "") {
    $("#frm_estado > select").addClass("is-invalid");
    $("#frm_estado > div").html("Estado es un campo requerido");
    $("#estado").focus();
    return false;
  }

  if ($("#estado").val() > 1) {
    $("#frm_estado > select").addClass("is-invalid");
    $("#frm_estado > div").html("Estado es un campo requerido");
    $("#estado").focus();
    return false;
  }

  if ($("#estado").val() < 0) {
    $("#frm_estado > select").addClass("is-invalid");
    $("#frm_estado > div").html("Estado es un campo requerido");
    $("#estado").focus();
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
  alert(tinyMCE.get("descripcionUbicacion").getContent());
  $.ajax({
    type: "POST",
    url: "../function/ctrl_ubicacion.php",
    data: {
      descripcion: tinyMCE.get("descripcionUbicacion").getContent(),
      latitud: $("#latitud").val(),
      longitud: $("#longitud").val(),
      estado: $("#estado").val(),
      accion_oculta: "Ingresar",
    },
    success: (result) => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Ubicación QR registrada",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getUbicacion();
        limpiar();
      });
    },
  });
}

// ajax del update
function update() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_ubicacion.php",
    data: {
      id: idEdit,
      descripcion: tinyMCE.get("descripcionUbicacion").getContent(),
      latitud: $("#latitud").val(),
      longitud: $("#longitud").val(),
      estado: $("#estado").val(),
      accion_oculta: "Actualizar",
    },
    success: function (response) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Ubicación QR Modificada",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getUbicacion();
        limpiar();
      });
    },
  });
}

// ajax delete
function eliminar(id) {
  Swal.fire({
    title: "¿Seguro de cambiar el estado a inactivo?",
    icon: "warning",
    showDenyButton: true,
    confirmButtonText: `Si, cambiar el estado`,
    denyButtonText: `Cancelar`,
    customClass: {
      confirmButton: "order-2",
      denyButton: "order-3",
    },
  }).then((result) => {
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "../function/ctrl_ubicacion.php",
        data: { id: id, accion_oculta: "Eliminar" },
        success: function (response) {
          Swal.fire("Guardado!", "", "success");
          getUbicacion();
          limpiar();
        },
        error: () => {
          alert("No se pudo eliminar la Ubicación QR");
        },
      });
    }
  });
}
