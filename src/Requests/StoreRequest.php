<?php
namespace Yjtec\Adv\Requests;

use Illuminate\Foundation\Http\FormRequest;


/**
 * @OA\RequestBody(
 *     request="AdvStoreRequestBody",
 *     description="新增banner请求体",
 *     required=true,
 *     @OA\MediaType(
 *         mediaType="multipart/form-data",
 *         @OA\Schema(
 *             type="object",
 *             @OA\Property(
 *                  property="title",
 *                  description="标题",
 *                  type="string"
 *             ),
 *             @OA\Property(
 *                  property="pic",
 *                  description="图片路径",
 *                  type="string"
 *             ),
 *             @OA\Property(
 *                  property="remark",
 *                  description="描述",
 *                  type="string"
 *             ),
 *             @OA\Property(
 *                  property="link",
 *                  description="连接地址",
 *                  type="string"
 *             ),
 *             @OA\Property(
 *                  property="platform_id",
 *                  description="平台ID:默认为0 可不传",
 *                  type="integer"
 *             ),
 *             @OA\Property(
 *                  property="type_id",
 *                  description="类型:默认为0 可不传（主要用于多个地方的设置）",
 *                  type="integer"
 *             ),
 *             @OA\Property(
 *                  property="weight",
 *                  description="排序：默认0 不得大于255",
 *                  type="integer"
 *             ),
 *             
 *         )
 *     )
 * )
 */
class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|max:255'
        ];
    }

    public function attributes()
    {
        return [];
    }
}
