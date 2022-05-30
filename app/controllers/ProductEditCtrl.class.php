<?php

namespace app\controllers;

use app\forms\ProductEditForm;
use core\App;
use core\Utils;
use core\ParamUtils;
use core\Validator;


class ProductEditCtrl {

    private $form; //dane formularza

    public function __construct() {
        //stworzenie potrzebnych obiektów
        $this->form = new ProductEditForm();
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
    public function validateSave() {
        //Pobranie id z walidacją czy istnieje (isset)
        $this->form->id = ParamUtils::getFromPost('id', true, 'Błędne wywołanie aplikacji');

        // Używaj ParamUtils::getFromXXX('param',true,"...") do sprawdzenia czy parametr
        // został przesłany, -  czy ISTNIEJE (isset) - może być pusty, ale jest
        
        
        $v = new Validator();

        $this->form->name = $v->validateFromPost('name', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj nazwę produktu',
            'min_length' => 2,
            'max_length' => 32,
            'validator_message' => 'Nazwa produktu powinna zawierać od 2 do 32 znaków'
        ]);
        
        // Używaj walidatora z konfiguracją "'required' => true" aby sprawdzić,
        // czy parametr NIE JEST PUSTY (!empty)
        
        $this->form->price = $v->validateFromPost('price', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj nazwisko',
            'min_length' => 1,
            'max_length' => 20,
            'validator_message' => 'Nazwisko powinno mieć od 2 do 20 znaków'
        ]);
        $this->form->description = $v->validateFromPost('description', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj opis produktu',
            'min_length' => 0,
            'max_length' => 200,
            'validator_message' => 'Opis może zawierać maksymalnie 200 znaków'
        ]);
        $this->form->category_id = $v->validateFromPost('category_id', [
            'trim' => true,
            'required' => true,
            'required_message' => 'Podaj id kategorii',
            'min_length' => 0,
            'max_length' => 200,
            'validator_message' => 'Opis może zawierać maksymalnie 200 znaków'
        ]);
        
        return !App::getMessages()->isError();
    }

    //validacja danych przed wyswietleniem do edycji
    public function validateEdit() {
        //pobierz parametry na potrzeby wyswietlenia danych do edycji
        //z widoku listy osób (parametr jest wymagany)
        $this->form->id = ParamUtils::getFromCleanURL(1, true, 'Błędne wywołanie aplikacji');
        return !App::getMessages()->isError();
    }

    public function action_productNew() {
        $this->generateView();
    }

    //wysiweltenie rekordu do edycji wskazanego parametrem 'id'
    public function action_productEdit() {
        // 1. walidacja id osoby do edycji
        if ($this->validateEdit()) {
            try {
                // 2. odczyt z bazy danych osoby o podanym ID (tylko jednego rekordu)
                $record = App::getDB()->get("product", "*", [
                    "product_id" => $this->form->id
                ]);
                // 2.1 jeśli osoba istnieje to wpisz dane do obiektu formularza
                $this->form->id = $record['product_id'];
                $this->form->name = $record['name'];
                $this->form->price = $record['prize'];
                $this->form->category_id = $record['category_id'];
                $this->form->description = $record['description'];
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas odczytu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Wygenerowanie widoku
        $this->generateView();
    }

    public function action_productDelete() {
        // 1. walidacja id osoby do usuniecia
        if ($this->validateEdit()) {

            try {
                // 2. usunięcie rekordu
                App::getDB()->delete("product", [
                    "product_id" => $this->form->id
                ]);
                Utils::addInfoMessage('Pomyślnie usunięto rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił błąd podczas usuwania rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }
        }

        // 3. Przekierowanie na stronę listy osób
        App::getRouter()->forwardTo('productList');
    }

    public function action_productSave() {

        // 1. Walidacja danych formularza (z pobraniem)
        if ($this->validateSave()) {
            // 2. Zapis danych w bazie
            try {

                //2.1 Nowy rekord
                if ($this->form->id == '') {
                    //sprawdź liczebność rekordów - nie pozwalaj przekroczyć 20
                    $count = App::getDB()->count("product");
                    if ($count <= 20) {
                        App::getDB()->insert("product", [
                            "name" => $this->form->name,
                            "prize" => $this->form->price,
                            "description" => $this->form->description,
                            "category_id" => $this->form->category_id,

                        ]);
                    } else { //za dużo rekordów
                        // Gdy za dużo rekordów to pozostań na stronie
                        Utils::addInfoMessage('Ograniczenie: Zbyt dużo rekordów. Aby dodać nowy usuń wybrany wpis.');
                        $this->generateView(); //pozostań na stronie edycji
                        exit(); //zakończ przetwarzanie, aby nie dodać wiadomości o pomyślnym zapisie danych
                    }
                } else {
                    //2.2 Edycja rekordu o danym ID
                    App::getDB()->update("product", [
                        "name" => $this->form->name,
                        "prize" => $this->form->price,
                        "description" => $this->form->description,
                        "category_id" => $this->form->category_id
                            ], [
                        "product_id" => $this->form->id
                    ]);
                }
                Utils::addInfoMessage('Pomyślnie zapisano rekord');
            } catch (\PDOException $e) {
                Utils::addErrorMessage('Wystąpił nieoczekiwany błąd podczas zapisu rekordu');
                if (App::getConf()->debug)
                    Utils::addErrorMessage($e->getMessage());
            }

            // 3b. Po zapisie przejdź na stronę listy osób (w ramach tego samego żądania http)
            App::getRouter()->forwardTo('productList');
        } else {
            // 3c. Gdy błąd walidacji to pozostań na stronie
            $this->generateView();
        }
    }

    public function generateView() {
        App::getSmarty()->assign('form', $this->form); // dane formularza dla widoku
        App::getSmarty()->display('ProductAdd.tpl');
    }

}
