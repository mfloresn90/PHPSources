function checkFields() {
  messageError = "";
  if (document.register.username.value == "") {
    messageError += "\n     -  Nombre de usuario";
  }
  if (document.register.t_user.value == "Seleccione uno") {
    messageError += "\n     -  Tipo de usuario";
  }
  if (document.register.email.value == "") {
    messageError += "\n     -  E-mail";
  }
  if (document.register.iduser.value == "") {
    messageError += "\n     -  Identificacion";
  }
  if (document.register.captcha.value == "") {
    messageError += "\n     -  Captcha";
  }
  if (messageError != "") {
    messageError = " * Recuerda que son campos obligatorios:\n" + messageError;
    alert(messageError);
    return false;
  }
  else return true;
}

var testresults
function checkEmail() {
    var str = document.register.email.value
    var filter= /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i
    if (filter.test(str))
        testresults = true
         else{
            alert("\n     -  E-mail invalido")
            testresults = false
         }
         return (testresults)
}

function valida() {
    var resultado = true;
	  resultado = checkFields() && checkEmail();
  	return resultado;
}