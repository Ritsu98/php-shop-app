{extends file="main.html"}
{block name=content}
<section class="w-100 p-4 d-flex justify-content-center pb-4">
<div class="container m-5">
<form action="{$conf->action_root}register" style="width: 26rem;" method="post">
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
{if $msgs->isMessage()}
                <div class="alert alert-primary messages bottom-margin">
                    <ul>
                        {foreach $msgs->getMessages() as $msg}
                            {strip}
                                <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                            {/strip}
                        {/foreach}
                    </ul>
                </div>
            {/if}
</div>
</section>
{/block}
