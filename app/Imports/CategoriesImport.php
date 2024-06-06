<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoriesImport implements ToModel, WithHeadingRow, WithBatchInserts, WithChunkReading
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'name'=> $row['name'],
            'slug'=> $row['slug'],
            'shortdescription'=> $row['shortdescription'],
            'longdescription'=> $row['longdescription'],
            'order'=> $row['order'],
            'state'=> $row['state'],
            'image'=> $row['image'],
            'title'=> $row['title'],
            'description'=> $row['description'],
            'keywords'=> $row['keywords'],
        ]);
    }

    public function batchSize(): int
    {
        return 2;
    }

    public function chunkSize(): int
    {
        return 2;
    }

}
