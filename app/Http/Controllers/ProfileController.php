<?php

namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{


public function updateName(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $user = Auth::user();
    $user->name = $request->name;
    $user->save();

    return redirect('/')->with('success', 'Name updated successfully!');
}

public function updateAboutPhoto(Request $request)
{
    $request->validate([
        'aboutPhoto' => 'required|image|max:2048',
    ]);

    $user = Auth::user();

    // Store the image in storage/app/public/profile_photos with unique name
    $path = $request->file('aboutPhoto')->store('profile_photos', 'public');

    // Save the path to database
    $user->about_photo = $path;
    $user->save();

    return back()->with('success', 'Profile photo updated successfully.');
}
public function updateAboutyou(Request $request)
{
    $request->validate([
        'about_you' => 'required|string|max:2000',
    ]);

    $user = Auth::user();
    $user->about_you = $request->about_you;
    $user->save();

    return redirect()->back()->with('success', 'Aboutyou updated successfully!');
}
public function updateAboutMe(Request $request)
{
    $request->validate([
        'about_me' => 'required|string|max:2000',
    ]);

    $user = Auth::user();
    $user->about_me = $request->input('about_me');
    $user->save();

    return redirect()->back()->with('success', 'About Me updated successfully!');
}

}
