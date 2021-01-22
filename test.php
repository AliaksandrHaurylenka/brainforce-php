<!-- <?php foreach ($transformers as $transformer): ?>
      <tr>          
      <?php if($transformer->price == maxPrice('price')){ ?>
          <td style="color: red; font-weight: 700"><?= $transformer->name; ?> (самый дорогой розничный товар)</td>
        <?php } elseif($transformer->wholesale_price == minPrice('wholesale_price')){ ?>
          <td style="color: green; font-weight: 700"><?= $transformer->name; ?> (самый дешевый оптовый товар)</td>
        <?php } else{ ?>
          <td><?= $transformer->name; ?></td>
        <?php } ?>
        <td><?= $transformer->price; ?></td>
        <td><?= $transformer->wholesale_price; ?></td>
        <td><?= $transformer->quantity_in_stock1; ?></td>
        <td><?= $transformer->quantity_in_stock2; ?></td>
        <td><?= $transformer->country_of_origin; ?></td>
        <td><?php if($transformer->quantity_in_stock1 + $transformer->quantity_in_stock2 < 20){echo 'Осталось мало!! Срочно докупите!!!';}  ?></td>
      </tr>
    <?php endforeach; ?> -->


    <!-- <div>
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
        </div> -->


        <?php
    require_once('init.php');

    $transformer = new Transformer;
    $transformers = $transformer->get('transformers');
    
    foreach ($transformers as $transformer){
      echo "<tr>          
        <td>".$transformer->name."</td>
        <td>".$transformer->price."</td>
        <td>".$transformer->wholesale_price."</td>
        <td>".$transformer->quantity_in_stock1."</td>
        <td>".$transformer->quantity_in_stock2."</td>
        <td>".$transformer->country_of_origin."</td>  
      </tr>";
    }    
  ?>