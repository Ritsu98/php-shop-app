{extends file="main.html"}
{block name=content}

<div class="container">
    <div class="m-2 ">

    </div>
    <div id="table" class="container">
        {include file="UserOrdersListTable.tpl"}
</div>

</div>
        {if $msgs->isMessage()}
            <div class="messages bottom-margin">
                <ul>
                    {foreach $msgs->getMessages() as $msg}
                        {strip}
                            <li class="msg {if $msg->isError()}error{/if} {if $msg->isWarning()}warning{/if} {if $msg->isInfo()}info{/if}">{$msg->text}</li>
                        {/strip}
                    {/foreach}
                </ul>
            </div>
        {/if}


{/block}
