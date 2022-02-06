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

<form method="post" action="/pharmacist/sell/" autocomplete="off">
    <input autocomplete="false" name="hidden" type="text" style="display:none;">
    <h1>Маҳсулот сотиш</h1>
    <div id='add-form'>
        <div class="autocomplete">
            <input id="myInput" type="text" name="product_name" placeholder="Маҳсулот номи">
        </div>
        Сони: <label id="product_count"></label>
        <input type="text" name="count" placeholder="Маҳсулот сони">
        <input type="text" name="price" placeholder="Маҳсулот нархи">
        <div onclick="ajax()">Топиш</button>
        <button id="button" type="submit">Қўшиш</button>
    </div>
</form>

<?php $prods = \R::findAll('products'); ?>

<script>
        let items = [
        <?php foreach ($prods as $prod): ?>
            <?php echo '"' . $prod['name'] . '",'; ?>
        <?php endforeach; ?>
    ];
</script>

<script src="/js/autocomplate.js"></script>

<script>
    autocomplete(document.getElementById("myInput"), items);
    
    function ajax() {
        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            document.getElementById("product_count").innerHTML =
            this.responseText;
        }
        let vars = "name=" + document.getElementById("myInput").value;
        xhttp.open("POST", "/pharmacist/get-count/", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(vars);
    }
</script>