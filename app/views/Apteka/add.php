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



input[name='title'], button[type='submit'] {
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

<form method="post" action="/apteka/add/">
    <h1>Добавить новый товар</h1>
    <div id='add-form'>
        <input id="title" type="text" name="title" placeholder="Названия товара">
        <button type="submit">Добавить</button>
    </div>
</form>
<br>

Мавжуд товарлар рўйхати
<table>
    <tr>
        <th>Номи</th>
        <th>Қўшилган вақти</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['date'] ?></td>
        </tr>
    <?php endforeach;?>
</table>