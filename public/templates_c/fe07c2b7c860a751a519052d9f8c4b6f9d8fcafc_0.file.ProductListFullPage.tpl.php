<?php
/* Smarty version 4.1.0, created on 2022-05-30 23:07:49
  from 'D:\xammp\htdocs\php-shop-app\app\views\ProductListFullPage.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_6295322506ae35_76982761',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fe07c2b7c860a751a519052d9f8c4b6f9d8fcafc' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\ProductListFullPage.tpl',
      1 => 1653944860,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:ProductListTable.tpl' => 1,
  ),
),false)) {
function content_6295322506ae35_76982761 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10744877106295322505f556_72644030', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_10744877106295322505f556_72644030 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_10744877106295322505f556_72644030',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="container">
    <div class="m-2 ">
        <a class="btn btn-success float-end m-1" href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productNew">+ Nowy produkt</a>
    </div>
    <div id="table" class="container">
<?php $_smarty_tpl->_subTemplateRender("file:ProductListTable.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

</div>
        <?php if ($_smarty_tpl->tpl_vars['msgs']->value->isMessage()) {?>
            <div class="messages bottom-margin">
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


<?php
}
}
/* {/block 'content'} */
}
