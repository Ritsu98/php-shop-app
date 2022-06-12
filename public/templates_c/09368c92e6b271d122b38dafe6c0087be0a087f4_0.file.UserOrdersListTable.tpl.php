<?php
/* Smarty version 4.1.0, created on 2022-06-07 11:38:42
  from 'C:\xammp\htdocs\php-shop-app\app\views\UserOrdersListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629f1ca2695086_05655167',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '09368c92e6b271d122b38dafe6c0087be0a087f4' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\UserOrdersListTable.tpl',
      1 => 1654594353,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629f1ca2695086_05655167 (Smarty_Internal_Template $_smarty_tpl) {
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
</td><td><a class="btn btn-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
orderView/<?php echo $_smarty_tpl->tpl_vars['o']->value['order_id'];?>
">Podgląd</a>&nbsp;</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<?php }
}
