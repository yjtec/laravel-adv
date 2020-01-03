<?php
/**
 * @OA\Schema(
 *      schema="AdvPlatform",
 *      @OA\Property(property="id",type="integer",format="int32",description="id"),
 *      @OA\Property(property="title",type="string",description="标题"),
 *      @OA\Property(property="short_title",type="string",description="标识：android,ios,web,wx"),
 *  )
 */
namespace Yjtec\Adv\Models;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    //
    protected $table   = "banner_platform_v1";
    protected $visible = ['id', 'title','short_title'];
}
