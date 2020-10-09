<?php
namespace App\Widgets;

use App\Catalog;
use App\Widgets\Contract\ContractWidget;

class CatalogWidget implements ContractWidget
{
    public function execute(){
        $catalog = Catalog::all();
        return view('Widgets::catalog', [
            'catalog' => $catalog
        ]);
    }
}
