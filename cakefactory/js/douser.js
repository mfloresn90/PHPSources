function checkFields() {
  messageError = "";
  if (document.upser.name.value == "") {
    messageError += "\n     -  Nombre";
  }
  if (document.upser.lastname.value == "") {
    messageError += "\n     -  Apellidos";
  }
  if (document.upser.address.value == "") {
    messageError += "\n     -  Direccion";
  }
  if (document.upser.phone.value == "") {
    messageError += "\n     -  Telefono";
  }
  if (messageError != "") {
    messageError = " * Recuerda que todos los campos son obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

function valida() {
    var resultado = true;
	  resultado = checkFields();
  	return resultado;
}