<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lieu\BulkDestroyLieu;
use App\Http\Requests\Admin\Lieu\DestroyLieu;
use App\Http\Requests\Admin\Lieu\IndexLieu;
use App\Http\Requests\Admin\Lieu\StoreLieu;
use App\Http\Requests\Admin\Lieu\UpdateLieu;
use App\Models\Lieu;
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

class LieusController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexLieu $request
     * @return array|Factory|View
     */
    public function index(IndexLieu $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Lieu::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nom'],

            // set columns to searchIn
            ['id', 'nom']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.lieu.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.lieu.create');

        return view('admin.lieu.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreLieu $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreLieu $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Lieu
        $lieu = Lieu::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/lieus'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/lieus');
    }

    /**
     * Display the specified resource.
     *
     * @param Lieu $lieu
     * @throws AuthorizationException
     * @return void
     */
    public function show(Lieu $lieu)
    {
        $this->authorize('admin.lieu.show', $lieu);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Lieu $lieu
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Lieu $lieu)
    {
        $this->authorize('admin.lieu.edit', $lieu);


        return view('admin.lieu.edit', [
            'lieu' => $lieu,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateLieu $request
     * @param Lieu $lieu
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateLieu $request, Lieu $lieu)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Lieu
        $lieu->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/lieus'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/lieus');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyLieu $request
     * @param Lieu $lieu
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyLieu $request, Lieu $lieu)
    {
        $lieu->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyLieu $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyLieu $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Lieu::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
