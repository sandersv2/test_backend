<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfileModel extends Model
{
    protected $tabel = "user_profile";

    public $timestamps = false;

    protected $fillable = [
        "user_id",
        "user_fullname",
        "user_citizen",
        "user_nik",
        "user_npwp",
        "user_birth_place",
        "user_birth_date",
        "user_gender",
        "user_religion_id",
        "user_lvl_education_id",
        "user_mother_name",
        "user_total_assets",
        "user_marriage_status",
    ];
}
