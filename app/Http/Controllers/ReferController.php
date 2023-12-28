<?php

namespace App\Http\Controllers;

use App\Models\Refer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ReferController extends Controller
{
    public function index()
    {
        $links = Refer::where('is_active', 1)
        ->where('expires_at', '>', Carbon::now())
        ->get();
        $table = view('components.table_links', compact('links'))->render();
        return view('home', compact('table'));
    }

    public function single(Request $request)
    {
        $page = Refer::where('unique_url', $request->refer)->first();

        if (!$page || $page->expires_at < now()) {
            abort(404);
        }

        return view('single', compact('page'));
    }

    public function create()
    {
        $randomLink = Str::random(32);
        $currentDate = Carbon::today();
        $expireDate = $currentDate->addDays(7);

        $link = Refer::create([
            'unique_url' => $randomLink,
            'expires_at' => $expireDate,
        ]);

        $data = [
            'url' => route('single', ['refer' => $link->unique_url]),
            'link' => $link->unique_url,
            'date' => $link->expires_at->format('d.m.Y'),
        ];

        return $data;
    }
    
    public function deactivate($id)
    {
        $page = Refer::findOrFail($id);

        $result = $page->update([
            'is_active' => 0,
        ]);

        if ($result) {
            return redirect()->route('home');
        }
    }
    
    public function table_links() {
        $links = $this->store();
        return view('components.table_links', compact('links'))->render();
    }
}

