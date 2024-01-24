<?php

namespace App\Http\Controllers\Backend;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Yajra\DataTables\Facades\Datatables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Gate::authorize('app.roles.index');
        $breadcrumb = ['Dashboard'=>route('app.dashboard'),'Role'=>''];
        setThisPageTitle('Roles');
        return view('backend.pages.roles.index',compact('breadcrumb'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * getData all resource from storage.
     */
    public function getData(Request $request)
    {
        if ($request->ajax()) {
            $getData = Role::with('permissions')->whereNotIn('slug',['client','super-admin'])->latest('id');
            return Datatables::of($getData)
                ->addIndexColumn()
                ->addColumn('action', function ($data) {
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->addColumn('permissions', function ($data) {
                    return $data->permissions ? $data->permissions->count() : '0';
                })
                ->addColumn('note', function ($data) {
                    return $data->note ? $data->note : '---';
                })
                ->addColumn('created_at', function ($data) {
                    return date_formats('d-m-Y',$data->created_at);
                })
                ->addColumn('sl', function ($data) {
                    return ;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
