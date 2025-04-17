<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
     *     description="Cria um novo item caso esteja autenticado"
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
     * @OA\Put(
     *     path="/api/item/update/{id}",
     *     tags={"Items"},
     *     summary="Atualizar um item existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do item",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Item")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item atualizado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="item has been updated successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/Item")
     *         )
     * ),
     *     @OA\Response(
     *         response=404,
     *         description="Item not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="string"),
     *             @OA\Property(property="message", type="string", example="Item not found"),
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
     *     )
     *  )
     */
    public function update(Request $request, $id)
    {
        try{
            $item = Item::findOrFail($id);

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

            $item->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'item has been updated successfully',
                'data' => $item
            ], 200);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found',
                'error' => $e->getMessage()
            ], 404);
        } catch(ValidationException $e){
            return response()->json([
               'status' => 'error',
               'error' => $e->errors(),
               'message' => 'Validation error'
            ], 422);
        }
        catch(Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Error on update item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/item/delete/{id}",
     *     tags={"Items"},
     *     summary="Deletar um item existente",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID do item",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Item deletado com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Item has been deleted successfully"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Item not found",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="string"),
     *             @OA\Property(property="message", type="string", example="Item not found"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno no servidor",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="string"),
     *             @OA\Property(property="message", type="string", example="Error on delete item"),
     *         )
     *     )
     * )
     *
     */
    public function destroy($id)
    {
        try{
            $item = Item::findOrFail($id);

            $item->delete();

            return response()->json([
               'status' => 'success',
               'message' => 'Item has been deleted successfully',
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found',
                'error' => $e->getMessage()
            ], 404);
        } catch (Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error on delete item',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
