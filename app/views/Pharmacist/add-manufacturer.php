<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}



input, button[type='submit'] {
    width: 100%;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 1.2em;
    margin: 8px 0px;
    padding: 12px 24px;
}

#add-form {
    display: flex;
    flex-wrap: wrap;

}
</style>

<form method="post" action="/pharmacist/add-manufacturer/">
    <h1>Дори ишлаб чиқарувчи компания номини қўшиш</h1>
    <div id='add-form'>
        <input id="company_name" onkeyup="check()" type="text" name="company_name" value="<?php  if (isset($_SESSION['unique'])) echo $_SESSION['unique']; ?>" placeholder="Компания номи">
        <input id="company_name" onkeyup="check()" type="text" name="company_country" value="<?php  if (isset($_SESSION['unique'])) echo $_SESSION['unique']; ?>" placeholder="Компания жойлашкан давлат">
        <?php if (isset($_SESSION['unique'])): ?>
            <?php unset($_SESSION['error']); ?>
            <?php unset($_SESSION['unique']); ?>
            <button id="button" style="color: red;" type="submit">Маҳсулот мавжуд!</button>
        <?php else: ?>
            <button id="button" type="submit">Қўшиш</button>
        <?php endif;?>
    </div>
</form>
<br>

Мавжуд дори ишлаб чиқарувчи компаниялар рўйхати
<table>
    <tr>
        <th>Компания номи</th>
        <th>Компания жойлашган мамлакат</th>
    </tr>
    <?php foreach ($manufacturers as $manufacturer): ?>
        <tr>
            <td><?php echo $manufacturer['name'] ?></td>
            <td><?php echo $manufacturer['country'] ?></td>
        </tr>
    <?php endforeach;?>
</table>

<script>

</script>