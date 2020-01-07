<?php

namespace Yjtec\Adv\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yjtec\Adv\Models\Adv;
use Yjtec\Adv\Requests\SearchRequest;
use Yjtec\Adv\Requests\StoreRequest;
use Yjtec\Adv\Requests\UpdateRequest;
use Yjtec\Adv\Resources\AdvResource;
use Yjtec\Adv\Resources\Advs as AdvsResource;

class IndexController extends Controller
{
    private $advM;
    public function __construct()
    {
        $this->advM = new Adv();
    }
    /**
     * @OA\Get(
     *     path="/adv",
     *     tags={"Adv"},
     *     summary="搜索",
     *     operationId="AdvSearch",
     *     @OA\Parameter(description="广告类型",in="query",name="type",@OA\Schema(type="string")),
     *     @OA\Parameter(description="平台",in="query",name="platform",@OA\Schema(type="string")),
     *     @OA\Parameter(description="状态:close 关闭 open 打开",in="query",name="status",@OA\Schema(type="string")),
     *     @OA\Parameter(description="每页显示条数",in="query",name="pageSize",@OA\Schema(type="integer")),
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/AdvListReturn")
     *     )
     * )
     */
    public function search(SearchRequest $request)
    {
        $pageSize = 10;
        $where    = [];
        $status = ['close'=>-1,'open'=>1];
        if ($request->has('pageSize')) {
            $pageSize = $request->pageSize;
        }
        if ($request->has('type')) {
            $where[] = ['type_id', $request->type];
        }
        if ($request->has('platform')) {
            $where[] = ['platform_id', $request->platform];
        }

        if($request->has('status')){
            $where[] =['status',$status[$request->status]];
        }
        $list = $this->advM->where($where)->orderBy('id','desc')->paginate($pageSize);
        return new AdvsResource($list);
    }
    /**
     * @OA\Put(
     *     path="/adv/{id}/{operator}",
     *     tags={"Adv"},
     *     summary="打开或关闭banner",
     *     operationId="AdvOperator",
     *     @OA\Parameter(description="ID",in="path",name="id",required=true,@OA\Schema(type="string")),
     *     @OA\Parameter(description="操作close关闭open打开",in="path",name="operator",required=true,@OA\Schema(type="string",enum={"open","close"})),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(ref="#/components/schemas/Success")
     *     )
     * )
     */
    public function operator($adv, $operator)
    {
        if ($operator == 'close') {
            $status = -1;
        } else if ($operator == 'open') {
            $status = 1;
        } else {
            return json_encode(['errcode' => -1, 'errmsg' => '操作类型不合法']);
        }
        $adv->status = $status;
        $adv->save();
        tne('SUCCESS');
    }
    /**
     * @OA\Put(
     *     path="/adv/{id}",
     *     tags={"Adv"},
     *     summary="修改广告图",
     *     operationId="AdvUpdate",
     *     @OA\Parameter(description="ID",in="path",name="id",required=true,@OA\Schema(type="string")),
     *     @OA\Response(
     *         response=200,
     *         description="成功",
     *         @OA\JsonContent(ref="#/components/schemas/Success")
     *     ),
     *     @OA\RequestBody(ref="#/components/requestBodies/AdvUpdateRequestBody"),
     * )
     */
    public function update($adv, UpdateRequest $request)
    {
        $data = $request->only(['title', 'pic', 'remark', 'link', 'platform_id', 'type_id', 'weight']);
        $data = collect($data)->filter(function ($value, $key) {return $value;});
        foreach ($data as $k => $v) {
            $adv->$k = $v;
        }
        $adv->save();
        tne('SUCCESS');
    }
    /**
     * @OA\Post(
     *     path="/adv",
     *     tags={"Adv"},
     *     summary="新增广告接口",
     *     operationId="AdvStore",
     *     @OA\Parameter(ref="#/components/parameters/postAdvPlatform"),
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/Success")
     *     ),
     *     @OA\RequestBody(ref="#/components/requestBodies/AdvStoreRequestBody"),
     * )
     */
    public function store(StoreRequest $request)
    {
        $data = $request->only(['title', 'pic', 'remark', 'link', 'type_id', 'weight']);
        if($request->has('platform_id')){
            $platform_id = $request->platform_id;
            if(is_array($platform_id)){
                foreach($platform_id as $k){
                    $this->advM::create(array_merge($data,['platform_id'=>$k]));
                }
            }else{
                $this->advM::create(array_merge($data,['platform_id'=>$platform_id]));
            }

        }else{
            $adv  = $this->advM::create($data);
        }
        tne('SUCCESS');
    }
    /**
     * @OA\Get(
     *     path="/adv/{id}",
     *     tags={"Adv"},
     *     summary="获取当个Banner",
     *     operationId="AdvShow",
     *     @OA\Parameter(
     *          description="banner ID",
     *          in="path",
     *          name="id",
     *          required=true,
     *          @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/AdvReturn")
     *     )
     * )
     */
    public function show($adv)
    {
        return new AdvResource($adv);
    }
}
