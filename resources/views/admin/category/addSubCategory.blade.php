@extends('admin.layouts.template')
@section('page_title')
    Добавить подкатегорию
@endsection
@section('content')
    <div id="kt_app_content_container" class="app-container container-xxl">
        <form method="post" action="" id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="#"  >
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
                                        <input type="text" id="subcategory_name" name="subcategory_name" class="form-control mb-2" placeholder="Product name" value="" />
                                        <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>

                                        <div class="mt-10 fv-row">
                                            <label class="required form-label">Выберите категорию</label>
                                            <select class="form-select" data-placeholder="Select option" data-allow-clear="true">
                                                <option value="0">Выберите категорию</option>
                                                <option value="1">Approved</option>
                                                <option value="2">Pending</option>
                                                <option value="2">In Process</option>
                                                <option value="2">Rejected</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="../../demo1/dist/apps/ecommerce/catalog/products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
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
