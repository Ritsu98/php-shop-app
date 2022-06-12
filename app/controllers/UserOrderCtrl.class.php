<?php

namespace app\controllers;

use app\forms\OrderEditForm;
use app\forms\ProductSearchForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\SessionUtils;


class UserOrderCtrl {
    private $status_list;
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    private $editform;
    private $order_item;
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new ProductSearchForm();
        $this->editform = new OrderEditForm();
    }

    public function validate() {
        // 1. sprawdzenie, czy parametry zostały przekazane
        // - nie trzeba sprawdzać
        $this->form->name = ParamUtils::getFromRequest('sf_name');

        // 2. sprawdzenie poprawności przekazanych parametrów
        // - nie trzeba sprawdzać

        return !App::getMessages()->isError();
    }

    public function load_data() {
        $this->form->id = SessionUtils::load('logged_user',$keep = true);
        $this->validate();

        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->name) && strlen($this->form->name) > 0) {
            $search_params['name[~]'] = $this->form->name . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }


        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        

        try {
            $this->records = App::getDB()->query(
                "SELECT order_id, first_name, last_name, status_name 
                FROM orders o
                INNER JOIN users u
                ON u.client_id = o.client_id
                INNER JOIN order_status os
                ON os.status_id = o.order_status WHERE u.client_id = :id",[':id'=>$this->form->id])->fetchAll();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    }
    public function action_statusUpdate() {
        $this->editform->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->editform->status = ParamUtils::getFromRequest('status');
        try{

        App::getDB()->update("orders", [
            "order_status" => $this->editform->status,

        ], [
            "order_id" => $this->editform->id
        ]);
            Utils::addInfoMessage('Pomyślnie zapisano rekord');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->forwardTo('userOrdersList');

    }
    public function action_userOrdersList() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('orders', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('UserOrdersListFullPage.tpl');
    }

    public function action_ordersListPart() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('orders', $this->records);
        App::getSmarty()->display('OrdersListTable.tpl');
    }
    public function action_orderView() {
        $id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');


        try {
            $this->records = App::getDB()->query("
            SELECT p.name, o.quantity FROM order_items o INNER JOIN product p ON p.product_id = o.product_id where o.order_id = :order;
            ",[':order'=>$id])->fetchAll();

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


        // 3. Wygenerowanie widoku
        App::getSmarty()->assign('id',$id);
        App::getSmarty()->assign('order',$this->records);
        App::getSmarty()->display("UserOrdersListFullPage.tpl");
    }
}
