<?php
/* Smarty version 3.1.30, created on 2016-10-27 23:43:07
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/ajax/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5812910bde1800_72371830',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed53fb852a896ce39c14666889e1c460cee88cb0' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/ajax/index.tpl',
      1 => 1477611781,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5812910bde1800_72371830 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h2>Ejemplo de AJAX</h2>

<form name="form1" method="post" action="">

    Pais:
    <select id="pais">
        <option values=""> -Seleccione- </option>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['paises']->value, 'p');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['p']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value['pais'];?>
</option>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </select>
    <p></p>
    Ciudad:
    <select id="ciudad"> </select>
    <p></p>
    Ciudad a insertar:
    <input type="text" id="ins_ciudad">
    <input type="button" value="Insertar" id='btn_insertar' >
</form><?php }
}
