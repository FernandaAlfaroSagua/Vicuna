//cuando hago click en el boton del login
$("#ingresar").click(function () {
  usuario = $("#usuario").val();
  clave = $("#clave").val();
  login();
});

//funcion para limpiar los inputs
function limpiar() {
  $("#usuario").val("");
  $("#clave").val("");
}

// revisa si se encuentra registrado
function login() {
  $.ajax({
    type: "POST",
    url: "../function/loginController.php",
    data: {
      accion: "buscarUsuario",
      usuario: $("#usuario").val(),
      clave: $("#clave").val(),
    },
    success: (response) => {
      let $res = JSON.parse(response);
      // SI NO SE ENCUENTRAN DATOS EN LA BDD
      if ($res == 0) {
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Error al igresar",
          showConfirmButton: false,
          timer: 1000,
        }),
          $("#frm_usuario > input").addClass("is-invalid");
        $("#frm_clave > input").addClass("is-invalid");
        $("#frm_button > div").html("Credenciales incorrectas");
        limpiar();
      } else if ($res == 1) {
        cargarInicio();
      }
    },
  });
}

// carga al inicio correspondiente
function cargarInicio() {
  $.ajax({
    type: "POST",
    url: "../function/loginController.php",
    data: {
      accion: "cargarInicio",
    },
    success: (response) => {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Bienvenido",
        showConfirmButton: false,
        timer: 1500,
      }).then(() => {
        window.location = response;
      });
    },
  });
}

// cambios en el usuario
$("#usuario").change(() => {
  let usuario = $("#usuario").val();
  if (usuario) {
    $("#frm_usuario > input").removeClass("is-invalid");
  } else {
    $("#frm_usuario > input").addClass("is-invalid");
  }
});

// cambios en la clave
$("#clave").change(() => {
  let clave = $("#clave").val();
  if (clave) {
    $("#frm_clave > input").removeClass("is-invalid");
  } else {
    $("#frm_clave > input").addClass("is-invalid");
  }
});
