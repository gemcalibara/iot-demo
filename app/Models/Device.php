<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table = 'customer_x_clients';

    protected $fillable = [
        'client_no',
        'device_name'
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
