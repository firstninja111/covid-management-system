<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
// use App\User;
use App\Test;
use App\Template;
use App\Role;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use URL;
use UxWeb\SweetAlert\SweetAlert;
use PragmaRX\Countries\Package\Countries;

class TestController extends Controller
{
    protected $test;

    public function __construct(Test $test, Template $template)
    {
        $this->test = $test;
        $this->template = $template;
    }

    /**
     * View all users
     * @return Model User model
     */
    public function index()
    {
        $tests = $this->fetchTests(15, request()->input('search'));

        return view("tests.index", ['tests'=>$tests]);
    }

    /**
     * Create user form
     * @return string
     */
    public function create()
    {
        $templates = $this->template->query()->get();

        return view("tests.create", [
            'templates' => $templates,
            ]);
    }

    /**
     * Save user details
     * @param  Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $this->validate($request, [
                'test_view' => 'required|max:255|unique:tests',
                'test_type' => 'required|max:255',
                'sample_type' => 'required|max:255',
                'description' => 'required|string|nullable',
                'features' => 'string|nullable',
                'price' => 'numeric',
            ]);

        $test = $this->test->create([
                'test_type' => $request->test_type,
                'test_view' => $request->test_view,
                'sample_type' => $request->sample_type,
                'template_id' => $request->template_id,
                // 'result_type' => $request->result_type,
                'description' => $request->description,
                'features' => $request->features,
                'price' => $request->price,
                'test_color' => $request->test_color,
                'test_backgroundcolor' => $request->test_backgroundcolor,
            ]);

        if ($test) {
            return redirect()->route('test.index')->with('success', 'Test Type Created Successfully');
        } else {
            return redirect()->back()->with('error', 'An error occured check form!');
        }
    }

    /**
     * Show Test Type
     * @param  string $id User id
     * @return string
     */
    public function show($id)
    {
        $test = $this->test->find($id);
        
        return view('tests.edit', [
              'test' => $test,
              'mode' => 'view',
            ]);
    }

    /**
     * Edit user
     * @param  string $id User id
     * @return string
     */
    public function edit($id)
    {
        $test = $this->test->find($id);
        $templates = $this->template->query()->get();
        
        return view('tests.edit', [
              'test' => $test,
              'templates' => $templates,
              'mode' => 'edit',
            ]);
    }

    /**
     * Update user's details
     * @param  Request $request
     * @param  string  $id      User id
     * @return string
     */
    public function update(Request $request, $id)
    {
        $test = $this->test->find($id);
        $this->validate($request, [
            'test_view' => 'required|max:255',
            'test_type' => 'required|max:255',
            'sample_type' => 'required|max:255',
            'description' => 'required|string|nullable',
            'features' => 'string|nullable',
            'price' => 'numeric',
        ]);
        // var_dump($request->template_id);
        // exit(0);

        // Logging activity for created role
        $test->test_view = $request->test_view;
        $test->test_type = $request->test_type;
        $test->sample_type = $request->sample_type;
        $test->template_id = $request->template_id;
        // $test->result_type = $request->result_type;
        $test->description= $request->description;
        $test->features= $request->features;
        $test->test_color = $request->test_color;
        $test->test_backgroundcolor = $request->test_backgroundcolor;
        
        $test->price= $request->price;
        $test->save();

        // Re-assigining role
        // $this->reassignRole($id, $request->role);

        return redirect()->route('test.index')->with('success', 'Test Type Updated Successfully');
    }

    /**
     * Delete user
     * @param  string $id user id
     * @return string     [description]
     */
    public function destroy($id)
    {
        $test = $this->test->find($id);

        $test->delete_flag= 1;
        $test->save();

        return redirect()->back()->with('success', 'Test Type Deleted Successfully');
    }

    private function fetchTests($pagination, $search = null)
    {
        $query = $this->test->query();

        if ($search) {
            $query->where(function ($value) use ($search) {
                $value->where('test_type', 'like', "%{$search}%");
                $value->where('sample_type', 'like', "%{$search}%");
            });
        }

        $query_output = $query->where('delete_flag', 0)->orderBy('id', 'asc')->paginate($pagination);

        if ($search) {
            $query_output->appends(['search' => $search]);
        }

        return $query_output;
    }
    
}
