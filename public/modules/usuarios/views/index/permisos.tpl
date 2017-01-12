<h2>Permisos de Usuario</h2>

{foreach  item=us from=$infoa}


<h3>Usuario: {$us.usuario}<br /> Role:{$us.role}</h3>

{/foreach}


<form name='form1' method='post' action=''>
    <input type="hidden" name="guardar" value ='1'/>

    {if isset($permisos) && count($permisos)}
        <table>
            <tr>
                <th>Permiso</th>
                <th></th>
            </tr>
            {foreach item=pr from=$permisos}
                {if $role.$pr.valor == 1}
                    {assign var="v" value="habilitado"}
                {else}
                    {assign var="v" value="denegado"}
                {/if}
                <tr>
                    <td>{$usuario.$pr.permiso}</td>
                    <td>
                        <select name='perm_{$usuario.$pr.id}'>
                            <option value='x' {if $usuario.$pr.heredado} selected='selected' {/if}>Heredado({$v})</option>
                            <option value='1' {if ($usuario.$pr.valor == 1 && $usuario.$pr.heredado == '')} selected='selected' {/if}>Habilitado</option>
                            <option value='' {if ($usuario.$pr.valor == '' && $usuario.$pr.heredado == '')} selected='selected' {/if}>Denegado</option>
        

                        </select>
                    </td>
                </tr>
            {/foreach}
        </table>

        <p><input type="submit" value="Guardar"></p>
    {/if}
</form>