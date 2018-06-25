<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class,'product_user_insert');
    }
    public function Categories()
    {
        return $this->belongsTo(ProductCategory::class,'product_categories');
    }
    public function Statuses()
    {
        return  $this->belongsTo(ProductStatus::class,'product_statuses');
    }
    public function Authors()
    {
        return  $this->belongsTo(ProductAuthor::class,'product_authors');
    }
    public function Translators()
    {
        return  $this->belongsTo(ProductTranslator::class,'product_translators');
    }
    public function Sizes()
    {
        return  $this->belongsTo(ProductSize::class,'product_sizes');
    }
    public function VolumeTypes()
    {
        return  $this->belongsTo(ProductVolumeType::class,'product_volume_types');
    }
    public function Publishers()
    {
        return  $this->belongsTo(ProductPublisher::class,'product_publishers');
    }
    public function Language()
    {
        return  $this->belongsTo(ProductLanguage::class,'product_languages');
    }
    public function MeasurementUnit()
    {
        return  $this->belongsTo(ProductMeasurementUnit::class,'product_measurement_units');
    }
    public function WeightUnit()
    {
        return  $this->belongsTo(ProductWeightUnit::class,'product_weight_units');
    }
    public function CostUnit()
    {
        return  $this->belongsTo(ProductCostUnit::class,'product_cost_units');
    }

    public function scopeIsEnable($query)
    {
       return $query->where('isDelete',0);
    }

}
