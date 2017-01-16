<?php
/* Smarty version 3.1.30, created on 2017-01-16 00:05:17
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/post/ajax/prueba.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587c0e3dc57fd1_54547678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe32993707888fcac6d152c5b14c7f643e094a44' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/post/ajax/prueba.tpl',
      1 => 1484518678,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587c0e3dc57fd1_54547678 (Smarty_Internal_Template $_smarty_tpl) {
if (isset($_smarty_tpl->tpl_vars['posts']->value) && count($_smarty_tpl->tpl_vars['posts']->value)) {?>
    <table class="table table-bordered table-condensed table-striped">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Pais</th>
            <th>Ciudad</th>
        </tr>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'datos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->value) {
?>
            <tr>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['nombre'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['pais'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['ciudad'];?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </table>
<?php } else { ?>

    <p><strong>No hay posts!</strong></p>

<?php }?>

<?php echo (($tmp = @$_smarty_tpl->tpl_vars['paginacion']->value)===null||$tmp==='' ? '' : $tmp);
}
}
