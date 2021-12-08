<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return inertia('Contact/Index', [
            'filters' => $request->all('search', 'order_by', 'order_asc'),
            'contacts' => Contact::query()
                ->when($request->input('order_by'), function ($query, $orderBy) use ($request) {
                    $direction = $request->input('order_asc', 'true') == 'true' ? 'asc' : 'desc';
                    $query->orderBy($orderBy, $direction);
                })
                ->filter($request->only('search'))
                ->paginate()
                ->withQueryString(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->route('contacts.index')
            ->with('success', 'Message deleted.');
    }

    /**
     * Read the message.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function read($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => 1]);
        return redirect()->route('contacts.index')
            ->with('success', 'Message read.');
    }
}
