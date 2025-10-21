<p>This is going to be ignored by PHP and displayed by the browser.</p>
<?php echo 'While this is going to be parsed.'; ?>
<p>This will also be ignored by PHP and displayed by the browser.</p>

<?php
$isLoggedInUser = true;
$user = "Arathi";
?>

<!-- Advanced escaping condition -->
<?php if ($isLoggedInUser): ?>
    <h1>Welcome <?= $user ?></h1>
<?php else: ?>
    <p>Please Login</p>
<?php endif ?>

<?php
$x = "";
echo gettype($x);
echo empty($x);
echo '<br/>';

?>

<!-- user Defined Types -->
<?php
class Elephant {}
function feed(Elephant $e): void
{
    echo "Feeding the Elephant";
    echo '<br/>';
}
$e = new Elephant();
feed(($e));
// feed('Lion') -- type error
?>

<!-- Union Types -->

<?php
function ShowId(int|string $id): void
{
    echo "Your Id is $id\n";
}
ShowId(101);
ShowId('ACE');
echo '<br/>';

?>

<!-- Intersection Types -->

<?php
interface Logger
{
    public function log(string $msg): void;
}
interface MySerializable
{
    public function serialize(): string;
}

function Process(Logger & MySerializable $obj): void
{
    $obj->log("Processing");
    $obj->serialize();
}
?>

<!-- Type Alias -->
<?php
function test(mixed $value): void
{
    echo var_dump($value);
}
function iterate(iterable $data): void
{
    foreach ($data as $item) {
        echo $item;
    }
}
test('Apple');
test(123);
test([1, 2, 3]);
iterate(['apple', 'banana', 'orange']);
echo '<br/>';

?>

<!-- Callable -->

<?php
function sayHello()
{
    echo "Helloo!";
}
$fun = 'sayHello';
$fun();
echo '<br/>';

?>

<?php
class Greeter
{
    function greet($name): void
    {
        echo "Helloo, $name";
        echo '<br/>';
    }
}

$g = new Greeter();
$callback = [$g, 'greet'];
call_user_func($callback, 'Arathi');
echo '<br/>';

?>

<?php
class Math
{
    static function square($n)
    {
        return $n * $n;
    }
}

$callback = ['Math', 'square'];
echo call_user_func($callback, 9);
echo '<br/>';

?>

<!-- variable variables -->
<?php
$foo = 'Arathi';
$$foo = 'Akshay';
echo $foo;
echo $Arathi;
echo '<br/>';

?>

<!-- Operator precedence -->

<?php
$result1 = 5 + 3 * 2;
echo "without paranthesis $result1";
$result2 = (5 + 3) * 2;
echo "with paranthesis $result2";
echo '<br/>';


?>

<!-- String Concatinating -->

<?php
$a = "Hello";
$b = $a . "World";
echo $b;
echo '<br/>';


$x = "Good";
$x .= "Morning";
echo $x;
echo '<br/>';
?>

<!-- Array append operator -->

<?php
$a = array("a" => "apple", "b" => "banana");
$b = array("a" => "pear", "b" => "strawberry", "c" => "cherry");

$c = $a + $b; // Union of $a and $b
echo "Union of \$a and \$b: \n <br/>";
var_dump($c);
echo '<br/>';

$c = $b + $a; // Union of $b and $a
echo "Union of \$b and \$a: \n <br/>";
var_dump($c);
echo '<br/>';

$a += $b; // Union of $a += $b is $a and $b
echo "Union of \$a += \$b: \n <br/>";
var_dump($a);
echo '<br/>';
?>

<!-- if -->
<?php
$a = 10;
$b = 5;
if ($a > $b) {
    echo "a is bigger than b";
    $b = $a;
}
?>

<!-- else -->

<?php

$a = 10;
$b = 20;
if ($a > $b) {
    echo "a is greater than b";
} else {
    echo "a is NOT greater than b";
}
?>

<!-- Alternate syntax -->
<?php if ($a == 5): ?>
    A is equal to 5
<?php endif; ?>

<!-- While -->
<?php
$i = 1;
while ($i <= 10):
    echo $i;
    $i++;
endwhile;
?>

<!-- do while -->
<?php
$i = 0;
do {
    echo $i;
} while ($i > 0);
?>

<!-- for each -->
<?php
$array = [1, 2, 3, 17];

foreach ($array as $value) {
    echo "Current element of \$array: $value.\n";
}
?>

<?php
$arr = array('one', 'two', 'three', 'four', 'stop', 'five');
foreach ($arr as $val) {
    if ($val == 'stop') {
        break;    /* You could also write 'break 1;' here. */
    }
    echo "$val<br />\n";
}
?>

<!-- continue -->
<?php
$arr = ['zero', 'one', 'two', 'three', 'four', 'five', 'six'];
foreach ($arr as $key => $value) {
    if (0 === ($key % 2)) { // skip members with even key
        continue;
    }
    echo $value . "\n";
}
?>

<!-- match -->
<?php
$food = 'cake';

$return_value = match ($food) {
    'apple' => 'This food is an apple',
    'bar' => 'This food is a bar',
    'cake' => 'This food is a cake',
};

var_dump($return_value);
?>

<!-- declare -->
<?php

// declare(ticks=1);
// function tick_handler()
// {
//     echo "tick occured\n";
// }
// register_tick_function('tick_handler');

// for ($i = 0; $i < 3; $i++) {
//     echo "Iteration $i\n";
// }
?>

<?php
require 'file1.php';
echo " And hello from file2!";
?>


<?php
goto end;
echo "This one is skipped";
end:
echo "Jumped here"
?>

<?php
for ($i = 0; $i < 5; $i++) {
    if ($i == 3) {
        goto endLoop;
    }
    echo $i . " ";
}
endLoop:
echo "Loop Stopped"
?>

<!-- classes and objects -->

<?php
class Car
{
    public $color;
    public $brand;
    public function drive()
    {
        echo "The car is driving";
    }
}
$myCar = new Car();
$myCar->color = "Red";
$myCar->brand = "Toyota";
echo $myCar->brand . " is " . $myCar->color . "</br>";
$myCar->drive();
?>

<!-- Autoload classes -->
<?php
spl_autoload_register(function ($className) {
    include $className . '.php';
});

$user = new User();  // PHP automatically includes "User.php"
?>

<!-- construct and destruct -->

<?php
class FileHandler
{
    public $fileName;
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        echo "Opening file: $this->fileName<br>";
    }
    public function __destruct()
    {
        echo "Closing file: $this->fileName<br>";
    }
}
$file1 = new FileHandler('data.txt');
$file2 = new FileHandler('report.txt');
echo "Doing some work with files...<br>"

?>

<!-- static method -->
<?php
class Foo
{
    public static function aStaticMethod()
    {
        echo "Static method called<br>";
    }
}

Foo::aStaticMethod();
$classname = 'Foo';
$classname::aStaticMethod();
?>

<!-- static property -->
<?php
class X{
    public static $my_static = 'x';
    public function staticValue(){
        return self::$my_static;
    }
}

print X::$my_static . '<br>';
?>