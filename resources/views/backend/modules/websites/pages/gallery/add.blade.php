 
<div class="modal fade" id="add_new_larger_modals" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="add_new_larger_modals_tile"></h4>
            </div>
            <form id="add_new_form" action="{{ route('pages.store') }}" method="POST" enctype="multipart/form-data" >
            @csrf 
            <div class="modal-body">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}" />
                <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}" />
                <input type="hidden" name="type" id="type" value="gallery_page" />
                <div id="add_new_larger_modals_body">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Title <small class="text-danger">*</small></label>                                 
                                    <input type="text" name="title" id="title" class="form-control" placeholder="Title" />                                   
                                </div>
                            </div>
                            
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label">Parent <small class="text-danger">*</small></label>                                 
                                    <select class="form-control" name="parent" id="parent" onchange="is_edited()">
                                        <option value="0">-- Please select --</option>
                                        @foreach(App\Models\Page::where('type', 'gallery_page')->where('level', 1)->where('status', 1)->get() as $key => $value)
                                            
                                            <option value="{{ $value->id }}">{{ $value->title }}</option>
                                            @php
                                                $child = App\Models\Page::where('parent', $value->id)->where('type', 'gallery_page')->where('level', 2)->where('status', 1)->get();
                                            @endphp
                                            @if($child != '')
                                                @foreach($child as $key => $value1)
                                                    <option value="{{ $value1->id }}">- {{ $value1->title }}</option>
                                                    @php
                                                        $child2 = App\Models\Page::where('parent', $value1->id)->where('type', 'gallery_page')->where('level', 3)->where('status', 1)->get();
                                                    @endphp
                                                    @if($child2 != '')
                                                        @foreach($child2 as $key => $value2)
                                                            <option value="{{ $value2->id }}" >-- {{ $value2->title }}</option>
                                                            @php
                                                                $child3 = App\Models\Page::where('parent', $value2->id)->where('type', 'gallery_page')->where('level', 4)->where('status', 1)->get();
                                                            @endphp
                                                            @if($child3 != '')
                                                                @foreach($child3 as $key => $value3)
                                                                    <option value="{{ $value3->id }}">--- {{ $value3->title }}</option>
                                                                @endforeach
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endif

                                        @endforeach
                                    </select>                             
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label">Banner</label>                                 
                                    <select class="form-control show-tick ms select2" name="banner" id="banner" onchange="is_edited()">
                                        <option value="">-- Please select --</option>
                                        @foreach(App\Models\Upload::where('user_id', Auth::user()->id)->where('type', 'image')->get() as $key => $value)
                                            <option value="{{ $value->id }}">({{ $value->id }}) - {{ $value->file_title}} </option>
                                        @endforeach
                                    </select>                                                                
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label class="form-label">Status <small class="text-danger">*</small></label>                                 
                                    <select class="form-control w-100  ms select2 mr-2" name="status" id="status">
                                        <option value="">-- Please select --</option>
                                        <option value="1" selected>Active</option>
                                        <option value="0">Deactive</option>
                                    </select>                             
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="form-label">Description</label>                                 
                                    <div class="summernote" id="content">
                                    </div>                                   
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-round waves-effect" data-dismiss="modal">CLOSE</button>
                <div class="swal-button-container">
                    <button type="submit" class="btn btn-success btn-round waves-effect dsld-btn-loader">SUBMIT</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
