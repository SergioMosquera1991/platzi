<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\CanRate;

//use Laravel\sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens, CanRate;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*public function ratings()
    {
        return $this->belongsToMany(Product::class, 'ratings')
            ->using(Rating::class)
            ->as('rating')
            ->withTimestamps();
    }

    public function rate(Product $product, float $rate): bool
    {
        if ($this->hasRated($product)) {
            return false;
        }

        $this->ratings()->attach($product->id, [
            'score' => $rate
        ]);

        return true;
    }

    public function unrate(Product $product): bool
    {
        if (! $this->hasRated($product)) {
            return false;
        }

        $this->ratings()->detach($product->id);

        return true;
    }

    public function hasRated(Product $model): bool
    {
        return $this->ratings()->wherePivot('product_id', $model->getKey())->exists();
    }
*/
    public function products(){
        return $this->hasMany(Product::class);
    }
}
