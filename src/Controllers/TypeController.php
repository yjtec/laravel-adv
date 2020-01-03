<?php

namespace Yjtec\Adv\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yjtec\Adv\Models\Type;
use Yjtec\Adv\Resources\Types as TypesResource;
class TypeController extends Controller{
    /**
     * @OA\Get(
     *     path="/adv_type",
     *     tags={"Adv"},
     *     summary="广告类型",
     *     operationId="AdvTypeList",
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/AdvTypeReturn")
     *     )
     * )
     */
    public function index(Request $request){
        return new TypesResource(Type::all());
    }
}