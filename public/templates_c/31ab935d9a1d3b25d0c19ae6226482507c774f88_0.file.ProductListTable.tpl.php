<?php
/* Smarty version 4.1.0, created on 2022-06-06 12:36:50
  from 'D:\xammp\htdocs\php-shop-app\app\views\ProductListTable.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629dd8c283a9c0_80727118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '31ab935d9a1d3b25d0c19ae6226482507c774f88' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\ProductListTable.tpl',
      1 => 1654500688,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629dd8c283a9c0_80727118 (Smarty_Internal_Template $_smarty_tpl) {
?><table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Name</th>
		<th scope="col">Price</th>
		<th scope="col">Category</th>
		<th scope="col">Options</th>
	</tr>
</thead>
<tbody>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
<tr><td><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["prize"];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['p']->value["category_name"];?>
</td><td><a class="btn btn-secondary" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productEdit/<?php echo $_smarty_tpl->tpl_vars['p']->value['product_id'];?>
">Edytuj</a>&nbsp;<a class="btn btn-danger" href= "<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
productDelete/<?php echo $_smarty_tpl->tpl_vars['p']->value['product_id'];?>
">Usuń</a></td></tr>
<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</tbody>
</table>
<?php }
}
