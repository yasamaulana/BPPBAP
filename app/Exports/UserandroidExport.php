<?php

namespace App\Exports;

use App\Models\Userandroid;
use Maatwebsite\Excel\Concerns\FromCollection;

class UserandroidExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Userandroid::all();
    }
}
