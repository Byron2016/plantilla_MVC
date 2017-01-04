<?php
/* Smarty version 3.1.30, created on 2017-01-04 18:30:25
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/post/editar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_586d3f41a57422_67096875',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2a814ef80f5bcd2224c3c4d4658dfbb518ac6bc' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/post/editar.tpl',
      1 => 1483554622,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_586d3f41a57422_67096875 (Smarty_Internal_Template $_smarty_tpl) {
echo $_smarty_tpl->tpl_vars['titulo']->value;?>

<form id="form1" method="post" action="">
    <input type="hidden" name="guardar" value="1" />
    <p>Titulo:<br />
    <input type="texto" name="titulo" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['posts']->value['titulo'])===null||$tmp==='' ? '' : $tmp);?>
" /></p>
    
    <p>Cuerpo:<br />
    <textarea name="cuerpo"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['posts']->value['cuerpo'])===null||$tmp==='' ? '' : $tmp);?>
</textarea></p>
    <input type="file" name="imagen"/>
     
    <p><input type="submit" class="button" value="Guardar" /></p>
</form><?php }
}
