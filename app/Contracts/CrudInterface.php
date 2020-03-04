<?php

namespace App\Contracts;

interface CrudInterface
{
    /**
     * Tüm verileri çek
     * @all
     */
    public function all();

    /**
     * Verilen diziyi kaydet
     * @param array $array
     */
    public function store(array $array);

    /**
     * Belli bir içeriği göster
     * @show
     * @param int id
     */
    public function showById(int $id);

    /**
     * İçeriği güncelle
     * @update
     * @param int id
     * @param array $array
     */
    public function update(array $array, int $id);

    /**
     * İçeriği sil
     * @delete
     * @param int id
     */
    public function delete(int $id);

    /**
     * 
     * 
     */
    public static function getModel();
}