<?php
class Fruit {
    // property to store the name of the fruit
    public $color;


    // method to set the name of the fruit
    function set_name($name2) {
    $this->name = $name2; // set the value of $name property
  }
}

$apple = new Fruit(); // instantiate a new object of the Fruit class
$apple->set_name("Apple"); // set the name of the fruit to "Apple"

echo $apple->name; // output the name of the fruit
?>


<!-- Certainly! Let's break down the flow of the program step by step:

1. Class Definition:

-- The program begins with the definition of a class named Fruit.
-- Inside this class, there is a public property $name to store the name of the fruit and a method set_name() to set the name of the fruit.

2. Instantiation:

-- After defining the Fruit class, an instance of the Fruit class is created using the new keyword and assigned to the variable $apple. This -- instance represents a specific fruit, in this case, an apple.

3. Method Invocation:

-- The set_name() method of the $apple object is called with the argument "Apple".
-- Inside the set_name() method, the value of the parameter ("Apple") is assigned to the $name property of the $apple object.

4. Property Access:

-- After setting the name of the fruit using the set_name() method, the name property of the $apple object is accessed.
-- This property contains the name of the fruit, which is "Apple".

5.Output:

-- Finally, the value of the name property of the $apple object is echoed out.
-- This will output "Apple" to the screen.


In summary, the program defines a class Fruit, creates an instance of this class representing an apple, sets the name of the apple using the set_name() method, and then outputs the name of the apple. -->



