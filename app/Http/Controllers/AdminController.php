<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Constraint;
use Intervention\Image\Facades\Image;
use TCG\Voyager\Facades\Voyager;
use App\User;
use App\Order;
use App\OrderDetail;
use App\Charts\AnalysisChart;

class AdminController extends \TCG\Voyager\Http\Controllers\Controller
{
    public function index()
    {
        // User chart
        $user_chart = new AnalysisChart;
        $this_month_users = User::wheremonth('created_at', today()->month)->count();
        $last_month_users = User::wheremonth('created_at', today()->subMonth()->month)->count();
        $two_months_ago_users = User::wheremonth('created_at', today()->subMonth()->subMonth()->month)->count();
        
        $two_months_ago = $user_chart->dataset('2 months ago', 'bar', [$two_months_ago_users]);
        $last_month = $user_chart->dataset('Last month', 'bar', [$last_month_users]);
        $this_month = $user_chart->dataset('This month', 'bar', [$this_month_users]);
        $two_months_ago->backgroundColor('#D0D102');
        $last_month->backgroundColor('#61AE24');
        $this_month->backgroundColor('#00A1CB');

        // Product chart
        $product_chart = new AnalysisChart;
        $this_month_products = OrderDetail::wheremonth('created_at', today()->month)->sum('quantity');
        $last_month_products = OrderDetail::wheremonth('created_at', today()->subMonth()->month)->sum('quantity');
        $two_months_ago_products = OrderDetail::wheremonth('created_at', today()->subMonth()->subMonth()->month)->sum('quantity');
        
        $product_2 = $product_chart->dataset('2 months ago', 'bar', [$two_months_ago_products]);
        $product_1 = $product_chart->dataset('Last month', 'bar', [$last_month_products]);
        $product_0 = $product_chart->dataset('This month', 'bar', [$this_month_products]);
        $product_2->backgroundColor('#D0D102');
        $product_1->backgroundColor('#61AE24');
        $product_0->backgroundColor('#00A1CB');

        //Revenue chart
        $revenue_chart = new AnalysisChart;
        $this_month_revenue = Order::wheremonth('created_at', today()->month)->sum('total');
        $last_month_revenue = Order::wheremonth('created_at', today()->subMonth()->month)->sum('total');
        $two_months_ago_revenue = Order::wheremonth('created_at', today()->subMonth()->subMonth()->month - 2)->sum('total');
        
        $revenue = $revenue_chart->dataset('Revenue', 'line', [$two_months_ago_revenue, $last_month_revenue, $this_month_revenue]);
        $revenue->color('#00A1CB');
        $revenue->fill(false);
        $revenue_chart->labels(['2 month ago', 'Last month', 'This month']);
        $revenue->lineTension(0);
        $revenue_chart->options([
            'scales' => [
                'xAxes' => [
                  'scaleLabel' => [
                    'display' => true,
                    'labelString' => 'probability'
                  ]
                ]
            ] 
        ]);

        return Voyager::view('voyager::index', compact('user_chart', 'product_chart', 'revenue_chart'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

    public function upload(Request $request)
    {
        $fullFilename = null;
        $resizeWidth = 1800;
        $resizeHeight = null;
        $slug = $request->input('type_slug');
        $file = $request->file('image');

        $path = $slug.'/'.date('F').date('Y').'/';

        $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension());
        $filename_counter = 1;

        // Make sure the filename does not exist, if it does make sure to add a number to the end 1, 2, 3, etc...
        while (Storage::disk(config('voyager.storage.disk'))->exists($path.$filename.'.'.$file->getClientOriginalExtension())) {
            $filename = basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).(string) ($filename_counter++);
        }

        $fullPath = $path.$filename.'.'.$file->getClientOriginalExtension();

        $ext = $file->guessClientExtension();

        if (in_array($ext, ['jpeg', 'jpg', 'png', 'gif'])) {
            $image = Image::make($file)
                ->resize($resizeWidth, $resizeHeight, function (Constraint $constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })
                ->encode($file->getClientOriginalExtension(), 75);

            // move uploaded file from temp to uploads directory
            if (Storage::disk(config('voyager.storage.disk'))->put($fullPath, (string) $image, 'public')) {
                $status = __('voyager::media.success_uploading');
                $fullFilename = $fullPath;
            } else {
                $status = __('voyager::media.error_uploading');
            }
        } else {
            $status = __('voyager::media.uploading_wrong_type');
        }

        // echo out script that TinyMCE can handle and update the image in the editor
        return "<script> parent.helpers.setImageValue('".Voyager::image($fullFilename)."'); </script>";
    }

    public function profile()
    {
        return Voyager::view('voyager::profile');
    }
}
