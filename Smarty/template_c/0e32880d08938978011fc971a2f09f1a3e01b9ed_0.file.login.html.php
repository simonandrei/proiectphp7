<?php
/* Smarty version 3.1.33, created on 2019-01-28 18:12:38
  from 'C:\xampp\htdocs\proiectphp\App\Views\Account\login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4f38067e0df0_40970868',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0e32880d08938978011fc971a2f09f1a3e01b9ed' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\Account\\login.html',
      1 => 1548695551,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\Shared\\layout_header.html' => 1,
    'file:..\\Shared\\layout_footer.html' => 1,
  ),
),false)) {
function content_5c4f38067e0df0_40970868 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:..\Shared\layout_header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container card mx-auto m-5">
    <div class="card-header">
        <h2 class="text-center"> LOGIN </h2>
    </div>
    <div class="card-body">
    <form action="/login/post" method="post">

        <div class="row form-group">
            <div class="col">
                <label>Email </label>
            </div>
            <div class="col">
                <input class="form-control" type="email" name="email" required placeholder="email"/>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label> Password</label>
            </div>
            <div class="col">
                <input class="form-control" type="password" name="password" required minlength=6 />
            </div>
        </div>

        <?php if (isset($_smarty_tpl->tpl_vars['session_errors']->value)) {?>
        <div class="alert alert-danger">
            <?php echo $_smarty_tpl->tpl_vars['session_errors']->value;?>

        </div>
        <?php }?>

        <button class="btn btn-dark" type="submit"> Login in </button>
    </form>
</div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:..\Shared\layout_footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
