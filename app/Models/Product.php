<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends BaseModel
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'brand_id',
        'category_id',
        'description',
        'price',
        'image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class)->withPivot(['value']);
    }

    public function productProperties()
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getProperty($name)
    {
        return $this->properties->first(function ($property) use ($name) {
            return $property->name === $name;
        });
    }

    public function getUnit($name) 
    {
        return $this->category->categoryProperties->first(function ($unit) use ($name) {
            return $unit->property_id === $name;
        });
    }

    public function getPropertyValue($name)
    {
        return $this->getProperty($name)->pivot->value;
        // TODO check exist property before get value
    }

    public function getPropertyUnit($name)
    {
        return $this->getUnit($name)->unit;
    }

    public function getAttribute($key)
    {
        $prefix = 'prop_';
        if (substr($key, 0, strlen($prefix)) === $prefix) {
            return $this->getPropertyValue(substr($key, strlen($prefix)));
        }

        $prefix = 'unit_';
        if (substr($key, 0, strlen($prefix)) === $prefix) {
            return $this->getPropertyUnit(substr($key, strlen($prefix)));
        }

        return parent::getAttribute($key);
    }

    public function getImageAttribute($image)
    {
        return url('assets/images/products-images') . '/' . $image;
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
