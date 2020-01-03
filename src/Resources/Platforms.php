<?php

namespace Yjtec\Adv\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *      schema="AdvPlatformReturn",
 *      type="object",
 *      allOf={
 *          @OA\Schema(ref="#/components/schemas/Success"),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="data",type="array",
                    @OA\Items(ref="#/components/schemas/AdvPlatform")
 *             ),
 *         )
 *      }
 *  )
 */

class Platforms extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'errmsg'  => 'success',
            'errcode' => 0,
        ];
    }
}
