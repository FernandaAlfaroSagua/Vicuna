// In your Javascript (external .js resource or <script> tag)

// cuando se cargue la página se leera esto primero
$(() => {
  cargarLink();
  cargarInteres();
  getLista();
});

function cargarLink() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_link.php",
    success: function (response) {
      $("#link").html(response);
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
    url: "../function/ctrl_enlazar-video.php",
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
    { data: "multimediavideo_idMultimediavideo" },
    { data: "linkyoutubeMultimedia" },
    { data: "puntointeres_idPuntointeres" },
    { data: "descripcionPuntointeres" },
    {
      defaultContent: "principal",
      render: function (data, type, row) {
        if (row.principal == 1) {
          return `<div class="text-center">
                            <i class="fas fa-check-square" style="color: #26d941"></i> Principal
                                    </div>`;
        } else {
          return `<div class="text-center">
                            <i class="fas fa-window-close text-danger"></i> No Principal
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
let idinteres = 0,
  idlink = 0,
  idprincipal = 0;

// funcion que nos trae el click en la datatable --> edit y eliminar
$("#dataTableVideo").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(
      data.multimediavideo_idMultimediavideo,
      data.puntointeres_idPuntointeres,
      data.principal
    );
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#link").val(data.multimediavideo_idMultimediavideo);
  $("#interes").val(data.puntointeres_idPuntointeres);
  $("#principal").val(data.principal);
  $("#ingresar").hide();
  $("#update").show();
  idlink = data.multimediavideo_idMultimediavideo;
  idinteres = data.puntointeres_idPuntointeres;
  idprincipal = data.principal;
}

// cambios en el nombre
$("#link").change(() => {
  let link = $("#link").val();
  if (link) {
    $("#frm_link > input").removeClass("is-invalid");
  } else {
    $("#frm_link > input").addClass("is-invalid");
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
//cambios en el estado  --> elimino o agrego el css de invalid
$("#principal").change(() => {
  let principal = $("#principal").val();
  if (principal) {
    $("#frm_principal > select").removeClass("is-invalid");
  } else {
    $("#frm_principal > select").addClass("is-invalid");
  }
});

// limpia los campos del formulario
function limpiar() {
  $("#link").val("");
  $("#interes").val("");
  $("#principal").val("");
  $("#ingresar").show();
  $("#update").hide();
  idinteres = 0;
  idlink = 0;
  idprincipal = 0;
}

// validar campos vacios
function validar() {
  if ($("#link").val() == "") {
    $("#frm_link > select").addClass("is-invalid");
    $("#frm_link > div").html("Indicar el video es un campo requerido");
    $("#link").focus();
    return false;
  }

  if ($("#interes").val() == "") {
    $("#frm_interes > select").addClass("is-invalid");
    $("#frm_interes > div").html(
      "Indicar el punto de interés es un campo requerido"
    );
    $("#interes").focus();
    return false;
  }

  if ($("#principal").val() == "") {
    $("#frm_principal > select").addClass("is-invalid");
    $("#frm_principal > div").html(
      "Indicar si el video será principal es un campo requerido"
    );
    $("#principal").focus();
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
    url: "../function/ctrl_enlazar-video.php",
    data: {
      interes: $("#interes").val(),
      link: $("#link").val(),
      principal: $("#principal").val(),
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
    url: "../function/ctrl_enlazar-video.php",
    data: {
      link_pasado: idlink,
      interes_pasado: idinteres,
      principal_pasado: idprincipal,
      interes: $("#interes").val(),
      link: $("#link").val(),
      principal: $("#principal").val(),
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
function eliminar(link, interes, principal) {
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
        url: "../function/ctrl_enlazar-video.php",
        data: {
          interes: interes,
          link: link,
          principal: principal,
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
