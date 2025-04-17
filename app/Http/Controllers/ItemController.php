<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Mockery\Exception;

class ItemController extends Controller
{

    /**
     * Listar todos os items
     *
     * @group Items
     * @response 200 scenario="Sucesso" [
     *   {
     *       "id": 1,
     *       "name": "Item 1",
     *       "description": "Descrição do item 1",
     *       "created_at": "2023-10-01T12:34:56",
     *       "updated_at": "2023-10-01T12:34:56"
     *   },
     *   {
     *       "id": 2,
     *       "name": "Item 2",
     *       "description": "Descrição do item 2",
     *       "created_at": "2023-10-01T12:34:56",
     *       "updated_at": "2023-10-01T12:34:56"
     *   }
     * ]
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
     * Create new item
     *
     * @group Items
     * @authenticated
     *
     * @bodyParam name string required The name of the item. Example: Sword of Truth
     * @bodyParam description string required The item description. Example: A powerful magical sword
     * @bodyParam notes string required Additional notes. Example: Found in ancient ruins
     * @bodyParam scaling string required The scaling grade (S,A,B,C,D,E). Example: A
     * @bodyParam physical_damage integer required Physical damage (0-100). Example: 75
     * @bodyParam magic_damage integer required Magic damage (0-100). Example: 50
     * @bodyParam fire_damage integer required Fire damage (0-100). Example: 25
     * @bodyParam lightning_damage integer required Lightning damage (0-100). Example: 25
     * @bodyParam holy_damage integer required Holy damage (0-100). Example: 25
     * @bodyParam critical_chance integer required Critical hit chance (0-100). Example: 15
     * @bodyParam level_required integer required Minimum level required (1+). Example: 30
     * @bodyParam physical_defense integer required Physical defense (0-100). Example: 50
     * @bodyParam magic_defense integer required Magic defense (0-100). Example: 40
     * @bodyParam fire_defense integer required Fire defense (0-100). Example: 30
     * @bodyParam lightning_defense integer required Lightning defense (0-100). Example: 30
     * @bodyParam holy_defense integer required Holy defense (0-100). Example: 30
     * @bodyParam boost integer required Stat boost value (0-100). Example: 20
     *
     * @response 201 scenario="Success" {
     *     "status": "success",
     *     "message": "Item has been created successfully",
     *     "data": {
     *         "name": "Sword of Truth",
     *         "description": "A powerful magical sword",
     *         "notes": "Found in ancient ruins",
     *         "scaling": "A",
     *         "physical_damage": 75,
     *         "magic_damage": 50,
     *         "fire_damage": 25,
     *         "lightning_damage": 25,
     *         "holy_damage": 25,
     *         "critical_chance": 15,
     *         "level_required": 30,
     *         "physical_defense": 50,
     *         "magic_defense": 40,
     *         "fire_defense": 30,
     *         "lightning_defense": 30,
     *         "holy_defense": 30,
     *         "boost": 20,
     *         "updated_at": "2024-01-20T15:33:12.000000Z",
     *         "created_at": "2024-01-20T15:33:12.000000Z",
     *         "id": 1
     *     }
     * }
     *
     * @response 422 scenario="Validation Error" {
     *     "status": "error",
     *     "errors": {
     *         "name": ["The name field is required"],
     *         "description": ["The description field is required"]
     *     },
     *     "message": "Validation error"
     * }
     *
     * @response 409 scenario="Conflict" {
     *     "status": "error",
     *     "message": "Item already exists",
     *     "error": "duplicate entry for key `name`"
     * }
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
     * Update item
     *
     * @group Items
     * @authenticated
     *
     * @urlParam id required The ID of the item. Example: 1
     *
     * @bodyParam name string required The name of the item. Example: Sword of Truth
     * @bodyParam description string required The description of the item. Example: A powerful magical sword
     * @bodyParam notes string required Additional notes about the item. Example: Found in ancient ruins
     * @bodyParam scaling string required The scaling grade (S,A,B,C,D,E). Example: A
     * @bodyParam physical_damage integer required Physical damage value (min: 0). Example: 75
     * @bodyParam magic_damage integer required Magic damage value (min: 0). Example: 50
     * @bodyParam fire_damage integer required Fire damage value (min: 0). Example: 25
     * @bodyParam lightning_damage integer required Lightning damage value (min: 0). Example: 25
     * @bodyParam holy_damage integer required Holy damage value (min: 0). Example: 25
     * @bodyParam critical_chance integer required Critical hit chance (min: 0). Example: 15
     * @bodyParam level_required integer required Required level (min: 1). Example: 30
     * @bodyParam physical_defense integer required Physical defense (0-100). Example: 50
     * @bodyParam magic_defense integer required Magic defense (0-100). Example: 40
     * @bodyParam fire_defense integer required Fire defense (0-100). Example: 30
     * @bodyParam lightning_defense integer required Lightning defense (0-100). Example: 30
     * @bodyParam holy_defense integer required Holy defense (0-100). Example: 30
     * @bodyParam boost integer required Stat boost (0-100). Example: 20
     *
     * @response 200 scenario="Success" {
     *     "status": "success",
     *     "message": "item has been updated successfully",
     *     "data": {
     *         "name": "Sword of Truth",
     *         "description": "A powerful magical sword",
     *         "notes": "Found in ancient ruins",
     *         "scaling": "A",
     *         "physical_damage": 75,
     *         "magic_damage": 50,
     *         "fire_damage": 25,
     *         "lightning_damage": 25,
     *         "holy_damage": 25,
     *         "critical_chance": 15,
     *         "level_required": 30,
     *         "physical_defense": 50,
     *         "magic_defense": 40,
     *         "fire_defense": 30,
     *         "lightning_defense": 30,
     *         "holy_defense": 30,
     *         "boost": 20,
     *         "updated_at": "2024-01-20T15:33:12.000000Z",
     *         "created_at": "2024-01-20T15:33:12.000000Z",
     *         "id": 1
     *     }
     * }
     *
     * @response 404 scenario="Not Found" {
     *     "status": "error",
     *     "message": "Item not found",
     *     "error": "No query results for model [App\\Models\\Item] 1"
     * }
     *
     * @response 422 scenario="Validation Error" {
     *     "status": "error",
     *     "errors": {
     *         "name": ["The name field is required"],
     *         "description": ["The description field is required"]
     *     },
     *     "message": "Validation error"
     * }
     *
     * @response 500 scenario="Error on update item" {
     *      "status": "error",
     *      "errors": {
     *          "name": ["Error on update item"],
     *          "description": ["check if the shipment is correct"]
     *      },
     *      "message": "There was an error updating the item"
     *  }
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
