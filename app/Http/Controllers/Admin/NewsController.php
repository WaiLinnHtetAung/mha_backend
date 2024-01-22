<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsRequest;
use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newses = News::with('newsImages')->get();
        return view('admin.news.index', compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeMedia(Request $request)
    {
        $path = storage_path('tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('file');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return response()->json([
            'name' => $name,
            'original_name' => $file->getClientOriginalName(),
        ]);
    }

    public function deleteMedia(Request $request)
    {
        $file = $request->file_name;
        File::delete(storage_path('tmp/uploads/' . $file));

        return 'success';
    }

    public function store(StoreNewsRequest $request)
    {
        $news = News::create($request->all());
        foreach ($request->input('images') as $image) {
            $file_source = storage_path('tmp/uploads/' . $image);
            $file_destination = public_path('storage/images/' . $image);
            if (File::exists($file_source)) {
                File::move($file_source, $file_destination);
                File::delete($file_source);

                NewsImage::create([
                    'image' => $image,
                    'news_id' => $news->id,
                ]);
            }
        }

        return redirect()->route('admin.news.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        $news = $news->load('newsImages');

        return view('admin.news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        $news = $news->load('newsImages');

        return view('admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNewsRequest $request, News $news)
    {

        //Deleting Removed Images
        $removedImages = collect($news->newsImages)->pluck('image')->diff($request->input('images'));

        foreach ($removedImages as $removedImage) {
            File::delete(public_path('storage/images/' . $removedImage));
            $news->newsImages()->where('image', $removedImage)->delete();
        }

        //Adding Nes Images
        foreach ($request->input('images') as $image) {
            if (!$news->newsImages()->where('image', $image)->exists()) {
                File::move(storage_path('tmp/uploads/' . $image), public_path('storage/images/' . $image));

                NewsImage::create([
                    'image' => $image,
                    'news_id' => $news->id,
                ]);
            }
        }

        $news->update($request->all());

        return redirect()->route('admin.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        // ----if you want to delete permently, open below code-----

        // foreach($news->newsImages as $img) {
        //     File::delete(public_path('storage/images/'.$img->image));
        // }
        $news->delete();

        return redirect()->route('admin.news.index');
    }
}
