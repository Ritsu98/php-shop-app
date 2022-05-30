<?php
/* Smarty version 4.1.0, created on 2022-05-30 21:28:53
  from 'D:\xammp\htdocs\php-shop-app\app\views\Home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62951af50c8f70_78869816',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0cf50aa9baf1eece7cbc820bf5e26b0259f4375c' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\Home.tpl',
      1 => 1653938928,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62951af50c8f70_78869816 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_158540425162951af50c1323_34777735', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_158540425162951af50c1323_34777735 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_158540425162951af50c1323_34777735',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'p');
$_smarty_tpl->tpl_vars['p']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['p']->value) {
$_smarty_tpl->tpl_vars['p']->do_else = false;
?>
                    <div class="col mb-5"><div class="card h-100"><!-- Sale badge--><div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div><!-- Product image--><img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." /><!-- Product details--><div class="card-body p-4"><div class="text-center"><!-- Product name--><h5 class="fw-bolder"><a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
itemView/<?php echo $_smarty_tpl->tpl_vars['p']->value['product_id'];?>
"><?php echo $_smarty_tpl->tpl_vars['p']->value["name"];?>
</a></h5><!-- Product reviews--><div class="d-flex justify-content-center small text-warning mb-2"><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div><div class="bi-star-fill"></div></div><!-- Product price--><?php echo $_smarty_tpl->tpl_vars['p']->value["prize"];?>
 zł</div></div><!-- Product actions--><div class="card-footer p-4 pt-0 border-top-0 bg-transparent"><div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">Add to cart</a></div></div></div></div>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>




                </div>
            </div>
        </section>
<?php
}
}
/* {/block 'content'} */
}
