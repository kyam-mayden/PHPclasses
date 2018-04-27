<?php

trait MakeNoise {
    public function makeNoise(){
        echo $this->noise;
    }
}

interface noiseable{
    public function makeNoise();
}

class Pen {
    private $animal1;
    private $animal2;
    private $animal3;

    public function __construct(Animal $animal1=NULL , Animal $animal2=NULL, Animal $animal3=NULL)
    {
        if($animal1 instanceof noiseable) {
            $this->animal1=$animal1;
        }
        if($animal2 instanceof noiseable) {
            $this->animal2=$animal2;
        }
        if($animal3 instanceof noiseable) {
            $this->animal3=$animal3;
        }
    }
}

abstract class Animal{
    private $name;
    private $legs;
    private $hairy;
    private $noise;

    public function __construct($name, $legs, $hairy, $noise = false)
    {
        $this->name=$name;
        $this->legs=$legs;
        $this->hairy=$hairy;
        $this->noise=$noise;
    }
}

class Lizard extends Animal implements noiseable{
    use MakeNoise;
}
class Mammal extends Animal implements noiseable{
    use MakeNoise;
}
class Insect extends Animal implements noiseable{
    use MakeNoise;
}

class Fish extends Animal{

}

$snake = new Lizard('snek', 0 , false, 'hiss');
$lion = new Mammal('Leo', 4 , true, 'Roar');
$bee = new Insect('python', 6, true, 'buzzzzzzzz');

$shark = new Fish('hammerhead' , 0, false);



$pen1 = new Pen($snake, $lion, $bee );
$pen2 = new Pen($lion, $bee, $shark);

var_dump($pen1);
