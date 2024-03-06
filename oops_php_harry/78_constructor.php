<?php
    class Employee{
        // Properties of our Class
        public $name;
        public $salary;

        // Methods of our Class
        // Constructor - It allows you to initialize objects. It is the code which is executed whenever a new object is instantiated.
        
        // Constructor without arguments
        // function __construct(){
        //     echo "This is my constructor for employee<br>";
        // }

        // Constructor with arguments
        function __construct($name, $salary){
            $this->name = $name;
            $this->salary = $salary;
        }

    }

    $gulshan = new Employee("Gulshan", 65000);
    $harry = new Employee("Harry", 76000);
    $pratik = new Employee("Pratik", 56000);
     

    echo "The salary of $harry->name is $harry->salary<br>";
    echo "The salary of $gulshan->name is $gulshan->salary";
?>