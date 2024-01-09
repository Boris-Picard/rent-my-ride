<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/Database.php';

class Category
{
    protected ?int $id_category;
    protected string $name;

    public function __construct(string $name = '', ?int $id_category = null)
    {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    public function setIdCategory(?int $id_category)
    {
        $this->id_category = $id_category;
    }

    public function getIdCategory(): ?int
    {
        return $this->id_category;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Méthode qui permet d'insérer une catégorie en base de données
     * @return [type]
     */
    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `categories` (`name`)
                            VALUES(:name);';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', $this->getName());

        $result = $stmt->execute();

        return $result;
    }

    /**
     * Méthode qui permet de retourner toutes les données de catégories
     * @return [type]
     */
    public static function getAll()
    {
        $pdo = Database::connect();

        $sql = ('SELECT * FROM `categories`;');

        $stmt = $pdo->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function get(int $id):object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `categories` WHERE `id_category`=:id_category;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_category', $id, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    /**
     * Méthode qui permet de update une catégorie
     * @return [type]
     */
    public function update()
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `categories` SET `name`=:name WHERE `id_category`=:id_category;';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', $this->getName());
        $stmt->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }

    /**
     * Méthode qui permet de delete une catégorie
     * @return [type]
     */
    public function delete()
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `categories` WHERE `name`=:name AND `id_category` = :id_category;';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', $this->getName());
        $stmt->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $result = $stmt->execute();

        return $result;
    }

    /**
     * Méthode qui permet de savoir si une donnée est déjà existante dans notre table
     * @return [type]
     */
    public function isExist()
    {
        $pdo = Database::connect();

        $sql = 'SELECT * from `categories` WHERE `name`=:name;';

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':name', $this->getName());

        $stmt->execute();

        $result = $stmt->fetchColumn();

        return $result;
    }

    public function rowNumber()
    {
        $pdo = Database::connect();

        $sql = 'SELECT count(*) FROM `categories`;';

        $stmt = $pdo->query($sql);

        $result = $stmt->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
