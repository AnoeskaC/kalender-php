<form action="<?=URL?>calender/createSave" method="POST">
  <p>naam</p>
  <input type="text" name="naam" required="" min="2" placeholder="naam">
  <p>dag</p>
  <input type="number" required="" min="1" max="31" name="dag" placeholder="dag">
  <p>maand</p>
  <input type="number" required="" min="1" max="12" name="maand" placeholder="maand">
  <p>jaar</p>
  <input type="number" required="" min="1" name="jaar" placeholder="jaar">
  <p></p>
  <input type="submit" value="Opslaan">
</form>