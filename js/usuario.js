// cuando se cargue la página se leera esto primero
$(() => {
  getUsers();
});

/*Funcion para recuperar a los usuarios*/
getUsers = () => {
  $.ajax({
    type: "POST",
    url: "../function/usuarioController.php",
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
const tabla = $("#dataTableUsuario").DataTable({
  language: {
    url: "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json",
  },
  aoColumnDefs: [{ bVisible: false, aTargets: [3] }], // oculto la columna de la password
  columns: [
    { data: "idUsuario" },
    { data: "nombreusuario" },
    { data: "usuario" },
    { data: "clave" },
    { data: "fechacreacion" },
    { data: "horacreacion" },

    {
      defaultContent: "estado",
      render: function (data, type, row) {
        if (row.estado == 1) {
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
$("#dataTableUsuario").on("click", "button", function () {
  let data = tabla.row($(this).parents("tr")).data();

  if ($(this)[0].name == "btn_update") {
    cargarDatosEdit(data);
  } else if ($(this)[0].name == "btn_delete") {
    eliminar(data.idUsuario);
  }
});

// carga los datos de la datatable en el formulario
function cargarDatosEdit(data) {
  $("#nombreUsuario").val(data.nombreusuario);
  $("#usuario").val(data.usuario);
  $("#estado").val(data.estado);
  $("#clave").val(data.clave);
  $("#ingresar").hide();
  $("#update").show();
  $("#clave").attr("readonly", true);
  idEdit = data.idUsuario;
}

// cambios en el nombre
$("#nombreUsuario").change(() => {
  let nombre = $("#nombreUsuario").val();
  if (nombre) {
    $("#frm_nombreUsuario > input").removeClass("is-invalid");
  } else {
    $("#frm_nombreUsuario > input").addClass("is-invalid");
  }
});

// cambios en el usuario
$("#usuario").change(() => {
  buscarUsuario();
});

// busca si el usuario ya esta registrado en el sistema
function buscarUsuario() {
  $.ajax({
    type: "POST",
    url: "Controller/usuarioController.php", // ver donde ir en la ruta
    data: { accion_oculta: "buscarUsuario", usuario: $("#usuario").val() },
    success: function (response) {
      // SI NO SE ENCUENTRAN DATOS EN LA BDD
      if (response == 0) {
        $("#frm_usuario > input").removeClass("is-invalid");
      } else if (response == 1) {
        $("#frm_usuario > input").addClass("is-invalid");
        $("#frm_usuario > div").html("Usuario ya se encuentra registrado");
      }
    },
  });
}

// cambios en la clave --> elimino o agrego el css de invalid
$("#clave").change(() => {
  let clave = $("#clave").val();
  if (clave) {
    $("#frm_clave > input").removeClass("is-invalid");
  } else {
    $("#frm_clave > input").addClass("is-invalid");
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
  $("#nombreUsuario").val("");
  $("#usuario").val("");
  $("#clave").val("");
  $("#estado").val("");
  idEdit = 0;
}

// validar campos vacios
function validar() {
  var expRegEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
  //var expRegClave = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,}$/; // minimo una mayuscula, una minuscula mn 8 caracteres y simbolo

  if ($("#nombreUsuario").val() == "") {
    $("#frm_nombreUsuario > input").addClass("is-invalid");
    $("#frm_nombreUsuario > div").html("Nombre es un campo requerido");
    $("#nombreUsuario").focus();

    return false;
  }

  if ($("#usuario").val() == "") {
    $("#frm_usuario > input").addClass("is-invalid");
    $("#frm_usuario > div").html("Usuario es un campo requerido");
    return false;
  } else if (!expRegEmail.exec($("#usuario").val())) {
    $("#frm_usuario > input").addClass("is-invalid");
    $("#frm_usuario > div").html("Formato invalido");
    verificar = false;
    return false;
  }

  if ($("#clave").val() == "") {
    $("#frm_clave > input").addClass("is-invalid");
    $("#frm_clave > div").html("Clave es un campo requerido");
    return false;
  }

  // validar regular del clave
  /*   else if (!expRegClave.exec($('#clave').val())) {
        $('#frm_clave > input').addClass("is-invalid");
        $('#frm_clave > div').html("clave debe ser alfanumerica de minimmo 8 caracteres con al menos una mayuscula y una minuscula ");
        verificar = false;
        return false;
    } */

  if ($("#estado").val() == "") {
    $("#frm_estado > select").addClass("is-invalid");
    $("#frm_estado > div").html("Estado es un campo requerido");
    return false;
  }

  if ($("#estado").val() > 1) {
    $("#frm_estado > select").addClass("is-invalid");
    $("#frm_estado > div").html("Estado es un campo requerido");
    return false;
  }

  if ($("#estado").val() < 0) {
    $("#frm_estado > select").addClass("is-invalid");
    $("#frm_estado > div").html("Estado es un campo requerido");
    return false;
  }

  return true;

  /*  if(correcto){  */

  /* let nombreUsuario = $('#nombreUsuario').val();
    let usuario = $('#usuario').val();
    let clave = $('#clave').val();
    let estado = $('#estado').val();

    data = { nomb: nombreUsuario, usu: usuario, pass: clave, esta: estado }; */
  /*   $('#formUsuario').submit();
  
  } */
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
    url: "../function/usuarioController.php",
    data: {
      nombre: $("#nombreUsuario").val(),
      usuario: $("#usuario").val(),
      clave: $("#clave").val(),
      estado: $("#estado").val(),
      accion_oculta: "Ingresar",
    },
    success: function (response) {
      getUsers();
      limpiar();
    },
  });
}

// ajax del update
function update() {
  $.ajax({
    type: "POST",
    url: "../function/usuarioController.php",
    data: {
      id: idEdit,
      nombre: $("#nombreUsuario").val(),
      usuario: $("#usuario").val(),
      clave: $("#clave").val(),
      estado: $("#estado").val(),
      accion_oculta: "Update",
    },
    success: function (response) {
      getUsers();
      limpiar();
    },
  });
}

// ajax delete
function eliminar(id) {
  $.ajax({
    type: "POST",
    url: "../function/usuarioController.php",
    data: { id: id, accion_oculta: "Eliminar" },
    success: function (response) {
      getUsers();
      limpiar();
    },
    error: () => {
      alert("no se pudo eliminar el usuario");
    },
  });
}
