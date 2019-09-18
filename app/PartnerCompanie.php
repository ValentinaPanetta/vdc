<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerCompanie extends Model
{
	protected $fillable = ['company_name','company_email', 'company_phone', 'website', 'description', 'zipCode', 'street', 'city', 'country'];
    protected $dates = ['created_at', 'updated_at'];
    public $timestamps = false;
}

