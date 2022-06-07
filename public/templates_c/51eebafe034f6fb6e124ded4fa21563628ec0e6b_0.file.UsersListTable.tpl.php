<?php
/* Smarty version 4.1.0, created on 2022-06-07 04:27:54
  from 'C:\xammp\htdocs\php-shop-app\app\views\UsersListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629eb7aa5b7834_01723680',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51eebafe034f6fb6e124ded4fa21563628ec0e6b' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\UsersListTable.tpl',
      1 => 1654568866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629eb7aa5b7834_01723680 (Smarty_Internal_Template $_smarty_tpl) {
?><table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Login</th>
		<th scope="col">Client</th>
		<th scope="col">Role</th>
		<th scope="col">Options</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'u');
$_smarty_tpl->tpl_vars['u']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['u']->value) {
$_smarty_tpl->tpl_vars['u']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['u']->value["login"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["first_name"];?>
 <?php echo $_smarty_tpl->tpl_vars['u']->value["last_name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['u']->value["name"];?>
</td><td><form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
roleUpdate/<?php echo $_smarty_tpl->tpl_vars['u']->value['client_id'];?>
" method="post"><select class="form-select" aria-label="Change user role" name="role" id=""><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['role_list']->value, 'rl');
$_smarty_tpl->tpl_vars['rl']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['rl']->value) {
$_smarty_tpl->tpl_vars['rl']->do_else = false;
?><option value=<?php echo $_smarty_tpl->tpl_vars['rl']->value["role_id"];?>
><?php echo $_smarty_tpl->tpl_vars['rl']->value["name"];?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><button type="submit"class="btn btn-success" href= "">Zapisz</button></form>&nbsp;</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<?php }
}
