$(function(){

	var valor, contador, parrafo;
	
	$('<p class="indicador">Tienes 150 caracteres restantes</p>').appendTo('#contador');	
	
	$('#concept').keydown(function(){
	
		contador = 150;
		$('.advertencia').remove();
		$('.indicador').remove();
		
		valor = $('#concept').val().length;
		contador = contador - valor;
		
		if(contador < 0) {
			parrafo = '<p class="advertencia">';
		}
		else {
			parrafo = '<p class="indicador">';
		}
		
		$('#contador').append(parrafo + 'Tienes ' + contador + ' caracteres restantes</p>');
	
	});
	
	
});