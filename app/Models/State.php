<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class State extends Model
// {
//     use HasFactory;
// }

namespace App\Models;  
use CodeIgniter\Model;

// class City extends Model
// {
//     use HasFactory;
// }
class State extends Model{
    protected $table = 'states';
    
    protected $allowedFields = [
        'name',
        'created_at'
    ];

    public function greens()
    {
       return $this->hasMany(City::class, 'state_id', 'id');
    }
}
