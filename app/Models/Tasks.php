<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tasks extends Model
{
    use HasFactory;
    protected $table = "tasks";

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function status()
{
    return $this->belongsTo(Status::class);
}
}
