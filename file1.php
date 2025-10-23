<?php
#[Attribute]
class Author
{
    public string $name;
    public string $email;
    public function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }
}

#[Author("Arathi", "arathi@gmail.com")]
class AuthorClass {}
$reflection = new ReflectionClass(AuthorClass::class);
$attributes = $reflection->getAttributes();
foreach ($attributes as $attribute) {
    $instance = $attribute->newInstance();
    echo "<br>";
    echo $instance->name . " - " . $instance->email . " from file1";
    echo "<br>";
};
