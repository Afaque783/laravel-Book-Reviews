<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;


class Book extends Model
{
    use HasFactory;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeTitle(Builder $query, string $title): Builder
    {
        return $query->where('title','LIKE','%' . $title . '%');
    }
}

// some Queries to fetch data from model 

// \App\Models\Book::withCount('reviews')->latest()->get();

// \App\Models\Book::withCount('reviews')->latest()->limit(3)->get
// (); 

// \App\Models\Book::limit(5)->withAvg('reviews', 'rating')->orderBy('reviews_avg_rating')->get();

// \App\Models\Book::withCount('reviews')->withAvg('reviews',
//  'rating')->having('reviews_count', '>=', 10)->orderBy('revi
// ews_avg_rating','desc')->limit(10)->get();
