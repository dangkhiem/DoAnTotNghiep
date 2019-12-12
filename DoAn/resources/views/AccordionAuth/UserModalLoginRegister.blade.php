<div class="modal fade modal-md" id="exampleModalAuthen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-1">
            <div class="modal-body">
                <div id="accordion">
                    <div class="">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <div class="row">
                                    <div class="col">
                                        <button type="button"  class="btn badge-primary btn-block text-white"
                                                data-toggle="collapse"
                                                data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne" id="btnAccorLogin"
{{--                                                                                        onclick="AccLoginClick()"--}}
                                        >Login
                                        </button>
                                    </div>
                                    <div class="col-6 text-center">
                                        <button class="btn btn-block badge-danger collapsed"
                                                data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo" id="btnAccorRegister"
                                        {{--                                                onclick="AccRegisterClick()--}}
                                        >
                                        Register
                                        </button>
                                    </div>
                                </div>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne"
                             data-parent="#accordion">
                            <div class="pt-3">
                                @include('AccordionAuth.login')
                            </div>
                        </div>

                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="pt-3">
                                @include('AccordionAuth.register')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

