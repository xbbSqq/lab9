<style>
<?php include './styles.css'; ?>
</style>

<?php

$email = $_POST["email"];
$password = $_POST["password"];
$qtys = array(
  (int)$_POST["item0qty"],
  (int)$_POST["item1qty"],
  (int)$_POST["item2qty"]
);
$shipCost = (int)$_POST["shipCost"];

function itemToName($i) {
  switch($i) {
    case 0: return "Lamborghini";
    case 1: return "G500";
    case 2: return "Mercedes";
  }
}

function itemToCost($i) {
  switch($i) {
    case 0: return 25;
    case 1: return 20;
    case 2: return 15;
  }
}

function shipCostToDescription($cost) {
  switch($cost) {
    case 0: return "Free 7-day";
    case 5: return "$5.00 3-day";
    case 50: return "$50.00 Overnight";
   }
}

function toPrice($index, $qty) {
  $itemCost = itemToCost($index);
  return $itemCost * $qty;
}

function totalPrice($qtys, $shipCost) {
  $cnt = 0;
  for($i=0;$i < 3; $i++) {
    $cnt = $cnt + toPrice($i, $qtys[$i]);
  }
  return $cnt + $shipCost;
}

function toDollarStr($int) {
  return "$" . $int . ".00";
}

function displayTopRow() {
  echo "<tr><td class='tablehead'><div></div></td><td><div class='tablehead'>Quantity</div></td><td><div class='tablehead'>Cost Per Item</div></td><td><div class='tablehead'>Sub Total</div></td></tr>";
}

function displayItemRow($i, $qty) {
  echo "<tr>";
  echo "<td><div class='tablehead'>" . itemToName($i) . "</div></td>";
  echo "<td><div class='tablebody'>" . $qty . "</div></td>";
  echo "<td><div class='tablebody'>" . toDollarStr(itemToCost($i)) . "</div></td>";
  echo "<td><div class='tablebody'>" . toDollarStr(toPrice($i, $qty)) . "</div></td>";
  echo "</tr>";
}

function displayItemRows($qtys) {
  for($i=0; $i < 3; $i++) {
    displayItemRow($i, $qtys[$i]);
  }
}

function displayShipRow($shipCost) {
  echo "<tr>";
  echo "<td><div class='tablehead'>Shipping</div></td>";
  echo "<td colspan='2'><div class='tablebody'>" . shipCostToDescription($shipCost) . "</div></td>";
  echo "<td><div class='tablebody'>" . toDollarStr($shipCost) . "</div></td>";
  echo "</tr>";
}

function displayTotalRow($total) {
  echo "<tr>";
  echo "<td colspan='3'><div class='tablehead'>Total Cost</div></td>";;
  echo "<td><div class='tablehead'>" . toDollarStr($total) . "</div></td>";
  echo "</tr>";
}

function welcomeMsg($email, $password) {
  echo "<p>Thank you for shopping with us, <b>" . $email . "</b><br>Your password is: <b>" . $password . "</b></p>";
}

function displayTable($qtys, $shipCost) {
  echo "<table align='center' style='width:90%'>";
  displayTopRow();
  displayItemRows($qtys);
  displayShipRow($shipCost);
  displayTotalRow(totalPrice($qtys, $shipCost));
  echo "</table>";
}

echo "<div id='wrapPHP'><h2>Order Receipt</h2>";
welcomeMsg($email, $password);
displayTable($qtys, $shipCost);
echo "</div>";

 ?>
