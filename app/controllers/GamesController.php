<?php

namespace App\Controllers;

use App\Core\App;
use App\Services\Validation;;
use App\Domain\CategoriesManager;


class GamesController {

    public function create() {
        $results = [];
        return view('games.fizzbuzz', compact('results'));
    }

    public function store()
    {
        $lower = filter_var($_POST['lower'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
        $upper = filter_var($_POST['upper'], FILTER_VALIDATE_INT, array("options" => array("min_range" => 1)));
        $results = [];

        try {
            if( Validation::isInputValid($lower, $upper) ) {
                $diff = $upper - $lower;
                for ( $i = 0; $i <= $diff; $i++) {
                    $num = $lower + $i;
                    $results[$i] = !($num % 15) ? "FizzBuzz" : (!($num % 5) ? "Buzz" : (!($num % 3) ? "Fizz" : $num));
                }
            }
            return view('games.fizzbuzz', compact('results'));
        } catch (\Exception $e) {
            App::get('session')->set(["errors" => explode("\n", $e->getMessage())]);
            redirect('fizzbuzz');
        }
    }

}
