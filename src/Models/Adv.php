<?php

namespace Yjtec\Adv\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @OA\Schema(
 *      schema="AdvResource",
 *      @OA\Property(property="id",type="integer",format="int32",description="id"),
 *      @OA\Property(property="title",type="string",description="标题"),
 *      @OA\Property(property="pic_url",type="string",description="图片全路径"),
 *      @OA\Property(property="pic",type="string",description="图片地址"),
 *      @OA\Property(property="link",type="string",description="连接地址"),
 *      @OA\Property(property="remark",type="string",description="描述"),
        @OA\Property(property="weight",type="integer",description="排序"),
        @OA\Property(property="status",type="integer",description="状态 1：正常 -1关闭"),
 *  )
 */
class Adv extends Model
{
    //
    protected $table    = "banner_v1";
    protected $fillable = [
        'title', 'pic', 'link', 'remark', 'type_id', 'platform_id', 'type_id', 'weight',
    ];
    protected $appends =['pic_url'];
    
    protected $visible = ['id','title','pic','link','status','weight','pic_url','created_at'];

    public function getPicUrlAttribute(){
        $pic = $this->attributes['pic'];
        if($file = config('share.file')){ 
            return $this->attributes['img_url'] = $file::url($pic);
        };
        return $this->attributes['img_url'] = \Storage::url($pic);
    }
}
