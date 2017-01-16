<?php
/* Smarty version 3.1.30, created on 2017-01-16 00:12:55
  from "/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/permisos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587c1007a321d0_53530976',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e37c18c0c656b1129f8c71187f11662f3f747963' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/permisos.tpl',
      1 => 1484238382,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587c1007a321d0_53530976 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Permisos de Usuario</h2>

<p>
    <strong>Usuario:</strong> <?php echo $_smarty_tpl->tpl_vars['xxx']->value['usuario'];?>
 | <strong>Role:</strong> <?php echo $_smarty_tpl->tpl_vars['xxx']->value['role'];?>

</p>


<form name='form1' method='post' action=''>
    <input type="hidden" name="guardar" value ='1'/>

    <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value) && count($_smarty_tpl->tpl_vars['permisos']->value)) {?>
        <table class="table table-bordered table-condensed table-striped">
            <tr>
                <th>Permiso</th>
                <th></th>
            </tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permisos']->value, 'pr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->value) {
?>
                <?php if ($_smarty_tpl->tpl_vars['role']->value[$_smarty_tpl->tpl_vars['pr']->value]['valor'] == 1) {?>
                    <?php $_smarty_tpl->_assignInScope('v', "habilitado");
?>
                <?php } else { ?>
                    <?php $_smarty_tpl->_assignInScope('v', "denegado");
?>
                <?php }?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['permiso'];?>
</td>
                    <td>
                        <select name='perm_<?php echo $_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['id'];?>
'>
                            <option value='x' <?php if ($_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['heredado']) {?> selected='selected' <?php }?>>Heredado(<?php echo $_smarty_tpl->tpl_vars['v']->value;?>
)</option>
                            <option value='1' <?php if (($_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['valor'] == 1 && $_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['heredado'] == '')) {?> selected='selected' <?php }?>>Habilitado</option>
                            <option value='' <?php if (($_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['valor'] == '' && $_smarty_tpl->tpl_vars['usuario']->value[$_smarty_tpl->tpl_vars['pr']->value]['heredado'] == '')) {?> selected='selected' <?php }?>>Denegado</option>
        

                        </select>
                    </td>
                </tr>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </table>

        <p><input type="submit" value="Guardar"></p>
    <?php }?>
</form><?php }
}
