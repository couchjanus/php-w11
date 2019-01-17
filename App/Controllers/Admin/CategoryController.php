<?php
/**
 * CategoryController.php
 * Контроллер для управления категориями
 */
require_once MODELS.'Category.php';

class CategoryController extends Controller
{
    /**
     * Главная страница управления категориями
     *
     * @return bool
     */
    public function index()
    {
        $categories = Category::index();
        $data['categories'] = $categories;
        $data['title'] = 'Category List Page ';
        $data['numRows'] = count($categories);
        $this->_view->showBack('admin/categories/index', $data);          
    }

    /**
     * Добавление категории
     *
     * @return bool
     */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $opts = [];
            array_push($opts, trim(strip_tags($_POST['name'])));
            array_push($opts, $_POST['status']);
            Category::store($opts);
            Helper::redirect('/admin/categories');
        }

        $data['title'] = 'Admin Category Add New Category ';
        $this->_view->showBack('admin/categories/create', $data);
    }

}