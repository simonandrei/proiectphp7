<?php
/* Smarty version 3.1.33, created on 2019-01-27 15:30:54
  from 'C:\xampp\htdocs\proiectphp\App\Views\user\edit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c4dc09e6f9096_81625165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'acbf1d3680929c67c16105de87ac1986905cda26' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\user\\edit.html',
      1 => 1548599280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\Shared\\layout_header.html' => 1,
    'file:..\\Shared\\layout_footer.html' => 1,
  ),
),false)) {
function content_5c4dc09e6f9096_81625165 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:..\Shared\layout_header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container">
    Update Profile

    <form action="/user/edit/post" method="post">
        <div class="row form-group">
            <div class="col">
                <label >UserName</label>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="username"  value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->username)) {
echo $_smarty_tpl->tpl_vars['user']->value->username;
}?>"/>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label>FirstName</label>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="firstname"  value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->firstname)) {
echo $_smarty_tpl->tpl_vars['user']->value->firstname;
}?>"/>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label>LastName</label>
            </div>
            <div class="col">
                <input class="form-control" type="text" name="lastname" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->lastname)) {
echo $_smarty_tpl->tpl_vars['user']->value->lastname;
}?>"/>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label >birthday</label>
            </div>
            <div class="col-sm-5">
                <input class="form-control" type="date" name="birthday" required  value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->birthday)) {
echo $_smarty_tpl->tpl_vars['user']->value->birthday;
}?>"/>
            </div>
        </div>

        <div class="row form-group">
            <div class="col">
                <label>Gender</label>
            </div>

            <div class="col">
                <label>Male</label> <input class="form-control" type="radio" name="gender"  value="1" <?php if (isset($_smarty_tpl->tpl_vars['user']->value->gender) && $_smarty_tpl->tpl_vars['user']->value->gender == 1) {?> checked  <?php }?> />
            </div>
            <div class="col">
                <label>Female</label> <input class="form-control" type="radio" name="gender" value="2" <?php if (isset($_smarty_tpl->tpl_vars['user']->value->gender) && $_smarty_tpl->tpl_vars['user']->value->gender == 2) {?> checked  <?php }?>  />
            </div>

        </div>

        <button class="btn btn-info" type="submit"> Update profile</button>
    </form>

    <?php if (isset($_smarty_tpl->tpl_vars['session_errors']->value)) {?>
    <div class="alert alert-danger">
        <?php echo $_smarty_tpl->tpl_vars['session_errors']->value;?>

    </div>
    <?php }?>

</div>

<?php $_smarty_tpl->_subTemplateRender('file:..\Shared\layout_footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
