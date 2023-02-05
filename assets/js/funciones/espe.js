$(function(){

	// Lista de docente
	$.post( '../../vista/funciones/espe.php' ).done( function(respuesta)
	{
		$( '#espe' ).html( respuesta );
	});
	
	
	// Lista de Ciudades
	$( '#espe' ).change( function()
	{
		var el_continente = $(this).val();
		// Lista de Paises
		$.post( '../../vista/funciones/doc.php', { continente: el_continente} ).done( function( respuesta )
		{
			$( '#doc' ).html( respuesta );
		});
		
		
	});

$( '#doc' ).change( function()
	{
		var pais = $(this).val();
		
		$.post( '../../vista/funciones/hora.php', { paises: pais} ).done( function( respuesta )
		{
			$( '#hora' ).html( respuesta );
		});	
		
	});

})
