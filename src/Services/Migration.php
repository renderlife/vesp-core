<?php

namespace Vesp\Services;

use Illuminate\Database\Capsule\Manager;
use Illuminate\Database\Schema\Builder;
use Phinx\Migration\AbstractMigration;

class Migration extends AbstractMigration
{
    /** @var Manager $eloquent */
    public $eloquent;
    /** @var Builder $schema */
    public $schema;


    public function init()
    {
        $this->eloquent = new Eloquent();
        $this->eloquent->bootEloquent();
        $this->schema = $this->eloquent->schema();
    }
}