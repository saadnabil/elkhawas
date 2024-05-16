<?php

namespace App\Exports;

use App\Models\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ExportItems implements FromCollection, WithHeadings,  WithMapping
{

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::with('type')->latest()->get();
    }


    public function map($item): array
    {

        $lang = app()->getLocale();
        return [
            $item->title[$lang],
            $item->type->title[$lang],
            $item->unit[$lang],
            $item->unit_price,
            $item->units_number,
            $item->total_price,
        ];
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
             __('translation.Item'),
             __('translation.Type'),
             __('translation.Unit'),
             __('translation.Unit Price'),
             __('translation.Pieces'),
             __('translation.Total Price'),
        ];
    }

}
