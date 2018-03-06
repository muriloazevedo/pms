<?php
 echo $booking->reserva_numero
?>
<br>
<?php foreach($booking->dates as $date):?>
	<?php echo $date->data?> / <?php echo $date->quarto?>
	<?php echo $this->Html->link('Remover', "/dates/remove/{$date->reserva_numero}/$date->data");?>
<?php endforeach?>

<form>
	<label>Escolha uma data</label>
	<input type="date" name="quarto[]" />
	<input type="date" name="date[]" />
	
	<input type="date" name="quarto[]" />
	<input type="date" name="date[]" />

	<input type="date" name="quarto[]" />
	<input type="date" name="date[]" />
	<input type="submit" name="submit" value="Salvar" />
</form>


