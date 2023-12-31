<?php

namespace models;

use models\pages\pageModel;

class Check
{

    private $userRole;

    public function __construct($userRole)
    {
        $this->userRole = $userRole;
    }

    public function getCurrentUrlSlug()
    {
        $url = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        $parseUrl = parse_url($url);
        $path = $parseUrl['path'];
        $segments = explode('/', ltrim($path, '/'));
        $firstTwoSegments = array_slice($segments, 0, 2);
        $slug = implode('/', $firstTwoSegments);
        return $slug; //Удаляем слеш в начале строки
    }

    public function CheckPermission($slug)
    {
        //Получить информацию о странице Slug
        $pageModel = new pageModel();
        $page = $pageModel->findBySlug($slug);
        if (!$page) {
            return false;
        }

        //Получить разрешенные роли для страницы
        $allowedRoles = explode(',', $page['role']);
        //Проеверить, имеет ли текущий ользователь доступ к странице
        if (isset($this->userRole) && in_array($this->userRole, $allowedRoles)) {
            return true;
        } else {
            return false;
        }
    }

    public function requirePermission()
    {

        if (!ENABLE_PERMISSION_CHEK) {
            return;
        }

        $slug = $this->getCurrentUrlSlug();

        if (!$this->CheckPermission($slug)) {
            header("Location: /");
            return;
        }
    }

    public function isCurrentUserRole($role)
    {
        return $this->userRole == $role;
    }
}
