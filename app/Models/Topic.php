<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'topic_details';
    
    protected $fillable = [
        'topic_id',
        'topic_name'
    ];

    /**
     * An account has multiple transactions
     *
     * @return App\Models
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
