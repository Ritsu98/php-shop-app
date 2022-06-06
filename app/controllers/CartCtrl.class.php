<?php

namespace app\controllers;

use app\forms\CartForm;
use core\App;
use core\Message;
use core\ParamUtils;
use core\SessionUtils;
use core\Utils;

class CartCtrl {
    private $form;
    public function __construct() {
        $this->form = new CartForm();
    }
    
    public function action_showCart() {
		 if(isset($_SESSION['shopping_cart'])){
             $cart = SessionUtils::load('shopping_cart',$keep = true);
         }
         else {
            $cart = 0;
             Utils::addInfoMessage("Twój koszyk jest pusty");
         }
        App::getSmarty()->assign("cart",$cart);


        App::getSmarty()->display("Cart.tpl");


        
    }
    public function action_addToCart()
    {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->form->item_name = ParamUtils::getFromRequest('item_name');
        $this->form->price = ParamUtils::getFromRequest('price');
        $this->form->quantity = ParamUtils::getFromRequest('quantity');
        if(isset($_SESSION['shopping_cart'])){
            $item_array = SessionUtils::load('shopping_cart',$keep = true);
                $array = array(
                    'item_id' => $this->form->id,
                    'name' => $this->form->item_name,
                    'price'=> $this->form->price,
                    'quantity' => $this->form->quantity
                );
//                foreach ($item_array as $e){
//                    if($e["item_id"] == $this->form->id){
//                        $e["quantity"] +=1;
//                    }
//                }
            array_push($item_array,$array);


            SessionUtils::store('shopping_cart',$item_array);
        }
        else{
            $item_array = array(
                 array(
                'item_id' => $this->form->id,
                'name' => $this->form->item_name,
                'price'=> $this->form->price,
                'quantity' => $this->form->quantity
                ),
            );

            SessionUtils::store('shopping_cart',$item_array);
            Utils::addInfoMessage("Dodano do koszyka");
        }

        App::getRouter()->redirectTo('showCart');
    }


    public function action_deleteFromCart()
    {
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $item_array = SessionUtils::load('shopping_cart',$keep = true);
        unset($item_array[$this->form->id]);
        SessionUtils::store('shopping_cart',$item_array);
        App::getRouter()->redirectTo('showCart');
    }

}
