<?php

namespace Beaplat\Activity;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * If you use fillable attribute
     * you need to add columns once you add a column to table
     * so you'd better use guarded
     * and you can not use fillable and guarded at the same time
     */
    protected $guarded = ['id'];
}