<?php

namespace App\Http\Controllers\Admin;

use DataTables;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // $news = News::all();
        // return view('admin.news.index', compact('news'));

        $news = News::query()
            ->when($request->input('search'), function ($query, $search) {
                $query->where(function ($query) use ($search) {
                    $query->where('title', 'link', "%($search");
                });
            })
            ->orderByDesc('created_at')
            ->paginate(10)
            ->withQueryString();

        return view('admin.news.index', [
            'news' => $news,
        ]);
    }

    public function create()
    {
        return view('admin.news.create');
    }
    /**
     * Store or update a resource in storage.
     */
    public function store(StoreNewsRequest $request)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            if ($request->hasFile('img')) {
                $data['img'] = $request->file('img')->store('news', 'public');
            } else {
                $data['img'] = null;
            }

            News::create($data);

            DB::commit();

            session()->flash('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            if (isset($data['img'])) {
                Storage::disk('public')->delete($data['img']);
            }

            session()->flash('error', 'Terjadi Kesalahan saat menyimpan data' . $e->getMessage());

            return redirect()->route('admin.news.create');
        }
        return redirect()->route('admin.news.index');
    }


    public function show(News $news)
    {
        return view('admin.news.show', [
            'news' => $news,
        ]);
    }

    /**
     * Display the specified resource.
     */

    // public function edit(News $news)
    // {
    //     return view('admin.news.edit', compact('news'));
    // }

    public function update(UpdateNewsRequest $request, News $news)
    {
        DB::beginTransaction();

        try {
            $data = $request->validated();
            if ($request->hasFile('img')) {
                if ($news->img) {
                    Storage::disk('public')->delete($news->img);
                }
                $data['img'] = $request->file('img')->store('news', 'public');
            }
            $news->update($data);
            DB::commit();

            session()->flash('succsess', 'Data Berhasil Disimpan');
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('error', 'Terjadi kesalahan saat mengubah data : ' . $e->getMessage());

            return redirect()->route('admin.news.edit', ['news' => $news]);
        }
        return redirect()->route('admin.news.index');
    }



    public function destroy(News $news)
    {
        try {
            if ($news->img) {
                Storage::disk('public')->delete($news->img);
            }
            $news->delete();

            session()->flash('success', 'Berhasil menghapus data');
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());

            return redirect()->route('admin.news.index');
        }
        return redirect()->route('admin.news.index');
    }
}
