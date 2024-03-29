<?php

namespace App\Models;

use App\Traits\CreatedUpdatedBy;
use Baum\NestedSet\Node as WorksAsNestedSet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use WorksAsNestedSet;
    use CreatedUpdatedBy;

    ////////////////////////////////////////////////////////////////////////////

    //
    // Below come the default values for Baum's own Nested Set implementation
    // column names.
    //
    // You may uncomment and modify the following fields at your own will,
    // provided they match *exactly* those provided in the migration.
    //
    // If you don't plan on modifying any of these you can safely remove them.
    //

    // /**
    //  * Column name which stores reference to parent's node.
    //  *
    //  * @var string
    //  */
     protected $parentColumnName = 'parent_id';

    // /**
    //  * Column name for the left index.
    //  *
    //  * @var string
    //  */
     protected $leftColumnName = 'left';

    // /**
    //  * Column name for the right index.
    //  *
    //  * @var string
    //  */
     protected $rightColumnName = 'right';

    // /**
    //  * Column name for the depth field.
    //  *
    //  * @var string
    //  */
     protected $depthColumnName = 'depth';

    // /**
    //  * Column to perform the default sorting.
    //  *
    //  * @var string
    //  */
     protected $orderColumnName = null;

    // /**
    //  * Columns which restrict what we consider our Nested Set list
    //  *
    //  * This is to support "scoping" which may allow to have multiple nested
    //  * set trees in the same database table.
    //  *
    //  * You should provide here the column names which should restrict Nested
    //  * Set queries. f.ex: company_id, etc.
    //  *
    //  * @var array
    //  */
    // protected $scopeColumnNames = [];

    protected $fillable = ['name', 'cap_bac', 'slug', 'parent_id'];

    ////////////////////////////////////////////////////////////////////////////

    //
    // Baum makes available two model events to application developers:
    //
    // 1. `moving`: fired *before* the a node movement operation is performed.
    //
    // 2. `moved`: fired *after* a node movement operation has been performed.
    //
    // In the same way as Eloquent's model saving or creating events, returning
    // false from the `moving` event handler will halt the operation.
    //
    // Please refer the Laravel documentation for further instructions on how
    // to hook your own callbacks/observers into this events:
    // http://laravel.com/docs/eloquent#model-events
}
