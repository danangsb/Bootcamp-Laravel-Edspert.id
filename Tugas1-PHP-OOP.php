<?php
//RULE :
//1. Karyawan akan mendapatkan bonus jika bekerja lebih dari 
//atau sama dengan 17 hari dan kurang dari atau sama dengan 20 hari
//2. Level karyawan ada 2 => junior dan senior. Untuk karyawan senior besarnya bonus 2x lipat 
//dan junior 1x lipat. besarnya gaji dibayarkan harian untuk karyawan

class Company
{
    public $companyName = 'PT satu dua';
    public $basicBonus = 50000;
    public $dailySalary = 100000;

    function calculateBonus()
    {
        $bonusMultiplier = $level = 'senior' ? 2 : 1;
        $bonus = 0;
        if ($this->dayCount > 17 && $this->dayCount <= 20) {
            $bonus = $this->basicBonus * $bonusMultiplier;
        }
        return $bonus;
    }
}

class Employee extends Company
{
    public $name;
    public $level;
    public $dayCount;

    function __construct($name, $level, $dayCount)
    {
        $this->name = $name;
        $this->level = $level;
        $this->dayCount = $dayCount;
    }

    public function getSalary()
    {
        $bonus = $this->calculateBonus();
        $salary = $this->dailySalary * $this->dayCount;
        $total = $bonus + $salary;



        echo "Pegawai $this->name menjabat sebagai $this->level kamu mendapatkan gaji sebesar $total";
    }
}

$pakBrewok = new Employee('Pak Brewok', 'senior', 20);
$pakBrewok->getSalary();
