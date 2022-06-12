<?php
/* Smarty version 4.1.0, created on 2022-06-07 10:57:19
  from 'C:\xammp\htdocs\php-shop-app\app\views\OrderConfirm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629f12ef370153_70030841',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '00ffbbc621dd13c060a3684553b2815e6f6b9818' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\OrderConfirm.tpl',
      1 => 1654592220,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629f12ef370153_70030841 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1890629868629f12ef3561c7_48659071', 'content');
?>


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_1890629868629f12ef3561c7_48659071 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1890629868629f12ef3561c7_48659071',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1>Zamówienie zostało złożone</h1>
            </div>
        </section>
        <div class="container">
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
                <div class="alert alert-primary messages bottom-margin">
                    <ul>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getMessages(), 'msg');
$_smarty_tpl->tpl_vars['msg']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['msg']->value) {
$_smarty_tpl->tpl_vars['msg']->do_else = false;
?>
                            <li class="msg <?php if ($_smarty_tpl->tpl_vars['msg']->value->isError()) {?>error<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isWarning()) {?>warning<?php }?> <?php if ($_smarty_tpl->tpl_vars['msg']->value->isInfo()) {?>info<?php }?>"><?php echo $_smarty_tpl->tpl_vars['msg']->value->text;?>
</li>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </ul>
                </div>
            <?php }?>
            </div>
<?php
}
}
/* {/block 'content'} */
}
