<?php

namespace App\Custom\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ProductsFilter
{
    protected $builder;
    protected $request;

    public function __construct(Builder $builder, Request $request)
    {
        $this->builder = $builder;
        $this->request = $request;
    }

    /**
     * Apply all filters.
     *
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function apply()
    {
        foreach ($this->filters() as $param => $value) {
            if (method_exists($this, $param)) {
                $this->$param($value);
            }
        }

        return $this->builder;
    }

    /**
     * Get a list of search parameters.
     *
     * @return array
     */
    public function filters()
    {
        return $this->request->all();
    }

    // todo -> repair search by name with other filters
    
    // public function search($value)
    // {
    //     $this->builder
    //         ->where('name', 'like', "%{$value}%")
    //         ->orWhere('description', 'like', "%{$value}%");
    // }

    public function sort($value)
    {
        $value = $value ?? 'rating_desc';

        $sortBy = $this->getSortingMethod($value);

        $this->builder
            ->orderBy(...$sortBy);
    }

    public function getSortingMethod($sortName)
    {
        return explode('_', $sortName);
    }

    public function brands($values)
    {
        $this->builder
            ->whereIn('brand_id', $values);
    }

    public function categories($values)
    {
        $this->builder
            ->whereIn('category_id', $values);
    }

    public function min($value)
    {
        $this->builder
            ->Where('price', '>=', $value);
    }

    public function max($value)
    {
        $this->builder
            ->Where('price', '<=', $value);
    }
}
