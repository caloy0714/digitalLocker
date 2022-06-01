<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class locker extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'website_name',
        'username',
        'input_password'
    ];

    public function getId()
    {
        return $this->id;
    }

    public function getWebsiteName()
    {
        return $this->website_name;
    }

    public function getUsername()
    {
        return $this->username;
    }
    
    public function getPassword()
    {
        return $this->input_password;
    }

    public function getCreated()
    {
        return $this->created_at;
    }
    

    public function setWebsiteName($value)
    {
        // UPDATE friends SET complete_name=':value' WHERE id=$this->id
        $this->website_name = $value;
        return $this->save();
    }

    public function setUsername($value)
    {
        // UPDATE friends SET email=':value' WHERE id=$this->id
        $this->username = $value;
        return $this->save();
    }


    public function setPassword($value)
    {
        $this->input_password = $value;
        $input_password =  str_repeat("*", strlen($input_password)-4) . substr($input_password, -4);
        return $this->input_password;
    }
}
