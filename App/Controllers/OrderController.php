<?php

namespace App\Controllers;

use App\Models\Order;
use App\Models\User;
use Core\Helper;
use Core\Controller;

/**
 * OrderController.php
 * 
 */

class OrderController extends Controller
{
    public function cart()
    {
        //Получаем id пользователя из сессии
        $userId = Helper::checkLog();
        //Получаем всю информацию о пользователе из БД
        $user = User::getById($userId);
        
        $data = $_POST['cart'];
        $options = array();
        parse_str($_POST['user_props'], $options);
        
        User::updateProfile($userId, $options);
        
        Order::save($userId, $data);
        echo json_encode($options);
    }
}