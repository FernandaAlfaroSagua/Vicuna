// cuando se cargue la página se leera esto primero
$(() => {
  numEmpresa();
  actEmpresa();
  inactEmpresa();
  numPunto();
  actPunto();
  inactPunto();
  numUser();
  actUser();
  inactUser();
});

/*Funcion para recuperar el total de empresas*/
numEmpresa = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "numEmpresa" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#numEmp").html(result);
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

/*Funcion para recuperar el total de empresas con estado activo*/
actEmpresa = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "actEmpresa" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#actEmp").html(result);
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

/*Funcion para recuperar el total de empresas con estado inactivo*/
inactEmpresa = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "inactEmpresa" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#inactEmp").html(result);
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

/*Funcion para recuperar el total de punto de interes*/
numPunto = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "numPunto" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#numPunto").html(result);
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

/*Funcion para recuperar el total de punto de interes con estado activo*/
actPunto = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "actPunto" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#actPunto").html(result);
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

/*Funcion para recuperar el total de pruntos de interes con estado inactivo*/
inactPunto = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "inactPunto" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#inactPunto").html(result);
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

/*Funcion para recuperar el total de usuarios*/
numUser = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "numUser" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#numUser").html(result);
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

/*Funcion para recuperar el total de usuarios con estado activo*/
actUser = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "actUser" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#actUser").html(result);
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

/*Funcion para recuperar el total de usuarios con estado inactivo*/
inactUser = () => {
  $.ajax({
    type: "POST",
    url: "../function/cargar_portal.php",
    data: { accion_oculta: "inactUser" },
    crossOrigin: false,
    dataType: "json",
    success: (result) => {
      $("#inactUser").html(result);
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
