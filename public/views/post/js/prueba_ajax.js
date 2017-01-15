//$(document).on('ready', function(){
$(document).ready(function() {
	$(".pagina").click(function(){
		//alert($(this).attr('pagina'));
		paginacion($(this).attr('pagina'));
	});
/*
    $(".pagina").live('click', function(){
        paginacion($(this).attr("pagina"));
    });
*/
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