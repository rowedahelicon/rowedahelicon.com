<?php

$quotes = array();
$quotes[] = "So I believe in a universe that doesn't care and people who do.";
$quotes[] = "Your eyes tell me I'm still alive. And no matter what else happens... It's perfect when you're right by my side.";
$quotes[] = "You arrived, a soft slow end of time, saying if all we saw were bright lights, darkness is what we'd try to find.";
$quotes[] = "Are you a failure? Hmm, I don't know. I'm not sure what I was trying to do.";
$quotes[] = "The woods are lovely, dark, and deep. But I have promises to keep, and miles to go before I sleep.";
$quotes[] = "Though my soul may set in darkness, it will rise in perfect light.";
$quotes[] = "I have loved the stars too truly to be fearful of the night.";
$quotes[] = "At the end of everything, hold on to anything.";
$quotes[] = "Nothing is going to save us forever, but a lot of things can save us today.";
$quotes[] = "Live and drink.";
$quotes[] = "You can just do things.";
$quotes[] = "Happiness for everybody, free of charge, and may no one be left behind!";
$quotes[] = "Despite everything, it's still you.";
$quotes[] = "When the power of love beats the love of power, the world knows peace.";
$quotes[] = "Today is all we have, party like there is no tomorrow!";
$quotes[] = "Luck is the best thing to have!";
$quotes[] = "I feel guilty cause I'm driving you to the pain dimension.";
$quotes[] = "My screen crashed...I think my gra-...";
$quotes[] = "An NDA is a lock and three beers is a key.";
$quotes[] = "I love that gay little clown." ;
// $quotes[] = "";
// $quotes[] = "";
// $quotes[] = "";
// $quotes[] = "";
// $quotes[] = "";
// $quotes[] = "";


$str = "";

foreach ($quotes as $k => $v)
{
    $str = $str.'<li>'.$v.'</li>';
}

echo $str;