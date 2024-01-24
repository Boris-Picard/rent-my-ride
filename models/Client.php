<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/Database.php';

class Client
{
    private ?int $id_client;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private string $phone;
    private string $city;
    private int $zipcode;
    private ?string $created_at;
    private ?string $updated_at;

    public function __construct(
        string $lastname = '',
        string $firstname = '',
        string $email = '',
        string $birthday = '',
        string $updated_at = null,
        int $id_client = null,
        string $phone = '',
        string $city = '',
        int $zipcode = 0,
        string $created_at = null
    ) {
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->id_client = $id_client;
        $this->updated_at = $updated_at;
        $this->phone = $phone;
        $this->city = $city;
        $this->zipcode = $zipcode;
        $this->created_at = $created_at;
    }

    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setBirthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    public function getBirthday(): string
    {
        return $this->birthday;
    }

    public function setIdClient(?int $id_client)
    {
        $this->id_client = $id_client;
    }

    public function getIdClient(): int
    {
        return $this->id_client;
    }

    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    public function getPhone(): string
    {
        return $this->phone;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setZipcode(int $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    public function getZipcode(): int
    {
        return $this->zipcode;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `clients` (`lastname`, `firstname`, `email`, `birthday`, `phone`, `city`, `zipcode`) 
        VALUES(:lastname, :firstname, :email, :birthday, :phone, :city, :zipcode)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':lastname', $this->getLastname());
        $sth->bindValue(':firstname', $this->getFirstname());
        $sth->bindValue(':email', $this->getEmail());
        $sth->bindValue(':birthday', $this->getBirthday());
        $sth->bindValue(':phone', $this->getPhone(), PDO::PARAM_INT);
        $sth->bindValue(':city', $this->getCity());
        $sth->bindValue(':zipcode', $this->getZipcode(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function get()
    {
        $pdo = Database::connect();

        $sql = 'SELECT *  FROM `clients` ORDER BY `id_client` DESC;';

        $sth = $pdo->query($sql);

        $return = $sth->fetchColumn();

        return $return;
    }

    public static function delete(int $id_client)
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `clients` WHERE `id_client`=:id_client;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_client', $id_client, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
