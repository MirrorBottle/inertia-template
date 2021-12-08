<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(Request $request)
    {
        return inertia('Page/Index', [
            'filters' => $request->all('search', 'order_by', 'order_asc'),
            'pages' => Page::query()
                ->when($request->input('order_by'), function ($query, $orderBy) use ($request) {
                    $direction = $request->input('order_asc', 'true') == 'true' ? 'asc' : 'desc';
                    $query->orderBy($orderBy, $direction);
                })
                ->filter($request->only('search'))
                ->paginate()
                ->withQueryString(),
        ]);
    }

    public function create()
    {
        return inertia('Page/Create');
    }

    public function store(PageRequest $request)
    {
        Page::create($request->validated());

        return redirect()->route('page.index')
            ->with('success', 'Halaman berhasil dibuat.');
    }

    public function edit(Page $page)
    {
        return inertia('Page/Edit', ['page' => $page]);
    }

    public function update(PageRequest $request, Page $page)
    {
        $page->update($request->validated());

        return redirect()
            ->back()
            ->with('success', 'Halaman berhasil diubah.');
    }

    public function publish(Page $page)
    {
        $status = $page->published ? 'ditarik' : 'dipublikasikan';

        $page->update([
            'published' => $page->published === 1 ? false : true
        ]);

        return redirect()
            ->back()
            ->with('success', 'Halaman berhasil '.$status);
    }

    // public function upload(Request $request)
    // {
    //     $file   = $request->file('upload');
    //     $ext    = $file->getClientOriginalExtension();
    //     $image  = Image::make($file)
    //                 ->encode($ext, 75);

    //     $filename   = Str::random(25).'.'.$ext;
    //     $path       = 'public/images/blogs/'.$filename;

    //     Storage::put($path, $image);

    //     return response([
    //         'status' => true,
    //         'url' => asset('storage/images/blogs/'. $filename),
    //     ]);
    // }

    public function destroy(Page $page)
    {
        $page->delete();

        return redirect()->route('page.index')
            ->with('success', 'Halaman berhasil dihapus.');
    }
}
