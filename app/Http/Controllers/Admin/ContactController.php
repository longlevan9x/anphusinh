<?php

namespace App\Http\Controllers\Admin;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
	/**
	 * Display a listing of the resource.
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$models = Contact::all();

		return view('admin.contact.index', compact('models'));
	}

	/**
	 * Show the form for creating a new resource.
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$model = new Contact;

		return view('admin.contact.create', compact('model'));
	}

	/**
	 * Store a newly created resource in storage.
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function store(Request $request) {
		$model = new Contact($request->all());
		$model->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Display the specified resource.
	 * @param Contact $contact
	 * @return \Illuminate\Http\Response
	 */
	public function show(Contact $contact) {
		$model = $contact;

		return view('admin.contact.view', compact('model'));
	}

	/**
	 * Show the form for editing the specified resource.
	 * @param Contact $contact
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Contact $contact) {
		$model = $contact;

		return view('admin.contact.update', compact('model'));
	}

	/**
	 * Update the specified resource in storage.
	 * @param  \Illuminate\Http\Request $request
	 * @param Contact                   $contact
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function update(Request $request, Contact $contact) {
		$model = $contact;
		$model->fill($request->all());
		$model->save();

		return redirect(self::getUrlAdmin());
	}

	/**
	 * Remove the specified resource from storage.
	 * @param Contact $contact
	 * @return \Illuminate\Http\Response
	 * @throws \Exception
	 */
	public function destroy(Contact $contact) {
		$model = $contact;
		if ($model->delete()) {
			return redirect(self::getUrlAdmin());
		}

		return redirect(self::getUrlAdmin())->with('error', "Delete Fail");
	}
}
