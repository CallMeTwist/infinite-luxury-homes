<?php

namespace App\Http\Controllers;

use App\Models\Estate;
use App\Models\FAQ;
use App\Models\Inspection;
use App\Models\Project;
use App\Models\Testimonial;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * @return Factory|\Illuminate\View\View
     */
    public function index()
    {
        $faqs = FAQ::all();
        $projects = Project::take(4)->get();
        $testimonials = Testimonial::all();
        return view('index')->with([
            'faqs' => $faqs,
            'projects' => $projects,
            'testimonials' => $testimonials
        ]);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function about()
    {
        return view('about');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function services()
    {
        return view('services');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return view('contact');
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function projects()
    {
        $projects = Project::all();
        return view('projects')->with('projects', $projects);
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function faqs()
    {
        $faqs = Faq::all();
        $half = ceil($faqs->count() / 2);

        return view('faqs', compact('faqs', 'half'));
    }

    /**
     * @return Factory|\Illuminate\View\View
     */
    public function testimonials()
    {
        return view('testimonials');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function contact_send(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string',
            'lastname' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);

        $message = "$request->message\n\n".title_case($request->firstname .' '. $request->last_name)."\n$request->subject\n".strtolower($request->phone);

        // send email
        mail(config('app.email'), $request->email, $message);

        session()->flash('success', 'Message has been sent successfully.');
        return redirect()->back();
    }

    /**
     * @return Application|Factory|View
     */
    public function realtors()
    {
        return view('realtors');
    }

    /**
     * @return Application|Factory|View
     */
    public function inspections()
    {
        return view('inspection')->with([
            'locations' => Estate::all()
        ]);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function book_inspection(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'attendance_date' => 'required|date|after:today',
            'referrer' => 'required|string',
            'comments' => 'required|string',
            'location.*' => 'required|string',
        ]);

        try{
            $estates = [];
            foreach($request->location as $location){
                $data = Estate::find($location);
                if($data){
                    array_push($estates, $data->id);
                }
            }

            Inspection::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address,
                'attendance_date' => $request->attendance_date,
                'referrer' => $request->referrer,
                'comments' => $request->comments,
                'locations' => implode(', ', $estates)
            ]);
        }
        catch(Exception $exception){
            abort(404, $exception->getMessage());
        }

        session()->flash('success', 'Inspection has been booked successfully, please wait for our call and confirmation within 24 hours');
        return redirect()->back();
    }
}
