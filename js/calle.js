// cuando se cargue la página se leera esto primero
$(() => {
  getCalle();
});

/*Funcion para recuperar a los usuarios*/
getCalle = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_calle.php",
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
const tabla = $("#dataTableCalle").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
  },
  columns: [
    { data: "idcalles" },
    { data: "nombreCalle" },
    {
      defaultContent: "estadoCalle",
      render: function (data, type, row) {
        if (row.estadoCalle == 1) {
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
$("#dataTableCalle").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.idcalles);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#nombreCalle").val(data.nombreCalle);
  $("#estado").val(data.estadoCalle);
  $("#ingresar").hide();
  $("#update").show();
  idEdit = data.idcalles;
}

// cambios en el nombre
$("#nombreCalle").change(() => {
  let nombre = $("#nombreCalle").val();
  if (nombre) {
    $("#frm_nombreCalle > input").removeClass("is-invalid");
  } else {
    $("#frm_nombreCalle > input").addClass("is-invalid");
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
  $("#nombreCalle").val("");
  $("#estado").val("");
  $("#ingresar").show();
  $("#update").hide();
  idEdit = 0;
}

// validar campos vacios
function validar() {
  if ($("#nombreCalle").val() == "") {
    $("#frm_nombreCalle > input").addClass("is-invalid");
    $("#frm_nombreCalle > div").html("Nombre es un campo requerido");
    $("#nombreCalle").focus();

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
  $.ajax({
    type: "POST",
    url: "../function/ctrl_calle.php",
    data: {
      nombre: $("#nombreCalle").val(),
      estado: $("#estado").val(),
      accion_oculta: "Ingresar",
    },
    success: (result) => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Calle registrada",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getCalle();
        limpiar();
      });
    },
  });
}

// ajax del update
function update() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_calle.php",
    data: {
      id: idEdit,
      nombre: $("#nombreCalle").val(),
      estado: $("#estado").val(),
      accion_oculta: "Actualizar",
    },
    success: function (response) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Calle Modificada",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getCalle();
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
        url: "../function/ctrl_calle.php",
        data: { id: id, accion_oculta: "Eliminar" },
        success: function (response) {
          Swal.fire("Guardado!", "", "success");
          getCalle();
          limpiar();
        },
        error: () => {
          alert("No se pudo eliminar la calle");
        },
      });
    }
  });
}
