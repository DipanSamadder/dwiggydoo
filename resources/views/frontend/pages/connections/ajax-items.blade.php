@if(count($friendship) > 0)
<div class="connection_card"> 
    <ul>
        @foreach($friendship as $key => $value)
        @php 
            $dog_details = '';
            if($value->receiver_id == Session::get('defaultDogDetails.id')){
                $dog_details = App\Models\Dog::find($value->dogable_id);
            }else if($value->dogable_id == Session::get('defaultDogDetails.id')){
                $dog_details = App\Models\Dog::find($value->receiver_id);
            }
        @endphp
        <li class="items-{{ $value->id }}">
            <div class="card_details">
                <div class="row">
                <div class="col-lg-2">
                    <div class="connection_card_img text-center">
                        <img src="{{ dsld_uploaded_file_path($dog_details->avatar_original) }}" alt="" class="img-fluid rounded-circle" />
                    </div>
                </div>
                <div class="col-lg-7 ps-0">
                    <div class="card_title">
                    <h3>{{ $dog_details->name }} <span>
                        <i class="fa-solid fa-mars-stroke-up"></i>
                        </span>
                    </h3>
                    <h5>Breed: <b>{{ @$dog_details->breeds->name }}</b>
                    </h5>
                    <p>{{ date('d M, Y', strtotime($value->created_at)) }}</p>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card_icons text-end">
                    <span class="connection_msg">
                        <i class="fa-regular fa-comment"></i>
                    </span>
                    <button type="button" onclick="getModalSettingData('{{ $value->id }}')" class="connection_kebada">
                        <i class="fa-solid fa-ellipsis-vertical"></i>
                    </button>
                    </div>
                </div>
                </div>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endif