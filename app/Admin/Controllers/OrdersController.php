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
        $grid->model()->orderBy('id', 'desc');
        $grid->column('id', __('Id'));
        $grid->column('city.name', 'City');
        $grid->column('district.name', 'District');
        $grid->column('products', 'Total,₴')->display(function ($datas) {
            $total = 0;
            foreach ($datas as $data) {
                $total += $data['pivot']['quantity'] * $data['pivot']['price'];
            }

            if ($total < 500)
                $total += \App\Setting::findOrFail(7)->value;

            if (isset($this->want_call) && $this->want_time != null)
                $total += (integer)$this->want_call;

            if (isset($this->want_time) && $this->want_time != null)
                $total += (integer)$this->want_time;

            if (isset($this->want_postcard) && $this->want_postcard != null && $this->want_postcard != 'card')
                $total += (integer)$this->want_postcard;

            if (isset($this->want_foto) && $this->want_foto != null)
                $total += (integer)$this->want_foto;

            if ($this->period_id == 1 || $this->period_id == 8)
                $total += \App\Setting::findOrFail(6)->value;

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
//        $show->field('order_key', __('Order key'));
        $show->field('user.name', 'User');
        $show->field('phone', __('Phone'));
        $show->field('recipient_name', __('Recipient name'));
        $show->field('recipient_phone', __('Recipient phone'));
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
        $show->field('period.name', 'Period delivery')->unescape()->as(function ($period) {
            if ($period == null)
                return "<span class='label label-danger'>указано точное время</span>";
            return $period;
        });
        $show->field('time_delivery', __('Time delivery'))->display(function ($time_delivery) {
            return \Carbon\Carbon::parse($time_delivery)->format('H:m');
        });
        $show->field('want_postcard', __('Postcard or Card'))->unescape()->as(function ($want_postcard) {
            if ($want_postcard == 'card')
                return "<span class='label label-info'>Обычная карточка </span>";
            return "<span class='label label-danger'>Брендированная карточка</span>";
        });
        $show->field('postcard_text', __('Postcard text'));
        $show->field('want_call', __('Call'))->unescape()->as(function ($want_call) {
            if ($want_call == null)
                return "<span class='label label-danger'>без предварительного звонка </span>";
            return "<span class='label label-info'>предварительно перезвонить получателю</span>";
        });
        $show->field('want_foto', __('Foto'))->unescape()->as(function ($want_foto) {
            if ($want_foto == null)
                return "<span class='label label-info'>без фото </span>";
            return "<span class='label label-danger'>с фото</span>";
        });
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

        $form->text('id', __('ID'));
        $form->text('user.name');
        $form->mobile('phone', __('Phone'));
        $form->text('city.name');
        $form->text('district.name');
        $form->text('adress');
        $form->datetime('date_delivery', __('Date delivery'))->default(date('Y-m-d'));
        $form->text('period.name');
        $form->datetime('time_delivery', __('Time delivery'))->default(date('H:i'));
        $form->text('comment', __('Comment'));
        $form->select('status_id', 'Status')->options((new $this->statusModel())->all()->pluck('name', 'id'));
        return $form;
    }
}
