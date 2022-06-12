{extends file="main.html"}
{block name=content}
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <h1>Zamówienie zostało złożone</h1>
            </div>
        </section>
        <div class="container">
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
{/block}

