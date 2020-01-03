<?php

namespace Yjtec\Adv\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *      schema="AdvListReturn",
 *      type="object",
 *      allOf={
 *          @OA\Schema(ref="#/components/schemas/Success"),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="data",type="array",
 *                  @OA\Items(ref="#/components/schemas/AdvResource")
 *             ),
 *         )
 *      }
 *  )
 */

class Advs extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'data' => AdvResource::collection($this),
            'errcode' => 0,
            'errmsg' => 'success'
        ];
    }
}
