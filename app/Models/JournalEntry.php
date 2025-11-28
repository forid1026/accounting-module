<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    protected $fillable = [
        'date', 'ref_no', 'description', 'created_by', 'approved_by', 'status',
    ];

    public function items()
    {
        return $this->hasMany(JournalEntryItem::class);
    }
}
