<?php
/* Smarty version 4.1.0, created on 2022-05-30 23:04:03
  from 'D:\xammp\htdocs\php-shop-app\app\views\ProductAdd.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_62953143402084_56343800',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd331c4b5fc5fc3f62577af539cc68e23c474424c' => 
    array (
      0 => 'D:\\xammp\\htdocs\\php-shop-app\\app\\views\\ProductAdd.tpl',
      1 => 1653944355,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_62953143402084_56343800 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_565060408629531433f7a78_05397294', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_565060408629531433f7a78_05397294 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_565060408629531433f7a78_05397294',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <section>
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="display-6 fw-bolder text-center">Log-in</h1>
            <form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
login" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="id_name" name="name" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->login;?>
" class="form-control" />
                    <label class="form-label" for="form2Example1">Name</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="text" id="id_pass" name="pass" class="form-control" />
                    <label class="form-label" for="form2Example2">Price</label>
                </div>

                <div class="form-outline mb-4">
                    <input type="textarea" id="description" name="description" class="form-control" />
                    <label class="form-label" for="form2Example2">Description</label>
                </div>
                <!-- 2 column grid layout for inline styling -->


                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>


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
