Успешно зачислено:
<table>
	<tr>
		<td>
			Акаунт
		</td>
		<td>
			<?php echo $model->account->login." / ".$model->account->email; ?>
		</td>
	</tr>
	<tr>
		<td>
			Дата зачисления
		</td>
		<td>
			<?php echo $model->payment_date; ?>
		</td>
	</tr>
	<tr>
		<td>
			Сумма зачисления
		</td>
		<td>
			<?php echo $model->summ; ?>
		</td>
	</tr>
</table>