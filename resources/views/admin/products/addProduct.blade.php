@extends('admin.layouts.template')
@section('page_title')
    Добавить продукт
@endsection
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form action="{{route('store-product')}}"
                  method="post"
                  id="kt_ecommerce_add_product_form"
                  class="form d-flex flex-column flex-lg-row"
                  data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html"
                  ectype="multipart/form-data">
                @csrf
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Фотография</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <style>.image-input-placeholder { background-image: url('{{asset('assets/media/svg/files/blank-image.svg')}}'); } [data-theme="dark"] .image-input-placeholder { background-image: url('{{asset('assets/media/svg/files/blank-image-dark.svg')}}'); }</style>
                            <div class="image-input image-input-empty" data-kt-image-input="true">
                                <div class="image-input-wrapper w-125px h-125px"></div>
                                <label class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                       data-kt-image-input-action="change"
                                       data-bs-toggle="tooltip"
                                       data-bs-dismiss="click"
                                       title="Change avatar">
                                    <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>
                                    <input type="file" name="product_img" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="cancel"
                                      data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="Cancel avatar"><i class="ki-outline ki-cross fs-3"></i>
                                </span>
                                <span class="btn btn-icon btn-circle btn-color-muted btn-active-color-primary w-25px h-25px bg-body shadow"
                                      data-kt-image-input-action="remove"
                                      data-bs-toggle="tooltip"
                                      data-bs-dismiss="click"
                                      title="Remove avatar"><i class="ki-outline ki-cross fs-3"></i>
                                </span>
                            </div>
                            <div class="text-muted fs-7">Добавьте фотографию продукта. Поддерживаются только эти разрешения: *.png, *.jpg and *.jpeg</div>
                        </div>
                    </div>
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Категории</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <label class="form-label">Категория</label>
                            <select name="product_category_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Выберите категорию" data-hide-search="true">
                                <option></option>
                                @foreach($categories as $cat)
                                    <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-body pt-0">
                            <label class="form-label">Подкатегория</label>
                            <select name="product_subcategory_id" class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                <option></option>
                                @foreach($subcategories as $subcat)
                                    <option value="{{$subcat->id}}">{{$subcat->subcategory_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
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
                                            <label class="required form-label">Название продукта</label>
                                            <input type="text" name="product_name" class="form-control mb-2" placeholder="Название продукта" value="" />
                                            <div class="text-muted fs-7">Название продукта должно быть уникальным.</div>
                                        </div>
                                        <div class="fv-row mb-10">
                                            <label class="required form-label">Цена продукта</label>
                                            <input type="text" name="product_price" class="form-control mb-2" placeholder="Цена продукта" value="" />
                                            <div class="text-muted fs-7">Укажите цену продукта.</div>
                                        </div>
                                        <div class="fv-row">
                                            <label class="required form-label">Количество продуктов</label>
                                            <input type="text" name="product_qty" class="form-control mb-2" placeholder="Количество продуктов" value="" />
                                            <div class="text-muted fs-7">Укажите количество продуктов.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Описание</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="form-floating mb-10">
                                            <textarea class="form-control" name="product_short_desc"  placeholder="Leave a comment here" id="floatingTextarea" style="height: 70px"></textarea>
                                            <label for="floatingTextarea">Краткое описание</label>
                                        </div>

                                        <div class="form-floating">
                                            <textarea class="form-control" name="product_long_desc" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 150px"></textarea>
                                            <label for="floatingTextarea2">Полное описание</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $err)
                                <li>{{$err}}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="d-flex justify-content-end">
                        <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
                        <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                            <span class="indicator-label">Save Changes</span>
                            <span class="indicator-progress">Please wait...
													<span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
    <script src="{{asset('assets/plugins/custom/formrepeater/formrepeater.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/ecommerce/catalog/save-product.js')}}"></script>
    <script src="{{asset('assets/js/widgets.bundle.js')}}"></script>
    <script src="{{asset('assets/js/custom/widgets.js')}}"></script>
    <script src="{{asset('assets/js/custom/apps/chat/chat.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/upgrade-plan.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/create-app.js')}}"></script>
    <script src="{{asset('assets/js/custom/utilities/modals/users-search.js')}}"></script>
@endsection
