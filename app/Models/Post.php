<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Post extends Model
{
    use HasFactory;

    // This allows us to pull in the category data with every single get request for Posts
    protected $with = ['category'];

    protected const DEFAULT_ROUTE = 'slug';

    // This allows for mass assignment of properties to a model. We only want non important values here,
    // incase of a malicious user trying to add extra data. This would be a mass assignment vulnerability
    // You can use guarded to add variables that we don't want mass assigned
    // Only use mass assignment on datat you control!
    protected $fillable = ['title', 'excerpt', 'body', 'slug', 'category_id'];
    protected $guarded = ['id'];

    // /**
    //  * This function will define the default variable to use when routing.  
    //  * @return string
    //  */
    // public function getRouteKeyName(): string
    // {
    //     return self::DEFAULT_ROUTE;        
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
