<?php

namespace RentFood\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RentFood\Models\Filiado;
use RentFood\Models\Link;
use RentFood\Models\User;
use RentFood\Models\Winning;

class ProfileController extends Controller
{
    public function index()
    {
        $user = User::where('id', Auth::user()->id)->first();
        $filiados = Filiado::leftJoin('users', 'users.id', '=', 'filiados.self_id')
            ->where('user_id', $user->id)
            ->get();
        $link = Link::where('user_id', $user->id)->first();

        Winning::create([
            'total' => 0,
            'user_id' => $user->id,
        ]);

        $sum = 0;
        $consumivel = 0;
        foreach ($filiados as $value) {
            $sum = $sum + $value->winning;

            if ($value->usual == 1) {
                $consumivel = $consumivel + $value->winning;
                $total = 0;

                if ($consumivel >= 20) {
                    
                    $total = $total + $consumivel;

                    Winning::where('user_id', $user->id)->update([
                        'total' => $total,
                        'user_id' => $user->id,
                    ]);
                }
            }
        }
        $winned = Winning::where('user_id',$user->id)->orderBy('updated_at','desc')->limit(1)->get();
        return view('profile.index', compact('user', 'filiados', 'sum', 'link', 'consumivel','winned'));
    }

    public function show($id)
    {
        $user = User::where('id', $id)->first();
        $filiados = Filiado::leftJoin('users', 'users.id', '=', 'filiados.self_id')
            ->where('user_id', $user->id)
            ->get();
        $link = Link::where('user_id', $user->id)->first();
        $sum = 0;
        foreach ($filiados as $value) {
            $sum = $sum + $value->winning;
        }
        return view('profile.show', compact('user', 'filiados', 'sum', 'link'));
    }

    public function create()
    {
        # code...
    }

    public function store(Request $request)
    {
    }

    public function edit($id)
    {
        # code...
    }

    public function update(Request $request)
    {
        # code...
    }

    public function destroy($id)
    {
        # code...
    }
}
