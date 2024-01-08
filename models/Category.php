<?php

require_once __DIR__ . '/../config/config.php';

class Category
{
    private ?int $id_category;
    private string $name;

    public function __construct(string $name = '', ?int $id_category = null)
    {
        $this->id_category = $id_category;
        $this->name = $name;
    }

    // public function getAll()
    // {

    // }

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
     * Permet d'insérer une donnée en base de données
     * @return [type]
     */
    public function insert()
    {
        $mydb = new PDO(DSN, USER, PASSWORD);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = 'INSERT INTO `categories` (`name`)
                            VALUES(:name);';

        $stmt = $mydb->prepare($sql);

        $stmt->bindParam(':name', $this->getName());

        $result = $stmt->execute();

        return $result;
    }

    /**
     * Permet de retourner toutes les données de catégories
     * @return [type]
     */
    public function getAll()
    {
        $mydb = new PDO(DSN, USER, PASSWORD);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = ("SELECT * FROM `categories`");

        $stmt = $mydb->prepare($sql);

        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Méthode qui permet de update une catégorie
     * @return [type]
     */
    public function update()
    {
        $mydb = new PDO(DSN, USER, PASSWORD);
        $mydb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE `categories` SET `name`=:name WHERE `id_category`=:id_category";

        $stmt = $mydb->prepare($sql);

        $stmt->bindValue(':name', $this->getName());
        $stmt->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $result = $stmt->execute();
        
        return $result;
    }
}
