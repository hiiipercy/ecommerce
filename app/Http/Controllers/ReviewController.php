<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Review;
use App\Traits\Base;
use App\Traits\UploadAble;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\ReviewRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ReviewController extends Controller
{
    use UploadAble, Base;

   
    public function store_or_update($request){
        $collection = collect($request->validated());
        $created_at = $updated_at = Carbon::now();
        $created_by = $updated_by = auth()->user()->name;
        $user_id = auth()->user()->id;
        $product_id = $request->product_id;
        $star = $request->star;

        
        // Check if the user has already reviewed this product
        $existingReview = Review::where('user_id', $user_id)
                                ->where('product_id', $product_id)
                                ->first();

        if ($existingReview) {
            return response()->json(['message' => 'You have already submitted a review for this product.'], 400);
        }
        $collection = $collection->merge(compact('created_by','created_at','user_id','product_id','star'));

        return Review::updateOrCreate($collection->all());
    }


    public function index(Request $request){

        if($request->ajax()){
            $getData = Review::orderBy('id','desc');
            return DataTables::eloquent($getData)
                ->addIndexColumn()
                ->filter(function ($query) use ($request) {
                    if (!empty($request->search)) {
                        $query->where('product_id', 'LIKE', "%$request->search%");
                    }
                })
                // ->addColumn('status', function($row){
                //     return change_status($row->id,$row->status,$row->name);
                // })
                ->addColumn('created_at', function($row){
                    return date('Y-m-d', strtotime($row->created_at));
                })
                ->addColumn('bulk_check', function($row){
                    return table_checkbox($row->id);
                })
                ->addColumn('action', function($row){
                    $action = '<div class="d-flex align-items-center justify-content-end">';
                    $action .= '<button type="button" class="btn-style btn-style-edit edit_data ml-1" data-id="' . $row->id . '"><i class="fa fa-edit"></i></button>';
                    $action .= '<button type="button" class="btn-style btn-style-danger delete_data ml-1" data-id="' . $row->id . '" data-name="' . $row->role_name . '"><i class="fa fa-trash"></i></button>';
                    
                    $action .= '</div>';

                    return $action;
                })
                ->rawColumns(['bulk_check','action'])
                ->make(true);
        }

        $this->setPageTitle('Cart','Cart List');
        $breadcrumb = ['Cart'=>''];
   
        return view('backend.cart.index', ['breadcrumb'=>$breadcrumb]);
    }

    public function updateOrStore(ReviewRequest $request){
        if ($request->ajax()) {
            $result = $this->store_or_update($request);
            // return $this->store_message($result);
            if($result){
                return $this->store_message($result);
            }else{
                return $this->response_json('error','Data Cannot Save',null,204);
            }
        }
    }


    public function edit(Request $request){
        if ($request->ajax()) {
            $data = Review::find($request->id);
            if($data->count()){
                return $this->response_json('success',null,$data,201);
            }else{
                return $this->response_json('error','No Data Found',null,204);
            }
        }

    }

    // public function statusChange(Request $request){
    //     if($request->ajax()){
    //         $data = Review::find($request->id);
    //         if($data){
    //             $data->update(['status'=>$request->status]);
    //             return $this->status_message($data);
    //         }
    //     }
    // }


    public function delete(Request $request){
        if ($request->ajax()) {
            $result = Review::find($request->id);
            if($result){
                $result->delete();
                return $this->delete_message($result);
            }else{
                return $this->response_json('error','Data Cannot Delete',null,204);
            }
            
        }else{
            return $this->response_json('error',null,null,401);
        }
    }


    public function bulkDelete(Request $request){
        if ($request->ajax()) {
            $result = Review::whereIn('id',$request->ids)->select('image')->get();
            if($result){
             Review::destroy($request->ids);
                return $this->bulk_delete_message($result);
            }else{
                return $this->response_json('error','Data Cannot Delete',null,204);
            }
        }else{
            return $this->response_json('error',null,null,401);
        }
    }



}
