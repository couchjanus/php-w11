<?php

// CategoryController.php
require_once CONFIG.'db.php';

class CategoryController extends Controller
{

    public function index()
    {
        $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) 
        or die("Ошибка " . mysqli_error($conn));

        $categories = [];
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        $resCount = mysqli_num_rows($result);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($categories, $row);
        }
        // закрываем подключение
        mysqli_close($conn);
        $data['categories'] = $categories;

        $data['title'] = 'Category List Page ';
        $this->_view->render('admin/categories/index', $data);
    }

    /**
     * Добавление категории
    **/
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            // подключаемся к серверу
            $conn = mysqli_connect(HOST, DBUSER, DBPASSWORD, DATABASE) or die("Ошибка " . mysqli_error($conn));
            
            $name = mysqli_real_escape_string($conn, $_POST['name']);
            // выполняем операции с базой данных
            
            $sql = "INSERT INTO categories (name) VALUES ('$name')";
            
            mysqli_query($conn, $sql) or die("Ошибка: " . mysqli_error($conn));
            mysqli_close($conn);
                
            header('Location: /admin/categories');
        }

        $data['title'] = 'Add New Category ';
        $this->_view->render('admin/categories/create', $data);
    }

}

