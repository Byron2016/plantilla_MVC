<?php
/* Smarty version 3.1.30, created on 2016-10-28 04:23:11
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/post/nuevo.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5812d2afd98d02_14976104',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c40ae8ab37fea77ea89c1f0b1d2bd614f2919a0f' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/post/nuevo.tpl',
      1 => 1477628585,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5812d2afd98d02_14976104 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form id="form1" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
post/nuevo" enctype='multipart/form-data'>
    <input type="hidden" name="guardar" value="1" />
    <p>Titulo:<br />
    <input type="texto" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
"/></p>
    
    <p>Cuerpo:<br />
    <textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['datos']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></p>
    <input type="file" name="imagen"/>
     
      
    <p><input type="submit" class="button" value="Guardar" /></p>
<?php }
}
