<?php

function quantityProduct($column){
    global $transformers;
    $quantityProduct = array_sum(array_column($transformers, $column));
    return $quantityProduct;
  }


  function averagePrice($column){
    global $transformers;
    $averagePrice = array_sum(array_column($transformers, $column))/count($transformers);
    return $averagePrice;
  }


  function maxPrice($column){
    global $transformers;
    $maxPrice = max(array_column($transformers, $column));
    return $maxPrice;
  }


  function minPrice($column){
    global $transformers;
    $minPrice = min(array_column($transformers, $column));
    return $minPrice;
  }