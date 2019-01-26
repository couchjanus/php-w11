<?php
/**
 * GalleryController.php
 * Контроллер для управления gallery
 */
require_once MODELS.'Gallery.php';

class GalleryController extends Controller
{
    /**
     * Главная страница управления pictures
     *
     * @return bool
     */
    public function index()
    {
        $pictures = Gallery::index();
        $this->_view->showBack('admin/gallery/index', ['pictures' => $pictures, 'title' => 'Picture List Page ', 'numRows' => count($pictures)]);
    }

    /**
     * Добавление picture
     *
     * @return bool
     */
    public function create()
    {
        if (isset($_POST) and !empty($_POST)) {
            $opts = [];
            array_push($opts, trim(strip_tags($_POST['name'])));
            Gallery::store($opts);
            Helper::redirect('/admin/gallery');
        }
        $this->_view->showBack('admin/gallery/create', ['title'=> 'Add New Picture ']);
    }

    public function edit($vars)
    {
        extract($vars);
        $picture = Gallery::getById($id);
        //Принимаем данные из формы
        if (isset($_POST) and !empty($_POST)) {
            $options['name'] = trim(strip_tags($_POST['name']));
            Gallery::update($id, $options);
            Helper::redirect('/admin/gallery');
        }
        $this->_view->showBack('admin/gallery/edit', ['picture' => $picture, 'title' => 'Picture Edit Page ']);
    }
    public function delete($vars)
    {
        extract($vars);
        if (isset($_POST['submit'])) {
            Gallery::destroy($id);
            Helper::redirect('/admin/gallery');
        } elseif (isset($_POST['reset'])) {
            Helper::redirect('/admin/gallery');            
        }
        $title = 'Delete Picture';
        $picture = Gallery::getById($id);
        $this->_view->showBack('admin/gallery/delete', compact('title', 'picture'));
    }
}