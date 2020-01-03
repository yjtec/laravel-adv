<?php
/**
 * @OA\Schema(
 *      schema="AdvType",
 *      @OA\Property(property="id",type="integer",format="int32",description="id"),
 *      @OA\Property(property="title",type="string",description="标题"),
 *  )
 */
namespace Yjtec\Adv\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    //
    protected $table   = "banner_type_v1";
    protected $visible = ['id', 'title'];
}
