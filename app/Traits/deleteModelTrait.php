<?php

namespace App\Traits;

use AWS\CRT\Log;
use PHPUnit\Exception;

trait deleteModelTrait {
    public function deleteModelTrait($id, $model)
    {
        try {
            $model->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'delete successfully'
            ], 200);
        } catch (Exception $exception) {
            Log::error('Message: ' . $exception->getMessage() . 'Line: ' . $exception->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'delete fail'
            ], 500);
        }
    }
}
