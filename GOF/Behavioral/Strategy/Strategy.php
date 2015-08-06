<?php
namespace DP\GOF\Behavioral\Strategy;

/**
 * Class Employee
 */
abstract class Employee
{
    protected $name;
    protected $age;
    protected $experience;

    /**
     * @var
     */
    protected $salaryStrategy;

    /**
     * @param AbstractSalaryStrategy $salaryStrategy
     */
    public function __construct(AbstractSalaryStrategy $salaryStrategy)
    {
        $this->salaryStrategy = $salaryStrategy;
    }

    /**
     * @return mixed
     */
    abstract public function getHourlyRate();

    /**
     * @return mixed
     */
    public function getSalary()
    {
        return $this->salaryStrategy->calculateSalary($this);
    }
}

/**
 * Class Developer
 */
class Developer extends Employee
{
    /**
     * @return float
     */
    public function getHourlyRate()
    {
        return 6.75;
    }

}

/**
 * Class QualityAnalyst
 */
class QualityAnalyst extends Employee
{
    /**
     * @return float
     */
    public function getHourlyRate()
    {
        return 5.35;
    }
}

/**
 * Class AbstractSalaryStrategy
 */
abstract class AbstractSalaryStrategy
{
    const FULLTIME_HOURS = 8;
    const PARTTIME_HOURS = 6;
    const MONTHLY_WORKING_DAYS = 20;

    /**
     * @param Employee $employee
     *
     * @return mixed
     */
    abstract public function calculateSalary(Employee $employee);
}

/**
 * Class FullTimePayment
 */
class FullTimePayment extends AbstractSalaryStrategy
{
    /**
     * @param Employee $employee
     *
     * @return mixed
     */
    public function calculateSalary(Employee $employee)
    {
        return $employee->getHourlyRate() * self::FULLTIME_HOURS * self::MONTHLY_WORKING_DAYS;
    }
}

/**
 * Class PartTimePayment
 */
class PartTimePayment extends AbstractSalaryStrategy
{
    /**
     * @param Employee $employee
     *
     * @return mixed
     */
    public function calculateSalary(Employee $employee)
    {
        return $employee->getHourlyRate() * self::PARTTIME_HOURS * self::MONTHLY_WORKING_DAYS;
    }
}

$john = new Developer(new FullTimePayment());
echo $john->getSalary(); //1080

$martha = new QualityAnalyst(new PartTimePayment());
echo $martha->getSalary(); //642


