<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use View;

class CustomerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $customers = Customer::all();

        return View::make('customers.index')->with('customers', $customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório',
        ];

        $attributes = [
            'name'      => 'Nome',
            'birthdate'     => 'Data de Nascimento',
            'gender'  => 'Gênero',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            return Redirect::to('customers/create')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $customer = new Customer;
            $customer->name = $request->get('name');
            $customer->birthdate = Carbon::parse($request->get('birthdate'))->format('Y-m-d');
            $customer->gender = $request->get('gender');
            $customer->postcode = str_replace('-', '', $request->get('postcode'));
            $customer->address = $request->get('address');
            $customer->number = $request->get('number');
            $customer->complement = $request->get('complement');
            $customer->district = $request->get('district');
            $customer->city = $request->get('city');
            $customer->state = $request->get('state');
            $customer->save();

            Session::flash('message', 'Cliente adicionado com sucesso!');

            return Redirect::to('customers');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return View::make('customers.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id);

        return View::make('customers.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'birthdate' => 'required',
            'gender' => 'required'
        ];

        $messages = [
            'required' => 'O campo :attribute é obrigatório',
        ];

        $attributes = [
            'name'      => 'Nome',
            'birthdate'     => 'Data de Nascimento',
            'gender'  => 'Gênero',
        ];

        $validator = Validator::make($request->all(), $rules, $messages, $attributes);

        if ($validator->fails()) {
            return Redirect::to('customers/' . $id . '/edit')
                            ->withErrors($validator)
                            ->withInput();
        } else {
            $customer = Customer::find($id);
            $customer->name = $request->get('name');
            $customer->birthdate = Carbon::parse($request->get('birthdate'))->format('Y-m-d');
            $customer->gender = $request->get('gender');
            $customer->postcode = str_replace('-', '', $request->get('postcode'));
            $customer->address = $request->get('address');
            $customer->number = $request->get('number');
            $customer->complement = $request->get('complement');
            $customer->district = $request->get('district');
            $customer->city = $request->get('city');
            $customer->state = $request->get('state');
            $customer->save();

            Session::flash('message', 'Cliente atualizado com sucesso!');

            return Redirect::to('customers');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        Session::flash('message', 'Cliente removido com sucesso.');

        return Redirect::to('customers');
    }

}
