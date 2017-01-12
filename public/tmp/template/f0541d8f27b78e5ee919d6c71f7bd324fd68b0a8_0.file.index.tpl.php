<?php
/* Smarty version 3.1.30, created on 2017-01-12 00:13:53
  from "/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5876ca416d2239_36183599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f0541d8f27b78e5ee919d6c71f7bd324fd68b0a8' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/index.tpl',
      1 => 1484180030,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5876ca416d2239_36183599 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Usuarios</h2>

<?php if (isset($_smarty_tpl->tpl_vars['usuarios']->value) && count($_smarty_tpl->tpl_vars['usuarios']->value)) {?>

<table>
    <tr>
        <td>ID</td>
        <td>Usuarios</td>
        
        <td>Role</td>
        <td></td>

    </tr>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['usuarios']->value, 'us');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['us']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['us']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['us']->value['usuario'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['us']->value['role'];?>
</td>
            <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/index/permisos/<?php echo $_smarty_tpl->tpl_vars['us']->value['id'];?>
">Permisos</a></td>


        </tr> 
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
<?php }?>

<?php }
}
