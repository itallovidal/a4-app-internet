<?php

class AdminController
{
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
        $this->inSession();
        $this->logout();
    }

    public function admin()
    {
        header('Location: ' . base_url('admin/login'));
    }

    private function inSession()
    {
        if ($_GET['url'] == 'admin/login') {
            return;
        }

        session_start();

        if (!isset($_SESSION['user'])) {
            header('Location: ' . base_url('admin/login'));
            exit();
        }

        $maxTime = 120;
        if (isset($_SESSION['last_time']) && (time() - $_SESSION['last_time']) > $maxTime) {
            session_unset();
            session_destroy();
            header('Location: ' . base_url('admin/login?expired'));
            exit();
        }

        $_SESSION['last_time'] = time();
    }

    public function logout()
    {
        if (isset($_GET['logout'])) {
            session_unset();
            session_destroy();
            header('Location: ' . base_url('admin/login'));
            exit();
        }
    }
}
