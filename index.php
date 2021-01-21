<?php

  require_once('init.php');

  $transformer = new Transformer;
  $transformers = $transformer->get('transformers');

  require_once('helpers.php');

 

  // if(($_POST['filter'])){
    // if($_POST[''] == null){$transformers = $transformer->get('transformers');}
    // if($_POST['price'] == 'price' && $_POST['max_min'] == 'max'){
    //   $transformers = $transformer->getColumn1('transformers', 'price', $_POST["min_price"], $_POST["max_price"], 'quantity_in_stock1', $_POST["quantity"]);
    // }
    // if($_POST['price'] == 'wholesale_price'){
    //   $transformers = $transformer->getColumn1('transformers', 'wholesale_price', $_POST["min_price"], $_POST["max_price"]);
    // }
    // if($_POST['max_min'] == 'max'){
    //   $transformers = $transformer->getColumn2('transformers', 'quantity_in_stock1', $_POST["quantity"]);
    // }
  // }
  
  // var_dump($transformers);
  // var_dump($_POST["min_price"]);
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Brain Force</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

  <div class="container-fluid">
    <div class="row mt-5">
      <div class="col-md-12">
        <h2>Трансформаторы</h2>


        <div>
          Всего товаров на складе №1 <strong><?= quantityProduct('quantity_in_stock1') ?> шт.</strong>
        </div>
        <div>
          Всего товаров на складе №2 <strong><?= quantityProduct('quantity_in_stock2') ?> шт.</strong>
        </div>
        <div>
          Средняя цена товара в розницу <strong><?= averagePrice('price') ?> руб.</strong>
        </div>
        <div>
          Средняя цена товара оптом <strong><?= averagePrice('wholesale_price') ?> руб.</strong>
        </div>


        <!-- <div class="row mt-5"> -->
          <!-- <p class="col-5"><strong>Показать товары, у которых</strong></p> -->
          <form class="form-inline mt-5 mb-3" action="?" method="post">
            <div class="form-group mb-2  mr-2">
              <strong>Показать товары, у которых</strong>
            </div>

            <div class="form-group mb-2">
              <select id="price" name="price" class="form-control">
                <option value="price" selected>Розничная цена</option>
                <option value="wholesale_price">Оптовая цена</option>
              </select>
            </div>

            <div class="form-group mb-2 ml-2">
              <strong>от</strong>
            </div>

            <div class="form-group mx-sm-3 mb-2">
              <input type="number" class="form-control" id="min-price" name="min_price" placeholder="1000" required>
            </div>

            <div class="form-group mb-2 ml-2">
              <strong>до</strong>
            </div>

            <div class="form-group mx-sm-3 mb-2">
              <input type="number" class="form-control" id="max-price" name="max_price" placeholder="3000" required>
            </div>

            <div class="form-group mb-2 mr-2">
              <strong>руббей и на складе </strong>
            </div>

            <div class="form-group mb-2">
              <select id="max_min" name="max_min" class="form-control">
                <option value="max" selected>Более</option>
                <option value="min">Менее</option>
              </select>
            </div>

            <div class="form-group mx-sm-3 mb-2">
              <input type="number" class="form-control" id="quantity" name="quantity" placeholder="20" required>
            </div>

            <button type="submit" name="filter" class="btn btn-primary mb-2">Показать товары</button>
          </form>
        <!-- </div> -->
        


        <table class="table">
          <thead>
            <tr>
              <!-- <th>ID</th> -->
              <th>Имя</th>
              <th>Стоимость, руб</th>
              <th>Стоимость опт, руб</th>
              <th>Наличие на складе 1, шт</th>
              <th>Наличие на складе 2, шт</th>
              <th>Страна производства</th>
              <th>Примечание</th>
            </tr>
          </thead>


          <tbody>
          <?php foreach ($transformers as $transformer): ?>
            <tr>          
              <!-- <th scope="row"><?= $transformer->id; ?></th> -->
              <?php if($transformer->price == maxPrice('price')){ ?>
                <td style="color: red; font-weight: 700"><?= $transformer->name; ?> (самый дорогой розничный товар)</td>
              <?php } elseif($transformer->wholesale_price == minPrice('wholesale_price')){ ?>
                <td style="color: green; font-weight: 700"><?= $transformer->name; ?> (самый дешевый оптовый товар)</td>
              <?php } else{ ?>
                <td><?= $transformer->name; ?></td>
              <?php } ?>
              <!-- <td><?= $transformer->name; ?></td> -->
              <td><?= $transformer->price; ?></td>
              <td><?= $transformer->wholesale_price; ?></td>
              <td><?= $transformer->quantity_in_stock1; ?></td>
              <td><?= $transformer->quantity_in_stock2; ?></td>
              <td><?= $transformer->country_of_origin; ?></td>
              <td><?php if($transformer->quantity_in_stock1 + $transformer->quantity_in_stock2 < 20){echo 'Осталось мало!! Срочно докупите!!!';}  ?></td>
            </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</body>
</html>