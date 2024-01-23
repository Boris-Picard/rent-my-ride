<?php

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../helpers/Database.php';

class Rent
{
    private ?int $id_rent;
    private string $startdate;
    private string $enddate;
    private ?string $created_at;
    private ?string $confirmed_at;
    private ?int $id_vehicle;
    private ?int $id_client;

    public function __construct(
        string $startdate = '',
        string $enddate = '',
        ?int $id_rent = null,
        ?string $created_at = null,
        ?string $confirmed_at = null,
        ?int $id_vehicle = null,
        ?int $id_client = null
    ) {
        $this->startdate = $startdate;
        $this->enddate = $enddate;
        $this->id_rent = $id_rent;
        $this->created_at = $created_at;
        $this->confirmed_at = $confirmed_at;
        $this->id_vehicle = $id_vehicle;
        $this->id_client = $id_client;
    }

    public function setStartDate(string $startdate)
    {
        $this->startdate = $startdate;
    }

    public function getStartDate(): string
    {
        return $this->startdate;
    }

    public function setEndDate(string $enddate)
    {
        $this->enddate = $enddate;
    }

    public function getEndDate(): string
    {
        return $this->enddate;
    }

    public function setIdRent(?int $id_rent)
    {
        $this->id_rent = $id_rent;
    }

    public function getIdRent(): ?int
    {
        return $this->id_rent;
    }

    public function setCreatedAt(?string $created_at)
    {
        $this->created_at = $created_at;
    }

    public function getCreatedAt(): ?string
    {
        return $this->created_at;
    }

    public function setConfirmedAt(?string $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    public function getConfirmedAt(): ?string
    {
        return $this->confirmed_at;
    }

    public function setIdVehicle(int $id_vehicle)
    {
        $this->id_vehicle = $id_vehicle;
    }

    public function getIdVehicle(): int
    {
        return $this->id_vehicle;
    }

    public function setIdClient(int $id_client)
    {
        $this->id_client = $id_client;
    }

    public function getIdClient(): int
    {
        return $this->id_client;
    }

    public function insert(): int
    {
        $pdo = Database::connect();

        $sql = 'INSERT INTO `rents` (`startdate`, `enddate`, `confirmed_at`, `id_vehicle`, `id_client`) 
        VALUES(:startdate, :enddate, :confirmed_at, :id_vehicle, :id_client)';

        $sth = $pdo->prepare($sql);

        $sth->bindValue(':startdate', $this->getStartDate());
        $sth->bindValue(':enddate', $this->getEndDate());
        $sth->bindValue(':confirmed_at', $this->getConfirmedAt());
        $sth->bindValue(':id_vehicle', $this->getIdVehicle(), PDO::PARAM_INT);
        $sth->bindValue(':id_client', $this->getIdClient(), PDO::PARAM_INT);

        $sth->execute();

        return $sth->rowCount() > 0;
    }

    public static function getAll()
    {
        $pdo = Database::connect();
        
        $sql = 'SELECT *
        FROM `rents`
        INNER JOIN `vehicles` ON `rents`.`id_vehicle` = `vehicles`.`id_vehicle`
        INNER JOIN `clients` ON `rents`.`id_client` = `clients`.`id_client`;';

        $sth = $pdo->query($sql);

        $sth->execute();

        $result = $sth->fetchAll(PDO::FETCH_OBJ);

        return $result;
    }
}
