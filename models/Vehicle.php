<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/Category.php';

class Vehicle extends Category
{
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?string $picture;
    private DATETIME $created_at;
    private DATETIME $updated_at;
    private DATETIME $deleted_at;

    public function __construct(string $brand = '', string $model = '', string $registration = '', int $mileage = 0, ?string $picture = null)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->picture = $picture;
    }

    public function setBrand(string $brand) {
        $this->brand = $brand;
    }

    public function getBrand():string {
        return $this->brand;
    }

    public function setModel(string $model) {
        $this->model = $model;
    }

    public function getModel():string {
        return $this->model;
    }

    public function setRegistration(string $registration) {
        $this->registration = $registration;
    }

    public function getRegistration():string {
        return $this->registration;
    }

    public function setMileage(int $mileage) {
        $this->mileage = $mileage;
    }

    public function getMileage():int {
        return $this->mileage;
    }

    public function setPicture(?string $picture) {
        $this->picture = $picture;
    }

    public function getPicture():string {
        return $this->picture;
    }

    public function insert()
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `created_at`, `updated_at`) VALUES(:brand, :model, :registration, :mileage, NOW(), NOW());';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }
}
