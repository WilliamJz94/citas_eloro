$(function(){

	// Lista de docente
	$.post( '../../vista/funciones/horario.php' ).done( function(respuesta)
	{
		$( '#horario' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#horario' ).change( function()
	{
		var el_continente = $(this).val();
		
		
	});



})
