<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'delivery_method',
        'payment_method',
        'email',
        'address',
        'country',
        'postal_index',
        'customer_order_id',
        'city',
        'phone',
        'summary',
        'newsletter_subscribe',
        'terms_and_services_agreement',
        'comment'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
