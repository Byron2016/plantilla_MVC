var x;
x=$(document);
x.ready(inicializarEventos);

function inicializarEventos()
{
  var x;
  x=$('#pais');
  x.change(cambioSelect);
  $('#btn_insertar').click(function(){
  	$.post('/ajax/insertarCiudad','pais=' + $('#pais').val() + '&ciudad' + $('#ins_ciudad').val()); 
  	$('#ins_ciudad').val('');
  	//getCiudadesNuevo();
  });
}

function cambioSelect()
{
	var v = $('#pais').val();

	if(!$('#pais').val()){
		$('#ciudad').html('');
	} else {
		getCiudadesNuevo();
	}
}

function getCiudadesNuevo()
{
	var v=$("#pais").val();
	$.post('/ajax/getCiudades','pais=' + $('#pais').val(),llegadaDatos,'json'); 

}

function llegadaDatos(datos)
{
  	//alert("Data: " + datos + "\nStatus: " + status);

  	var cantDatos = datos.length;
  	$('#ciudad').html('');
  	
	for(var i=0; i< datos.length; i++){
		$('#ciudad').append('<option value="' + datos[i].id + '">' + datos[i].ciudad + '</option>');
	}
	

}
/*
$(document).ready(function(){
	var getCiudades = function(){

		$.post('/plantilla_mvc.net/ajax/getCiudades','pais=' + $('#pais').val(),function(datos, status){
			alert("Data: " + datos + "\nStatus: " + status);
			$('#ciudad').html('');
			for(var i=0; i< datos.length; i++){
				$('#ciudad').append('<option value="' + datos[i].id + '">' + datos[i].ciudad + '</option>');
			}
		},'json');
	}


		//programación del evento

	$('#pais').change(function(){
		//validacion para cuando se selecciona un pais sin valor
		if(!$('#pais').val()){
			$('#ciudad').html('');
		} else {
			getCiudades();
		}
	});
});
*/
		//llena select de las ciudades dependiendo del pais seleccionado
		//1ro. url a donde va a mandar los datos
		//2do. variables enviadas por post (.val devuelve valor seleccionado en select)
		//3ro. parametro datos, es donde van a estar contenidos los datos
		//     limpia el select de ciudad: html()
		//     
		//4to. queremos q lo devuelto sea json

		