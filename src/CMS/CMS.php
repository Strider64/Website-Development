<?php

namespace Library\CMS;

use PDO;
use Library\Database\Database as DB;

class CMS {

    protected $query = \NULL;
    protected $stmt = \NULL;
    protected $password = \NULL;
    public $cms = \NULL;
    public $result = \NULL;
    public $count = \NULL;

    public function __construct() {
        
    }

    public function count() {
        $db = DB::getInstance();
        $pdo = $db->getConnection();
        $this->count = $pdo->query("SELECT count(1) FROM cms")->fetchColumn();
        return $this->count;
    }

    public function create(array $data) {
        $db = DB::getInstance();
        $pdo = $db->getConnection();
        $this->query = 'INSERT INTO cms( user_id, article, title, comment, date_created) VALUES ( :user_id, :article, :title, :comment, NOW())';
        $this->stmt = $pdo->prepare($this->query);
        $this->result = $this->stmt->execute([':user_id' => $data['user_id'], ':article' => $data['article'], ':title' => $data['title'], ':comment' => $data['comment']]);
        return \TRUE;
    }

    public function update(array $data) {
        $db = DB::getInstance();
        $pdo = $db->getConnection();
        $this->query = 'UPDATE cms SET title=:title, comment=:comment, date_created=NOW() WHERE article =:article';
        $this->stmt = $pdo->prepare($this->query);
        $this->result = $this->stmt->execute([':title' => $data['title'], ':comment' => $data['comment'], ':article' => $data['article']]);
        return $this->result;
    }

    public function read($article) {
        $db = DB::getInstance();
        $pdo = $db->getConnection();
        $this->query = 'SELECT id, user_id, article, title, comment, date_created FROM cms WHERE article=:article';

        $this->stmt = $pdo->prepare($this->query); // Prepare the query:
        $this->stmt->execute([':article' => $article]); // Execute the query with the supplied user's parameter(s):

        $this->stmt->setFetchMode(PDO::FETCH_OBJ);
        $this->cms = $this->stmt->fetch();

        return $this->cms;
    }

    public function insert(array $data) {
        $db = DB::getInstance();
        $pdo = $db->getConnection();
        $this->password = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->query = 'INSERT INTO users( username, password, security_level, date_added) VALUES ( :username, :password, :security_level, NOW())';
        $this->stmt = $pdo->prepare($this->query);
        $this->result = $this->stmt->execute([':username' => $data['username'], ':password' => $this->password, ':security_level' => $data['security_level']]);
        return $this->result;
    }

    public function login($username, $password) {
        $db = DB::getInstance();
        $pdo = $db->getConnection();
        /* Setup the Query for reading in login data from database table */
        $this->query = 'SELECT id, username, password, security_level FROM users WHERE username=:username';


        $this->stmt = $pdo->prepare($this->query); // Prepare the query:
        $this->stmt->execute([':username' => $username]); // Execute the query with the supplied user's parameter(s):

        $this->stmt->setFetchMode(PDO::FETCH_OBJ);
        $this->user = $this->stmt->fetch();

        /*
         * If password matches database table match send back true otherwise send back false.
         */
        if (password_verify($password, $this->user->password)) {
            $this->userArray['user_id'] = $this->user->id;
            $this->userArray['username'] = $this->user->username;
            $this->userArray['security_level'] = $this->user->security_level;

            //$this->userArray['csrf_token'] = $_SESSION['csrf_token'];
            $_SESSION['user'] = (object) $this->userArray;
            return \TRUE;
        } else {
            return \FALSE;
        }
    }

    public function delete($id = NULL) {
        unset($id);
        unset($this->user);
        unset($_SESSION['user']);
        $_SESSION['user'] = NULL;
        session_destroy();
        return TRUE;
    }

}
