<?php require_once INCLUDES . 'admin_header.php'; ?>

<!-- ============================================================== -->
<!-- basic form  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Nueva Noticia</h5>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="inputText3" class="col-form-label">Input Text</label>
                        <input id="inputText3" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="inputEmail">Email address</label>
                        <input id="inputEmail" type="email" placeholder="name@example.com" class="form-control">
                        <p>We'll never share your email with anyone else.</p>
                    </div>
                    <div class="form-group">
                        <label for="inputText4" class="col-form-label">Number Input</label>
                        <input id="inputText4" type="number" class="form-control" placeholder="Numbers">
                    </div>
                    <div class="form-group">
                        <label for="inputPassword">Password</label>
                        <input id="inputPassword" type="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="custom-file mb-3">
                        <input type="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">File Input</label>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Example textarea</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end basic form  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- select options  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Select Example</h5>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="input-select">Example Select</label>
                        <select class="form-control" id="input-select">
                            <option>Choose Example</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end select options  -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- checkboxes and radio -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" id="checkboxradio">
        <div class="card">
            <h5 class="card-header">Checkboxes and Radios</h5>
            <div class="card-body">
                <h4>Default (stacked)</h4>
                <form>
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Default Checkbox</span>
                    </label>
                    <label class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" disabled><span class="custom-control-label">Default Checkbox </span>
                    </label>
                    <h4>Inline Checkbox</h4>
                    <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Option 1</span>
                    </label>
                    <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Option 2</span>
                    </label>
                    <label class="custom-control custom-checkbox custom-control-inline">
                        <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Option 3</span>
                    </label>
                </form>
            </div>
            <div class="card-body border-top">
                <h4>Radio (Stacked)</h4>
                <form>
                    <label class="custom-control custom-radio">
                        <input type="radio" name="radio-stacked" checked="" class="custom-control-input"><span class="custom-control-label">Default Radio</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="radio-inline" class="custom-control-input" disabled><span class="custom-control-label">Default Radio</span>
                    </label>
                    <h5>Inline Radio</h5>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="radio-inline" checked="" class="custom-control-input"><span class="custom-control-label">Option 1</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="radio-inline" class="custom-control-input"><span class="custom-control-label">Option 2</span>
                    </label>
                    <label class="custom-control custom-radio custom-control-inline">
                        <input type="radio" name="radio-inline" class="custom-control-input"><span class="custom-control-label">Option 3</span>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end checkboxes and radio -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- validation state -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="card">
            <h5 class="card-header">Validation States</h5>
            <div class="card-body">
                <form>
                    <label for="validationServer01">First name</label>
                    <input type="text" class="form-control is-valid" id="validationServer01" placeholder="First name" value="First name" required>
                    <div class="valid-feedback">
                        Looks good!
                    </div>
                    <label class="col-form-label" for="validationCustom02">Error</label>
                    <input type="text" required="" class="form-control is-invalid" id="validationCustom02">
                    <div class="invalid-feedback">
                        Please provide a valid text.
                    </div>
                </form>
            </div>
            <div class="card-body border-top">
                <form>
                    <h5>Checkbox</h5>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input is-valid" id="customControlValidation1" required>
                        <label class="custom-control-label" for="customControlValidation1">Success</label>
                    </div>
                    <div class="custom-control custom-checkbox was-validated">
                        <input type="checkbox" class="custom-control-input is-invalid" id="customControlValidation2" required>
                        <label class="custom-control-label" for="customControlValidation2">Error</label>
                    </div>
                    <h5>Radio</h5>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input is-valid" id="customControlValidation3" name="radio-stacked" required>
                        <label class="custom-control-label" for="customControlValidation3">Success</label>
                    </div>
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input is-invalid" id="customControlValidation4" name="radio-stacked" required>
                        <label class="custom-control-label" for="customControlValidation4">Error</label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- end validation state -->
<!-- ============================================================== -->

<?php require_once INCLUDES.'admin_footer.php'; ?>