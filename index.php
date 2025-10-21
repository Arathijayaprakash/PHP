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
?>

<!-- user Defined Types -->
<?php
class Elephant {}
function feed(Elephant $e): void
{
    echo "Feeding the Elephant";
}
$e = new Elephant();
feed(($e))
?>

<!-- Union Types -->

<?php
function ShowId(int|string $id): void
{
    echo "Your Id is $id\n";
}
ShowId(101);
ShowId('ACE')
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
iterate(['apple', 'banana', 'orange'])
?>

<!-- Callable -->

<?php
    function sayHello()  {
        echo "Helloo!";
    }
    $fun = 'sayHello';
    $fun()
?>

<?php
    class Greeter{
        function greet($name) : void {
            echo "Helloo, $name";
        }
    }

    $g = new Greeter();
    $callback = [$g,'greet'];
    call_user_func($callback, 'Arathi')
?>

<?php
    class Math{
        static function square($n){
            return $n * $n;
        }
    }

    $callback = ['Math','square'];
    echo call_user_func($callback, 9)
?>

<!-- variable variables -->
<?php
    $foo = 'Arathi';
    $$foo = 'Akshay';
    echo $foo;
    echo $Arathi;
?>