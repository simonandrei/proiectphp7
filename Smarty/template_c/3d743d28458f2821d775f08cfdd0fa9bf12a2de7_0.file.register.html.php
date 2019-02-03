<?php
/* Smarty version 3.1.33, created on 2019-02-02 16:57:40
  from 'C:\xampp\htdocs\proiectphp\App\Views\Account\register.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c55bdf4a9f811_85500054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3d743d28458f2821d775f08cfdd0fa9bf12a2de7' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\Account\\register.html',
      1 => 1549122433,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\Shared\\layout_header.html' => 1,
    'file:..\\Shared\\layout_footer.html' => 1,
  ),
),false)) {
function content_5c55bdf4a9f811_85500054 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:..\Shared\layout_header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container card mx-auto m-5">
    <div class="card-header">
       <h2 class="text-center"> REGISTER </h2>
    </div>
    <div class="card-body">
    <form action="/register/post" method="post">
    <div class="row form-group">
        <div class="col">
            <label class="control-label" >Username</label>
        </div>
        <div class="col">
            <input class="form-control" type="text"  value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->username)) {
echo $_smarty_tpl->tpl_vars['user']->value->username;
}?>" name="username"/>
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label class="control-label">FirstName</label>
        </div>
        <div class="col">
            <input class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->firstname)) {
echo $_smarty_tpl->tpl_vars['user']->value->firstname;
}?>" type="text" name="firstname"/>
        </div>
    </div>
    <div class="row form-group">
        <div class="col">
            <label class="control-label" >LastName</label>
        </div>
        <div class="col">
            <input class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->lastname)) {
echo $_smarty_tpl->tpl_vars['user']->value->lastname;
}?>" type="text" name="lastname"/>
        </div>
    </div>


    <div class="row form-group">
        <div class="col">
            <label class="control-label">Email</label>
        </div>
        <div class="col">
            <input class="form-control" type="email" name="email" required value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->email)) {
echo $_smarty_tpl->tpl_vars['user']->value->email;
}?>"/>
        </div>
    </div>

    <div class="row form-group">
        <div class="col">
            <label class="control-label"> Password</label>
        </div>
        <div class="col">
            <input class="form-control" type="password" name="password" required minlength=6 />
        </div>
    </div>

    <div class="row form-group">
        <div class="col">
            <label class="control-label"> RepeatPassword</label>
        </div>
        <div class="col">
            <input class="form-control" type="password" name="repeatpassword" required minlength=6 />
        </div>
    </div>

    <div class="row form-group">
        <div class="col">Gender</div>
        <div class="col">
       <label>Male</label>  <input class="" type="radio" name="gender"  value="1" <?php if (isset($_smarty_tpl->tpl_vars['user']->value->gender) && $_smarty_tpl->tpl_vars['user']->value->gender == 1) {?> checked  <?php }?> />
       <label>Female</label> <input class="" type="radio" name="gender" value="2" <?php if (isset($_smarty_tpl->tpl_vars['user']->value->gender) && $_smarty_tpl->tpl_vars['user']->value->gender == 2) {?> checked  <?php }?>  />
        </div>
        </div>
        <div class="row form-group">
            <div class="col">
                <label class="control-label"> Birthday</label>
            </div>
            <div class="col">
        <input class="form-control" type="date" name="birthday" value="<?php if (isset($_smarty_tpl->tpl_vars['user']->value->birthday)) {
echo $_smarty_tpl->tpl_vars['user']->value->birthday;
}?>" required />
    </div>
        </div>
    <button class="btn btn-dark mx-auto" type="submit"> Sign in </button>
</form>

    <?php if (isset($_smarty_tpl->tpl_vars['session_errors']->value)) {?>
    <div class="alert alert-danger">
        <?php echo $_smarty_tpl->tpl_vars['session_errors']->value;?>

    </div>
    <?php }?>

</br>
<div > If you are allready reagistered please login <a href="login"> aici </a> </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender('file:..\Shared\layout_footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
