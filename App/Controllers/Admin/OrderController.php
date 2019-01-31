<?php

namespace App\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use Core\Helper;
use Core\Controller;

/**
 * OrderController.php
 * Контроллер для управления orders
 */
// require_once MODELS.'User.php';
// require_once MODELS.'Order.php';

class OrderController extends Controller
{
    /**
     * Главная страница управления orders
     *
     * @return bool
     */
    public function index()
    {
        $orders = Order::all();
        $title = 'Order List Page';
        $numRows = count($orders);
        $this->_view->showBack('admin/orders/index', compact('orders', 'title', 'numRows'));
    }

    /**
     * Просмотр конкретного заказа
     *
     * @param $id заказа
     * @return bool
     */
    public function view($vars)
    {
        extract($vars);
        //Получаем заказ по id
        $order = Order::getById($id);

        //Преобразуем JSON  строку продуктов и их кол-ва в массив

        $productsInOrder = json_decode(json_decode($order['products'], true));

        //Выбираем ключи заказанных товаров
        $productIds = array();

        $productQuantity =  array();

        for ($i=0; $i<count($productsInOrder); $i++) {
          
            array_push($productIds, $productsInOrder[$i]->{'Id'});

            array_push($productQuantity, array($productsInOrder[$i]->{'Id'} => $productsInOrder[$i] ->{'Quantity'}));
        }

        // Получаем список товаров по выбранным id

        $products = Product::getProductsByIds($productIds);

        $data['order'] = $order;
        $data['user'] = User::getUserById($order['user_id']);
        $data['pQuantity'] = $productQuantity;
        $data['products'] = $products;
        $data['title'] = 'Admin Order View Page ';
        
        $this->_view->render('admin/orders/view', $data);
    }


    /**
     * Изменение заказа
     *
     * @param $id
     * @return bool
     */
    public function edit($vars)
    {
        extract($vars);
        $order = Order::getById($id);
        $user = User::getById($order['user_id']);
        $title = 'Order Edit Page ';
        $this->_view->showBack('admin/orders/edit', compact('user', 'order', 'title'));
    }

    /**
     * Изменение заказа
     *
     * @param $id
     * @return bool
     */
    public function update($vars)
    {
        extract($vars);
        $status = $_POST['status'];
        Order::update($id, $status);
        Helper::redirect('/admin/orders/view/$id');
    }
    
    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            user::destroy($id);
            Helper::redirect('/admin/users');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/users');            
        }
        $title = 'Delete user';
        $user = user::getById($id);
        $this->_view->showBack('admin/users/delete', compact('title', 'user'));
    }


    public function cart()
    {
        //Получаем id пользователя из сессии
        $userId = Helper::checkLog();

        //Получаем всю информацию о пользователе из БД
        // $user = User::getById($userId);
        $data = json_decode($_POST, true);
        
        // $postuser = $_POST['username'];
        // echo json_encode($user);

        // dd($productsInCart);
        // exit();
       
        // $options = array();
        // parse_str($_POST['user_props'], $options);
        
        // User::updateProfile($userId, $options);
        Order::save($userId, $data['cart']);
        // echo json_encode($data);
        // echo json_encode($decoded);
    }

}