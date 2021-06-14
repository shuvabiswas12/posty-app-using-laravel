<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable= [
        'body'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function likes() {
        return $this->hasMany(Like::class);
    }

    public function likedBy(User $user) {
        return $this->likes->contains('user_id', $user->id);
    }

    /** we create a new delete policy in PostPolicy.php file.
     * That is why, we are no longer use this ownedBy() function that created a few
     * moments ago.
     *
     * please check Policies\PostPolicy.php for better details.
     *
     */

//    public function ownedBy(User $user) {
//        return $user->id === $this->user_id;
//    }
}
