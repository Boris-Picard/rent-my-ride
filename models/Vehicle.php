<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Category.php';

class Vehicle
{
    private ?int $id_vehicle;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;
    private ?string $created_at;
    private ?string $updated_at;
    private ?string $deleted_at;

    public function __construct(string $brand = '', string $model = '', string $registration = '', int $mileage = 0, ?string $picture = null, ?string $deleted_at = null, ?int $id_vehicle = null,)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->picture = $picture;
        $this->created_at = $deleted_at;
        $this->id_vehicle = $id_vehicle;
    }

    public function setIdVehicle(?int $id_vehicle)
    {
        $this->id_vehicle = $id_vehicle;
    }

    public function getIdVehicle(): ?int
    {
        return $this->id_vehicle;
    }

    public function setBrand(string $brand)
    {
        $this->brand = $brand;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function setRegistration(string $registration)
    {
        $this->registration = $registration;
    }

    public function getRegistration(): string
    {
        return $this->registration;
    }

    public function setMileage(int $mileage)
    {
        $this->mileage = $mileage;
    }

    public function getMileage(): int
    {
        return $this->mileage;
    }

    public function setPicture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setCreated_at(string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    public function setUpdated_at(string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    public function setDeleted_at(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeleted_at(): string
    {
        return $this->deleted_at;
    }

    public function insert(int $id)
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `picture`, `id_category`) VALUES(:brand, :model, :registration, :mileage, :picture, :id_category)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function getAll(): array|false
    {
        $pdo = Database::connect();

        $sql = ('SELECT * FROM `vehicles`INNER JOIN `categories` ON `vehicles`.`id_category` = `categories`.`id_category`;');

        $sth = $pdo->query($sql);

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `vehicles` WHERE `id_vehicle` = :id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

}
