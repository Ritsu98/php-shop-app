<?php
/* Smarty version 4.1.0, created on 2022-06-06 20:39:50
  from 'D:\xammp\htdocs\php-shop-app\app\views\ProductAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629e49f66d21e9_72046644',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd331c4b5fc5fc3f62577af539cc68e23c474424c' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\ProductAdd.tpl',
      1 => 1654500687,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629e49f66d21e9_72046644 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_981150065629e49f66c6e93_72775823', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_981150065629e49f66c6e93_72775823 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_981150065629e49f66c6e93_72775823',
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
