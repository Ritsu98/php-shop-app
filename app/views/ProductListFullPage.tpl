{extends file="main.html"}
{block name=content}
<div class="bottom-margin">
<a class="pure-button button-success" href="{$conf->action_root}personNew">+ Nowa osoba</a>
</div>	
<div class="container">
{*    {foreach $products as $p}*}
{*    {strip}*}
{*        {foreach $p as $e}*}
{*            <span>{$e}</span>*}
{*        {/foreach}*}
{*    {/strip}*}
{*    {/foreach}*}
<div id="table" class="container">
{include file="ProductListTable.tpl"}
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
