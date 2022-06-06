<?php
/* Smarty version 4.1.0, created on 2022-06-06 23:29:26
  from 'D:\xammp\htdocs\php-shop-app\app\views\OrderConfirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e71b6b18657_74569349',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e7d2e6c0e74cb3bd2cab93919d32e31e2de90192' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\OrderConfirm.tpl',
      1 => 1654550498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e71b6b18657_74569349 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1370930148629e71b6b18090_44975378', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_1370930148629e71b6b18090_44975378 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1370930148629e71b6b18090_44975378',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1>Zamówienie zostało złożone</h1>
            </div>
        </section>
<?php
}
}
/* {/block 'content'} */
}
