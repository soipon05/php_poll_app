<?php

namespace MyApp;

class Poll
{
    private $_db;

    public function __construct()
    {
        $this->_connectDB();
    }
    public function post()
    {
        try {
            $this->_validateAnswer();
            $this->_save();
            // redirect to result.php
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/result.php');
        } catch (\Exception $e) {
            //set error
            $_SESSION['err'] = $e->getMessage();
            // redirect to index.php
            header('Location: http://' . $_SERVER['HTTP_HOST']);
        }
        exit;
    }

    public function getError()
    {
        $err = null;
        if (isset($_SESSION['err'])) {
            $err = $_SESSION['err'];
            unset($_SESSION['err']);
        }
        return $err;
    }

    private function _validateAnswer()
    {
        // var_dump($_POST);
        // exit;
        if (
            !isset($_POST['answer']) ||
            !in_array($_POST['answer'], [0, 1, 2])
        ) {
            throw new \Exception('invalid answer');
        }
    }

    private function _save()
    { }

    private function _connectDB()
    {
        try {
            $this->_db = new \PDO(DSN, DB_USERNAME, DB_PASSWORD);
            $this->_db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            throw new \Exception('Failed to connect DB');
        }
    }
}
