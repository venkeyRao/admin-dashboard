<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Postcode extends Model
{
    use HasFactory;

    public function suburb(): BelongsTo
    {
        return $this->belongsTo(Suburb::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
}
