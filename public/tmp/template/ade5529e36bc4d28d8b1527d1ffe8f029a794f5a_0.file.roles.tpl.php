<?php
/* Smarty version 3.1.30, created on 2017-01-04 19:51:37
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/acl/roles.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_586d5249b2ce26_27551198',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ade5529e36bc4d28d8b1527d1ffe8f029a794f5a' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/acl/roles.tpl',
      1 => 1483559495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586d5249b2ce26_27551198 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Administración de roles</h2>
<?php if (isset($_smarty_tpl->tpl_vars['roles']->value) && count($_smarty_tpl->tpl_vars['roles']->value)) {?>
	<table>
		<tr>
			<th>ID</th>
			<th>Role</th>
			<th></th>
			<th></th>
		</tr>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roles']->value, 'rl');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['rl']->value) {
?>
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rl']->value['role'];?>
</td>
				<td>
					<a href='<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos_role/<?php echo $_smarty_tpl->tpl_vars['rl']->value['id_role'];?>
'>Permisos</a>
				</td>
				<td>Editar</td>
			</tr>
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</table>
<?php }?>

<p><a href='<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/nuevo_role'>Agregar Role</a></p>
<?php }
}
