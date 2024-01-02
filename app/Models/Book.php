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

    public function scopePopular(Builder $query): Builder
    {
        return $query->withCount('reviews')
            ->orderBy('reviews_count','desc');
    }

    public function scopeHighestRated(Builder $query): Builder
    {
        return $query->withAvg('reviews', 'rating')
            ->orderBy('reviews_avg_rating','desc');
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



// \App\Models\Book::popular()->highestRated()->get();


// 1. **`\App\Models\Book::`**: Indicates that the query is targeting the `Book` model, which is assumed to be located in the `App\Models` namespace.

// 2. **`popular()`**: This is likely a custom scope or method defined in the `Book` model. It filters the books to include only those that are considered "popular." The specific criteria for what makes a book "popular" would be defined in the `popular` scope or method.

// 3. **`highestRated()`**: This is another custom scope or method defined in the `Book` model. It further filters the collection of books to include only those that are considered "highest rated." The specific criteria for what makes a book "highest rated" would be defined in the `highestRated` scope or method.

// 4. **`get()`**: Executes the query and retrieves the results as a collection. This collects the books that meet the criteria specified by the `popular` and `highestRated` scopes.

// In summary, the query is retrieving a collection of books from the `Book` model based on two custom scopes or methods: one for "popular" books and another for "highest rated" books. The specific criteria for popularity and highest rating are determined by the implementation of these scopes or methods in the `Book` model.