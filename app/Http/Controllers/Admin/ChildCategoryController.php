<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\ChildCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyChildCategoryRequest;
use App\Http\Requests\StoreChildCategoryRequest;
use App\Http\Requests\UpdateChildCategoryRequest;
use App\SubCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ChildCategoryController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('child_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = ChildCategory::with(['category', 'subcategory'])->select(sprintf('%s.*', (new ChildCategory)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'child_category_show';
                $editGate      = 'child_category_edit';
                $deleteGate    = 'child_category_delete';
                $crudRoutePart = 'child-categories';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : "";
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : "";
            });
            $table->editColumn('icon', function ($row) {
                return $row->icon ? $row->icon : "";
            });
            $table->editColumn('slug', function ($row) {
                return $row->slug ? $row->slug : "";
            });
            $table->editColumn('status', function ($row) {
                return $row->status ? ChildCategory::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('category_name', function ($row) {
                return $row->category ? $row->category->name : '';
            });

            $table->addColumn('subcategory_name', function ($row) {
                return $row->subcategory ? $row->subcategory->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'category', 'subcategory']);

            return $table->make(true);
        }

        return view('admin.childCategories.index');
    }

    public function create()
    {
        abort_if(Gate::denies('child_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = SubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.childCategories.create', compact('categories', 'subcategories'));
    }

    public function store(StoreChildCategoryRequest $request)
    {
        $childCategory = ChildCategory::create($request->all());

        return redirect()->route('admin.child-categories.index');
    }

    public function edit(ChildCategory $childCategory)
    {
        abort_if(Gate::denies('child_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $categories = Category::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $subcategories = SubCategory::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $childCategory->load('category', 'subcategory');

        return view('admin.childCategories.edit', compact('categories', 'subcategories', 'childCategory'));
    }

    public function update(UpdateChildCategoryRequest $request, ChildCategory $childCategory)
    {
        $childCategory->update($request->all());

        return redirect()->route('admin.child-categories.index');
    }

    public function show(ChildCategory $childCategory)
    {
        abort_if(Gate::denies('child_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $childCategory->load('category', 'subcategory', 'childCategoryCourses');

        return view('admin.childCategories.show', compact('childCategory'));
    }

    public function destroy(ChildCategory $childCategory)
    {
        abort_if(Gate::denies('child_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $childCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyChildCategoryRequest $request)
    {
        ChildCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
