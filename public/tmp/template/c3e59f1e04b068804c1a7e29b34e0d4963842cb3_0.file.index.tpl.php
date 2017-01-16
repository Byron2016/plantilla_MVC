<?php
/* Smarty version 3.1.30, created on 2017-01-16 00:01:49
  from "/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587c0d6da99444_72202567',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c3e59f1e04b068804c1a7e29b34e0d4963842cb3' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/index/index.tpl',
      1 => 1484238422,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587c0d6da99444_72202567 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Usuarios</h2>

<?php if (isset($_smarty_tpl->tpl_vars['usuarios']->value) && count($_smarty_tpl->tpl_vars['usuarios']->value)) {?>

<table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>ID</th>
            <th>Usuario</th>
            <th>Role</th>
            <th></th>
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
