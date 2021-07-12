<?= \Config\Services::validation()->listErrors()?>
<form method="post">
	<?= csrf_field()?>
	<div>
		<label for="model">Model: </label>
		<input type="input" name="model" value=<?= esc($model)?>>
	</div>
	<div>
		<label for="company">Company: </label>
		<input type="input" name="company" value=<?= esc($company)?>>
	</div>
	<div>
		<label for="type">Type: </label>
		<input type="input" name="type" value=<?= esc($type)?>>
	</div>
	<div>
		<label for="fuel">Fuel: </label>
		<input type="input" name="fuel" value=<?= esc($fuel)?>>
	</div>
	<div>
		<label for="warranty">Warranty: </label>
		<input type="input" name="warranty" value=<?= esc($warranty)?>>
	</div>
	<div>
		<input type="submit" name="update" value="Update">
		<button><a href="cars" style="text-decoration: none;">Cancel</a></button>
	</div>
</form>