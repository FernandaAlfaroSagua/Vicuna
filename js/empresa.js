// cuando se cargue la página se leera esto primero

$(() => {
  getEmpresa();
  cargarServicio();
  cargarRubro();
});

$(function () {
  $("#celularEmpresa").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      alert("Solo números");
      return false;
    }
  });
});

$(function () {
  $("#telefonoEmpresa").keypress(function (e) {
    if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
      alert("Solo números");
      return false;
    }
  });
});

function cargarServicio() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_servicio.php",
    success: function (response) {
      $("#servicio").html(response);
    },
  });
}

function cargarRubro() {
  $.ajax({
    type: "POST",
    url: "../function/cargar_rubro.php",
    success: function (response) {
      $("#rubro").html(response);
    },
  });
}

/*Funcion para recuperar a los usuarios*/
getEmpresa = () => {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_empresa.php",
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
const tabla = $("#dataTableEmpresa").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
  },
  columns: [
    { data: "idEmpresa" },
    { data: "nombreEmpresa" },
    { data: "descripcionEmpresa" },
    { data: "direccionEmpresa" },
    { data: "telefonofijoEmpresa" },
    { data: "telefonocelularEmpresa" },
    { data: "correoEmpresa" },
    { data: "paginawebEmpresa" },
    { data: "rrssfacebookEmpresa" },
    { data: "rrsstwitterEmpresa" },
    { data: "rrssinstagramEmpresa" },
    { data: "servicio_idServicio" },
    { data: "rubro_idRubro" },
    {
      defaultContent: "estadoEmpresa",
      render: function (data, type, row) {
        if (row.estadoEmpresa == 1) {
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
    {
      render: function (data, type, row) {
        return `<div class="text-center">
                      <a class="btn" href="fotos.php?id=${row.idEmpresa}&servicio=${row.servicio_idServicio}&rubro=${row.rubro_idRubro}"><i class="fas fa-images" style="color: #26d941"></i></a>
                            
                  </div>`;
      },
    },
  ],
});

// variable global para guardar el id del usuario
let idEdit = 0;

// funcion que nos trae el click en la datatable --> edit y eliminar
$("#dataTableEmpresa").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.idEmpresa);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#nombreEmpresa").val(data.nombreEmpresa);
  tinyMCE.get("descripcionEmpresa").setContent(data.descripcionEmpresa);
  $("#direccionEmpresa").val(data.direccionEmpresa);
  $("#telefonoEmpresa").val(data.telefonofijoEmpresa);
  $("#celularEmpresa").val(data.telefonocelularEmpresa);
  $("#emailEmpresa").val(data.correoEmpresa);
  $("#webEmpresa").val(data.paginawebEmpresa);
  $("#facebookEmpresa").val(data.rrssfacebookEmpresa);
  $("#twitterEmpresa").val(data.rrsstwitterEmpresa);
  $("#instagramEmpresa").val(data.rrssinstagramEmpresa);
  $("#servicio").val(data.servicio_idServicio);
  $("#rubro").val(data.rubro_idRubro);
  $("#estado").val(data.estadoEmpresa);
  $("#ingresar").hide();
  $("#update").show();
  $(".invalido").hide();
  $(".invalido").html("");
  idEdit = data.idEmpresa;
}

// cambios en el nombre
$("#nombreEmpresa").change(() => {
  let nombre = $("#nombreEmpresa").val();
  if (nombre) {
    $("#frm_nombreEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_nombreEmpresa > input").addClass("is-invalid");
  }
});

$("#direccionEmpresa").change(() => {
  let direccionEmpresa = $("#direccionEmpresa").val();
  if (direccionEmpresa) {
    $("#frm_direccionEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_direccionEmpresa > input").addClass("is-invalid");
  }
});

$("#telefonoEmpresa").change(() => {
  let telefonoEmpresa = $("#telefonoEmpresa").val();
  if (telefonoEmpresa) {
    $("#frm_telefonoEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_telefonoEmpresa > input").addClass("is-invalid");
  }
});

$("#celularEmpresa").change(() => {
  let celularEmpresa = $("#celularEmpresa").val();
  if (celularEmpresa) {
    $("#frm_celularEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_celularEmpresa > input").addClass("is-invalid");
  }
});

$("#emailEmpresa").change(() => {
  let emailEmpresa = $("#emailEmpresa").val();
  if (emailEmpresa) {
    $("#frm_emailEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_emailEmpresa > input").addClass("is-invalid");
  }
});

$("#webEmpresa").change(() => {
  let webEmpresa = $("#webEmpresa").val();
  if (webEmpresa) {
    $("#frm_webEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_webEmpresa > input").addClass("is-invalid");
  }
});

$("#facebookEmpresa").change(() => {
  let facebook = $("#facebookEmpresa").val();
  if (facebook) {
    $("#frm_facebookEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_facebookEmpresa > input").addClass("is-invalid");
  }
});

$("#twitterEmpresa").change(() => {
  let twitter = $("#twitterEmpresa").val();
  if (twitter) {
    $("#frm_twitterEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_twitterEmpresa > input").addClass("is-invalid");
  }
});

$("#instagramEmpresa").change(() => {
  let instagram = $("#instagramEmpresa").val();
  if (instagram) {
    $("#frm_instagramEmpresa > input").removeClass("is-invalid");
  } else {
    $("#frm_instagramEmpresa > input").addClass("is-invalid");
  }
});

$("#rubro").change(() => {
  let rubro = $("#rubro").val();
  if (rubro) {
    $("#frm_rubro > select").removeClass("is-invalid");
  } else {
    $("#frm_rubro > select").addClass("is-invalid");
  }
});

$("#servicio").change(() => {
  let servicio = $("#servicio").val();
  if (servicio) {
    $("#frm_servicio > select").removeClass("is-invalid");
  } else {
    $("#frm_servicio > select").addClass("is-invalid");
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
  $("#nombreEmpresa").val("");
  tinyMCE.get("descripcionEmpresa").setContent("");
  $("#direccionEmpresa").val("");
  $("#telefonoEmpresa").val("");
  $("#celularEmpresa").val("");
  $("#emailEmpresa").val("");
  $("#webEmpresa").val("");
  $("#facebookEmpresa").val("");
  $("#twitterEmpresa").val("");
  $("#instagramEmpresa").val("");
  $("#servicio").val("");
  $("#rubro").val("");
  $("#estado").val("");
  $("#ingresar").show();
  $("#update").hide();
  idEdit = 0;
  $(".invalido").hide();
  $(".invalido").html("");
}

// validar campos vacios
function validar() {
  var expRegEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;

  if ($("#nombreEmpresa").val() == "") {
    $("#frm_nombreEmpresa > input").addClass("is-invalid");
    $("#frm_nombreEmpresa > div").html("Nombre es un campo requerido");
    $("#nombreEmpresa").focus();

    return false;
  }

  if (tinyMCE.get("descripcionEmpresa").getContent() == "") {
    $(".invalido").show();
    $(".invalido").html("Descripcion es un campo requerido");
    tinyMCE.get("descripcionEmpresa").focus();

    return false;
  }

  if ($("#direccionEmpresa").val() == "") {
    $("#frm_direccionEmpresa > input").addClass("is-invalid");
    $("#frm_direccionEmpresa > div").html("Dirección es un campo requerido");
    $("#direccionEmpresa").focus();

    return false;
  }

  if ($("#telefonoEmpresa").val() == "") {
    $("#frm_telefonoEmpresa > input").addClass("is-invalid");
    $("#frm_telefonoEmpresa > div").html("Teléfono es un campo requerido");
    $("#telefonoEmpresa").focus();

    return false;
  }

  if ($("#celularEmpresa").val() == "") {
    $("#frm_celularEmpresa > input").addClass("is-invalid");
    $("#frm_celularEmpresa > div").html("Celular es un campo requerido");
    $("#celularEmpresa").focus();

    return false;
  }

  if ($("#emailEmpresa").val() == "") {
    $("#frm_emailEmpresa > input").addClass("is-invalid");
    $("#frm_emailEmpresa > div").html("Email es un campo requerido");
    $("#emailEmpresa").focus();
    return false;
  } else if (!expRegEmail.exec($("#emailEmpresa").val())) {
    $("#frm_emailEmpresa > input").addClass("is-invalid");
    $("#frm_emailEmpresa > div").html("Formato invalido");
    $("#emailEmpresa").focus();
    verificar = false;
    return false;
  }

  if ($("#webEmpresa").val() == "") {
    $("#frm_webEmpresa > input").addClass("is-invalid");
    $("#frm_webEmpresa > div").html("Página Web es un campo requerido");
    $("#webEmpresa").focus();

    return false;
  }

  if ($("#facebookEmpresa").val() == "") {
    $("#frm_facebookEmpresa > input").addClass("is-invalid");
    $("#frm_facebookEmpresa > div").html("Facebook es un campo requerido");
    $("#facebookEmpresa").focus();

    return false;
  }

  if ($("#twitterEmpresa").val() == "") {
    $("#frm_twitterEmpresa > input").addClass("is-invalid");
    $("#frm_twitterEmpresa > div").html("Twitter es un campo requerido");
    $("#twitterEmpresa").focus();

    return false;
  }

  if ($("#instagramEmpresa").val() == "") {
    $("#frm_instagramEmpresa > input").addClass("is-invalid");
    $("#frm_instagramEmpresa > div").html("Instragram es un campo requerido");
    $("#instagramEmpresa").focus();

    return false;
  }

  if ($("#rubro").val() == "") {
    $("#frm_rubro > select").addClass("is-invalid");
    $("#frm_rubro > div").html("Rubro es un campo requerido");
    $("#rubro").focus();
    return false;
  }

  if ($("#servicio").val() == "") {
    $("#frm_servicio > select").addClass("is-invalid");
    $("#frm_servicio > div").html("Servicio es un campo requerido");
    $("#servicio").focus();
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

// // función para el switch
function enviar(accion) {
  if (validar()) {
    if (accion == "Ingresar") {
      create();
    } else if (accion == "Update") {
      update();
    }
  }
}

// //ajax create
function create() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_empresa.php",
    data: {
      nombre: $("#nombreEmpresa").val(),
      descripcion: tinyMCE.get("descripcionEmpresa").getContent(),
      direccion: $("#direccionEmpresa").val(),
      telefono: $("#telefonoEmpresa").val(),
      celular: $("#celularEmpresa").val(),
      correo: $("#emailEmpresa").val(),
      pagina: $("#webEmpresa").val(),
      facebook: $("#facebookEmpresa").val(),
      twitter: $("#twitterEmpresa").val(),
      instagram: $("#instagramEmpresa").val(),
      servicio: $("#servicio").val(),
      rubro: $("#rubro").val(),
      estado: $("#estado").val(),
      accion_oculta: "Ingresar",
    },
    success: (result) => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Empresa registrada",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getEmpresa();
        limpiar();
      });
    },
  });
}

// // ajax del update
function update() {
  $.ajax({
    type: "POST",
    url: "../function/ctrl_empresa.php",
    data: {
      id: idEdit,
      nombre: $("#nombreEmpresa").val(),
      descripcion: tinyMCE.get("descripcionEmpresa").getContent(),
      direccion: $("#direccionEmpresa").val(),
      telefono: $("#telefonoEmpresa").val(),
      celular: $("#celularEmpresa").val(),
      correo: $("#emailEmpresa").val(),
      pagina: $("#webEmpresa").val(),
      facebook: $("#facebookEmpresa").val(),
      twitter: $("#twitterEmpresa").val(),
      instagram: $("#instagramEmpresa").val(),
      servicio: $("#servicio").val(),
      rubro: $("#rubro").val(),
      estado: $("#estado").val(),
      accion_oculta: "Actualizar",
    },
    success: function (response) {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Empresa Modificada",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        getEmpresa();
        limpiar();
      });
    },
  });
}

// // ajax delete
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
        url: "../function/ctrl_empresa.php",
        data: { id: id, accion_oculta: "Eliminar" },
        success: function (response) {
          Swal.fire("Guardado!", "", "success");
          getEmpresa();
          limpiar();
        },
        error: () => {
          alert("No se pudo eliminar la empresa");
        },
      });
    }
  });
}
