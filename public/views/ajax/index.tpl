<h2>Ejemplo de AJAX</h2>

<form name="form1" method="post" action="">

    Pais:
    <select id="pais">
        <option values=""> -Seleccione- </option>
        {foreach from=$paises item=p}
            <option value="{$p.id}">{$p.pais}</option>
        {/foreach}
    </select>
    <p></p>
    Ciudad:
    <select id="ciudad"> </select>
    <p></p>
    Ciudad a insertar:
    <input type="text" id="ins_ciudad">
    <input type="button" value="Insertar" id='btn_insertar' >
</form>