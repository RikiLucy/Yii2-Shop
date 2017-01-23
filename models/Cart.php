<?php
/**
 * Created by PhpStorm.
 * User: Djon
 * Date: 23.01.2017
 * Time: 13:59
 */

namespace app\models;


use yii\db\ActiveRecord;

class Cart extends ActiveRecord
{
    public function addToCart($product, $qty = 1){
        if(isset($_SESSION['cart'][$product->id])){ //если товар есть, увеличиваем его кол-во
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        }else{
            $_SESSION['cart'][$product->id] = [ // если товара нету - создаем
                'qty' => $qty,
                'name' => $product->name,
                'price' => $product->price,
                'img' => $product->img
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        // если товар уже был, то его кол-во плюс еще, если не было, передаем просто кол-во
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $product->price : $qty * $product->price;







    }

}