<?php

namespace app\controllers;

use core\App;
use core\Message;
use core\Utils;

class CartCtrl {
    
    public function action_showCart() {
		        
        $variable = 123;
        
        App::getMessages()->addMessage(new Message("Hello world message", Message::INFO));
        Utils::addInfoMessage("Or even easier message :-)");
        

        App::getSmarty()->display("Cart.tpl");
        
    }
    
}
