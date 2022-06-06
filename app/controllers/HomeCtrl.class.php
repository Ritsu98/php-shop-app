<?php

namespace app\controllers;

use app\forms\ProductSearchForm;

use core\App;
use core\Message;
use core\ParamUtils;
use core\Utils;


class HomeCtrl {
    private $record;
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new ProductSearchForm();
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
        // 1. Walidacja danych formularza (z pobraniem)

        $this->validate();

        // 2. Przygotowanie mapy z parametrami wyszukiwania (nazwa_kolumny => wartość)
        $search_params = []; //przygotowanie pustej struktury (aby była dostępna nawet gdy nie będzie zawierała wierszy)
        if (isset($this->form->name) && strlen($this->form->name) > 0) {
            $search_params['name[~]'] = $this->form->name . '%'; // dodanie symbolu % zastępuje dowolny ciąg znaków na końcu
        }

        // 3. Pobranie listy rekordów z bazy danych

        $num_params = sizeof($search_params);
        if ($num_params > 1) {
            $where = ["AND" => &$search_params];
        } else {
            $where = &$search_params;
        }
        //dodanie frazy sortującej po nazwisku
        $where ["ORDER"] = "name";
        //wykonanie zapytania

        try {
            $this->records = App::getDB()->select("product", [
                "product_id",
                "name",
                "prize",
            ], $where);
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    }

    public function action_home() {
        $this->load_data();
        App::getSmarty()->assign('products', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('Home.tpl');
    }

    public function action_itemView() {
        $id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');

        $this->validate();

        try {
            // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
            $this->record = App::getDB()->select("product", [
                "name",
                "prize",
                "description"
            ], [
                "product_id" => $id
            ]);

        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }


        // 3. Wygenerowanie widoku
        App::getSmarty()->assign('id',$id);
        App::getSmarty()->assign('item',$this->record[0]);
        App::getSmarty()->display("Item.tpl");
    }
}
