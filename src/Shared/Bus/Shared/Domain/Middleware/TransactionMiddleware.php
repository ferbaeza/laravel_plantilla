<?php

namespace Src\Shared\Bus\Shared\Domain\Middleware;

use Illuminate\Support\Facades\DB;
use Src\Shared\Bus\Shared\Domain\Interfaces\MiddlewareInterface;

class TransactionMiddleware implements MiddlewareInterface
{
    public function process($command, $handler)
    {
        try {
            DB::beginTransaction();
            $result = $handler->handle($command);
            DB::commit();
            return $result;
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        } catch (\Error $er) {
            DB::rollBack();
            throw $er;
        }
    }
}
