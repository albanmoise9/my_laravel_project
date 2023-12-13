<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gig extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'title',
        'tags',
        'email',
        'logo',
        'location',
        'company',
        'user_id'
    ];

    public function scopeFilter($query)
    {
        $fil = null;
        if(isset($_GET['tag']))
        {
            $fil = $this::where('tags', 'like', '%' . $_GET['tag'] . '%');
        }
        

        if(isset($_GET['search']) )
        {
            $fil = $query->where('tags', 'like', '%' . trim($_GET['search']) . '%')
                    ->orWhere('title', 'like', '%' . trim($_GET['search']) . '%')
                    ->orwhere('location', 'like', '%' . trim($_GET['search']) . '%')
                    ->orwhere('company', 'like', '%' . trim($_GET['search']) . '%');
                      
        }

        if(isset($_GET['filter']) )
        {
            if($_GET['filter'] === 'latest')
            {
                $fil = $this::orderBy('created_at', 'DESC');
            }
            elseif($_GET['filter'] === 'oldest')
            {
                $fil = $this::orderBy('created_at', 'ASC');
            }
        }
        return $fil;
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
