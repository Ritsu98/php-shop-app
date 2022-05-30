<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('home'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('home', 'HomeCtrl');
Utils::addRoute('itemView', 'HomeCtrl');
Utils::addRoute('login', 'LoginCtrl');
//Utils::addRoute('action_name', 'controller_class_name');
Utils::addRoute('loginView',     'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('productList',    'ProductListCtrl',	['admin','user']);

Utils::addRoute('productListPart','ProductListCtrl',	['admin']);
Utils::addRoute('productNew',    'ProductEditCtrl',	['admin','user']);
Utils::addRoute('showCart', 'CartCtrl');
