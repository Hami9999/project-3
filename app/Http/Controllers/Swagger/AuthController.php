<?php

namespace App\Http\Controllers\Swagger;

use App\Http\Controllers\Controller;

/**
 * @OA\Post(
 *       path="/api/register",
 *       summary="create user",
 *       tags={"User"},
 *
 *
 *       @OA\RequestBody(
 *           @OA\JsonContent(
 *               allOf={
 *                   @OA\Schema(
 *                       @OA\Property(property="name",type="string",example="Some Name"),
 *                       @OA\Property(property="email",type="email",example="demo@mail.ru"),
 *                       @OA\Property(property="password",type="string",example="123456789"),
 *                   )
 *               }
 *           )
 *  ),
 *       @OA\Response(
 *           response=200,
 *           description="OK",
 *           @OA\JsonContent(
 *                  @OA\Property(property="message",type="string",example="User created successfully."),
 *                  @OA\Property(property="User",type="object",
 *                  @OA\Property(property="name",type="string",example="Some Name"),
 *                  @OA\Property(property="email",type="string",example="demo@mail.ru"),
 *                  @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                  @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                  @OA\Property(property="id",type="integer",example="14"),
 *                 ),
 *           )
 *       )
 *       ),
 *
 * @OA\Post(
 *        path="/api/login",
 *        summary="user login",
 *        tags={"User"},
 *
 *        @OA\RequestBody(
 *            @OA\JsonContent(
 *                allOf={
 *                    @OA\Schema(
 *                        @OA\Property(property="email",type="email",example="demo@mail.ru"),
 *                        @OA\Property(property="password",type="string",example="123456789"),
 *                    )
 *                }
 *            )
 *   ),
 *        @OA\Response(
 *            response=200,
 *            description="OK",
 *            @OA\JsonContent(
 *                   @OA\Property(property="User",type="object",
 *                   @OA\Property(property="id",type="integer",example="14"),
 *                   @OA\Property(property="name",type="string",example="Some Name"),
 *                   @OA\Property(property="email",type="string",example="demo@mail.ru"),
 *                   @OA\Property(property="email_verified_at",type="string",example="null"),
 *                   @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                   @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                  ),
 *
 *                    @OA\Property(property="authorization",type="object",
 *                      @OA\Property(property="token",type="string",example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luI
 *                                                                                               iwiaWF0IjoxNjk5NDM5NDQyLCJleHAiOjE2OTk0NDMwNDIsIm5iZiI6MTY5OTQzOTQ0MiwianRpIjoiNGhsckNpaGJ
 *                                                                                               2QUltYTRwSyIsInN1YiI6IjEyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.
 *                                                                                               7ZIPHuyYF8trjjEayQnjb1GaUQY9kn9uO23o2EWcAoU"),
 *                      @OA\Property(property="type",type="string",example="bearer"),
 *                   ),
 *            )
 *        )
 *        ),
 * @OA\Post(
 *         path="/api/logout",
 *         summary="user logout",
 *         tags={"User"},
 *         security={{ "bearerAuth":{} }},
 *
 *         @OA\Response(
 *             response=200,
 *             description="OK",
 *             @OA\JsonContent(
 *               @OA\Property(property="message",type="string",example="Successfully logged out."),
 *             )
 *         )
 *         ),
 * @OA\Post(
 *          path="/api/forgetPassword",
 *          summary="user forgetPassword",
 *          tags={"User"},
 *           @OA\RequestBody(
 *             @OA\JsonContent(
 *                 allOf={
 *                     @OA\Schema(
 *                         @OA\Property(property="email",type="email",example="demo@mail.ru"),
 *                     )
 *                 }
 *             )
 *    ),
 *
 *          @OA\Response(
 *              response=200,
 *              description="OK",
 *              @OA\JsonContent(
 *                @OA\Property(property="message",type="string",example="Please open your email and click on url."),
 *              )
 *          )
 *          ),
 *
 *
 * @OA\Post(
 *          path="/api/refresh",
 *          summary="refresh token",
 *          tags={"User"},
 *          security={{ "bearerAuth":{} }},
 *
@OA\Response(
 *             response=200,
 *             description="OK",
 *             @OA\JsonContent(
 *                    @OA\Property(property="User",type="object",
 *                    @OA\Property(property="id",type="integer",example="14"),
 *                    @OA\Property(property="name",type="string",example="Some Name"),
 *                    @OA\Property(property="email",type="string",example="demo@mail.ru"),
 *                    @OA\Property(property="email_verified_at",type="string",example="null"),
 *                    @OA\Property(property="updated_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                    @OA\Property(property="created_at",type="date",example="2023-11-08T06:56:27.000000Z"),
 *                   ),
 *
 *                     @OA\Property(property="authorization",type="object",
 *                       @OA\Property(property="token",type="string",example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luI
 *                                                                                                iwiaWF0IjoxNjk5NDM5NDQyLCJleHAiOjE2OTk0NDMwNDIsIm5iZiI6MTY5OTQzOTQ0MiwianRpIjoiNGhsckNpaGJ
 *                                                                                                2QUltYTRwSyIsInN1YiI6IjEyIiwicHJ2IjoiMjNiZDVjODk0OWY2MDBhZGIzOWU3MDFjNDAwODcyZGI3YTU5NzZmNyJ9.
 *                                                                                                7ZIPHuyYF8trjjEayQnjb1GaUQY9kn9uO23o2EWcAoU"),
 *                       @OA\Property(property="type",type="string",example="bearer"),
 *                    ),
 *             )
 *         )
 *          ),
 *
 * @OA\Post(
 *           path="/api/reset-password",
 *           summary="user reset-password",
 *           tags={"User"},
 *            @OA\RequestBody(
 *              @OA\JsonContent(
 *                  allOf={
 *                      @OA\Schema(
 *                           @OA\Property(property="password",type="string",example="Some password"),
 *                           @OA\Property(property="confirmPassword",type="string",example="Some Password"),
 *                           @OA\Property(property="token",type="string",example="aGFrb2JAbWFpbC5ydQ=="),
 *                      )
 *                  }
 *              )
 *     ),
 *
 *           @OA\Response(
 *               response=200,
 *               description="OK",
 *               @OA\JsonContent(
 *                 @OA\Property(property="message",type="string",example="Your password changed"),
 *               )
 *           )
 *           ),
 *
 */
class AuthController extends Controller
{

}
