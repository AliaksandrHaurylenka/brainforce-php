<form class="form-inline mt-5 mb-3" action="?" method="post">
  <div class="form-group mb-2  mr-2">
    <strong>Показать товары, у которых</strong>
  </div>

  <div class="form-group mb-2">
    <select id="price" name="price" class="form-control">
      <option val="price" selected>Розничная цена</option>
      <option val="wholesale_price">Оптовая цена</option>
    </select>
  </div>

  <div class="form-group mb-2 ml-2">
    <strong>от</strong>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <input type="number" class="form-control" id="min-price" name="min-price" placeholder="1000" required>
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

  <!-- <div class="form-group mb-2">
    <select id="max_min" name="max_min" class="form-control">
      <option value="max" selected>Более</option>
      <option value="min">Менее</option>
    </select>
  </div>

  <div class="form-group mx-sm-3 mb-2">
    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="20" required>
  </div> -->

  <button type="button" id="filter" name="filter" class="btn btn-primary mb-2">Показать товары</button>
  <button type="button" name="refresh" id="refresh" class="btn btn-success mb-2 ml-2">Показать все товары</button>
</form>


<!-- <form class="form-inline mt-5 mb-3" action="?" method="post">
  <div class="form-group mb-2  mr-2">
    <strong>Показать товары, у которых</strong>
  </div>

  <div class="form-group mb-2 mr-2">
    <select id="price" name="price" class="form-control">
      <option>----Select----</option>
      <option val="200">200</option>
      <option val="400">400</option>
      <option val="1000">1000</option>
      <option val="1500">1500</option>
      <option val="2000">2000</option>
      <option val="3000">3000</option>
    </select>
  </div>

  <button type="button" name="filter" id="filter" class="btn btn-primary mb-2">Показать товары</button>
  <button type="button" name="refresh" id="refresh" class="btn btn-success mb-2 ml-2">Показать все товары</button>
</form> -->
