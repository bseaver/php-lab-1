<?php
class Car
{
    public $make_model;
    public $price;
    public $miles;

    function __construct($make, $price_of_car, $mile_on_car)
    {
        $this->make_model = $make;
        $this->price = $price_of_car;
        $this->miles = $mile_on_car;
    }
}

$cars = array();

array_push($cars,
    new Car("2014 Porsche 911", 114991, 7864)
);

array_push($cars,
    new Car("2011 Ford F450", 55995, 14241)
);

array_push($cars,
    new Car("2013 Lexus RX 350", 44700, 20000)
);

array_push($cars,
    new Car("Mercedes Benz CLS550", 39900, 37979)
);

// Enable form to work without passed in price
$max_price = 100000000;
$my_key = "price";
if (array_key_exists($my_key, $_GET)) {
  $max_price = $_GET[$my_key];
}

$cars_matching_search = array();
foreach ($cars as $car) {
    if ($car->price < $max_price) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                echo "<li> $car->make_model </li>";
                echo "<ul>";
                    echo "<li> $$car->price </li>";
                    echo "<li> Miles: $car->miles </li>";
                echo "</ul>";
            }
        ?>
    </ul>
</body>
</html>
