<?php
/* Smarty version 4.1.0, created on 2022-05-31 01:13:38
  from 'C:\xammp\htdocs\php-shop-app\app\views\ProductAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62954fa24ba454_20833197',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2746f13ba6e88eb992e2ab01b837c1b9e49e3dec' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\ProductAdd.tpl',
      1 => 1653952411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62954fa24ba454_20833197 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_81910340662954fa24a5ae1_50840120', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_81910340662954fa24a5ae1_50840120 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_81910340662954fa24a5ae1_50840120',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section>
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="display-6 fw-bolder text-center">Log-in</h1>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
productSave" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="id_name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->name;?>
" class="form-control" />
                    <label class="form-label" for="form2Example1">Name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="text" id="id_price" name="price" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->price;?>
" />
                    <label class="form-label" for="form2Example2">Price</label>
                </div>

                <div class="form-outline mb-4">
                    <textarea type="textarea" id="description" name="description" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->description;?>
" ><?php echo $_smarty_tpl->tpl_vars['form']->value->description;?>
</textarea>
                    <label class="form-label" for="form2Example2">Description</label>
                </div>
                <!-- 2 column grid layout for inline styling -->

                 <div class="form-outline mb-4">
                    <input type="number" id="category_id" name="category_id" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->category_id;?>
" />
                    <label class="form-label" for="form2Example2">Category ID</label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-success">Zapisz</button>
                <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->id;?>
">

            </form>
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
        </div>
    </section>
<?php
}
}
/* {/block 'content'} */
}
