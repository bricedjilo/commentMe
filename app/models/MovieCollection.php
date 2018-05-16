<?php

class MovieCollection implements Countable
{
    protected $collection = [];

    public function add($movies) {
        if(is_array($movies)) {
            array_map(function($movie) {
                return $this->collection[] = $movie;
            }, $movies);
        } else {
            $this->collection[] = $movies;
        }

    }

    public function count() {
        return count($this->collection);
    }
}
