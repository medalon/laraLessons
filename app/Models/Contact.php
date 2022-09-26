<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Scopes\FilterSearchScope;

class Contact extends Model
{
    use HasFactory, FilterSearchScope;

    protected $fillable = ['first_name', 'last_name', 'email', 'phone', 'address', 'company_id', 'user_id'];

    public $searchColumns = ['first_name', 'last_name', 'email', 'company.name'];

    public $filterColumns = ['company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class)->withoutGlobalScopes();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function scopeLatestFirst($query) 
    {
        return $query->orderBy('id', 'desc');
    }

    // public function getRouteKeyName()
    // {
    //     return 'first_name';
    // }
}
