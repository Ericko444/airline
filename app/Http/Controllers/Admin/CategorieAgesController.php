<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategorieAge\BulkDestroyCategorieAge;
use App\Http\Requests\Admin\CategorieAge\DestroyCategorieAge;
use App\Http\Requests\Admin\CategorieAge\IndexCategorieAge;
use App\Http\Requests\Admin\CategorieAge\StoreCategorieAge;
use App\Http\Requests\Admin\CategorieAge\UpdateCategorieAge;
use App\Models\CategorieAge;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class CategorieAgesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexCategorieAge $request
     * @return array|Factory|View
     */
    public function index(IndexCategorieAge $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(CategorieAge::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['age_max', 'age_min', 'designation', 'id'],

            // set columns to searchIn
            ['designation', 'id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.categorie-age.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.categorie-age.create');

        return view('admin.categorie-age.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreCategorieAge $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreCategorieAge $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the CategorieAge
        $categorieAge = CategorieAge::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/categorie-ages'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/categorie-ages');
    }

    /**
     * Display the specified resource.
     *
     * @param CategorieAge $categorieAge
     * @throws AuthorizationException
     * @return void
     */
    public function show(CategorieAge $categorieAge)
    {
        $this->authorize('admin.categorie-age.show', $categorieAge);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param CategorieAge $categorieAge
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(CategorieAge $categorieAge)
    {
        $this->authorize('admin.categorie-age.edit', $categorieAge);


        return view('admin.categorie-age.edit', [
            'categorieAge' => $categorieAge,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateCategorieAge $request
     * @param CategorieAge $categorieAge
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateCategorieAge $request, CategorieAge $categorieAge)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values CategorieAge
        $categorieAge->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/categorie-ages'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/categorie-ages');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyCategorieAge $request
     * @param CategorieAge $categorieAge
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyCategorieAge $request, CategorieAge $categorieAge)
    {
        $categorieAge->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyCategorieAge $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyCategorieAge $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    CategorieAge::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
