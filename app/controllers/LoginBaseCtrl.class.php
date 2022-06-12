<?php

namespace app\controllers;

use core\App;
use core\SessionUtils;
use core\Utils;
use core\RoleUtils;
use core\ParamUtils;
use app\forms\LoginForm;

class LoginBaseCtrl {

    private $form;
    private $records;
    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new LoginForm();
    }

    public function validate()
    {
        $this->form->login = ParamUtils::getFromRequest('login');
        $this->form->pass = ParamUtils::getFromRequest('pass');

        //nie ma sensu walidować dalej, gdy brak parametrów
        if (!isset($this->form->login))
            return false;

        // sprawdzenie, czy potrzebne wartości zostały przekazane
        if (empty($this->form->login)) {
            Utils::addErrorMessage('Nie podano loginu');
        }
        if (empty($this->form->pass)) {
            Utils::addErrorMessage('Nie podano hasła');
        }

        //nie ma sensu walidować dalej, gdy brak wartości
        if (App::getMessages()->isError())
            return false;


        $where = ["login" => $this->form->login, "password" => $this->form->pass];
        //wykonanie zapytania
        //wykonanie zapytania

//        try {
//            $this->records = App::getDB()->select("users", [
//                "[><]users_role" => ["user_id" => "client_id"]
//            ], [
//                "[><]role" => ["role_id" => "role_id"]
//            ],[
//                "client_id",
//                "login",
//                "password",
//                "name",
//            ], $where);
//        } catch (\PDOException $e) {
//            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
//            if (App::getConf()->debug)
//                Utils::addErrorMessage($e->getMessage());
//        }
        try {
            $this->records = App::getDB()->query("
                SELECT client_id,login, password, r.name
                FROM users us
                INNER JOIN users_role ur
                ON ur.user_id = us.client_id
                INNER JOIN role r
                ON ur.role_id = r.role_id
                WHERE us.login LIKE :login", [
                ":login" => $this->form->login
                ])->fetchAll();
        } catch (\PDOException $e) {
            Utils::addErrorMessage('Wystąpił błąd podczas pobierania rekordów');
            if (App::getConf()->debug)
                Utils::addErrorMessage($e->getMessage());
        }
//         sprawdzenie, czy dane logowania poprawne
//         (takie informacje najczęściej przechowuje się w bazie danych)

//        print_r(  $this->records );

        if (empty($this->records)) {
            Utils::addErrorMessage('Nie ma takiego konta');
            return false;
        }
        if ($this->form->pass != $this->records["0"]["password"]){
            Utils::addErrorMessage('Podano niepoprawne hasło');
            return false;
        }
        if ($this->records["0"]["name"] == "admin") {
            RoleUtils::addRole('admin');
        } else  if ($this->records["0"]["name"] == "worker") {
            RoleUtils::addRole('worker');
        }
            else  if ($this->records["0"]["name"] == "user") {
                RoleUtils::addRole('user');
        } else {
            Utils::addErrorMessage('Niepoprawny login lub hasło');
        }

        return !App::getMessages()->isError();
    }

    public function action_loginView() {
        $this->generateView();
    }

    public function action_login() {
        if ($this->validate()) {
            //zalogowany => przekieruj na główną akcję (z przekazaniem messages przez sesję)
            Utils::addErrorMessage('Poprawnie zalogowano do systemu');
            $id = $this->records["0"]["client_id"];
            SessionUtils::store('logged_user',$id);
            App::getRouter()->redirectTo("home");
        } else {
            //niezalogowany => pozostań na stronie logowania
            $this->generateView();
        }
    }

    public function action_logout() {
        // 1. zakończenie sesji
        session_destroy();
        // 2. idź na stronę główną - system automatycznie przekieruje do strony logowania
        App::getRouter()->redirectTo('loginView');
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza do widoku
        App::getSmarty()->display('Login.tpl');
    }

}
