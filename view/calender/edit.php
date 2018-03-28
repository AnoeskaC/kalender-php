<form action="<?=URL?>calender/editSave/<?= $calender["id"]?>" method="POST">
	<p>naam</p>
	<input type="text" name="naam" required="" min="2" value="<?= $calender["person"]?>">
	<p>dag</p>
	<input type="number" name="dag" required="" min="1" max="31" value="<?= $calender["day"]?>">
	<p>maand</p>
	<input type="number" name="maand" required="" min="1" max="12" value="<?= $calender["month"]?>">
	<p>jaar</p>
	<input type="number" name="jaar" required="" min="4" value="<?= $calender["year"]?>">
	<input type="hidden" name="id" required="" value="<?= $calender["id"]?>">

	<input type="submit" value="Opslaan">
</form>