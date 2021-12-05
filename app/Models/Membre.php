<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Events;
use App\Models\User;

class Membre extends Model {
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'datenaissance',
        'jeupref',
        'mail',
        'description'
    ];

    public function events() {
        return $this -> belongsTo(Events::class);
    }

    public function user(){
        return $this -> belongsTo(User::class);
    }
}