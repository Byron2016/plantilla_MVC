<?php
/* Smarty version 3.1.30, created on 2017-01-11 17:24:38
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/error/access.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58766a560fdfa3_88062876',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0b6c2ae40b62ed915caa534a073e359527d9c87e' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/error/access.tpl',
      1 => 1477585368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58766a560fdfa3_88062876 (Smarty_Internal_Template $_smarty_tpl) {
?>

<?php if (isset($_smarty_tpl->tpl_vars['mensaje']->value)) {?>
    <h2><?php echo $_smarty_tpl->tpl_vars['mensaje']->value;?>
</h2>
<?php }?>
<p>&nbsp;</p>

<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
">Ir al Inicio</a> | 
<a href="javascript:history.back(1)">Volver a la p&aacute;gina anterior</a>

<?php if (!Session::get('autenticado')) {?>

|
	<a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
login">Iniciar Ses&iacute;on</a>
<?php }?>

<?php }
}
