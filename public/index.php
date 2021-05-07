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
  }
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
  body {
    max-width: 1280px;
    margin: 0 auto;
  }

  #item-info {
    display: none;
  }

  .product-form-item {
    display: flex;
    margin: 10px 0px;
  }

  .new-item-box {
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .result-box {
    display: flex;
  }

  .header-box {
    display: flex;
    align-items: center;
    justify-content: center;
  }

  .shipmenttable {
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .shipmenttable form {
    max-width: 60%;
  }

  .shipmenttable form input {
    width: 28px;
    margin-right: 15px;
    text-align: center;
  }

  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
  }

  .productName {
    width: 53px;
  }

  .shipmenttable form input[type="submit"] {
    width: unset;
    padding: 10px 20px;
  }

  button {
    padding: 10px 20px;
    margin: 0px 10px;
  }

  input[type="number"] {
    width: 28px;
  }

  .new-item-box input {
    margin-right: 15px;
  }

  .new-item-box input[type="text"] {
    margin-right: 4px;
  }

  .header-box form input[type="submit"] {
    padding: 10px 20px;
  }
  </style>

</head>

<body>

  <div class="header-box">
    <h1>
      Shipment Management System
    </h1>

    <button onclick="disPlayForm()">Add New Item</button>
    <form action="" method="post"><input type="hidden" name="reset" value=""><input type="submit" value="Reset"
        onclick="storageReset()"></form>

  </div>
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
        </div>
        <div class="product-form-item">
          <div class="productName">Fiddle: </div>
          <label for="productQty">Qty:</label>
          <input type="number" name="qty[]" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="weight[]" value="1">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="width[]" value="60">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="height[]" value="20">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="length[]" value="10">
          </div>

        </div>
        <div class="product-form-item">
          <div class="productName">Dish: </div>
          <label for="productQty">Qty:</label>
          <input type="number" name="qty[]" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="weight[]" value="0.1">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="width[]" value="30">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="height[]" value="30">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="length[]" value="5">
          </div>

        </div>
        <div class="product-form-item">
          <div class="productName">Spoon: </div>
          <label for="productQty">Qty:</label>
          <input type="number" name="qty[]" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="weight[]" value="0.05">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="width[]" value="15">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="height[]" value="5">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="length[]" value="2">
          </div>

        </div>

      </div>
      <input type="hidden" name="result" value="result">
      <input type="submit" name="submit" value="Submit">
    </form>
    <div class="shipment-result">
      <?php
     if (isset($_POST['result'])) {
         $product = new Products;

         for ($i=0; $i < count($_POST['weight']); $i++) {
             $product -> set_productWeights($_POST['qty'][$i], $_POST['weight'][$i]);
             $product -> set_productDimensions($_POST['qty'][$i], ($_POST['width'][$i] * $_POST['height'][$i]*$_POST['length'][$i]));
         }
     }
     
   ?>
      <div class="result">

        <?php if (!empty($_POST['result'])): ?>
        <div class="result-wrap">
          <div class="result-box">
            <p>Total Weights: </p>
            <p><?php echo htmlspecialchars((array_sum($product -> get_productWeights())), ENT_QUOTES, 'UTF-8'); ?>kg
            </p>
          </div>
          <div class="result-box">
            <p>Total Dimensions: </p>
            <p>
              <?php echo htmlspecialchars((array_sum($product -> get_productDimensions())), ENT_QUOTES, 'UTF-8'); ?>cm
            </p>
          </div>
        </div>

        <?php endif ?>
      </div>

    </div>
  </div>

  <script>
  let newFormBox = document.getElementById('new-form-box');
  let newBox = document.getElementById("item-info");

  function storageReset() {
    let result = document.getElementsByClassName('result')[0];
    let childResult = document.getElementsByClassName('result-wrap')[0];
    console.log(result);
    console.log(childResult);
    result.removeChild(childResult);
    localStorage.clear();
    location.reload();
  }

  function disPlayForm() {

    newBox.style.display = "block";
  }

  function addItem() {
    let newProductName = document.getElementsByName("newProductName")[0].value;
    let newProductWeight = document.getElementsByName("newProductWeight")[0].value;
    let newWidth = document.getElementsByName("newWidth")[0].value;
    let newHeight = document.getElementsByName("newHeight")[0].value;
    let newLength = document.getElementsByName("newLength")[0].value;

    console.log(newProductName);
    console.log(newProductWeight);
    console.log(newWidth);
    console.log(newHeight);
    console.log(newLength);

    if (newProductName == "" || newProductWeight == "" || newWidth == "" || newHeight == "" || newLength == "") {
      alert("All inputs must be filled out");
      return false;
    }

    const div = document.createElement('div');

    div.className = 'row';

    div.innerHTML += `
    <div class="product-form-item">
          <div class="productName">` + newProductName + ` :</div>
          <label for="productQty">Qty:</label>
          <input type="number" name="qty[]" value="0">
          <label for="productWeight">Weight:</label>
          <input type="number" name="weight[]" value="` + newProductWeight + `">

          <div class="productDimension">Dimension:
            <label for="dimensionWidth">Width:</label>
            <input type="number" name="width[]" value="` + newWidth + `">
            <label for="dimensionHeight">Height:</label>
            <input type="number" name="height[]" value="` + newHeight + `">
            <label for="dimensionLength">Length:</label>
            <input type="number" name="length[]" value="` + newLength + `">
          </div>

        </div>
`;


    if (localStorage.lenth !== 0) {
      let storageNum = localStorage.length + 1;
      localStorage.setItem(storageNum, div.innerHTML);

      let newDivs = localStorage.getItem(storageNum);

      newFormBox.innerHTML += newDivs;
    }

    document.getElementsByName("newProductName")[0].value = '';
    document.getElementsByName("newProductWeight")[0].value = '';
    document.getElementsByName("newWidth")[0].value = '';
    document.getElementsByName("newHeight")[0].value = '';
    document.getElementsByName("newLength")[0].value = '';

    newBox.style.display = "none";


  }

  if (localStorage.length !== 0) {

    for (let i = 1; i <= localStorage.length; i++) {
      newFormBox.innerHTML += localStorage.getItem(i);
    }
  }
  </script>
</body>

</html>