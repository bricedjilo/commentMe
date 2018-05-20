<?php

namespace App\Domain;

use App\Core\App;
use App\Exception\{ CustomExceptionType, CustomException };
use App\Models\User;
use App\Services\Utility;

class CommentsManager {

    public function create($comment)
    {
        if ( ! App::get('database')->insert('comments', $comment, 'App\Models\Comment')) {
            throw new CustomException(CustomExceptionType::SQL_STORE,
                "We could not add your comment titled \"{$product["name"]}\".
                Please check the fields and try again."
            );
        }
        return true;
    }

}
