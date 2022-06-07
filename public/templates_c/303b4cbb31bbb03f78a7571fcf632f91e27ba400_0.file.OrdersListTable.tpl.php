<?php
/* Smarty version 4.1.0, created on 2022-06-07 02:58:39
  from 'C:\xammp\htdocs\php-shop-app\app\views\OrdersListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629ea2bf038ea8_35342960',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '303b4cbb31bbb03f78a7571fcf632f91e27ba400' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\OrdersListTable.tpl',
      1 => 1654563516,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629ea2bf038ea8_35342960 (Smarty_Internal_Template $_smarty_tpl) {
?><table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Order Number</th>
		<th scope="col">Client</th>
		<th scope="col">Status</th>
		<th scope="col">Options</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'o');
$_smarty_tpl->tpl_vars['o']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['o']->value["order_id"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["first_name"];?>
 <?php echo $_smarty_tpl->tpl_vars['o']->value["last_name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['o']->value["status_name"];?>
</td><td><form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
statusUpdate/<?php echo $_smarty_tpl->tpl_vars['o']->value['order_id'];?>
" method="post"><select class="form-select" aria-label="Change order status" name="status" id=""><?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order_status']->value, 'os');
$_smarty_tpl->tpl_vars['os']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['os']->value) {
$_smarty_tpl->tpl_vars['os']->do_else = false;
?><option value=<?php echo $_smarty_tpl->tpl_vars['os']->value["status_id"];?>
><?php echo $_smarty_tpl->tpl_vars['os']->value["status_name"];?>
</option><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?></select><button type="submit"class="btn btn-success" href= "">Zapisz</button><a class="btn btn-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderView/<?php echo $_smarty_tpl->tpl_vars['o']->value['order_id'];?>
">Podgląd</a></form>&nbsp;</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<?php }
}
