{extends file="main.html"}
{block name=content}

<div class="container">
    <div class="m-2 ">

    </div>
    <div id="table" class="container">
        <table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Product</th>
		<th scope="col">Quantity</th>

	</tr>
</thead>
<tbody>
{foreach $order as $o}
{strip}
	<tr>
		<td>{$o["name"]}</td>
		<td>{$o["quantity"]}</td>
		
	</tr>
{/strip}
{/foreach}
</tbody>
</table>

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
