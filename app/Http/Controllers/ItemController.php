<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Mockery\Exception;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API de Items",
 *     version="1.0.0",
 *     description="API de gerenciamento de items do Elden Ring NightReign"
 * )
 */

class ItemController extends Controller
{

    /**
     * @OA\Get(
     *     path="/api/items",
     *     tags={"Items"},
     *     summary="Listar todos os items",
     *     description="Retorna todos os items disponiveis",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de items recuperada com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Item")),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno no servidor",
     *     @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="string"),
     *             @OA\Property(property="message", type="string", example="Error on get items"),
     *         )
     *     )
     * )
     */
    public function index()
    {
        try{
            $items = Item::all();

            return response()->json([
                'status' => 'success',
                'data' => $items,
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
                'message' => 'Error on get items'
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'price' => 'required'
        ]);

        return Item::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Item::find($id);
    }

    /**
     * Search for a name
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function search($name)
    {
        return Item::where('name', 'like', '%' . $name . '%')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Item::findOrFail($id);
        $product->update($request->all());
        return $product;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Item::destroy($id);
    }
}
