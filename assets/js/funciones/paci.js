$(function(){

	// Lista de docente
	$.post( '../../vista/funciones/paci.php' ).done( function(respuesta)
	{
		$( '#paci' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#paci' ).change( function()
	{
		var el_continente = $(this).val();
		
		
		
	});



})
