<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class Input extends AbstractModel
{
    use HasFactory,UsesLandlordConnection;
 
    protected $guarded = ['id'];
    protected $with = ['attributes', 'options'];

     /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];

    //protected $table = "table";

    public function options()
    {
        return $this->hasMany(InputOption::class);
    }

    public function attributes()
    {
        return $this->hasMany(InputAttribute::class);
    }

}
