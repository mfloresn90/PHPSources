<?php
session_start();
$cap = 'notEq';
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Verificamos si el captcha es correcto
    if ($_POST['captcha'] == $_SESSION['cap_code']) {
        
		$mensaje= "Captcha Correcto";
        $cap = 'Eq';
    } else {
        $mensaje= "Captcha Incorrecto";
        $cap = '';
    }
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Captcha - PHP | Jquery Easy</title>
        <style type="text/css">
            #form{
                margin:100px;
                width: 350px;
                outline: 5px solid #4A3C31;
                border: 1px solid #4A3C31;
                padding: 10px;
				margin:0 auto;
            }
            #form label{
                font:bold 11px arial;
                color: #565656;
                padding-left: 1px;
            }
            #form label.mandat{color: #f00;}
            #form input[type="text"]{
                height: 30px;
                margin-bottom: 8px;
                padding: 5px;
                font: 12px arial;
                color: #0060a3;
            }
            #form textarea{
                width: 340px;
                height: 80px;
                resize: none;
                margin: 0 0 8px 1px;
                padding: 5px;
                font: 12px arial;
                color: #4A3C31;
            }
            #form img{
                margin-bottom: 8px;
            }
            #form input[type="submit"]{
                background-color: #0064aa;
                border: none;
                color: #fff;
                padding: 5px 8px;
                cursor: pointer;
                font:bold 12px arial;
            }
            .error{
				text-align:center;
				background:#B7F9AC;
				color:#C33;
            }
            .cap_status{
                width: 350px;
                padding: 10px;
                font: 14px arial;
                color: #fff;
                background-color: #10853f;
                display: none;
            }
            .cap_status_error{
                background-color: #bd0808;                
            }
		   .cabecera{
                background: #4A3C31;
                border-bottom: 5px solid #69AD3C;
                margin:-8px 0 0 -8px;
                width: 100%;
			}
           .cabecera img{ 
		        margin:40px 0 0 30px;
		    }

</style>
</head>

<body>
<div class="cabecera"><img src="http://www.jqueryeasy.com/application/views/templates/colorvoid/static/images/logo.gif" /></div>

	
	
	<div style='margin:0 auto'>
	<h4>Captcha con PHP</h4>
	
        <form action="index.php" method="post">
            <div id="form">
                <table border="0" width="100%">
                    <tr>
                        <td colspan="2"><label>Nombres:</label><label class="mandat"> *</label><br/>
                            <input type="text" name="name" id="name"/></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Mensaje:</label><label class="mandat"> *</label><br/>
                            <textarea  name="msg" id="msg"></textarea></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>Ingrese el contenido de la imagen</label><label class="mandat"> *</label></td>
                    </tr>
                    <tr>
                        <td width="60px">                           
                            <input type="text" name="captcha" id="captcha" maxlength="6" size="6"/></td>
                        <td><img src="captcha.php"/></td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Submit" id="submit"/></td>
                        <td></td>
                    </tr>
                </table>
                
            </div>
        </form>
        <p class="error"><?php echo $mensaje; ?></p>
		</div>
		
    </body>
</html>
