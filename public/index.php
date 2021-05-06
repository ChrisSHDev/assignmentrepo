<?php
  class Products
  {
      private $productWeights = [];
      private $productDimensions =[];

      public function set_productWeights($productQty, $productWeight)
      {
          $this -> productWeights[] = $productQty * $productWeight;
      }

      public function get_productWeights()
      {
          return $this -> productWeights;
      }

      public function set_productDimensions($productQty, $productDimension)
      {
          $this -> productDimensions[] = $productQty * $productDimension;
      }

      public function get_productDimensions()
      {
          return $this -> productDimensions;
      }

      public function sumWeight($weight)
      {
          return array_sum($weight);
      }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
  #item-info {
    display: none;
  }

  .product-form-item {
    display: flex;
  }

  .new-item-box {
    display: flex;
  }

  .result-box {
    display: flex;
  }

  .new-item-box {
    display: flex;
  }
  </style>

</head>

<body>
  <h1>
    Shipment Management System
  </h1>
  <button onclick="disPlayForm()">Add New Item</button>
  <button onclick="storageReset()">Reset</button>

  <div class="new-product">
    <div id="item-info">
      <div class="new-item-box">
        <label for="newProductName">Name: </label>
        <input type="text" name="newProductName" value="">
        <label for="newProductName">Weight: </label>
        <input type="number" name="newProductWeight">
        <div class="productDimension">Dimension:
          <label for="dimensionWidth">Width:</label>
          <input type="number" name="newWidth" value="">
          <label for="dimensionHeight">Height:</label>
          <input type="number" name="newHeight" value="">
          <label for="dimensionLength">Length:</label>
          <input type="number" name="newLength" value="">
        </div>
        <button onclick="addItem()">Add</button>
      </div>
    </div>
  </div>
  <div class="shipmenttable">
    <form action="" method="post">
      <div id="product-form-box">
        <div id="new-form-box">
          <h1>empty</h1>
        </div>
        <div class="product-form-item">
          <div class="productName">Fiddle: </div>
          <label for="productQty">Qty:</label>
          <input type="number" name="Qty[]" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="Weight[]" value="1">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="Width[]" value="60">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="Height[]" value="20">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="fiddleLength" value="10">
          </div>

        </div>
        <div class="product-form-item">
          <div class="productName">Dish: </div>
          <label for="productQty">Qty:</label>
          <input type="number" name="dishQty" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="dishWeight" value="0.1">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="dishWidth" value="30">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="dishHeight" value="30">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="dishLength" value="5">
          </div>

        </div>
        <div class="product-form-item">
          <div class="productName">Spoon: </div>
          <label for="productQty">Qty:</label>
          <input type="number" name="spoonQty" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="spoonWeight" value="0.05">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="spoonWidth" value="15">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="spoonHeight" value="5">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="spoonLength" value="2">
          </div>

        </div>

      </div>
      <input type="submit" name="submit" value="Submit">
    </form>
  </div>
  <div class="shipment-result">
    <?php
     
      if (isset($_POST['fiddleQty'])) {
          $product = new Products;
        
          $product -> set_productWeights($_POST['fiddleQty'], $_POST['fiddleWeight']);
          $product -> set_productWeights($_POST['dishQty'], $_POST['dishWeight']);
          $product -> set_productWeights($_POST['spoonQty'], $_POST['spoonWeight']);

          $product -> set_productDimensions($_POST['fiddleQty'], ($_POST['fiddleWidth'] * $_POST['fiddleHeight']*$_POST['fiddleLength']));
          $product -> set_productDimensions($_POST['dishQty'], ($_POST['dishWidth'] * $_POST['dishHeight']*$_POST['dishLength']));
          $product -> set_productDimensions($_POST['spoonQty'], ($_POST['spoonWidth'] * $_POST['spoonHeight']*$_POST['spoonLength']));
      }
    ?>
    <div class="result">
      <?php if (isset($_POST['fiddleQty'])): ?>
      <div class="result-box">
        <p>Total Weights: </p>
        <p><?php echo htmlspecialchars((array_sum($product -> get_productWeights())), ENT_QUOTES, 'UTF-8'); ?>kg</p>
      </div>
      <div class="result-box">
        <p>Total Dimensions: </p>
        <p><?php echo htmlspecialchars((array_sum($product -> get_productDimensions())), ENT_QUOTES, 'UTF-8'); ?>cm</p>
      </div>
      <?php endif ?>
    </div>

  </div>
  <script>
  let newFormBox = document.getElementById('new-form-box');
  console.log(newFormBox);

  function storageReset() {
    localStorage.clear();
    location.reload();
  }

  function disPlayForm() {
    let newBox = document.getElementById("item-info");
    newBox.style.display = "block";
  }

  function addItem() {
    let newProductName = document.getElementsByName("newProductName")[0].value;
    let newProductWeight = document.getElementsByName("newProductWeight")[0].value;
    let newWidth = document.getElementsByName("newWidth")[0].value;
    let newHeight = document.getElementsByName("newHeight")[0].value;
    let newLength = document.getElementsByName("newLength")[0].value;

    const div = document.createElement('div');

    div.className = 'row';

    div.innerHTML += `
    <div class="product-form-item">
          <div class="productName">` + newProductName + ` </div>
          <label for="productQty">: Qty:</label>
          <input type="number" name="` + newProductName + `Qty" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="` + newProductName + `Weight" value="` + newProductWeight + `">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="` + newProductName + `Width" value="` +
      newWidth + `">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="` + newProductName + `Height" value="` + newHeight + `">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="` + newProductName + `Length" value="` + newLength + `">
          </div>

        </div>
`;

    console.log(div);


    if (localStorage.lenth !== 0) {
      let storageNum = localStorage.length + 1;
      console.log(storageNum);
      localStorage.setItem(storageNum, div.innerHTML);

      let newDivs = localStorage.getItem(storageNum);

      console.log(newDivs);
      newFormBox.innerHTML += newDivs;
    }

  }
  console.log(localStorage);

  if (localStorage.length !== 0) {
    console.log(newFormBox);
    for (let i = 1; i <= localStorage.length; i++) {
      newFormBox.innerHTML += localStorage.getItem(i);
    }
  }
  </script>
</body>

</html>