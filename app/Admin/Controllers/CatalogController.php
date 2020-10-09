<?php

namespace App\Admin\Controllers;

use App\Catalog;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class CatalogController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Catalog';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Catalog());

        $grid->column('id', __('Id'));
        $grid->column('position', __('Position'))->sortable()->label();
        $grid->column('image')->image();
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('description', __('Description'))->limit(100);
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(Catalog::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('position', __('Position'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('image')->image();
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Catalog());
        $form->text('name', __('Name'));
        $form->text('position', __('Position'))
            ->creationRules(['required', "unique:catalogs"])
            ->updateRules(['required', "unique:catalogs,position,{{id}}"]);
        $form->text('slug', __('Slug'));
        $form->text('description', __('Description'));
        $form->image('image', 'Pictures');

        return $form;
    }

    public function add(Request $request)
    {
        $catalog = new Catalog($request->except(['image']));
        if (isset($request->slug)) {
            $catalog->slug = str_slug($request->slug);
        } else {
            $catalog->slug = str_slug($request->name);
        }

        $catalog->save();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $catalog->addMediaFromRequest('image')->toMediaCollection('catalog');
        }
        return redirect('admin/auth/catalog');
    }
}
