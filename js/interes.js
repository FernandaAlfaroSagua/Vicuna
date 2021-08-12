// cuando se cargue la página se leera esto primero
$(() => {
  getInteres();
  cargarGaleria();
});

function cargarGaleria() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_galeria.php",
    success: function (response) {
      $("#galeria").html(response);
    },
  });
}

/*Funcion para recuperar a los usuarios*/
getInteres = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_interes.php",
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
const tabla = $("#dataTableInteres").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
  },
  columns: [
    { data: "idPuntointeres" },
    { data: "descripcionPuntointeres" },
    { data: "popularPuntointeres" },
    { data: "galeria_idGaleria" },
    {
      defaultContent: "estadoPuntointeres",
      render: function (data, type, row) {
        if (row.estadoPuntointeres == 1) {
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
$("#dataTableInteres").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.idPuntointeres);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#descripcion").val(data.descripcionPuntointeres);
  $("#popular").val(data.popularPuntointeres);
  $("#galeria").val(data.galeria_idGaleria);
  $("#estado").val(data.estadoPuntointeres);
  $("#ingresar").hide();
  $("#update").show();
  idEdit = data.idPuntointeres;
}

// cambios en el nombre
$("#descripcion").change(() => {
  let descripcion = $("#descripcion").val();
  if (descripcion) {
    $("#frm_descripcion > input").removeClass("is-invalid");
  } else {
    $("#frm_descripcion > input").addClass("is-invalid");
  }
});

$("#galeria").change(() => {
  let galeria = $("#galeria").val();
  if (galeria) {
    $("#frm_galeria > select").removeClass("is-invalid");
  } else {
    $("#frm_galeria > select").addClass("is-invalid");
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
  $("#descripcion").val("");
  $("#popular").val("");
  $("#galeria").val("");
  $("#estado").val("");
  idEdit = 0;
}

// validar campos vacios
function validar() {
  if ($("#descripcion").val() == "") {
    $("#frm_descripcion > input").addClass("is-invalid");
    $("#frm_descripcion > div").html("Descripcion es un campo requerido");
    $("#descripcion").focus();

    return false;
  }

  if ($("#galeria").val() == "") {
    $("#frm_galeria > select").addClass("is-invalid");
    $("#frm_galeria > div").html("Galería es un campo requerido");
    $("#galeria").focus();
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
    url: "../function/ctrl_interes.php",
    data: {
      descripcion: $("#descripcion").val(),
      popular: $("#popular").val(),
      galeria: $("#galeria").val(),
      estado: $("#estado").val(),
      accion_oculta: "Ingresar",
    },
    success: (result) => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Punto de Interes registrado",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getInteres();
        limpiar();
      });
    },
  });
}

// ajax del update
function update() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_interes.php",
    data: {
      id: idEdit,
      descripcion: $("#descripcion").val(),
      popular: $("#popular").val(),
      galeria: $("#galeria").val(),
      estado: $("#estado").val(),
      accion_oculta: "Actualizar",
    },
    success: function (response) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Punto de Interes Modificado",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getInteres();
        limpiar();
      });
    },
  });
}

// ajax delete
function eliminar(id) {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_interes.php",
    data: { id: id, accion_oculta: "Eliminar" },
    success: function (response) {
      getInteres();
      limpiar();
    },
    error: () => {
      alert("No se pudo eliminar el Punto de Interes");
    },
  });
}
