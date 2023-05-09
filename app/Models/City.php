<?php

namespace App\Models;  
use CodeIgniter\Model;

// class City extends Model
// {
//     use HasFactory;
// }
class City extends Model{
    protected $table = 'cities';
    
    protected $allowedFields = [
        'state_id',
        'name',
        'image',
        'created_at'
    ];
}