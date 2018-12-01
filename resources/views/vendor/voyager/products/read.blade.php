@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->display_name_singular) }} &nbsp;

        @can('edit', $dataTypeContent)
            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
            </a>
        @endcan
        @can('delete', $dataTypeContent)
            <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
            </a>
        @endcan

        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">

                    <!-- Product code -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Product code</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->product_code }}</p>
                    </div>

                    <!-- Category -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Category</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->category->name }}</p>
                    </div>

                    <!-- Name -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Name</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->name }}</p>
                    </div>

                    <!-- Meta title -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Meta title</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->meta_title }}</p>
                    </div>

                    <!-- Discription -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Discription</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->description }}</p>
                    </div>

                    <!-- Unit Price -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Unit Price</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->unit_price }}</p>
                    </div>

                    <!-- Promotion Price -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Promotion Price</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->promotion_price }}</p>
                    </div>
                    
                    <!-- Representative Image -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Representative Image</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <img class="img-responsive"
                             src="{{ filter_var($dataTypeContent->representative_image, FILTER_VALIDATE_URL) ? $dataTypeContent->representative_image : Voyager::image($dataTypeContent->representative_image) }}" width="800">
                    </div>

                    <!-- More Image -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">More Image</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        @foreach($dataTypeContent->more_images as $image)
                            <div class="col-md-3">
                                <img class="img-responsive" src="{{ filter_var($image->image, FILTER_VALIDATE_URL) ? $image->image : Voyager::image($image->image) }}" width="300">
                            </div>
                        @endforeach
                    </div>

                    <!-- Status -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Status</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->status }}</p>
                    </div>

                    <!-- Created At -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Created At</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->created_at }}</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->display_name_singular) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
        <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
