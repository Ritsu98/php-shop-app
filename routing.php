<?php

use core\App;
use core\Utils;

App::getRouter()->setDefaultRoute('home'); #default action
App::getRouter()->setLoginRoute('login'); #action to forward if no permissions

Utils::addRoute('home', 'HomeCtrl');
Utils::addRoute('itemView', 'HomeCtrl');
Utils::addRoute('login', 'LoginBaseCtrl');
//Utils::addRoute('action_name', 'controller_class_name');
Utils::addRoute('loginView',     'LoginCtrl');
Utils::addRoute('logout',        'LoginCtrl');
Utils::addRoute('productList',    'ProductListCtrl',	['admin','worker']);
Utils::addRoute('productListPart','ProductListCtrl',	['admin','worker']);
Utils::addRoute('productNew',    'ProductEditCtrl',	['worker']);
Utils::addRoute('productEdit',    'ProductEditCtrl',	['worker']);
Utils::addRoute('productSave',    'ProductEditCtrl',	['worker']);
Utils::addRoute('productDelete',    'ProductEditCtrl',	['admin']);
Utils::addRoute('showCart', 'CartCtrl');
Utils::addRoute('addToCart', 'CartCtrl');
Utils::addRoute('deleteFromCart', 'CartCtrl');
Utils::addRoute('placeOrder', 'OrderCtrl',['admin','worker','user']);
Utils::addRoute('ordersList', 'OrderListCtrl',['worker']);
Utils::addRoute('statusUpdate', 'OrderListCtrl',['worker']);
Utils::addRoute('orderView', 'OrderListCtrl',['worker']);
Utils::addRoute('usersList', 'UserListCtrl',['admin']);
Utils::addRoute('roleUpdate', 'UserListCtrl',['admin']);
Utils::addRoute('signUp', 'RegisterCtrl');
Utils::addRoute('register', 'RegisterCtrl');
