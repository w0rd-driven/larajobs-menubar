<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobEntry extends Model
{
    use HasFactory;
    use HasUuids;

    protected $guarded = [];

    public function feed()
    {
        return $this->belongsTo(Feed::class);
    }
}
