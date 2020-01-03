<?php

namespace Yjtec\Adv\Resources;

use Illuminate\Http\Resources\Json\Resource;

/**
 * @OA\Schema(
 *      schema="AdvReturn",
 *      type="object",
 *      allOf={
 *          @OA\Schema(ref="#/components/schemas/Success"),
 *          @OA\Schema(
 *              @OA\Property(
 *                  property="data",type="object",
 *                  ref="#/components/schemas/AdvResource"
 *             ),
 *         )
 *      }
 *  )
 */

class AdvResource extends Resource
{
    public function toArray($request)
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'pic'         => $this->pic,
            'pic_url'     => $this->pic_url,
            'link'        => $this->link,
            'type_id'     => $this->type_id,
            'platform_id' => $this->platform_id,
            'status'      => $this->status,
            'remark'      => $this->remark,
            'weight'      => $this->weight,
            'created_at'  => (string) $this->created_at,
        ];
    }
    public function with($request)
    {
        return [
            'errcode' => 0,
            'errmsg'  => '成功',
        ];
    }
}
