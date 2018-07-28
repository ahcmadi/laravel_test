<?php
namespace Laravolt\Envi\Http\Controllers;


use Illuminate\Routing\Controller;
use Dotenv\Dotenv;
use Illuminate\Http\Request;
use Laravolt\Envi\Envi;
use App\User;

use Illuminate\Support\Facades\Artisan;


class EnviController extends Controller
{
    public function index()
    {

        $env = new Dotenv(base_path(), '.env');
        $env->load();

        $current_envi = Envi::all();

        $variables = $env->getEnvironmentVariableNames();
        
        return view('envi::index', compact('variables')+compact('current_envi'));
    }

    public function create()
    {

        $env = new Dotenv(base_path(), '.env');
        $env->load();
        $current_envi = Envi::all();

        $variables = $env->getEnvironmentVariableNames();
        
        return view('envi::create', compact('variables')+compact('current_envi'));
    }

    public function store(Request $request)
    {

        $variables = request()->except('_token');
            // Envi::truncate(); // Envi::create($variables);

        foreach ($variables as $key => $value) {
            // \Illuminate\Support\Facades\DB::enableQueryLog();
            Envi::updateOrCreate( ['name'=>$key], ['name'=>$key, 'value'=>$value]);
            // dd(\Illuminate\Support\Facades\DB::getQueryLog());       
        }

        Artisan::call('view:clear');
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        
      
        // return redirect()->back()->withSucces('Berhasil ');
        return redirect()->route('auth::login');

    }

    public function  show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {}

    /**
     * Update the specified resource in storage.
     *
     * @param  ReportUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(ReportUpdateRequest $request, $id)
    {}


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {}


}
