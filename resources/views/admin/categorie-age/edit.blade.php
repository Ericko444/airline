@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.categorie-age.actions.edit', ['name' => $categorieAge->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <categorie-age-form
                :action="'{{ $categorieAge->resource_url }}'"
                :data="{{ $categorieAge->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.categorie-age.actions.edit', ['name' => $categorieAge->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.categorie-age.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </categorie-age-form>

        </div>
    
</div>

@endsection