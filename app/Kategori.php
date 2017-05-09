<?php

namespace App;
use App\Barang;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'categories';
    protected $fillable = ['title', 'parent_id'];

 public static function boot()
    {
        parent::boot();

        static::deleting(function($model) {
            // remove parent from this category's child
            foreach ($model->childs as $child) {
                $child->parent_id = '';
                $child->save();
            }
            // remove relations to products
            $model->products()->detach();
        });
    }


    public function childs()
    {
        return $this->hasMany('App\Kategori', 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Kategori', 'parent_id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Barang');
    }


    /**
     * Search for category without parent
     */
    public function scopeNoParent($query)
    {
        return $this->where('parent_id', '');
    }

    /**
     * Get all product id from active category and its child
     */
    public function getRelatedBarangsIdAttribute()
    {
        $result = $this->products->lists('id')->toArray();
        foreach ($this->childs as $child) {
            $result = array_merge($result, $child->related_barangs_id);
        }
        return $result;
    }


     public function getTotalBarangsAttribute()
    {
        return Barang::whereIn('id', $this->related_barangs_id)->count();
    }

    public function hasParent()
    {
        return $this->parent_id > 0;
    }

    public function hasChild()
    {
        return $this->childs()->count() > 0;
    }

}
