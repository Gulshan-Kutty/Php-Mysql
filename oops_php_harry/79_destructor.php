<?php
    class Employee{
        // Properties of our Class
        public $name;
        public $salary;

        // Constructor
        function __construct($name, $salary){
            $this->name = $name;
            $this->salary = $salary;
        }

        // Destructor
        function __destruct(){
           echo "I am destructing $this->name<br> ";
        }
    }

    $gulshan = new Employee("Gulshan", 65000);
    $harry = new Employee("Harry", 76000);
    $pratik = new Employee("Pratik", 56000);
     

    echo "The salary of $harry->name is $harry->salary<br>";
    echo "The salary of $gulshan->name is $gulshan->salary<br>";
?>