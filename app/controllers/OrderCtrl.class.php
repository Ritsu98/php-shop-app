<?php

namespace app\controllers;

use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;
use app\forms\OrderForm;
use core\SessionUtils;


class OrderCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new OrderForm();
    }

    /* Walidacja danych przed zapisem (nowe dane lub edycja).
     * Poniżej pełna, możliwa konfiguracja metod walidacji:
     *  [ 
     *    'trim' => true,
     *    'required' => true,
     *    'required_message' => 'message...',
     *    'min_length' => value,
     *    'max_length' => value,
     *    'email' => true,
     *    'numeric' => true,
     *    'int' => true,
     *    'float' => true,
     *    'date_format' => format,
     *    'regexp' => expression,
     *    'validator_message' => 'message...',
     *    'message_type' => error | warning | info,
     *  ]
     */
    public function getOrderData() {
        $this->form->id = SessionUtils::load('logged_user',$keep = true);
        $this->form->items = SessionUtils::load('shopping_cart',$keep = false);
        $this->form->date = date('Y-m-d');
        return !App::getMessages()->isError();
    }


    public function action_placeOrder() {

        if ($this->getOrderData()) {
            try {
                $this->form->count = App::getDB()->count("orders");
                        App::getDB()->insert("orders", [
                            "order_id" => $this->form->count,
                            "client_id" => $this->form->id,
                            "order_status" => "Nowe",
                            "order_date" =>$this->form->date
                        ]);
                foreach ($this->form->items as &$item) {
                    App::getDB()->insert("order_items", [
                        "order_id" => $this->form->count,
                        "date" =>$this->form->date,
                        'product_id' => $item["item_id"],
                        'quantity' => $item["quantity"]
                    ]);
                }

                Utils::addInfoMessage('Pomyślnie zapisano rekord');
                }

             catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getSmarty()->display('OrderConfirm.tpl');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->display('Cart.tpl');
    }

}
