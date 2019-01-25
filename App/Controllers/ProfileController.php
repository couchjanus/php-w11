<?php
/**
 * ProfileController.php
 * Контроллер для authetication users
 */
require_once MODELS.'User.php';

class ProfileController extends Controller
{
    /**
     * страница index
     *
     * @return bool
     */

    public function index()
    {
        $userId = Helper::checkLog();
        $user = User::getById($userId);
        $this->_view->showFront('profile/index', compact('user'));
    }

}