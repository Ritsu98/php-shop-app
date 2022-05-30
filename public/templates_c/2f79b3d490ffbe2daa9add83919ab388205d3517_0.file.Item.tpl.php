<?php
/* Smarty version 4.1.0, created on 2022-05-30 22:03:02
  from 'D:\xammp\htdocs\php-shop-app\app\views\Item.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629522f6e5c5b8_71628252',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2f79b3d490ffbe2daa9add83919ab388205d3517' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\Item.tpl',
      1 => 1653940965,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629522f6e5c5b8_71628252 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1374236435629522f6e59267_91016658', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_1374236435629522f6e59267_91016658 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1374236435629522f6e59267_91016658',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="https://dummyimage.com/600x700/dee2e6/6c757d.jpg" alt="..." /></div>
                <div class="col-md-6">
                    <h1 class="display-5 fw-bolder"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h1>
                    <div class="fs-5 mb-5">
                        <span><?php echo $_smarty_tpl->tpl_vars['item']->value['prize'];?>
 zł</span>
                    </div>
                    <p class="lead"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</p>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Add to cart
                        </button>
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
