<?php

namespace App;

use Baum\Node;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class Category extends Node
{
    protected $with = [
        'content'
    ];

    protected $appends = [
        'name', 'slug'
    ];

    public function getNameAttribute() {
        return $this->content->name;
    }

    public function getSlugAttribute() {
        return $this->content->slug;
    }

    public function content() {
        return $this->hasOne(CategoryContent::class, 'category_id')
                    ->where('locale_code', '=', LaravelLocalization::getCurrentLocale())
                    ->orWhere('locale_code', '=', config('app.fallback_locale'));
    }

    public function contents() {
        return $this->hasMany(CategoryContent::class, 'category_id');
    }
}
