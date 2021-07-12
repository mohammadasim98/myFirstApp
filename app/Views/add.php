<?= \Config\Services::validation()->listErrors()?>
<form method="post" action='/add'>
	<?= csrf_field()?>
	<div>
		<label for="model">Model: </label>
		<input type="input" name="model">
	</div>
	<div>
		<label for="company">Company: </label>
		<input type="input" name="company">
	</div>
	<div>
		<label for="type">Type: </label>
		<input type="input" name="type">
	</div>
	<div>
		<label for="fuel">Fuel: </label>
		<input type="input" name="fuel">
	</div>
	<div>
		<label for="warranty">Warranty: </label>
		<input type="input" name="warranty">
	</div>
	<div>
		<input type="submit" name="submit" value="Add">
		<button><a href="cars" style="text-decoration: none;">Cancel</a></button>
	</div>
</form>