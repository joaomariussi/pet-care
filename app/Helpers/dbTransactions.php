<?php

use App\Models\Shop\Shop;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

/**
 * @return void
 */
function beginTransaction(): void
{
     DB::connection('admin')->beginTransaction();
}

/**
 * @return void
 */
function commit(): void
{
    DB::connection('admin')->commit();
}

/**
 * @return void
 */
function rollBack(): void
{
    DB::connection('admin')->rollBack();
}

/**
 * @return void
 */
function beginShopTransaction(): void
{
    DB::connection('shop')->beginTransaction();
}

/**
 * @return void
 */
function commitShopTransaction(): void
{
    DB::connection('shop')->commit();
    session()->forget('s3_file_url');
}

/**
 * @return void
 */
function rollBackShopTransaction(): void
{
    DB::connection('shop')->rollBack();
}

/**
 * Seta os dados de conexão do shop específico recebidos da atual sessão no arquivo de configuração de conexão
 * @param $configs
 * @return bool
 */
function setShopDatabaseConfig($configs): bool
{
    try {
        $shopDatabase = json_decode($configs);
        $shopConection = config("database.connections.shop");
        $shopConection['host'] = $shopDatabase->host;
        $shopConection['database'] = $shopDatabase->database;
        $shopConection['username'] = $shopDatabase->user;
        $shopConection['password'] = $shopDatabase->password;
        config(["database.connections.shop" => $shopConection]);
        return true;
    } catch (Throwable $e) {
        applicationError($e);
        return false;
    }
}

/**
 * @info Configurações s3 da loja
 * @param $shop
 * @return void
 * @throws Exception
 */
function setShopStorage($shop): void
{
    try {
        //Storage
        $storage = $shop['storage_id'];
        //Disk
        $disk = $shop['storage_type'];
        //Se null tenta buscar no banco
        if (!$storage) {
            $shopData = Shop::find($shop['id']);
            $storage = $shopData['storage_id'];
            $disk = $shopData['storage_type'];
        }
        //Configuração sistema de arquivos padrão laravel
        $filesystems = Config::get("filesystems.disks.$disk");
        $filesystems['bucket'] = $storage;
        Config::set("filesystems.disks.$disk",$filesystems);
    } catch (Throwable $t) {
        throw new Exception($t->getMessage());
    }
}
