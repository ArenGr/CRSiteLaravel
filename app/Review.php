<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public static function findCarouselReviews() {
        return Review::where('carousel_status', '1')->orderBy('id', 'asc')->get();
    }

    public static function findAll($order) {
        return Review::orderBy('id', $order)->get();
    }
}
