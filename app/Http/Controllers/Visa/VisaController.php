<?php

namespace App\Http\Controllers\Visa;

use App\Models\Visa;
use App\Models\RoomType;
use App\Models\VisaType;
use App\Traits\Uploader;
use Illuminate\Http\Request;
use App\Models\ResidencePreference;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StepOneRequest;
use App\Http\Requests\StepTwoRequest;
use App\Http\Requests\StepThreeRequest;
use App\Mail\Welcome;

class VisaController extends Controller
{
    use Uploader;

    public function index() {

        return view('visa.index');
    }

    public function start(Request $request) {

        $visaTypes = VisaType::all();

        $request->session()->forget('visa');

        return view('visa.create-step-one', compact('visaTypes'));
    }

    public function stepOne(StepOneRequest $request) {

        if(empty($request->session()->get('visa'))){
            $visa = new Visa();
            $visa->fill($request->validated());
            $request->session()->put('visa', $visa);
        }else{
            $visa = $request->session()->get('visa');
            $visa->fill($request->validated());
            $request->session()->put('visa', $visa);
        }
        $personalPhotoUrl = $this->uploadAttachment($request->file('personal_photo'), 1);
        $request->session()->put('personal_photo_url', $personalPhotoUrl);

        return redirect()->route('visa.create.step.two');
    }

    public function createStepTwo(Request $request)
    {
        $visa = $request->session()->get('visa');

        return view('visa.create-step-two',compact('visa'));
    }

    public function stepTwo(StepTwoRequest $request) {

        $visa = $request->session()->get('visa');
        $visa->fill($request->validated());
        $request->session()->put('visa', $visa);

        $passportPhotoUrl = $this->uploadAttachment($request->file('passport_photo'), 1);
        $request->session()->put('passport_photo_url', $passportPhotoUrl);

        return redirect()->route('visa.create.step.three');
    }

    public function createStepThree(Request $request)
    {
        $visa = $request->session()->get('visa');
        $roomTypes = RoomType::all();

        return view('visa.create-step-three',compact('visa', 'roomTypes'));
    }

    public function review(Request $request) {

        $visa = $request->session()->get('visa');
        $passportPhotoUrl = $request->session()->get('passport_photo');
        $personalPhotoUrl = $request->session()->get('personal_photo');
        $residencePrefernce = $request->session()->get('residence_preference');
        $roomTypes = $request->session()->get('room_types');

        return view('visa.review', compact('visa', 'passportPhotoUrl', 'personalPhotoUrl', 'residencePrefernce'));
    }

    public function stepThree(StepThreeRequest $request) {

        $residencePrefernce = new ResidencePreference();
        $residencePrefernce->fill($request->validated());
        $request->session()->put('residence_preference', $residencePrefernce);

        $roomTypes = collect([]);

        foreach($request->get('rooms') as $type) {

            $roomTypes->push(RoomType::find($type));
        }

        $request->session()->put('room_types', $roomTypes);
        $request->session()->put('room_type_ids', $request->get('rooms'));

        return redirect()->route('visa.review');
    }

    public function submit(Request $request) {

        $user = Auth::user();

        $visa = $request->session()->get('visa');
        $residencePrefernce = $request->session()->get('residence_preference');
        $roomTypes = $request->session()->get('room_type_ids');

        $visa->user_id = $user->id;
        $visa->save();

        $residencePrefernce->visa_id = $visa->id;
        $residencePrefernce->save();

        foreach($roomTypes as $type) {

            $residencePrefernce->roomTypes()->attach($type);
        }

        $request->session()->forget('visa');
        $request->session()->forget('residence_preference');
        $request->session()->forget('room_type_ids');
        $request->session()->forget('room_types');

        Mail::to($user->email)->send(new Welcome($user->email));

        return redirect()->route('visa.done');

    }

    public function done() {

        return view('visa.done');
    }
}
