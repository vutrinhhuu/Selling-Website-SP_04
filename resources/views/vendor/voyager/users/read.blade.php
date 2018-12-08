@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->display_name_singular) }} &nbsp;

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
                    <!-- form start -->

                    {{-- UserID --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">UserID</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->id }}</p>
                    </div>

                    {{-- Username --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Username</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->username }}</p>
                    </div>

                    {{-- Role --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Role</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->role->display_name }}</p>
                    </div>

                    {{-- Email --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Email</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->email }}</p>
                    </div>

                    {{-- Avatar --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Avatar</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <img class="img-responsive"
                            src="{{ Voyager::image($dataTypeContent->avatar )}}" width="300">
                    </div>

                    {{-- Fullname --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Fullname</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->fullname }}</p>
                    </div>

                    {{-- Address --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Address</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->address }}</p>
                    </div>

                    {{-- Phone --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Phone</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        <p>{{ $dataTypeContent->phone }}</p>
                    </div>

                    {{-- Joined At --}}
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">Joined At</h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{ \Carbon\Carbon::parse($dataTypeContent->created_at)->format('d M Y') }}
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
