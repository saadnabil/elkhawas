<?php

namespace App\Livewire;

use App\Models\Item;
use Livewire\Component;

class Search extends Component
{
    public $searchTerm;
    public $items;
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        $this->items =  Item::where(function($q) use ($searchTerm) {
            $q->whereRaw('json_unquote(json_extract(title, "$.ar")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])
            ->orWhereRaw('json_unquote(json_extract(title, "$.en")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])
            ->orWhereRaw('json_unquote(json_extract(title, "$.de")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])

            ->orWhereRaw('json_unquote(json_extract(item_name, "$.ar")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])
            ->orWhereRaw('json_unquote(json_extract(item_name, "$.en")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])
            ->orWhereRaw('json_unquote(json_extract(item_name, "$.de")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])

            ->orWhereRaw('json_unquote(json_extract(unit, "$.ar")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])
            ->orWhereRaw('json_unquote(json_extract(unit, "$.en")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])
            ->orWhereRaw('json_unquote(json_extract(unit, "$.de")) COLLATE utf8mb4_unicode_ci like ?', [$searchTerm])

            ->orWhere('units_number', 'like' , $searchTerm)
            ->orWhere('unit_price', 'like' , $searchTerm)
            ->orWhere('total_price', 'like' , $searchTerm);
        })->get();
        return view('livewire.search');
    }
}
