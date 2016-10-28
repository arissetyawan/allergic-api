<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Allergic extends Model
{
    private $rules = array(
        'name' => 'required|min:5',
        'avoid' => 'required|min:10',
        'take_care' => 'required|min:10'
    );
    
    public $errors;
    
    public function validates(array $options)      
    {
        $validator = Validator::make($options, $this->rules);
        $fails = $validator->fails();
        $this->errors = $validator->errors();
        return !$fails;
    }

    public function save(array $options = [])
    {
        if($this->validates($options))
        {
            return parent::save();
        }
        
    }

}
