<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/Database.php';

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
    private ?int $id_category;

    public function __construct(
        string $brand = '',
        string $model = '',
        string $registration = '',
        int $mileage = 0,
        ?int $id_category = null,
        ?int $id_vehicle = null,
        ?string $picture = null,
        ?string $created_at = null,
        ?string $updated_at = null,
        ?string $deleted_at = null
    ) {
        $this->brand = $brand;
        $this->model = $model;
        $this->registration = $registration;
        $this->mileage = $mileage;
        $this->id_vehicle = $id_vehicle;
        $this->id_category = $id_category;
        $this->picture = $picture;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->deleted_at = $deleted_at;
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

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setUpdatedAt(?string $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function getUpdatedAt(): ?string
    {
        return $this->updated_at;
    }

    public function setDeletedAt(?string $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function getDeletedAt(): string
    {
        return $this->deleted_at;
    }

    public function setIdCategory(int $id_category)
    {
        $this->id_category = $id_category;
    }

    public function getIdCategory(): int
    {
        return $this->id_category;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `vehicles` (`brand`, `model`, `registration`, `mileage`, `picture`, `id_category`) 
        VALUES(:brand, :model, :registration, :mileage, :picture, :id_category)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll(int $limit = 20, int $start = 0, ?string $search = null, bool $archived = true, ?string $order = 'ASC', ?int $id = null)
    {
        $pdo = Database::connect();

        $archived ? $showDeletedAt = ' IS NULL ' : $showDeletedAt = ' IS NOT NULL ';

        $sql = 'SELECT * FROM `vehicles` INNER JOIN `categories` ON `vehicles`.`id_category` = `categories`.`id_category`
                WHERE `deleted_at` '.$showDeletedAt.'';

        isset($search) ? $sql .= " AND `model` LIKE '$search%' OR `brand` LIKE '$search%' " : null;

        $id != null ? $sql .= " AND `vehicles`.`id_category`= $id " : '';

        $order == 'DESC' ? $sql .= ' ORDER BY `categories`.`name` DESC ' : $sql .= ' ORDER BY `categories`.`name` ASC ';

        if (isset($limit) && isset($start)) {
            $sql .= ' LIMIT :limit OFFSET :start ';
        }

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':limit', $limit, PDO::PARAM_INT);
        $sth->bindValue(':start', $start, PDO::PARAM_INT);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }


    public static function get(int $id): object|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `vehicles` WHERE `id_vehicle`=:id_vehicle;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);
        $sth->execute();

        $result = $sth->fetch(PDO::FETCH_OBJ);

        return $result;
    }

    public static function delete(int $id): int
    {
        $pdo = Database::connect();

        $sql = 'DELETE FROM `vehicles` WHERE `id_vehicle` = :id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public function update(): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles` 
        SET `brand`=:brand, `model`=:model, `registration`=:registration, `mileage`=:mileage, `picture`=:picture, `id_category`=:id_category  
        WHERE `id_vehicle`=:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':brand', $this->getBrand());
        $sth->bindValue(':model', $this->getModel());
        $sth->bindValue(':registration', $this->getRegistration());
        $sth->bindValue(':mileage', $this->getMileage(), PDO::PARAM_INT);
        $sth->bindValue(':picture', $this->getPicture());
        $sth->bindValue(':id_category', $this->getIdCategory(), PDO::PARAM_INT);
        $sth->bindValue(':id_vehicle', $this->getIdVehicle(), PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function isExist(string $registration): bool
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_vehicle`) AS "count" FROM `vehicles` WHERE `registration`=:registration;';

        $sth = $pdo->prepare($sql);
        $sth->bindValue(':registration', $registration);
        $sth->execute();

        $result = $sth->fetchColumn();

        return (bool) $result > 0;
    }

    public static function archive(int $id): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles` SET `deleted_at`= NOW() WHERE `id_vehicle`=:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function unarchive($id): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles` SET `deleted_at`= null WHERE `id_vehicle`=:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function updateImg(int $id): bool
    {
        $pdo = Database::connect();

        $sql = 'UPDATE `vehicles` SET `picture`= null WHERE `id_vehicle`=:id_vehicle;';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':id_vehicle', $id, PDO::PARAM_INT);

        $result = $sth->execute();

        return $result;
    }

    public static function getDateOrder(): array|false
    {
        $pdo = Database::connect();

        $sql = 'SELECT * FROM `vehicles` WHERE `deleted_at` IS NULL ORDER BY `created_at` DESC;';

        $sth = $pdo->query($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public static function nbVehicles(?int $id = null, ?string $search = null)
    {
        $pdo = Database::connect();

        $sql = 'SELECT COUNT(`id_vehicle`) FROM `vehicles` 
        INNER JOIN `categories` ON `categories`.`id_category` = `vehicles`.`id_category` 
        WHERE `deleted_at` IS NULL';

        isset($search) ? $sql .= " AND `model` LIKE '$search%' OR `brand` LIKE '$search%' " : null;

        isset($id) ? $sql .= ' AND `categories`.`id_category`= ' . $id : null;

        $sth = $pdo->query($sql);

        return $sth->fetchColumn();
    }
}
