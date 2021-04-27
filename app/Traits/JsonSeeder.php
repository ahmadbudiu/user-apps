<?php

namespace App\Traits;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;

trait JsonSeeder
{
    public $jsonData;
    private $path = '';

    public function runSeeder()
    {
        $this->jsonData = $this->getJson();
        $this->seed();
    }

    public function getJson(): Collection
    {
        $json = File::get(database_path($this->path));
        $data = json_decode($json);
        return collect($data);
    }

    public function objectToArray($param): array
    {
        return (array) json_decode(json_encode($param), JSON_OBJECT_AS_ARRAY);
    }

    public function seed()
    {
        //
    }
}
