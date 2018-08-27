<?php

namespace App\Http\Controllers\Board;

use App\Board;
use App\Http\Controllers\Controller;
use App\Http\Libraries\DataSeeker\DataSeeker;
use Illuminate\Http\Request;


class BoardController extends Controller
{

    private $boardColors = [
        ['name' => 'Yeşil', 'value' => 'green'],
        ['name' => 'Mavi', 'value' => 'blue'],
        ['name' => 'Sarı', 'value' => 'yellow'],
        ['name' => 'Kırmızı', 'value' => 'red'],
    ];

    public function index()
    {
        $boards = Board::get();
        return view('Board.index', ['boards' => $boards]);
    }

    public function add()
    {
        return redirect(url('boards/edit/new'));
    }

    public function edit($id, Request $request)
    {
        if (!is_numeric($id)) {
            $board = new Board();
            $this->redirectIfNotExist($board, $request);
        } else {
            $board = Board::where('id', $id)->first();

            $board->firstrow = explode(',', str_replace(['{', '}'], ['', ''], $board->firstrow));
            $board->secondrow = explode(',', str_replace(['{', '}'], ['', ''], $board->secondrow));
            $board->thirdrow = explode(',', str_replace(['{', '}'], ['', ''], $board->thirdrow));

        }

        return view('Board.edit', ['board' => $board, 'colors' => $this->boardColors]);
    }

    public function update($id, Request $request)
    {
        if (is_numeric($id)) {
            $board = Board::find($id);
            $this->redirectIfNotExist($board, $request);
        } else {
            $board = new Board();
        }

        $numbers = $request->input('number');
        $numbersJson = [];
        $color = $request->input('color');

        if ($numbers && count($numbers) == 27 && $color) {
            $firstRow = [];
            $secondRow = [];
            $thirdRow = [];

            foreach ($numbers as $key => $number) {
                if (!$number) {
                    $number = 0;
                }

                if ($key < 9) {
                    $firstRow[] = $number;
                } else if ($key < 18) {
                    $secondRow[] = $number;
                } else {
                    $thirdRow[] = $number;
                }

                $numbersJson[] = $number;
            }

            $numbersJson = json_encode($numbersJson);
            $firstRow = str_replace(['"', '[', ']'], ['', '{', '}'], json_encode($firstRow));
            $secondRow = str_replace(['"', '[', ']'], ['', '{', '}'], json_encode($secondRow));
            $thirdRow = str_replace(['"', '[', ']'], ['', '{', '}'], json_encode($thirdRow));

            $board->view = $numbersJson;
            $board->firstrow = $firstRow;
            $board->secondrow = $secondRow;
            $board->thirdrow = $thirdRow;
            $board->color = $color;
            if ($board->save()) {
                $request->session()->flash('alert', ['type' => 'success', 'message' => 'Kart kaydetme işlemi başarıyla gerçekleşti.']);
            } else {
                $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Kart kaydetme işlemi gerçekleşirken hata meydana geldi.']);
            }
            return redirect(url('/boards'));

        } else {
            $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Alanları düzgün giriniz.']);
            return redirect(url('/boards'));
        }
    }

    public function delete($id, Request $request)
    {
        $board = Board::find($id);
        if ($board) {
            if ($board->delete()) {
                $request->session()->flash('alert', ['type' => 'success', 'message' => 'Silme işlemi başarıyla gerçekleşti.']);
            } else {
                $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Silme işlemi gerçekleşirken hata meydana geldi.']);
            }
            return redirect(url('/boards'));
        }
    }

    public function redirectIfNotExist($obj, Request $request)
    {
        if (!$obj) {
            $request->session()->flash('alert', ['type' => 'warning', 'message' => 'Kaydetmek istediğiniz kart kayıtlı değil']);
            return redirect(url('/boards'));
        }
    }

}