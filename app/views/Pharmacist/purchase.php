<style>
    * { box-sizing: border-box; }

.autocomplete {
  /*the container must be positioned relative:*/
  position: relative;
  /* display: inline-block; */
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff;
  border-bottom: 1px solid #d4d4d4;
}
.autocomplete-items div:hover {
  /*when hovering an item:*/
  background-color: #e9e9e9;
}
.autocomplete-active {
  /*when navigating through the items using the arrow keys:*/
  background-color: DodgerBlue !important;
  color: #ffffff;
}





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
</style>

<form method="post" action="<?php echo SUB ?>/pharmacist/purchase/" autocomplete="off">
  <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <h1>Товар қабул қилиш</h1>
    <div id='add-form'>
        <div class="autocomplete">
            <input id="myInput" type="text" name="product_name" placeholder="Маҳсулот номи">
        </div>
        <input name="count" type="number" placeholder="Сони">
        <input name="price" type="number" placeholder="Бир дона маҳсулот нархи (сўм)">
        <button type="submit">Приобрести</button>
    </div>
</form>


Омборга олинган маҳсулотлар рўйхати
<table>
    <tr>
        <th>Товар номи</th>
        <th>Сони</th>
        <th>Нархи</th>
        <th>Сумма</th>
        <th>Сана / вақт</th>
    </tr>
    <?php foreach ($storageActions as $storageAction): ?>
        <?php $name = \R::findOne('products', 'id = ?', [$storageAction['product_id']])['name']; ?>
        <tr>
            <td><?php echo $name ?></td>
            <td><?php echo $storageAction['count'] ?></td>
            <td><?php echo $storageAction['price'] ?></td>
            <td><?php echo $storageAction['count'] * $storageAction['price'] ?></td>
            <td><?php echo $storageAction['datetime'] ?></td>
        </tr>
    <?php endforeach;?>
</table>



<?php $prods = \R::findAll('products'); ?>




<script>
    let countries = [
        <?php foreach ($prods as $prod): ?>
            <?php echo '"' . $prod['name'] . '",'; ?>
        <?php endforeach; ?>
    ];
</script>

<script src="<?php echo SUB ?>/public/js/autocomplate.js"></script>

<script>
  autocomplete(document . getElementById("myInput"), countries);
</script>