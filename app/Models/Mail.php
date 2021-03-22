<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Mail extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'subject',
        'message',
        'user_id',
        'status',
        'email_sent_at'
    ];

    protected $casts = [
        'email_sent_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Enviado' : 'No enviado'; 
    }

    public function getEmailSentAtFormatAttribute()
    {
        $date = Carbon::parse($this->email_sent_at)->format('Y-m-d');
        return ($this->email_sent_at) ? $date : null;
    }
    
}
