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
class X
{
    public static $my_static = 'x';
    public function staticValue()
    {
        return self::$my_static;
    }
}

print X::$my_static . '<br>';
?>

<!-- class Abstraction -->
<?php
abstract class Animal
{
    abstract public function makeSound();
    public function sleep()
    {
        echo "sleeping..<br>";
    }
}

class Dog extends Animal
{
    public function makeSound()
    {
        echo "woooff...wooff...<br>";
    }
}

class Cat extends Animal
{
    public function makeSound()
    {
        echo "meow...meow...<br>";
    }
}

$dog = new Dog();
$dog->makeSound();
$cat = new Cat();
$cat->makeSound();
$dog->sleep();
$cat->sleep();
?>

<!-- Object Interfaces -->

<?php

interface Bank
{
    public function deposit();
}

class CanaraBank implements Bank
{
    public function deposit()
    {
        echo "Deposited in Canara bank <br>";
    }
}

class ICBI implements Bank
{
    public function deposit()
    {
        echo "Deposited in ICBI bank <br>";
    }
}

// polimorphism
function deposit(Bank $bank)
{
    $bank->deposit();
}

$canara = new CanaraBank();
$icbi = new ICBI();
deposit($canara);
deposit($icbi);

?>

<!-- Traits -->
<?php

trait TimeStamps
{
    public function created_at()
    {
        return date('Y-m-d H:i:s');
    }
}

trait SoftDeletes
{
    public function delete()
    {
        echo "Record has marked as deleted <br>";
    }
}

class UserDel
{
    use TimeStamps, SoftDeletes;
}

$user = new UserDel();
echo 'created at: ' . $user->created_at() . '<br>';
$user->delete();
?>

<!-- Overloading -->

<?php

class Demo
{
    private $data = [];
    public function __set($name, $value)
    {
        echo "__set called for $name = $value\n<br>";

        $this->data[$name] = $value;
    }
    public function __get($name)
    {
        echo "__get called for $name\n<br>";
        return $this->data[$name] ?? null;
    }

    public function __call($name, $arguments)
    {
        echo "Tried calling method " . $name . ' with arguments: ';
        print_r($arguments);
    }
}
$obj = new Demo();
$obj->foo = 42;
echo $obj->foo;
$obj->bar(1, 2, 3);
echo "<br>";
?>

<!-- Object Iteration -->

<?php
class Person
{
    public $name = "Alice";
    public $age = '30';
}

$p = new Person();
foreach ($p as $key => $value) {
    echo " $key => $value <br>";
}
?>

<?php
class MyCollection implements Iterator
{
    private $items = ['apple', 'banana', 'cherry'];
    private $position = 0;

    public function current(): mixed
    {
        return $this->items[$this->position];
    }

    public function next(): void
    {
        ++$this->position;
    }

    public function key(): mixed
    {
        return $this->position;
    }

    public function valid(): bool
    {
        return isset($this->items[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }
}

$fruits = new MyCollection();
foreach ($fruits as $key => $value) {
    echo "$key=>$value <br>";
}
?>

<?php
class MyCollectionOne implements IteratorAggregate
{
    private $items = ['dog', 'cat', 'rabbit'];
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}

$animals = new MyCollectionOne();
foreach ($animals as $key => $value) {
    echo "$key=>$value <br>";
}
?>

<!-- Object serialize -->
<?php
class User
{
    public $name;
    public $email;
}

$user = new User();
$user->name = "Arathi";
$user->email = "arathi@example.com";

// Convert object to string
$serialized = serialize($user);

echo $serialized . "<br>";
?>

<!-- Namespaces -->

<?php
require 'App/Controllers/person.php';
$person = new namespaceone\Person();
$person->greet();
?>

<?php
require 'App/models/person.php';

use App\models\PersonModel as ModelPerson;

$person = new ModelPerson();
$person->greet();
try {
    echo "Trying...<br>";
    throw new Exception("Oops!");
} catch (Exception $e) {
    echo "Caught: " . $e->getMessage() . "<br>";
} finally {
    echo "This will always execute.";
}

?>

<!-- generators -->

<?php
function getNumbers()
{
    for ($i = 0; $i <= 5; $i++) {
        yield $i;
    }
}
foreach (getNumbers() as $num) {
    echo $num . " ";
}
?>

<!-- references -->

<?php
$a = 5;
$b = &$a;
$b = 10;
echo "<br>";
echo $a;
echo "<br>";

function &getArray(&$arr, $key)
{
    return $arr[$key];
}

$data = ["a" => 10, "b" => 20];
$value = &getArray($data, "a");
$value = 30;
print_r($data);
?>

<!-- predefined variables -->

<?php
$x = 100;
$y = 200;
function sum()
{
    echo $GLOBALS['x'] + $GLOBALS['y'];
}
sum();
echo $_SERVER['PHP_SELF'];
echo $_GET['name']
?>

<!-- protocols -->
<?php
$content = file_get_contents("http://localhost:3000/dashboard");
echo $content;
?>

<?php
$data = file_get_contents("php://input");
echo "Received data: " . $data;
print_r(stream_get_wrappers())
?>

<!-- Arrow functions -->
<?php
$add = fn($a, $b) => $a + $b;
echo $add(2, 3);
?>

<!-- recursion -->
<?php
function factorial($n)
{
    if ($n <= 1)  return 1;
    return $n * factorial($n - 1);
}

echo factorial(5);
?>

<!-- String functions -->

<?php

$string = "Arathi";
echo "<br>";
echo "string length:" . strlen(($string));
echo strrev($string);
echo "<br>";

?>

<!-- Array functions -->

<?php
$arr = array(1, 2, 3, 4, 5);
echo "Array Functions";
echo count($arr);
echo sizeof($arr);
echo is_array(($arr));
array_push($arr, 'x', 'y');
echo "<br>";

echo 'array after push ' . var_dump($arr);
echo "<br>";

array_pop($arr);
echo 'array after pop ' . var_dump($arr);
echo "<br>";

array_unshift($arr, 'z');
echo 'array after unshift ' . var_dump($arr);
echo "<br>";


?>

<!-- date time functions -->
<?php
echo date("l, d M Y H:i:s");
date_default_timezone_set("Asia/Kolkata");
echo date("Y-m-d H:i:s"); // Local Indian time

$timestamp = strtotime("2025-12-25");
echo date("l", $timestamp); // Thursday
$date = new DateTime("2025-10-22 10:30:00");
$date->modify("+1 day");
echo $date->format("Y-m-d H:i:s"); // 2025-10-23 10:30:00

$date1 = new DateTime("2025-10-22");
$date2 = new DateTime("2025-12-31");
$diff = $date1->diff($date2);
echo $diff->days . " days remaining";
// Output: 70 days remaining

echo date("Y-m-d", strtotime("+7 days"));

$start = strtotime("2025-10-01");
$end = strtotime("2025-10-22");
$diff = ($end - $start) / (60 * 60 * 24);
echo "Difference: $diff days"; // 21 days

?>

<!-- CType functions -->
<?php
echo "<br>";
var_dump(ctype_alnum("Hello123"));
var_dump(ctype_alpha("ABC"));
var_dump(ctype_cntrl("\n"))
?>

<!-- cURL functions -->
<?php
//initialize
$ch = curl_init();

//set options
curl_setopt($ch, CURLOPT_URL, "https://jsonplaceholder.typicode.com/posts/1");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute
$response = curl_exec($ch);

//curl close
curl_close($ch);

//display response
echo $response
?>

<?php
$data = [
    "title" => "Hello World",
    "id" => "This is a test post",
    "body" => "This is the body",
    "userId" => 11
];

$ch = curl_init("https://jsonplaceholder.typicode.com/posts");

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>

<?php
$ch = curl_init("https://invalid-url.com...");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo $response;
}
curl_close($ch)
?>

<!-- file systems -->
<?php
//reading
$content = file_get_contents("sample.txt");
echo $content;

//writing
file_put_contents("newFile.txt", "Newly created file!");
echo "file created successfully";

//appending 
file_put_contents("sample.txt", "Appended this line", FILE_APPEND);

//Checking if a File Exists
if(file_exists("sample.txt")){
    echo "This file exists";
}
?>