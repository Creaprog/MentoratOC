<?php

namespace Model;

use Controller\DbController;
use PDO;

class NewsModel
{
    private $db;

    public function __construct()
    {
        $config = new DbController();
        $pdo = new PDO('mysql:dbname=' . $config->get('db_name') . ';host=' . $config->get('db_host'), $config->get('db_user'), $config->get('db_pass'));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db = $pdo;
    }

    public function showNews()
    {
        $req = $this->db->query('SELECT * FROM news ORDER BY creation');
        $req->setFetchMode(PDO::FETCH_OBJ);

        $news = $req->fetchAll();
        return $news;
    }

    public function show($id)
    {
        $req = $this->db->prepare('SELECT * FROM news WHERE id = :id');
        $req->bindValue(':id', (int)$id, PDO::PARAM_INT);
        $req->execute();

        $req->setFetchMode(PDO::FETCH_OBJ);

        $new = $req->fetch();
        return $new;
    }
}