<?php

abstract class Employee
{
    protected $name;
    protected $age;
    protected $hourlyRate = 4.65;
    protected $experience;
}

class Developer extends Employee
{
}

class QualityAnalyst extends Employee
{
}

abstract class AbstractSalaryStrategy
{
    abstract public function calculateSalary(Employee $employee);
}

class FullTimePayment extends AbstractSalaryStrategy
{
    public function calculateSalary(Employee $employee)
    {
    }
}
