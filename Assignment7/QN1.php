<?php
// Parent class
class Vehicle {
    protected $brand;
    protected $model;
    protected $year;

    public function __construct($brand, $model, $year) {
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
    }

    public function getDetails() {
        return "Brand: $this->brand, Model: $this->model, Year: $this->year";
    }

    public function start() {
        return "Vehicle is starting...";
    }
}



// Child class
class Car extends Vehicle {
    private $numberOfDoors;

    public function __construct($brand, $model, $year, $numberOfDoors) {
        parent::__construct($brand, $model, $year);
        $this->numberOfDoors = $numberOfDoors;
    }

    public function getDetails() {
        return parent::getDetails() . ", Doors: $this->numberOfDoors";
    }

    public function playMusic() {
        return "Playing music in the car ";
    }
}



// Child class
class Motorcycle extends Vehicle {
    private $hasCarrier;

    public function __construct($brand, $model, $year, $hasCarrier) {
        parent::__construct($brand, $model, $year);
        $this->hasCarrier = $hasCarrier;
    }

    public function getDetails() {
        $carrier = $this->hasCarrier ? "Yes" : "No";
        return parent::getDetails() . ", Carrier: $carrier";
    }

    public function doWheelie() {
        return "Motorcycle is doing a wheelie! ";
    }
}

// creating objects

$car = new Car("Toyota", "Corolla", 2022, 4);
$motorcycle = new Motorcycle("Yamaha", "R15", 2021, false);

echo $car->getDetails();
echo "<br>";
echo $car->playMusic();

echo "<br><br>";

echo $motorcycle->getDetails();
echo "<br>";
echo $motorcycle->doWheelie();



?>
