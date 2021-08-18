function validar() {
  var imgVal = $("#fotos").val();
  if (imgVal == "") {
    alert("Debe subir mínimo 1 foto");
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

$("#fotos").change(function () {
  var ext = this.value.match(/\.(.+)$/)[1];
  switch (ext) {
    case "jpg":
    case "jpeg":
    case "png":
      $("#registrar").attr("disabled", false);
      break;
    default:
      alert("Error: el formato de archivo no es válido.");
      this.value = "";
  }
});
