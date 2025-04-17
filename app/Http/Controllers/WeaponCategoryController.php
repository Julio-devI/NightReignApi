<?php

namespace App\Http\Controllers;

use App\Models\WeaponCategory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *     title="API de Items",
 *     version="1.0.0",
 *     description="API de gerenciamento de items do Elden Ring NightReign"
 * )
 */
class WeaponCategoryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/weapon-categories",
     *     tags={"weapon-category"},
     *     summary="Listar todas as categorias de armas",
     *     description="Retorna todas as categorias de armas disponiveis",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de categorias de armas recuperada com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/weapon-category"),
     *         )
     *     ),
     *     @OA\Response(
     *         response=500,
     *         description="Erro interno no servidor",
     *     @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="error"),
     *             @OA\Property(property="error", type="string"),
     *             @OA\Property(property="message", type="string", example="Error on get weapon categories"),
     *         )
     *     )
     * )
     */
    public function index()
    {
        try{
            $items = WeaponCategory::all();

            return response()->json([
                'status' => 'success',
                'data' => $items,
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
                'message' => 'Error on get weapon categories'
            ], 500);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/weapon-category/add",
     *     tags={"weapon-category"},
     *     summary="Criar nova categoria de arma",
     *     description="Cria uma nova categoria de arma caso esteja autenticado"
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/weapon-category")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="categoria de arma criada com sucesso",
     *         @OA\JsonContent(
     *             @OA\Property(property="status", type="string", example="success"),
     *             @OA\Property(property="message", type="string", example="Weapon category has been created successfully"),
     *             @OA\Property(property="data", ref="#/components/schemas/weapon-category"),
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
     *             @OA\Property(property="message", type="string", example="weapon category already exists"),
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
            ]);

            if (WeaponCategory::where('name', $request['name'])->exists()){
                return response()->json([
                    'status' => 'error',
                    'message' => 'weapon category already exists',
                    'error' => 'duplicate entry for key `name`',
                ], 409);
            }

            $item = WeaponCategory::create($request->all());

            return response()->json([
               'status' => 'success',
               'message' => 'weapon category has been created successfully',
               'data' => $item,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
               'status' => 'error',
               'error' => $e->errors(),
               'message' => 'Validation error'
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'error' => $e->getMessage(),
                'message' => 'Error on create weapon category'
            ], 500);
        }
    }

    /**
     * @group Weapon Categories
     *
     * Atualizar uma categoria de arma existente.
     *
     * Atualiza os dados de uma categoria de arma pelo seu ID.
     *
     * @urlParam id integer required ID da categoria de arma. Ex: 1
     *
     * @bodyParam name string required Nome da categoria. Ex: Pistolas
     * @bodyParam description string Descrição da categoria. Ex: Armas curtas de fácil manuseio
     *
     * @response 200 {
     *   "status": "success",
     *   "message": "weapon category has been updated successfully",
     *   "data": {
     *     "id": 1,
     *     "name": "Pistolas",
     *     "description": "Armas curtas de fácil manuseio"
     *   }
     * }
     *
     * @response 404 {
     *   "status": "error",
     *   "error": "NotFoundException",
     *   "message": "weapon category not found"
     * }
     *
     * @response 422 {
     *   "status": "error",
     *   "message": "Validation error",
     *   "errors": {
     *     "name": ["O campo name é obrigatório."]
     *   }
     * }
     */
    public function update(Request $request, $id)
    {
        try{
            $item = WeaponCategory::findOrFail($id);

            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $item->update($request->all());

            return response()->json([
                'status' => 'success',
                'message' => 'weapon category has been updated successfully',
                'data' => $item
            ], 200);
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'weapon category not found',
                'error' => $e->getMessage()
            ], 404);
        } catch(ValidationException $e){
            return response()->json([
                'status' => 'error',
                'error' => $e->errors(),
                'message' => 'Validation error'
            ], 422);
        }
        catch(\Exception $e){
            return response()->json([
                'status' => 'error',
                'message' => 'Error on update item',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Delete an existing weapon category
     *
     * @group Weapon Categories
     *
     * Cria uma nova categoria de armas
     *
     * @urlParam id integer required The ID of the weapon category to delete Example: 1
     *
     * @response 200 {
     *   "status": "success",
     *   "message": "weapon category has been deleted successfully"
     * }
     *
     * @response 404 {
     *   "status": "error",
     *   "error": "No query results for model [App\\Models\\WeaponCategory] 1",
     *   "message": "weapon category not found"
     * }
     *
     * @response 500 {
     *   "status": "error",
     *   "error": "Server error message",
     *   "message": "Error on delete weapon category"
     * }
     */
    public function destroy($id)
    {
        try{
            $item = WeaponCategory::findOrFail($id);

            $item->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'weapon category has been deleted successfully',
            ], 200);

        } catch (ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'weapon category not found',
                'error' => $e->getMessage()
            ], 404);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Error on delete weapon category',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
