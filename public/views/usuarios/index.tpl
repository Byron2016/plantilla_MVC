<h2>Usuarios</h2>

{if isset($usuarios) && count($usuarios)}

<table>
    <tr>
        <td>ID</td>
        <td>Usuarios</td>
        
        <td>Role</td>
        <td></td>

    </tr>

    {foreach  item=us from=$usuarios}
        <tr>
            <td>{$us.id}</td>
            <td>{$us.usuario}</td>
            <td>{$us.role}</td>
            <td><a href="{$_layoutParams.root}usuarios/permisos/{$us.id}">Permisos</a></td>


        </tr> 
    {/foreach}
</table>
{/if}
