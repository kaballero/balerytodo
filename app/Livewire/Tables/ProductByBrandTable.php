<?php

namespace App\Livewire\Tables;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductByBrandTable extends Component
{
    use WithPagination;

    public $perPage = 50;

    public $search = '';

    public $sortField = 'name';

    public $sortAsc = true;

    public $brand = null;

    public function sortBy($field): void
    {
        if($this->sortField === $field)
        {
            $this->sortAsc = ! $this->sortAsc;

        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function mount($brand)
    {
        $this->brand = $brand;
    }

    public function render()
    {
        return view('livewire.tables.product-by-brand-table',[
            'products' => Product::where('brand_id', $this->brand->id)
                ->search($this->search)
                ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
                ->paginate($this->perPage)
        ]);
    }
}
