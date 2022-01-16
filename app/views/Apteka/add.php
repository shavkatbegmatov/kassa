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



input[name='product_name'], button[type='submit'] {
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
    <h1>Янги маҳсулот қўшиш</h1>
    <div id='add-form'>
        <?php if (isset($_SESSION['unique'])): ?>
            <input id="product_name" onkeyup="check()" type="text" name="product_name" value="<?php echo $_SESSION['unique'] ?>" placeholder="Маҳсулот номи">
        <?php else: ?>
            <input id="product_name" type="text" name="product_name" placeholder="Маҳсулот номи">
        <?php endif;?>
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

Мавжуд товарлар рўйхати
<table>
    <tr>
        <th>Номи</th>
        <th>Қўшилган вақти</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $product['datetime'] ?></td>
        </tr>
    <?php endforeach;?>
</table>

<script>
    let product_name = document.getElementById('product_name');
    function check() {
        let doc = document.getElementById('button');
        doc.style.color = 'black';
        doc.innerHTML = 'Қўшиш';
    }
</script>