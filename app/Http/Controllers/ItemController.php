<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
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

    public function create()
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/item/add",
     *     tags={"Items"},
     *     summary="Criar novo item",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Item")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Item criado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Item has been created successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Item"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation Error",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="errors", type="object"),
     *             @OA\Property(property="message", type="string", example="Validation error"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=409,
     *         description="Conflict",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="string"),
     *             @OA\Property(property="message", type="string", example="Item already exists"),
     *         )
     *     )
     * )
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
                'notes' => 'required|string',
                'scaling' => 'required|string|max:1',
                'physical_damage' => 'required|integer|min:0',
                'magic_damage' => 'required|integer|min:0',
                'fire_damage' => 'required|integer|min:0',
                'lightning_damage' => 'required|integer|min:0',
                'holy_damage' => 'required|integer|min:0',
                'critical_chance' => 'required|integer|min:0',
                'level_required' => 'required|integer|min:1',
                'physical_defense' => 'required|integer|min:0|max:100',
                'magic_defense' => 'required|integer|min:0|max:100',
                'fire_defense' => 'required|integer|min:0|max:100',
                'lightning_defense' => 'required|integer|min:0|max:100',
                'holy_defense' => 'required|integer|min:0|max:100',
                'boost' => 'required|integer|min:0|max:100',
            ]);

            if (Item::where('name', $request['name'])->exists()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'Item already exists',
                    'error' => 'duplicate entry for key `name`',
                ], 409);
            }

            $item = Item::create($request->all());

            return response()->json([
               'status' => 'success',
               'message' => 'Item has been created successfully',
               'data' => $item,
            ], 201);

        } catch (ValidationException $e){
            return response()->json([
               'status' => 'error',
               'error' => $e->errors(),
               'message' => 'Validation error'
            ], 422);
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
                'message' => 'Error on create item'
            ], 500);
        }
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
