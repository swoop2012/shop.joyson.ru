<?php
/*structure:
array(
  'idSubProduct'=>array(
		'Name'=>'',
 		'Count'=>'',
		'Price'=>'',
     )
 )
*/
class Basket extends CComponent{
    
    private static function getProduct($id){
	$products = Yii::app()->session['basket'];
	if(isset($products[$id]))
	    return $products[$id];
	else return NULL;
	    
    }
    
    private static function setProduct($key,$value){
	$products = Yii::app()->session['basket'];
	$products[$key] = $value;
	Yii::app()->session['basket'] = $products;
    }
    
    public static function clearBasket(){
	Yii::app()->session['basket'] = array();
    }
    public static function getBasket(){
	return Yii::app()->session['basket'];
    }

    public static function setBasket($basket){
        Yii::app()->session['basket'] = $basket;
    }

    public static function addProduct($key,$value){
	$product = self::getProduct($key);
	if(!empty($product))
	    $product['Count']++;
	else
	    $product = $value;
	self::setProduct($key, $product);
    }

    public static function deleteProduct($key){
        $basket = self::getBasket();
        unset($basket[$key]);
        self::setBasket($basket);
    }

    public static function updateCount($key,$sign){
	$product = self::getProduct($key);
	if(!empty($product))
	{
	    eval('$product["Count"]'.$sign.$sign.';');
	    self::setProduct($key, $product);
	}
	return $product;
    }

}
?>
