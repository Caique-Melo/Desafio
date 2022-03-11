<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produto;
class ApiController extends Controller
{
    public function getAllProduto() {
        $produto = Produto::get()->toJson(JSON_PRETTY_PRINT);
        return response($produto, 200);
      }

      public function createProduto(Request $request) {

        $data = $request->all();
        Produto::create($data);

        return response()->json([
          "message" => "produto record created"
        ], 201);
      }

      public function getProduto($id) {
        if (Produto::where('id', $id)->exists()) {
          $produto = Produto::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
          return response($produto, 200);
        } else {
          return response()->json([
            "message" => "produto not found"
          ], 404);
        }
      }

      public function updateProduto(Request $request, $id) {
        if (Produto::where('id', $id)->exists()) {
          $produto = Produto::find($id);

          $produto->id_categoria_produto = is_null($request->id_categoria_produto) ? $produto->id_categoria_produto : $request->id_categoria_produto;
          $produto->data_cadastro = is_null($request->data_cadastro) ? $produto->data_cadastro : $request->data_cadastro;
          $produto->nome_produto = is_null($request->nome_produto) ? $produto->nome_produto : $request->nome_produto;
          $produto->valor_produto = is_null($request->valor_produto) ? $produto->valor_produto : $request->valor_produto;
          $produto->id_planejamento = is_null($request->id_planejamento) ? $produto->id_planejamento : $request->id_planejamento;
          $produto->nome_categoria = is_null($request->nome_categoria) ? $produto->nome_categoria : $request->nome_categoria;
          $produto->save();

          return response()->json([
            "message" => "records updated successfully"
          ], 200);
        } else {
          return response()->json([
            "message" => "produto not found"
          ], 404);
        }
      }

      public function deleteProduto($id) {
        if(Produto::where('id', $id)->exists()) {
          $produto = Produto::find($id);
          $produto->delete();

          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "produto not found"
          ], 404);
        }
      }
  }
