<?php
/* Smarty version 3.1.30, created on 2017-01-12 00:11:41
  from "/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/permisos.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5876c9bd7efcf7_80516788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42296bf7fb2bd451b5474f5fc93dde6e34c35007' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/permisos.tpl',
      1 => 1484162776,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5876c9bd7efcf7_80516788 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Permisos de Usuario</h2>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['infoa']->value, 'us');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['us']->value) {
?>


<h3>Usuario: <?php echo $_smarty_tpl->tpl_vars['us']->value['usuario'];?>
<br /> Role:<?php echo $_smarty_tpl->tpl_vars['us']->value['role'];?>
</h3>

<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



<form name='form1' method='post' action=''>
    <input type="hidden" name="guardar" value ='1'/>

    <?php if (isset($_smarty_tpl->tpl_vars['permisos']->value) && count($_smarty_tpl->tpl_vars['permisos']->value)) {?>
        <table>
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
