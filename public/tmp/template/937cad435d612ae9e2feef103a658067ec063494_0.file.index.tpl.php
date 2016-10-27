<?php
/* Smarty version 3.1.30, created on 2016-10-27 17:28:52
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/post/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_581239549ace82_82544151',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '937cad435d612ae9e2feef103a658067ec063494' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/post/index.tpl',
      1 => 1477586834,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_581239549ace82_82544151 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Últimos Posts</h2>

<?php if (isset($_smarty_tpl->tpl_vars['posts']->value) && count($_smarty_tpl->tpl_vars['posts']->value)) {?>

<table>

    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['posts']->value, 'datos');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['datos']->value) {
?>
    <tr>
        <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['titulo'];?>
</td>
        <td><?php echo $_smarty_tpl->tpl_vars['datos']->value['cuerpo'];?>
</td>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/editar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
">Editar</a></td>
        <td><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/eliminar/<?php echo $_smarty_tpl->tpl_vars['datos']->value['id'];?>
">Eliminar</a></td>
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

<?php if (isset($_smarty_tpl->tpl_vars['paginacion']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['paginacion']->value;
}?>

<?php if (Session::accesoViewEstricto(array('usuario'))) {?>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo">Agregar Post</a></p>
<?php }
}
}
