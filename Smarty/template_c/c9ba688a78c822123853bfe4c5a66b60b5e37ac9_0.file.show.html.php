<?php
/* Smarty version 3.1.33, created on 2019-02-03 14:46:33
  from 'C:\xampp\htdocs\proiectphp\App\Views\user\show.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5c56f0b90350f5_01180827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9ba688a78c822123853bfe4c5a66b60b5e37ac9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\proiectphp\\App\\Views\\user\\show.html',
      1 => 1549201586,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:..\\Shared\\layout_header.html' => 1,
    'file:..\\Shared\\layout_footer.html' => 1,
  ),
),false)) {
function content_5c56f0b90350f5_01180827 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender('file:..\Shared\layout_header.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="container card mx-auto m-5">

    <nav class="navbar navbar-light navbar-right bg-light">
        <div class="float-right">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fa fa-plus"></i> ADD
            </button>
        </div>
    </nav>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Entry detail</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <form action="/user/add/post" method="post">
                        <input type="hidden" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['user']->value->id_user;?>
" name="id_user">
                        <div class="form-row">
                            <div class="form-group col-md-10">
                                <label>Description</label>
                                <input type="text" class="form-control" name="description">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Date</label>
                                <input class="form-control" type="date" name="date"/>
                            </div>
                            <div class="form-group col-md-5">
                                <label>Event</label>
                                <select name="id_event" class="form-control">
                                    <option selected>Choose...</option>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['events']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                    <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label>Start</label>
                                <input type="text" class="form-control" name="time_start">
                            </div>
                            <div class="form-group col-md-5">
                                <label>End</label>
                                <input type="text" class="form-control" name="time_finish">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-10">
                            <label>Project</label>
                            <select name="id_project" class="form-control">
                                <option selected>Choose...</option>
                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['projects']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value->name;?>
</option>
                                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                            </select>
                            </div>
                        </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Add</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>


    <table class="table">
        <thead>
        <tr>
            <th scope="col"><i class="fa fa-calendar"></i> Date</th>
            <th scope="col">Start</th>
            <th scope="col">End</th>
            <th scope="col">Event</th>
            <th scope="col">Description</th>
            <th scope="col">Project</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['entries']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->date;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->time_start;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->time_finish;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->evname;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->description;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['item']->value->pname;?>
</td>
            <td>
                <a href="user/delete?id=<?php echo $_smarty_tpl->tpl_vars['item']->value->id;?>
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
