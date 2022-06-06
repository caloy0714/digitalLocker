<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'note'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getNoteContent()
    {
        return $this->note;
    }

    public function getCreated()
    {
        return $this->created_at;
    }
    
    public function setNoteContent($value)
    {
        // UPDATE
        $this->note = $value;
        return $this->save();
    }

}
