
                @if(session()->has('success'))
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                            <div class="alert alert-success alert-dismissable" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('success') }}
                            </div>
                        </div>
                    </div>
                @elseif(session()->has('error'))
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                            <div class="alert alert-danger alert-dismissable" >
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ session('error') }}
                            </div>
                        </div>
                    </div>
                @endif