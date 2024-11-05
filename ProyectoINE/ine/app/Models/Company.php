<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'Company';

    public function Products()
    {
        return $this->hasMany(Product::class, 'company_id', 'id')->get();
    }
}
