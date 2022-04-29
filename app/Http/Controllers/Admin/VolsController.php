<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Vol\BulkDestroyVol;
use App\Http\Requests\Admin\Vol\DestroyVol;
use App\Http\Requests\Admin\Vol\IndexVol;
use App\Http\Requests\Admin\Vol\StoreVol;
use App\Http\Requests\Admin\Vol\UpdateVol;
use App\Models\Vol;
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

class VolsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexVol $request
     * @return array|Factory|View
     */
    public function index(IndexVol $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Vol::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['avion_id', 'date_depart', 'id', 'lieu_arrivee_id', 'lieu_depart_id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.vol.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.vol.create');

        return view('admin.vol.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreVol $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreVol $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Vol
        $vol = Vol::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/vols'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/vols');
    }

    /**
     * Display the specified resource.
     *
     * @param Vol $vol
     * @throws AuthorizationException
     * @return void
     */
    public function show(Vol $vol)
    {
        $this->authorize('admin.vol.show', $vol);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Vol $vol
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Vol $vol)
    {
        $this->authorize('admin.vol.edit', $vol);


        return view('admin.vol.edit', [
            'vol' => $vol,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateVol $request
     * @param Vol $vol
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateVol $request, Vol $vol)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Vol
        $vol->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/vols'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/vols');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyVol $request
     * @param Vol $vol
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyVol $request, Vol $vol)
    {
        $vol->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyVol $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyVol $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Vol::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
