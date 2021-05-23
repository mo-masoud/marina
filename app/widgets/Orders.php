<?php

namespace App\Widgets;

use App\Models\Order;
use TCG\Voyager\Widgets\BaseDimmer;

class Orders extends BaseDimmer {
	/**
	 * The configuration array.
	 *
	 * @var array
	 */
	protected $config = [];

	/**
	 * Treat this method as a controller action.
	 * Return view() or other content to display.
	 */
	public function run() {

	   // dd('kk0');
               $query=Order::where('provided_by_marina',1);
        /* if (auth()->user()->hasRole('singer')) {
           //$count = Order::where('singer_id', auth()->user()->id)->count();
           $count=$query->where('singer_id', auth()->user()->id)->count();
       } elseif (auth()->user()->hasRole('moderator')) {
                           $panned_orders = $query->where([['closed',0],['canceled',0]])->orwhere([['closed',null],['canceled',null]])->get()->pluck('id');

           $count = $query->whereIn('id',$panned_orders)->where('singer_id', auth()->user()->singer_id)->count();
       } else {
          */

		                //    $panned_orders = $query->where([['closed',0],['canceled',0]])->orwhere([['closed',null],['canceled',null]])->get()->pluck('id');




		                   // dd($panned_orders );

		                 //   $count = $query->whereIn('id',$panned_orders)->count();

        $count=Order::where('provided_by_marina',1)->count();
            //echo dd($count);
		//}


		$string = trans('admin.orders');

		return view('voyager::dimmer', array_merge($this->config, [
			'icon'   => 'voyager-bag',
			'title'  => "{$count} {$string}",
			'text'   => __('admin.order_text', ['count' => $count, 'string' => $string]),
			'button' => [
				'text' => trans('admin.view_all_orders'),
				'link' => route('voyager.orders.index'),
			],
			'image'  => 'images/widget-bk.png',
		]));
	}

	/**
	 * Determine if the widget should be displayed.
	 *
	 * @return bool
	 */
	public function shouldBeDisplayed() {
		return app('VoyagerAuth')->user()->can('browse', new order());
	}
}
