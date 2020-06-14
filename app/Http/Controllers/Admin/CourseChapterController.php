<?php

namespace App\Http\Controllers\Admin;

use App\Course;
use App\CourseChapter;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCourseChapterRequest;
use App\Http\Requests\StoreCourseChapterRequest;
use App\Http\Requests\UpdateCourseChapterRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class CourseChapterController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('course_chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = CourseChapter::with(['course'])->select(sprintf('%s.*', (new CourseChapter)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'course_chapter_show';
                $editGate      = 'course_chapter_edit';
                $deleteGate    = 'course_chapter_delete';
                $crudRoutePart = 'course-chapters';

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
            $table->editColumn('status', function ($row) {
                return $row->status ? CourseChapter::STATUS_SELECT[$row->status] : '';
            });
            $table->addColumn('course_name', function ($row) {
                return $row->course ? $row->course->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'course']);

            return $table->make(true);
        }

        return view('admin.courseChapters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('course_chapter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.courseChapters.create', compact('courses'));
    }

    public function store(StoreCourseChapterRequest $request)
    {
        $courseChapter = CourseChapter::create($request->all());

        return redirect()->route('admin.course-chapters.index');
    }

    public function edit(CourseChapter $courseChapter)
    {
        abort_if(Gate::denies('course_chapter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $courseChapter->load('course');

        return view('admin.courseChapters.edit', compact('courses', 'courseChapter'));
    }

    public function update(UpdateCourseChapterRequest $request, CourseChapter $courseChapter)
    {
        $courseChapter->update($request->all());

        return redirect()->route('admin.course-chapters.index');
    }

    public function show(CourseChapter $courseChapter)
    {
        abort_if(Gate::denies('course_chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseChapter->load('course');

        return view('admin.courseChapters.show', compact('courseChapter'));
    }

    public function destroy(CourseChapter $courseChapter)
    {
        abort_if(Gate::denies('course_chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courseChapter->delete();

        return back();
    }

    public function massDestroy(MassDestroyCourseChapterRequest $request)
    {
        CourseChapter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
