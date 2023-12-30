<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category as CategoryModel;

class Category extends Component
{
    public $categories, $category = "", $id;
    public $updateCategory = false;

    public bool $showToast = false;


    protected $listeners = [
        'deleteCategory' => 'destroy'
    ];
    protected $rules = [
        'category' => 'required',
    ];

    public function render()
    {
        $this->categories = CategoryModel::select('id', 'category')->get();

        return view('livewire.pages.category.category');
    }

    public function store()
    {
        $this->validate();

        try {
            CategoryModel::create([
                'category' => $this->category
            ]);

            session()->flash('success', 'Category Created Successfully!!');

            $this->resetFields();
        } catch (\Exception $e) {
            session()->flash('error', 'Category Error to Create!!');
            // Reset Form Fields After Creating Category
            $this->resetFields();
        } finally {
            $this->showToast = true;
        }
    }

    public function edit($id)
    {
        $category = CategoryModel::findOrFail($id);
        $this->category = $category->category;
        $this->id = $category->id;
        $this->updateCategory = true;
    }
    public function resetFields()
    {
        $this->category = "";
    }
    public function cancel()
    {
        $this->updateCategory = false;
        $this->resetFields();
    }

    public function closeToast()
    {
        $this->showToast = false;
    }

    public function update()
    {
        $this->validate();

        try {
            CategoryModel::find($this->id)->update([
                "category" => $this->category
            ]);

            session()->flash('success', 'Category Updated Successfully!!');
        } catch (\Exception $e) {
            session()->flash("error", "Category Error to Update");
        } finally {
            $this->showToast = true;
            $this->cancel();
        }
    }

    public function destroy($id)
    {
        try {
            CategoryModel::find($id)->delete();
            //session()->flash('success',"Category Deleted Successfully!!");
            session()->flash('success', 'Category Deleted Successfully!!');
        } catch (\Exception $e) {
            //session()->flash('error',"Something goes wrong while deleting category!!");
            session()->flash('error', 'Category Error to Delete!!');
        } finally {
            $this->showToast = true;
        }
    }
}
