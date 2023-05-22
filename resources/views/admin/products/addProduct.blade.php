@extends('admin.layouts.template')
@section('page_title')
    Добавить продукт
@endsection
@section('content')
<div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-xxl">
            <form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" data-kt-redirect="../../demo1/dist/apps/ecommerce/catalog/products.html">
                <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Thumbnail</h2>
                            </div>
                        </div>
                        <div class="card-body text-center pt-0">
                            <style>.image-input-placeholder { background-image: url('{{asset('assets/media/svg/files/blank-image.svg')}}'); } [data-theme="dark"] .image-input-placeholder { background-image: url('{{asset('assets/media/svg/files/blank-image-dark.svg')}}'); }</style>
                            <div class="image-input image-input-empty image-input-outline image-input-placeholder mb-3" data-kt-image-input="true" style="&lt;br /&gt; &lt;b&gt;Warning&lt;/b&gt;: Undefined variable $imageBg in &lt;b&gt;C:\wamp64\www\keenthemes\core\html\dist\view\pages\apps\ecommerce\catalog\edit-product\_thumbnail.php&lt;/b&gt; on line &lt;b&gt;30&lt;/b&gt;&lt;br /&gt;">
                                <div class="image-input-wrapper w-150px h-150px"></div>
                                <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                                    <i class="bi bi-pencil-fill fs-7"></i>
                                    <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                    <input type="hidden" name="avatar_remove" />
                                </label>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                                <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
															<i class="bi bi-x fs-2"></i>
														</span>
                            </div>
                            <div class="text-muted fs-7">Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted</div>
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
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                                <option value="5">Option 5</option>
                            </select>
                        </div>
                        <div class="card-body pt-0">
                            <label class="form-label">Подкатегория</label>
                            <select class="form-select form-select-solid" data-control="select2" data-placeholder="Select an option" data-hide-search="true">
                                <option></option>
                                <option value="1">Option 1</option>
                                <option value="2">Option 2</option>
                                <option value="3">Option 3</option>
                                <option value="4">Option 4</option>
                                <option value="5">Option 5</option>
                            </select>
                        </div>
                    </div>

                    <div class="card card-flush py-4">
                        <div class="card-header">
                            <div class="card-title">
                                <h2>Price</h2>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="fv-row">
                                <label class="required form-label">Base Price</label>
                                <input type="text" name="price" class="form-control mb-2" placeholder="Product price" value="" />
                                <div class="text-muted fs-7">Set the product price.</div>
                            </div>
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
                                            <h2>General</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Product Name</label>
                                            <input type="text" name="product_name" class="form-control mb-2" placeholder="Product name" value="" />
                                            <div class="text-muted fs-7">A product name is required and recommended to be unique.</div>
                                        </div>
                                        <div class="mb-10 fv-row">
                                            <label class="required form-label">Product quantity</label>
                                            <input type="text" name="price" class="form-control mb-2" placeholder="Product quantity" value="" />
                                            <div class="text-muted fs-7">Set product quantity.</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-flush py-4">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h2>Description</h2>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="mb-10">
                                            <label class="form-label">Short Description</label>
                                            <div id="kt_ecommerce_add_product_meta_description" name="kt_ecommerce_add_product_meta_description" class="min-h-100px mb-2"></div>
                                            <div class="text-muted fs-7">Set a meta tag description to the product for increased SEO ranking.</div>
                                        </div>
                                        <div>
                                            <label class="form-label">Description</label>
                                            <div id="kt_ecommerce_add_product_description" name="kt_ecommerce_add_product_description" class="min-h-200px mb-2"></div>
                                            <div class="text-muted fs-7">Set a description to the product for better visibility.</div>
                                        </div>
                                        <div class="text-muted fs-7">Set the product media gallery.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
