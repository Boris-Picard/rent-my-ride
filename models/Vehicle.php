<?php

class Vehicle extends Category
{
    private ?string $brand;
    private ?string $model;
    private ?string $registration;
    private ?int $mileage;
    private ?string $picture;
    private DATETIME $created_at;
    private DATETIME $updated_at;
    private DATETIME $deleted_at;

    public function __construct(string $brand = null, string $model = null, string $registration = null, int $mileage = null, string $picture = null,)
    {
        
    }
}
