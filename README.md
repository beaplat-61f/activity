> This is an automatic log for Laravel 5, you can use the trait in the model class

## Installation

Run `composer require beaplat/activity`

Run `php artisan vendor:publish`

Run `php artisan migrate`

## Use

```php
<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Beaplat\Activity\ActivityTrait;

class Post extends Model
{
	use ActivityTrait;

    protected $guarded = ['id'];
}
```

If you use the `create` `update` `save` or `delete` function, the trait will auto create a log into `activities` table

For example

```php
User::find(1)->update(['name' => 'admin']);
```



> Notice: You must use the create(), update(), save() or delete() with the class Collection, for example, User::find(1)->update(['name' => 'admin']);
>
> You can not use the Builder object, for example, User::where('id', 1)->update(['name' => 'admin']); Because where() return the Builder object, Builder had not the model event.

