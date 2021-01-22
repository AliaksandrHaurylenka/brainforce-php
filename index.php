<?php
  // header('Location: http://brainforce-php.test');
  // header('Location: http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'?success');
  // exit();

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
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Brain Force</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

  <script>
    // $(document).ready(function(){
    //   $("#ajaxdata").load("table.php");
    //   $("#price").change(function(){
    //     let selected = $(this).val();
    //     $("#ajaxdata").load("search_table.php", {selected_price: selected});
    //   })
    //   $("#filter").click(function(){
    //     $("#ajaxdata").load("table.php");
    //   })
    // })


    // $(document).ready(function(){
    //   $("#ajaxdata").load("table.php");
    //   $("#filter").click(function(){
    //     let selected = $("#price").val();
    //     $("#ajaxdata").load("search_table.php", {selected_price: selected});
    //   })
    //   $("#refresh").click(function(){
    //     $("#ajaxdata").load("table.php");
    //   })
    // })


    $(document).ready(function(){
      $("#ajaxdata").load("table.php");
      $("#filter").click(function(){
        let min_price = $("#min-price").val();
        $("#ajaxdata").load("search_table.php", {min: min_price});
      })
      $("#refresh").click(function(){
        $("#ajaxdata").load("table.php");
      })
    })
  </script>
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

        <? require_once('serch.php') ?>

        <div id="ajaxdata"></div>
        
      </div>
    </div>
  </div>
</body>
</html>