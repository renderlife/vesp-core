<?php

namespace Vesp\Tests\Mock;

use Vesp\Models\User;

class ModelGetController extends \Vesp\Controllers\ModelGetController
{
    protected $model = User::class;
}
