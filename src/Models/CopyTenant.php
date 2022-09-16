<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class CopyTenant extends AbstractModel
{
    use HasFactory;

    protected $guarded = ['id'];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'stepAccess' => 'array',
        'stepMenus' => 'array',
    ];

    //protected $table = "table";

     /**
    * @return string
    */
    protected function slugTo()
    {
        return false;
    }
}
