function validar() {
  if (document.form.nombre.value == "") {
    alert("Debe ingresar el nombre");
    document.form.nombre.focus();
    return false;
  }
  if (document.form.descripcion.value == "") {
    alert("Debe ingresar la descripción");
    document.form.descripcion.focus();
    return false;
  }

  if (document.form.direccion.value == "") {
    alert("Debe ingresar la dirección");
    document.form.direccion.focus();
    return false;
  }
  if (document.form.telefono.value == "") {
    alert("Debe ingresar el teléfono fijo");
    document.form.telefono.focus();
    return false;
  }
  if (document.form.celular.value == "") {
    alert("Debe ingresar el celular");
    document.form.celular.focus();
    return false;
  }
  if (document.form.correo.value == "") {
    alert("Debe ingresar el correo");
    document.form.correo.focus();
    return false;
  }
  if (document.form.pagina.value == "") {
    alert("Debe ingresar el link de la página web");
    document.form.pagina.focus();
    return false;
  }
  if (document.form.facebook.value == "") {
    alert("Debe ingresar el link de la página de facebook");
    document.form.facebook.focus();
    return false;
  }
  if (document.form.twitter.value == "") {
    alert("Debe ingresar el link de la página de twitter");
    document.form.twitter.focus();
    return false;
  }
  if (document.form.instagram.value == "") {
    alert("Debe ingresar el link de la página de instagram");
    document.form.instagram.focus();
    return false;
  }
  if (document.form.servicio.value == 0) {
    alert("Debe seleccionar el servicio");
    document.form.servicio.focus();
    return false;
  }

  if (document.form.rubro.value == 0) {
    alert("Debe seleccionar el rubro");
    document.form.rubro.focus();
    return false;
  }

  if (document.form.estado.value == 2) {
    alert("Debe seleccionar el estado");
    document.form.estado.focus();
    return false;
  }
  return true;
}

function enviar(accion) {
  if (validar()) {
    document.form.accion_oculta.value = accion;
    document.form.submit();
  }
}
