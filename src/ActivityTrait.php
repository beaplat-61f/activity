<?php

namespace Beaplat\Activity;

use Auth;
use Request;
use ReflectionClass;
use Activity;

trait ActivityTrait
{
    /**
     * Init trait
     */
    public static function bootActivityTrait()
    {
        foreach (['created', 'updated', 'deleted'] as $event) {
            static::$event(function ($model) use ($event) {
                $model->addActivity($event);
            });
        }
    }

    /**
     * Add activity log
     *
     * @param string $event
     *
     * @return void
     */
    public function addActivity($event)
    {
        Activity::create([
            'user_id'      => Auth::check() ? Auth::id() : 0,
            'subject_id'   => $this->id,
            'subject_type' => get_class($this),
            'name'         => $this->getActivityName($this, $event),
            'ip'           => Request::getClientIp(),
            'operation'    => $event,
            'uri'          => Request::getRequestUri(),
            'method'       => Request::method(),
        ]);
    }

    /**
     * Get operation name
     *
     * @param string $model
     * @param string $action
     *
     * @return string
     */
    protected function getActivityName($model, $action)
    {
        return strtolower((new ReflectionClass($model))->getShortName());

        // return "{$action}_{$name}";
    }
}