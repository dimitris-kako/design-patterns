<?php

interface CarService {
    public function getCost();

    public function getDescription();
}

class BasicInspection implements CarService {
    public function getCost()
    {
        return 100;
    }

    public function getDescription()
    {
        return "Basic inspection";
    }
}

class TyreChange implements CarService {

    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 200 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return  $this->carService->getDescription() . " Tyre Change";
    }
}

class LightReplace implements CarService {

    protected $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    public function getCost()
    {
        return 150 + $this->carService->getCost();
    }

    public function getDescription()
    {
        return  $this->carService->getDescription() . " Light Replacement";
    }
}

echo "Total cost: " . (new LightReplace(new TyreChange(new BasicInspection())))->getCost() . "\n";

echo "The service included: " . (new LightReplace(new TyreChange(new BasicInspection())))->getDescription();

