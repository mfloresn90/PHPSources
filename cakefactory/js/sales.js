function checkFields() {
  messageError = "";
  if (document.sales.product.value == "0") {
    messageError += "\n     -  Producto";
  }
  if (document.sales.cantidad.value == "") {
    messageError += "\n     -  Cantidad";
  }
  if (document.sales.cantent.value == "") {
    messageError += "\n     -  Cantidad entregada";
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
/******************************************************************************************/
function checkFields1() {
  messageError = "";
  if (document.updatepass.oldpass.value == "") {
    messageError += "\n     -  Antigua Contrasena";
  }
  if (document.updatepass.newpass.value == "") {
    messageError += "\n     -  Contrasena nueva";
  }
  if (document.updatepass.reppass.value == "") {
    messageError += "\n     -  Repetir contrasena";
  }
  if (document.updatepass.reppass.value != document.updatepass.newpass.value) {
    messageError += "\n     -  Las contrasenas no son iguales, intentalo de nuevo";
  }
  if (messageError != "") {
    messageError = " * Recuerda que todos los campos son obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

function valida1() {
    var resultado1 = true;
	  resultado1 = checkFields1();
  	return resultado1;
}