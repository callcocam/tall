<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tall\Models\Concerns\DateRange;
use Tall\Sluggable\SlugOptions;
use Tall\Sluggable\HasSlug;
use Illuminate\Database\Eloquent\SoftDeletes;
use Tall\Fluxo\Models\Traits\DbFilter;
use Tall\Scopes\UuidGenerate;

class AbstractModel extends Model
{
    use HasFactory, DateRange, HasSlug, SoftDeletes, UuidGenerate;
    use DbFilter;
    // use HasFactory, BelongsToTenants, DateRange, HasSlug, SoftDeletes, UuidGenerate;


    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setIncrementing(config('tall.incrementing', false));
        $this->setKeyType(config('tall.keyType', 'string'));
    }   

 
    //protected $appends = ['company'];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    // protected $casts = [
    //     'created_at' => 'date:d/m/Y H:i:s',
    //     'updated_at' => 'date:d/m/Y H:i:s',
    // ];

    public function getCompanyAttribute()
    {
        if(class_exists(\App\Models\Tenant::class))
            return $this->belongsTo(\App\Models\Tenant::class);
        else
            return $this->belongsTo(\Tall\Models\Tenant::class);
    }


    public function tenant()
    {
        if(class_exists(\App\Models\Tenant::class))
            return $this->belongsTo(\App\Models\Tenant::class);
        else
            return $this->belongsTo(\Tall\Models\Tenant::class);
    }

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
