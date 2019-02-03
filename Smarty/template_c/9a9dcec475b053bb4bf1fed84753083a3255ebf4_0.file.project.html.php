<?php
/* Smarty version 3.1.33, created on 2019-02-03 17:19:50
  from 'C:\xampp\htdocs\proiectphp\App\Views\Project\project.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c5714a6db98a2_70586249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9a9dcec475b053bb4bf1fed84753083a3255ebf4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\Project\\project.html',
      1 => 1549209783,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\Shared\\layout_header.html' => 1,
    'file:..\\Shared\\layout_footer.html' => 1,
  ),
),false)) {
function content_5c5714a6db98a2_70586249 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:..\Shared\layout_header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container card mx-auto m-5">
    <div class="card-header">
        <h2 class="text-center"> ADD PROJECT</h2>
    </div>
    <div class="card-body">
        <form action="/project/post" method="post">
            <div class="row form-group">
                <div class="col">
                    <label class="control-label" >Name:</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text"  value="<?php if (isset($_smarty_tpl->tpl_vars['projectError']->value->name)) {
echo $_smarty_tpl->tpl_vars['projectError']->value->name;
}?>" name="name"/>
                </div>
            </div>
            <div class="row form-group">
                <div class="col">
                    <label class="control-label" >Client:</label>
                </div>
                <div class="col">
                    <input class="form-control" type="text"  value="<?php if (isset($_smarty_tpl->tpl_vars['projectError']->value->client)) {
echo $_smarty_tpl->tpl_vars['projectError']->value->client;
}?>" name="client"/>
                </div>
            </div>
            <div class="row form-group float-right">
                    <button class="btn btn-dark mx-auto" type="submit">Add</button>
            </div>

        </form>

    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Client</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projects']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->client;?>
</td>
            <td>
                <a href="project/delete?id=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
" class="btn btn-info btn-lg">
                    <i class="fa fa-trash-o"></i> Delete
                </a>
            </td>
        </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

</div>

<?php $_smarty_tpl->_subTemplateRender('file:..\Shared\layout_footer.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
