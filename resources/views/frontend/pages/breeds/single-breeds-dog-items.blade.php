@if(!is_array($dog) && count($dog) > 0)
    @foreach($dog as $key => $value)
        @php 
            $avaters = json_decode($value->avatar, true);
        @endphp
    <div class="home_main_content items-{{ $value->id }}">
        <div class="boxesSlider profile_slider text-center">
            <div class="slides" @if(is_array($avaters) && count($avaters) > 0) data-items="{{ count($avaters) }}"@endif>

                @if(is_array($avaters) && count($avaters) > 0)
                    @foreach($avaters as $key => $pic)
                        <div class="item multiimage">
                            <img src="{{ dsld_uploaded_file_path($pic) }}" class="img-fluid" />
                        </div>
                    @endforeach
                @endif

                @if(is_null($avaters))
                    <div class="item">
                        <img src="{{ dsld_uploaded_file_path($value->avatar_original) }}" class="img-fluid" />
                    </div>
                @endif
               
            </div>
            <div class="item_text ">
                <div class="content_info">
                    <h1>{{ $value->name }}</h1>
                    <p>Breed Name <span>
                        <img src="{{ asset('assets/images/logo_piece.png')}}" alt="logo_piece" class="img-fluid pe-1" /> 2.4 km for you </span>
                    </p>
                    <a href="#">Know more......</a>
                </div>
                <div class="female_icon">
                    <img src="{{ asset('assets/images/female_icon.png')}}" alt="female_icon" class="img-fluid" />
                </div>
                <div class="right_block">
                    <a href="#" onclick="sendFriendRequest('{{ Session::get('defaultDogDetails.id') }}','{{ $value->id }}')" class="add_user mt-0">
                        <i class="fas fa-user-plus"></i>
                    </a>
                    <a href="#" onclick="removeFriendRequest('{{ $value->id }}')" class="remove_user">
                        <i class="fas fa-times"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class=" text-start  good_gene_title">
            <h4>good genes:</h4>
        </div>
        <div class="gene_row">
            @php 
                $good_gens = json_decode($value->good_genes_id, true);
            @endphp
            @if(is_array($good_gens)  && count($good_gens) > 0)
                @foreach($good_gens as $key => $gGens)
                    <div class=" gene_type text-center">
                        <p>{{ @dsld_find_goodGene_by_id($gGens)->name }}</p>
                    </div>
                @endforeach
            @endif

        </div>
        </div>
    @endforeach
    
    @else
    <div class="home_main_content">
        <div class="boxesSlider profile_slider text-center">
            <h5>Sorry! Nothing Found.</h5>
        </div>
    </div>
    @endif
    