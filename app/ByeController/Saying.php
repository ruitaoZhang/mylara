<?php
class Saying
{
    public function __invoke($what)
    {
        echo 'i can say hello world !'.$what;
    }
}
$say = new Saying();
$say('zrt');