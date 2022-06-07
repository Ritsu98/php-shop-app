{extends file="main.html"}
{block name=content}
    <section>
        <div class="container px-4 px-lg-5 mt-5">
            <h1 class="display-6 fw-bolder text-center">Log-in</h1>
            <form action="{$conf->action_root}login" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                    <input type="text" id="id_login" name="login" value="{$form->login}" class="form-control" />
                    <label class="form-label" for="form2Example1">Login</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" id="id_pass" name="pass" class="form-control" />
                    <label class="form-label" for="form2Example2">Password</label>
                </div>

                <!-- 2 column grid layout for inline styling -->
               
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

                <!-- Register buttons -->
                <div class="text-center">
                    <p>Not a member? <a href="{$conf->action_root}signUp">Register</a></p>
                    <p>or sign up with:</p>
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
