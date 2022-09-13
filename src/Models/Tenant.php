<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Models\Concerns\HasCoverPhoto;

class Tenant extends AbstractModel
{
    use HasFactory, HasCoverPhoto;

    protected $guarded = ['id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        static::$landlord->disable();
    }

    
     /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'cover_photo_url'
    ];

}
