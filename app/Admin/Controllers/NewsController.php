<?php

namespace App\Admin\Controllers;

use App\News;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Http\Request;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'News';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News());

        $grid->column('id', __('Id'));
        $grid->column('image')->image('',100,100);
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'));
        $grid->column('text', __('Text'));
        $grid->column('count_view', __('Count view'));
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
        $show = new Show(News::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('slug', __('Slug'));
        $show->field('text', __('Text'));
        $show->field('active', __('Active'));
        $show->field('count_view', __('Count view'));
        $show->field('image')->image('', 100, 100);
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
        $states = [
            'on'  => ['value' => 1, 'text' => 'Active', 'color' => 'success'],
            'off' => ['value' => 0, 'text' => 'Draft', 'color' => 'danger'],
        ];

        $form = new Form(new News());

        $form->text('name', __('Name'));
        $form->text('slug', __('Slug'));
        $form->text('text', __('Text'));
        $form->switch('active', 'Active')->states($states);
        $form->text('count_view', __('Count view'));
        $form->multipleImage('image', 'Pictures')->removable();

        return $form;
    }

    public function add(Request $request)
    {
        $news = new News($request->except(['image']));
        if (isset($request->slug)) {
            $news->slug = str_slug($request->slug);
        } else {
            $news->slug = str_slug($request->name);
        }
//        dd($request->file('image'));
        if ($news->save()) {
            if ($request->hasFile('image') && is_array($request->file('image'))) {
                foreach ($request->file('image') as $image) {
                    $news->addMedia($image)->toMediaCollection('news');
                }
            }
        }
        return redirect(route('admin.news'));
    }

}
