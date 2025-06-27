<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Paket;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::all();
        return view('member.index', compact('members'));
    }

    public function create()
    {
        $pakets = Paket::all();
        return view('member.create', compact('pakets'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'phone' => 'required|numeric|unique:members',
            'paket_nama' => 'required|exists:pakets,nama',
            'status' => 'required|in:active,inactive',

        ]);

        Member::create($validated);

        return redirect()->route('members.index')->with('success', 'Member created successfully.');
    }

    public function show(string $id)
    {
        $member = Member::findOrFail($id);
        return view('member.show', compact('member'));
    }

    public function edit(string $id)
    {
        $member = Member::findOrFail($id);
        $pakets = Paket::all();
        return view('member.edit', compact('member', 'pakets'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'alamat' => 'required',
            'phone' => 'required|numeric|unique:members,phone,' . $id,
            'paket_nama' => 'required|exists:pakets,nama',
            'status' => 'required|in:active,inactive',
        ]);

        $member = Member::findOrFail($id);
        $member->update([
            'name' => $request->name,
            'alamat' => $request->alamat,
            'phone' => $request->phone,
            'paket_nama' => $request->paket_nama,
            'status' => $request->status,
        ]);

        return redirect()->route('members.index')->with('success', 'Member updated successfully.');
    }

    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Member deleted successfully.');
    }
}
