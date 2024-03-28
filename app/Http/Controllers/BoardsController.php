<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        // 보드에 있는 정보를 다가져와서 변수에 저장
        $boards = Board::all();

        //lists 변수에 정보를 다넣어서 index에 넘김
        return view('boards.index')->with('lists', $boards);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('boards.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subject' => 'required',
            'contents' => 'required',
        ]);

        //request 로 넘어오는 전부 
        Board::create($request->all());

        //라우트로 넘겨서 index로 넘어간다 
        return redirect()->route('boards.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Board $board)
    {
        //board에 있는 인자를 넘긴다 first는 하나에 인자를 가져온다 
        $board =board::where('id', $board->id)->first();

        return view('boards.show')->with('board', $board);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Board $board)
    {
        $board = board::where('id', $board->id)->first();

        return view('boards.edit')->with('board', $board);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Board $board)
    {
        $request->validate([
            'subject'=>'required',
            'contents'=>'required',
        ]);
        
        //form 으로 전달받은 내용을 update
        $board->update($request->all());

        return redirect()->route('boards.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Board $board)
    {
        $board->delete();

        return redirect()->route('boards.index');

    }
}
