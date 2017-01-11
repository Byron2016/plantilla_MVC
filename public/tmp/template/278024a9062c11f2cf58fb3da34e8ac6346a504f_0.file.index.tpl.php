<?php
/* Smarty version 3.1.30, created on 2017-01-11 17:21:11
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/acl/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587669878ca0d1_17775846',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '278024a9062c11f2cf58fb3da34e8ac6346a504f' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/acl/index.tpl',
      1 => 1478057990,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587669878ca0d1_17775846 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Listas de Acceso</h2>

<ul>
    <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/roles">Roles</a>
    </li>
    <li>
        <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
acl/permisos">Permisos</a>
    </li>
</ul>
<?php }
}
