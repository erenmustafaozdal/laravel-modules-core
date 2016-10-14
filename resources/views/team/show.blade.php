@extends(config('laravel-team-module.views.team.layout'))

@section('title')
    {!! lmcTrans('laravel-team-module/admin.team.show') !!}
@endsection

@section('page-title')
    <h1>
        {!! lmcTrans('laravel-team-module/admin.team.show') !!}
        <small>
            {!! lmcTrans('laravel-team-module/admin.team.show_description', [
                'team' => $team->name_uc_first
            ]) !!}
        </small>
    </h1>
@endsection

@section('css')
    @parent
    {{-- Profile CSS --}}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/profile-2.css') !!}
    {{-- /Profile CSS --}}

    {{-- Select2 --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/select2/dist/css/select2-bootstrap.min.css') !!}
    {{-- /Select2 --}}

    {{-- jCrop Image Crop Extension --}}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/jcrop/css/jquery.Jcrop.min.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/pages/css/image-crop.css') !!}
    {!! Html::style('vendor/laravel-modules-core/assets/global/plugins/bootstrap-fileinput/css/fileinput.min.css') !!}
    {{-- /jCrop Image Crop Extension --}}
@endsection

@section('script')
    @parent
    <script type="text/javascript">
        {{-- js file path --}}
        var formLoaderJs = "{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}";
        var fileinputJS = "{!! lmcElixir('assets/app/fileinput.js') !!}";
        var jcropJS = "{!! lmcElixir('assets/app/jcrop.js') !!}";
        var validationJs = "{!! lmcElixir('assets/app/validation.js') !!}";
        var select2Js = "{!! lmcElixir('assets/app/select2.js') !!}";
        var tinymceJs = "{!! lmcElixir('assets/app/tinymce.js') !!}";
        var validationMethodsJs = "{!! lmcElixir('assets/app/validationMethods.js') !!}";
        var showJs = "{!! lmcElixir('assets/pages/scripts/team/show.js') !!}";
        {{-- /js file path --}}

        {{-- routes --}}
        var modelsURL = "{!! lmbRoute('api.team_category.models') !!}";
        var categoriesURL = "{!! lmbRoute('api.team_category.models') !!}";
        var brandsURL = "{!! lmbRoute('api.team_brand.models') !!}";
        var removePhotoURL = "{!! lmbRoute('api.team.removePhoto', ['id' => '###id###']) !!}";
        var setMainPhotoURL = "{!! lmbRoute('api.team.setMainPhoto', ['id' => '###id###']) !!}";
        var tinymceURL = "{!! lmbRoute('elfinder.tinymce4') !!}";
        var categoryDetailURL = "{!! lmbRoute('api.team_category.detail', ['id' => '###id###']) !!}";
        {{-- /routes --}}

        {{-- languages --}}
        var messagesOfRules = {
            'category_id': { required: "{!! LMCValidation::getMessage('category_id','required') !!}" },
            brand_id: { required: "{!! LMCValidation::getMessage('brand_id','required') !!}" },
            name: { required: "{!! LMCValidation::getMessage('name','required') !!}" }
        };
        var validExtension = "{!! config('laravel-team-module.team.uploads.photo.mimes') !!}";
        var maxSize = "{!! config('laravel-team-module.team.uploads.photo.max_size') !!}";
        var maxFile = "{!! config('laravel-team-module.team.uploads.multiple_photo.max_file') !!}";
        var aspectRatio = "{{ $team->category->aspect_ratio }}";
        var verticalRatio = "{!! config('laravel-team-module.team.uploads.photo.vertical_ratio') !!}";
        var horizontalRatio = "{!! config('laravel-team-module.team.uploads.photo.horizontal_ratio') !!}";
        {{-- /languages --}}
    </script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/team/show.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-form.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-select2.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-image.js') !!}"></script>
    <script src="{!! lmcElixir('assets/pages/js/loaders/admin-tinymce.js') !!}"></script>
@endsection

@section('content')
    {{-- Portlet --}}
    <div class="portlet light bordered mt-element-ribbon portlet-fit">
        <div class="ribbon ribbon-right ribbon-clip ribbon-shadow ribbon-border-dash-hor ribbon-color-{{ $team->is_publish ? 'success' : 'danger' }} uppercase">
            <div class="ribbon-sub ribbon-clip ribbon-right"></div>
            {{ $team->is_publish ? trans('laravel-modules-core::admin.ops.published') : trans('laravel-modules-core::admin.ops.not_published') }}
        </div>
        {{-- Portlet Title --}}
        <div class="portlet-title">
            {{-- Caption --}}
            <div class="caption margin-right-10">
                <i class="{!! config('laravel-team-module.icons.team') !!} font-red"></i>
                <span class="caption-subject font-red">
                    {!! lmcTrans('laravel-team-module/admin.team.show') !!}
                </span>
            </div>
            {{-- /Caption --}}

            {{-- Actions --}}
            <div class="actions pull-left">
                {!! getOps($team, 'show', true) !!}
            </div>
            {{-- /Actions --}}
        </div>
        {{-- /Portlet Title --}}

        {{-- Portlet Body --}}
        <div class="portlet-body profile">

            {{-- Error Messages --}}
            @include('laravel-modules-core::partials.error_message')
            {{-- /Error Messages --}}

            <div class="row profile-account">

                {{-- Profile Navigation --}}
                <div class="col-md-3">
                    <ul class="ver-inline-menu tabbable margin-bottom-40">
                        <li>
                            {!! $team->mainPhoto->getPhoto([
                                'class' => 'img-responsive pic-bordered',
                                'alt'   => $team->name_uc_first,
                            ], last(array_keys(config('laravel-team-module.team.uploads.photo.thumbnails'))),false,'team','team_id') !!}
                        </li>
                        <li class="active">
                            <a data-toggle="tab" href="#overview">
                                <i class="fa fa-info"></i>
                                {!! trans('laravel-modules-core::admin.fields.overview') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#detail">
                                <i class="fa fa-info-circle"></i>
                                {!! trans('laravel-modules-core::admin.fields.detail') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#descriptions">
                                <i class="fa fa-sticky-note"></i>
                                {!! trans('laravel-modules-core::admin.fields.descriptions') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#seo">
                                <i class="fa fa-google"></i>
                                {!! trans('laravel-modules-core::admin.fields.seo') !!}
                            </a>
                            <span class="after"> </span>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#showcase">
                                <i class="fa fa-shopping-cart"></i>
                                {!! trans('laravel-modules-core::admin.fields.showcase') !!}
                            </a>
                            <span class="after"> </span>
                        </li>

                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($team_category) ? 'team_category.team' : 'team') .'.update'))
                        <li>
                            <a data-toggle="tab" href="#edit_info">
                                <i class="fa fa-pencil"></i>
                                {!! trans('laravel-modules-core::admin.fields.edit_info') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_descriptions">
                                <i class="fa fa-sticky-note-o"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_descriptions') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_seo">
                                <i class="fa fa-google-plus"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_seo') !!}
                            </a>
                        </li>
                        <li>
                            <a data-toggle="tab" href="#change_showcase">
                                <i class="fa fa-cart-plus"></i>
                                {!! trans('laravel-modules-core::admin.fields.change_showcase') !!}
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                {{-- /Profile Navigation --}}

                {{-- Profile Content --}}
                <div class="col-md-9">
                    <div class="tab-content">

                        {{-- Overview --}}
                        <div id="overview" class="tab-pane active">
                            <div class="profile-info">
                                @include('laravel-modules-core::team.partials.overview')
                            </div>
                        </div>
                        {{-- /Overview --}}

                        {{-- Detail --}}
                        <div id="detail" class="tab-pane">
                            <div class="profile-info">
                                @include('laravel-modules-core::team.partials.detail')
                            </div>
                        </div>
                        {{-- /Detail --}}

                        {{-- Descriptions --}}
                        <div id="descriptions" class="tab-pane">
                            @include('laravel-modules-core::team.partials.descriptions')
                        </div>
                        {{-- /Descriptions --}}

                        {{-- Seo --}}
                        <div id="seo" class="tab-pane">
                            <div class="profile-info">
                                @include('laravel-modules-core::team.partials.seo')
                            </div>
                        </div>
                        {{-- /Seo --}}

                        {{-- Showcase --}}
                        <div id="showcase" class="tab-pane">
                            <div class="profile-info">
                                @include('laravel-modules-core::team.partials.showcase')
                            </div>
                        </div>
                        {{-- /Showcase --}}

                        {{-- Edit Info --}}
                        @if (Sentinel::getUser()->is_super_admin || Sentinel::hasAccess('admin.'. (isset($team_category) ? 'team_category.team' : 'team') .'.update'))

                        {{-- Edit Info --}}
                        <div id="edit_info" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.team.update', [ 'id' => $team->id, 'form' => 'general' ]),
                                'class'     => 'team-form',
                                'files'     => true
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::team.partials.form')
                                    @include('laravel-modules-core::team.partials.detail_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Edit Info --}}

                        {{-- Change Descriptions --}}
                        <div id="change_descriptions" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.team.update', [ 'id' => $team->id, 'form' => 'descriptions' ])
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::team.partials.descriptions_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Descriptions --}}

                        {{-- Change Seo --}}
                        <div id="change_seo" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.team.update', [ 'id' => $team->id, 'form' => 'seo' ])
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::team.partials.seo_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Seo --}}

                        {{-- Change Showcase --}}
                        <div id="change_showcase" class="tab-pane form">
                            {!! Form::open([
                                'method'    => 'PATCH',
                                'url'       => lmbRoute('admin.team.update', [ 'id' => $team->id, 'form' => 'showcase' ])
                            ]) !!}
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'top'])
                                <div class="form-body">
                                    @include('laravel-modules-core::team.partials.showcase_form')
                                </div>
                                @include('laravel-modules-core::partials.form.actions', ['type' => 'fluid'])
                            {!! Form::close() !!}
                        </div>
                        {{-- /Change Showcase --}}

                        @endif
                        {{-- /Edit Info --}}

                    </div>
                </div>
                {{-- /Profile Content --}}

            </div>
        </div>
        {{-- /Portlet Body --}}
    </div>
    {{-- /Portlet --}}
@endsection
