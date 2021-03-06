<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Membre;

class Events extends Model {
	
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'message',
        'date',
        'NumP',
        'game',
        
    ];
    // protected $dates = [ 
    // 	'created_at', 'deleted_at', 'started_at', 'update_at' 
    // ];
    protected $dates = [ 'created_at', 'deleted_at', 'started_at', 'update_at' ];
    
    public function user() { 
        return $this->belongsTo(User::class); 
    }

    public function membres(){
        return $this->hasMany(Membre::class);
    }

}
