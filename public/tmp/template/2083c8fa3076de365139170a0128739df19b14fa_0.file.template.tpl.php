<?php
/* Smarty version 3.1.30, created on 2017-01-17 02:05:34
  from "/home/vagrant/Proyectos/plantilla_MVC/public/views/layout/twb/template.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_587d7bee3eaa20_27364962',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2083c8fa3076de365139170a0128739df19b14fa' => 
    array (
      0 => '/home/vagrant/Proyectos/plantilla_MVC/public/views/layout/twb/template.tpl',
      1 => 1484617363,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_587d7bee3eaa20_27364962 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title><?php echo (($tmp = @$_smarty_tpl->tpl_vars['titulo']->value)===null||$tmp==='' ? "Sin t&iacute;tulo" : $tmp);?>
</title>
        <meta charset="utf-8">
        <link href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_css'];?>
bootstrap.css" rel="stylesheet" type="text/css">








        <style type="text/css">
        body{
            padding-top: 40px;
            padding-bottom: 40px;            
        }
        </style>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="brand" href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
"><?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_name'];?>
</a>
                
                    <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu'])) {?>
                        <div class="nav-collapse">
                            <ul class="nav">
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_layoutParams']->value['menu'], 'it');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['item']) && $_smarty_tpl->tpl_vars['_layoutParams']->value['item'] == $_smarty_tpl->tpl_vars['it']->value['id']) {?>
                                        <?php $_smarty_tpl->_assignInScope('_item_style', 'active');
?>
                                    <?php } else { ?>
                                        <?php $_smarty_tpl->_assignInScope('_item_style', '');
?>
                                    <?php }?>

                                    <li class="<?php echo $_smarty_tpl->tpl_vars['_item_style']->value;?>
"><a  href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['it']->value['imagen'];?>
"> </i> <?php echo $_smarty_tpl->tpl_vars['it']->value['titulo'];?>
</a></li>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                            
                            <?php if (Session::get('autenticado')) {?>
                                <div class="navbar-form pull-right">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/login/cerrar" class="btn"><i class="icon-fire"> </i> Salir</a>
                                </div>
                            <?php } else { ?>
                                <form class="navbar-form pull-right" method="post" action="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
usuarios/login">
                                    <input type="hidden" value="1" name="enviar">
                                    <input class="span2" name="usuario" type="text" placeholder="Usuario">
                                    <input class="span2" name="pass" type="password" placeholder="Password">
                                    <button type="submit" class="btn">Entrar</button>
                                </form>
                            <?php }?>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
                
        <div style="background: #515151; height: 110px; margin-bottom: 20px; width: 100%;">
            <div class="container">
                <div class="span4" style="height:110px; background: url('<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_img'];?>
logo.png') no-repeat center left"></div>
                <div class="span7"><h2 style="color: #fff; margin-top: 32px;"><?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['configs']['app_slogan'];?>
</h2></div>
            </div>
        </div>
        
        <div class="container" style="background: #fff;">
            <div class="span8">
                <noscript><p>Para el correcto funcionamiento debe tener el soporte para javascript habilitado</p></noscript>
                    
                <?php if (isset($_smarty_tpl->tpl_vars['_error']->value)) {?>
                    <div id="_errl" class="alert alert-error">
                        <a class="close" data-dismiss="alert">x</a>
                        <?php echo $_smarty_tpl->tpl_vars['_error']->value;?>

                    </div>
                <?php }?>

                <?php if (isset($_smarty_tpl->tpl_vars['_mensaje']->value)) {?>
                    <div id="_msgl" class="alert alert-success">
                        <a class="close" data-dismiss="alert">x</a>
                        <?php echo $_smarty_tpl->tpl_vars['_mensaje']->value;?>

                    </div>
                <?php }?>
                <?php $_smarty_tpl->_subTemplateRender($_smarty_tpl->tpl_vars['_contenido']->value, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

            </div>
            
 
            <div class="span3">
                <?php if ($_smarty_tpl->tpl_vars['incluir_widget']->value) {?>
                    <?php if (isset($_smarty_tpl->tpl_vars['widgets']->value['sidebar'])) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['widgets']->value['sidebar'], 'wd');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['wd']->value) {
?>
                            <?php echo $_smarty_tpl->tpl_vars['wd']->value;?>

                        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                    <?php }?>

                <?php } else { ?>
                    <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['menu_right'])) {?>
                        <ul class="nav nav-tabs nav-stacked">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_layoutParams']->value['menu_right'], 'it');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['it']->value) {
?>
                                <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['item']) && $_smarty_tpl->tpl_vars['_layoutParams']->value['item'] == $_smarty_tpl->tpl_vars['it']->value['id']) {?>
                                    <?php $_smarty_tpl->_assignInScope('_style', 'active');
?>
                                <?php } else { ?>
                                    <?php $_smarty_tpl->_assignInScope('_style', '');
?>
                                <?php }?>
                                
                                <li class="<?php echo $_smarty_tpl->tpl_vars['_style']->value;?>
"><a  href="<?php echo $_smarty_tpl->tpl_vars['it']->value['enlace'];?>
"><i class="<?php echo $_smarty_tpl->tpl_vars['it']->value['imagen'];?>
"> </i> <?php echo $_smarty_tpl->tpl_vars['it']->value['titulo'];?>
</a></li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                           
                        </ul>
                    <?php }?>
                <?php }?>
            </div> 
        </div>
        
        <!-- Footer -->
        <div class="navbar navbar-fixed-bottom">
            <div class="navbar-inner">
                <div class="container">
                    <div style="margin-top: 10px; text-align: center;">Copyright&copy; 2012 <a href="http://www.dlancedu.com" target="_blank">www.dlancedu.com</a></div>
                </div>
            </div>
        </div>
            
        <!-- javascript -->
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['ruta_js'];?>
bootstrap.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
public/js/alertifyjs/alertify.js"><?php echo '</script'; ?>
>
        
        

        <?php echo '<script'; ?>
 type="text/javascript">
            var _root_ = '<?php echo $_smarty_tpl->tpl_vars['_layoutParams']->value['root'];?>
'; /*esto nos permite tener la variable disponible para javascript, la llamamos en prueba_ajax.js*/
        <?php echo '</script'; ?>
>
        

        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin']) && count($_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'])) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_layoutParams']->value['js_plugin'], 'plg');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['plg']->value) {
?>
                <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['plg']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
        
        <?php if (isset($_smarty_tpl->tpl_vars['_layoutParams']->value['js']) && count($_smarty_tpl->tpl_vars['_layoutParams']->value['js'])) {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['_layoutParams']->value['js'], 'js');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['js']->value) {
?>
                <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['js']->value;?>
" type="text/javascript"><?php echo '</script'; ?>
>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <?php }?>
    </body>
</html><?php }
}
