<?php

namespace app\controllers;

use app\forms\OrderEditForm;
use app\forms\ProductSearchForm;
use core\App;
use core\Utils;
use core\ParamUtils;


class OrderListCtrl {
    private $status_list;
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych
    private $editform;
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
            $this->status_list = App::getDB()->query(
                "SELECT status_id, status_name 
                FROM order_status 
                ")->fetchAll();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        try {
            $this->records = App::getDB()->query(
                "SELECT order_id, first_name, last_name, status_name 
                FROM orders o
                INNER JOIN users u
                ON u.client_id = o.client_id
                INNER JOIN order_status os
                ON os.status_id = o.order_status")->fetchAll();
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
        App::getRouter()->forwardTo('ordersList');


    }
    public function action_ordersList() {
        $this->load_data();
        App::getSmarty()->assign('order_status', $this->status_list);
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('orders', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('OrdersListFullPage.tpl');
    }

    public function action_ordersListPart() {
        $this->load_data();
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('orders', $this->records);
        App::getSmarty()->display('OrdersListTable.tpl');
    }
}
