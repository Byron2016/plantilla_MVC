<?php
/* Smarty version 3.1.30, created on 2017-01-17 02:05:52
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/post/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587d7c00e6cb41_10384693',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f8f4bf97e4cecbeda8321d12422f9c560ce7f3e' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/post/index.tpl',
      1 => 1484237552,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587d7c00e6cb41_10384693 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Últimos Posts</h2>

<?php if (isset($_smarty_tpl->tpl_vars['posts']->value) && count($_smarty_tpl->tpl_vars['posts']->value)) {?>

<table class="table table-bordered table-condensed table-striped">

    <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Cuerpo</th>
        <th>Imagen</th>
         
        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('editar_post')) {?>
            <th></th>
        <?php }?>
        <?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('eliminar_post')) {?>
            <th></th>
        <?php }?>
    </tr>

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
        <td>
        <?php if (isset($_smarty_tpl->tpl_vars['datos']->value['imagen'])) {?>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/post/<?php echo $_smarty_tpl->tpl_vars['datos']->value['imagen'];?>
">
            <img src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/img/post/thumb/thumb_<?php echo $_smarty_tpl->tpl_vars['datos']->value['imagen'];?>
" />
            </a>
        <?php }?>
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


<?php if ($_smarty_tpl->tpl_vars['_acl']->value->permiso('nuevo_post')) {?>
    <p><a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo">Agregar Post</a></p>
<?php }?>

<?php }
}
