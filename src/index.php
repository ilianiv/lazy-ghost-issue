<?php
/** @var \Doctrine\ORM\EntityManagerInterface $entityManager */
require __DIR__ . '/../bootstrap.php';

$employee = $entityManager->getReference(Employee::class, 1);
$car      = $employee->getCar();
echo "Car's employee ID before detach: ", $car->getEmployee()?->getId(), PHP_EOL;
$employee->removeCar();
echo "Car's employee ID after detach: ", $car->getEmployee()?->getId(), PHP_EOL;
