<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'Product';

    public function Company()
    {
        return $this->hasOne(Company::class, 'id', 'company_id');
    }
}
