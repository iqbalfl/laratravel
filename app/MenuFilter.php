<?php

namespace App;

use JeroenNoten\LaravelAdminLte\Menu\Builder;
use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\LaratrustFacade as Laratrust;

class MenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (Laratrust::hasRole('member')) {
        return false;
        }

        return $item;
    }
}
