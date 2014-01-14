<!--
php code for Gulasch-2-Go 
Author: Stephan Menzi menzs2
-->
<?php
//The productlist 
class productList {

    private $items = array();

    function __construct() {
        $myShopDB = new ShopDB();
        $res = $myShopDB->getAllProducts();
        while ($items = $res->fetch_object()) {
            $this->addShopItem(new shop_Item($items));
        }
        $myShopDB->close();
    }

    private function addShopItem($item) {
        $itemkey = $item->name;
        $typekey = $item->type;
        if (!isset($this->items[$typekey])) {
            $this->items[$typekey] = array();
        }
        $this->items[$typekey][$itemkey] = $item;
    }

    public function displayProductList() {
        foreach ($this->items as $typekey => $type) {
            echo "<div ID=\"$typekey\">";
            $this->displayItemTypeList($type, $typekey);
            echo"</div>";
        }
    }

    private function displayItemTypeList($type, $group_title) {
        $title = implode(getTextelement($group_title));
        echo "<h1>$title</h1>";
        foreach ($type as $item) {
            $item->displayShopItem();
        }
    }

    public function displayItem($itemkey) {
        $this->items[$itemkey]->displayShopItem;
    }

}

//a product
class shop_Item {

    public $itemkey;
    public $name;
    public $type;
    private $description;
    private $price;

    function __construct($item) {
        $this->itemkey = $item->itemkey;
        $this->name = $item->name;
        $this->type = $item->type;
        $this->description = $item->description;
        $this->price = $item->price;
    }

    function displayShopItem() {
        $url = set_url('menu');
        echo "<p>$this->name</br>$this->description</br>CHF " . number_format($this->price, 2) . "</br>";
        echo "<form action=\"$url\" method=\"post\" ID=\"$this->itemkey\">";
        $this->amount_fields($this->itemkey);
        echo "</form></p>";
    }
    function amount_fields($itemkey) {
        echo "<input  type=\"hidden\"  name=\"add\" value=\"true\">";
        echo "<input  type=\"hidden\"  name=\"itemkey\" value=\"$itemkey\">";
        echo "<select name=\"qty\" size=\"1\">";
        for ($i = 0; $i < 7; $i++) {
            echo "<option value=\"$i\">$i</option>";
        }
        echo "</select>";
        jhref("addToCart($itemkey)", "to Cart","class=\"tocart\"");
        }

}

//a shopping cart that stores all selected Items
class shoppingcart {

    private $items = array();
    private $amount;

    function __construct() {
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = serialize($this);
            $this->amount = 0;   
            }
    }

    public function addItemFromMenu($itemkey, $qty) {
        for ($i = 0; $i < $qty; $i++) {
            $this->items[] =  $itemkey;
        }
        $this->resetIndices();
        $_SESSION["cart"] = serialize($this);
    }

    public function removeItem($index) {
        unset($this->items[$index]);
        $this->resetIndices();
        $_SESSION["cart"] = serialize($this);
    }

    public function displayCart($cartType) {
       
        $cartID = $cartType . 'shoppingcart';
        echo "<div ID=\"$cartID\">";
        echo "<h1>Ihr Warenkorb</h1>";
        if (count($this->items) == 0) {
            echo "Es ist noch nichts im Warenkorb";
        } else {
            $myShopDB = new ShopDB();
            foreach ($this->items as $index => $shopItemKey) {
                $res = $myShopDB->getProduct($shopItemKey);
                $item = $res->fetch_object();
                $this->displayCartItem($item, $index);
                $this->amount += $item->price;
                }
            echo "<p class\=total\">Total: CHF     " . number_format($this->amount, 2) ."</p>";
            $this->clearCart();
            
            $myShopDB->close();
            }
        echo"</div>";
        
    }
    private function displayCartItem($item, $index){
        $action = set_url(get_param("id", "cart"));
        echo "<form action=\"$action\" method=\"post\" name=\"cartItem\">";
                echo "<p>$item->name</br>CHF " . number_format($item->price, 2) . "</br>";
                if($item->type == "maindish"){
					$this->displayOptions();
				}
                echo "<input  type=\"hidden\"  name=\"remove\" value=\"$index\">";
                jhref("removeFromCart($index)", 'remove', "class=\"tocart\"");
                echo "</form></p>";
    }

    private function displayOptions(){
//		$options = array();
		$optShopDB = new ShopDB();
		$res= $optShopDB->getOptions('MenuItem');
		while ($options = $res->fetch_array()) {
			echo "<input  type=\"checkbox\" name=\"itemoption\" value=\"$options[optkey]\"> $options[name] CHF  ". number_format($options['price'], 2) . " </input></br>";
		
		}
		$optShopDB->close();
	}
 
    private function clearCart(){
        $action = set_url(get_param("id", "cart"));
        echo "<form ID=\"clearcart\" action=\"$action\" method=\"post\" >";
            echo "<input  type=\"hidden\"  name=\"remove\" value=\"all\">";
            jhref("clearCart", 'remove all', "class=\"tocart\"");
        echo "</form></p>";
    }
            
    public function checkForInputs() {
        $this->checkForAdd();
        $this->checkForRemove();
    }

    private function checkForAdd() {
        if (isset($_POST["add"])) {
            $itemkey = $_POST["itemkey"];
            $quantity = $_POST["qty"];
            $this->addItemFromMenu($itemkey, $quantity);
        }
    }

    private function checkForRemove() {
        if (isset($_POST["remove"])) {
            if ($_POST["remove"] == 'all') {
                $this->resetCart();
            } else {
                $this->removeItem($_POST["remove"]);
            }
        }
    }

    private function resetIndices() {
        $temp = $this->items;
        $this->items = array_values($temp);
    }

    function resetCart() {
        foreach ($this->items as $key => $item) {
            unset($this->items[$key]);
        }
        $this->items = array();
        $_SESSION["cart"] = serialize($this);
    }
}
?>

<!-- SQL -->

<?php

//SQL functions
class ShopDB extends mysqli {

    function __construct() {
        parent::__construct("localhost", "root", "");
        parent::select_db("g2g");
    }

    function getAllProducts() {
        $lan = $_SESSION['lan'];
        $fields = "MIT_PK AS itemkey, MIT_Type AS type, name.name, descr.TXT_$lan AS description, MIT_Price AS price";
        $innerquery = "(SELECT MIT_PK, MIT_Type, MIT_Description, MIT_price, TXT_$lan as name FROM `menuitem` Join texts on TXT_PK = MIT_Name)";
        return $this->query("SELECT $fields FROM texts as descr JOIN $innerquery as name ON descr.TXT_PK = MIT_Description");
    }

    function getProduct($key) {
        $lan = $_SESSION['lan'];
        $fields = "MIT_PK AS itemkey, MIT_Type AS type, name.name, descr.TXT_$lan AS description, MIT_Price AS price";
        $innerquery = "(SELECT MIT_PK, MIT_Type, MIT_Description, MIT_price, TXT_$lan as name FROM `menuitem` Join texts on TXT_PK = MIT_Name)";
        return $this->query("SELECT $fields FROM texts as descr JOIN $innerquery as name ON descr.TXT_PK = MIT_Description WHERE MIT_PK = $key");
    }
    function getOptions($type){
        $lan = $_SESSION['lan'];
        return $this->query("SELECT OPT_PK as optkey,  OPT_price as price, TXT_$lan as name FROM options Join texts on TXT_PK = OPT_Name WHERE OPT_Type like \"$type%\"");
    }
    function insertOrder() {
        
    }

    public function getText($code) {
        if (!isset($_SESSION["lan"])){
        return array();
        }  
        else{
        $lan = $_SESSION['lan'];
        return $this->query("SELECT TXT_Code as code, TXT_$lan as textelement FROM texts where TXT_code like \"$code%\"");
        }
    }

}
?>

<!--Text, Data to be moved to DB-->




<?php
$content = array('main' => 'main_page', 'menu' => 'menu_list', 'information' => 'information', 'cart' => 'cart', 'login'=>'userlogin');

$navigation = array('main' => "Main", 'menu' => "Menu", 'information' => "Information", 'cart' => 'Cart');


