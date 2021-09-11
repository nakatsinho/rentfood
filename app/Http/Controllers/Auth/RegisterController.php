<?php

namespace RentFood\Http\Controllers\Auth;

use RentFood\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use RentFood\Models\Bairro;
use RentFood\Models\Distrito;
use RentFood\Models\Filiado;
use RentFood\Models\Link;
use RentFood\Models\Pais;
use RentFood\Models\Provincia;
use RentFood\Models\Role;
use RentFood\Models\Sexo;
use RentFood\Models\User;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        $pais = Pais::pluck('nome','id');
        $sexo = Sexo::pluck('nome','id');
        $provincia = Provincia::pluck('nome','id');
        $distrito = Distrito::pluck('nome','id');
        $bairro = Bairro::pluck('nome','id');
        return view('auth.register',compact('pais','sexo','provincia','distrito','bairro'));
    }
    
    protected function validator(Request $data)
    {
        return $this->validate($data, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:25'],
            'born' => ['required', 'date'],
            'bi' => ['required', 'string', 'max:20', 'unique:users'],
            'number' => ['required', 'string', 'max:9'],
            'number2' => ['required', 'string', 'max:9','unique:users'],
            'local' => ['required', 'string', 'max:255'],
            'profissao' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);
    }

    protected function create()
    {
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \RentFood\User
     */
    protected function store(Request $request)
    {
        $formInput = $request->except('image');
        $this->validate($request, [
            'image' => 'image|mimes:png,jpg,jpeg|max:10000',
        ]);
        $image = $request->image;

        $imageName = $image->getClientOriginalName();
        $image->move('admin/img/profile', $imageName);
        $formInput['image'] = $imageName;
        $formInput['filiado_id'] = $request->filiado_id ?: '1';
        $formInput['password'] = Hash::make($request->password);

        $user = User::create($formInput);

        $role = Role::select('id')->where('name','User')->first();

        $user->roles()->attach($role);

        $this->guard()->login($user);

        $link = new Link();
        $link->user_id = Auth::user()->id;
        $link->name = 'http://localhost:8000/register' . '/' . Auth::user()->surname . '_' . Auth::user()->bi;
        $link->save();

        $links = Link::select('*')->where('user_id', Auth::user()->id)->first();

        $fileName = 'UserGuide.pdf';
        $to_email = Auth::user()->email;
        $name = $request->surname;

        $bairro = Bairro::where('id',Auth::user()->bairro_id)->first();
        $pais = Pais::where('id',Auth::user()->pais_id)->first();
        $provincia = Provincia::where('id',Auth::user()->provincia_id)->first();
        $distrito = Distrito::where('id',Auth::user()->distrito_id)->first();


        Mail::send('auth.newuser', [
            'head' => 'Confirmação de Cadastro',
            'user' => Auth::user()->name,
            'surname' => Auth::user()->surname,
            'email' => Auth::user()->email,
            'number' => Auth::user()->number,
            'number2' => Auth::user()->number2, 
            'born' => Auth::user()->born,
            'cidade' => $provincia,
            'bairro' => $bairro,
            'pais' => $pais,
            'distrito' => $distrito,
            'local' => Auth::user()->local,
            'date' => Auth::user()->created_at,
            'profissao' => Auth::user()->profissao,
        ], function ($body) use ($to_email, $name, $fileName) {
            $body->from('rentfood@gmail.com', 'RENT FOOD, LDA');
            $body->to($to_email, $name);
            $body->cc('nakatsinho@gmail.com', 'RENTFOOD ADMIN');
            $body->replyTo('nakatsinho@gmail.com');
            $body->subject('Confirmação dos dados do cliente');
            $body->attachData('file.txt', $fileName);
        });

        Filiado::create([
            'user_id' => $request->filiado_id ?: '1',
            'self_id' => Auth::user()->id,
            'link_id' => $links->id,
            'winning' => '25',

        ]);

        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
    protected function show($id)
    {
        $pais = Pais::pluck('nome','id');
        $sexo = Sexo::pluck('nome','id');
        $provincia = Provincia::pluck('nome','id');
        $distrito = Distrito::pluck('nome','id');
        $bairro = Bairro::pluck('nome','id');
        return view('auth.linked',compact('pais','sexo','provincia','distrito','bairro'));
    }
}
