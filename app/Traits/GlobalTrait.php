<?php

namespace App\Traits;

trait GlobalTrait
{
    public static function datatables($request, $query)
    {
        $orderBy = $request->orderBy ?? 'created_at';
        $sortBy = $request->sortBy && in_array($request->sortBy, ['asc', 'desc']) ? $request->sortBy : 'desc';
        $request->perPage ? $perPage = $request->perPage : $perPage = 10;
        $result = $query->orderBy($orderBy, (string)$sortBy)->paginate($perPage)->appends($request->all());
        return $result;
    }
}
