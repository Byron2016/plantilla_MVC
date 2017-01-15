/*
Antes meter filtros
$(document).ready(function() {
	$(".pagina").click(function(){
		//alert($(this).attr('pagina'));
		paginacion($(this).attr('pagina'));
	});

    $( document ).on( "click", ".pagina", function() {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function(pagina){
        var pagina = 'pagina=' + pagina;
        //alert('Dentro var paginacion ' + pagina);
        
        $.post(_root_ + 'post/pruebaAjax', pagina, function(data){
            $("#lista_registros").html('');
            $("#lista_registros").html(data);
        });
    }
});

*/

/*

con filtros

*/
$(document).ready(function() {

    $( document ).on( "click", ".pagina", function() {
        paginacion($(this).attr("pagina"));
    });

    var paginacion = function(pagina){
        var pagina = 'pagina=' + pagina;
        var nombre = '&nombre=' + $('#nombre').val();
        var pais   = '&pais=' + $('#pais').val();
        var ciudad = '&ciudad=' + $('#ciudad').val();
        var registros = '&registros=' + $('#registros').val();
        
        $.post(_root_ + 'post/pruebaAjax', pagina + nombre + pais + ciudad + registros, function(data){
            $("#lista_registros").html('');
            $("#lista_registros").html(data);
        });
    }

    $('#pais').change(function(){
        $.ajax({
            url     : _root_ + '/ajax/getCiudades',
            type    : "post",
            dataType: "json",
            data    : 'pais=' + $("#pais").val(),
            success : function( datos ) {
                $("#ciudad").html('<option value=""> - Seleccione un país - </option>');
                for(var i = 0; i < datos.length; i++){
                    $("#ciudad").append('<option value="' + datos[i].id + '">' + datos[i].ciudad + '</option>');
                }
            }
        });

        $('#ciudad').val()='';
        paginacion();
    });

    $('#btnEnviar').click(function(){
        paginacion();

    });

    $('#ciudad').change(function(){
        if($('#ciudad').val()){
            paginacion()
        };
    });

    $( document ).on( "click", "#registros", function() {
        paginacion();
    });
});
