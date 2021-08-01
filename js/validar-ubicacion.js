function validar() {
  if (document.form.descripcion.value == "") {
    alert("Debe ingresar la descripcion");
    document.form.descripcion.focus();
    return false;
  }

  if (document.form.latitud.value == "") {
    alert("Debe ingresar la latitud");
    document.form.latitud.focus();
    return false;
  }
  if (document.form.longitud.value == "") {
    alert("Debe ingresar la longitud");
    document.form.longitud.focus();
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

function cancelar(accion) {
  document.form.accion_oculta.value = accion;
  document.form.submit();
}
