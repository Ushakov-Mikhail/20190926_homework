<?php

class Human
{
    private $name;
    private $surname;
    private $age;
    private $gender;

    public const MALE = "male";
    public const FEMALE = "female";

    private const GENDER = [
        self::MALE => 'мужской',
        self::FEMALE => 'женский'
    ];
  

    function __construct($name, $surname, $gender)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->gender = $gender;
    }

    public function __set($property, $value){
        if(property_exists($this, $property)){
                if($property === 'surname'){
                    $this->$property = $value;
                }else if($property === 'age' && gettype($value) === 'integer'){
                    if($value > 0 && $value < 130)
                    {
                        $this->$property = $value;
                    }else{
                        echo "Возраст ввели неверно!!!" . "<br>";
                    }
                }else{
                    echo "Внимание ошибка! нельзя поменять свойство {$property}" . '<br>';
                }
                
            }else{
                echo "Внимание ошибка! нельзя поменять свойство {$property}". "<br>";
            }
            
        }

    public function __get($property)
    {
        echo $this->$property . '<br>';
    }

   
    public function getProps()
    {
        echo 'Фамилия:  ' . $this->surname . "<br>";
        echo 'Имя: ' . $this->name . "<br>";
        echo 'Возраст: ' . $this->age . "<br>";
        echo 'Пол: ' . self::GENDER[$this->gender] . "<br>";
    }
}

$human = new Human("Наталья", "Краснова", Human::FEMALE);
$human->age = 30;
$human->surname = "Василькова";
$human->name = "Ксения";
$human->gender = "male";
echo $human->name;
echo $human->getProps()."<br>";
