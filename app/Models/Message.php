<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'received_messages';
    
    protected $fillable = [
        'msg_id',
        'message',
        'timestamp'   
    ];

    /**
     * A transaction belongs to a specific account
     *
     * @return App\Models
     */
    public function device()
    {
        return $this->belongsTo(Device::class, 'client_no');
    }

    /**
     * A transaction belongs to a specific account
     *
     * @return App\Models
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
