<?php

namespace App\Admin\Controllers;

use App\Order;
use App\Status;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;

class OrdersController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';
    private $statusModel = Status::class;

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());
//        $grid->model()->select([DB::raw("sum(price*quantity) as total"), 'order_key', 'user_id', 'phone', 'city_id', 'status_id', 'district_id', 'date_delivery', 'comment', 'quantity', 'created_at', 'updated_at']);
        $grid->column('id', __('Id'));
//        $grid->column('order_key', __('Order key'));
//        $grid->column('user.name', 'User');
//        $grid->column('phone', __('Phone'));
        $grid->column('city.name', 'City');
        $grid->column('district.name', 'District');
        $grid->column('products', 'Total,₴')->display(function ($datas) {
//            dd($this);
            $total = 0;
            foreach ($datas as $data) {
                $total += $data['pivot']['quantity'] * $data['pivot']['price'];
            }

            if ($total < 500)
                $total += 99;

            if(isset($this->want_time) && $this->want_time != null )
                $total += 99;

            if(isset($this->postcard) && $this->postcard != null )
                $total += 10;

            return $total;
        });
        $grid->column('date_delivery', __('Date delivery'))->display(function ($date_delivery) {
            return \Carbon\Carbon::parse($date_delivery)->format('Y-m-d');
        });
        $grid->column('period.name', 'Period delivery');
        $grid->column('time_delivery', __('Time delivery'))->display(function ($time_delivery) {
            return \Carbon\Carbon::parse($time_delivery)->format('H:i');
        });
        $grid->column('comment', __('Comment'));
        $grid->column('status', 'Status')->display(function ($status) {
            return "<span class='label label-{$status['style']}'>{$status['name']}</span>";
        });
        $grid->column('created_at', __('Created at'))->display(function ($created_at) {
            return \Carbon\Carbon::parse($created_at)->format('Y-m-d H:m:s');
        });
        $grid->column('updated_at', __('Updated at'))->display(function ($updated_at) {
            return \Carbon\Carbon::parse($updated_at)->format('Y-m-d H:m:s');
        });
        $grid->actions(function ($actions) {
            $actions->disableDelete();

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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('order_key', __('Order key'));
        $show->field('user.name', 'User');
        $show->field('phone', __('Phone'));
        $show->products('Products', function ($products) {

            $products->resource('/admin/auth/products');

            $products->id();
            $products->name();
            $products->quantity();
            $products->price();
            $products->actions(function ($actions) {
                $actions->disableDelete();

            });
        });

        $show->field('city.name', 'City');
        $show->field('district.name', 'District');
        $show->field('date_delivery', __('Date delivery'))->display(function ($date_delivery) {
            return \Carbon\Carbon::parse($date_delivery)->format('Y-m-d');
        });
        $show->field('period.name', 'Period delivery');
        $show->field('time_delivery', __('Time delivery'))->display(function ($time_delivery) {
            return \Carbon\Carbon::parse($time_delivery)->format('H:m');
        });
        $show->field('postcard_text', __('Postcard text'));
        $show->field('comment', __('Comment'));
        $show->field('status.name', 'Status')->label();
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
        $form = new Form(new Order());

        $form->text('order_key', __('Order key'));
        $form->text('user.name');
        $form->mobile('phone', __('Phone'));
//        $form->text('products');
        $form->text('city.name');
        $form->text('district.name');
        $form->text('adress');
//        $form->text('quantity', __('Quantity'));
//        $form->text('price', __('Price'));
        $form->datetime('date_delivery', __('Date delivery'))->default(date('Y-m-d'));
        $form->text('period.name');
        $form->datetime('time_delivery', __('Time delivery'))->default(date('H:i'));
        $form->text('comment', __('Comment'));
        $form->select('status_id', 'Status')->options((new $this->statusModel())->all()->pluck('name', 'id'));
        return $form;
    }
}
