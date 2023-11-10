<?php

namespace App\Http\Controllers\Swagger;
use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *      path="/api/add-event",
 *      summary="create",
 *      tags={"Events"},
 *      security={{ "bearerAuth":{} }},
 *
 *      @OA\RequestBody(
 *          @OA\JsonContent(
 *              allOf={
 *                  @OA\Schema(
 *                      @OA\Property(property="name",type="string",example="Some Name"),
 *                      @OA\Property(property="location",type="string",example="Some location"),
 *                      @OA\Property(property="date",type="date",example="2016-05-26"),
 *                      @OA\Property(property="user_id",type="integer",example="12"),
 *                  )
 *              }
 *          )
 * ),
 *      @OA\Response(
 *          response=200,
 *          description="OK",
 *          @OA\JsonContent(
 *                 @OA\Property(property="message",type="string",example="Event  Added."),
 *                 @OA\Property(property="Event",type="object",
 *                 @OA\Property(property="name",type="string",example="Some Name"),
 *                 @OA\Property(property="location",type="string",example="Some location"),
 *                 @OA\Property(property="date",type="date",example="Some Date"),
 *                 @OA\Property(property="user_id",type="integer",example="12"),
 *                 @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                 @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                 @OA\Property(property="id",type="integer",example="122"),
 *                ),
 *          )
 *      )
 *      ),
 *
 * @OA\Get(
 *       path="/api/events",
 *       summary="all events",
 *       tags={"Events"},
 *       security={{ "bearerAuth":{} }},
 *
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *                      @OA\Property(property="Data",type="array", @OA\Items(
 *                      @OA\Property(property="id",type="integer",example="122"),
 *                      @OA\Property(property="name",type="string",example="Some Name"),
 *                      @OA\Property(property="location",type="string",example="Some location"),
 *                      @OA\Property(property="date",type="date",example="Some Date"),
 *                      @OA\Property(property="user_id",type="integer",example="12"),
 *                      @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                      @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *
 *            )),
 *           ),
 *       ),
 *   ),
 * @OA\Get(
 *        path="/api/event/{event}",
 *        summary="show event",
 *        tags={"Events"},
 *        security={{ "bearerAuth":{} }},
 *        @OA\Parameter(
 *            description="ID Book",
 *            in="path",
 *            name="event",
 *            example=28
 *        ),
 *
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *           @OA\JsonContent(
 *                  @OA\Property(property="id",type="integer",example="28"),
 *                  @OA\Property(property="name",type="string",example="Some Name"),
 *                  @OA\Property(property="location",type="string",example="Some location"),
 *                  @OA\Property(property="date",type="date",example="Some Date"),
 *                  @OA\Property(property="user_id",type="integer",example="12"),
 *                  @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                  @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *           )
 *        )
 *    ),
 *
 * @OA\Put(
 *         path="/api/update-event/{event}",
 *         summary="update event",
 *         tags={"Events"},
 *         security={{ "bearerAuth":{} }},
 *         @OA\Parameter(
 *             description="ID Book",
 *             in="path",
 *             name="event",
 *             example=70
 *         ),
 *   @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="name",type="string",example="Some Name"),
 *                       @OA\Property(property="location",type="string",example="Ereven Armenia"),
 *                       @OA\Property(property="date",type="date",example="2016-05-26"),
 *                   )
 *               }
 *           )
 *       ),
 *         @OA\Response(
 *             response=200,
 *             description="OK",
 *            @OA\JsonContent(
 *                        @OA\Property(property="message",type="string",example="Event Updated."),
 *                        @OA\Property(property="Event",type="object",
 *                        @OA\Property(property="id",type="integer",example="70"),
 *                        @OA\Property(property="name",type="string",example="Some Name"),
 *                        @OA\Property(property="location",type="string",example="Ereven Armenia"),
 *                        @OA\Property(property="date",type="date",example="2016-05-26"),
 *                        @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                        @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                        ),
 *            )
 *         )
 *     ),
 *
 * @OA\Delete(
 *         path="/api/delete-event/{event}",
 *         summary="delete event",
 *         tags={"Events"},
 *         security={{ "bearerAuth":{} }},
 *         @OA\Parameter(
 *             description="ID Book",
 *             in="path",
 *             name="event",
 *             example=74
 *         ),
 *
 *         @OA\Response(
 *             response=200,
 *             description="OK",
 *            @OA\JsonContent(
 *                   @OA\Property(property="message",type="string",example="Event Deleted."),
 *            )
 *         )
 *     ),
 */


class EventsController extends Controller
{

}
