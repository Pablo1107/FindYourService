<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Services\Google;

class ServicesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @param \App\Services\Google $google
   * @return \Illuminate\Http\Response
   */
  public function index(Google $google)
  {
    $service = new Service();
    $columns = $service->getTableColumns();
    $services = Service::all();
    return view('admin', compact('services', 'columns', 'google'));
  }

  /**
   * Display the public view.
   *
   * @param \App\Services\Google $google
   * @return \Illuminate\Http\Response
   */
  public function public(Google $google)
  {
    $service = new Service();
    $columns = $service->getTableColumns();
    $services = Service::all();
    return view('services.public', compact('services', 'columns', 'google'));
  }

  /**
   * Return a list of the stored services.
   *
   * @param \App\Services\Google $google
   * @return \Illuminate\Http\Response
   */
  public function list(Google $google)
  {
    $service = new Service();
    $columns = $service->getTableColumns();
    $services = Service::all();
    return $services;
  }

  /**
   * Show the form for creating a new resource.
   *
   * @param \App\Services\Google $google
   * @return \Illuminate\Http\Response
   */
  public function create(Google $google)
  {
    return view('services.create', compact('google'));
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $this->validate(request(), [
      'title' => ['required', 'min:3'],
      'description' => ['required', 'min:3'],
      'address' => 'required',
      'city' => 'required', 
      'state' => 'required',
      'zipcode' => 'required',
    ]);
    Service::create([
      'title' => request('title'),
      'description' => request('description'),
      'address' => request('address'),
      'city' => request('city'), 
      'state' => request('state'),
      'zipcode' => request('zipcode'),
      'latitude' => request('latitude'),
      'longitude' => request('longitude')
    ]);

    return ['message' => 'Services Created'];
  }

  /**
   * Display the specified resource.
   *
   * @param  Service $service * @return \Illuminate\Http\Response
   */
  public function show(Service $service)
  {
    return $service; 
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  Service $service
   * @return \Illuminate\Http\Response
   */
  public function edit(Service $service)
  {
    return view('services.edit', compact('service'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  Service $service
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Service $service)
  {
    $service->update(request(['title', 'description', 'address']));
    return ['message' => 'Service Updated']; 
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  Service $service
   * @return \Illuminate\Http\Response
   */
  public function destroy(Service $service)
  {
    $service->delete();
    return ['message' => 'Service Deleted'];
  }
}
