function validar() {
  if (document.form.descripcion.value == "") {
    alert("Debe ingresar la descripcion");
    document.form.descripcion.focus();
    return false;
  }

  if (document.form.galeria.value == 0) {
    alert("Debe seleccionar la galeria");
    document.form.galeria.focus();
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
