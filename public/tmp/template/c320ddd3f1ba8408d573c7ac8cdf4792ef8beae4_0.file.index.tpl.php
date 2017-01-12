<?php
/* Smarty version 3.1.30, created on 2017-01-11 23:58:45
  from "/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/login/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5876c6b5e1eb85_81304168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c320ddd3f1ba8408d573c7ac8cdf4792ef8beae4' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/modules/usuarios/views/login/index.tpl',
      1 => 1477590542,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5876c6b5e1eb85_81304168 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Iniciar Sesi&oacute;n</h2>

<form name="form1" method="post" action="">
    <input type="hidden" value="1" name="enviar" />
    
    <p>
        <label>Usuario: </label>
        <input type="text" name="usuario" value="<?php if (isset($_smarty_tpl->tpl_vars['datos']->value)) {?> <?php echo $_smarty_tpl->tpl_vars['datos']->value['usuario'];?>
 <?php }?>" />
    </p>
    
    <p>
        <label>Password: </label>
        <input type="password" name="pass" />
    </p>
    
    <p>
        <input type="submit" value="enviar" />
    </p>
</form><?php }
}
