<?php
/* Smarty version 4.1.0, created on 2022-06-07 02:32:54
  from 'C:\xammp\htdocs\php-shop-app\app\views\Cart.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e9cb629c153_99648158',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '44a20cd575bed19c0db35abe169856df0602a121' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\Cart.tpl',
      1 => 1654561448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e9cb629c153_99648158 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1617493956629e9cb6271da1_45886256', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_1617493956629e9cb6271da1_45886256 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1617493956629e9cb6271da1_45886256',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="h-100" style="background-color: #eee;">
    <div class="container h-100 py-5">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-10">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>

                </div>

                <div class="card rounded-3 mb-4">

                    <div class="card-body p-4">
                        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>

                                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                                    <h1><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</h1>
                                <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>

                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['cart']->value != 0) {?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'item', false, 'keys');
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keys']->value => $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
?>
                        <div class="row d-flex justify-content-between align-items-center">
                            <div class="col-md-2 col-lg-2 col-xl-2">
                                <img
                                        src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-shopping-carts/img1.webp"
                                        class="img-fluid rounded-3" alt="">
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-3">
                                <p class="lead fw-normal mb-2"><?php echo $_smarty_tpl->tpl_vars['item']->value["name"];?>
</p>
                            </div>
                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input id="form1" min="0" name="quantity" value=<?php echo $_smarty_tpl->tpl_vars['item']->value["quantity"];?>
 type="number"
                                       class="form-control form-control-sm" />

                                <button class="btn btn-link px-2"
                                        onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0"><?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value["quantity"];
$_prefixVariable1 = ob_get_clean();
echo $_smarty_tpl->tpl_vars['item']->value["price"]*$_prefixVariable1;?>
 zł</h5>
                            </div>
                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                <a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
deleteFromCart/<?php echo $_smarty_tpl->tpl_vars['keys']->value;?>
" class="text-danger"><i class="fas fa-trash fa-lg"> Remove</i></a>
                            </div>

                        </div>
                            <input type="text" hidden value=<?php echo $_smarty_tpl->tpl_vars['item']->value["item_id"];?>
 />
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php }?>
                    </div>



                <div class="card">
                    <div class="card-body">
                        <a type="button" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
placeOrder" class="btn btn-warning btn-block btn-lg">Place order</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<?php
}
}
/* {/block 'content'} */
}
