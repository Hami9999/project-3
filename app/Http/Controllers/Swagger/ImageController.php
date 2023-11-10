<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *             path="/api/image",
 *             summary="upload image",
 *             tags={"Image"},
 *             security={{ "bearerAuth":{} }},
 *              @OA\RequestBody(
 *                  required=true,
 *                @OA\MediaType(
 *                    mediaType="multipart/form-data",
 *                        @OA\Schema(
 *                             @OA\Property(description="file to upload",property="image",type="file",example="image.png"),
 *                              required={"image"},
 *                        )
 *                )
 *       ),
 *
 *             @OA\Response(
 *                 response=201,
 *                 description="OK",
 *                 @OA\JsonContent(
 *                      @OA\Property(property="image",type="string",example="image/AHlaX9L2WeivBN17QNXdtXfagLkLhKPj8k4MhaA6.png"),
 *                      @OA\Property(property="user_id",type="integer",example="14"),
 *                      @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                      @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                      @OA\Property(property="id",type="integer",example="14"),
 *                  )
 *             )
 *             ),
 *
 *
 * @OA\Delete(
 *          path="/api/delete-image/{image}",
 *          summary="delete image",
 *          tags={"Image"},
 *          security={{ "bearerAuth":{} }},
 *          @OA\Parameter(
 *              description="ID Image",
 *              in="path",
 *              name="image",
 *              example=50
 *          ),
 *
 *          @OA\Response(
 *              response=200,
 *              description="OK",
 *             @OA\JsonContent(
 *                    @OA\Property(property="message",type="string",example="you deleted your image"),
 *             )
 *          )
 *      ),
 *
 * @OA\Post(
 *              path="/api/update-image",
 *              summary="update image",
 *              tags={"Image"},
 *              security={{ "bearerAuth":{} }},
 *               @OA\RequestBody(
 *                   required=true,
 *                 @OA\MediaType(
 *                     mediaType="multipart/form-data",
 *                         @OA\Schema(
 *                              @OA\Property(description="file to upload",property="image",type="file",example="image.png"),
 *                               required={"image"},
 *                              @OA\Property(property="id",type="integer",example="52"),
 *                         )
 *                 )
 *        ),
 *
 *              @OA\Response(
 *                  response=200,
 *                  description="OK",
 *                  @OA\JsonContent(
 *                       @OA\Property(property="message",type="string",example="You changed your image"),
 *                       @OA\Property(property="image",type="object",
 *                       @OA\Property(property="id",type="integer",example="52"),
 *                       @OA\Property(property="image",type="string",example="image/AHlaX9L2WeivBN17QNXdtXfagLkLhKPj8k4MhaA6.png"),
 *                       @OA\Property(property="user_id",type="integer",example="14"),
 *                       @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                       @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                     ),
 *                   )
 *              )
 *              ),
 */

class ImageController extends Controller
{

}


