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



input, button[type='submit'], select {
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

/*
    Auther: Abdelrhman Said
*/

@import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

*:focus,
*:active {
  outline: none !important;
  -webkit-tap-highlight-color: transparent;
}

.wrapper {
  display: inline-flex;
}

.wrapper .icon {
  position: relative;
  background-color: #ffffff;
  border-radius: 50%;
  padding: 10px;
  margin-right: 10px;
  width: 15px;
  height: 15px;
  font-size: 15px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  cursor: pointer;
  transition: all 0.2s cubic-bezier(0.68, -0.55, 0.265, 1.55);
  color: black;
  border: 1px solid black;
}

.wrapper .tooltip {
  position: absolute;
  top: 0;
  font-size: 14px;
  background-color: #ffffff;
  color: #ffffff;
  padding: 5px 8px;
  border-radius: 5px;
  box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
  opacity: 0;
  pointer-events: none;
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .tooltip::before {
  position: absolute;
  content: "";
  height: 8px;
  width: 8px;
  background-color: #ffffff;
  bottom: -3px;
  left: 50%;
  transform: translate(-50%) rotate(45deg);
  transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
}

.wrapper .icon:hover .tooltip {
  top: -45px;
  opacity: 1;
  visibility: visible;
  pointer-events: auto;
}

.wrapper .github:hover,
.wrapper .github:hover .tooltip,
.wrapper .github:hover .tooltip::before {
  background-color: #333333;
  color: #ffffff;
}

.youtube i {
    color: red;
}

.youtube:hover i {
    color: white;
}

.wrapper .youtube:hover,
.wrapper .youtube:hover .tooltip,
.wrapper .youtube:hover .tooltip::before {
  background-color: #de463b;
  color: #ffffff;
}

</style>

<form method="post" action="/pharmacist/add/">
    <h1>Янги маҳсулот қўшиш</h1>
    <div id='add-form'>
        <?php if (isset($_SESSION['unique'])): ?>
            <input id="product_name" onkeyup="check()" type="text" name="product_name" value="<?php echo $_SESSION['unique'] ?>" placeholder="Маҳсулот номи">
        <?php else: ?>
            <input id="product_name" type="text" name="product_name" placeholder="Маҳсулот номи">
        <?php endif;?>
        <select id="manufacturer" name="manufacturer" onchange="add_manufacturer()">
            <option>Номаълум</option>
            <option value="addnew">Янги ишлаб чиқарувчи номини қўшиш</option>
            <?php foreach ($manufacturers as $manufacturer): ?>
                <option value="<?php echo $manufacturer['id'] ?>"><?php echo $manufacturer['name'] . " (" . $manufacturer['country'] . ")"; ?></option>
            <?php endforeach; ?>
        </select>
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
        <th>ID</th>
        <th>Номи</th>
        <th>Компания номи</th>
        <th>Қўшилган вақти</th>
        <th>Операциялар</th>
    </tr>
    <?php foreach ($products as $product): ?>
        <tr>
            <?php
                $company = \R::findOne('manufacturers', 'id = ?', [$product['manufacturer_id']]);
                if ($company) {
                    $company_name = $company['name'];
                } else {
                    $company_name = '';
                }
            ?>
            <td><?php echo $product['id'] ?></td>
            <td><?php echo $product['name'] ?></td>
            <td><?php echo $company_name ?></td>
            <td><?php echo $product['datetime'] ?></td>
            <td>
                
<div class="wrapper">
    <a href="/pharmacist/change/?id=<?php echo $product['id'] ?>">
    <div class="icon github">
        <div class="tooltip">Ўзгартириш</div>
        <span><i class="fas fa-pen"></i></span>
    </div>
    </a>
    <a href="">
  <div class="icon youtube">
    <div class="tooltip">Ўчириш</div>
    <span><i class="fas fa-trash"></i></span>
  </div>
  </a>
</div>


            </td>
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
    let manufacturer = document.getElementById('manufacturer');   
    function add_manufacturer() {
        if (manufacturer.value === 'addnew') {
            window.location = '/pharmacist/add-manufacturer';
        }
    }
</script>