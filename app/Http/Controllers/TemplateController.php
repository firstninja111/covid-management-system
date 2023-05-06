<?php

namespace App\Http\Controllers;

use Hash;
use Auth;
// use App\User;
use App\Template;
use App\Test;

use App\Role;
use Spatie\Activitylog\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use URL;
use UxWeb\SweetAlert\SweetAlert;
use PragmaRX\Countries\Package\Countries;
use PDF;

class TemplateController extends Controller
{
    protected $template;
    protected $test;


    public function __construct(Template $template, Test $test)
    {
        $this->template = $template;
        $this->test = $test;
    }

    /**
     * View all users
     * @return Model User model
     */
    public function index()
    {
        $templates = $this->fetchTemplates(15, request()->input('search'));

        return view("templates.index", ['templates'=>$templates]);
    }

    /**
     * Create user form
     * @return string
     */
    public function create()
    {
        return view("templates.create", [
            ]);
    }

    /**
     * Save user details
     * @param  Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $data = [
            'test_type' => 'Test Title Here',
            'test_id' => 378979234123697, // 15 digits code
            'reported_time' => date('m/d/Y, H:i'). ' ET',
            'collected_time' => date('m/d/Y, H:i'). ' ET',
            'firstname' => 'Djordjevic',
            'lastname' => 'Nemanja',
            'gender' => 'Male',
            'result' => 'Positive', 
            'birth_date' => date('m/d/Y'),
            'email' => 'cloudrider.m92@gmail.com',
            'sample_type' => 'Fingerstick',
            'description' => 'Description of test',
            'qrcode_url' => "assets/templates/skeleton.png",
            'pass_number' => 'SR2492',
            'rich_description' => $request->description,
            'qr_code_show' => $request->qr_code == "on" ? 1 : 0,
            'result_type' => $request->result_type,
        ];

        $templateData = [
            'name' => $request->name,
            'result_type' => $request->result_type,
            'positive_display' => $request->positive_display,
            'negative_display' => $request->negative_display,
            'inconclusive_display' => $request->inconclusive_display,
            'description' => $request->description,
            'qr_code' => $request->qr_code == "on" ? 1 : 0,
        ];

        $template = $this->template->find($request->templateId);
        
        if($template == NULL)
        {
            $template = $this->template->create($templateData);
            $template->preview_url = 'public/assets/templates/template_'. $template->id. '.pdf';
            $template->save();
        }
        else{
            $template->update($templateData);
            $template->preview_url = 'public/assets/templates/template_'. $template->id. '.pdf';
            $template->save();
        }

        // return view('pdf/skeleton_pdf', $data);

        // ================ Create PDF ============ //

        $pdf = PDF::loadView('pdf/skeleton_pdf', $data);
        $content = $pdf->download()->getOriginalContent();
        file_put_contents($template->preview_url, $pdf->output());
       
        return redirect()->route('pdf_template.index')->with('success', $request->name. ' Template Created Successfully!');

    }

    public function preview(Request $request)
    {
        $data = [
            'test_type' => 'Test Title Here',
            'test_id' => 378979234123697, // 15 digits code
            'reported_time' => date('m/d/Y, H:i'). ' ET',
            'collected_time' => date('m/d/Y, H:i'). ' ET',
            'firstname' => 'Djordjevic',
            'lastname' => 'Nemanja',
            'gender' => 'Male',
            'result' => 'Positive', 
            'birth_date' => date('m/d/Y'),
            'email' => 'cloudrider.m92@gmail.com',
            'sample_type' => 'This is sample type',
            'description' => 'Description of test',
            'qrcode_url' => "assets/templates/skeleton.png",
            'pass_number' => 'SR2492',
            'rich_description' => $request->description,
            'qr_code_show' => $request->qr_code,
            'result_type' => $request->result_type,
        ];

        $templateData = [
            'name' => $request->name,
            'result_type' => $request->result_type,
            'positive_display' => $request->positive_display,
            'negative_display' => $request->negative_display,
            'inconclusive_display' => $request->inconclusive_display,
            'description' => $request->description,
            'qr_code' => $request->qr_code,
        ];

        $template = $this->template->find($request->templateId);
        
        if($template == NULL)
        {
            $template = $this->template->create($templateData);
            $template->preview_url = 'public/assets/templates/template_'. $template->id. '.pdf';
            $template->save();
        }
        else {
            $template->preview_url = 'public/assets/templates/template_'. $template->id. '.pdf';
            $template->update($templateData);
        }

        // return view('pdf/skeleton_pdf', $data);
        // ================ Create PDF ============ //

        $pdf = PDF::loadView('pdf/skeleton_pdf', $data);
        $content = $pdf->download()->getOriginalContent();
        file_put_contents($template->preview_url, $pdf->output());
       
        $result = array(
            'id' => $template->id,
            // 'preview_url' => "https://docs.google.com/viewer?url=https://visionboardcontrol.com/public/results/report_.pdf&embedded=true",
            'preview_url' => "https://docs.google.com/viewer?url=". asset('public/assets/templates/template_'. $template->id. '.pdf&embedded=true'),
        );
        return json_encode($result);
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
        $template = $this->template->find($id);

        return view("templates.edit", [
            'template' => $template
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
        // $test = $this->test->find($id);
        // $this->validate($request, [
        //     'test_view' => 'required|max:255',
        //     'test_type' => 'required|max:255',
        //     'sample_type' => 'required|max:255',
        //     'description' => 'string|nullable',
        //     'features' => 'string|nullable',
        //     'price' => 'numeric',
        // ]);

        // // Logging activity for created role
        // $test->test_view = $request->test_view;
        // $test->test_type = $request->test_type;
        // $test->sample_type = $request->sample_type;
        // $test->report_layout = $request->report_layout;
        // // $test->result_type = $request->result_type;
        // $test->description= $request->description;
        // $test->features= $request->features;
        // $test->test_color = $request->test_color;
        
        // $test->price= $request->price;
        // $test->save();

        // // Re-assigining role
        // // $this->reassignRole($id, $request->role);

        // return redirect()->back()->with('success', 'Test Type Updated Successfully');
    }

    /**
     * Delete user
     * @param  string $id user id
     * @return string     [description]
     */
    public function destroy($id)
    {
        $testCnt = $this->test->query()->where('template_id', $id)->get()->count();
        if($testCnt != 0)
            return redirect()->back()->with('warning', 'Selected template is using by existing test type.');   

        
        $template = $this->template->find($id);
        $template->delete();

        return redirect()->back()->with('success', 'Template Deleted Successfully');
    }

    private function fetchTemplates($pagination, $search = null)
    {
        $query = $this->template->query();

        if ($search) {
            $query->where(function ($value) use ($search) {
                $value->where('result_type', 'like', "%{$search}%");
                $value->orWhere('name', 'like', "%{$search}%");
            });
        }

        $query_output = $query->orderBy('id', 'asc')->paginate($pagination);

        if ($search) {
            $query_output->appends(['search' => $search]);
        }

        return $query_output;
    }
    
}
