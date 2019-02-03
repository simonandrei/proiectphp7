<?php
/* Smarty version 3.1.33, created on 2019-01-28 22:43:11
  from 'C:\xampp\htdocs\proiectphp\App\Views\user\uploadImages.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4f776f241583_34002518',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37e941c96e7f7fb6cf55f6519c78277c3ca893cd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\user\\uploadImages.html',
      1 => 1548711785,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\Shared\\layout_header.html' => 1,
    'file:..\\Shared\\layout_footer.html' => 1,
  ),
),false)) {
function content_5c4f776f241583_34002518 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:..\Shared\layout_header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['images']->value, 'foo');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['foo']->value) {
echo $_smarty_tpl->tpl_vars['currentDateTime']->value;?>

<img src="http://localhost:5050/proiectphp/images/<?php echo $_smarty_tpl->tpl_vars['foo']->value->picture_name;?>
.jpg" width="40" height="40">
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

<form action="uploadImages/post" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="text" name="slideShowId">
    <input type="text" name="partOfSlideShow">
    <input type="submit" value="Submit" name="submit">
</form>

<img src="http://localhost:5050/proiectphp/images/1.jpg" width="40" height="40">

<?php $_smarty_tpl->_subTemplateRender('file:..\Shared\layout_footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
