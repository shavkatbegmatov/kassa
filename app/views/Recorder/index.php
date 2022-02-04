<style>
input, button[type='submit'] {
    width: 100%;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
    font-size: 1.2em;
    margin: 8px 0px;
    padding: 12px 24px;
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

<div class="panel panel-default">
    <h1 class="panel-heading">Регистратор</h1>
    <div class="panel-body">
        <form action="/recorder/" method="post">
            <div class="card-body">
                <div class="form-group">
                    <label for="">Исм</label>
                    <input type="text" name="first_name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Фамилия</label>
                    <input type="text" name="last_name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Отасини исми</label>
                    <input type="text" name="middle_name" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="datepicker">Туғилган йили</label>
                    <input type="text" name="birth_date" class="form-control" id="datepicker">
                </div>
                <div class="form-group">
                    <label for="">Манзил</label>
                    <input type="text" name="address" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">ИНПС</label>
                    <input type="number" name="infl" class="form-control" id="">
                </div>
                <div class="form-group">
                    <label for="">Паспорт Серия</label>
                    <input type="text" name="passport" class="form-control" id="">
                </div>
            </div>
            <!-- /.card-body -->

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
    </div>
</div>

<?php
    $patients = \R::findAll('patients');
    $patients = array_reverse($patients);
?>

<h1>Мавжуд беморлар рўйхати</h1>
<table>
    <tr>
        <th>ID</th>
        <th>ФИО</th>
        <th>Туғилган йили</th>
        <th>Паспорт серияси</th>
        <th>Операциялар</th>
    </tr>
    <?php foreach ($patients as $patient): ?>
        <tr>
            <td><?php echo $patient['id'] ?></td>
            <td><?php echo $patient['last_name']; ?> <?php echo $patient['first_name']; ?>  <?php echo $patient['middle_name']; ?></td>
            <td><?php echo $patient['birth_date'] ?></td>
            <td><?php echo $patient['passport'] ?></td>
            <td>

<a class="list-group-item list-group-item-action" href=""><?php echo $patient['first_name']; ?> <?php echo $patient['last_name']; ?> <?php echo $patient['middle_name']; ?></span></a>
            
                
<div class="wrapper">
    <a href="/apteka/change/?id=<?php //echo $product['id'] ?>">
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
