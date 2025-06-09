<?php

use App\Models\patner;
use App\Models\Section;
use App\Models\Setting;

function get_setting_value($key){
    $data = Setting::where('key', $key)->first();
    return $data ? $data->value : null;
}

function get_section_data($key){
    $data = Section::where('post_as',$key)->first();
    if(isset($data)){
        return $data;
    }
}

