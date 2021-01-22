<table class="table">
  <thead>
    <tr>
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
    <?php 
      require_once('init.php');

      $transformer = new Transformer;
      $transformers = $transformer->getPrice('transformers', 'price', $_POST['min']);
      require_once('helpers.php');
    ?>
    
    <?php foreach ($transformers as $transformer): ?>
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
    <?php endforeach; ?>
  </tbody>
</table>