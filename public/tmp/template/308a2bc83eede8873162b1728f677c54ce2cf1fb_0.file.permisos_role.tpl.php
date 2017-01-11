<?php
/* Smarty version 3.1.30, created on 2017-01-11 17:21:49
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/acl/permisos_role.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587669ad6e24d9_24056210',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '308a2bc83eede8873162b1728f677c54ce2cf1fb' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/acl/permisos_role.tpl',
      1 => 1483565337,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587669ad6e24d9_24056210 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Administración de permisos role</h2>

<h3>Role: <?php echo $_smarty_tpl->tpl_vars['role']->value['role'];?>
</h3>

<p>Permisos</p>

<form name='form1' method='post' action=''>
	<input type="hidden" name="guardard" value ='1'/>

	<?php if (isset($_smarty_tpl->tpl_vars['permisos']->value) && count($_smarty_tpl->tpl_vars['permisos']->value)) {?>
		<table>
			<tr>
				<th>Permiso</th>
				<th>Habilitado</th>
				<th>Denegado</th>
				<th>Ignorar</th>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['permisos']->value, 'pr');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pr']->value) {
?>
				<tr>
					<td><?php echo $_smarty_tpl->tpl_vars['pr']->value['nombre'];?>
</td>
					<td>
					<input type="radio" name="perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
" value="1" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor'] == 1)) {?>checked='checked'<?php }?>/></td>
					<td><input type="radio" name='perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
' value="" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor'] == '')) {?>checked='checked'<?php }?>/></td>
					<td><input type="radio" name='perm_<?php echo $_smarty_tpl->tpl_vars['pr']->value['id'];?>
' value="x" <?php if (($_smarty_tpl->tpl_vars['pr']->value['valor'] === 'x')) {?>checked='checked'<?php }?>/>
					</td>
				</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
	<?php }?>
	<p><input type="submit" value="Guardar"></p>

</form>

<?php }
}
