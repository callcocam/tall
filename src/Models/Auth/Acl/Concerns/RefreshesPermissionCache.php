<?php
/**
 * Created by Bengs.
 * User: contato@bengs.com.br
 * https://www.bengs.com.br
 */
namespace Tall\Models\Auth\Acl\Concerns;


trait RefreshesPermissionCache
{
    public static function bootRefreshesPermissionCache()
    {
        if (config('tall.cache.enabled')) {

            static::saved(function () {
                cache()->tags(config('tall.cache.tag'))->flush();
            });

            static::deleted(function () {
                cache()->tags(config('tall.cache.tag'))->flush();
            });
        }
    }
}
