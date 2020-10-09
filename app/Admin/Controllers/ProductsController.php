<?php

namespace App\Admin\Controllers;

use App\Attribute;
use App\Group;
use App\Product;
use App\Catalog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Encore\Admin\Layout\Content;


class ProductsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    private $attributeModel = Attribute::class;
    private $groupModel = Group::class;
    private $catalogModel = Catalog::class;

    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('image')->image('', 100, 100);
//        $grid->image()->image('', 100, 100);
        $grid->catalog()->display(function ($catalog) {
            return "<span class='label label-success'>{$catalog['name']}</span>";
        })->sortable();
        $grid->column('name', __('Name'))->sortable();
        $grid->column('attributes')->display(function ($attributes) {
            $res = '';
            foreach ($attributes as $attribute) {
                $res .= "<span class='label' style='background-color: {$attribute['color_style']}'>{$attribute['name_ru']}</span> ";
//                $res .= "<span class='label label-success'>{$attribute['name_ru']}</span><br/> ";
            }
            return $res;
        })->sortable();

        $grid->column('slug', __('Slug'));
        $grid->column('old_price', __('Old price'));
        $grid->column('price', __('Price'))->sortable();
        $grid->column('description', __('Description'))->limit(100);
        $grid->column('quantity', __('Quantity'))->sortable();
        $grid->column('is_slider', __('is Slider'))->sortable();
        $grid->column('count_view', __('Count view'))->sortable();
        $grid->column('created_at', __('Created at'))->display(function ($created_at) {
            return \Carbon\Carbon::parse($created_at)->format('Y-m-d H:m:s');
        });
        $grid->column('updated_at', __('Updated at'))->display(function ($updated_at) {
            return \Carbon\Carbon::parse($updated_at)->format('Y-m-d H:m:s');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->catalog()->unescape()->as(function ($content) {
            return "<span class='label label-success'>{$content->name}</span>";
        });

        $show->field('attributes', 'Attributes')->unescape()->as(function ($attributes) {
            $result = '';
            foreach ($attributes as $attribute) {
                $result .= "<span class='label' style='background-color: " . $attribute->name_en . " !important;'>{$attribute->name_ru}</span> ";
            }
            return $result;
        });

//        $show->field('color', 'Color')->badge();

//        $show->attributes('Color', function ($attributes) {
//            $attributes->resource('/admin/attributes');
//
//            $attributes->name();
//
//            $attributes->filter(function ($filter) {
//                $filter->like('name');
//            });
//        });

        $show->field('old_price', __('Old price'));
        $show->field('price', __('Price'));
        $show->field('description', __('Description'));
        $show->field('quantity', __('Quantity'));
        $show->field('is_slider', __('is Slider'));
        $show->field('count_view', __('Count view'));
        $show->field('image')->image('', 100, 100);
        $show->field('created_at', __('Created at'))->display(function ($created_at) {
            return \Carbon\Carbon::parse($created_at)->format('Y-m-d H:m:s');
        });
        $show->field('updated_at', __('Updated at'))->display(function ($updated_at) {
            return \Carbon\Carbon::parse($updated_at)->format('Y-m-d H:m:s');
        });

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $states = [
            'on' => ['value' => 'on', 'text' => 'Slider', 'color' => 'success'],
            'off' => ['value' => null, 'text' => 'Not Slider', 'color' => 'danger'],
        ];

        $form = new Form(new Product());
        $form->select('catalog_id', 'Catalog')->options((new $this->catalogModel())::all()->pluck('name', 'id'));
        $form->multipleSelect('attributes', 'Цвет')->options((new $this->groupModel())::find(1)->attributes->pluck('name_ru', 'id'));
        $form->multipleSelect('attributes', 'Кому/событие')->options((new $this->groupModel())::find(2)->attributes->pluck('name_ru', 'id'));
        $form->multipleSelect('attributes', 'Цветок в букете')->options((new $this->groupModel())::find(3)->attributes->pluck('name_ru', 'id'));
        $form->multipleSelect('attributes', 'Размер букета')->options((new $this->groupModel())::find(4)->attributes->pluck('name_ru', 'id'));
        $form->multipleSelect('attributes', 'Допы к букетам')->options((new $this->groupModel())::find(5)->attributes->pluck('name_ru', 'id'));
        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));
        $form->text('old_price', __('Old price'));
        $form->text('price', __('Price'));
        $form->text('description', __('Description'));
        $form->text('quantity', __('Quantity'));
        $form->switch('is_slider', 'is Slider')->states($states);
//        $form->text('is_slider', __('is Slider'));
        $form->text('count_view', __('Count view'));
//        $form->multipleImage('image', 'Pictures')->removable();
        // Single media
//        $form->mediaLibrary('image', 'Image')
//            ->responsive()
//            ->removable();

        // Multiple media field
        $form->multipleMediaLibrary('products', 'Images')
            ->responsive()
            ->removable();

        return $form;
    }

    public function add(Request $request)
    {
        $product = new Product($request->except(['image']));
        if (isset($request->slug)) {
            $product->slug = str_slug($request->slug);
        } else {
            $product->slug = str_slug($request->name);
        }
//        dd($request->input());
        if ($product->save()) {
            foreach ($request->input('attributes') as $attribute) {
                if ($attribute) {
                    $this->setRelation('attribute_product', ['attribute_id' => $attribute, 'product_id' => $product->id]);
                }
            }
            if ($request->hasFile('image') && is_array($request->file('image'))) {
                foreach ($request->file('image') as $image) {
                    $product->addMedia($image)->toMediaCollection('products');
                }
            }
        }
        return redirect(route('admin.products'));
    }

    private function setRelation($table, $values)
    {
        DB::table($table)->insert($values);
    }

    public function update($id)
    {
        return parent::update($id);
    }
}
