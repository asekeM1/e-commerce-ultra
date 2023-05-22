@extends('admin.layouts.template')
@section('page_title')
    Редактировать подкатегорию
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form method="post" action="{{route('update-sub-categories')}}" id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#">
            @csrf
            <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                        <div class="d-flex flex-column gap-7 gap-lg-10">
                            <div class="card card-flush py-4">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Главное</h2>
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="mb-10 fv-row">
                                        <label class="required form-label">Название подкатегории</label>
                                        <input type="hidden"  name="subcategory_id" value="{{$subcategory->id}}" />
                                        <input type="text" id="subcategory_name" name="subcategory_name" class="form-control mb-2" placeholder="Название подкатегория" value="{{$subcategory->subcategory_name}}" />
                                        <div class="text-muted fs-7">Название подкатегории должно быть уникальным.</div>
                                        @if($errors->any())
                                            <ul>
                                                @foreach($errors->all() as $err)
                                                    <li>{{$err}}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('all-sub-categories')}}" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Отмена</a>
                    <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                        <span class="indicator-label">Добавить</span>
                        <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
