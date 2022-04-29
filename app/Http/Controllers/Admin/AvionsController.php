<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Avion\BulkDestroyAvion;
use App\Http\Requests\Admin\Avion\DestroyAvion;
use App\Http\Requests\Admin\Avion\IndexAvion;
use App\Http\Requests\Admin\Avion\StoreAvion;
use App\Http\Requests\Admin\Avion\UpdateAvion;
use App\Models\Avion;
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

class AvionsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexAvion $request
     * @return array|Factory|View
     */
    public function index(IndexAvion $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Avion::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id', 'nom', 'nombreplaces'],

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

        return view('admin.avion.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.avion.create');

        return view('admin.avion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAvion $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreAvion $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Avion
        $avion = Avion::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/avions'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/avions');
    }

    /**
     * Display the specified resource.
     *
     * @param Avion $avion
     * @throws AuthorizationException
     * @return void
     */
    public function show(Avion $avion)
    {
        $this->authorize('admin.avion.show', $avion);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Avion $avion
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Avion $avion)
    {
        $this->authorize('admin.avion.edit', $avion);


        return view('admin.avion.edit', [
            'avion' => $avion,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAvion $request
     * @param Avion $avion
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateAvion $request, Avion $avion)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Avion
        $avion->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/avions'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/avions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyAvion $request
     * @param Avion $avion
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyAvion $request, Avion $avion)
    {
        $avion->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyAvion $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyAvion $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Avion::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
