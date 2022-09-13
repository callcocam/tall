<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tall\Tenant\BelongsToTenants;
use Tall\Models\Concerns\DateRange;
use Tall\Sluggable\SlugOptions;
use Tall\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Tall\Scopes\UuidGenerate;

class AbstractModel extends Model
{
    use HasFactory, BelongsToTenants, DateRange, HasSlug, SoftDeletes, UuidGenerate;


    public $incrementing = false;

    protected $keyType = "string";

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'created_at' => 'date:d/m/Y H:i:s',
    //     'updated_at' => 'date:d/m/Y H:i:s',
    // ];

     /**
    * @return string
    */
    protected function slugTo()
    {
        return "slug";
    }
    /**
    * @return string
    */
    protected function slugFrom()
    {
        return 'name';
    }
     /**
     * @return SlugOptions
     */
    public function getSlugOptions()
    {
        if (is_string($this->slugTo())) {
            return SlugOptions::create()
                ->generateSlugsFrom($this->slugFrom())
                ->saveSlugsTo($this->slugTo());
        }
    }

    public function isUser()
    {
        return true;
    }
    //  /**
    //  * Interact with the outras_especificacoes.
    //  *
    //  * @param  string  $value
    //  * @return \Illuminate\Database\Eloquent\Casts\Attribute
    //  */
    // protected function createdAt(): Attribute
    // {
    //     return new Attribute(
    //         get: function ($value)  {  return date_carbom_format($value)->format('d/m/Y');},
    //         set: function ($value)  { return date_carbom_format($value)->format('Y-m-d');},
    //     );
    // }

    //  /**
    //  * Interact with the outras_especificacoes.
    //  *
    //  * @param  string  $value
    //  * @return \Illuminate\Database\Eloquent\Casts\Attribute
    //  */
    // protected function updatedAt(): Attribute
    // {
    //     return new Attribute(
    //         get: function ($value)  { dd($value); return date_carbom_format($value)->format('d/m/Y');},
    //         set: function ($value)  { return date_carbom_format($value)->format('Y-m-d');},
    //     );
    // }
}