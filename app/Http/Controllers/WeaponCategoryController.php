<?php

namespace App\Http\Controllers;

use App\Models\WeaponCategory;
use Illuminate\Http\Request;

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
}
