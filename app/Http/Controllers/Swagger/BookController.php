<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *     path="/api/add-book",
 *     summary="create",
 *     tags={"Book"},
 *     security={{ "bearerAuth":{} }},
 *
 *     @OA\RequestBody(
 *         @OA\JsonContent(
 *             allOf={
 *                 @OA\Schema(
 *                     @OA\Property(property="name",type="string",example="Some Name"),
 *                     @OA\Property(property="author",type="string",example="Some Name"),
 *                     @OA\Property(property="publish_date",type="date",example="2016-05-26"),
 *                     @OA\Property(property="user_id",type="integer",example="12"),
 *                 )
 *             }
 *         )
 *     ),
 *
 *     @OA\Response(
 *         response=200,
 *         description="OK",
 *         @OA\JsonContent(
 *                @OA\Property(property="name",type="string",example="Some Name"),
 *                @OA\Property(property="author",type="string",example="Some Name"),
 *                @OA\Property(property="publish_date",type="date",example="Some Date"),
 *                @OA\Property(property="user_id",type="integer",example="12"),
 *                @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                @OA\Property(property="id",type="integer",example="122"),
 *         )
 *     )
 *
 *
 * ),
 * @OA\Get(
 *      path="/api/books",
 *      summary="all books",
 *      tags={"Book"},
 *      security={{ "bearerAuth":{} }},
 *
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *                     @OA\Property(property="Data",type="array", @OA\Items(
 *                     @OA\Property(property="id",type="integer",example="122"),
 *                     @OA\Property(property="name",type="string",example="Some Name"),
 *                     @OA\Property(property="author",type="string",example="Some Name"),
 *                     @OA\Property(property="publish_date",type="date",example="Some Date"),
 *                     @OA\Property(property="user_id",type="integer",example="12"),
 *                     @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                     @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *
 *           )),
 *          ),
 *      ),
 *  ),
 * @OA\Get(
 *       path="/api/book/{book}",
 *       summary="show book",
 *       tags={"Book"},
 *       security={{ "bearerAuth":{} }},
 *       @OA\Parameter(
 *           description="ID Book",
 *           in="path",
 *           name="book",
 *           example=28
 *       ),
 *
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *          @OA\JsonContent(
 *                 @OA\Property(property="id",type="integer",example="28"),
 *                 @OA\Property(property="name",type="string",example="Some Name"),
 *                 @OA\Property(property="author",type="string",example="Some Name"),
 *                 @OA\Property(property="publish_date",type="date",example="Some Date"),
 *                 @OA\Property(property="user_id",type="integer",example="12"),
 *                 @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                 @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *          )
 *       )
 *   ),
 *
 *  @OA\Put(
 *        path="/api/update-book/{book}",
 *        summary="update book",
 *        tags={"Book"},
 *        security={{ "bearerAuth":{} }},
 *        @OA\Parameter(
 *            description="ID Book",
 *            in="path",
 *            name="book",
 *            example=28
 *        ),
 *  @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name",type="string",example="Some Name"),
 *                      @OA\Property(property="author",type="string",example="Some Name"),
 *                      @OA\Property(property="publish_date",type="date",example="2016-05-26"),
 *                  )
 *              }
 *          )
 *      ),
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *           @OA\JsonContent(
 *                       @OA\Property(property="message",type="string",example="Book Updated."),
 *                       @OA\Property(property="Book",type="object",
 *                       @OA\Property(property="id",type="integer",example="28"),
 *                       @OA\Property(property="name",type="string",example="Some Name"),
 *                       @OA\Property(property="author",type="string",example="Some Name"),
 *                       @OA\Property(property="publish_date",type="date",example="2016-05-26"),
 *                       @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                       @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                       ),
 *           )
 *        )
 *    ),
 * @OA\Delete(
 *        path="/api/delete-book/{book}",
 *        summary="delete book",
 *        tags={"Book"},
 *        security={{ "bearerAuth":{} }},
 *        @OA\Parameter(
 *            description="ID Book",
 *            in="path",
 *            name="book",
 *            example=28
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *           @OA\JsonContent(
 *                  @OA\Property(property="message",type="string",example="Book Deleted."),
 *           )
 *        )
 *    ),
 */
class BookController extends Controller
{

}
