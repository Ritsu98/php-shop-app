<table  class="table">
<thead class="table-dark">
	<tr>
		<th scope="col">Order Number</th>
		<th scope="col">Client</th>
		<th scope="col">Status</th>
		<th scope="col">Options</th>
	</tr>
</thead>
<tbody>
{foreach $orders as $o}
{strip}
	<tr>
		<td>{$o["order_id"]}</td>
		<td>{$o["first_name"]} {$o["last_name"]}</td>
		<td>{$o["status_name"]}</td>
		<td>
			<form action="{$conf->action_url}statusUpdate/{$o['order_id']}" method="post">
			<select class="form-select" aria-label="Change order status" name="status" id="">
				{foreach $order_status as $os}
					<option value={$os["status_id"]}>{$os["status_name"]}</option>
				{/foreach}
			</select>
			<button type="submit"class="btn btn-success"
					href= "">Zapisz</button>
				<a class="btn btn-secondary" href="{$conf->action_url}orderView/{$o['order_id']}">Podgląd</a>
			</form>

			&nbsp;

		</td>
	</tr>
{/strip}
{/foreach}
</tbody>
</table>
