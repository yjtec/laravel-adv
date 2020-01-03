<?php

namespace Yjtec\Adv\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yjtec\Adv\Models\Platform;
use Yjtec\Adv\Resources\Platforms as PlatformsResource;
class PlatformController extends Controller{
    /**
     * @OA\Get(
     *     path="/adv_platform",
     *     tags={"Adv"},
     *     summary="平台",
     *     operationId="AdvPlatformList",
     *     @OA\Response(
     *         response=200,
     *         description="pet response",
     *         @OA\JsonContent(ref="#/components/schemas/AdvPlatformReturn")
     *     )
     * )
     */
    public function index(Request $request){
        return new PlatformsResource(Platform::all());
    }
}