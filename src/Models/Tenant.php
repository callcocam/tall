<?php
/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Tall\Models\Concerns\HasCoverPhoto;
use Tall\Tenant\Models\Concerns\UsesLandlordConnection;

class Tenant extends AbstractModel
{
    use HasFactory, HasCoverPhoto,UsesLandlordConnection;

    protected $guarded = ['id'];


    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d'
    ];
    
     /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'cover_photo_url'
    ];

    
    public function makeCurrent(): static
    {
        if ($this->isCurrent()) {
            return $this;
        }

        static::forgetCurrent();

        $this->getMultitenancyActionClass(
                'make_tenant_current_action'
            )->execute($this);

        return $this;
    }

    public static function current(): ?static
    {
        $containerKey = config('tall.multitenancy.current_tenant_container_key');

        if (! app()->has($containerKey)) {
            return null;
        }

        return app($containerKey);
    }
    
    public function isCurrent(): bool
    {
        return static::current()?->getKey() === $this->getKey();
    }

    
    public static function forgetCurrent(): ?Tenant
    {
        $currentTenant = static::current();

        if (is_null($currentTenant)) {
            return null;
        }

        $currentTenant->forget();

        return $currentTenant;
    }


}
