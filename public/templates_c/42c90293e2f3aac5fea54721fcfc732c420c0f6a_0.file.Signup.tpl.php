<?php
/* Smarty version 4.1.0, created on 2022-06-07 06:13:26
  from 'C:\xammp\htdocs\php-shop-app\app\views\Signup.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.1.0',
  'unifunc' => 'content_629ed06686b981_25209694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '42c90293e2f3aac5fea54721fcfc732c420c0f6a' => 
    array (
      0 => 'C:\\xammp\\htdocs\\php-shop-app\\app\\views\\Signup.tpl',
      1 => 1654575195,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_629ed06686b981_25209694 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1477577278629ed0668405d1_90481986', 'content');
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "main.html");
}
/* {block 'content'} */
class Block_1477577278629ed0668405d1_90481986 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'content' => 
  array (
    0 => 'Block_1477577278629ed0668405d1_90481986',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<section class="w-100 p-4 d-flex justify-content-center pb-4">
<div class="container m-5">
<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_root;?>
register" style="width: 26rem;" method="post">
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" name="first_name" id="form3Example1" class="form-control" />
        <label class="form-label" for="form3Example1">First name</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" name="last_name" id="form3Example2" class="form-control" />
        <label class="form-label" for="form3Example2">Last name</label>
      </div>
    </div>
  </div>

  
  <div class="form-outline mb-4">
    <input type="text" name="login" id="form3Example3" class="form-control" />
    <label class="form-label" for="form3Example3">Login</label>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <input type="password" name="password" id="form3Example4" class="form-control" />
    <label class="form-label" for="form3Example4">Password</label>
  </div>
  <!-- <input type="text" name="role" id="form3Example4" class="form-control" value="6" hidden/> -->
 
  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Sign up</button>

  <!-- Register buttons -->
  
  </div>
</form>
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
</section>
<?php
}
}
/* {/block 'content'} */
}
