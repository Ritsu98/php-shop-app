<?php

namespace app\controllers;

use app\forms\ProductSearchForm;
use app\forms\RoleEditForm;
use core\App;
use core\Utils;
use core\ParamUtils;


class UserListCtrl {
    private $role_list;
    private $editform;
    private $form; //dane formularza wyszukiwania
    private $records; //rekordy pobrane z bazy danych

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new ProductSearchForm();
        $this->editform = new RoleEditForm();
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
            $this->role_list = App::getDB()->query(
                "SELECT name, role_id
                FROM role 
                ")->fetchAll();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

        try {
            $this->records = App::getDB()->query(
                "SELECT u.client_id, u.first_name, u.last_name, u.login , r.name 
                FROM users u
                INNER JOIN users_role ur
                ON u.client_id = ur.user_id
                INNER JOIN role r
                ON ur.role_id = r.role_id")->fetchAll();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }

    }

    public function action_roleUpdate() {
        $this->editform->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        $this->editform->role = ParamUtils::getFromRequest('role');
        try{

        App::getDB()->query("UPDATE users_role
        SET role_id = :role
        WHERE user_id = :id;",[':role' => $this->editform->role, ':id'=> $this->editform->id]);
            Utils::addInfoMessage('Pomyślnie zapisano rekord');
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
        App::getRouter()->forwardTo('usersList');


    }

    public function action_usersList() {
        $this->load_data();
        App::getSmarty()->assign('role_list', $this->role_list);
        App::getSmarty()->assign('searchForm', $this->form); // dane formularza (wyszukiwania w tym wypadku)
        App::getSmarty()->assign('users', $this->records);  // lista rekordów z bazy danych
        App::getSmarty()->display('UsersListFullPage.tpl');
    }

    public function action_usersListPart() {
        $this->load_data();
        App::getSmarty()->assign('role_list', $this->role_list);
        App::getSmarty()->assign('searchForm', $this->form);
        App::getSmarty()->assign('users', $this->records);
        App::getSmarty()->display('UsersListTable.tpl');
    }
}
