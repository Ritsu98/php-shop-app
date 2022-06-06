<?php
/* Smarty version 4.1.0, created on 2022-06-07 01:44:02
  from 'D:\xammp\htdocs\php-shop-app\app\views\OrdersListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e914245c4b0_29812238',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9b87a94c175fcafab842642ca58095a33fb425d' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\OrdersListTable.tpl',
      1 => 1654559036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e914245c4b0_29812238 (Smarty_Internal_Template $_smarty_tpl) {
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
orderShow/<?php echo $_smarty_tpl->tpl_vars['p']->value['product_id'];?>
">Podgląd</a></form>&nbsp;</td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<?php }
}
