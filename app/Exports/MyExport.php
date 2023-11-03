<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class MyExport implements FromArray
{

    private $myData;

    public function __construct(array $data)  {
        $this->myData = $data;
    }

    public function array() : array  {
        return $this->myData;
    }

}
