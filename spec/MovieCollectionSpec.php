<?php

namespace spec;

use Movie;
use MovieCollection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MovieCollectionSpec extends ObjectBehavior
{
    function it_is_initializable() {
        $this->shouldHaveType(MovieCollection::class);
    }

    function it_stores_a_collection_of_movies(Movie $movie) {
        $this->add($movie);
        $this->shouldHaveCount(1);
    }

    function it_can_accept_multiple_movies_to_add_at_once(Movie $movie1, Movie $movie2) {
        $this->add([$movie1, $movie2]);
        $this->shouldHaveCount(2);
    }
}