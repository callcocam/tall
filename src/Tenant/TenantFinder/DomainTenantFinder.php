<?php

/**
* Created by Bengs.
* User: contato@bengs.com.br
* https://www.bengs.com.br
*/
namespace Tall\Tenant\TenantFinder;

use Illuminate\Http\Request;
use Tall\Tenant\Models\Concerns\UsesTenantModel;
use Tall\Models\Tenant;

class DomainTenantFinder extends TenantFinder
{
    use UsesTenantModel;

    public function findForRequest(Request $request): ?Tenant
    {
        $host = $request->getHost();
        $data[] = str_replace(["admin.","www."], ["",""], $host);
        $data[] = $host;
        return $this->getTenantModel()::whereDomain($data)->first();
    }
}
